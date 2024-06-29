<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\DepartmentRequest;
use App\Models\Country;
use App\Models\Department;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $departments = Department::all();
        if ($request->has('search')){
            $departments = Country::where('name','like',"%{$request->search}%")->get();
        }
        return view('departments.index',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DepartmentRequest $request
     * @return RedirectResponse
     */
    public function store(DepartmentRequest $request)
    {
        Department::create($request->validated());

        return redirect()->route('departments.index')->with('message', 'Department Create Successfully');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Department $department
     * @return Factory|View
     */
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DepartmentRequest $request
     * @param Department $department
     * @return RedirectResponse
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        $department->update($request->validated());

        return redirect()->route('departments.index')->with('message', 'Department Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return RedirectResponse
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('message', 'Department Delete Successfully');
    }
}
