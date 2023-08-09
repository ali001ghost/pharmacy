<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use Auth;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function store(Request $request)  {
        $pro=invoice::query()->create([
            'user_id' => Auth::user()->id,

            'name'=>$request->name,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
        ]);
        return response()->json([
            'success'
        ]);
    }

    public function get() {
        $products = invoice::query()
           ->where('user_id',Auth::user()->id)
            ->get();

        return response()->json([
            'success',
            'data' => $products
        ]);
    }
    public function getall() {
        $products = invoice::query()->with('user:id,name as pharmacy_name')
            ->get();

        return response()->json([
            'success',
            'data' => $products
        ]);
    }
}
