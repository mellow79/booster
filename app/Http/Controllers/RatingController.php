<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Http\Response;
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
    );

    if($data){
      $response_array['status'] = 'success';
    } else {
      $response_array['status'] = 'error';
    }

    return response()->json($response_array);

  }


  // adds review information the database
  public function addReview(Request $request) {

    $reviewer_name = (isset($request->reviewer_name)) ? $request->reviewer_name : 'Anonymous';
    $reviewer_email = (isset($request->reviewer_email)) ? $request->reviewer_email : '';
    $review = (isset($request->review)) ? $request->review : '';
    $review_date = date("Y-m-d H:i:s");

    $data = DB::table('review')->insert(
      [
        'fid'=> $request->id
        ,'rating'=> $request->rating
        ,'reviewer_name' => $reviewer_name
        ,'reviewer_email' => $reviewer_email
        ,'review' => $review,
        'review_date'=> $review_date]
    );

    if($data){
      $response_array['status'] = 'success';
    } else {
      $response_array['status'] = 'error';
    }

    return response()->json($response_array);

  }

  // adds review information the database
  public function addFundraiser(Request $request) {

    $id = DB::table('fundraiser')->insertGetId(
      ['fundraiser_name' => $request->new_fundraiser]
    );


    $reviewer_name = (isset($request->reviewer_name)) ? $request->reviewer_name : 'Anonymous';
    $reviewer_email = (isset($request->reviewer_email)) ? $request->reviewer_email : '';
    $review = (isset($request->review)) ? $request->review : '';
    $review_date = date("Y-m-d H:i:s");

    $d = DB::table('review')->insert(
      [
        'fid'=> $id
        ,'rating'=> $request->rating
        ,'reviewer_name' => $reviewer_name
        ,'reviewer_email' => $reviewer_email
        ,'review' => $review,
        'review_date'=> $review_date]
    );


    if($d){
      $response_array['status'] = 'success';
    } else {
      $response_array['status'] = 'error';
    }

    return response()->json($response_array);

  }
}
