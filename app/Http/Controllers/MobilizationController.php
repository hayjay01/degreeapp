<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MobilizationController extends Controller
{
    public function index(Request $r)
    {
    	$method = $r->isMethod('post');

    	switch ($method) {
    		case true:
    			
    			break;
    		
			case false:
				return view('user.index');    			
    			break;
    	}
    	
    }
}
