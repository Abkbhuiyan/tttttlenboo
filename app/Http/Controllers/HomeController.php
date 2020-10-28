<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Price;
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
        return view('frontend.welcome',compact('sliders','items','price','category'));
    }

    public function allVideo(){
        $sliders=Slider::all();
        $items=Item::all();
        return view('frontend.partial.myVideos',compact('sliders','items'));
    }

    public function faq(){
        $sliders=Slider::all();
        return view('frontend.partial.faq',compact('sliders'));
    }

    public function story(){
        $sliders=Slider::all();
        return view('frontend.partial.story',compact('sliders'));
    }
}
