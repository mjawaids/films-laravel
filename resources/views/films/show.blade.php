@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $film->name }}</div>

                <div class="panel-body">
                    <img class="film-image" src="{{$film->photo}}"><br/>
                    
                    <p>
                        <strong>Genres</strong>: 
                        @foreach ( $film->genres as $genre )
                            {{ $genre->genre }}, 
                        @endforeach
                    </p>

                    <p><strong>Released on</strong>: {{ $film->release_date }}</p>

                    <p><strong>Rating</strong>: {{ $film->rating }}</p>

                    <p><strong>Ticket Price</strong>: ${{ $film->ticket_price }}</p>

                    <p><strong>Country</strong>: {{ $film->country }}</p>

                    <article>
                        <strong>Description</strong>: {{ $film->description}}</br>
                    </article>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Comments</div>

                <div class="panel-body">

                @guest
                    <p>Please login to comment.</p>
                @else
                    <form method="post" action="/comments">
                        {{ csrf_field() }}

                        <input type="hidden" name="film_id" value="{{ $film->id }}">
                        
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" required>
                        </div>

                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <input type="text" class="form-control" id="comment" name="comment" placeholder="Enter Your Comment Here" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Comment</button>
                        </div>
                    </form>
                @endguest

                    <hr/>

                    <ul class="list-group">
                    @foreach($film->comments as $comment)
                        <li class="list-group-item">
                            <em>{{ $comment->name }}</em> commented 
                            <strong>
                                {{ $comment->created_at->diffForHumans() }}: &nbsp;
                            </strong>
                            {{ $comment->comment }}
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
