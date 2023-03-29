<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function me(){
        $parent = auth()->guard('parent')->user()->parent->makeHidden(['photo','created_at','updated_at','firstname','lastname']);
        return response()->json([
            'status'=>1,
            'message'=>$parent
        ]);
    }
}
