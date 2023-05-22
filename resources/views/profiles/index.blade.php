@extends('layouts.profils')

@section('content')
    <div class="container pb-3" style="width: 600px;background: #ffffff;border-radius: 10px 10px 10px 10px">
        @foreach ($profils as $profil)
            <div class="ml-5 pt-3">
                <div class="d-flex mb-3">
                    <a style="text-decoration:none;font-size:1.2rem;margin-top: 5px" id="profil"
                        href="{{ route('profiles.show', ['user' => $profil->user->username]) }}" role="button"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        <img class="rounded-circle" style="border: 3px solid #4a89ff; width: 70px;height: 70px;"
                            src="{{ $profil->getImage() }}" alt="">
                        <strong class="ml-3">{{ $profil->user->name }} {{ $profil->user->username }}</strong>
                    </a>
                    <div style="position: absolute;margin-top: 28px;margin-left: 390px"><button class="btn btn-sm btn-primary">S'abonner</button></div>
                </div>
            </div>

            
        @endforeach

    </div>
@endsection
