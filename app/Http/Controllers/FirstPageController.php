<?php

namespace App\Http\Controllers;

use App\Models\firstPage;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\ImageHandleTraits;

class FirstPageController extends Controller
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
        $firstPage=firstPage::paginate(10);
        return view('firstPage.index',compact('firstPage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('firstPage.create');
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
            $firstPage=new firstPage;
             if($request->has('image'))
                $firstPage->image=$this->resizeImage($request->image,'uploads/firstPage/image/',true,200,200,false);
             if($request->has('logo_img'))
                $firstPage->logo_img=$this->resizeImage($request->logo_img,'uploads/firstPage/logo_img/',true,200,200,false);
            $firstPage->name=$request->name;
            $firstPage->category=$request->category;
            $firstPage->text=$request->text;
            $firstPage->short_text=$request->short_text;
            $firstPage->title=$request->title;
            
            if($firstPage->save())
                return redirect()->route(currentUser().'.firstPage.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
     * @param  \App\Models\firstPage  $firstPage
     * @return \Illuminate\Http\Response
     */
    public function show(firstPage $firstPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\firstPage  $firstPage
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $firstPage=firstPage::findOrFail(encryptor('decrypt',$id));
        return view('firstPage.edit',compact('firstPage'));
    }

    
    public function update(Request $request, $id)
    {
        try{
            $firstPage=firstPage::findOrFail(encryptor('decrypt',$id));
            $firstPage->name=$request->name;
            $firstPage->category=$request->category;
            $firstPage->text=$request->text;
            $firstPage->short_text=$request->short_text;
            $firstPage->title=$request->title;
            if($request->has('image'))
                $firstPage->image=$this->resizeImage($request->image,'uploads/firstPage/image/',true,200,200,false);
            if($request->has('logo_img'))
                $firstPage->logo_img=$this->resizeImage($request->logo_img,'uploads/firstPage/logo_img/',true,200,200,false);
            
            if($firstPage->save())
                return redirect()->route(currentUser().'.firstPage.index')->with($this->resMessageHtml(true,null,'Successfully updated'));
            else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }catch(Exception $e){
            // dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }

    
    public function destroy($id)
    {
        $h= firstPage::findOrFail(encryptor('decrypt',$id));
        $h->delete();
        return redirect()->back();
    }
}
