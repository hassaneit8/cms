<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\posts\StorePostRequest;
use App\Http\Requests\posts\UpdatePostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('posts.create')->with('categories',Category::all());

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
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->contentt,
            'image' => $image,
            'published_at' => $request->published_at,
            'category_id'=>$request->category,
        ]);
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
        $categories = Category::all();
        return view('posts.create')->with([
            'post'=> $post,
            'categories'=>$categories
            ]);
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
//        dd($request->title);
        $data = $request->only(['title', 'description', 'published_at', 'content','category_id']);
        if ($request->hasFile('image')) {
            $image = $request->image->store('posts');
            Storage::delete($post->image);
            $data['image'] = $image;
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
        $post = Post::withTrashed()->where('id', $postID )->firstOrFail();
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
        return view('posts.index')->with('posts', $trashed);# the same to ----->>>>with('posts',$trashed);  >> ->withPosts($trashed);
    }

    public function restore($postID)
    {
        $post = Post::withTrashed()->where('id', $postID)->firstOrFail();
        $post->restore();


        return redirect()->back();
    }


}
