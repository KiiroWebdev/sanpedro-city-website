
<header>
    <!-- TOP HEADER -->
    <div class="top-header">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">

                <!-- CITY LOGO AND GOVERNMENT TITLE -->
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

                <!-- PHILIPPINE STANDARD TIME -->
                <div class="pst-clock">
                    <div class="pst-label">
                        Philippine Standard Time
                    </div>
                    <div id="pst-datetime">
                        Loading Philippine time...
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- NAVIGATION MENU -->
    <nav class="navbar navbar-expand-lg main-navbar">
        <div class="container">

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavigation"
                aria-controls="mainNavigation"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavigation">
                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="bi bi-house-door"></i> Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('city-officials') }}">
                            City Officials
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('departments') }}">
                            Departments
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services.index') }}">
                            Services
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('job-opportunities.index') }}">
                            Job Opportunities
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news.index') }}">
                            News &amp; Updates
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('announcements.index') }}">
                            Announcements
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('biddings.index') }}">
                            Biddings
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">
                            Contact
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>
