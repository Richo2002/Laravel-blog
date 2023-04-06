<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function makeComment(Request $request, $id)
    {
        Article::findOrFail($id);
        
        $request->validate([
            'pseudo' => ['required', 'string', 'max:50'],
            'comment' => ['required', 'string', 'max:255']
        ]);

        // $validator = Validator($request->all(), [
        //     'pseudo' => ['required', 'string', 'max:50', 'unique:users'],
        //     'comment' => ['required', 'string', 'max:255']
        // ]);

        // if($validator->fails())
        //     return response()->json($validator->errors());

        
        $user = User::where('pseudo',$request->pseudo)->first();

        if($user == null)
        {
            $user = User::create([
                'pseudo' => $request->pseudo,
                'image_id' => 1,
            ]);
        }

        Comment::create([
            'description' => $request->comment,
            'user_id' => $user->id,
            'article_id' => $id
        ]);

        return redirect()->route('seeMore', $id);
    }

    public function deleteComment($id)
    {
       $comment = Comment::findOrFail($id);

       $idArticle = $comment->article_id;
       $comment->delete();

       return redirect()->route('seeMore', $idArticle);
    }
}
