<?php


namespace App\Services;

use Illuminate\Support\Facades\Http;


class Location
{
    public static function locationGet($ip)
    {
        $url = 'https://api.ipgeolocation.io/ipgeo?apiKey=' . env('API_LOCATION_KEY') . '&ip=' . $ip;

        $response = Http::withHeaders(['Content-Type' => 'application/json'])
            ->get($url);

        $response = json_decode($response->body(), true);

        $country = isset($response['country_name']) ? $response['country_name'] : 'unknown';
        $city    = isset($response['city']) ? $response['city'] : 'unknown';

        return $country . ' : ' . $city;
    }
}
