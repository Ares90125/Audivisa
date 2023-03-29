<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\CreateMessageRequest;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Enums\User\Type as UserType;
use App\Models\User;


class MessageController extends Controller
{
    public function list(){
        $user = auth()->guard('student')->user();
        $message=Message::where('sender_id',$user->id)->orWhere('receiver_id',$user->id)->get()->makeHidden(['type','created_at','updated_at','firstname','lastname']);
        return response()->json([
            'status'=>1,
            'message'=>$message
        ]);
    }
    public function create(CreateMessageRequest $request){
        $receiver=User::where('id',$request->receiver_id);
        if($receiver->role!=UserType::TEACHER){
            return response()->json([
                'status' => 0,
                'message'=>'Student can only send message to Teacher'
            ], 200);
        }
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
