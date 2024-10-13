@extends('admin-panel.layouts.master')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Update Slider</h4>
                <h6><a href="{{ route('sliders.index')}}">All slider /</a> Update slider</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">

                    <!-- Laravel form for updating a slider -->
                    <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Since this is an update operation -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Select Product</label>
                                <select name="product_id" class="form-control">
                                    <option value="">Select a Product</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ $slider->product_id == $product->id ? 'selected' : '' }}>
                                            {{ $product->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Slider Title *</label>
                                <input type="text" name="title" class="form-control" id="sliderName" value="{{ $slider->title }}" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Slider Sub Title *</label>
                                <input type="text" name="subtitle" class="form-control" id="sliderSubtitle" value="{{ $slider->subtitle }}" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Slug (optional)</label>
                                <input type="text" name="slug" class="form-control" id="sliderSlug" value="{{ $slider->slug }}">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Order</label>
                                <input type="number" name="order" class="form-control" value="{{ $slider->order }}" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Slider Image</label>
                                <div class="image-upload">
                                    <input type="file" name="image" class="form-control-file" id="imageInput" accept="image/*">
                                    <div class="image-uploads">
                                        <img src="{{ $slider->image ? asset($slider->image) : '/admin-panel/assets/img/icons/upload.svg' }}" alt="img" id="imagePreview" style="width: 50px; height: 50px; object-fit: cover; border: 1px solid #ddd;">
                                        <h4>Drag and drop a file to upload</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <input type="checkbox" name="status" value="1" {{ $slider->status ? 'checked' : '' }}>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Update</button>
                            <a href="{{ route('sliders.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Auto-generate slug from title
    document.getElementById('sliderName').addEventListener('input', function() {
        var name = this.value;
        var slug = name.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
        document.getElementById('sliderSlug').value = slug;
    });

    // Image preview
    document.getElementById('imageInput').addEventListener('change', function(event) {
        var imagePreview = document.getElementById('imagePreview');
        var file = event.target.files[0];
        
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = '/admin-panel/assets/img/icons/upload.svg';
        }
    });
</script>

@endsection