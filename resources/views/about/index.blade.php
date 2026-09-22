@extends('layouts.app')

@section('title', 'About San Pedro | City Government of San Pedro, Laguna')

@section('content')

{{-- Page Header --}}
<section class="page-header">
    <div class="container">
        <div class="page-header-content">
            <span class="page-header-label">CITY GOVERNMENT</span>
            <h1>About San Pedro</h1>
            <p>
                Learn more about the City of San Pedro, Laguna,
                its people, history, and local government.
            </p>
        </div>
    </div>
</section>


{{-- Introduction --}}
<section class="about-intro py-5">
    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <span class="section-label">
                    ABOUT THE CITY
                </span>

                <h2 class="section-title">
                    Welcome to the City of San Pedro
                </h2>

                <p class="about-lead">
                    The City Government of San Pedro is committed to
                    serving the San Pedrense community through responsive,
                    accessible, and people-centered local governance.
                </p>

                <p>
                    This official website provides information about
                    the city government, its programs and services,
                    announcements, news, and other information
                    relevant to the residents of San Pedro.
                </p>

            </div>

            <div class="col-lg-6">

                <div class="about-image-wrapper">

                    <img
                        src="{{ asset('images/city-hall.jpg') }}"
                        alt="San Pedro City Hall"
                        class="about-city-image"
                    >

                    <div class="about-image-caption">
                        <i class="bi bi-building"></i>
                        <span>City Government of San Pedro, Laguna</span>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>


{{-- City Profile --}}
<section class="city-profile-section py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-label">
                CITY PROFILE
            </span>

            <h2 class="section-title">
                San Pedro at a Glance
            </h2>

            <p class="section-description">
                Key information about the City of San Pedro.
            </p>

        </div>


        <div class="row g-4">

            <div class="col-md-6 col-lg-3">

                <div class="profile-card">

                    <div class="profile-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>

                    <h4>Location</h4>

                    <p>
                        San Pedro, Laguna, Philippines
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="profile-card">

                    <div class="profile-icon">
                        <i class="bi bi-map"></i>
                    </div>

                    <h4>Province</h4>

                    <p>
                        Laguna
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="profile-card">

                    <div class="profile-icon">
                        <i class="bi bi-people"></i>
                    </div>

                    <h4>Population</h4>

                    <p>
                        Official city data
                    </p>

                </div>

            </div>


            <div class="col-md-6 col-lg-3">

                <div class="profile-card">

                    <div class="profile-icon">
                        <i class="bi bi-buildings"></i>
                    </div>

                    <h4>Barangays</h4>

                    <p>
                        Official city data
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- History --}}
<section class="about-history py-5">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-5">

                <div class="history-icon">
                    <i class="bi bi-clock-history"></i>
                </div>

                <span class="section-label">
                    OUR HISTORY
                </span>

                <h2 class="section-title">
                    History of San Pedro
                </h2>

            </div>


            <div class="col-lg-7">

                <p>
                    San Pedro has a rich history and continues to
                    develop as an important community in Laguna.
                </p>

                <p>
                    The historical background of the city, including
                    important milestones and developments, will be
                    presented here using official and verified
                    information.
                </p>

                <a href="#"
                   class="btn btn-outline-success">
                    <i class="bi bi-arrow-right"></i>
                    Read More
                </a>

            </div>

        </div>

    </div>

</section>


{{-- Mission and Vision --}}
<section class="mission-vision-section py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-label">
                OUR DIRECTION
            </span>

            <h2 class="section-title">
                Mission & Vision
            </h2>

        </div>


        <div class="row g-4">

            <div class="col-lg-6">

                <div class="mission-card">

                    <div class="mission-icon">
                        <i class="bi bi-bullseye"></i>
                    </div>

                    <h3>Mission</h3>

                    <p>
                        Official mission statement of the
                        City Government of San Pedro.
                    </p>

                </div>

            </div>


            <div class="col-lg-6">

                <div class="mission-card">

                    <div class="mission-icon">
                        <i class="bi bi-eye"></i>
                    </div>

                    <h3>Vision</h3>

                    <p>
                        Official vision statement of the
                        City Government of San Pedro.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- Call to Action --}}
<section class="about-cta py-5">

    <div class="container">

        <div class="about-cta-content">

            <div>

                <span class="section-label">
                    CITY GOVERNMENT
                </span>

                <h2>
                    Serving the San Pedrense Community
                </h2>

                <p>
                    Explore the programs, services, announcements,
                    and information provided by the City Government
                    of San Pedro.
                </p>

            </div>

            <div class="about-cta-buttons">

                <a href="{{ route('news.index') }}"
                   class="btn btn-light">

                    <i class="bi bi-newspaper"></i>
                    News & Updates

                </a>

                <a href="{{ route('announcements.index') }}"
                   class="btn btn-outline-light">

                    <i class="bi bi-megaphone"></i>
                    Announcements

                </a>

            </div>

        </div>

    </div>

</section>

@endsection