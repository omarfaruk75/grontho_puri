<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HeaderArticle;
use Illuminate\Http\Request;
use App\Http\Requests\HeaderArticle\AddNewRequest;
use App\Http\Requests\HeaderArticle\UpdateRequest;
use App\Http\Traits\ResponseTrait;
use App\Http\Traits\ImageHandleTraits;

class HeaderArticleController extends Controller
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
        $home=HeaderArticle::paginate(10);
        return view('home.headerArticle.index',compact('home'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.headerArticle.create');
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
            $home=new HeaderArticle;
            if($request->has('image'))
                $home->image=$this->resizeImage($request->image,'uploads/home_page/header_article/image',true,200,200,false);
            //  if($request->has('logo_img'))
            //     $home->logo_img=$this->resizeImage($request->logo_img,'uploads/home_page/header_article/logo_img',true,200,200,false);
            $home->user_id=currentUserId();
            $home->title=$request->title;
            $home->title_bn=$request->title_bn;
            $home->category=$request->category;
            $home->category_bn=$request->category_bn;
            
            if($home->save())
                return redirect()->route(currentUser().'.headerArticle.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
     * @param  \App\Models\HeaderArticle  $headerArticle
     * @return \Illuminate\Http\Response
     */
    public function show(HeaderArticle $headerArticle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HeaderArticle  $headerArticle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $home=HeaderArticle::findOrFail(encryptor('decrypt',$id));
        return view('home.headerArticle.edit',compact('home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HeaderArticle  $headerArticle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{
            $home=HeaderArticle::findOrFail(encryptor('decrypt',$id));
            if($request->has('image'))
             $home->image=$this->resizeImage($request->image,'uploads/home_page/header_article/image',true,200,200,false);
            
            $home->user_id=currentUserId();
            $home->title=$request->title;
            $home->title_bn=$request->title_bn;
            $home->category=$request->category;
            $home->category_bn=$request->category_bn;
            
            if($home->save())
                return redirect()->route(currentUser().'.headerArticle.index')->with($this->resMessageHtml(true,null,'Successfully updated'));
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
     * @param  \App\Models\HeaderArticle  $headerArticle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $h= HeaderArticle::findOrFail(encryptor('decrypt',$id));
        $h->delete();
        return redirect()->back();
    }
}
