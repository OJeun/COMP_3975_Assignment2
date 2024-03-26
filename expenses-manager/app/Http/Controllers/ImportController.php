<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class ImportController extends Controller
{
    public function import()
    {
        return view('/import/index');
    }

    public function processImport(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:csv',
        ]);

        $file = $request->file('file');

        $path = $file->storeAs('imports', $file->getClientOriginalName());
        dd($path);
        

        $handle = fopen(storage_path('app/' . $path), 'r');
        $header = fgetcsv($handle, 1000, ",");

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $transactionData = array_combine($header, $data);
            Transaction::create($transactionData);
        }

        fclose($handle);

        return redirect()->route('import')->with('message', 'File uploaded and processed successfully.');
    }
}
