<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Bookmark;
use App\Desafio;
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


    public function procesar(Request $request){

        $desafio = Desafio::find($request->input("bookmark-desafio"));

        foreach (Auth::user()->getBookmarks as $bookmark ){
            if($bookmark->id_desafio == $desafio->id) {
            $selectedBookmark = Bookmark::find($bookmark->id);
            $selectedBookmark->delete();
            return redirect('feed');
            }
        }

        $bookmark = new Bookmark;
        $bookmark->id_usuario= Auth::user()->id_usuario;
        $bookmark->id_desafio=$request->input("bookmark-desafio");
        $bookmark->save();
        return redirect('feed');


    }


    public function fetch($id_desafio){
        $desafio = Desafio::find($id_desafio);
        $user = Auth::user()->id_usuario;

        foreach($desafio->getBookmarks as $bookmark){
            if($bookmark->id_usuario == $user){

                return json_encode(true);
            }
        }
        return json_encode(false);

    }

    // Procedimiento: Si el fetch retorna TRUE, significa que el Bookmark ya existe para el user. En ese caso, correr la lógica de Delete.
    // Si el fetch retorna FALSE, significa que no existe bookmark. En ese caso, correr la lógica de Save.

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {

    }


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

    }
}
