<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('blog.seeMore', compact('article'));
    }

    public function showAll()
    {
        $articles = Article::orderBy('id', 'desc')->get();

        return view('blog.welcome', compact('articles'));
    }

    public function addcreate()
    {
        return view('blog.addArticle');
    }

    public function updatecreate($id)
    {
        $article = Article::findOrFail($id);
        return view('blog.updateArticle', compact('article'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
        ]);

        

        $lastArticle = DB::table('articles')->orderBy('id', 'desc')->first();

        if($lastArticle==null)
        {
            $fantome = Article::create([
                'title' => 'fantomes',
                'content' => 'fantomes',
                'imagePath' => 'fantomes',
            ]);

            $id = $fantome->id +1;

            $fantome->delete();
        }
        else
            $id = $lastArticle->id +1;
            
        $extension = $request->image->extension();
        $file = Storage::putFileAs('public/articles', $request->image, $id.'.'.$extension);

        $article = Article::create([
            'title' => ucfirst(strtolower($request->title)),
            'content' => ucfirst(nl2br(strtolower($request->content))),
            'imagePath' => $id.'.'.$extension,
            
        ]);

        return redirect()->route('accueil');

    }
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
        ]);

        $id = $article->id;
        $extension = $request->image->extension();
        storage::delete('public/articles/'.$article->imagePath);
        $file = Storage::putFileAs('public/articles', $request->image, $id.'.'.$extension);

        $article->title = ucfirst(strtolower($request->title));
        $article->content = ucfirst(nl2br(strtolower($request->content)));
        $article->imagePath = $id.'.'.$extension;

        $article->save();

        return redirect()->route('accueil');

    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        storage::delete('public/articles/'.$article->imagePath);
        $article->delete();
        return redirect()->route('accueil');
    }
}
