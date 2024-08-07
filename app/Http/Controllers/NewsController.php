<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $latestNews = News::orderBy('published_date', 'desc')->take(5)->get();
        $viewsEven = News::whereRaw('id % 2 = 0')->orderBy('views', 'desc')->limit(5)->get();
        $viewsOdd = News::whereRaw('id % 2 <> 0')->orderBy('views', 'desc')->limit(5)->get();

        return view('client.index', compact('latestNews', 'viewsEven', 'viewsOdd'));
    }
    public function showByCategory($id)
    {
        $category = Category::find($id);
        $news = News::where('category_id', $id)->get();
        return view('client.category_blog', compact('category', 'news'));
    }

    public function detail($id)
    {
        $newsDetail = News::find($id);
        return view('client.blog_details', compact('newsDetail'));
    }
    public function search(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ yêu cầu
        $query = $request->input('query');

        $results = News::where('title', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->get();

        return view('client.search_results', compact('results', 'query'));
    }
    public function list()
    {
        $categories = Category::all();

        return view('client.index', compact('categories'));
    }
}
