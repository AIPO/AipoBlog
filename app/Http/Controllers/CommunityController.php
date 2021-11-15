<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommunityRequest;
use App\Http\Requests\UpdateCommunityRequest;
use App\Models\Community;
use App\Models\Topic;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $communities = Community::where('user_id', auth()->id())->get();
        return view('communities.index')->with([
            'communities' => $communities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $topics = Topic::all();
        return view('communities.create')
            ->with([
                'topics' => $topics
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCommunityRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCommunityRequest $request)
    {
        $community = Community::create($request->validated() + ['user_id' => auth()->id()]);
        $community->topics()->attach($request->topics);

        return redirect()->route('communities.show', $community);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Community $community
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Community $community)
    {
        $query = $community->posts()->with('votes');
        if (request('sort', '') == 'popular') {
            $query->orderBy('votes', 'desc');
        } else {
            $query->latest('id');
        }
        $posts = $query->paginate(20);
        return view('communities.show')->with([
            'community' => $community,
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Community $community
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Community $community)
    {
        if ($community->user_id != auth()->id()) {
            abort(403);
        }
        $community->load('topics');
        $topics = Topic::all();
        return view('communities.edit')->with([
            'community' => $community,
            'topics' => $topics
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCommunityRequest $request
     * @param \App\Models\Community $community
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCommunityRequest $request, Community $community)
    {
        if ($community->user_id != auth()->id()) {
            abort(403);
        }
        $community->update($request->validated());
        $community->topics()->sync($request->topics);

        return redirect()->route('communities.index')
            ->with('message', __('Successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Community $community
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Community $community)
    {
        if ($community->user_id != auth()->id()) {
            abort(403);
        }
        $community->delete();
        return redirect()->route('communities.index')
            ->with('message', __('Successfully deleted.'));
    }
}
