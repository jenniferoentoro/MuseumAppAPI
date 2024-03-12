<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['getComments']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $user;
    protected $museum;

    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    //     $this->user = $this->guard()->user();
    // }
    public function index()
    {
    }

    public function getComments($museum_id)
    {
        $comments = Comment::where('museumId', '=', $museum_id)
        ->join('users', 'comments.userId', '=', 'users.id')
        ->select('users.name', 'comments.komentar', 'comments.created_at')
        ->get();
        return $comments;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cur_user= Auth::guard()->user();

        $comment = Comment::create([
            'komentar' => $request->komentar,
            'museumId' => $request->museumId,
            'userId' => $cur_user->id,
        ]);
        // $comment = new Comment;
        // $comment->komentar = $request->komentar;
        // $comment->museumId = $request->museumId;
        // $comment->userId = $request->userId;
        return $comment;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }

    // protected function guard() {
    //     return Auth::guard();
    // }
}