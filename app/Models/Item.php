<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'category_id',
      'name',
      'image'
    ];
  
    protected $appends = [
        'category_name'
    ];
    public function players()
  {
    return $this->belongsToMany(Player::class, 'player_items', 'item_id', 'player_id')->withPivot(["using"]);
  }
    public function category()
    {
      return $this->belongsTo(Category::class);
    }
    public function getCategoryNameAttribute()
    {
        return $this->category()->first()->name;
    }
}
