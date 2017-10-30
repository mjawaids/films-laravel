<?php

namespace App\Http\Controllers;

use App\Film;
use App\Genre;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Film::paginate(1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        return view('films.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request('genre'));

        // save photo
        $photo = $request->hasFile('photo') ? request('photo') : NULL;
        $photoName = $photo->hashName();
        $photo->move(public_path() . "/images/", $photoName);
        
        $film = Film::create( [
            'name'          => request('name'),
            'slug'          => str_slug(request('name')),
            'photo'         => "/images/$photoName",
            'description'   => request('description'),
            'release_date'  => request('release_date'),
            'rating'        => request('rating'),
            'ticket_price'  => request('ticket_price'),
            'country'       => request('country')
            ] );

        $genres = request('genre');
        foreach($genres as $genre)
        {
            $film->genres()->attach($genre);
        }

        session()->flash('success', 'Film has been added.');
        
        return redirect("/films");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        //
    }
}
