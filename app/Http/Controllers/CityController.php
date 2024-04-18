<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function show(string $id)
    {
        return json_encode(City::find($id));
    }
}
