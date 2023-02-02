<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(9);
        return view('articles.list', [
            'articles' => $articles
        ]);
    }

    public function adminList()
    {
        $articles = Article::paginate(10);
        return view('admin.articles.list', [
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newArticle = new Article();
        $newArticle->title = $request->get('title');
        $newArticle->author = $request->get('author');
        $newArticle->subtitle = $request->get('subtitle');
        $newArticle->description = $request->get('content');
        $newArticle->slug = Str::slug($request->get('title'), '-'); 
        $newArticle->save();
        return redirect('/admin/articles/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();
        return view('articles.details', [
            'article' => $article,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::where('id', $id)->firstOrFail();
        return view('admin.articles.edit', [
            'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::where('id', $id)->firstOrFail();

        $article->title = $request->get('title');
        $article->subtitle = $request->get('subtitle');
        $article->description = $request->get('content');
        $article->author = $request->get('author');
        $article->slug = Str::slug($request->get('title'), '-'); 

        $article->save();

        return redirect('/admin/articles/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::where('id', $id)->firstOrFail();
        $article->delete();
        
        return redirect('/admin/articles/list');
    }
}
