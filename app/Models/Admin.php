<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'admins';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id',
    'name',
  ];

  protected $appends = [
    
  ];
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
