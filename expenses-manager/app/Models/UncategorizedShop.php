<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UncategorizedShop extends Model
{
    use HasFactory;

    public function insertUncategorizedShops(): void
    {
        DB::statement("
            INSERT INTO uncategorized_shops (shop_name)
            SELECT t.shop_name
            FROM transactions t
            LEFT JOIN buckets b ON b.shop_name = t.shop_name
            WHERE b.shop_name IS NULL
        ");
    }
}
