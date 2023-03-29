<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function me(){
        $student = auth()->guard('student')->user()->student->makeHidden(['photo','created_at','updated_at','firstname','lastname']);
        return response()->json([
            'status'=>1,
            'message'=>$student
        ]);
    }
}
