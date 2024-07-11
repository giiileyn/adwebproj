<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'client_id',
        'seller_id',
        'category_id',
        'item_id',
        'order_date',
        'order_status',
        'order_total',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function items()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
