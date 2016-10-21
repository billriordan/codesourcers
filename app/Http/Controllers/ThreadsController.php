<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Thread;
use App\User;
use App\Comment;
use App\Http\Requests;

class ThreadsController extends Controller
{
    public function index()
    {
    	$threads = Thread::all();
    	//$threads = Thread::with('users')->paginate(20);
    	return view('thread.frontpage', compact('threads'));
    }

    public function show($id)
    {
    	$thread = Thread::find($id)->with('comments')->orderBy('created_at', 'desc');
    	return view('thread.show', compact('thread'));
    }

    public function create()
    {
        if(\Auth::check())
        {
            return view('thread.create');
        }
        else return redirect()->back();
    }

    public function store()
    {
    	$thread = new Thread();

		$thread->name = Input::get('name');
		$thread->description = Input::get('description');
		$thread->code_block = Input::get('code_block');
		$thread->user_id = \Auth::user()->id;

		if(Input::get('start_date'))
			$thread->start_date = Input::get('start_date');
		if(Input::get('end_date'))
			$thread->end_date = Input::get('end_date');

		$thread->save();
    	return redirect()->route('thread', ['id' => $thread->id]);
    }

    public function edit($id)
    {
    	$thread = Thread::find($id);
    	return view('thread.edit', compact('thread'));
    }

    public function update($id)
    {
    	$thread = Thread::find($id);
    	$thread->name = Input::get('name');
		$thread->description = Input::get('description');
		$thread->code_block = Input::get('code_block');

		if(Input::get('start_date'))
			$thread->start_date = Input::get('start_date');
		if(Input::get('end_date'))
			$thread->end_date = Input::get('end_date');

    	return redirect()->route('thread', ['id' => $thread->id]);
    }

    public function destroy($id)
    {
    	$thread = Thread::find($id);
		$thread->delete();
		return redirect()->back();
    }
}
