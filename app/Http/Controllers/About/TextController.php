<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;

use App\Models\About\Text;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;


class TextController extends Controller
{
    use ResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $text= Text::Paginate(10);
      return view('about.text.index', compact('text'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   return view('about.text.create');
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
            $text=new Text;
            $text->category=$request->category;
            $text->short_texts=$request->short_texts;
            
            if($text->save())
                return redirect()->route(currentUser().'.text.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
    public function show(Text $text)
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
      $text=Text::findOrFail(encryptor('decrypt',$id));
      return view('about.text.edit',compact('text'));
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
            $text= Text::findOrFail(encryptor('decrypt',$id));
            $text->category=$request->category;
            $text->short_texts=$request->short_texts;
            if($text->save())
                return redirect()->route(currentUser().'.text.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
      $text=Text::findOrFail(encryptor('decrypt',$id));
      $text->delete();
      return redirect()->back();
    }
}
