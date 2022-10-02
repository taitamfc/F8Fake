<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();


        // $this->authorize('viewAny', Comment::class);
        $key        = $request->key ?? '';
        $user_id      = $request->user_id ?? '';
        $comment      = $request->comment ?? '';
        $id         = $request->id ?? '';
        // thực hiện query
        $query = Comment::query(true);
        if ($user_id) {
            $query->where('user_id', 'LIKE', '%' . $user_id . '%');
        }

        if ($comment) {
            $query->where('comment', 'LIKE', '%' . $comment . '%');
        }

        if ($id) {
            $query->where('id', $id);
        }
        if ($key) {
            $query->orWhere('id', $key);
            $query->orWhere('user_id', 'LIKE', '%' . $key . '%');
            $query->orWhere('comment', 'LIKE', '%' . $key . '%');
        }
        $comments = $query->search()->paginate(5);
        $params = [
            'f_id'        => $id,
            'f_user_id' => $user_id,
            'f_comment'     => $comment,
            'f_key'       => $key,
            'comments'    => $comments,
            'users' => $users,

        ];
        return view('Admin.comments.index', $params );

    }
    public function create()
    {
        // $this->authorize('create', Comment::class);
        $comments = Comment::all();
        $courses = Course::all();
        $users = User::all();

        // dd($users);
        return view('Admin.comments.create',compact('users','courses','comments'));
    }
    public function store( StoreCommentRequest $request)
    {

        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->comment = $request->comment;
        $comment->commentstable_type = $request->commentstable_type;
        $comment->approved = $request->approved;
        $comment->course_id = $request->course_id;

        try {
            $comment->save();
            return redirect()->route('comments.index')->with('success', 'Thêm thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('comments.index')->with('error', 'Thêm không thành công');
        }

        return redirect()->route('Admin.comments.index');

    }


    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        $courses = Course::get();
        $users = User::get();
        // $this->authorize('update', Comment::class);

        // dd($blog);
        return view('Admin.comments.edit', compact('comment','courses','users'));
    }
    public function update(UpdateCommentRequest $request ,$id)
    {

        $comment = Comment::find($id);
        $comment->user_id = $request->user_id;
        $comment->comment = $request->comment;
        $comment->commentstable_type = $request->commentstable_type;
        $comment->approved = $request->approved;
        $comment->course_id = $request->course_id;

        try {
            $comment->save();
            return redirect()->route('comments.index')->with('success', 'Sửa thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('comments.index')->with('error', 'Sửa không thành công');
        }
        Session::flash('success', 'Sửa thành công');

        return redirect()->route('comments.index');

    }
    public function destroy($id)
    {
        $comment = Comment::find($id);
        // $this->authorize('delete', Comment::class);

        try {
            $comment->delete();

            return redirect()->route('comments.index')->with('success', 'Xóa thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('comments.index')->with('error', 'Xóa không thành công');
        }
    }
    public function force_destroy($id)
    {

        $comment = Comment::withTrashed()->find($id);
        // $this->authorize('force_destroy',Comment::class);
        try {
            $comment->forceDelete();
            return redirect()->route('comments.trash')->with('success', 'Xóa thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('comments.trash')->with('error', 'Xóa không thành công');
        }
    }

    function SoftDeletes($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $comment = Comment::findOrFail($id);
        // $this->authorize('force_destroy',Comment::class);
        $comment->deleted_at = date("Y-m-d h:i:s");
        try {
            $comment->save();
            Session::flash('success', 'Đã chuyển vào thùng rác');
            return redirect()->route('comments.index');
        } catch (\Exception $e) {

            Log::error($e->getMessage());
            Session::flash('error', 'xóa thất bại ');
            return redirect()->route('comments.index')->with('error', 'xóa không thành công');
        }
    }

    function RestoreDelete($id)
    {
        $comment = Comment::withTrashed()->find($id);
        // $this->authorize('restore',Comment::class);
        $comment->deleted_at = null;
        try {
            $comment->save();

            Session::flash('success', 'Khôi phục ' . $comment->id . ' thành công');
            return redirect()->route('comments.trash');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'xóa thất bại ');
            return redirect()->route('comments.trash')->with('error', 'xóa không thành công');
        }
    }

    function trash(Request $request)
    {
        $key        = $request->key ?? '';
        $user_id      = $request->user_id ?? '';
        $id         = $request->id ?? '';
        $comment         = $request->comment ?? '';
        $parent_id     = $request->parent_id ?? '';


        $query = Comment::onlyTrashed();
        $query->orderBy('id', 'DESC');

        if ($user_id) {
            $query->where('user_id', 'LIKE', '%' . $user_id . '%')->where('deleted_at', '!=', null);
        }
        if ($comment) {
            $query->where('comment', 'LIKE', '%' . $comment . '%')->where('deleted_at', '!=', null);
        }
        if ($id) {
            $query->where('id', $id)->where('deleted_at', '!=', null);
        }
        if ($parent_id) {
            $query->where('parent_id', 'LIKE', '%' . $parent_id . '%')->where('deleted_at', '!=', null);
        }
        if ($key) {
            $query->orWhere('id', $key)->where('deleted_at', '!=', null);
            $query->orWhere('user_id', 'LIKE', '%' . $key . '%')->where('deleted_at', '!=', null);
            $query->orWhere('comment', 'LIKE', '%' . $key . '%')->where('deleted_at', '!=', null);
            $query->orWhere('parent_id', 'LIKE', '%' . $key . '%')->where('deleted_at', '!=', null);
        }
        $comments = $query->paginate(5);
        $params = [
            'f_id'        => $id,
            'f_user_id'     => $user_id,
            'f_key'       => $key,
            'f_comment'       => $comment,
            'f_parent_id'       => $parent_id,
            'comments'    => $comments,
        ];
        return view('Admin.comments.trash', $params);
    }
}
