<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\listItem;

class displayItemController extends Controller
{
    //

    public function index() {
        return view('welcome', ['listItems' => listItem::all()]);
    }

    public function displayItem() {
        echo '<script>alert("Welcome to Geeks for Geeks")</script>';
        return view('displayItem');
    }

    public function saveItem(Request $request){
        \Log::info(json_encode($request->all()));

        $newListItem = new listItem;
        $newListItem->beschreibung = $request->beschreibung;
        $newListItem->closed = false;
        $newListItem->benutzer_id = 1;
        $newListItem->save();

        return view('welcome', ['listItems' => listItem::all()]);
    }
}
