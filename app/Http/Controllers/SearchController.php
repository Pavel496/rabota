<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;

class SearchController extends Controller
{
    public function mySearch(Request $request)
    {
    	if($request->has('search')){
    		$vacancies = Vacancy::search($request->get('search'))->orderBy('id', 'desc')->paginate(10);	
    	}else{
    		$vacancies = Vacancy::orderBy('id', 'desc')->paginate(10);
    	}


    	return view('index', compact('vacancies'));
    }
}
