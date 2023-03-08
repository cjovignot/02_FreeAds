<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index() {

         $posts = Post::orderBy('title')->get();
        // $title = 'Mon super titre';
        // return view('articles', compact ('title')); compact envoie le title qu'on peut recuperer ds une vue avec {$title{}}
        // return view('articles')-> with('title', $title); mm chose qu'au dessu

        return view('articles', [
        'posts' => $posts
    ]);
    }



    public function show ($id) 
    {

        $post = Post::findOrFail($id);
        // $post = Post::where('title', '=', 'Titre 8')->get();
        // $post = Post::where('title', 'Titre 8')->firstorfail();

        // $posts = [
        //     1 => 'Mon titre 1',
        //     2 => 'Mon titre 2',

        // ];

        // $post = $posts[$id] ?? 'pas de titre';

        return view('article', [
            'post' => $post
        ]);

    }

    public function create() 
    {

        return view('form');

    }
     

    public function store(Request $request) 
    {
        // $post = new Post();
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();

        Post::create([
            'title' => $request->title,
            'content' => $request->content


        ]);
        dd('Post crée !');

        // dd($post);
    }

    public function contact()
    {
    return view('contact');

    }
}