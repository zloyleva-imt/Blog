@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{ $post->title }}</h1>
            </div>
        </div>
        <div class="row">

            <div class="col-12">

                {!! $post->body !!}

            </div>

        </div>
    </div>

@endsection