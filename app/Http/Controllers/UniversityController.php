<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;

class UniversityController extends Controller
{

    function index(){
       return University::with('students')->get();
    }

}
