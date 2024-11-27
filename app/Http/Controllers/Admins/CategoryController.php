<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('admins.categories.index', compact('categories'));
    }

    public function create()
    {
    return view('admins.categories.create');
    }

    public function showCategoryDetails($id)
    {

        $category = DB::table('categories')->where('id', $id)->first();
    
        $news = DB::table('news')->where('category_id', $id)->get();
    
        return view('clients.categories.details', compact('category', 'news'));
    }


    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    DB::table('categories')->insert([
        'name' => $request->name,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    return redirect()->route('admin.categories.index')->with('success', 'Thêm danh mục thành công');
    }

    
    public function edit($id)
    {
    $category = DB::table('categories')->where('id', $id)->first();
    return view('admins.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    DB::table('categories')->where('id', $id)->update([
        'name' => $request->name,
        'updated_at' => now(),
    ]);

    return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
    DB::table('categories')->where('id', $id)->delete();

    return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }

}
