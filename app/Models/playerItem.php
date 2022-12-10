<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class playerItem extends Model
{
    use HasFactory;
    protected $table = 'player_items';

    protected $fillable = [
        'player_id',
        'item_id'
      ];
    
      protected $appends = [
      ];
      public function player()
      {
        return $this->belongsTo(Player::class)->withPivot(["using"]);
      }
}
