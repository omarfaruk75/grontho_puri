<?php

namespace App\Http\Controllers;
use App\Models\Home\HeaderArticle;
use App\Models\Home\HeaderCard;
use App\Models\Home\HomeArticle;
use App\Models\Home\HomeCard;
use App\Models\About\AboutImage;
use App\Models\About\Text;
use App\Models\About\CollageText;
use App\Models\About\CollageSecond;
use App\Models\About\CollageThird;
use App\Models\About\CollageFour;
use App\Models\About\Mission;
use App\Models\FirstPage;
use App\Models\Link;
use App\Models\Footer\Contact;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $header=HeaderArticle::all();
        $headerCard=HeaderCard::first();
        $homeArticle=HomeArticle::all();
        $homeCard=HomeCard::all();
        return view('frontend.home',compact('header','headerCard','homeArticle','homeCard'));
    }

    public function about()
    {
        $aboutImage = AboutImage::first();
        $text = Text::first();
        $collageText = CollageText::first();
        $collageSecond = CollageSecond::first();
        $collageThird = CollageThird::first();
        $collageFour = CollageFour::first();
        $mission = Mission::first();
        return view('frontend.about',compact('aboutImage','text','collageText','collageSecond','collageThird','collageFour','mission'));
    }
    public function Poem_cat()
    {
        $homeCard=HomeCard::all();
       
        return view('frontend.poem_cat',compact('homeCard'));
    }
    
    public function Poem()
    {
        $firstPage=FirstPage::first();
        $link= Link::first();
        return view('frontend.poem',compact('firstPage','link'));
    }
    public function Footer()
    {
        $contact=Contact::first();
        return view('frontend.app',compact('contact'));
    }

}
