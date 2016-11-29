<?php

namespace App\Http\Controllers;

use App\TagThread;
use App\Thread;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //setting up to display user info, comments, and threads
        $user = User::find($id);
        $comments = Comment::where('user_id' , $id)->get();
        $threads = Thread::where('user_id', $id)->get();

        $date = Carbon::parse($user->created_at);
        $date = $date->diffInMonths($user->created_at);

        $karma = 0;
        if($user->downvotes != 0)
            $karma = ($user->upvotes)/($user->downvotes);

        return view('user.profile', compact('user', 'comments', 'threads', 'date', 'karma'));
    }

    /**
     * Grabs User Comments
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getComments($id){
        $result = Comment::where('user_id', $id)->get();
        return response($result);

    }

    /**
     * Grabs User Tags
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getTags($id){
        //first get all threads
        $threads = Thread::where('user_id', $id)->get();
        Log::debug('THREADS' . $threads);
        //then for each thread, get all tags matched by all thread id's

        $tags = TagThread::where('thread_id', $threads->id)->get();
        //return that collection
        Log::debug('Tags' . $tags);

        return response($tags);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
