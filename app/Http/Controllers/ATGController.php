<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Http\Requests\ATGRequest;

class ATGController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserDetail::paginate(10);
        return view('form.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ATGRequest $request)
    {
        $validated = $request->validated();
        UserDetail::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'pincode' => $validated['pincode'],
        ]);
        
        return redirect()->route('form.create')->with('status', 'User Entry Successful!');
    }

}
