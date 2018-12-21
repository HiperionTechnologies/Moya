<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoryFormRequest;
use App\Category;

class CategoryController extends Controller
{
    public function __construct(){

    }

    public function index(){
    	$categories = Category::all();
    	return view('category.index',["categories"=>$categories]);
    }

    public function create(){
    	return view('category.create');
    }

    public function store(){
    	$category = Category::create(request()->all());
    	return Redirect::to('category');
    }

    public function show(){

    }

    public function edit($id){
    	$category = Category::findOrFail($id);
    	return view('category.edit',["category"=>$category]);
    }

    public function update($id){
    	$category = Category::findOrFail($id);
    	$category->fill(request()->all());
    	$category->update();
    	return Redirect::to('category');
    }

    public function destroy($id){
    	Category::destroy($id);
    	return Redirect::to('category');
    }
}
