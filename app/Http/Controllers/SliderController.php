<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin-panel.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('admin-panel.slider.create' , compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slider = new Slider();
        $slider->product_id = $request->product_id;
        $slider->title = $request->title;   
        $slider->subtitle = $request->subtitle;   
        $slider->order = $request->order;
        $slider->status = $request->has('status') ? true : false;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('slider', 'public');
            $slider->image = $imagePath;
        }
        $slider->save();
        setToastMessage('Slider Created successfully.', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $products = Product::all();
        $slider = Slider::findOrFail($id);
        return view('admin-panel.slider.edit', compact('slider', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->product_id = $request->product_id;
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->order = $request->order;
        $slider->status = $request->has('status') ? true : false;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('slider', 'public');
            $slider->image = $imagePath;
        }
        $slider->save();
        setToastMessage('Slider updated successfully', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        setToastMessage('Slider deleted successfully', 'success');
        return redirect()->back();
    }
}
