<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WebAjaxController extends Controller
{
    public function getModels(Request $request)
    {
        $make = $request->input('make');
        $models = Stock::whereHas('make', function ($r) use ($make) {
            $r->where('name', $make);
        })->orderBy('make')->distinct()->pluck('model');

        return response()->json($models);
    }

    public function getFueltype(Request $request)
    {
        $model = $request->input('model');
        $result = [];
        $fueltype = Stock::where('model', $model)->orderBy('fuel')->pluck('fuel');
        foreach ($fueltype as $fuel) {
            if (in_array($fueltype, $fuel) == null) {
                array_push($result, $fueltype);
            }
        }

        return response()->json($result);
    }

    public function getYears(Request $request)
    {
        $model = $request->input('model');
        $result = Stock::where('model', $model)->orderBy('year', 'ASC')->distinct()->pluck('year');

        return response()->json($result);
    }

    public function addWishlist(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => ['required', 'in:users.id'],
            'stock_id' => ['required', 'in:stocks.id'],
        ]);

        Wishlist::create($validated);

        return response()->json();
    }
}
