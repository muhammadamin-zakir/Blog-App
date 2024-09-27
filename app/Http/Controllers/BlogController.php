<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        $blogs = Blog::latest()->where(function ($query) {
            if ($categoryId = request()->query('category_id')) {
                $query->where('category_id', $categoryId);
            }
        })->paginate(10);
        $allBlogs = Blog::latest()->paginate(3);
        // $categories = Category::paginate(10);
        return view('dashboard', compact('blogs', 'categories', 'allBlogs'));
    }

    public function create()
    {
        $blogs = Blog::latest();
        $categories = Category::all();
        $blog = new Blog();
        return view('components.create', compact('blog', 'blogs', 'categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'category_id' => 'required|exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }
        // Diğer alanlarla birlikte resim yolunu da veritabanına kaydediyoruz
        Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $imagePath, // Resim dosya yolunu kaydediyoruz
            'category_id' => $request->category_id
        ]);
        return redirect()->route('blogs.index')->with('message', 'Blog has been added successfully');
    }

    public function show($id)
    {
        $categories = Category::latest()->paginate(10);
        $latestBlogs = Blog::latest()->paginate(10);
        $blogs = Blog::latest()->paginate(2);
        $blog = Blog::findOrFail($id);
        $comments = $blog->comments()->latest()->paginate(4); // Her sayfada 4 yorum
        return view('components.show', compact('blog', 'blogs', 'comments', 'latestBlogs', 'categories'));
    }


    public function edit($id)
    {
        $categories = Category::all();
        $blog = Blog::findOrFail($id);
        return view('components.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'category_id' => 'required|exists:categories,id'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $blog->image;
        }

        $blog->update([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $imagePath,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('admin.dashboard')->with('message', 'Blog has been updated successfully');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return back()->with('message', 'Blog has been removed successfully');
    }
}
