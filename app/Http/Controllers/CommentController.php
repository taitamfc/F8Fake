<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function index(Request $request)
    {

        $comments = Comment::orderBy('created_at','DESC')->paginate(5);
        return view('comments.index', compact('comments'));
    }
    public function create()
    {
        $courses = Course::all();
        $users = User::all();

        // dd($users);
        return view('comments.create',compact('users','courses'));
    }
    public function store( StoreCommentRequest $request)
    {

        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->commentstable_type = $request->commentstable_type;
        $comment->comment = $request->comment;
        $comment->approved = $request->approved;
        $comment->course_id = $request->course_id;


        $comment->save();
        Session::flash('success', 'Thêm mới thành công');
        return redirect()->route('comments.index');
    }


    public function edit($id)
    {
        $comment = Comment::find($id);

        // dd($blog);
        return view('comments.edit', compact('comment'));
    }
    public function update(UpdateCommentRequest $request ,$id)
    {

        $comment = Comment::find($id);
        $comment->commentstable_type = $request->commentstable_type;
        $comment->comment = $request->comment;
        $comment->approved = $request->approved;
        $comment->save();
        Session::flash('succes', 'Sửa thành công');

        return redirect()->route('comments.index');

    }
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        Session::flash('succes', 'Xóa thành công');

        return redirect()->route('comments.index');
    }
}
