<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class displayItemController extends Controller
{
    //

    public function displayItem() {
        echo '<script>alert("Welcome to Geeks for Geeks")</script>';
        return view('displayItem');
    }
}
