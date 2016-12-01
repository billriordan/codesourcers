<?php

namespace App\Http\Controllers;

use App\TagThread;
use App\Thread;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\In;
use Validator;


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

        return response($threads);
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

    }


    /**
     * Update the Username
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser($id)
    {
        $user = User::find($id);

        $user->name = Input::get('username');
        $user->save();

        return redirect()->back();

    }

    /**
     * Update the User email
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEmail($id)
    {
        $user = User::find($id);

        $user->email = Input::get('email');
        $user->save();

        return redirect()->back();
    }


    /**
     * Uploads a file for the user
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function uploadImage($id){
        Log::debug('flag');


        // getting all of the post data
        $file = array('image' => Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required'); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);

        Log::debug('flag2');
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            flash('Uploaded file not valid', 'error');
            return redirect()->back();
        }
        else {
            // checking file is valid.
            if (Input::file('image')->isValid()) {
                $destinationPath = 'uploads'; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message

                //save filename to user

                $user = User::find($id);
                $user->photo_id = $fileName;
                $user->save();

                flash('File uploaded', 'success');
                return redirect()->back();
            }
            else {
                // sending back with error message.
                flash('Uploaded file not valid', 'error');
                return redirect()->back();
            }
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

}
