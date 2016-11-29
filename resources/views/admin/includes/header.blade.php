<header>
    <nav>
        <div class="nav-wrapper teal">

            <div class="container">
                @if(Sentinel::check())
                    <a href="#" data-activates="slide-out" class="button-collapse"><i
                                class="material-icons">menu</i></a>
                @endif

                <ul id="nav-mobile" class="right ">
                    @if (!Sentinel::check())
                        <li>Welcome Stranger</li>
                    @else
                        <li>
                            <a
                                    style="position: relative;padding-left: 50px">
                                <img srcset=""
                                     src="/uploads/avatars/{{Sentinel::getUser()->avatar}}"
                                     alt=""
                                     style="width: 36px; height: 36px ; position: absolute;top:13px;left:10px;border-radius: 50%;margin-right: 25px">{{Sentinel::getUser()->name}}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

        </div>
    </nav>

    @if(Sentinel::check())
        <ul id="slide-out" class="side-nav fixed">
            <li>
                <div class="userView">
                    <div class="background">
                        <img src="/images/gifs/background.gif">
                    </div>
                    <img class="circle" src="/uploads/avatars/{{Sentinel::getUser()->avatar}}">
                    <span class="white-text name">{{Sentinel::getUser()->name}}</span>
                    <span class="white-text email">{{Sentinel::getUser()->email}}</span>
                </div>
            </li>
            <li>
                <a href="{{ route('dashboard.home') }}" class="waves-effect">
                    <i class="material-icons">home</i>
                    Home
                </a>
            </li>
            <li>
                <a href="" class="waves-effect">
                    <i class="material-icons">photo</i>
                    Photo Management
                </a>
            </li>
            <li>
                <a href="" class="waves-effect">
                    <i class="material-icons">videocam</i>
                    Video Management
                </a>
            </li>
            <li>
                <a href="" class="waves-effect">
                    <i class="material-icons">people</i>
                    Testimonial Management
                </a>
            </li>
            <li>
                <a href="" class="waves-effect">
                    <i class="material-icons">web</i>
                    Website Settings
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.contactSettingsView') }}" class="waves-effect">
                    <i class="material-icons">mail</i>
                    Contact Settings
                </a>
            </li>
            <li>
                <a href="" class="waves-effect">
                    <i class="material-icons">apps</i>
                    API Settings
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.accountSettingsView') }}" class="waves-effect">
                    <i class="material-icons">perm_identity</i>
                    Account Settings
                </a>
            </li>
            <li>

                <form id="logout-form" action="{{route('logout.user')}}" method="POST" name="logout-form"
                      style="display: none">
                    {{ csrf_field() }}

                </form>
                <a href="#"
                   onclick="document.getElementById('logout-form').submit();">
                    <i class="material-icons">exit_to_app</i>
                    Logout
                </a>
            </li>


        </ul>

    @endif
</header>