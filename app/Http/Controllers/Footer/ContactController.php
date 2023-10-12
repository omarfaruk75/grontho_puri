<?php

namespace App\Http\Controllers\Footer;


use App\Http\Controllers\Controller;
use App\Models\Footer\Contact;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseTrait;


class ContactController extends Controller
{
    use ResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $contact=Contact::Paginate(10);
       return view('footer.contact.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('footer.contact.create');
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
            $contact= new Contact;
            $contact->address=$request->address;
            $contact->mobile=$request->mobile;
            $contact->email=$request->email;
            if($contact->save())
                return redirect()->route(currentUser().'.contact.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
     * @param  \App\Models\Footer\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Footer\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact=Contact::findOrFail(encryptor('decrypt',$id));
        return view('footer.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Footer\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try{
            $contact=Contact::findOrFail(encryptor('decrypt',$id));
            $contact->address=$request->address;
            $contact->mobile=$request->mobile;
            $contact->email=$request->email;
            if($contact->save())
                return redirect()->route(currentUser().'.contact.index')->with($this->resMessageHtml(true,null,'Successfully Registred'));
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
     * @param  \App\Models\Footer\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact=Contact::findOrFail(encryptor('decrypt',$id));
        $contact->delete();
        return redirect()->back();
    }
}
