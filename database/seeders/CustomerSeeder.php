<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Order::query()
            ->select('email', 'customer_name', 'phone')
            ->orderByDesc('created_at')
            ->get()
            ->unique('email')
            ->each(function ($order) {
                Customer::updateOrCreate(
                    ['email' => $order->email],
                    [
                        'name' => $order->customer_name,
                        'phone' => $order->phone,
                    ]
                );
            });
    }
}
