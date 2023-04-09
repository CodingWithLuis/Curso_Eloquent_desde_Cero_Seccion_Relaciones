<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Hospital;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PolymorphicController extends Controller
{

    public function indexHasOne(): View
    {
        $profiles = Profile::with('image', 'user')->get();

        $countries = Country::with('image')->get();

        return view('polymorphic.has_one', compact('profiles', 'countries'));
    }

    public function indexHasMany(): View
    {
        $hospitals = Hospital::with('documents')->get();

        $users = User::with('documents')->get();

        return view('polymorphic.has_many', compact('hospitals', 'users'));
    }

    public function indexManyMany(): View
    {
        //Ejemplo 1
        // $video = Video::create([
        //     'title' => 'Video 2'
        // ]);
        //
        // $video->tags()->create([
        //     'name' => 'Canciones'
        // ]);

        //Ejemplo 2
        // $tag = Tag::find(2);
        // //
        // // $tag->videos()->create([
        // //     'title' => 'Video 5'
        // // ]);
        //
        // $video = Video::find(4);
        //
        // $video->tags()->attach($tag);


        //Ejemplo 3
        // DB::transaction(function () {
        //     $post = Post::create([
        //         'title' => 'Post 2'
        //     ]);
        //
        //     $post->tags()->create([
        //         'name' => 'Facebook'
        //     ]);
        // });

        return view('polymorphic.many_many');
    }
}
