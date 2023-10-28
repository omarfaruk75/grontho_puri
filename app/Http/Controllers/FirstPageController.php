<?php

namespace App\Http\Controllers;

use App\Models\FirstPage;
use Illuminate\Http\Request;
use App\Http\Requests\FirstPage\AddNewRequest;
use App\Http\Requests\FirstPage\UpdateRequest;
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
        $firstPage=FirstPage::paginate(10);
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
    public function store(AddNewRequest $request)
    {
        try{
            $firstPage=new FirstPage;
             if($request->has('image'))
            $firstPage->image=$this->resizeImage($request->image,'uploads/firstPage/image/',true,200,200,false);
            $firstPage->user_id=currentUserId();
            $firstPage->category=$request->category;
            $firstPage->category_bn=$request->category_bn;
            $firstPage->title=$request->title;
            $firstPage->title_bn=$request->title_bn;
            $firstPage->heading=$request->heading;
            $firstPage->heading_bn=$request->heading_bn;
            $firstPage->text=$request->text;
            $firstPage->text_bn=$request->text_bn;
            $firstPage->short_text=$request->short_text;
            $firstPage->short_text_bn=$request->short_text_bn;
         
            
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
        $firstPage=FirstPage::findOrFail(encryptor('decrypt',$id));
        return view('firstPage.edit',compact('firstPage'));
    }

    
    public function update(UpdateRequest $request, $id)
    {
        try{
            $firstPage=FirstPage::findOrFail(encryptor('decrypt',$id));
            $path='uploads/firstPage/image';

            if($request->has('image') && $request->image)
            if($this->deleteImage($firstPage->image,$path))
                $firstPage->image=$this->resizeImage($request->image,$path,true,200,200,false);
            // if($request->has('image'))
            // $firstPage->image=$this->resizeImage($request->image,'uploads/firstPage/image/',true,200,200,false);
            $firstPage->category=$request->category;
            $firstPage->category_bn=$request->category_bn;
            $firstPage->title=$request->title;
            $firstPage->title_bn=$request->title_bn;
            $firstPage->heading=$request->heading;
            $firstPage->heading_bn=$request->heading_bn;
            $firstPage->text=$request->text;
            $firstPage->text_bn=$request->text_bn;
            $firstPage->short_text=$request->short_text;
            $firstPage->short_text_bn=$request->short_text_bn;
            $firstPage->user_id=currentUserId();
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
        $firstPage=FirstPage::findOrFail(encryptor('decrypt',$id));
        $firstPage->delete();
        return redirect()->back();
    }
}
