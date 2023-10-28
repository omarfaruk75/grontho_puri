<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use App\Models\Home\HeaderCard;
use Illuminate\Http\Request;
use App\Http\Requests\HeaderCard\AddNewRequest;
use App\Http\Requests\HeaderCard\UpdateRequest;

use App\Http\Traits\ResponseTrait;
use App\Http\Traits\ImageHandleTraits;

class HeaderCardController extends Controller
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
        $home=HeaderCard::paginate(10);
        return view('home.headerCard.index',compact('home'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.headerCard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewRequest $request)
    {
        try{
            $home=new HeaderCard;
             if($request->has('image'))
                $home->image=$this->resizeImage($request->image,'uploads/home_page/header_card/image',true,200,200,false);
            //  if($request->has('logo_img'))
            //     $home->logo_img=$this->resizeImage($request->logo_img,'uploads/home_page/header_card/logo_img',true,200,200,false);
            // $home->name=$request->name;
            $home->title=$request->title;
            $home->title_bn=$request->title_bn;
            $home->short_details=$request->short_details;
            $home->short_details_bn=$request->short_details_bn;
            $home->user_id=currentUserId();
            
            if($home->save())
                return redirect()->route(currentUser().'.headerCard.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
     * @param  \App\Models\HeaderCard  $HeaderCard
     * @return \Illuminate\Http\Response
     */
    public function show(HeaderCard $HeaderCard)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HeaderCard  $HeaderCard
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $home=HeaderCard::findOrFail(encryptor('decrypt',$id));
        return view('home.headerCard.edit',compact('home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HeaderCard  $HeaderCard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{
            $home=HeaderCard::findOrFail(encryptor('decrypt',$id));
                $home->title=$request->title;
                $home->title_bn=$request->title_bn;
                $home->short_details=$request->short_details;
                $home->short_details_bn=$request->short_details_bn;
                $home->user_id=currentUserId();
            if($request->has('image'))
                $home->image=$this->resizeImage($request->image,'uploads/home_page/header_card/image/',true,200,200,false);
            
            
            if($home->save())
                return redirect()->route(currentUser().'.headerCard.index')->with($this->resMessageHtml(true,null,'Successfully updated'));
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
     * @param  \App\Models\HeaderCard  $HeaderCard
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $h= HeaderCard::findOrFail(encryptor('decrypt',$id));
        $h->delete();
        return redirect()->back();
    }
}
