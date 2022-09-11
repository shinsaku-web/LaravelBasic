<?php

namespace App\Services;

use App\Models\Tweet;

class TweetService
{
    public function getTweets()
    {
        return Tweet::orderby('created_at', 'DESC')->get();
    }

    public function checkOwnTweet(int $userId, int $tweetId): bool
    {
        $tweet = Tweet::find($tweetId);
        if (!$tweet) {
            return false;
        }
        return $tweet->user_id === $userId;
    }
}
