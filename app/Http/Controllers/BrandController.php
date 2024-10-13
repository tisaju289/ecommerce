<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
        $brands = Brand::where('brands.user_id', Auth::user()->id)->orderBy('order', 'asc')->get();
        return view('admin-panel.brands.index', compact('brands'));      
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin-panel.brands.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
       try{
        $slug = $request->input('slug') ?: Str::slug($request->input('name'));
    
        $brand = new Brand();
        $brand->name = $request->input('name');
        $brand->slug = $slug;
        $brand->status = $request->has('status') ? true : false;
        $brand->order = $request->input('order');
        $brand->user_id = Auth::user()->id;
       
      
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $brand->img = $imagePath;
        }
    
        $brand->save();
        setToastMessage('Brand Created successfully.', 'success');
        return redirect()->back();
       }
       catch(\Exception $e){
        setToastMessage('Brand can not be created.', 'error');
        return redirect()->back();
       }





    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin-panel.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    
    
        try{
        $slug = $request->input('slug') ?: Str::slug($request->input('name'));
    
        $brand = Brand::findOrFail($id);
        $brand->name = $request->input('name');
        $brand->slug = $slug;
        $brand->status = $request->has('status') ? true : false;
        $brand->order = $request->input('order');
    
      
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
            $brand->img = $imagePath;
        }
    
        $brand->save();
        setToastMessage('brand Upadated successfully.', 'success');
        return redirect()->route('brands.index');
        }
        catch(\Exception $e){
            setToastMessage('brand can not be updated.', 'error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brand =Brand::findOrFail($id);
        $brand->delete();
        setToastMessage('Brand deleted successfully', 'success');
        return redirect()->route('brands.index');
    }
}
