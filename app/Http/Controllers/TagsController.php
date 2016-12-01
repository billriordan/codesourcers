<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Thread;
use App\User;
use App\Comment;
use App\Tag;
use App\Http\Requests;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('thread.create')->withTags($tags);
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
    	$tag = new Tag();

		$tag->name = Input::get('name');
		
		$tag->save();
    	return redirect('thread/' . $tag->thread_id);
    }


    public function destroy($id)
    {
    	$tag = Tag::find($id);
		$tag->delete();
		return redirect()->back();
    }
}
