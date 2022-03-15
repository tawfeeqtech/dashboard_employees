<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class EmployeeDataController extends Controller
{
    public function countries()
    {
        $countries = Country::all();
        return response()->json($countries);
    }

    public function states()
    {

    }

    public function departments()
    {

    }

    public function cities()
    {

    }
}
