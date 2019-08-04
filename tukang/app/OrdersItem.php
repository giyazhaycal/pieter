<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersItem extends Model
{
    protected $table = 'orders_item';
    protected $primaryKey = 'order_item_id';
}
