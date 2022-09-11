<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        if (!$tweetService->checkOwnTweet($request->user()->id, $request->tweetId)) {
            throw new AccessDeniedHttpException();
        }
        Tweet::destroy($request->tweetId);
        return redirect(route('tweet.index'))->with('feedback.success', '削除が完了しました');
    }
}
