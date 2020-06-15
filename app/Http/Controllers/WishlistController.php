<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Wishlist;
use App\Model\Product;
use Auth;

class WishlistController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $user_id = Auth::id();
      return view('wishlist',[
        'items' => Wishlist::with('product')->where('user_id',$user_id)->get()
      ]);
    }

    public function removeWishlist($id){
      Wishlist::find($id)->delete();
      return back()->with('message',"Wishlist Item Deleted");
    }

}
