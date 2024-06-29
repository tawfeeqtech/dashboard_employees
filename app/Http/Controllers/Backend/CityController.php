<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;

use App\Models\City;

use App\Models\State;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $cities = City::all();
        if ($request->has('search')) {
            $cities = City::where('name', 'like', "%{$request->search}%")->get();
        }
        return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $states = State::all();
        return view('cities.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CityRequest $request
     * @return RedirectResponse
     */
    public function store(CityRequest $request)
    {
        City::create($request->validated());

        return redirect()->route('cities.index')->with('message', 'City Create Successfully');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param City $city
     * @return Factory|View
     */
    public function edit(City $city)
    {
        $states = State::all();
        return view('cities.edit', compact('city','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CityRequest $request
     * @param City $city
     * @return RedirectResponse
     */
    public function update(CityRequest $request, City $city)
    {
        $city->update($request->validated());

        return redirect()->route('cities.index')->with('message', 'City Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param City $city
     * @return RedirectResponse
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('message', 'State Delete Successfully');
    }
}
