<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Mail\SendContactMessage;
use App\Upload\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contacts.index', ['contacts' => Contact::paginate(4)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $request->merge(['image' => Upload::uploadImage($request->file, 'contacts' , rand(0,45454841))]);


        Contact::create($request->except('receiver_email','receiver_name','file'));

        // Send Inbox To A Specific Mail
        Mail::to($request->receiver_email)->send(new SendContactMessage($request->name, $request->receiver_name, $request->message));

        return 'ok';
    }

    public function show($id)
    {
        return view('admin.contacts.show', ['contact' => Contact::findOrFail($id)]);
    }
}
