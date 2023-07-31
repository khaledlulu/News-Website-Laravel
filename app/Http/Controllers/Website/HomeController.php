<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function parant()
    {

        // $categories = Category::take(3)->get();   بياخذ اي 3 تصنيفات وبيعرضهم
        // $categories = Category::first(3)->get();   بيعرض اول 3 تصنيفات
        // $categories = Category::last(3)->get();   بيعرض اخر 3 تصنيفات
        $categories = Category::all();
        return response()->view('News.parent', compact('categories'));
    }
    public function index()
    {
        $categories = Category::all();
        $sliders = Slider::all();
        $articles = Articles::all();
        return response()->view('News.index', compact('categories', 'sliders', 'articles'));
    }

    public function contact()
    {
        $categories = Category::all();
        // $sliders = Slider::all();
        // $articles = Articles::all();
        return response()->view('News.contact', compact('categories'));
    }

    public function allNews($id)
    {

        $articles = Articles::where('category_id', $id)->simplePaginate(5);
        $article = Articles::orderBy('id', 'desc')->get();
        return view('News.all-news', compact('articles', 'article'));
    }

    public function showDet($id)
    {
        $article = Articles::findOrFail($id);
        return view('News.newsdetailes', compact('article', 'id'));
    }

    public function comments($id)
    {
        $articles = Articles::findOrFail($id);
        // $comments = Comment::where('article_id' , $id)->get();
        $comments = $articles->comments;

        return view('News.newsdetailes', compact('article', 'comments', 'id'));
    }

    public function storComment(Request $request)
    {
        $validator = Validator($request->all(), [
            'comment' => "required|min:3",
        ]);

        $comments =  new Comment();
        $comments->comment = $request->get('comment');
        $comments->article_id = $request->get('article_id');
        $isSaved = $comments->save();

        if ($isSaved) {

            return response()->json(['message' => $isSaved ? "Saved successfully" : "Failed to save"], $isSaved ? 201 : 400);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], 400);
        }
    }
}
