@extends('admin-panel.layouts.master')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Edit Product Collection</h4>
                <h6><a href="{{ route('collections.index')}}">All Collections /</a> Edit product collection</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">

                    <form action="{{ route('collections.update', $collection->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Use PUT method for updating -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Collection Name *</label>
                                <input type="text" name="name" class="form-control" id="collectionName" value="{{ old('name', $collection->name) }}" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Slug (optional)</label>
                                <input type="text" name="slug" class="form-control" id="collectionSlug" value="{{ old('slug', $collection->slug) }}">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Order</label>
                                <input type="number" name="order" class="form-control" value="{{ old('order', $collection->order) }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status">Status:</label>
                            <input type="checkbox" name="status" value="1" {{ $collection->status == 1 ? 'checked' : '' }}>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Update</button>
                            <a href="{{ route('collections.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Auto-generate slug based on the collection name
    document.getElementById('collectionName').addEventListener('input', function() {
        var name = this.value;
        var slug = name.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
        document.getElementById('collectionSlug').value = slug;
    });
</script>

@endsection
