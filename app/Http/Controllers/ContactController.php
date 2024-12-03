<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = request()->validate([
            'email' => 'required|email|unique:contacts,email',
            'name' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        Contact::create($data);

        return back()->with('status-message', 'successfully');
    }
}
