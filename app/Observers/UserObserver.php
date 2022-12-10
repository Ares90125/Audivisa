<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Player;
use App\Models\Admin;
use App\Models\PlayerItem;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        if ($user->role == 'admin') {
            Admin::create([
                'name' => $user->name,
                'user_id' => $user->id
            ]);
        } else{
            $player=Player::create([
                'name' => $user->name,
                'user_id' => $user->id
            ]);
            for($i = 0; $i < 10; $i++):
                PlayerItem::create([
                    'player_id' => $player->id,
                    'item_id' => ($i+1),
                    'using' => 1
                ]);
            endfor;
            PlayerItem::create([
                'player_id' => $player->id,
                'item_id' => 11,
                'using' => 0
            ]);
        }
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
