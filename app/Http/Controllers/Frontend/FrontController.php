<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Stadium;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $stadiums = Stadium::paginate(12);
        return view('site.page.home', compact('stadiums'));
    }

    public function statiumDetails(string $id) {

        $stadium = Stadium::where('id', $id)->first();
        return view('site.page.stadium-details',compact('stadium'));

    }
}
