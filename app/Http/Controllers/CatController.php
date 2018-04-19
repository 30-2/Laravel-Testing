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
use App\Cat;
use Auth;

class CatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$Cats = Cat::all();
    	//$cat = Cat::find(1);
    	//$orderCount = Order::count();
    	//$maximumTotal = Order::max('amount');
    	//$minimumTotal = Order::min('amount');
    	//$averageTotal = Order::avg('amount');
    	//$lifetimeSales = Order::sum('amount');
    	echo "Welcome from Cat Controller";
    	
        //$users = DB::select('select * from breeds');
        print_r($Cats);
    	foreach ($Cats as $cat) {
            echo $cat->breed_id;
            echo "<br/>";
            //foreach ($users->flatMap->podcasts as $podcast) {
            //    echo $podcast->subscription->created_at;
           // }
            //$employee = $cat->breed()->where('id',$cat->breed_id)->get(); 
            print_r($cat->breed->name);
    		echo "<br/>";
    		echo $cat->name;
    	}
    }
    public function display()
    {
    	$Cats = Cat::all();
    	//$cat = Cat::find(1);
    	//$orderCount = Order::count();
    	//$maximumTotal = Order::max('amount');
    	//$minimumTotal = Order::min('amount');
    	//$averageTotal = Order::avg('amount');
    	//$lifetimeSales = Order::sum('amount');
    	echo "Welcome from Cat Controller";
    	
    	//$users = DB::select('select * from breeds');
    	foreach ($Cats as $cat) {
            echo $cat->breed_id;
            echo "<br/>";
            //foreach ($users->flatMap->podcasts as $podcast) {
            //    echo $podcast->subscription->created_at;
           // }
            //$employee = $cat->breed()->where('id',$cat->breed_id)->get(); 
            print_r($cat->breed->name);
    		echo "<br/>";
    		echo $cat->name;
    	}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$cat= new Cat;
    	$data = [
    			'name' => 'Garfield2',
    			'date_of_birth' => '1978-06-19',
    			'breed_id' => 1,
    	];
    	$cat->create($data);
    	return redirect()->action('CatController@index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::debug( $request);
        $v = Validator::make($request->all(), [
            'name' => 'required|strength',
            'birthdate' => 'required|min:8',
            'breedID' => 'required|min:1',
            'file'       => 'required|mimes:png,xls|max:3000'
        ]);
        Log::debug($v->errors());
      


        if ($v->fails())
        {
            Log::debug("error");


/*Note that when validation fails, we pass the Validator instance to the Redirect using the  withErrors method. 
This method will flash the error messages to the session so that they are available on the next request.

However, notice that we do not have to explicitly bind the error messages to the view in our GET route. 
This is because Laravel will always check for errors in the session data, and automatically bind them to the view if they are available.
So, it is important to note that an $errors variable will always be available in all of your views, on every request
, allowing you to conveniently assume the $errors variable is always defined and can be safely used.
The $errors variable will be an instance of MessageBag.

So, after redirection, you may utilize the automatically bound $errors variable in your view:
*/
            return redirect()->back()
            ->withInput($request->input())
            ->withErrors($v->errors());
            //return redirect()->back()->withErrors($v->errors());
        }else{
            $imageName = $request->name . '.'.$request->file('file')->getClientOriginalExtension();
            
                    $request->file('file')->move(
                        base_path() . '/public/images/catalog/', $imageName
                    );
            
    	 //error not occur, redirect to confirm page
        return Redirect::to('cat/confirmation')->withInput($request->input());
    }
      
    }
    public function confirmation(Request $request)
    {
        Log::debug( $request);
        /*
        Log::debug("confirmation");
        $input = Input::all();
        Log::debug($input);
        //More here?
        Input::flash();
        //return View::make('cat/confirmation');
        return Redirect::to('cat/confirmation')->withInput($request->input());
       // return View::make('cat/confirmation')->with(array('input'=>$input));*/
       //Retrieve the name input field
    	$name = $request->name;
    	echo 'Name: '.$name;
    	echo '<br>';
    	
    	//Retrieve the username input field
    	$birthday = $request->birthdate;
    	echo 'Username: '.$birthday;
    	echo '<br>';
    	
    	//Retrieve the password input field
    	$breedID = $request->breedID;
        echo 'Password: '.$breedID;
        
        $cat= new Cat;
    	$data = [
    			'name' => $name,
    			'date_of_birth' => $birthday,
    			'breed_id' => $breedID,
    	];
        
        //create new Cat
        $cat->create($data);
        return redirect()->action('CatController@display');
        //return redirect()->action('CatController@confirmation');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //$users = DB::select('select * from users where active = ?', [1]);
     
    }
	
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
