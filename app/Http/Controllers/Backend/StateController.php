<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateRequest;
use App\Models\Country;
use App\Models\State;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $states = State::all();
        if ($request->has('search')) {
            $states = State::where('name', 'like', "%{$request->search}%")->get();
        }
        return view('states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $countries = Country::all();
        return view('states.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StateRequest $request
     * @return RedirectResponse
     */
    public function store(StateRequest $request)
    {
        State::create($request->validated());

        return redirect()->route('states.index')->with('message', 'State Create Successfully');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param State $state
     * @return Factory|View
     */
    public function edit(State $state)
    {
        $countries = Country::all();
        return view('states.edit', compact('state','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StateRequest $request
     * @param State $state
     * @return RedirectResponse
     */
    public function update(StateRequest $request, State $state)
    {
        $state->update($request->validated());

        return redirect()->route('states.index')->with('message', 'State Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param State $state
     * @return RedirectResponse
     */
    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('states.index')->with('message', 'State Delete Successfully');
    }
}
