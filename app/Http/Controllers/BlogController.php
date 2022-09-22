<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function index(Request $request)
    {

        $key        = $request->key ?? '';
        $user_id      = $request->user_id ?? '';
        $title      = $request->title ?? '';
        $id         = $request->id ?? '';
        // thực hiện query
        $query = Blog::query(true);
        if ($user_id) {
            $query->where('user_id', 'LIKE', '%' . $user_id . '%');
        }

        if ($title) {
            $query->where('title', 'LIKE', '%' . $title . '%');
        }

        if ($id) {
            $query->where('id', $id);
        }
        if ($key) {
            $query->orWhere('id', $key);
            $query->orWhere('user_id', 'LIKE', '%' . $key . '%');
            $query->orWhere('title', 'LIKE', '%' . $key . '%');
        }
        $blogs = $query->search()->paginate(5);
        $params = [
            'f_id'        => $id,
            'f_user_id' => $user_id,
            'f_title'     => $title,
            'f_key'       => $key,
            'blogs'    => $blogs,
        ];
        return view('Admin.blogs.index', $params);

    }
    public function create()
    {
        $blogs = Blog::all();
        $users = User::all();

        // dd($users);
        return view('Admin.blogs.create',compact('users','blogs'));
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
        $blog->is_reacted = $request->is_reacted;
        $blog->is_bookmark = $request->is_bookmark;
        $blog->is_published = $request->is_published;
        $blog->image = $request->image;
        $blog->comments_count = $request->comments_count;

        try {
            $blog->save();
            return redirect()->route('blogs.index')->with('success', 'Thêm' . ' ' . $request->parent_id . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('blogs.index')->with('error', 'Thêm' . ' ' . $request->parent_id . ' ' .  'không thành công');
        }


        return redirect()->route('blogs.index');

    }


    public function edit($id)
    {
        $blog = Blog::find($id);

        // dd($blog);
        return view('Admin.blogs.edit', compact('blog'));
    }
    public function update(UpdateBlogRequest $request ,$id)
    {

        $blog = Blog::find($id);
        $blog->user_id = $request->user_id;
        $blog->parent_id = $request->parent_id;
        $blog->title = $request->title;

        try {
            $blog->save();
            return redirect()->route('blogs.index')->with('success', 'Sửa' . ' ' . $request->user_id . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('blogs.index')->with('error', 'Sửa' . ' ' . $request->user_id . ' ' .  'không thành công');
        }
        Session::flash('succes', 'Sửa thành công');

        return redirect()->route('blogs.index');

    }
    public function destroy($id)
    {
        $blog = Blog::find($id);
        // dd($id);
        try {
            $blog->delete();
            return redirect()->route('blogs.index')->with('success', 'Xóa' . ' ' . $blog->id . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('blogs.index')->with('error', 'Xóa' . ' ' . $blog->id . ' ' .  'không thành công');
        }
    }
    public function force_destroy($id)
    {

        $blog = Blog::withTrashed()->find($id);

        try {
            $blog->forceDelete();
            return redirect()->route('blogs.trash')->with('success', 'Xóa' . ' ' . $blog->id . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('blogs.trash')->with('error', 'Xóa' . ' ' . $blog->id . ' ' .  'không thành công');
        }
    }

    function SoftDeletes($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $blog = Blog::findOrFail($id);
        $blog->deleted_at = date("Y-m-d h:i:s");
        try {
            $blog->save();
            Session::flash('success', 'Xóa Thành công');
            return redirect()->route('blogs.index');
        } catch (\Exception $e) {

            Log::error($e->getMessage());
            Session::flash('error', 'xóa thất bại ');
            return redirect()->route('blogs.index')->with('error', 'xóa không thành công');
        }
    }

    function RestoreDelete($id)
    {
        $blog = Blog::withTrashed()->find($id);
        $blog->deleted_at = null;
        try {
            $blog->save();

            Session::flash('success', 'Khôi phục ' . $blog->id . ' thành công');
            return redirect()->route('blogs.trash');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'xóa thất bại ');
            return redirect()->route('blogs.trash')->with('error', 'xóa không thành công');
        }
    }

    function trash(Request $request)
    {
        $key        = $request->key ?? '';
        $user_id      = $request->user_id ?? '';
        $id         = $request->id ?? '';
        $title         = $request->title ?? '';
        $parent_id     = $request->parent_id ?? '';


        $query = Blog::onlyTrashed();
        $query->orderBy('id', 'DESC');

        if ($user_id) {
            $query->where('user_id', 'LIKE', '%' . $user_id . '%');
        }
        if ($title) {
            $query->where('title', 'LIKE', '%' . $title . '%');
        }
        if ($id) {
            $query->where('id', $id);
        }
        if ($parent_id) {
            $query->where('parent_id', 'LIKE', '%' . $parent_id . '%');
        }
        if ($key) {
            $query->orWhere('id', $key);
            $query->orWhere('user_id', 'LIKE', '%' . $key . '%');
            $query->orWhere('title', 'LIKE', '%' . $key . '%');
            $query->orWhere('parent_id', 'LIKE', '%' . $key . '%');
        }
        $blogs = $query->paginate(5);
        $params = [
            'f_id'        => $id,
            'f_user_id'     => $user_id,
            'f_key'       => $key,
            'f_title'       => $title,
            'f_parent_id'       => $parent_id,
            'blogs'    => $blogs,
        ];
        return view('Admin.blogs.trash', $params);
    }
}
