<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Thread;
use App\User;
use App\Comment;
use App\Tag;
use Carbon\Carbon;
use App\Http\Requests;

class ThreadsController extends Controller
{
    public function index()
    {
        $threads = Thread::where('start_date', '=', null)->orWhere('start_date', '>=', Carbon::now())->simplePaginate(2);
        $tags = Tag::all();
    	return view('thread.frontpage', compact('threads', 'tags'));
    }

    public function show($id)
    {
        $thread = Thread::where('id', $id)->with(
                    [
                        'comments' => function($query)
                        {
                            $query->where('comment_id' , 0)->with('comments', 'comments.comments', 'comments.comments.comments');
                        }
                    ])->limit(1)->get();
        $thread = $thread[0];
        $tags = Tag::all();
    	return view('thread.show', compact('thread', 'tags'));
    }

    public function create()
    {
        $tags = Tag::all();

        if(\Auth::check())
        {
            return view('thread.create')->withTags($tags);
        }
        else return redirect()->back();
    }

    public function store(Request $request)
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

        $thread->tag_id = Input::get('tags')[0];
		$thread->save();

    	return redirect('/');
    }

    public function edit($id)
    {
    	$thread = Thread::find($id);
        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }

    	return view('thread.edit', compact('thread'))->withTags($tags2);
    }

    public function update($id, Request $request)
    {
    	$thread = Thread::find($id);
    	$thread->name = Input::get('name');
		$thread->description = Input::get('description');
		$thread->code_block = Input::get('code_block');

		if(Input::get('start_date'))
			$thread->start_date = Input::get('start_date');
		if(Input::get('end_date'))
			$thread->end_date = Input::get('end_date');

        $thread->tag_id = Input::get('tags')[0];
        $thread->save();

    	return redirect('thread/' . $id);
    }

    public function lock($id)
    {
        $thread = Thread::find($id);
        if(\Auth::user()->id = $thread->user->id || \Auth::user()->is_admin)
        {
            $thread->end_date = Carbon::now();
            $thread->save();
            return redirect('/thread');
        }
        else
            return redirect()->back();
    }

    public function destroy($id)
    {
    	$thread = Thread::find($id);
		$thread->delete();
		return redirect()->back();
    }

}
