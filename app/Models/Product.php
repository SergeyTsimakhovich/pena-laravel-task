<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory, SoftDeletes, Notifiable;

    protected const STATUS_AVAILABLE = 'available';
    protected const STATUS_UNAVAILABLE = 'unavailable';

    protected $fillable = [
      'article',
      'name',
      'status',
      'data'
    ];

    protected $casts = [
        'data' => 'array'
    ];

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeIsAvailable(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_AVAILABLE);
    }

    /**
     * Маршрутизация уведомлений для почтового канала.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return array|string
     */
    public function routeNotificationForMail($notification)
    {
        return config('products.email');
    }
}
