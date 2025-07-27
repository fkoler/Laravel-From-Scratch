<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;

class GeocodeController extends Controller
{
    /**
     * @desc Make request to Mapbox Geocoding API.
     * @route GET /geocode
     * 
     * @return JsonResponse
     */
    public function geocode(Request $request): JsonResponse
    {
        $address = $request->query('address');

        if (!$address) {
            return response()->json(['error' => 'Address is required'], 400);
        }

        $accessToken = env('MAPBOX_API_KEY');

        $response = Http::get(
            'https://api.mapbox.com/geocoding/v5/mapbox.places/' . urlencode($address) . '.json',
            ['access_token' => $accessToken]
        );

        if ($response->failed()) {
            return response()->json(['error' => 'Failed to fetch location'], 500);
        }

        return response()->json($response->json());
    }
}
