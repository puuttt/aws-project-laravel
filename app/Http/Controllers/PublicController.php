<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PublicController extends Controller
{
    public function index()
    {
        $newest = Article::latest()->take(3)->get();
        $data = Article::paginate(8);
        return view('public.articles', ['newest' => $newest, 'data' => $data]);
    }

    public function show($id)
    {
        $data = Article::findOrFail($id);
        return view('public.news', ['data' => [$data]]);
    }

    public function categoryList()
    {
        $category = Article::select('category')->distinct()->get();
        return view('public.categories', ['category' => $category]);
    }

    public function showCategory($category)
    {
        $data = Article::where('category', $category)->paginate(8);
        return view('public.categories', ['data' => $data]);
    }
}
