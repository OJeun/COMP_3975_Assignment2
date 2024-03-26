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
        return view('/index');

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

    // Check if a file was uploaded
    if ($file) {
        $originalFileName = $file->getClientOriginalName(); // Get the original filename
        $extension = $file->getClientOriginalExtension(); // Get the file extension
        $fileNameWithoutExtension = pathinfo($originalFileName, PATHINFO_FILENAME); // Get the filename without extension
        
        // Construct the new filename with "imported" inserted before the extension
        $newFileName = $fileNameWithoutExtension . '.imported.' . $extension;
        
        $storagePath = storage_path('app/public/csv');
        $file->move($storagePath, $newFileName);
        return redirect()->route('import')->with('message', $newFileName . " uploaded and processed successfully.");
    } else {
        // If no file was uploaded, return with an error message
        return redirect()->route('import')->with('error', 'No file uploaded.');
    }
    }
}
