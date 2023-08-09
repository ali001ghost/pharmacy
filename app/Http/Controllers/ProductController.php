<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $pro = product::query()->create([
            'name' => $request->name,
            'exp_day' => $request->exp_day,
            'pro_day' => $request->pro_day,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'amount' => $request->amount,
            'factory_id' => $request->factory_id
        ]);
        return response()->json([
            'success'
        ]);
    }

    public function get(Request $request)
    {
        $pro = product::query()->where('status', '1')
            ->where('category_id', $request->category_id)->get();

        return response()->json([
            'success'
            ,
            'data' => $pro
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = product::query()
            ->where('name', 'like', $query . '%')
            ->get();

        return response()->json([
            'success',
            'data' => $products
        ]);
    }
    public function hide(Request $request)
    {
        $result = product::query()->where('id',$request->id)->update(
            [
                'status' => 0
            ]
        );
        return response()->json(['success']);
    }

    public function charge(Request $request)
    {
        $result = User::where('id', $request->id)->increment('wallet', $request->amount);

        if ($result) {
            return response()->json(['success']);
        } else {
            return response()->json(['error'], 500);
        }
    }}
