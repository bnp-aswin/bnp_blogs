<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function getDashboard()
    {
        return view('admin.dashboard');
    }

    public function getAddCategory()
    {   
        return view('admin.add-category',[
            'categories' => Category::all()
        ]);
    }

    public function setAddCategory(Request $request)
    {
        // dd('test');
        $category = $request->validate([
            'category' => ['required', 'min:3', 'max:20']
        ]);
        Category::create([
            'name' => $category['category']
        ]);
        return redirect()->back()->with('status', 'New Category added');
    }
}
