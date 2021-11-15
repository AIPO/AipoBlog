@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Most Popular Posts') }}</div>

        <div class="card-body">
            @foreach($posts as $post)
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
                        {{$post->votes_count}}
                        <a href="{{route('communities.posts.show', [$post->community, $post])}}">
                            <h3>{{$post->title}}</h3>
                            <span class="text-muted">
                                        {{$post->created_at->diffForHumans()}}
                                    </span>
                        </a>
                        <p>{{Str::words($post->post_text,2)}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
