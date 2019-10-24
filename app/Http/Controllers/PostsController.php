<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\posts\StorePostRequest;
use App\Http\Requests\posts\UpdatePostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('verfiyCategoryCount')->only(['create','store']);
    }

    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all())->with('tags',Tag::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        $image = $request->image->store('posts');
       $post= Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->contentt,
            'image' => $image,
            'published_at' => $request->published_at,
            'category_id' => $request->category_id,
           'user_id'=> auth()->user()->id,
        ]);
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        return redirect()->route('posts.index')->with('message', 'success|Post added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
//        dd($post->tags->pluck('id')->toArray()); check if it return the ID's of array that tags seleclted
        $categories = Category::all();
        return view('posts.create')->with('post',$post)->with('categories',$categories)->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
    $data = $request->all();#only(['title', 'description', 'published_at', 'content', 'category_id']);
        if ($request->hasFile('image')) {
            $image = $request->image->store('posts');
            Storage::delete($post->image);
            $data['image'] = $image;
        }
        if($request->tags){
            $post->tags()->sync($request->tags);
        }

        $post->update($data);
        return redirect()->route('posts.index')->with('message', 'success|Post updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($postID)
    {
        $post = Post::withTrashed()->where('id', $postID)->firstOrFail();
        if ($post->trashed()) {
//            Storage::delete($post->image);  #for deleting the image
            $post->deleteImage();
            $post->forceDelete();
            return redirect()->route('trashed.index')->with('message', 'success|Post Deleted');

        } else {

            $post->delete();
            return redirect()->route('posts.index')->with('message', 'success|Post Transfer to Trash');

        }

    }

    public function trash()
    {

        $trashed = Post::onlyTrashed()->get();
//        dd("xxxx");
        return view('posts.index')->with('posts', $trashed);# the same to ----->>>>with('posts',$trashed);  >> ->withPosts($trashed);
    }

    public function restore($postID)
    {
        $post = Post::withTrashed()->where('id', $postID)->firstOrFail();
        $post->restore();


        return redirect()->back();
    }


}
