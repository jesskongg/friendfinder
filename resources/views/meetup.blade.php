@extends('layouts.app')

@section('styles')
    <style>
        .gap-top {
            margin-top: 15px;
        }
        .gap-bottom {
            margin-top: 15px;
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
            <div class="form-group">
                <label for="name">Time</label>
                <input class="form-control" type="date" name="date" id="date" required>
            </div>
            <button class="btn btn-success" type="submit" name="Submit">Create</button>
        </form>
    </div>
</div>
@foreach($meetups as $meetup)
    <div class="card col-md-8 gap-top gap-bottom">
        <div class="card-body">
            <h5 class="card-title">{{ $meetup->title }}<h6>
            <p class="card-text">Hosted By: {{ $meetup->username }}</p>
            <p class="card-text">{{ $meetup->description }}</p>
            <p class="card-text">Location: {{ $meetup->location }}</p>
            <p class="card-text">Time: {{ $meetup->date }}</p>
            @if(isset(Auth::User()->id) && Auth::User()->id == $meetup->creator_id)
            <form action='{{ url("/meetups/$meetup->id") }}' method="POST">
                @csrf
                {{ method_field('DELETE') }}
                <button class="btn btn-danger col-md-2 gap-top" type="submit" name="Submit">Cancel Event</button>
            </form>
            @endif
        </div>
    </div>
@endforeach
@endsection()
