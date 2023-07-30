<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = ContactRepository::findAll();

        return view('index')->with('contacts',$contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form')->with('contact',null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->contact = $request->contact;
        $contact->email = $request->email;

        if (ContactRepository::create($contact)) {
            Session::flash('status','saved');
        } else {
            Session::flash('status','error');
        }

        return redirect('contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = ContactRepository::findById($id);

        return view('show')->with('contact',$contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = ContactRepository::findById($id);

        return view('form')->with('contact',$contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ContactRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, $id)
    {
        $contact = ContactRepository::findById($id);

        $contact->name = $request->name;
        $contact->contact = $request->contact;
        $contact->email = $request->email;

        if (ContactRepository::update($contact)) {
            Session::flash('status','saved');
        } else {
            Session::flash('status','error');
        }

        return redirect('contact');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = ContactRepository::findById($id);

        if (ContactRepository::delete($contact)) {
            Session::flash('status','saved');
        } else {
            Session::flash('status','error');
        }

        return redirect('contact');
    }
}
