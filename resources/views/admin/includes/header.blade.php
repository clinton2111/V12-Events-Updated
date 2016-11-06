<header>
    <nav>
        <div class="nav-wrapper teal">

            <div class="container">
                @if(!Auth::guest())
                    <a href="#" data-activates="slide-out" class="button-collapse"><i
                                class="material-icons">menu</i></a>
                @endif
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

    @if(!Auth::guest())
        <ul id="slide-out" class="side-nav fixed">
            <li>
                <div class="userView">
                    <div class="background">
                        <img src="/images/gifs/background.gif">
                    </div>
                    <a href="#!user"><img class="circle" src="/uploads/avatars/{{Auth::user()->avatar}}"></a>
                    <a href="#!name"><span class="white-text name">{{Auth::User()->name}}</span></a>
                    <a href="#!email"><span class="white-text email">{{Auth::User()->email}}</span></a>
                </div>
            </li>
            <li><a href="{{ route('dashboard.account') }}" class="waves-effect">
                    <i class="material-icons">perm_identity</i>
                    Account Settings
                </a>
            </li>
        </ul>

    @endif
</header>