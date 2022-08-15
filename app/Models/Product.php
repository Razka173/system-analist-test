<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'quantity',
        'customer_name',
        'total_cost_of_goods_sold',
        'total_price_sold',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'product_id');
    }
}
