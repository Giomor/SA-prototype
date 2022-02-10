<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\IoT;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class FavoriteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }


    public function storeFavorite(Request $request)
    {
        $user = Auth::user();
        $addFavorite = Favorite::create([
            'date' => Carbon::now(),
            'user_email' => $user->email,
            'artwork_id' => $request->id,
        ]);
        return Redirect::back();
    }

}
