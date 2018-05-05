<?php

namespace GitScrum\Http\Controllers\Web;

class FavoriteController extends Controller
{
    public function store($type, $id)
    {
        resolve('FavoriteService')->create($type, $id);
        return back()->with('success','Marcado como favorito');
    }

    public function destroy($type, $id)
    {
        resolve('FavoriteService')->delete($type, $id);
        return back()->with('success','Desmarcado como favorito');
    }
}
