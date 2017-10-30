@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Films</div>

                <div class="panel-body">

                    <div class="card" style="width: 20rem;" ng-repeat="film in films.data">
                        <img class="card-img-top" src="@{{film.photo}}" alt="@{{film.name}}">
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="/films/@{{film.slug}}">@{{ film.name }}</a>
                            </h4>
                            <p class="card-text">@{{ film.description }}</p>
                        </div>
                    </div>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" onclick='prev()' href>
                                    Previous
                                </a>
                            </li>
                            
                            <li class="page-item">
                                <a class="page-link" onclick='next()' href>
                                    Next
                                </a>
                            </li>
                        </ul>
                    </nav>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
