<?php

namespace App\Http\Controllers;

use session;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    { 
       
        $categories = Category::where('categories.user_id', Auth::user()->id)->orderBy('order', 'asc')->get();
        return view('admin-panel.category.index', compact('categories'));
      
      
    }

    public function create()
    { 
       try{
        $categories = Category::whereNull('parent_id')->get();
        return view('admin-panel.category.create', compact('categories'));
       }
       catch(\Exception $e){
        setToastMessage('Category not found.', 'error');
        return redirect()->back();
       }
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|integer|exists:categories,id',
            'order' => 'required|integer|unique:categories,order',
            'slug' => 'nullable|string|unique:categories,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
      
       
        $slug = $request->input('slug') ?: Str::slug($request->input('name'));
    
        $category = new Category();
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent_id');
        $category->order = $request->input('order');
        $category->slug = $slug;
        $category->user_id = Auth::user()->id;
      
    
     
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->img = $imagePath;
        }
    
        $category->save();
        setToastMessage('Category Created successfully.', 'success');
        return redirect()->back();
      
       
       
      
    }
    
    public function edit($id)
    {
        try{
            $category = Category::findOrFail($id);
        $categories = Category::whereNull('parent_id')->get();
        return view('admin-panel.category.edit', compact('category', 'categories'));
        }
        catch(\Exception $e){
            setToastMessage('Category not found.', 'error');
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
      
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|integer|exists:categories,id', 
            'order' => 'required|integer|unique:categories,order,' . $id,
            'slug' => 'nullable|string|unique:categories,slug,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        try{
            $slug = $request->input('slug') ?: Str::slug($request->input('name'));
    
       
        $category = Category::findOrFail($id);
    
      
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent_id');
        $category->order = $request->input('order');
        $category->slug = $slug;
    
      
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $category->img = $imagePath;
        }
    
        $category->save();
        setToastMessage('Category Upadated successfully.', 'success');
        return redirect()->route('categories.index');
        }
        catch(\Exception $e){
            setToastMessage('Category can not be updated.', 'error');
            return redirect()->back();
        }
        
    }

    public function destroy($id)
    {
       try{
        $category = Category::findOrFail($id);
        $category->delete();
        
        setToastMessage('Category deleted successfully.', 'success');
        return redirect()->back();
       }
       catch(\Exception $e){
        setToastMessage('Category can not be deleted.', 'error');
        return redirect()->back();
       }
    }
    



}
