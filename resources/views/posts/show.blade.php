@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">{{$post->title}}</div>
        <div class="card-body">
            @if($post->post_image != '')
                <img class="card-img-top"
                     src="{{asset('storage/posts/'.$post->id.'/400x400_'.$post->post_image)}}" alt="">
                <br>
            @endif
            @if($post->post_url !='')
                <a class="mb-2"
                   href="{{$post->post_url}}"
                   target="_blank">{{$post->post_url}}</a>
            @endif

            {{$post->post_text}}

            <hr>
            <h4>{{__('Comments')}}</h4>
            @forelse($post->comments as $comment)
                <div class="media">
                    <h5>{{$comment->user->name}}</h5>
                    <span class="text-muted">{{$comment->created_at->diffForHumans()}}</span>
                    <div class="media-body">
                        {{$comment->comment_text}}
                    </div>
                </div>
            @empty
                {{__('No comments yet.')}}
            @endforelse
            @auth
                <form action="{{route('posts.comments.store',$post)}}"
                      method="POST">
                    @csrf
                    {{__('Add Comment')}}
                    <textarea name="comment_text" id="" cols="30" rows="10"
                              class="form-control mb-2" required>

                                </textarea>
                    <button type="submit" class="btn btn-primary">{{__('Add Comment')}}</button>
                </form>

                @if($post->user_id == auth()->id())
                    <hr>
                    <a href="{{route('communities.posts.edit',[$community, $post])}}"
                       class="btn btn-sm btn-secondary">{{__('Edit')}}</a>
                    <form action="{{route('communities.posts.destroy', [$community,$post])}}"
                          class="d-inline-block"
                          method="POST"
                    >
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('Are sure to delete community?')"
                        >
                            {{__('Delete Post')}}
                        </button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
@endsection
