<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * @var Category
     */

    /**
     * @var Article
     */
    private $category;
    private $article;

    public function __construct(Category $category , Article $article)
    {
        $this-> category = $category;
        $this-> article = $article;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $articles = $this->article->with('category')->paginate(config('admin.paginate_size'));

        return view('admin.article.index',compact('articles'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = $this->category->all();

        return view('admin.article.form',compact('categories'));
    }

    /**
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequest $request)
    {
        $this->article->create($request->all());

        return redirect()->route('admin.articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $article = $this->article->findOrfail($id);
        $categories = $this->category->all();

        return view('admin.article.form',compact('article','categories'));
    }

    /**
     * @param ArticleRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = $this->article->findOrfail($id);
        $article->update($request->all());

        return redirect()->route('admin.articles.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $article = $this->article->findOrfail($id);
        $article->delete();

        return redirect()->back();
    }
}
