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

    public function loginPage() {
        return view('home');
    }

    public function displayItem($id) {
        \Log::info($id);
        $listItem = listItem::find($id);
        $listItem->imgURL = 
        \Log::info($listItem);
        return view('displayItem', ['listItem' => $listItem]);
    }

    public function saveItem(Request $request){
        \Log::info(json_encode($request->all()));

        $newListItem = new listItem;
        $newListItem->beschreibung = $request->beschreibung;
        $newListItem->closed = false;
        $newListItem->benutzer_id = auth()->user()->id;
        $newListItem->save();

        return view('welcome', ['listItems' => listItem::all()]);
    }
}
