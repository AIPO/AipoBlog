<div class="card">
    <div class="card-header">
        {{__('Newest Posts')}}
    </div>
    <div class="card-body">
        @forelse($newestPosts as $post)
            <div class="media">
                <div class="media-body">
                    <h5><a href="{{route('communities.posts.show',[$post->community, $post] )}}">{{$post->title}}</a>
                    </h5>
                    <span class="text-muted">{{$post->created_at->diffForHumans()}}</span>
                </div>
            </div>

        @empty
            {{__('No new Posts')}}
        @endforelse
    </div>
</div>
<div class="card mt-4">
    <div class="card-header">
        {{__('Newest Communities')}}
    </div>
    <div class="card-body">
        @foreach($newestCommunities as $community)
            <div class="media">
                <div class="media-body">
                    <h5>
                        <a href="{{route('communities.show',$community )}}">{{$community->name}}</a>
                         ({{$community->posts_count}})
                    </h5>

                    <span class="text-muted">{{$community->created_at->diffForHumans()}}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
