@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ml-5 mr-5">
        <div class="col-4 pt-5 pl-5">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle mx-auto d-block" height="150px">
        </div>
        <div class="col-8 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex">
                    <div class="d-flex align-items-center">
                        <h3>{{ $user->username }}</h3>

                        @can('view',$user->profile)
                            <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                        @else
                            @can('update', $user->profile)
                                <a class="ml-3" href="/profile/{{ $user->id }}/edit">
                                    <button class="btn btn-light btn-sm vh-5">edit profile</button>
                                </a>
                            @endcan
                        @endcan
                    </div>
                </div>

                @can('update', $user->profile)
                    <a class=" color-white" href="/p/create"><button class="btn btn-outline-primary btn-sm vh-5">+Photo</button></a>
                @endcan

            </div>
            <div class="d-flex pt-3">
                <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="pt-3"><strong>{{ $user->profile->title ?? '' }}</strong></div>
            <div>{{ $user->profile->description ?? '' }}</div>
            <div><a href="#">{{ $user->profile->url ?? '' }}</a></div>
        </div>
    </div>
    <div class="row ml-5 mr-5 pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-5">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        @endforeach

    </div>
</div>
@endsection
