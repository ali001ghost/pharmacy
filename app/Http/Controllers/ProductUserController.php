<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\ProductUser;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductUserController extends Controller
{
    public function store(Request $request)
    {
        $product = Product::find($request->product_id);

        if (!$product) {
            return response()->json([
                'error' => 'not found'
            ], 404);
        }

        if ($product->amount < $request->quantity) {
            return response()->json([
                'error' => 'not enough products'
            ], 400);
        }

        $totalPrice = $product->price * $request->quantity;

        $user = Auth::user();

        if ($user->wallet < $totalPrice) {
            return response()->json([
                'error' => 'charge your wallet'
            ], 400);
        }

        $newWalletBalance = $user->wallet - $totalPrice;

        DB::transaction(function () use ($request, $product, $totalPrice, $newWalletBalance) {
            ProductUser::create([
                'product_id' => $request->product_id,
                'user_id' => Auth::user()->id,
                'quantity' => $request->quantity,
                'total_price' => $totalPrice
            ]);

            $product->update([
                'amount' => $product->amount - $request->quantity
            ]);

            Auth::user()->update([
                'wallet' => $newWalletBalance
            ]);
        });

        return response()->json([
            'success'
        ]);
    }
    public function myproduct(Request $request)
    {

        $products = ProductUser::query()
            ->where('user_id', Auth::user()->id)
            ->get();

        return response()->json([
            'success',
            'data' => $products
        ]);
    }

    public function get()
    {
        $products = ProductUser::query()
            ->with('user:id,name as username')

            ->get();

        return response()->json([
            'success',
            'data' => $products
        ]);
    }
}
