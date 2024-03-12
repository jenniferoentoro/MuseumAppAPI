<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function getFavorites()
    {
        $cur_user= Auth::guard()->user();

        $favorites = Favorite::where('userId', '=', $cur_user->id)
        ->join('museums', 'favorites.museumId', '=', 'museums.id')
        
        ->get();
        return $favorites;
        
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
    public function storeFavorite(Request $request)
    {
        
        $cur_user= Auth::guard()->user();
        
        $favorite = Favorite::create([
            'museumId' => $request->museumId,
            'userId' => $cur_user->id,
        ]);
        // $comment = new Comment;
        // $comment->komentar = $request->komentar;
        // $comment->museumId = $request->museumId;
        // $comment->userId = $request->userId;
        return $favorite;
        
    }

    public function deleteFavorite(Request $request)
    {
        $cur_user= Auth::guard()->user();

        $favorite = Favorite::where('userId', '=', $cur_user->id)->where('museumId', '=', $request->museumId)->delete();
        // $comment = new Comment;
        // $comment->komentar = $request->komentar;
        // $comment->museumId = $request->museumId;
        // $comment->userId = $request->userId;
        if ($favorite) {
            return response()->json(['message' => 'Favorite Removed Successfully!']);

        } else {
            return response()->json(['error' => 'Favorite Remove Failed!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorite $favorite)
    {
        //
    }
    
}