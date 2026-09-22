<header>

    <div class="top-header">

        <div class="container">

            <div class="d-flex align-items-center">

                <img
                    src="{{ asset('images/city-logo.png') }}"
                    alt="City Government of San Pedro"
                    class="city-logo"
                >

                <div class="government-title">

                    <div class="republic">
                        REPUBLIC OF THE PHILIPPINES
                    </div>

                    <div class="city-name">
                        CITY GOVERNMENT OF SAN PEDRO
                    </div>

                    <div class="province">
                        LAGUNA
                    </div>

                </div>

            </div>

        </div>

    </div>


    <nav class="navbar navbar-expand-lg main-navbar">

        <div class="container">

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div
                class="collapse navbar-collapse"
                id="mainNavigation"
            >

                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="bi bi-house-door"></i>
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            City Officials
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Departments
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Services
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news.index') }}">
                            News & Updates
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('announcements.index') }}">
                            Announcements
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Contact
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>

</header>