<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function adminDashboard(Request $request)
    {

        $categories = Category::latest()->get();
        $blogs = Blog::latest()->where(function ($query) {
            if ($categoryId = request()->query('category_id')) {
                $query->where('category_id', $categoryId);
            }
        })->where(function ($query) {
            if ($search = request()->query('search')) {
                $query->where('title', 'LIKE', "%{$search}%");
                $query->orWhere('description', 'LIKE', "%{$search}%");
            }
        })->paginate(10);
        return view('components.admin-dashboard', compact('blogs', 'categories'));
    }

    // public function adminComments()
    // {
    //     $comments = Comment::latest()->get();
    //     return view('components.admin-comments', compact('comments'));
    // }

    public function adminComments()
    {
        $comments = Comment::with(['blog', 'user'])->latest()->paginate(10);
        return view('components.admin-comments', compact('comments'));
    }

    public function commentDestroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        // return back()->with('message', 'Comment has been removed successfully');
        return redirect()->route('admin.comments')->with('message', 'Comment has been removed successfully');
    }

    public function adminUsers()
    {
        $users = User::latest()->paginate(10);
        return view('components.admin-users', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('components.user-edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,user'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users')->with('message', 'User has been updated successfully');
    }

    public function userDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('message', 'User has been removed successfully');
    }
}
