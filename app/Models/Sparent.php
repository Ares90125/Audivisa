<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparent extends Model
{
      /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'parents';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id',
    'firstname',
    'lastname',
    'photo',
  ];

  protected $appends = [
    'full_name',
    'image',
    'email',
  ];
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function getFullNameAttribute(){
    return 'Sir '.$this->firstname.' '.$this->firstname;
  }
  public function getImageAttribute(){
    if(isset($this->photo)){
      return  $this->photo;
    }else{
      return 'default.png';
    }
  }
  public function getEmailAttribute(){
    return $this->user()->first()->email;
  }
}
