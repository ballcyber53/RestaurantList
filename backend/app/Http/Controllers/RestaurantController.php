<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Cache::remember('restaurants_data', '60', function () {
            return Restaurant::get();
        });

        return response()->json([
            'message' => 'Success',
            'Restaurants' => $restaurants
        ], 201);
    }

    public function searchLocations(Request $request)
    {
        $query = $request->get('query');

        // Check if the search result is cached
        $cacheKey = 'location_search:' . $query;
        if (Cache::has($cacheKey)) {
            $result = Cache::get($cacheKey);
        } else {
            // Perform the actual search operation in the database
            $result = Restaurant::where('name', 'like', "%$query%")->first();
            // Cache the search result for a specific duration
            Cache::put($cacheKey, $result, now()->addMinutes(5));
        }
        return response()->json($result);
    }
}
