<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UncategorizedShop extends Model
{
    use HasFactory;

    public function insertUncategorizedShops(): void
    {
        Schema::dropIfExists('uncategorized_shops');

        DB::statement("
            CREATE TABLE uncategorized_shops (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                shop_name TEXT NOT NULL
            )
        ");

        DB::statement("
        INSERT INTO uncategorized_shops (shop_name)
        SELECT t.ShopName
        FROM transactions t
        LEFT JOIN buckets b ON b.shopName = t.ShopName
        WHERE b.shopName IS NULL
    ");
    }

    public function removeSimilarShops(): void
    {
        DB::statement("
        DELETE FROM uncategorized_shops
        WHERE EXISTS (
            SELECT 1 FROM buckets
            WHERE uncategorized_shops.shop_name LIKE '%' || buckets.shopName || '%'
        )
    ");
    }
}
