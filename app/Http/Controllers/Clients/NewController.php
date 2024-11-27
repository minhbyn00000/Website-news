<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewController extends Controller
{
    public function index()
    {

        $today = Carbon::today();

        $categories = Category::query()->get();

        $newstrend = News::query()
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.id', 'news.title', 'news.views', 'news.image', 'news.description', 'news.created_at', 'categories.name as category_name')
            ->orderByDesc('news.views')
            ->limit(3)
            ->get();

        $newsdescid = News::query()
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.id', 'news.title', 'news.views', 'news.image', 'news.description', 'news.created_at', 'categories.name as category_name')
            ->orderByDesc('news.id')
            ->limit(2)
            ->get();

        $newPopular = News::query()
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.id', 'news.title', 'news.views', 'news.image', 'news.description', 'news.created_at', 'categories.name as category_name')
            ->orderByDesc('news.id')
            ->first();

        $new = News::query()
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->whereDate('news.created_at', $today)
            ->select('news.id', 'news.title', 'news.views', 'news.image', 'news.description', 'news.created_at', 'categories.name as category_name')
            ->limit(1)
            ->first();

        return view('clients.index', compact('categories', 'newstrend', 'newsdescid', 'newPopular', 'new'));
    }


    public function category($categoryID)
    {
        $categories = Category::query()->get();

        $news = News::query()
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->where('news.category_id', $categoryID)
            ->select('news.id', 'news.title', 'news.views', 'news.image', 'news.description', 'news.created_at', 'categories.name as category_name')
            ->paginate(5);

        $categoryName = Category::query()->find($categoryID)->name;

        return view('clients.category', compact('categories', 'news', 'categoryName'));
    }

    public function details($id)
    {
        $categories = Category::query()->get();
    
        $new = News::query()
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->where('news.id', $id)
            ->select('news.id', 'news.title', 'news.views', 'news.image', 'news.description', 'news.created_at', 'categories.name as category_name')
            ->first();
    
        if (!$new) {
            return redirect()->back()->withErrors(['error' => 'Article not found.']);
        }
    
        return view('clients.details', compact('new', 'categories'));
    }
    

    public function filter(Request $request)
    {
        $query = News::query()
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.id', 'news.title', 'news.views', 'news.image', 'news.description', 'news.created_at', 'categories.name as category_name');

        if ($request->has('search') && $request->search != '') {
            $query->where('news.title', 'like', '%' . $request->search . '%')
                ->orWhere('news.description', 'like', '%' . $request->search . '%');
        }

        $news = $query->paginate(5);
        $categories = Category::query()->get();

        return view('clients.search_results', compact('categories', 'news'));
    }
}
