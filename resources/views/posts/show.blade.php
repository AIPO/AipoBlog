@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$post->title}}</div>
                    <div class="card-body">
                        @if($post->post_url !='')
                            <a class="mb-2"
                               href="{{$post->post_url}}"
                               target="_blank">{{$post->post_url}}</a>
                        @endif
                        {{$post->post_text}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection