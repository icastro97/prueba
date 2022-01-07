<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Products;

class apiPrueba extends Controller
{
    public function endpoint1($id)
    {
        try {
            $info = Product::find($id);
            return response()->json($info->variaciones, 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    
    }

    public function endpoint2()
    {
        try {
            $info = Product::all();
            return response()->json($info, 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
}
