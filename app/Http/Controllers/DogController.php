<?php

namespace App\Http\Controllers;

use App\Models\Dogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DogController extends Controller
{
    public function react() {

        $dog = Dogs::find(request()->breed_id);
        $like = auth()->user()->toggleLike($dog);

        if (auth()->user()->likes()->count() > 3){
            auth()->user()->toggleLike($dog);
            return Redirect::back()->with('error', 'Oops! You only allowed 3 dogs to be liked.');
        } 
        

        return Redirect::back()->with('success', !is_object($like) == 1 ? 'Sucessfully removed!' : 'Success! Thanks for the like.');
    }
}
