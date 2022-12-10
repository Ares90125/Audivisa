<?php
namespace App\Services\Player;

use Illuminate\Support\Arr;
use App\Models\Player;
use App\Models\Item;
use App\Models\PlayerItem;
use DB;
use Auth;
use Throwable;

/**
 * Class ProfileService
 * @package App\Services\User
 */
class ProfileService
{ 
  public function useItem($id) {
    return Player::with([
      'useItems',
    ])->where('id', $id)
    ->firstOrFail();
  }
  public function unuseItem($id) {
    return Player::with([
      'unuseItems',
    ])->where('id', $id)
    ->firstOrFail();
  }
  public function allItem($id) {
    return Player::with([
      'allItems',
    ])->where('id', $id)
    ->where('player_items.using','=','1')
    ->firstOrFail();
  }
  public function buyItem($id, $itemId) {
    $query=Item::with([
      'players',
    ])->where('id', $itemId);
    $query->whereHas('players',function($suvquery) use ($id) {
        $suvquery->where('players.id', $id);
    });
    $item=$query->first();
    if($item){
        return "item is already buyed by you or not exit item";
    }
    $item=Item::with([
      'players',
    ])->where('id', $itemId)->first();
    $player=Player::where('cash_amount', '>', $item->price)
      ->where('id', $id)
      ->first();
    if(!$player){
       return 'not enough money';
    }
    $player->update(['cash_amount'=>($player->cash_amount-$item->price)]);
    $player->items()->attach($item->id);
    return $player;
  }
  public function updateuseitem($id, $params) {
    $query=Player::with([
      'items',
    ])->where('id', $id);
    foreach ($params as $param) {
      // return $param;
      $query->whereHas('items',function($suvquery) use ($param) {
          $suvquery->where('items.id', $param);
      });
    }
    $player=$query->first();
    if(!$player){
      return 'please send correct item';
    }
    PlayerItem::where('player_id', $id)->update(['using'=>0]);
    foreach ($params as $param) {
      PlayerItem::where('player_id', $id)->where('item_id', $param)->update(['using'=>1]);
    }
    return $this->useItem($id);
  }
}
