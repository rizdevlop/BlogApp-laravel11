<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-view-grid"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/manajemen-pengguna">Pengguna</a></li>
                        <li><a href="/category-management">Kategori</a></li>
                        <li><a href="/post-management">Post</a></li>
                    </ul>
                </li>

                <li>
                    <a href="/profile-admin" class="waves-effect">
                        <i class="ti-user"></i>
                        <span>Profil</span>
                    </a>
                </li>

                <li>
                    <a href="/pesan-masuk" class="waves-effect">
                        <i class="ti-receipt"></i>
                        <span>Pesan Masuk</span>
                    </a>
                </li>
            </ul>
        </div>
            <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
