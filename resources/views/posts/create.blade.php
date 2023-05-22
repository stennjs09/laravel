@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Creer un post</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="caption">Caption</label>
                                <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>

                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus>{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                                <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" autocomplete="adresse" autofocus>

                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="agence">Agence contact</label>
                                <input id="agence" type="text" class="form-control @error('agence') is-invalid @enderror" name="agence" value="{{ old('agence') }}" autocomplete="agence" autofocus>

                                @error('agence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        <div class="form-group">
                            <label for="agence">Maison à</label><br>
                            <div class="d-flex">
                               <input id="type" name="type" class="ml-3" checked type="radio" value="vendre"/><div class="lb ml-3"> Vendre</div>
                               <input id="type" name="type" class="ml-3" type="radio" value="louer"/><div class="lb ml-3">  Location</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="prix">Prix en ariary</label>
                                <input id="prix" type="number" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix') }}" autocomplete="prix" autofocus>

                                @error('prix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="prix">Image</label>
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile">Choisir une image...</label>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Creer mon poste
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
