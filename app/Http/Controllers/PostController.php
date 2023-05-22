<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Intervention\Image\Facades\Image;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following->pluck('user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->simplepaginate();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
           'caption' =>['required', 'string'],
           'description' =>['required', 'string'],
           'adresse' =>['required', 'string'],
           'agence' =>['required', 'string'], 
           'type' =>[], 
           'prix' =>['required', 'string'], 
           'image' =>['required', 'image'],
        ]);

       $imagePath = request('image')->store('uploads','public');

       $image = Image::make(public_path("/storage/{$imagePath}"))->fit(1200, 1200);
       $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'description' => $data['description'],
            'adresse' => $data['adresse'],
            'agence' => $data['agence'],
            'type' => $data['type'],
            'prix' => $data['prix'],
            'image' => $imagePath
        ]);
        return redirect()->route('profiles.show',['user' => auth() ->user()]);
    }

    public function show(Post $post){

        return view('posts.show',compact('post'));
    }
    public function buy(Post $id){

        return view('posts.buy',compact('id'));
    }

    public function buy_eff(){

        $data = request()->validate([
           'compte' =>['required', 'string'],
           'num_compte' =>['required', 'string'],
           'passe' =>['required', 'string'],
           'desc' =>['required', 'string'],
           'email' =>['required', 'email']
        ]);
        return redirect()->route('profiles.show',['user' => auth() ->user()]);
    }

    public function delete(Post $post){

        auth()->user()->posts()->delete();
        return redirect()->route('profiles.show',['user' => auth() ->user()]);
    }
}
