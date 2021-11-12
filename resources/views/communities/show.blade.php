@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$community->name}}</div>
                    <div class="card-body">
                        <a href="{{route('communities.posts.create', $community)}}"
                           class="btn btn-primary">
                            {{__('Add Post')}}</a>
                        <br>
                        @forelse($posts as $post)
                            <a href="{{route('communities.posts.show', [$community, $post])}}">
                                <h3>{{$post->title}}</h3>
                            </a>
                            <p>{{$post->post_text}}</p>
                        @empty
                            {{__('NO posts found')}}
                        @endforelse
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
