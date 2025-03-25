<?php

namespace App\Http\Controllers\BadWord;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBadWordRequest;
use App\Http\Requests\UpdateBadWordRequest;
use App\Models\BadWord\BadWord;

class BadWordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $badWords = BadWord::all();
        return view('configuration.bad-words');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBadWordRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BadWord $badWord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BadWord $badWord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBadWordRequest $request, BadWord $badWord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {


    }
}
