@extends('admin-panel.layouts.master')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Add Product</h4>
                <h6><a href="{{ route('products.index')}}">All Product /</a> Create new product category</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">

                    <!-- Laravel form for creating a category -->
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Name -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Product Name *</label>
                                    <input type="text" id="productName" name="name" class="form-control" value="{{ old('name') }}" required>
                                </div>
                            </div>
                
                            <!-- Slug -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="slug">Slug (Optional)</label>
                                    <input type="text" id="productSlug" name="slug" class="form-control" value="{{ old('slug') }}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="code">Product Code</label>
                                    <input type="text"  name="code" class="form-control" value="{{ old('code') }}">
                                </div>
                            </div>
                
                            <!-- Description -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                                </div>
                            </div>
                
                            <!-- Short Description -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="short_description">Short Description</label>
                                    <textarea name="short_description" class="form-control" rows="2">{{ old('short_description') }}</textarea>
                                </div>
                            </div>
                
                            <!-- Price -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="price">Price *</label>
                                    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}" required>
                                </div>
                            </div>
                
                            <!-- Discount Price -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="discount_price">Discount Price (Optional)</label>
                                    <input type="number" step="0.01" name="discount_price" class="form-control" value="{{ old('discount_price') }}">
                                </div>
                            </div>
                
                            <!-- Stock Quantity -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="stock_quantity">Stock Quantity *</label>
                                    <input type="number" name="stock_quantity" class="form-control" value="{{ old('stock_quantity') }}" required>
                                </div>
                            </div>
                
                            <!-- SKU -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="sku">SKU *</label>
                                    <input type="text" name="sku" class="form-control" value="{{ old('sku') }}" required>
                                </div>
                            </div>
                
                            <!-- Status -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                
                            <!-- Featured -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="featured">Featured</label>
                                    <select name="featured" class="form-control">
                                        <option value="0" {{ old('featured') == 0 ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ old('featured') == 1 ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                            </div>
                
                            <!-- New Arrival -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="new_arrival">New Arrival</label>
                                    <select name="new_arrival" class="form-control">
                                        <option value="0" {{ old('new_arrival') == 0 ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ old('new_arrival') == 1 ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                            </div>
                
                            <!-- Best Seller -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="best_seller">Best Seller</label>
                                    <select name="best_seller" class="form-control">
                                        <option value="0" {{ old('best_seller') == 0 ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ old('best_seller') == 1 ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                            </div>
                
                            <!-- Category -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                
                            <!-- Brand -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="brand_id">Brand</label>
                                    <select name="brand_id" class="form-control">
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="card-header">
                                    <strong>Product Collections</strong>
                                </div>
                                <div class="card-body">
                                    @foreach($collections as $collection)
                                    <div class="form-check">
                                        <input type="checkbox" name="collections[]" value="{{ $collection->id }}" class="form-check-input">
                                        <label class="form-check-label">{{ $collection->name }}</label>
                                    </div>
                                @endforeach
                                </div>
                            </div>

                            
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="image">Product Image</label>
                                <div class="image-upload">
                                    <input type="file" name="image" class="form-control-file" id="imageInput" accept="image/*">
                                    <div class="image-uploads">
                                        <img src="/admin-panel/assets/img/icons/upload.svg" alt="img" id="imagePreview" style="width: 50px; height: 50px; object-fit: cover; border: 1px solid #ddd;">
                                        <h4>Drag and drop a file to upload</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                
                   
            
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="gallery">Product Gallery</label>
                                <div class="image-upload">
                                    <input type="file" id="galleryInput" name="gallery[]" class="form-control-file" multiple>
                                    <div id="galleryPreview" class="image-uploads d-flex justify-content-center flex-wrap">
                                        <div class="text-center">
                                            <img src="/admin-panel/assets/img/icons/upload.svg" alt="img" id="defaultImage" style="width: 50px; height: 50px; object-fit: cover; border: 1px solid #ddd;">
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                      





                            <!-- Meta Title -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}">
                                </div>
                            </div>
                
                            <!-- Meta Description -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description') }}</textarea>
                                </div>
                            </div>
                
                            <!-- Meta Keywords -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="meta_keywords">Meta Keywords</label>
                                    <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords') }}">
                                </div>
                            </div>
                
                            <!-- Weight -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="weight">Weight</label>
                                    <input type="number" name="weight" class="form-control" value="{{ old('weight') }}">
                                </div>
                            </div>
                
                            <!-- Dimensions -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="dimensions">Dimensions</label>
                                    <input type="text" name="dimensions" class="form-control" value="{{ old('dimensions') }}">
                                </div>
                            </div>
                
                            <!-- Color -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="color">Color</label>
                                    <input type="text" name="color" class="form-control" value="{{ old('color') }}">
                                </div>
                            </div>
                
                            <!-- Size -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="size">Size</label>
                                    <input type="text" name="size" class="form-control" value="{{ old('size') }}">
                                </div>
                            </div>
                
                            <!-- Tags -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <input type="text" name="tags" class="form-control" value="{{ old('tags') }}">
                                </div>
                            </div>
                
                            <!-- Submit Button -->
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Create Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   
    document.getElementById('productName').addEventListener('input', function() {
        var name = this.value;
        var slug = name.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
        document.getElementById('productSlug').value = slug;
    });

   
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


    document.getElementById('galleryInput').addEventListener('change', function(event) {
        var files = event.target.files;
        var galleryPreview = document.getElementById('galleryPreview');
        
        // Clear the current previews
        galleryPreview.innerHTML = '';

        // Loop through the selected files and create image previews
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            reader.onload = function(e) {
                // Create image element
                var img = document.createElement('img');
                img.src = e.target.result;
                img.style.width = '50px';
                img.style.height = '50px';
                img.style.objectFit = 'cover';
                img.style.marginRight = '10px';
                img.style.border = '1px solid #ddd';

                // Append image to the preview container
                galleryPreview.appendChild(img);
            };

            reader.readAsDataURL(file);
        }
    });
</script>




@endSection