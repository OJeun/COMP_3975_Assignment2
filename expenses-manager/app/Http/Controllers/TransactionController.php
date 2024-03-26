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
        // I want to show the transaction data that is not null in the MoneySpent column.
        $data = Transaction::whereNotNull('MoneySpent')->where('MoneySpent', '!=', '')->get();
        return view('/index', ['transactions' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'ShopName' => 'required',
            'MoneySpent' => 'required'
        ]);

        Transaction::create([
            'date' => $request->date,
            'ShopName' => $request->ShopName,
            'MoneySpent' => $request->MoneySpent
        ]);

        return redirect()->route('index')->with('message', 'Transaction added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaction = Transaction::find($id);
        return view('transaction.edit', ['transaction' => $transaction]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'ShopName' => 'required',
            'MoneySpent' => 'required'
        ]);

        $transaction = Transaction::find($id);
        $transaction->date = $request->date;
        $transaction->ShopName = $request->ShopName;
        $transaction->MoneySpent = $request->MoneySpent;
        $transaction->save();

        return redirect()->route('index')->with('message', 'Transaction updated successfully.');

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
