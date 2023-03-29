<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function me(){
        $teacher = auth()->guard('teacher')->user()->teacher->makeHidden(['photo','created_at','updated_at','firstname','lastname']);
        return response()->json([
            'status'=>1,
            'message'=>$teacher
        ]);
    }
}
