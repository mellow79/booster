<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{

  // get all the fundraisers
  public function fundraisers(){
    $sql_data =  DB::table('fundraiser')
      ->select("fundraiser.id"
        ,'fundraiser.fundraiser_name'
        ,DB::raw('count(review.fid) as total_reviews')
        ,DB::raw('sum(review.rating) as rating'))
      ->join('review', 'fundraiser.id', '=', 'review.fid')
      ->groupBy('fundraiser.id')
      ->get();

    return view('home',[
      'data' => $sql_data,
    ]);
  }
  public function find(Request $request){
    //get fundraiser by id for rating
    $sql_data =  DB::table('fundraiser')
      ->select("fundraiser.id"
        ,'fundraiser.fundraiser_name'
        ,DB::raw('count(review.fid) as total_reviews')
        ,DB::raw('sum(review.rating) as rating'))
      ->join('review', 'fundraiser.id', '=', 'review.fid')
      ->where('review.fid',$request->id)
      ->groupBy('fundraiser.id')
      ->get();
    /* get selected fundraiser from database */
    /*$sql_data = DB::select(DB::raw(
      "SELECT f.*, r.*
      FROM fundraiser as f
      INNER JOIN review as r on(f.id = r.fid)
      WHERE f.id = $request->id"
      ));*/

    if ($sql_data) {

      return view('review', ['sql_data' => $sql_data]);

    } else {

      return redirect()->back()->withErrors(['errors' => 'Failed to get fundraiser info']);
    }
  }

}
