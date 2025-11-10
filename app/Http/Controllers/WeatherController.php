<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Pool;

class WeatherController extends Controller
{
    private $API_KEY;
    public function __construct()
    {
        $this->API_KEY = env('WEATHER_API_KEY');
    }
    public function __invoke()
    {

        $cities = ['Chisinau', 'Madrid', 'Kyiv', 'Amsterdam'];
        $results = [];

        try {

            $response = Http::pool(fn(Pool $pool) =>
                array_map(function($city) use ($pool) {
                    return $pool->post('http://api.weatherapi.com/v1/current.json', [
                        'key' => $this->API_KEY,
                        'q' => $city
                    ]);
                }, $cities)
            );

            return response()->json($response);
        } catch (RequestException $e) {
            return $e->getMessage();
        }
    }
}
