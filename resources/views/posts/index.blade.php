@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
        <div class="row">
            <div class="col-6 offset-3 pb-2">
                <div class="d-flex align-items-center">
                    <div class="pr-2">
                        <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width: 40px">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}"><span class="text-dark">{{ $post->user->username }}</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 offset-3">
                <a href="/p/{{ $post->id }}"><img src="/storage/{{ $post->image }}" class="w-100"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3 pt-2 pb-2">
                <div>
                    <p><span class="font-weight-bold"><a href="/profile/{{ $post->user->id }}"><span class="text-dark">{{ $post->user->username }}</span></a></span> {{ $post->caption }}</p>
                </div>
            </div>
        </div>
        <hr class="col-6 offset-3 pb-5">
    @endforeach
</div>
@endsection
