<?php

namespace Community\Providers;

use AnthonyMartin\GeoLocation\GeoLocation as GeoLocation;
use Illuminate\Support\ServiceProvider;
use Community\Exceptions\InvalidAddressException;
use Community\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Set user's longitude and latitude on saving (update and create)
        User::saving(function ($user) {
            try {
                $response = GeoLocation::getGeocodeFromGoogle($user->address);
                $user->latitude = $response->results[0]->geometry->location->lat;
                $user->longitude = $response->results[0]->geometry->location->lng;
            } catch (\Exception $e) {
                throw new InvalidAddressException("It seems that your address is missing or invalid.");
                // return false;
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
