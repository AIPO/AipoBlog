@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">{{__('My Communities')}}</div>
        <div class="card-body">
            <a href="{{route('communities.create')}}"
               class="btn btn-primary mb-3">
                {{__("Create Community")}}
            </a>
            <table class="table">
                <thead>
                <tr>
                    <th>{{__('Name')}}</th>
                    <th>{{__('Actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($communities as $community)
                    <tr>
                        <td>
                            <a href="{{route('communities.show', $community)}}">
                                {{$community->name}}
                            </a>
                        </td>
                        <td>
                            <a href="{{route('communities.edit', $community)}}"
                               class="btn btn-sm btn-primary">
                                {{__('Edit')}}
                            </a>
                            <form action="{{route('communities.destroy', $community)}}"
                                  class="d-inline-block"
                                  method="POST"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are sure to delete community?')"
                                >
                                    {{__('Delete')}}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
