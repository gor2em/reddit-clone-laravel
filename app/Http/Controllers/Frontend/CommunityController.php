<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommunityPostResource;
use App\Http\Resources\CommunityResource;
use App\Models\Community;
use Inertia\Inertia;

class CommunityController extends Controller
{
    public function show($slug)
    {
        //community
        $community = Community::where('slug', $slug)->firstOrFail();

        //community posts                                       //auth postvotes
        $posts = CommunityPostResource::collection($community->posts()->with(['user', 'postVotes' => function ($query) {
            $query->where('user_id', auth()->id());
        }])->withCount('comments')->paginate(3));
        //kullanıcının yaptığı oylamaayı postvotes fonksiyonu içerisinde sorgu ile çektik. array içerisi 0 ise oylama yapmamış.

        $communities = CommunityResource::collection(Community::withCount('posts')->latest()->take(4)->get());

        return Inertia::render('Frontend/Communities/Show', compact('community', 'posts', 'communities'));
    }
}
