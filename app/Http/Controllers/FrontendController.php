<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\AboutSetting;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        if(!session()->get('locale')){
            session()->put('locale', 'en');
        }
        $featured=Post::where('featured',1)->where('publish_date','<=',date('Y-m-d'))->get();
        $front_right=Post::where('front_right',1)->where('publish_date','<=',date('Y-m-d'))->first();
        $homeArticle=Post::where('front_bottom',1)->where('publish_date','<=',date('Y-m-d'))->get();
        $homeCard=Post::where('featured',1)->where('publish_date','<=',date('Y-m-d'))->get();
        return view('frontend.home',compact('featured','front_right','homeArticle','homeCard'));
    }

    public function about()
    {
        $about = AboutSetting::first();
        return view('frontend.about',compact('about'));
    }
    public function Poem_cat()
    {
        $homeCard=HomeCard::all();
        $firstPage=FirstPage::all();

       
        return view('frontend.poem_cat',compact('homeCard','firstPage'));
    }
    
    public function Poem($id)
    {
        $firstPage=FirstPage::findOrFail($id);
        $link= Link::first();
        return view('frontend.poem',compact('firstPage','link'));
    }
   

}
