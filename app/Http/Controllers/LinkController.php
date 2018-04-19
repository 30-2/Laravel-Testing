<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
//for validation
//class 'app http controllers validator' not found
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Log;
use View;
use App\Link;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $links = Link::paginate(10);
        Log::debug( $links);
        
       //return view('links.index', compact('links'));
        //return view('links.display', compact('links'));
        //return view('links.displaytable', compact('links'));
       /* if ($request->ajax()) {
    		$view = view('links.data',compact('links'))->render();
            return response()->json(['html'=>$view]);
        }*/

    	return view('links.testview',compact('links'));
    }
}
