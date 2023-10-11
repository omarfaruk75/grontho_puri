<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\About\AboutImage;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\ImageHandleTraits;

class AboutImageController extends Controller
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
        $about= AboutImage::Paginate(10);
        return view('about.aboutImage.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about.aboutImage.create');
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
            $about = new AboutImage;
            if($request->has('image'))
            $about->image=$this->resizeImage($request->image,'uploads/about_page/about_image/images',true,200,200,false);
            if($about->save())
                return redirect()->route(currentUser().'.imageIndex.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
     * @param  \App\Models\About\AboutImage  $aboutImage
     * @return \Illuminate\Http\Response
     */
    public function show(AboutImage $aboutImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About\AboutImage  $aboutImage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about= AboutImage::findOrFail(encryptor('decrypt',$id));
        return view('about.aboutImage.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About\AboutImage  $aboutImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $about = AboutImage::findOrFail(encryptor('decrypt',$id));
            if($request->has('image'))
            $about->image=$this->resizeImage($request->image,'uploads/about_page/about_image/images',true,200,200,false);
            if($about->save())
                return redirect()->route(currentUser().'.aboutImage.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
     * @param  \App\Models\About\AboutImage  $aboutImage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = AboutImage::findOrFail(encryptor('decrypt',$id));
        $about -> delete();
        return redirect()->back();
    }
}
