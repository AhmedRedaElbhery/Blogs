<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subscriber;

class SubscriberController extends Controller
{
    function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        subscriber::create($data);

        return back()->with('status', 'Subscribed Succsessfully');
    }
}
