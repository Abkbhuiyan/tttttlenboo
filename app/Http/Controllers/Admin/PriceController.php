<?php

namespace App\Http\Controllers\Admin;

use App\Item;
use App\Price;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $price=Price::all();
       return view('admin.price.index',compact('price'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.price.create');
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
            'package_name'=>'required',
            'network'=>'required',
            'days'=>'required',
            'price'=>'required',
            'image'=>'required '
        ]);

        $image=$request->file('image');
        $slug=str_slug($request->name);
        if(isset($image)){
            $currentDate=Carbon::now()->toDateString();
            $imageName=$slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploade/price')){
                mkdir('uploade/price',0777,true);
            }
            $image->move('uploade/price',$imageName);
        }else{
            $imageName='default.png';
        }

        $price=new Price();
        $price->package_name=$request->package_name;
        $price->network=$request->network;
        $price->image=$imageName;
        $price->price=$request->price;
        $price->days=$request->days;


        $price->save();
        return redirect()->route('price.index')->with('successMsg','Price Successfully Save ..)');
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
    {    $price=Price::find($id);
        return view('admin.price.edit',compact('price'));
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
            'package_name'=>'required',
            'network'=>'required',
            'days'=>'required',
            'price'=>'required',


        ]);
        $price=Price::find($id);
        $image=$request->file('image');
        $slug=str_slug($request->package_name);
        if(isset($image)){
            $currentDate=Carbon::now()->toDateString();
            $imageName=$slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploade/price')){
                mkdir('uploade/price',0777,true);
            }
            unlink('uploade/price/'.$price->image);
            $image->move('uploade/price',$imageName);
        }else{
            $imageName=$price->image;
        }


        $price->package_name=$request->package_name;
        $price->network=$request->network;
        $price->image=$imageName;
        $price->price=$request->price;
        $price->days=$request->days;

        $price->save();
        return redirect()->route('price.index')->with('successMsg','Price Successfully Update ..)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price=Price::find($id);
        if (file_exists('uploade/price/'.$price->image)){
            unlink('uploade/price/'.$price->image);
        }
        $price->delete();
        return redirect()->back()->with('successMsg','Price Successfully Deleted..)');
    }
   
}
