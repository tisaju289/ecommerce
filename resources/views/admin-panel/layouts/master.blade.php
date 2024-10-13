<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Admin - ShoptiCart</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="shortcut icon" type="image/x-icon" href="{{ asset('/admin-panel/assets/img/shopticart-fav.png')}}">

<link rel="stylesheet" href="{{ asset('/admin-panel/assets/css/bootstrap.min.css')}}">

<link rel="stylesheet" href="{{ asset('/admin-panel/assets/css/animate.css')}}">

<link rel="stylesheet" href="{{ asset('/admin-panel/assets/css/dataTables.bootstrap4.min.css')}}">

<link rel="stylesheet" href="{{ asset('/admin-panel/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
<link rel="stylesheet" href="{{ asset('/admin-panel/assets/plugins/fontawesome/css/all.min.cs')}}s">

<link rel="stylesheet" href="{{ asset('/admin-panel/assets/css/style.css')}}">
</head>
<body>
    {{-- <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div> --}}

<div class="main-wrapper">

   @include('admin-panel.components.header')

   @include('admin-panel.components.sidebar')

    @yield('content')
    








<!-- Toast Container -->
<div aria-live="polite" aria-atomic="true" class="position-relative">
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <!-- Success Toast -->
        @if(session('success'))
            <div class="toast" id="successToast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto text-success">Success</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        @endif





        <!-- Error Toast -->
        @if(session('error'))
            <div class="toast" id="errorToast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto text-danger">Error</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ session('error') }}
                </div>
            </div>
        @endif
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
<script>
    // Show the success toast if present
    @if(session('success'))
        var successToastEl = document.getElementById('successToast');
        var successToast = new bootstrap.Toast(successToastEl);
        successToast.show();
    @endif

    // Show the error toast if present
    @if(session('error'))
        var errorToastEl = document.getElementById('errorToast');
        var errorToast = new bootstrap.Toast(errorToastEl);
        errorToast.show();
    @endif
</script>


</div>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('/admin-panel/assets/js/jquery-3.6.0.min.js')}}"></script>

<script src="{{ asset('/admin-panel/assets/js/feather.min.js')}}"></script>

<script src="{{ asset('/admin-panel/assets/js/jquery.slimscroll.min.js')}}"></script>

<script src="{{ asset('/admin-panel/assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('/admin-panel/assets/js/dataTables.bootstrap4.min.j')}}s"></script>

<script src="{{ asset('/admin-panel/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{ asset('/admin-panel/assets/plugins/apexchart/apexcharts.min.js')}}"></script>
<script src="{{ asset('/admin-panel/assets/plugins/apexchart/chart-data.js')}}"></script>

<script src="{{ asset('/admin-panel/assets/js/script.js')}}"></script>

<script src="{{ asset('/admin-panel/assets/plugins/select2/js/select2.min.js')}}"></script>

<script src="{{ asset('/admin-panel/assets/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('/admin-panel/assets/plugins/sweetalert/sweetalerts.min.js')}}"></script>



</body>
</html>