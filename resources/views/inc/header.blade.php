<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{route('home')}}"><img style="width: 50%" src="{{asset('frontend/img/logo-blanc.png')}}" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Accueil</a></li>
{{--                        <li class="nav-item"><a class="nav-link" href="feature.html">Features</a></li>--}}
{{--                        <li class="nav-item"><a class="nav-link" href="price.html">Price</a></li>--}}
{{--                        <li class="nav-item submenu dropdown">--}}
{{--                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li class="nav-item"><a class="nav-link" href="feature.html">Features</a></li>--}}
{{--                                <li class="nav-item"><a class="nav-link" href="price.html">Price</a></li>--}}
{{--                                <li class="nav-item"><a class="nav-link" href="element.html">Element</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item submenu dropdown">--}}
{{--                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>--}}
{{--                            <ul class="dropdown-menu">--}}
{{--                                <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>--}}
{{--                                <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
                        <li class="nav-item"><a class="nav-link" href="contact.html">Contactez-nous</a></li>
                    </ul>
                </div>
                <div class="right-button">
                    <ul>
                        <li><a class="login mx-2" href="{{route('login')}}">Se connecter</a></li>
                        <li><a class="sign_up" href="{{route('register')}}">S'inscrire</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
