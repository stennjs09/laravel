@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-7">
            <img style="border-radius: 9px 0px 0px 9px" src="{{ asset('storage'). '/' . $post->image }}" class="w-100">
            @can('update',$post->user->profile)
           
            <li style="font-size: 2rem;color: white;margin-top: -645px;margin-left: 565px;position: absolute;list-style:none" class="nav-item dropdown">
                <div id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="bi bi-three-dots"></i>
                </div>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    
                    <a class="dropdown-item" href="{{ route('posts.delete', ['post'=>$post->id]) }}">Supprimer la post</a>

                </div>
            </li>
            @endcan
            <a style="opacity: 90%;margin-top: -100px;margin-left: 230px;border-radius: 9px 9px 9px 9px" href="{{route('posts.buy',['id' => $post->id])}}" class="btn btn-outline-primary">Effectuer un transfert</a>
            
        </div>
        <div class="col-5" style="background: #ffffff;box-shadow: 2px 2px  #3333330d;border-radius: 0px 9px 9px 0px">
            <div class="inf mt-1">
             <div class="ml-3 d-flex mb-4">
                <a style="text-decoration:none;font-size:1.2rem;margin-top: 5px" id="profil" href="{{route('profiles.show',['user'=>$post->user->username])}}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img class="rounded-circle" style="border: 3px solid #4a89ff; width: 50px;height: 50px;" src="{{ $post->user->profile->getImage()  }}" alt="">
                
                <div>
                   <strong class="ml-3">{{$post->user->username}}</strong>
                </a>
                <br>
                  <small style="font-size: 0.7rem;" class="ml-3">{{$post->created_at->format('d/m/Y')}}</small>
             </div>
            </div>
            
            <div class="ml-5 mt-5">
                <h1>{{$post->caption}}</h1><br>
                <span class="mt-2">Description...</span><br>

                <textarea class="ml-5" disabled style="resize: none;color: black;background: white;height: auto;border: none">{{$post->description}}</textarea><br><br>
                
                <div class="ml-3">
                <i style="font-size: 1.2rem" class = "mr-4 bi bi-geo-alt-fill"> </i><span class="mt-2">{{$post->adresse}}</span><br><br>
                <i style="font-size: 1.2rem" class = "mr-4 bi bi-telephone-fill"> </i><span class="mt-3">{{$post->agence}}</span><br><br>
                <i style="font-size: 1.2rem" class = "mr-4 bi bi-check-circle-fill"> </i>Maison à <span class="mt-3">{{$post->type}}</span><br><br>
                <i style="font-size: 1.2rem" class = "mr-4 bi bi-currency-exchange"> </i><span class="mt-3">{{$post->prix}} Ar</span>
                </div>
               

            </div>
        </div>

        </div>
    </div>
</div>

@endsection