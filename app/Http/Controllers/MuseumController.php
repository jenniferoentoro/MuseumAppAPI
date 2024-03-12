<?php

namespace App\Http\Controllers;

use App\Models\Museum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MuseumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web', ['except' => ['getAllMuseum']]);
        $this->middleware('auth-admin', ['except' => ['getAllMuseum']]);

    }
    public function getAllMuseum() {
        $museums = Museum::all();
        return $museums;
    }

    public function addMuseum(Request $request) {

        $museum = Museum::create([
            'nama' => $request->nama,
            'gambarUtama' => $request->gambarUtama,
            'alamatLengkap' => $request->alamatLengkap,
            'alamatKota' => $request->alamatKota,
            'deskripsi' => $request->deskripsi,
            'linkGoogleMap' => $request->linkGoogleMap,
            'linkVirtualTour' => $request->linkVirtualTour,
            'rating' => 0,
            'lrfu_score' => 0,
        ]);

        return redirect()->route('get-add-museum');
    }

    public function museumAdminView() {
        // $cur_user= Auth::guard()->user();
        // if ($cur_user->admin == 1) {
        //     return view('welcome');
        // } else {
        //     Auth::logout();
        //     return redirect('/login-admin');
        // }

        return view('welcome');

    }
}