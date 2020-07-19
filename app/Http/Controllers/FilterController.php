<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Activity;
use App\Destination;
use App\Category;

class FilterController extends Controller
{
    public function filterByPreferance(Request $request)
    {
        $categories = $request->input('data');

        $data = Destination::whereHas('destinationToLocations.locationToActivity', function ($query) use ($categories) {
                $query->whereHas('activityToCategories', function ($query) use ($categories) {
                    $query->whereIn('categorys.id', $categories);
                });
        })
            ->with([
                'destinationToLocations' => function ($hasMany) use ($categories) {
                    $hasMany->whereHas('locationToActivity', function ($query) use ($categories) {
                        $query->whereHas('activityToCategories', function ($query) use ($categories) {
                            $query->whereIn('categorys.id', $categories);
                        });
                    });
                },
                'destinationToLocations.locationToActivity' => function ($belongsTo) use ($categories) {
                    $belongsTo->whereHas('activityToCategories', function ($query) use ($categories) {
                        $query->whereIn('categorys.id', $categories);
                    });
                },
                'destinationToLocations.locationToActivity.activityToCategories' => function ($hasMany) use ($categories) {
                    $hasMany->whereIn('categorys.id', $categories);
                }
                ])->get();

        return response()->json($data, 200);
    }
}
