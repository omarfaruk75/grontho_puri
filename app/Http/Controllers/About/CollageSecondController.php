<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\About\CollageSecond;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\ImageHandleTraits;

class CollageSecondController extends Controller
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
        $second= CollageSecond::Paginate(10);
        return view('about.CollageSecond.index', compact('second'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about.CollageSecond.create');
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
            $second = new CollageSecond;
            if($request->has('image'))
            $second->image=$this->resizeImage($request->image,'uploads/about_page/collage2nd_image/images',true,200,200,false);
            $second->brand=$request->brand;
            $second->title=$request->title;
            $second->name=$request->name;
            if($second->save())
                return redirect()->route(currentUser().'.collageSecond.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
     * @param  \App\Models\About\CollageSecond  $collageSecond
     * @return \Illuminate\Http\Response
     */
    public function show(CollageSecond $collageSecond)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About\CollageSecond  $collageSecond
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $second = CollageSecond::findOrFail(encryptor('decrypt',$id));
        return view('about.CollageSecond.edit',compact('second'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About\CollageSecond  $collageSecond
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $second = CollageSecond::findOrFail(encryptor('decrypt',$id));
            if($request->has('image'))
            $second->image=$this->resizeImage($request->image,'uploads/about_page/collage2nd_image/images',true,200,200,false);
            $second->brand=$request->brand;
            $second->title=$request->title;
            $second->name=$request->name;
            if($second->save())
                return redirect()->route(currentUser().'.collageSecond.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
     * @param  \App\Models\About\CollageSecond  $collageSecond
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $second = CollageSecond::findOrFail(encryptor('decrypt',$id));
        $second->delete();
        return redirect()->back();
    }
}
