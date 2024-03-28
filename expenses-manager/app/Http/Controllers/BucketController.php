<?php

namespace App\Http\Controllers;

use App\Models\Bucket;
use Illuminate\Http\Request;

class BucketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.bucket', ['buckets' => Bucket::all()]);   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bucketsData = [
            ['category' => 'Entertainment', 'shopName' => 'ST JAMES RESTAURAT'],
            ['category' => 'Donation', 'shopName' => 'RED CROSS'],
            ['category' => 'Groceries', 'shopName' => 'SAFEWAY'],
            ['category' => 'Insurance', 'shopName' => 'GATEWAY MSP'],
            ['category' => 'Dining', 'shopName' => 'PUR & SIMPLE RESTAUR'],
            ['category' => 'Dining', 'shopName' => 'Subway'],
            ['category' => 'Groceries', 'shopName' => 'REAL CDN SUPERS'],
            ['category' => 'Insurance', 'shopName' => 'ICBC INS'],
            ['category' => 'Utility', 'shopName' => 'FORTISBC GAS'],
            ['category' => 'Bank', 'shopName' => 'BMO'],
            ['category' => 'Groceries', 'shopName' => 'WALMART STORE'],
            ['category' => 'Groceries', 'shopName' => 'COSTCO WHOLESAL'],
            ['category' => 'Dining', 'shopName' => 'MCDONALDS'],
            ['category' => 'Dining', 'shopName' => 'WHITE SPOT RESTAURAN'],
            ['category' => 'Utility', 'shopName' => 'SHAW CABLE'],
            ['category' => 'Utility', 'shopName' => 'CANADIAN TIRE'],
            ['category' => 'Donation', 'shopName' => 'World Vision MSP'],
            ['category' => 'Dining', 'shopName' => 'TIM HORTONS'],
            ['category' => 'Groceries', 'shopName' => '7-ELEVEN STORE'],
            ['category' => 'Bank', 'shopName' => 'CHQ'],
            ['category' => 'Utility', 'shopName' => 'ROGERS MOBILE'],
            ['category' => 'Insurance', 'shopName' => 'ICBC'],
            ['category' => 'Bank', 'shopName' => 'O.D.P'],
            ['category' => 'Bank', 'shopName' => 'MONTHLY ACCOUNT FEE'],
        ];
        
        foreach ($bucketsData as $data) {
            $shopName = $data['shopName'];
    
            $existingBucket = Bucket::where('shopName', $shopName)->first();
    
            // If the shop name doesn't exist, create a new bucket
            if (!$existingBucket) {
                Bucket::create($data);
            } 
        }

        return redirect()->route('bucket');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bucket $bucket)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bucket = Bucket::find($id);
        return view('admin.edit', ['bucket' => $bucket]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'shopName' => 'required',
        ]);
    
        $bucket = Bucket::find($id);
        $bucket->category = $request->category;
        $bucket->shopName = $request->shopName;
        $bucket->save();
    
        return redirect()->route('bucket')->with('message', 'Bucket updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bucket $bucket)
    {
        //
    }
}
