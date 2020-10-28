<?php

namespace App\Http\Controllers\Admin;

use App\Reservation;
use App\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
  public function index(){

      $reservation=Reservation::all();
      return view('admin.reservation.index',compact('reservation'));
  }

  public function status($id){
       $reservation= Reservation::find($id);
       $reservation->status=true;
       $reservation->save();
       Toastr::success('Reservation  Successfully Confirm', 'Success', ["positionClass" => "toast-top-right"]);
       return redirect()->back();
  }

  public function destroy($id){

      $reservation=Reservation::find($id);


      $reservation->delete();
      Toastr::success('Reservation  Successfully Confirm', 'Success', ["positionClass" => "toast-top-right"]);
      return redirect()->back();

  }
}
