<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About\CollageText;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\ImageHandleTraits;

class CollageTextController extends Controller
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
      $collage= CollageText::Paginate(10);
      return view('about.collage.index', compact('collage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   return view('about.collage.create');
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
            $collage=new CollageText;
            if($request->has('image'))
            $collage->image=$this->resizeImage($request->image,'uploads/about_page/collage_image/images',true,200,200,false);
            $collage->category=$request->category;
            $collage->title=$request->title;
            $collage->user_id=currentUserId();
            if($collage->save())
                return redirect()->route(currentUser().'.collage.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
     * @param  \App\Models\about\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function show(Collage $collage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\about\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $collage=CollageText::findOrFail(encryptor('decrypt',$id));
      return view('about.collage.edit',compact('collage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\about\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $collage= CollageText::findOrFail(encryptor('decrypt',$id));
            if($request->has('image'))
            $collage->image=$this->resizeImage($request->image,'uploads/about_page/collage_image/images',true,200,200,false);
             $collage->category=$request->category;
            $collage->title=$request->title;
            $collage->user_id=currentUserId();
            if($collage->save())
                return redirect()->route(currentUser().'.collage.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
     * @param  \App\Models\about\Text  $text
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $collage=CollageText::findOrFail(encryptor('decrypt',$id));
      $collage->delete();
      return redirect()->back();
    }
}
