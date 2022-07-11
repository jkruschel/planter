<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\listItem;
use App\Models\bild;

class fileController extends Controller
{
    //

    public function saveItem(Request $request){
        // dd($request->picture);

        $request->validate([
            'beschreibung' => 'required',
            'picture' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newListItem = new listItem;
        $newListItem->beschreibung = $request->beschreibung;
        $newListItem->closed = false;
        $newListItem->benutzer_id = auth()->user()->id;
        $newListItem->save();
        


        // Rename uploaded picture
        $newImageName = time() . '-' . $request->picture->extension();
        
        $request->picture->move(public_path('images'), $newImageName);

        $newBild = new bild;
        $newBild->source = $newImageName;
        $newBild->listItem_id = $newListItem->id;
        $newBild->save();

        // $request->file('picture')->store();


        \Log::info($newListItem);

        return redirect('/');
    }

    public function deleteItem($id){
        $listItem = listItem::find($id);
        $listItem->delete();
        $bild = bild::where('listItem_id', $id)->first();
        if($bild)$bild->delete();

        return redirect('/');
    }
}
