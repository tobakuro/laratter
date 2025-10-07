<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Tweet;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    /**
     * Display a listing of bookmarks.
     */
    public function index()
    {
        $bookmarks = auth()->user()->bookmarks()->with('tweet.user')->latest()->get();
        return view('bookmarks.index', compact('bookmarks'));
    }

    /**
     * Store a bookmark.
     */
    public function store(Tweet $tweet)
    {
        $existingBookmark = Bookmark::where('user_id', auth()->id())
            ->where('tweet_id', $tweet->id)
            ->first();

        if (!$existingBookmark) {
            Bookmark::create([
                'user_id' => auth()->id(),
                'tweet_id' => $tweet->id,
            ]);
        }

        return back();
    }

    /**
     * Remove a bookmark.
     */
    public function destroy(Tweet $tweet)
    {
        Bookmark::where('user_id', auth()->id())
            ->where('tweet_id', $tweet->id)
            ->delete();

        return back();
    }
}
