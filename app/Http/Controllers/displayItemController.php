<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\listItem;
use App\Models\kommentar;

class displayItemController extends Controller
{
    //

    public function index() {
        return view('welcome');
    }

    public function loginPage() {
        return view('home');
    }

    public function displayItem($id) {
        $listItem = listItem::find($id);
        return view('displayItem', ['listItem' => $listItem, 'kommentare' =>kommentar::all()]);
    }

    public function createKommentar(Request $request, $id){
        $newKommentar = new kommentar();
        $newKommentar->content = $request->text;
        $newKommentar->fall_id = $id;
        $newKommentar->score = 0;
        if(auth()->user()){
            $newKommentar->benutzer_id = auth()->user()->id;
        }
        else $newKommentar->benutzer_id = null;
        $newKommentar->save();
        
        return redirect('/displayItem' . '/' . $id);
    }


}
