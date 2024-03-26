<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaction::all();
        return view('/index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function import()
    {
        return view('/import/index');
    }

    public function processImport(Request $request)
    {
    $request->validate([
        'csvFile' => 'required|mimes:csv'
    ]);
    $file = $request->file('csvFile');

    if ($file) {
        $originalFileName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $fileNameWithoutExtension = pathinfo($originalFileName, PATHINFO_FILENAME); 
        $newFileName = $fileNameWithoutExtension . '.imported.' . $extension;
        
        $storagePath = storage_path('app/public/csv');
        $file->move($storagePath, $newFileName);
        // if (Transaction::count() > 0) {
        //     Transaction::truncate();
        //     return redirect()->route('import')->with('message', 'All transactions deleted.');
        // } else {
        //     return redirect()->route('import')->with('message', 'Not deleted');
        // }
        $this->insertTransactions($storagePath . '/' . $newFileName);
        return redirect()->route('import')->with('message', $newFileName . " uploaded and processed successfully.");

    } else {
        return redirect()->route('import')->with('error', 'Cannot upload the file.');
    }
    }

    private function insertTransactions($file)
    {
        $file = fopen($file, 'r');
        $data = fgetcsv($file);
        while (($data = fgetcsv($file)) !== false) {
            $date = date('Y-m-d', strtotime($data[0]));
            Transaction::create([
                'date' => $date,
                'ShopName' => $data[1],
                'MoneySpent' => $data[2],
            ]);
        }
        fclose($file);
    }
}
