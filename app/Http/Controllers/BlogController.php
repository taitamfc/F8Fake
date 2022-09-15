<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        $blogs = Blog::orderBy('created_at')->search()->paginate(5);
        return view('blogs.index', compact('blogs'));
    }
    public function create()
    {

        $users = User::all();

        // dd($users);
        // $users->save();
        return view('blogs.create',compact('users',));
    }
    public function store( StoreBlogRequest $request)
    {

        $blog = new Blog();
        $blog->user_id = $request->user_id;
        $blog->parent_id = $request->parent_id;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->description = $request->description;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->thumbnail = $request->thumbnail;
        $blog->content = $request->content;
        $blog->min_read = $request->min_read;
        $blog->view_count = $request->view_count;
        $blog->is_recommend = $request->is_recommend;
        $blog->is_approved = $request->is_approved;
        $blog->published_at = $request->published_at;
        $blog->reaction_count = $request->reaction_count;
        $blog->comments_count = $request->comments_count;
        $blog->is_reacted = $request->is_reacted;
        $blog->is_bookmark = $request->is_bookmark;
        $blog->is_published = $request->is_published;
        if ($request->hasFile('image')) {
            // Nếu có thì thục hiện lưu trữ file vào public/images
            $image = $request->file('image');
            $image->move('images', $image->getClientOriginalName());
            $blog ->image = 'images/'.$image->getClientOriginalName();

        }
        $blog->save();
        Session::flash('succes', 'Thêm mới thành công');
        return redirect()->route('blogs.index');
    }


    public function edit($id)
    {
        $blog = Blog::find($id);

        // dd($blog);
        return view('blogs.edit', compact('blog'));
    }
    public function update(UpdateBlogRequest $request ,$id)
    {

        $blog = Blog::find($id);
        $blog->parent_id = $request->parent_id;
        $blog->title = $request->title;
        $blog->save();
        Session::flash('succes', 'Sửa thành công');

        return redirect()->route('blogs.index');

    }
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        Session::flash('succes', 'Xóa thành công');

        return redirect()->route('blogs.index');
    }
}
