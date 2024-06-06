<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GetWeatherData
{
    use AsAction;

    public function handle(string $location)
    {
        $WEATHER_API_KEY = env('WEATHER_API_KEY');
        $WEATHER_URL = 'http://api.weatherapi.com/v1/current.json';

        $response = Http::get($WEATHER_URL, [
            'key' => $WEATHER_API_KEY,
            'q' => $location,
        ]);

        if ($response->successful()) {
            $weatherData = $response->json();
            return $weatherData;
        } else {
            return null;
        }
    }

    public function asController(Request $request)
    {
        $weatherData = $this->handle(
            $request->input('location', 'London')
        );

        return Inertia::render('Home', [
            'weatherData' => $weatherData,
        ]);
    }
}
