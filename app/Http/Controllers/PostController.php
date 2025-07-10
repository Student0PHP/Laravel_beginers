<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }


    public function create()
    {
        return view('post.create');
    }
    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',

        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',

        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }
    public function delete()
    {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function firstOrCreate()
    {
        $post = Post::find(1);
        $anotherPost = [
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'some imagesome.jpg',
            'Likes' => 120,
            'is_published' => 1,
        ];

        $post = Post::firstOrCreate([
            'title' => 'some title from phpstorm'
        ],[
            'title' => 'some title from phpstorm',
            'content' => 'some content',
            'image' => 'some imagesome.jpg',
            'Likes' => 120,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('finished');
    }
    public function updateOrCreate()
    {
        $anotherPost = [
            'title' => 'updateOrCreate from phpstorm1',
            'content' => 'updateOrCreate content1',
            'image' => 'updateOrCreate imageblabla1.jpg',
            'Likes' => 111,
            'is_published' => 1,
        ];
        $post = Post::updateOrCreate([
            'title' => 'another of post not from phpstorm6',
        ],[
            'title' => 'another of post not from phpstorm6',
            'content' => 'updateOrCreate content1',
            'image' => 'updateOrCreate imageblabla1.jpg',
            'Likes' => 111,
            'is_published' => 1,
        ]);
        dump($post->title);
        dd('content');

    }

}
