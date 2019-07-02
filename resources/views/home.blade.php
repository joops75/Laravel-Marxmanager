@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('inc.messages')

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                        Add Bookmark
                    </button>

                    <ul class="list-group">
                        @foreach ($bookmarks as $bookmark)
                            <li class="list-group-item clearfix">
                                <a href="{{$bookmark->url}}" target="_blank">{{$bookmark->name}}</a>
                                <span class="badge badge-secondary ">{{$bookmark->description}}</span>
                                <span class="button-group float-right">
                                    <button data-id="{{$bookmark->id}}" type="button" class="delete-bookmark btn btn-danger" name="button">
                                        Delete
                                    </button>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Add Bookmark</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{-- <form action="{{route('bookmarks.store')}}" method="post"> --}}
                                    <form action="/store" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>Bookmark Name</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label>Bookmark URL</label>
                                            <input type="text" class="form-control" name="url">
                                        </div>
                                        <div class="form-group">
                                            <label>Website Description</label>
                                            <textarea class="form-control" name="description"></textarea>
                                        </div>
                                        <input type="submit" name="submit" value="Submit" class="btn btn-success">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
