<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeCard;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\ImageHandleTraits;

class HomeCardController extends Controller
{
    use ResponseTrait;
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $card=HomeCard::Paginate(10);
        return view('home.homeCard.index', compact('card'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.homeCard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $card= new HomeCard;
            if($request->has('image'))
            $card->image=$this->resizeImage($request->image,'uploads/home_page/home_card/image',true,200,200,false);
            $card->title=$request->title;
            if($card->save())
                return redirect()->route(currentUser().'.homeCard.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
            else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
            
        }catch(Exception $e){
            // dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home\HomeCard  $homeCard
     * @return \Illuminate\Http\Response
     */
    public function show(HomeCard $homeCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home\HomeCard  $homeCard
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $card=HomeCard::findOrFail(encryptor('decrypt',$id));
      return view('home.homeCard.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Home\HomeCard  $homeCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $card=HomeCard::findOrFail(encryptor('decrypt',$id));
            if($request->has('image'))
            $card->image=$this->resizeImage($request->image,'uploads/home_page/home_card/image',true,200,200,false);
            $card->title=$request->title;
            if($card->save())
                return redirect()->route(currentUser().'.homeCard.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
            else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
            
        }catch(Exception $e){
            // dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home\HomeCard  $homeCard
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card=HomeCard::findOrFail(encryptor('decrypt',$id));
        $card->delete();
        return redirect()->back();
    }
}
