@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit URL Shortage Form') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('urls.update', $url) }}">
                        @csrf
                        @method('patch')
                        <div class="row mb-3">
                            <label for="original_url" class="col-md-4 col-form-label text-md-end">{{ __('Destination') }}</label>

                            <div class="col-md-6">
                                <input   type="text" value="{{ old('original_url', $url->original_url) }}" placeholder="https://example.com/my-long-url" class="form-control @error('original_url') is-invalid @enderror" name="original_url" value="{{ old('original_url') }}" required autocomplete="original_url" autofocus>

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
                                <input   type="text" value="{{ old('title', $url->title) }}" class="form-control @error('title_url') is-invalid @enderror" name="title" value="{{ old('title_url') }}" required autocomplete="title_url">

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
                                    {{ __('Edit a link') }}
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