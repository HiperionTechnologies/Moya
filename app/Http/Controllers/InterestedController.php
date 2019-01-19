<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interested;

class InterestedController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$interesteds = Interested::all();
    	return view('interested.index',["interesteds"=>$interesteds]);
    }

    public function destroy($id){
    	Interested::destroy($id);
    	return back();
    }
}
