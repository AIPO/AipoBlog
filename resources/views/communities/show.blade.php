@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8">
                    <h1>{{$community->name}}</h1>
                </div>
                <div class="col-4 text-right">
                    <a href="{{route('communities.show', $community)}}"
                       @if(request('sort', '')=='') class="text-danger" @endif>
                        {{__('Newest posts')}}
                    </a>
                    <br>
                    <a href="{{route('communities.show', $community)}}?sort=popular"
                       @if(request('sort', '')=='popular') class="text-danger" @endif>
                        {{__('Popular this week')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <a href="{{route('communities.posts.create', $community)}}"
           class="btn btn-primary">
            {{__('Add Post')}}</a>
        <br>
        @forelse($posts as $post)
            <div class="row">
                <div class="col-sm-1 text-center">
                    <div>
                        <a href="{{route('post.vote',[ $post->id, 1])}}">
                            <i class="fa fa-2x fa-sort-asc" aria-hidden="true"></i>
                        </a>

                    </div>
                    <h5>{{$post->votes}}</h5>
                    <div>
                        <a href="{{route('post.vote',[ $post->id, -1])}}">
                            <i class="fa fa-2x fa-sort-desc" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="col-11">
                    <a href="{{route('communities.posts.show', [$community, $post])}}">
                        <h3>{{$post->title}}</h3>
                        <span class="text-muted">
                                        {{$post->created_at->diffForHumans()}}
                                    </span>
                    </a>
                    <p>{{Str::words($post->post_text,2)}}</p>
                </div>
            </div>
        @empty
            {{__('No posts found')}}
        @endforelse
        {{$posts->links()}}
    </div>
@endsection
