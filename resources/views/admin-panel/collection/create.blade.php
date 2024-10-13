@extends('admin-panel.layouts.master')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product Add Collection</h4>
                <h6><a href="{{ route('collections.index')}}">All Brand /</a> Create new product category</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">

                   
                    <form action="{{ route('collections.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Collection Name *</label>
                                <input type="text" name="name" class="form-control" id="collectionName" placeholder="" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Slug (optional)</label>
                                <input type="text" name="slug" class="form-control" id="collectionSlug" placeholder="">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Order</label>
                                <input type="number" name="order" class="form-control" placeholder="" required>
                            </div>
                        </div>

                 
                      
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <input type="checkbox" name="status" value="1">
                            </div>
                      


                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('collections.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
   
    document.getElementById('collectionName').addEventListener('input', function() {
        var name = this.value;
        var slug = name.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
        document.getElementById('collectionSlug').value = slug;
    });

</script>




@endSection