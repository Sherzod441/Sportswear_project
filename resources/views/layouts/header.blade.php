<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand mb-2" href="{{ route('client.home') }}">Sports Wear</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item {{ request()->routeIs('client.home') ? 'active' : '' }}">
                    <a class="nav-link text-uppercase" href="{{ route('client.home') }}">Bosh sahifa</a>
                </li>
                <li class="nav-item {{ request()->routeIs('client.about') ? 'active' : '' }} me-3">
                    <a class="nav-link text-uppercase" href="{{ route('client.about') }}">Biz haqimizda</a>
                </li>
                <li class="nav-item uzb {{ (!session()->has('lang') || session()->get('lang') === 'uzb') ? 'lang' : '' }}">
                    <a href="#" class="nav-link text-uppercase" onclick="changeLang('uzb')">Uzb</a>
                </li>
                <li class="nav-item rus {{ session()->get('lang') === 'ru' ? 'lang' : '' }}">
                    <a href="#" class="nav-link text-uppercase" onclick="changeLang('ru')">Ru</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item d-flex align-items-center position-relative">
                   
                    <a href="{{ route('order.item') }}" class="nav-link cart-shop">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                    <span class="cart-count">0</span>  
                </li>
                <li class="nav-link">
                    <a class="nav-link" href="tel:+998941116092">
                        <i class="fa-solid fa-phone"></i> &nbsp;+99894 111 60 92
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
