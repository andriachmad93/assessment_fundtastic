<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['id', 'invoice', 'product_name', 'email', 'created_at', 'updated_at'];
}
