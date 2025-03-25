<?php

namespace App\Http\Controllers\Api\BadWord;

use App\Http\Controllers\Controller;
use App\Models\BadWord\BadWord;
use Illuminate\Http\Request;

class BadWordController extends Controller
{
    public function index(){
        $badWords = BadWord::all();
        return response()->json($badWords);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'priority' => 'required',
            'word' => 'required',
            'match' => 'required',
        ]);
        try{
            $badWord = BadWord::create($validatedData);
            return response()->json([
                'message' => 'Bad word successfully created.',
                'badWord' => $badWord
            ],200);
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Bad word not created.',
                'message' => $e->getMessage()
            ],500);
        }
    }
    public function show(Request $request){
        $badWord = BadWord::where('word', $request->input('word'))->first();
        if(!$badWord)
            return response()->json('Bad word not found', 404);
        return response()->json($badWord, 202);
    }
    public function update(Request $request){
        $badWord = BadWord::where('word', $request->input('word'))->first();
        if(!$badWord)
            return response()->json('Bad word not found', 404);

        $validatedData = $request->validate([
            'priority' => 'required',
            'word' => 'required',
            'match' => 'required',
        ]);

        $badWord->update($validatedData);
        return response()->json([
            'message' => 'Bad word updated successfully',
            'badWord' => $badWord
        ], 202);

    }
    public function destroy(Request $request){
        $badWord = BadWord::where('word', $request->input('word') )->first();
        if(!$badWord)
            return response()->json('Bad word not found', 404);
        $badWord->delete();
        return response()->json([
            'message' => 'Bad word deleted successfully'
        ],200);
    }
}
