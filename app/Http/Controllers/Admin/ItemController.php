<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Item;
use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $items=Item::all();
       return view('admin.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.item.create',compact('categories'));
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
            'category'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required ',
            'thumbnail'=>'required '
        ]);
// thumbnail uploade
        $thumbnail=$request->file('thumbnail');
        $slug=str_slug($request->name);
        if(isset($thumbnail)){
            $currentDate=Carbon::now()->toDateString();
            $thumbnailName=$slug.'-'.$currentDate.'-'.uniqid().'.'.$thumbnail->getClientOriginalExtension();

            if(!file_exists('uploade/thumbnail')){
                mkdir('uploade/thumbnail',0777,true);
            }
            $thumbnail->move('uploade/thumbnail',$thumbnailName);
        }else{
            $thumbnailName='default.png';
        }
 // Video Uploade
        $image=$request->file('image');
        $slug=str_slug($request->name);
        if(isset($image)){
            $currentDate=Carbon::now()->toDateString();
            $imageName=$slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploade/item')){
                mkdir('uploade/item',0777,true);
            }
            $image->move('uploade/item',$imageName);
        }else{
            $imageName='default.png';
        }

        $item=new Item();
        $item->name=$request->name;
        $item->category_id=$request->category;
        $item->description=$request->description;
        $item->price=$request->price;
        $item->thumbnail=$thumbnailName;
        $item->image=$imageName;
        $item->save();
        return redirect()->route('item.index')->with('successMsg','item Successfully Save ..)');
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
        $item=Item::find($id);
        $categories=Category::all();
        return view('admin.item.edit',compact('item','categories'));
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
            'category'=>'required',
            'description'=>'required',
            'price'=>'required',

        ]);
        $item=Item::find($id);
        $image=$request->file('image');
        $slug=str_slug($request->name);
        if(isset($image)){
            $currentDate=Carbon::now()->toDateString();
            $imageName=$slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploade/item')){
                mkdir('uploade/item',0777,true);
            }
            unlink('uploade/item/'.$item->image);
            $image->move('uploade/item',$imageName);
        }else{
            $imageName=$item->image;
        }


        $item->name=$request->name;
        $item->category_id=$request->category;
        $item->description=$request->description;
        $item->price=$request->price;
        $item->image=$imageName;
        $item->save();
        return redirect()->route('item.index')->with('successMsg','item Successfully Update ..)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $item=Item::find($id);
       if (file_exists('uploade/item/'.$item->image)){
           unlink('uploade/item/'.$item->image);
       }
       $item->delete();
        return redirect()->back()->with('successMsg','Item Successfully Deleted..)');
    }
}
