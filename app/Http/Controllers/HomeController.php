<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /*me
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    public function index(){

       $banner = \App\Models\Banner::where('status',1)->get();
        return view('front/home',['banner'=>$banner]);
    }
    public function cmsPage($slug = null){

        if ($slug != '' && $slug !=NULL) {
            
            $p = \App\Models\Cms::where('status',1)->where('slug',$slug)->first();
            if ($p !=NULL) {
                
                return view('front/pages/detail_page',['page'=>$p]);

            }else{

                return "page not found";

            }
        }
    }
}
