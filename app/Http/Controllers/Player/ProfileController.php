<?php

namespace App\Http\Controllers\player;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\Player\ProfileService;
use App\Models\Player;
use App\Models\Category;

class ProfileController extends Controller
{

    /**
     * @var ProfileService
     */
    protected $service;

    public function __construct(
        ProfileService $service
    ) {
        $this->service = $service;
    }

    public function useItem()
    {
        $data=$this->service->useItem(auth()->guard('player')->user()->player->id);
        return response()->json([
            'status' => 1,
            'data' => $data,
        ]);
    }
    public function unuseItem()
    {
        $data=$this->service->unuseItem(auth()->guard('player')->user()->player->id);
        return response()->json([
            'status' => 1,
            'data' => $data,
        ]);
    }  
    public function allItem()
    {
        $data=$this->service->allItem(auth()->guard('player')->user()->player->id);
        return response()->json([
            'status' => 1,
            'data' => $data,
        ]);
    }  
    public function buyItem(Request $request, $itemId)
    {
        $data=$this->service->buyItem(auth()->guard('player')->user()->player->id, $itemId);
        return response()->json([
            'status' => 1,
            'data' => $data,
        ]);
    }
    public function updateuseitem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            '0' => 'required|integer',
            '1' => 'required|integer',
            '2' => 'required|integer',
            '3' => 'required|integer',
            '4' => 'required|integer',
            '5' => 'required|integer',
            '6' => 'required|integer',
            '7' => 'required|integer',
            '8' => 'required|integer',
            '9' => 'required|integer',
        ],);
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => 'failed',
                'errors' => 'please input correct'
            ]);
        }
        $params=$request->all();
        $data=$this->service->updateuseitem(auth()->guard('player')->user()->player->id, $params);
        return response()->json([
            'status' => 1,
            'data' => $data,
        ]);
    }
}
