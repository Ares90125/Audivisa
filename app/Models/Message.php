<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Message extends Model
{
       /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'messages';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'sender_id',
    'receiver_id',
    'message',
    'type',
    'created_at',
  ];

  protected $appends = [
    'sender_name',
    'receiver_name',
    'creation_time',
    'message_role'
  ];
  public function sender()
  {
    return $this->belongsTo(User::class,'sender_id');
  }
  public function receiver()
  {
    return $this->belongsTo(User::class,'receiver_id');
  }
  public function getMessageRoleAttribute(){
    if($this->role){
      return 'System';
    }
    else{
      return 'Manual';
    }
  }
  public function getSenderNameAttribute(){
    return $this->sender()->first()->profile->full_name;
  }
  public function getReceiverNameAttribute(){
    return $this->receiver()->first()->profile->full_name;
  }
  public function getcreationTimeAttribute(){
    return Carbon::parse($this->created_at)->timestamp;
  }
}
