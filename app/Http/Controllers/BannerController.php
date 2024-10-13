<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::where('banners.user_id', Auth::user()->id)->orderBy('order', 'asc')->get();
        return view('admin-panel.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('admin-panel.banner.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $banner = new Banner();
        $banner->product_id = $request->product_id;
        $banner->title = $request->title;
        $banner->slug = Str::slug($request->title);
        $banner->order = $request->order;
        $banner->user_id = Auth::user()->id;
        $banner->status = $request->has('status') ? true : false;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('banners', 'public');
            $banner->image = $imagePath;
        }

        $banner->save();
        setToastMessage('Banner Created successfully.', 'success');
        return redirect()->route('banners.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($is)
    {
        $products = Product::all();
        $banner = Banner::findOrFail($is);
        return view('admin-panel.banner.edit', compact('banner', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->product_id = $request->product_id;
        $banner->title = $request->title;
        $banner->slug = Str::slug($request->title);
        $banner->order = $request->order;
        $banner->status = $request->has('status') ? true : false;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('banners', 'public');
            $banner->image = $imagePath;
        }
        $banner->save();
        setToastMessage('Banner Updated successfully.', 'success');
        return redirect()->route('banners.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        setToastMessage('Banner Deleted successfully.', 'success');
        return redirect()->route('banners.index');
        
    }
}
