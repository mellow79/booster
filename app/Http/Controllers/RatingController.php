<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RatingController extends Controller
{
    //add rating
  public function addRating(Request $request) {

    $reviewer_name = (isset($request->reviewer_name)) ? $request->reviewer_name : 'Anonymous';
    $reviewer_email = (isset($request->reviewer_email)) ? $request->reviewer_email : '';
    $review = (isset($request->review)) ? $request->review : '';
    $review_date = date("Y-m-d H:i:s");

    $data = DB::table('review')->insert(
      [
        'fid'=> $request->id,
        'rating'=> $request->rating
        ,'reviewer_name' => $reviewer_name
        ,'reviewer_email' => $reviewer_email
        ,'review' => $review,
        'review_date'=> $review_date]
    )->where('id',$request->id);

    dd($data);

    if($data){
      return true;
    } else {
      return false;
    }

  }
}
