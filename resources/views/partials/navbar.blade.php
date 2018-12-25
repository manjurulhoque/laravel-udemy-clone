<section class="menu-area">
    <div class="container-xl">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <ul class="mobile-header-buttons">
                        <li><a class="mobile-nav-trigger" href="#mobile-primary-nav">Menu<span></span></a></li>
                        <li><a class="mobile-search-trigger" href="#mobile-search">Search<span></span></a></li>
                    </ul>

                    <a class="navbar-brand" href="/">
                        {{--<img src="" alt="" height="30">--}}
                        Udemy Clone
                    </a>

                    @include('partials.menu')

                    <form class="inline-form" action=""
                          method="post" style="width: 100%;">
                        <div class="input-group search-box mobile-search">
                            <input type="text" name='search_string' class="form-control"
                                   placeholder="Search for courses">
                            <div class="input-group-append">
                                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                    <div class="wishlist-box menu-icon-box" id="wishlist_items">
                        {{--Wishlist will be here--}}
                    </div>

                    <div class="cart-box menu-icon-box" id="cart_items">
                        @include('partials.cart')
                    </div>

                    @auth
                    <div class="user-box menu-icon-box">
                        <div class="icon">
                            <a href="">
                                <img src="{{ asset('images/avatar.png') }}" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="dropdown user-dropdown corner-triangle top-right">
                            <ul class="user-dropdown-menu">

                                <li class="dropdown-user-info">
                                    <a href="">
                                        <div class="clearfix">
                                            <div class="user-image float-left">
                                                <img src="{{ asset('images/avatar.png') }}" alt="" class="img-fluid">
                                            </div>
                                            <div class="user-details">
                                                <div class="user-name">
                                                    <span class="hi">hi,</span>
                                                    <?php echo auth()->user()->first_name . ' ' . auth()->user()->last_name ?>
                                                </div>
                                                <div class="user-email">
                                                    <span class="email">{{ auth()->user()->email }}</span>
                                                    <span class="welcome">Welcome back</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li class="user-dropdown-menu-item">
                                    <a href="{{ route('user.courses') }}">
                                        <i class="far fa-gem"></i>My Courses
                                    </a>
                                </li>
                                <li class="user-dropdown-menu-item">
                                    <a href="">
                                        <i class="far fa-heart"></i>My Wishlist
                                    </a>
                                </li>
                                <li class="user-dropdown-menu-item">
                                    <a href="{{ route('user.profile') }}">
                                        <i class="fas fa-user"></i>User profile
                                    </a>
                                </li>
                                <li class="dropdown-user-logout user-dropdown-menu-item">
                                    <a href="">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    @endauth
                    @guest
                    <span class="signin-box-move-desktop-helper"></span>
                    <div class="sign-in-box btn-group">

                        <button type="button" class="btn btn-sign-in" data-toggle="modal"
                                data-target="#signInModal">Login
                        </button>

                        <button type="button" class="btn btn-sign-up" data-toggle="modal"
                                data-target="#signUpModal">Sign up
                        </button>

                    </div>
                    @endguest

                </nav>
            </div>
        </div>
    </div>
</section>
