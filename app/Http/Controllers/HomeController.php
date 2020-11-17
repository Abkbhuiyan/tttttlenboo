<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Price;
use App\SampleVideo;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {    $sliders=Slider::all();
         $price=Price::all();
         $items=Item::all();
         $category=Category::all();
         $sample=SampleVideo::all();
        return view('frontend.welcome',compact('sliders','items','price','category','sample'));
    }
    public function test($msisdn)

    {
        $operator = '';
        $sbs = substr($msisdn, 0,3);
        if ($sbs == '017' || $sbs == '013'){
            $operator = 'gp';
        }elseif ($sbs=='019' || $sbs=='014'){
            $operator = 'bl';
        }else{
            session()->flash('failedMsg','Please insert a gp or bl number!.');
            return redirect()->route('welcome');
        }
         $sliders=Slider::all();
         $price=Price::where('network','=', $operator)->get();
         $items=Item::all();
         $category=Category::all();
         $sample=SampleVideo::all();
        return view('frontend.welcome',compact('sliders','items','price','category','sample','msisdn'));
    }

    public function allVideo(){
        if (session()->has('msisdn') && session()->has('subscription')){
            if (session()->get('msisdn') != '' && session()->get('subscription')==true){
                $sliders=Slider::all();
                $items=Item::all();
                $category=Category::all();
                return view('frontend.partial.myVideos',compact('sliders','items','category'));
            }else{
                session()->flash('failedMsg','You are not subscribed please subscribe first');
                return redirect()->route('welcome');
            }
        }else{
//            dd('test');
            session()->flash('failedMsg','You are not subscribed please subscribe first');
            return redirect()->route('welcome');
        }
//        $sliders=Slider::all();
//        $items=Item::all();
//        $category=Category::all();
//        return view('frontend.partial.myVideos',compact('sliders','items','category'));

    }

    public function faq(){
        $items=Item::all();
        $sliders=Slider::all();
        return view('frontend.partial.faq',compact('sliders','items'));
    }

    public function story(){
        $items=Item::all();
        $sliders=Slider::all();
        return view('frontend.partial.story',compact('sliders','items'));
    }
}
