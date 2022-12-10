<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'players';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'user_id',
    'name',
    'cash_amount'
  ];

  protected $appends = [
    
  ];
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function items()
  {
    return $this->belongsToMany(Item::class, 'player_items', 'player_id', 'item_id')->withPivot(["using"]);
  }
  public function useItems()
  {
    return $this->items()->where('player_items.using','=','1');
  }
  public function unuseItems()
  {
    return $this->items()->where('player_items.using','=','0');
  }
  public function allitems()
  {
    return $this->items();
  }
}
