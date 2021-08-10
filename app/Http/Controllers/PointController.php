<?php

namespace App\Http\Controllers;

use App\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $points =Point::all();
        $pointsTable = [];
        foreach ($points as $point){
            $pointsTable[] = ['position' => ['lat'=>$point->lat,'lng'=>$point->lng], 'name' => $point->name];
        }
        return json_encode($pointsTable);
    }
    public function allPoints()
    {
        $points = Point::all();
        return view('allPoints', ['points' => $points]);
    }

    public function create()
    {
        return view('addPoint');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|string|max:255',
            'lat' => 'required|numeric|min:-90|max:90',
            'lng' => 'required|numeric|min:-180|max:180',
        ]);
        $newItem = new Point();
        $newItem->name = $validated['name'];
        $newItem->lat = $validated['lat'];
        $newItem->lng = $validated['lng'];
        $newItem->save();

        return redirect('allPoints');
    }

//    public function show(Point $point)
//    {
//        return Point::findOrFail($point['id'])->where('id', $point['id'])->first();;
//    }

    public function edit(Point $point)
    {
        $var = Point::findOrFail($point['id']);
        return view('edit', ['point' => $var]);
    }

    public function update(Request $request, Point $point)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|string|max:255',
            'lat' => 'required|numeric|min:-90|max:90',
            'lng' => 'required|numeric|min:-180|max:180',
        ]);
        $newItem = Point::find($point['id']);
        if ($newItem) {
            $newItem->name = $validated['name'];
            $newItem->lat = $validated['lat'];
            $newItem->lng = $validated['lng'];
            $newItem->save();
            return redirect('allPoints');
        }
        return "Item not found";
    }

    public function destroy(Point $point)
    {
        Point::destroy($point['id']);
        return redirect('allPoints');
    }
}
