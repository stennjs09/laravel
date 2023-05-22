@extends('layouts.app')

@section('content')

<div class="container">
    @forelse ($posts as $post)
        <div class="row mb-4" >
            <div class="col-6 offset-3" style="background: #ffffff;border-radius: 10px 10px 10px 10px">

                <div class="d-flex mb-4">
                    <a style="text-decoration:none;font-size:1.2rem;margin-top: 5px" id="profil" href="{{route('profiles.show',['user'=>$post->user->username])}}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img class="rounded-circle" style="border: 3px solid #4a89ff; width: 50px;height: 50px;" src="{{ $post->user->profile->getImage()  }}" alt="">
                    
                    <div>
                       <strong class="ml-3">{{$post->user->username}}</strong>
                    </a>
                    <br>
                      <small style="font-size: 0.7rem;" class="ml-3">{{$post->created_at->format('d/m/Y')}}</small>
                    </div>
                </div>


               <a href="{{route('posts.show',['post' => $post->id])}}"><img class="w-100 pb-3" src="{{asset('storage').'/'.$post->image}}"></a>
            <hr>
            </div>
        </div>

    @empty
    
    <div class="alert alert-secondary" style="opacity: 70%">
        <strong style="margin-left: 25%">Actualités indisponibles ! </strong><a style="color: #000000e5" href="{{ route('profiles.index')}}">S'abonner à des pages</a> pour voir des publications...
      </div>

    @endforelse
    
</div>

@endsection