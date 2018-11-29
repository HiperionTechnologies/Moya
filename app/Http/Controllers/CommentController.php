<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Event;

class CommentController extends Controller
{
    public function __construct(){

    }

    public function index(){

    }

    public function create(){

    }

    public function store(){

    }

    public function show(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy($idEvent, $id){
    	Comment::destroy($id);
    	return back();
    }
}
