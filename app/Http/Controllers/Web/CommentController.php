<?php

namespace GitScrum\Http\Controllers\Web;

use GitScrum\Http\Requests\CommentRequest;
use GitScrum\Models\Comment;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        resolve('CommentService')->create($request);
        return back()->with('success','Comentario agregado');
    }

    public function edit($id)
    {
        $comment = Comment::find($id);

        return view('comments.edit')
            ->with('route', 'comments.update')
            ->with('id', $comment->commentable_id)
            ->with('type', $comment->commentable_type)
            ->with('comment', $comment);
    }

    public function update(CommentRequest $request, $id)
    {
        resolve('CommentService')->update($request);
        return back()->with('success','Comentario actualizado');
    }

    public function destroy($id)
    {
        $comment = Comment::find($id)->userActive()->firstOrFail();

        $comment->delete();

        return back()->with('success','Comentario eliminado');
    }
}
