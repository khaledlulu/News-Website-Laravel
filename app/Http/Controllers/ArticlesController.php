<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexArticles($id)
    {
        //
        $articles = Articles::with('Category')->where('author_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        return response()->view('cms.article.index', compact('articles', 'id'));
    }

    public function createArticles($id)
    {
        $authors = Author::all();
        $categories = Category::all();
        return response()->view('cms.article.create', compact('authors', 'id', 'categories'));
    }


    public function index()
    {
        $articles = Articles::orderBy('id', 'asc')->Paginate(7);
        return response()->view('cms.article.indexAll', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        // $authors = Author::with('user')->get();
        return response()->view('cms.article.create', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(), []);
        if (!$validator->fails()) {
            $articls = new Articles();
            $articls->title = $request->get('title');
            $articls->short_description = $request->get('short_description');
            $articls->full_description = $request->get('full_description');
            $articls->author_id = $request->get('author_id');
            $articls->category_id = $request->get('category_id');

            $isSaved = $articls->save();
            return response(['icon' => 'success', 'title' => 'created is successfully'], 200);
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Articles::findOrFail($id);
        return response()->view('cms.article.edit', compact('articles'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
