@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Posts list</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-2">
                <a class="btn btn-info" href="{{ route('admin.posts.create') }}">Create new post</a>
            </div>
        </div>

        <div class="row">

            <form class="col-12">
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <input type="text" class="form-control mb-2" id="inlineFormInput"
                               name="search" placeholder="Enter search phrase">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                    </div>
                </div>
            </form>

        </div>

        <div class="row">

            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Author</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 + ($posts->perPage() * ($posts->currentPage() - 1)) }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->published_status }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.posts.edit',[$post->slug]) }}">Edit</a>
                                <form action="{{ route('admin.posts.destroy',[$post->slug]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>

        </div>
        <div class="row">
            {{ $posts->links() }}
        </div>
    </div>
@endsection