<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;

class WelcomeController extends Controller
{
    public function index(){

        return view('welcome')
            ->with('tags',Tag::all())
            ->with('categories',Category::all())
            ->with('posts',Post::searched()->simplepaginate(3));
    }
}
