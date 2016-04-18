<?php

namespace Community\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
	public function boot(GateContract $gate)
	{
        $gate->define('update-post', function ($user, $post) 
        {
            return $user->id === $post->user_id;
        });
    }
}