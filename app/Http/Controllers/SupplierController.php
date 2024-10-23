<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function create()
    {
        return view("master-data.supplier-master.create-supplier");

    }

    public function store(Request $request)
    {
        $validasi_data = $request->validate([
            'supplier_name' => 'required|string|max:255',
            'supplier_address' => 'required|string',
            'phone' => 'required|string|max:16',
            'comment' => 'nullable|string',
        ]);

        //proses simpan data kedalam database
        Supplier::create($validasi_data);
        return redirect()->back()->with('success', 'Supplier created successfully!');
    }
}
