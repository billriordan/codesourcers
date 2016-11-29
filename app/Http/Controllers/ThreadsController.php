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
<<<<<<< HEAD
        $tags = Tag::all();
    	//$threads = Thread::paginate(20);
        $threads = Thread::where('end_date', '=', null)->orWhere('end_date', '>', Carbon::now())->get();
    	//$threads = Thread::with('users')->paginate(20);
    	return view('thread.frontpage', compact('threads'))->withTags($tags);
=======
        $threads = Thread::where('start_date', '=', null)->orWhere('start_date', '>=', Carbon::now())->simplePaginate(2);
        $tags = Tag::all();
    	return view('thread.frontpage', compact('threads', 'tags'));
>>>>>>> 6d776c6f0ebe7c75765f063fd76dc57b4eb4d818
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

<<<<<<< HEAD
    public function lock($id)
    {
            $thread = Thread::find($id);
            $thread->end_date=Carbon::now();
            $thread->save();
        
        return redirect()->back();
    }

    public function sort(Request $request)
    {

        $tags = Tag::all();
        
        dd($request);

        /*$threads = Thread::where('end_date', '=', null)->orWhere('end_date', '>', Carbon::now())->with(
                    [
                        'tags' => function($query)
                        {
                            $query->where('tag_id' , 1);
                        }
                    ])->get();*/

      // $threads = Thread::join('tag_thread', 'tag_thread.thread_id', '=', 'threads.id')->where('tag_thread.tag_id', '=', 1)->get();

        $threads = Thread::whereHas('tags', function($q)
            {
                $q->whereIn('tags.id', array(1));
            })->get();
        

        return view('thread.sort', compact('threads'))->withTags($tags);
    }
=======
>>>>>>> c74ed89ad537d158368b88ca49c1bb7b48e6fa02
}
