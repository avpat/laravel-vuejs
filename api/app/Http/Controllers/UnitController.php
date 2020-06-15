<?php

namespace App\Http\Controllers;

use App\Http\Resources\UnitResourceCollection;
use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index():UnitResourceCollection
    {
        return new UnitResourceCollection(Unit::paginate());
    }
}
