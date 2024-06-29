<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\EmployeeSingleResource;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $employees = Employee::all();
        if ($request->search) {
            $employees = Employee::where('first_name', 'like', "%{$request->search}%")
                ->orWhere('last_name', 'like', "%{$request->search}%")->get();
        } elseif ($request->department_id && $request->department_id !== 'selected') {
            $employees = Employee::where('department_id', 'like', "%{$request->department_id}%")
                ->get();
        }
        return EmployeeResource::collection($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeeRequest $request
     * @return JsonResponse
     */
    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());

        return response()->json($employee);
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return EmployeeSingleResource
     */
    public function show(Employee $employee)
    {
        return new EmployeeSingleResource($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeeRequest $request
     * @param Employee $employee
     * @return void
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return JsonResponse
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json('Employee Delete Successfully');
    }
}
