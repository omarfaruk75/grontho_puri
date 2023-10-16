<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use App\Models\Home\HomeArticle;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\ImageHandleTraits;

class HomeArticleController extends Controller
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
        $home=HomeArticle::paginate(10);
        return view('home.homeArticle.index',compact('home'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.homeArticle.create');
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
            $home=new HomeArticle;
            $home->user_id=currentUserId();
            $home->category=$request->category;
            $home->short_details=$request->short_details;
            
            if($home->save())
                return redirect()->route(currentUser().'.homeArticle.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
     * @param  \App\Models\HomeArticle  $homeArticle
     * @return \Illuminate\Http\Response
     */
    public function show(HomeArticle $homeArticle)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeArticle  $homeArticle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $home=HomeArticle::findOrFail(encryptor('decrypt',$id));
        return view('home.homeArticle.edit',compact('home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeArticle  $homeArticle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $home=HomeArticle::findOrFail(encryptor('decrypt',$id));
            $home->user_id=currentUserId();
            $home->category=$request->category;
            $home->short_details=$request->short_details;
            if($home->save())
                return redirect()->route(currentUser().'.homeArticle.index')->with($this->resMessageHtml(true,null,'Successfully updated'));
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
     * @param  \App\Models\HomeArticle  $homeArticle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $h= HomeArticle::findOrFail(encryptor('decrypt',$id));
        $h->delete();
        return redirect()->back();
    }
}
