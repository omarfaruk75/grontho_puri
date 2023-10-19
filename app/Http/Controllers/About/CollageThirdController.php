<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\About\CollageThird;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\ImageHandleTraits;

class CollageThirdController extends Controller
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
        $third= CollageThird::Paginate(10);
        return view('about.collageThird.index', compact('third'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about.collageThird.create');
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
            $third = new CollageThird;
            if($request->has('image'))
            $third->image=$this->resizeImage($request->image,'uploads/about_page/collage3rd_image/images',true,200,200,false);
            $third->category=$request->category;
            $third->title=$request->title;
            $third->user_id=currentUserId();
            if($third->save())
                return redirect()->route(currentUser().'.collageThird.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
     * @param  \App\Models\About\CollageThird  $collageThird
     * @return \Illuminate\Http\Response
     */
    public function show(CollageThird $collageThird)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About\CollageThird  $collageThird
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $third =CollageThird::findOrFail(encryptor('decrypt',$id));
        return view('about.collageThird.edit', compact('third'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About\CollageThird  $collageThird
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $third =CollageThird::findOrFail(encryptor('decrypt',$id));
            if($request->has('image'))
            $third->image=$this->resizeImage($request->image,'uploads/about_page/collage3rd_image/images',true,200,200,false);
            $third->category=$request->category;
            $third->title=$request->title;
            $third->user_id=currentUserId();
            if($third->save())
                return redirect()->route(currentUser().'.collageThird.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
     * @param  \App\Models\About\CollageThird  $collageThird
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $third=CollageThird::findOrFail(encryptor('decrypt',$id));
        $third->delete();
        return redirect()->back();
    }
}
