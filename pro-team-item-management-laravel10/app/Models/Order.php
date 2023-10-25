<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model


{    

    use HasFactory;
    protected $fillable = [
         
        'p_id',
        'p_name',
        'p_stock',
        'p_date',
        'p_order',

    ];

    public $timestamps = false;
    protected $primaryKey = 'p_id';


}
