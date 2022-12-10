<?php

namespace App\Http\Controllers\Player\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Player;
use App\Enums\User\Type as UserType;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Auth;

class RegisterController extends Controller
{
    protected $guardName;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ],
        [
            'email.required' => 'email is required',
            'password.required' => 'password is required',
            'password.min' => 'enter over than 6 letter'
        ]);
        
    }
    protected function register(Request $request){
       
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => 'Error',
                'errors' => $validator->getMessageBag()->toArray()
            ]);
        }
        $user=User::where('email',$request['email'])->first();
         if ($user) {
            return response()->json([
                'status' => 0,
                'message' => 'Error',
                'errors' => 'use another email'
            ]);
        }
        
        $user=$this->create($request->all());
        if ($user==false) {
            return response()->json([
                'status' => 0,
                'message' => 'Error',
                'errors' => 'Error Occured'
            ]);
        }
        return response()->json([
            'status' => 1,
            'message' => 'success',
        ]);
    }
    protected function create(array $data)
    {
        \DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'role' =>  UserType::PLAYER,
                'is_active' => 1
            ]);

            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollBack();
            \Log::error($e->getMessage());

            return false;
        }
        return $user;
    }
}
