<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use LDAP\Result;

class PostCommentController extends Controller
{
    public function store($community_slug, Post $post)
    {
        //post_id auto
        $post->comments()->create([
            'user_id' => auth()->id(),
            'content' => FacadesRequest::input('content')
        ]);

        return back();
    }
}
