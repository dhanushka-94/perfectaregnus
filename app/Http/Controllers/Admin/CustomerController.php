<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::query()
            ->select(
                'email',
                DB::raw('MAX(customer_name) as customer_name'),
                DB::raw('MAX(phone) as phone'),
                DB::raw('COUNT(*) as order_count'),
                DB::raw('SUM(CASE WHEN status != "cancelled" THEN total ELSE 0 END) as total_spent'),
                DB::raw('MAX(created_at) as last_order_at')
            )
            ->groupBy('email');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('email', 'like', "%{$search}%")
                    ->orWhere('customer_name', 'like', "%{$search}%");
            });
        }

        $customers = $query->orderByDesc('last_order_at')->paginate(15)->withQueryString();

        $profiles = Customer::whereIn('email', $customers->pluck('email'))
            ->get()
            ->keyBy('email');

        return view('admin.customers.index', [
            'customers' => $customers,
            'profiles' => $profiles,
            'search' => $request->search,
        ]);
    }

    public function show(string $email)
    {
        $orders = Order::where('email', $email)->with('items')->latest()->get();

        if ($orders->isEmpty()) {
            abort(404);
        }

        $profile = Customer::firstOrCreate(
            ['email' => $email],
            [
                'name' => $orders->first()->customer_name,
                'phone' => $orders->first()->phone,
            ]
        );

        $customer = (object) [
            'name' => $profile->name,
            'email' => $email,
            'phone' => $profile->phone ?? $orders->first()->phone,
            'profile_image' => $profile->profile_image,
            'profile_image_url' => $profile->profile_image_url,
            'order_count' => $orders->count(),
            'total_spent' => $orders->whereNotIn('status', ['cancelled'])->sum('total'),
        ];

        return view('admin.customers.show', compact('customer', 'orders', 'profile'));
    }

    public function updatePhoto(Request $request, string $email, ImageUploadService $uploader)
    {
        $profile = Customer::where('email', $email)->firstOrFail();

        $request->validate([
            'profile_image' => 'required|image|mimes:jpg,jpeg,png,webp,gif|max:5120',
        ]);

        $profile->update([
            'profile_image' => $uploader->upload($request->file('profile_image'), 'customers', $profile->profile_image),
        ]);

        return redirect()->route('admin.customers.show', $email)->with('success', 'Customer photo updated.');
    }
}
