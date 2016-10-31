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
}
