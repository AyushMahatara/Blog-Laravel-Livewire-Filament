<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $featurePosts =
            Cache::remember('featurePosts', Carbon::now()->addMinutes(10), function () {
                return Post::published()->featured()->with('categories')->latest('published_at')->take(3)->get();
            });

        $latestPosts =
            Cache::remember('latestPosts', Carbon::now()->addMinutes(10), function () {
                return Post::published()->with('categories')->latest('published_at')->take(9)->get();
            });

        return view('home', [
            'featuredPosts' => $featurePosts,
            'latestPosts' => $latestPosts
        ]);
    }
}
