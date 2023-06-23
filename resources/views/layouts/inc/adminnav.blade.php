<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="nav-item">
                                <a class="nav-link {{ Request::path() === '/' ? 'active' : '' }}" href="{{ route('homepage') }}">HomePage</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::path() === 'home' ? 'active' : '' }}" href="{{ route('home') }}">Dashboard</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ Request::path() === 'view-user' ? 'active' : '' }}" aria-current="page" href="{{ route('users.index')}}">User</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ Request::path() === 'view-resort' ? 'active' : '' }}" href="{{ route('resorts.index') }}">Resort List</a>
                            </li>
          </ol>
          {{-- <h6 class="font-weight-bolder mb-0">Dashboard</h6> --}}
        </nav>

      </div>
    </nav>
