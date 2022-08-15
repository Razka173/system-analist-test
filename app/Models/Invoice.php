<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'invoice_no',
        'date',
        'customer_name',
        'salesperson_name',
        'payment_type',
        'notes',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
