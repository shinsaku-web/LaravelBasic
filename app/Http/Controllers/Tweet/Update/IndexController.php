<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, TweetService $tweetService, $id)
    {
        $tweet = Tweet::findOrFail($id);
        if (!$tweetService->checkOwnTweet($request->user()->id, $id)) {
            throw new AccessDeniedHttpException();
        }
        return view('tweet.update', compact('tweet'));
    }
}
