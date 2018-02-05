<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;

class SearchController extends Controller
{
    // public function __construct()
    // {
    //     $mylink = true;
    // }


    public function mySearch(Request $request)
    {

    	if($request->has('search')){
        $mylink = false;
        $vacancies = Vacancy::search($request->get('search'))->orderBy('id', 'desc')->get();
    	}else{
        $mylink = true;
    		$vacancies = Vacancy::orderBy('id', 'desc')->paginate(10);
    	}


    	return view('index', compact('vacancies', 'mylink'));
    }
}
