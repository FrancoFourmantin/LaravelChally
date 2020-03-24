<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Bookmark;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class BookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bookmark = new Bookmark;
        $bookmark->id_usuario = $request->input('usuario');
        $bookmark->id_desafio = $request->input('desafio');

        $bookmark->save();
        return Redirect::to(URL::previous() . "#desafio-" . $bookmark->id_desafio);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {   

        if($username == Auth::user()->username) 
        {
            $username = Auth::user()->username;
            $userid = Auth::user()->id_usuario;
            $bookmarks = Bookmark::all()->where('id_usuario',$userid);
            $vac = compact('username','bookmarks');
            return view('bookmarks',$vac);
        }
        else{
            return redirect('feed');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookmark = Bookmark::find($id);
        $bookmark->delete();
        return Redirect::to(URL::previous() . "#desafio-" . $bookmark->id_desafio);

    }
}
