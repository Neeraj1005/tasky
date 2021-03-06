<div>
    <nav class="navbar navbar-expand-md navbar-light bg-light p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'tasky') }}
            </a>
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                {{ __('Dashboard') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto mb-lg-0 d-flex">
                    <!-- Authentication Links -->
                    @guest
                        @if(Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if(Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        @hasrole('admin')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('settings') ? 'active' : '' }}"
                                    href="{{ route('settings') }}">
                                    <i class="bi bi-gear mr-5 2x" style="font-size: 1.8rem;display: contents;"></i>
                                </a>
                            </li>
                        @endhasrole
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a type="button" class="dropdown-item"
                                        href="{{ route('auth.profile',auth()->user()->id) }}">Edit
                                        profile</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Sign Out') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}"
                                        method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>
