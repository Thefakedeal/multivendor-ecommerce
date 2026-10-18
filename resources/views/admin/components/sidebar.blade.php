 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/admin" class="d-block">Shop Dharan</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                
                {{-- <li class="nav-item has-treeview">
                   <a href="{{ route('admin.advertisements.index') }}" class="nav-link">
                       <i class="fas fa-city    "></i>
                       <p>
                           Property Listings
                           <i class="right fas fa-angle-left"></i>
                       </p>
                   </a>
                   <div class="nav nav-treeview">
                       <div class="nav-item">
                           <a href="{{ route('admin.advertisements.index') }}" class="nav-link">
                               <i class="fas fa-city    "></i>
                               <p>
                                  All Properties
                               </p>
                           </a>
                       </div>
                       <div class="nav-item">
                           <a href="{{ route('admin.advertisements.pending') }}" class="nav-link">
                               <i class="fas fa-city    "></i>
                               <p>
                                  Pending
                               </p>
                           </a>
                       </div>
                       <div class="nav-item">
                           <a href="{{ route('admin.advertisements.approved') }}" class="nav-link">
                               <i class="fas fa-city    "></i>
                               <p>
                                  Approved
                               </p>
                           </a>
                       </div>
                       <div class="nav-item">
                           <a href="{{ route('admin.advertisements.sold') }}" class="nav-link">
                               <i class="fas fa-city    "></i>
                               <p>
                                  Sold
                               </p>
                           </a>
                       </div>
                       <div class="nav-item">
                           <a href="{{ route('admin.advertisements.closed') }}" class="nav-link">
                               <i class="fas fa-city    "></i>
                               <p>
                                  Closed
                               </p>
                           </a>
                       </div>
                   </div>
               </li> --}}

                <li class="nav-item mt-4">
                    <form action="{{ route('logout') }}" method="post" onsubmit="return confirm('Are You Sure You Want To Logout?')">
                        @csrf
                        <button type="submit" class="btn-block btn-danger p-1">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>