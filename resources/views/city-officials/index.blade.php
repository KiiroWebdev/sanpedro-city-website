@extends('layouts.app')

@section('title', 'City Officials | City Government of San Pedro, Laguna')

@section('content')

{{-- Page Header --}}
<section class="page-header officials-page-header">
    <div class="container">
        <div class="page-header-content">

            <span class="page-header-label">
                CITY GOVERNMENT
            </span>

            <h1>City Officials</h1>

            <p>
                Meet the elected officials serving the City of
                San Pedro, Laguna.
            </p>

        </div>
    </div>
</section>


{{-- Mayor and Vice Mayor --}}
<section class="officials-leadership py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-label">
                CITY LEADERSHIP
            </span>

            <h2 class="section-title">
                Office of the City Mayor
            </h2>

            <p class="section-description">
                The city's elected executive leadership.
            </p>

        </div>


        <div class="row justify-content-center g-4">

            @foreach($officials as $official)

                <div class="col-md-6 col-lg-5">

                    <div class="official-feature-card">

                        <div class="official-photo-placeholder">

                            <i class="bi {{ $official['icon'] }}"></i>

                        </div>

                        <div class="official-feature-content">

                            <span class="official-position">
                                {{ $official['position'] }}
                            </span>

                            <h3>
                                {{ $official['name'] }}
                            </h3>

                            <div class="official-divider"></div>

                            <p>
                                City Government of San Pedro, Laguna
                            </p>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- City Council --}}
<section class="council-section py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-label">
                LEGISLATIVE BODY
            </span>

            <h2 class="section-title">
                Sangguniang Panlungsod
            </h2>

            <p class="section-description">
                Members of the City Council of San Pedro.
            </p>

        </div>


        <div class="row g-4">

            @foreach($councilors as $index => $councilor)

                <div class="col-md-6 col-lg-4">

                    <div class="councilor-card">

                        <div class="councilor-number">
                            {{ sprintf('%02d', $index + 1) }}
                        </div>

                        <div class="councilor-icon">
                            <i class="bi bi-person"></i>
                        </div>

                        <div class="councilor-info">

                            <span>
                                Sangguniang Panlungsod
                            </span>

                            <h3>
                                {{ $councilor }}
                            </h3>

                            <p>
                                City Councilor
                            </p>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- Government Leadership Note --}}
<section class="officials-info-section py-5">

    <div class="container">

        <div class="officials-info-box">

            <div class="officials-info-icon">
                <i class="bi bi-info-circle"></i>
            </div>

            <div>

                <h3>
                    City Government Leadership
                </h3>

                <p>
                    The City Mayor serves as the chief executive of
                    the City Government, while the City Vice Mayor
                    presides over the Sangguniang Panlungsod.
                </p>

                <p class="mb-0">
                    Official biographies, photographs, office
                    information, and contact details may be added
                    to this page as the website's content management
                    system is expanded.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- CTA --}}
<section class="about-cta py-5">

    <div class="container">

        <div class="about-cta-content">

            <div>

                <span class="section-label">
                    CITY GOVERNMENT
                </span>

                <h2>
                    Stay Connected with San Pedro
                </h2>

                <p>
                    Get the latest news, announcements, and
                    information from the City Government.
                </p>

            </div>

            <div class="about-cta-buttons">

                <a href="{{ route('news.index') }}"
                   class="btn btn-light">

                    <i class="bi bi-newspaper"></i>
                    News & Updates

                </a>

                <a href="{{ route('announcements.index') }}"
   class="btn btn-outline-success">

    <i class="bi bi-megaphone"></i>
    Announcements

</a>

            </div>

        </div>

    </div>

</section>

@endsection