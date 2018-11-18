@extends('layouts.app')

@section('styles')
    <style>
        .asd: {
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
@endsection()

@section('content')
<h3>Meetups</h3>

<div class="card col-md-8">
    <button class="btn btn-link" data-toggle="collapse" data-target="#createCardCollapse" aria-expanded="true" aria-controls="createCardCollapse">
        <h5>Create a meetup </h5>
    </button>
    <div class="card-body collapse" id="createCardCollapse">
        <form action="{{ url('/meetups') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Title</label>
                <input class="form-control" type="text" name="title" id="title" required>
            </div>
                <div class="form-group">
                <label for="name">Description</label>
                <textarea class="form-control" rows="4" cols="25" name="description" id="description"></textarea>
            </div>
            <div class="form-group">
                <label for="name">Location</label>
                <input class="form-control" type="text" name="location" id="location" required>
            </div>
            <button class="btn btn-success" type="submit" name="Submit">Create</button>
        </form>
    </div>
</div>
@foreach($meetups as $meetup)
    <div class="card col-md-8" style="margin-top: 15px; margin-top: 15px">
        <div class="card-body">
            <h5 class="card-title">{{ $meetup->title }}<h6>
            <p class="card-text">{{ $meetup->description }}<h6>
            <p class="card-text">Location: {{ $meetup->location }}<h6>
        </div>
    </div>
@endforeach
@endsection()
