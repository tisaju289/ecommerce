<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections = Collection::all();
        return view('admin-panel.collection.index', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.collection.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $collection = new Collection();
        $collection->name = $request->name;
        $collection->slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->name);
        $collection->order = $request->order;
        $collection->status = $request->has('status') ? true : false;
        $collection->save();
        setToastMessage('Collection Created successfully', 'success');
        return redirect()->route('collections.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $collection = Collection::findOrFail($id);
        return view('admin-panel.collection.edit', compact('collection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $collection = Collection::findOrFail($id);
        $collection->name = $request->name;
        $collection->slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->name);
        
        $collection->order = $request->order;
        $collection->status = $request->has('status') ? true : false;
        $collection->save();
        setToastMessage('Collection Upadated successfully', 'success');
        return redirect()->route('collections.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $collection = Collection::findOrFail($id);
        $collection->delete();
        setToastMessage('Collection deleted successfully', 'success');
        return redirect()->route('collections.index');
    }
}
