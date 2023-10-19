<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\About\CollageFour;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\ImageHandleTraits;

class CollageFourController extends Controller
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
        $four= CollageFour::Paginate(10);
        return view('about.collageFour.index', compact('four'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about.collageFour.create');
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
        $four= new CollageFour;
        if($request->has('image'))
        $four->image=$this->resizeImage($request->image,'uploads/about_page/collage4_image/images',true,200,200,false);
        $four->category=$request->category;
        $four->title=$request->title;
        $four->user_id=currentUserId();
        if($four->save())
            return redirect()->route(currentUser().'.collageFour.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
     * @param  \App\Models\About\CollageFour  $collageFour
     * @return \Illuminate\Http\Response
     */
    public function show(CollageFour $collageFour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About\CollageFour  $collageFour
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $four = CollageFour::findOrFail(encryptor('decrypt',$id));
        return view('about.collageFour.edit', compact('four'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About\CollageFour  $collageFour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $four=CollageFour::findOrFail(encryptor('decrypt', $id));
            if($request->has('image'))
            $four->image=$this->resizeImage($request->image,'uploads/about_page/collage4_image/images',true,200,200,false);
            $four->category=$request->category;
            $four->title=$request->title;
            $four->user_id=currentUserId();
            if($four->save())
                return redirect()->route(currentUser().'.collageFour.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
     * @param  \App\Models\About\CollageFour  $collageFour
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $four=CollageFour::findOrFail(encryptor('decrypt',$id));
        $four->delete();
        return redirect()->back();
    }
}
