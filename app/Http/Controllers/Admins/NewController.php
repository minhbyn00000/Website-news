<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewController extends Controller
{
    public function index()
    {
        $data = DB::table('news')
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.id', 'news.title', 'news.views', 'news.image', 'news.description', 'categories.name as category_name')
            ->orderByDesc('news.id')
            ->paginate(25);

        $categories = DB::table('categories')->get();

        return view('admins.news.table', compact('data', 'categories'));
    }

    public function filter(Request $request)
    {
        $query = News::query()
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.id', 'news.title', 'news.views', 'news.image', 'news.description', 'categories.name as category_name');

        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('categories.id', $request->category_id);
        }

        if ($request->has('search') && $request->search != '') {
            $query->where('news.title', 'like', '%' . $request->search . '%')
                ->orWhere('news.description', 'like', '%' . $request->search . '%');
        }

        $data = $query->paginate(50);

        $categories = DB::table('categories')->get();

        return view('admins.news.table', compact('data', 'categories'));
    }


    public function create()
    {
        $categories = Category::query()->get();
        return view('admins.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'category_id' => 'required|integer',
            'views' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $new = [
            'title' => $request->title,
            'category_id' => $request->category_id,
            'views' => $request->views,
            'image' => $imageName,
            'description' => $request->description
        ];

        News::query()->create($new);

        return redirect()->route('admin.news.table')->with('success', 'Created successfully');
    }

    public function destroy($id)
    {

        News::query()->where('news.id', $id)->delete();

        return redirect()->route('admin.news.table')->with('success', 'Created successfully');
    }

    public function edit($id)
    {

        $data = News::query()
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.id', 'news.title', 'news.views', 'news.image', 'news.description', 'categories.name as category_name')
            ->where('news.id', $id)
            ->first();

        $categories = Category::query()->get();

        return view('admins.news.update', compact('data', 'categories'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|string',
            'category_id' => 'required|integer',
            'create_at' => 'required|date',
            'views' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $new = [
            'title' => $request->title,
            'category_id' => $request->category_id,
            'create_at' => $request->create_at,
            'views' => $request->views,
            'image' => $imageName,
            'description' => $request->description
        ];

        News::query()->where('id', $id)->update($new);

        return redirect()->route('admin.news.table')->with('success', 'Created successfully');
    }


    public function details($id)
    {

        $data = News::query()
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.id', 'news.title', 'news.views', 'news.image', 'news.description', 'categories.name as category_name')
            ->where('news.id', $id)
            ->first();

        return view('admins.news.details', compact('data'));
    }

    public function deleteAll()
    {
        News::query()->delete();

        return redirect()->route('admin.news.table')->with('success', 'Created successfully');
    }
}
