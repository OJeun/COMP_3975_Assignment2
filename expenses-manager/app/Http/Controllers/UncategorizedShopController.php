<?php

namespace App\Http\Controllers;

use App\Models\UncategorizedShop;
use Illuminate\Http\Request;

class UncategorizedShopController extends Controller
{
    public function insertUncategorizedShops()
    {
        $uncategorizedShop = new UncategorizedShop;
        $uncategorizedShop->insertUncategorizedShops();
        return response()->json(['message' => 'Uncategorized shops inserted successfully']);
    }
}