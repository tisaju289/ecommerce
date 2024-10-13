@extends('admin-panel.layouts.master')

@section('content')

<div class="page-wrapper">
    <div class="content">

     

                <div class="page-header">
                <div class="page-title">
                <h4>Product Category list</h4>
                <h6>View/Search product Category</h6>
                </div>
                <div class="page-btn">
                <a href="{{route('categories.create')}}" class="btn btn-added">
                <img src="/admin-panel/assets/img/icons/plus.svg" class="me-1" alt="img">Add Category
                </a>
                </div>
                </div>
                
        <div class="card">
            <div class="card-body">
                <div class="table-top">

                    <div class="search-set">
                        <div class="search-path">
                            <a class="btn btn-filter" id="filter_search">
                            <img src="/admin-panel/assets/img/icons/filter.svg" alt="img">
                            <span><img src="/admin-panel/assets/img/icons/closes.svg" alt="img"></span>
                            </a>
                        </div>

                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="/admin-panel/assets/img/icons/search-white.svg" alt="img"></a>
                        </div> 
                    </div>

                    <div class="wordset">
                        <ul>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="/admin-panel/assets/img/icons/pdf.svg" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="/admin-panel/assets/img/icons/excel.svg" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="/admin-panel/assets/img/icons/printer.svg" alt="img"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                {{-- <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                    <div class="row">
                    <div class="col-lg-2 col-sm-6 col-12">
                    <div class="form-group">
                    <select class="select">
                    <option>Choose Category</option>
                    <option>Computers</option>
                    </select>
                    </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                    <div class="form-group">
                    <select class="select">
                    <option>Choose Sub Category</option>
                    <option>Fruits</option>
                    </select>
                    </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                    <div class="form-group">
                    <select class="select">
                    <option>Choose Sub Brand</option>
                    <option>Iphone</option>
                    </select>
                    </div>
                    </div>
                    <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                    <div class="form-group">
                    <a class="btn btn-filters ms-auto"><img src="/admin-panel/assets/img/icons/search-whites.svg" alt="img"></a>
                    </div>
                    </div>
                    </div>
                    </div>
                </div>
                 --}}
                <div class="table-responsive">
                <table class="table  datanew text-center">
                <thead class="text-center">
                <tr>
                
                <th>Order</th>
                <th>Image</th>
                <th>Category Name</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->order }}</td>
                        <td>
                            <a href="javascript:void(0);" class="product-img">
                                <!-- Check if the category has an image -->
                                @if($category->img)
                                    <img src="{{ asset('storage/' . $category->img) }}" alt="product" style="width: 30px; height: 30px; object-fit: cover;">
                                @else
                                    <img src="/path/to/default-image.jpg" alt="default image" style="width: 50px; height: 50px; object-fit: cover;">
                                @endif
                            </a>
                        </td>
                        <td>
                            <a href="javascript:void(0);">{{ $category->name }}</a>
                        </td>
                        <td>
                            <!-- Edit Icon -->
                            <a class="me-3" href="{{ route('categories.edit', $category->id) }}">
                                <img src="/admin-panel/assets/img/icons/edit.svg" alt="img">
                            </a>
                            <!-- Delete Icon with confirmation -->
                            <a href="javascript:void(0);" onclick="confirmDelete({{ $category->id }})" class="me-3">
                                <img src="/admin-panel/assets/img/icons/delete.svg" alt="img">
                            </a>
                
                            <!-- Hidden delete form -->
                            <form id="delete-form-{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                </div>
            </div>
        </div>              
    </div>
</div>


<script>
    function confirmDelete(categoryId) {
        if (confirm('Are you sure you want to delete this category?')) {
            document.getElementById('delete-form-' + categoryId).submit();
        }
    }
    
</script>

@endsection
