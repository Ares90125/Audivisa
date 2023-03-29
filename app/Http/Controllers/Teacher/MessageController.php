<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Requests\Teacher\CreateMessageRequest;

class MessageController extends Controller
{
    public function list(){
        $user = auth()->guard('teacher')->user();
        $message=Message::where('sender_id',$user->id)->orWhere('receiver_id',$user->id)->get()->makeHidden(['type','created_at','updated_at','firstname','lastname']);
        return response()->json([
            'status'=>1,
            'message'=>$message
        ]);
    }
    public function create(CreateMessageRequest $request){
        try {
            \DB::beginTransaction();
            $user = auth()->guard('teacher')->user();
            Message::create([
                'sender_id'=>$user->id,
                'receiver_id'=>$request->receiver_id,
                'message'=>$request->message,
                'type'=>$request->type,
            ]);
            \DB::commit();
            return response()->json([
                'status' => 1
            ], 200);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
