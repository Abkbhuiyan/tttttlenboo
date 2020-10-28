<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Item;
use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories=Category::all();
      return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'image'=>'required '

        ]);


        $image=$request->file('image');
        $slug=str_slug($request->name);
        if(isset($image)){
            $currentDate=Carbon::now()->toDateString();
            $imageName=$slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploade/category')){
                mkdir('uploade/category',0777,true);
            }
            $image->move('uploade/category',$imageName);
        }else{
            $imageName='default.png';
        }

        $categories=new Category();
        $categories->name=$request->name;
        $categories->slug=str_slug($request->name);
        $categories->image=$imageName;

        $categories->save();
        return redirect()->route('category.index')->with('successMsg','Category Successfully Save ..)');
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
    public function edit($id)
    {
        $categories=Category::find($id);
        return view('admin.category.edit',compact('categories'));
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
        $this->validate($request,[
            'name'=>'required',


        ]);
        $item=Category::find($id);
        $image=$request->file('image');
        $slug=str_slug($request->name);
        if(isset($image)){
            $currentDate=Carbon::now()->toDateString();
            $imageName=$slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploade/category')){
                mkdir('uploade/category',0777,true);
            }
            unlink('uploade/category/'.$item->image);
            $image->move('uploade/category',$imageName);
        }else{
            $imageName=$item->image;
        }

        $category=Category::find($id);
        $category->name=$request->name;
        $category->image=$imageName;

        $category->save();
        return redirect()->route('category.index')->with('successMsg','Category Successfully Updated ..)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        if (file_exists('uploade/category/'.$category->image)){
            unlink('uploade/category/'.$category->image);
        }
        $category->delete();
        return redirect()->back()->with('successMsg','Category Successfully Deleted..)');
    }

}
