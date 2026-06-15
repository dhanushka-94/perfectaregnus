<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = [
        'email',
        'name',
        'phone',
        'profile_image',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'email', 'email');
    }

    public function getProfileImageUrlAttribute(): ?string
    {
        return image_url($this->profile_image);
    }

    public static function syncFromOrder(Order $order): self
    {
        return self::updateOrCreate(
            ['email' => $order->email],
            [
                'name' => $order->customer_name,
                'phone' => $order->phone,
            ]
        );
    }
}
