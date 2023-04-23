<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.html" aria-expanded="false"><i
                    data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>

        <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('form-tools.index') }}" aria-expanded="false"><i
                    class="far fa-list-alt"></i><span class="hide-menu">Form Services
                </span></a>
        </li>
        {{-- <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="app-chat.html" aria-expanded="false"><i
                    data-feather="message-square" class="feather-icon"></i><span class="hide-menu">Chat</span></a></li>
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="app-calendar.html" aria-expanded="false"><i
                    data-feather="calendar" class="feather-icon"></i><span class="hide-menu">Calendar</span></a></li>

        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Components</span></li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                    data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Forms </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="form-inputs.html" class="sidebar-link"><span class="hide-menu"> Form
                            Inputs
                        </span></a>
                </li>
                <li class="sidebar-item"><a href="form-input-grid.html" class="sidebar-link"><span class="hide-menu">
                            Form Grids
                        </span></a>
                </li>
                <li class="sidebar-item"><a href="form-checkbox-radio.html" class="sidebar-link"><span
                            class="hide-menu"> Checkboxes &
                            Radios
                        </span></a>
                </li>
            </ul>
        </li>
        <li class="list-divider"></li>
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
                    class="hide-menu">Logout</span></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li> --}}
    </ul>
</nav>
