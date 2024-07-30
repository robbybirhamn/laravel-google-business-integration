<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GoogleMyBusinessService;

class GoogleMyBusinessController extends Controller
{
    protected $googleMyBusinessService;

    public function __construct(GoogleMyBusinessService $googleMyBusinessService)
    {
        $this->googleMyBusinessService = $googleMyBusinessService;
    }

    public function getRelatedBusinesses(Request $request)
    {
        $placeId = $request->input('place_id'); // Assume place_id is passed as a query parameter

        if (!$placeId) {
            return response()->json(['error' => 'place_id is required'], 400);
        }

        try {
            $relatedBusinesses = $this->googleMyBusinessService->getRelatedBusinesses($placeId);
            return response()->json($relatedBusinesses);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
