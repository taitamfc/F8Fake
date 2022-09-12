<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index');
    }
    public function create()
    {
        $blogs =  Blog::paginate(5);
        return view('blogs.create', compact('blogs'))->with('i',(request()->input('page',1)-1) * 5);
    }
    public function store(Request $request)
    {
        $blogs = new Blog();
        $blogs->user_id = $request->user_id;
        $blogs->parent_id = $request->parent_id;
        $blogs->title = $request->title;
        $blogs->description = $request->description;
        $blogs->meta_title = $request->meta_title;
        $blogs->meta_description = $request->meta_description;
        $blogs->thumbnail = $request->thumbnail;
        $blogs->image = $request->image;
        $blogs->content = $request->content;
        $blogs->min_read = $request->min_read;
        $blogs->views_count = $request->views_count;
        $blogs->is_recomment = $request->is_recomment;
        $blogs->is_approved = $request->is_approved;
        $blogs->published_at = $request->published_at;
        $blogs->reaction_count = $request->reaction_count;
        $blogs->comment_count = $request->comment_count;
        $blogs->is_reacted = $request->is_reacted;
        $blogs->is_bookmark = $request->is_bookmark;
        $blogs->is_published = $request->is_published;
    }
}
