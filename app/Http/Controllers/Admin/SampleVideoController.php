<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Item;
use App\SampleVideo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SampleVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sample=SampleVideo::all();
       return view('admin.sample_video.index',compact('sample'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.sample_video.create',compact('categories'));
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

            if(!file_exists('uploade/sample/thumbnail')){
                mkdir('uploade/sample/thumbnail',0777,true);
            }
            $thumbnail->move('uploade/sample/thumbnail',$thumbnailName);
        }else{
            $thumbnailName='default.png';
        }
        // Video Uploade
        $image=$request->file('image');
        $slug=str_slug($request->name);
        if(isset($image)){
            $currentDate=Carbon::now()->toDateString();
            $imageName=$slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploade/sample/video')){
                mkdir('uploade/sample/video',0777,true);
            }
            $image->move('uploade/sample/video',$imageName);
        }else{
            $imageName='default.png';
        }

        $sample=new SampleVideo();
        $sample->name=$request->name;
        $sample->category_id=$request->category;
        $sample->description=$request->description;
        $sample->price=$request->price;
        $sample->thumbnail=$thumbnailName;
        $sample->image=$imageName;
        $sample->save();
        return redirect()->route('sampleVideo.index')->with('SuccessMsg','Video Successfully Save ..)');
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
        $sample=SampleVideo::find($id);
        $categories=Category::all();
        return view('admin.sample_video.edit',compact('sample','categories'));
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
        $sample=SampleVideo::find($id);
        $image=$request->file('image');
        $slug=str_slug($request->name);
        if(isset($image)){
            $currentDate=Carbon::now()->toDateString();
            $imageName=$slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploade/sample/video')){
                mkdir('uploade/sample/video',0777,true);
            }
            unlink('uploade/sample/video/'.$sample->image);
            $image->move('uploade/sample/video',$imageName);
        }else{
            $imageName=$sample->image;
        }


        $sample->name=$request->name;
        $sample->category_id=$request->category;
        $sample->description=$request->description;
        $sample->price=$request->price;
        $sample->image=$imageName;
        $sample->save();
        return redirect()->route('sampleVideo.index')->with('successMsg','Video Successfully Update ..)');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sample=SampleVideo::find($id);
        if (file_exists('uploade/sample/video/'.$sample->image)){
            unlink('uploade/sample/video/'.$sample->image);
        }
        if (file_exists('uploade/sample/thumbnail/'.$sample->thumbnail)){
            unlink('uploade/sample/thumbnail/'.$sample->thumbnail);
        }
        $sample->delete();
        return redirect()->back()->with('successMsg','Video Successfully Deleted..)');
    }

}
