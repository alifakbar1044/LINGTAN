
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ auth()->user()->profile->getAvatar() }}" class="img-circle elevation-2" alt="User Image" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
        </div>
        <div class="info">
            <a href="#" class="d-block" style="color: white;">{{ Auth()->user()->profile->nama_lengkap }}</a>
            </div>
        </div>
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
    <a href="{{url('/profile')}}" class="nav-link" style="color: white;">
        <i class="fa fa-user nav-icon"></i>
        <p>Data User</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{url('/Pertanyaan')}}" class="nav-link" style="color: white;">
        <i class="fa fa-table nav-icon"></i>
        <p>Data Pertanyaan</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{url('/jawaban')}}" class="nav-link" style="color: white;">
        <i class="fa fa-table nav-icon"></i>
        <p>Data Jawaban</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{url('/')}}" class="nav-link" style="color: white;">
        <i class="fa fa-arrow-left nav-icon"></i>
        <p>kembali ke forum</p>
    </a>
</li>
