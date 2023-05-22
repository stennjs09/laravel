@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulaire de transfert</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('buy.eff') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="compte">Compte</label><br>
                            <div class="d-flex">
                               <input id="compte" name="compte" class="ml-3" checked type="radio" value="Paypal"/><div class="lb ml-3"> Paypal</div>
                               <input id="compte" name="compte" class="ml-3" type="radio" value="VISA"/><div class="lb ml-3">  VISA</div>
                               <input id="compte" name="compte" class="ml-3" type="radio" value="Western-Union"/><div class="lb ml-3">  W-U</div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="num_compte">Compte numéro</label>
                                <input id="num_compte" type="text" class="form-control @error('num_compte') is-invalid @enderror" name="num_compte" value="{{ old('num_compte') }}" autocomplete="num_compte" autofocus>

                                @error('num_compte')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="passe">Mots de passe</label>
                                <input id="passe" type="password" class="form-control @error('passe') is-invalid @enderror" name="passe" value="{{ old('passe') }}" autocomplete="passe" autofocus>

                                @error('passe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="desc">Description du transfert</label>
                                <textarea id="desc" type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" autocomplete="desc" autofocus>{{ old('desc') }}</textarea>

                                @error('desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Executer l'achat
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
