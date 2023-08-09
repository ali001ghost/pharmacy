<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
public function get()  {
    $cat=category::query()->get();
    return response()->json([
        'success'
        ,'data'=>$cat
    ]);

}
}
