<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
    <div class="container-fluid px-0">
        <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
            <div class="d-flex flex-align-items-center">
                <form class="navbar-search form-inline" id="navbar-search-main">
                    <div class="input-group input-group-merge search-bar">
                        <span class="input-group-text" id="topbar-addon">
                            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <input type="text" class="form-control" id="topbarInputIconLeft" placeholder="Search" aria-label="Search" aria-describedby="topbar-addon">
                    </div>
                </form>
            </div>
            <ul class="navbar-nav align-items-center">
                <li class="nav-item dropdown"></li>
                <li class="nav-item dropdown ms-3">
                    <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <div class="media d-flex align-items-center">
                                <img class="avatar rounded-circle object-fit: cover;" alt="Image placeholder" 
                                    src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : asset('assets/admin/img/team/profile-picture-3.jpg') }}">
                            </div>
                            <div class="media-body ms-2 text-dark align-items-center center d-none d-lg-block">
                                <span class="mb-0 font-small fw-bold text-gray-900">{{ Auth::user()->name }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 8a3 3 0 100-6 3 3 0 000 6zM8.814 12.085A3.1 3.1 0 0010 12.5a3.1 3.1 0 001.186-.415 2 2 0 112.618 2.618C13.
                                504 15.65 11.545 16 10 16s-3.504-.35-4.804-1.797a2 2 0 112.618-2.618z" clip-rule="evenodd"></path>
                            </svg>
                            My Profile
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-.076-.759-.092-1.139-.092-.566 0-1.139.141-1.684.385-1.127.502-2.022 1.258-2.586 2.128-.564.87-.79 1.834-.79 
                                2.801 0 1.05.291 2.083.844 2.98.553.897 1.34 1.554 2.296 2.054a5.3 5.3 0 002.775 0 4.885 4.885 0 002.296-2.054c.553-.897.844-1.93.844-2.98 0-.967-.226-1.931-.79-2.801-.564
                                -.87-1.459-1.626-2.586-2.128-.545-.244-1.118-.385-1.684-.385a3.14 3.14 0 00-1.139.092c-.38.076-.74.19-1.09.349-1.282.59-2.222 1.517-2.648 2.628-.426 1.11-.475 2.28-.135 3.39a.75.75 0 001.408-.547c-.206-.667-.206-1.353 
                                0-2.02.164-.53.483-1.002.957-1.393.474-.391 1.026-.653 1.637-.775.61-.122 1.25-.137 1.87-.044.62.093 1.21.31 1.74.636.53.326.97.777 1.31 1.33.34.553.498 1.18.473 1.802-.025.622-.224 1.22-.596 1.745-.372.525-.863.95-1.442 
                                1.267a5.05 5.05 0 01-2.06.526c-.732 0-1.46-.145-2.146-.436-.686-.291-1.32-.71-1.87-1.246-.55-.536-.97-1.176-1.246-1.896-.276-.72-.34-1.493-.197-2.26.143-.767.53-1.46 1.12-2.03.59-.57 1.32-1.007 2.14-1.297.82-.29 1.69-.374 2.56-.252 0 
                                .04-.002.08-.002.12A1.5 1.5 0 0011.49 3.17z" clip-rule="evenodd"></path>
                            </svg>
                            Settings
                        </a>

                        <div role="separator" class="dropdown-divider my-1"></div>

                        <a class="dropdown-item d-flex align-items-center" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4V4"></path>
                            </svg>
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>