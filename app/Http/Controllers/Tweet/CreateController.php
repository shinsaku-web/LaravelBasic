<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Models\Tweet;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateRequest $request)
    {
        Tweet::create([
            'content' => $request->tweet,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $tweets = Tweet::orderby('created_at', 'DESC')->get();
        return redirect()->route('tweet.index', compact('tweets'));
        // return view('tweet.index', compact('tweets'));
    }
}
