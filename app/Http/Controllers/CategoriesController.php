<?php

namespace App\Http\Controllers;

use App\Category;

use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('categories.index')->with('categories' ,$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {


       $category=new Category();
       Category::create($request->all());


//        Category::create([
//            'name'=>$request->name
//        ]);

        //then add fillable in category model     protected $fillable=['name'];

      return  redirect()->route('categories.index')->with('info', 'success|Category added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.create')->with('CategoryFromEditFunc',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name ,
        ]);
//        $category->name=$request->name;
//        $category->save();
//

        return redirect()->route('categories.index')->with('info', 'success|Category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->posts->count() > 0){
            return redirect()->route('categories.index')->with('error', 'Category Cannot be deleted becouse it assosiated with posts');

        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'success|Category deleted');
    }
}
