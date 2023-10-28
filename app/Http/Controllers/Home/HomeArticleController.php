<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use App\Models\Home\HomeArticle;
use Illuminate\Http\Request;
use App\Http\Requests\HomeArticle\AddNewRequest;
use App\Http\Requests\HomeArticle\UpdateRequest;
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
    public function store(AddNewRequest $request)
    {
        try{
            $home=new HomeArticle;
            $home->user_id=currentUserId();
            $home->is_popular=$request->is_popular;
            $home->is_popular_bn=$request->is_popular_bn;
            $home->category=$request->category;
            $home->category_bn=$request->category_bn;
            $home->short_details=$request->short_details;
            $home->short_details_bn=$request->short_details_bn;
            
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
    public function update(UpdateRequest $request, $id)
    {
        try{
            $home=HomeArticle::findOrFail(encryptor('decrypt',$id));
            $home->user_id=currentUserId();
            $home->is_popular=$request->is_popular;
            $home->is_popular_bn=$request->is_popular_bn;
            $home->category=$request->category;
            $home->category_bn=$request->category_bn;
            $home->short_details=$request->short_details;
            $home->short_details_bn=$request->short_details_bn;
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
