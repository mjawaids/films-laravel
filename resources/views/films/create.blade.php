@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Film</div>
                <div class="panel-body">
                    <form method="post" action="/films" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        
                        {{--  <input type="hidden" id="stand" name="stand" value="{{ $stand->id }}">  --}}

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Film Name" required>
                        </div>

                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo" placeholder="Upload film photo" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="Enter description" required>
                        </div>

                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <select class="form-control" id="genre" name="genre[]" multiple required>
                                @foreach($genres as $genre)
                                    <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="release_date">Release Date</label>
                            <input type="date" class="form-control" id="release_date" name="release_date" placeholder="Enter Release Date" required>
                        </div>

                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" placeholder="Enter Film Rating" required>
                        </div>

                        <div class="form-group">
                            <label for="ticket_price">Ticker Price ($)</label>
                            <input type="number" class="form-control" id="ticket_price" name="ticket_price" placeholder="Enter Ticket Price" required>
                        </div>

                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
