<?php

namespace App\Http\Controllers\Admin;

use App\Item;
use App\settings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $settings=settings::all();
        return view('admin.settings.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.settings.create');
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

            if(!file_exists('uploade/settings')){
                mkdir('uploade/settings',0777,true);
            }
            $image->move('uploade/settings',$imageName);
        }else{
            $imageName='default.png';
        }

        $settings=new settings();
        $settings->name=$request->name;
        $settings->image=$imageName;
        $settings->save();
        return redirect()->route('settings.index')->with('successMsg','Info Successfully Save ..)');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settings=settings::find($id);
        return view('admin.settings.edit',compact('settings'));
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
        $settings=settings::find($id);
        $image=$request->file('image');
        $slug=str_slug($request->name);
        if(isset($image)){
            $currentDate=Carbon::now()->toDateString();
            $imageName=$slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploade/settings')){
                mkdir('uploade/settings',0777,true);
            }
            unlink('uploade/settings/'.$settings->image);
            $image->move('uploade/settings',$imageName);
        }else{
            $imageName=$settings->image;
        }


        $settings->name=$request->name;

        $settings->image=$imageName;
        $settings->save();
        return redirect()->route('settings.index')->with('successMsg','Info Successfully Update ..)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $settings=settings::find($id);
        if (file_exists('uploade/settings/'.$settings->image)){
            unlink('uploade/settings/'.$settings->image);
        }
        $settings->delete();
        return redirect()->back()->with('successMsg','Item Successfully Deleted..)');
    }
}
