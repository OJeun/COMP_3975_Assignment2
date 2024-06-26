<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['date', 'ShopName', 'MoneySpent'];
    public $timestamps = false;

    use HasFactory;
}
