<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About\Mission;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\ImageHandleTraits;

class MissionController extends Controller
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
        $mission= Mission::Paginate(10);
      return view('about.mission.index', compact('mission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about.mission.create');
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
            $mission = new Mission;
            $mission->title=$request->title;
            $mission->short_texts=$request->short_texts;
            if($request->has('image'))
            $mission->image=$this->resizeImage($request->image,'uploads/about_page/mission_image/image-1/images',true,200,200,false);
            if($request->has('image_2'))
            $mission->image_2=$this->resizeImage($request->image_2,'uploads/about_page/mission_image/image-2/images',true,200,200,false);
            if($request->has('image_3'))
            $mission->image_3=$this->resizeImage($request->image_3,'uploads/about_page/mission_image/image-3/images',true,200,200,false);
            
            if($mission->save())
                return redirect()->route(currentUser().'.mission.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
     * @param  \App\Models\About\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function show(Mission $mission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mission= Mission::findOrFail(encryptor('decrypt',$id));
        return view('about.mission.edit', compact('mission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $mission = Mission::findOrFail(encryptor('decrypt',$id));
            $mission->title=$request->title;
            $mission->short_texts=$request->short_texts;
            if($request->has('image'))
            $mission->image=$this->resizeImage($request->image,'uploads/about_page/mission_image/image-1/images',true,200,200,false);
            if($request->has('image_2'))
            $mission->image_2=$this->resizeImage($request->image_2,'uploads/about_page/mission_image/image-2/images',true,200,200,false);
            if($request->has('image_3'))
            $mission->image_3=$this->resizeImage($request->image_3,'uploads/about_page/mission_image/image-3/images',true,200,200,false);
            
            if($mission->save())
                return redirect()->route(currentUser().'.mission.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
     * @param  \App\Models\About\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mission = Mission::findOrFail(encryptor('decrypt',$id));
        $mission->delete();
        return redirect()->back();
    }
}