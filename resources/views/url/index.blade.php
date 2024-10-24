@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('URL Shortage Form') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('urls.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="original_url" class="col-md-4 col-form-label text-md-end">{{ __('Destination') }}</label>

                            <div class="col-md-6">
                                <input   type="text" placeholder="https://example.com/my-long-url" class="form-control @error('original_url') is-invalid @enderror" name="original_url" value="{{ old('original_url') }}" required autocomplete="original_url" autofocus>

                                @error('original_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
 
                        <div class="row mb-3">
                            <label for="title_url" class="col-md-4 col-form-label text-md-end">{{ __('Title (optional)') }}</label>

                            <div class="col-md-6">
                                <input   type="text" class="form-control @error('title_url') is-invalid @enderror" name="title_url" value="{{ old('title_url') }}" required autocomplete="title_url">

                                @error('title_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create a link') }}
                                </button>
 
                            </div>
                        </div>
                    </form>
                    





                </div>
            </div>
        </div> 
        @foreach ($urls as $item)
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header"> 
                 {{ $item->user->name }} 
                <span class="float-end text-muted"> {{ $item->created_at->format('j M Y, g:i a') }} </span>
                </div>

                <div class="card-body">
                <nav class="navbar navbar-expand-md"> 
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                         
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ __('Action') }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                  
                                    <a class="dropdown-item" href="{{route('urls.edit', $item)}}">
                                        {{ __('Edit') }}
                                    </a>

                                    <a class="dropdown-item" href="#"
                                       onclick="event.preventDefault();
                                                     document.getElementById('delete-form').submit();">
                                        {{ __('Delete') }}
                                    </a>

                                    <form id="delete-form" action="{{ route('urls.destroy', $item) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </li>
                        
                    </ul>
                </div> 
        </nav>

                    <div class="row ">
                            <label for="original_url" class="col-md-12 col-form-label  ">{{ __('Title') }} : {{ $item->title }}</label> 
                    </div>  
                    <div class="row ">
                            <label for="original_url" class="col-md-12 col-form-label  ">{{ __('Original Url') }} : {{ $item->original_url }}</label> 
                    </div>  
                    <div class="row ">
                            <label for="original_url" class="col-md-12 col-form-label  ">{{ __('Shortener Url') }} : <a href="{{ route('shortener-url', $item->shortener_url) }}" target="_blank">
                                {{ route('shortener-url', $item->shortener_url) }}
                            </a></label> 
                    </div>  
                </div>
            </div>
        </div>
        @endforeach
       
    </div>   
</div>

@endsection
