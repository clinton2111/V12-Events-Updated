<header>
    <nav>
        <div class="nav-wrapper teal">

            <div class="container">
                <ul id="dropdown1" class="dropdown-content">
                    <li><a href="#!">Profile</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </ul>
                <ul id="nav-mobile" class="right ">
                    @if (Auth::guest())
                        <li>Welcome Stranger</li>
                    @else
                        <li>
                            <a class="dropdown-button" href="#!" data-activates="dropdown1"
                               style="position: relative;padding-left: 50px">
                                <img srcset=""
                                     src="/uploads/avatars/{{Auth::user()->avatar}}"
                                     alt=""
                                     style="width: 36px; height: 36px ; position: absolute;top:13px;left:10px;border-radius: 50%;margin-right: 25px">{{Auth::user()->name}}
                                <i class="material-icons right">arrow_drop_down</i>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

        </div>
    </nav>
</header>