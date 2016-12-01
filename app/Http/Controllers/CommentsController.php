<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Thread;
use App\User;
use App\Comment;
use App\Http\Requests;

class CommentsController extends Controller
{
    public function index()
    {
        //cool admin functionality
        if(\Auth::user()->is_admin)
        {
    	   $comments = Comment::paginate(50);
    	   //$threads = Thread::with('users')->paginate(20);
    	   return view('comment.firehose', compact('comments'));
        }
        else
            redirect()->back();
    }

    public function show($id)
    {
    	$comment = Comment::find($id);

    	return view('comment.show', compact('comment'));
    }

    /*public function create()
    {
        if(\Auth::check())
        {
            return view('comment.create');
        }
        else return redirect()->back();
    }*/

    public function store()
    {
    	$comment = new Comment();

		$comment->description = Input::get('description');
		$comment->code_block = Input::get('code_block');
        $comment->thread_id = Input::get('thread_id');
        $comment->comment_id = Input::get('comment_id');
		$comment->user_id = \Auth::user()->id;

		$comment->save();
    	return redirect('thread/' . $comment->thread_id);
    }

    public function edit($id)
    {
    	$comment = Comment::find($id);
    	return view('comment.edit', compact('comment'));
    }

    public function update($id)
    {
    	$comment = Comment::find($id);
		$comment->description = Input::get('description');
		$comment->code_block = Input::get('code_block');

        $comment->save();
    	return redirect('thread/' . $comment->thread_id);
    }

    public function destroy($id)
    {
    	$comment = Comment::find($id);
		$comment->delete();
		return redirect()->back();
    }

    public function upvote($id) {

        $comment = Comment::find($id);
        $user = User::find($comment->user_id);
        $user->upvotes += 1;
        $comment->upvotes += 1;
        $comment->save();
        $user->save();

        return redirect()->back();
    }

    public function downvote($id) {

        $comment = Comment::find($id);
        $user = User::find($comment->user_id);
        $user->downvotes += 1;
        $comment->downvotes += 1;
        $comment->save();
        $user->save();
        if($user->rating($comment->upvotes, $comment->downvotes) == "fa fa-battery-0")
            $comment->destroy();
        
        return redirect()->back();
    }
}
