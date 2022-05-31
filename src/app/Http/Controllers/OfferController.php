<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index() {
        try {
            $offers = Offer::getAllOffers();
            return response()->json(["status" => "success", "data" => $offers], 200);
        } catch (Throwable $th) {
            return response()->json(["status" => "error", "data" => $th->getMessage()], 422);
        }
    }

    public function store(StoreOfferRequest $request) {
        try {
            $offer = Offer::storeOffer($request->all());
            return response()->json(["status" => "success", "data" => $offer], 201);
        } catch (Throwable $th) {
            return response()->json(["status" => "error", "data" => $th->getMessage()], 422);
        }
    }
}
