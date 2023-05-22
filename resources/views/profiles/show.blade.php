@extends('layouts.profil')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-4 text-center">
       <img class="rounded-circle" style="border: 5px solid #4a89ff;width: 200px;height: 200px;" src="{{ $user->profile->getImage() }}">
    </div>
    <div class="col-8">
    <div class="d-flex">
        <div class="d-flex align-items-baseline">
             <div class="h4 mr-3 pt-2">{{$user->username}}</div>
             <follow-button profile-id="{{ $user->profile->id }}" follows="{{$follows}}"></follow-button>
         </div>
    </div>
    <div class="d-flex mt-3">
       <div class="mr-3"><strong>{{ $postsCount }}</strong> publication(s)</div>
       <div class="mr-3"><strong>{{ $followersCount }}</strong> abonne(s)</div>
       <div class="mr-3"><strong>{{ $followingCount }}</strong> abonnement(s)</div> 
    </div>

    @can('update', $user->profile)
    <a href="{{route('profiles.edit',['user' => $user->username])}}" class="btn btn-outline-secondary mt-3">Modifier mes informations</a>
    @endcan

    <div class="mt-3">
        <div class="font-weight-bold">{{$user->profile->title}}</div>
        <div>{{$user->profile->description}}</div>
        <a href="#">{{$user->profile->url}}</a>
    </div>
</div>
    <div class="container mt-5" style="background: #ffffff;border-radius: 10px 10px 10px 10px"> 
        <div class="row mt-3">
        @foreach ($user->posts as $post )       
            <div class="col-4">
               <a href="{{route('posts.show',['post' => $post->id])}}"><img class="w-100 pb-3" src="{{asset('storage').'/'.$post->image}}"></a>
            </div>
        @endforeach
        </div>
    </div>

    </div>
</div>
@endsection
