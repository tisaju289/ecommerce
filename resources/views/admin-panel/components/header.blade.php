<div class="header">

    <div class="header-left active">
    <a href="index.html" class="logo">
    <img src="/admin-panel/assets/img/shopticart.png" alt="">
    </a>
    <a href="index.html" class="logo-small">
    <img src="/admin-panel/assets/img/shopticart-fav.png" alt="">
    </a>
    <a id="toggle_btn" href="javascript:void(0);">
    </a>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
    <span class="bar-icon">
    <span></span>
    <span></span>
    <span></span>
    </span>
    </a>

    <ul class="nav user-menu">

        <li class="nav-item">
            <a class="btn nav-link" href="{{ url('/')}}">
                <i class="fas fa-shopping-cart"></i> Visit Shop
            </a>
        </li>

    <li class="nav-item dropdown has-arrow main-drop">
        <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
        <span class="user-img"><img src="/admin-panel/assets/img/profiles/avator1.jpg" alt="">
        <span class="status online"></span></span>
        </a>
        <div class="dropdown-menu menu-drop-user">
        <div class="profilename">
        <div class="profileset">
        <span class="user-img"><img src="/admin-panel/assets/img/profiles/avator1.jpg" alt="">
        <span class="status online"></span></span>
        <div class="profilesets">
        <h6>John Doe</h6>
        <h5>Admin</h5>
        </div>
        </div>
        <hr class="m-0">
        <a class="dropdown-item" href="{{ url('userProfile')}}"> <i class="me-2" data-feather="user"></i> My Profile</a>
        <a class="dropdown-item" href="generalsettings.html"><i class="me-2" data-feather="settings"></i>Settings</a>
        <hr class="m-0">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-gray-700 underline">Log Out</button>
        </form>
        
        </div>
        </div>
    </li>
    </ul>


    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="profile.html">My Profile</a>
        <a class="dropdown-item" href="generalsettings.html">Settings</a>
       
        <form class="dropdown-item" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-gray-700 underline">Log Out</button>
        </form>
       
        </div>
    </div>

</div> 


