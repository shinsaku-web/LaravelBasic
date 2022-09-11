<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\UpdateRequest;
use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UpdateRequest $request, TweetService $tweetService, $id)
    {
        if (!$tweetService->checkOwnTweet($request->user()->id, $id)) {
            throw new AccessDeniedHttpException();
        }
        Tweet::where('id', $id)->update([
            'content' => $request->tweet,
        ]);
        return redirect(route('tweet.update.index', ['tweetId' => $id]))->with('feedback.success', 'つぶやきを編集しました');
    }
}
