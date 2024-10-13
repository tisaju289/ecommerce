@extends('admin-panel.layouts.master')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product Add Category</h4>
                <h6><a href="{{ route('brands.index')}}">All Brand /</a> Create new product category</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">

                    <!-- Laravel form for creating a category -->
                    <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Brand Name *</label>
                                <input type="text" name="name" class="form-control" id="brandName" placeholder="" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Slug (optional)</label>
                                <input type="text" name="slug" class="form-control" id="brandSlug" placeholder="">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Order</label>
                                <input type="number" name="order" class="form-control" placeholder="" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Brand Image</label>
                                <div class="image-upload">
                                    <input type="file" name="image" class="form-control-file" id="imageInput" accept="image/*">
                                    <div class="image-uploads">
                                        <img src="/admin-panel/assets/img/icons/upload.svg" alt="img" id="imagePreview" style="width: 50px; height: 50px; object-fit: cover; border: 1px solid #ddd;">
                                        <h4>Drag and drop a file to upload</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                      
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <input type="checkbox" name="status" value="1">
                            </div>
                      


                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
   
    document.getElementById('brandName').addEventListener('input', function() {
        var name = this.value;
        var slug = name.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
        document.getElementById('brandSlug').value = slug;
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
</script>




@endSection