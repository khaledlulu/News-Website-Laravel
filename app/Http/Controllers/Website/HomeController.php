<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Category;
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
}
