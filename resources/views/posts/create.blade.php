@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$community->name}}: {{__('Add Post')}}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('communities.posts.store', $community) }}">
                            @csrf
                            <div class="form-group row">
                                <label for="title"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title"
                                           type="text"
                                           class="form-control @error('title') is-invalid @enderror"
                                           name="title"
                                           value="{{ old('title') }}" required autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="post_text"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Post text') }}</label>
                                <div class="col-md-6">
                                    <textarea id="description"
                                              rows="10"
                                              class="form-control @error('post_text') is-invalid @enderror"
                                              name="post_text"
                                              autofocus
                                    >
                                        {{ old('post_text') }}
                                    </textarea>

                                    @error('post_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="post_url"
                                       class="col-md-4 col-form-label text-md-right">{{ __('URL Link') }}</label>
                                <div class="col-md-6">
                                    <input
                                        type="text"
                                        name="post_url"
                                        class="form-control @error('post_url') is-invalid @enderror"
                                        value="{{old('post_url')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="post_image"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                                <div class="col-md-6">
                                        <input
                                            type="file"
                                            name="post_image"
                                            class="form-control @error('post_image') is-invalid @enderror"
                                            value="{{old('post_image')}}">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create Community') }}
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
