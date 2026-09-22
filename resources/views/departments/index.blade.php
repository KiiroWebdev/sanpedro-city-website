@extends('layouts.app')

@section('title', 'Departments & Offices | City Government of San Pedro, Laguna')

@section('content')

<section class="page-header departments-page-header">
    <div class="container">
        <div class="page-header-content">

            <span class="page-header-label">
                CITY GOVERNMENT
            </span>

            <h1>Departments & Offices</h1>

            <p>
                Explore the departments and offices of the
                City Government of San Pedro, Laguna.
            </p>

        </div>
    </div>
</section>


<section class="departments-section py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-label">
                GOVERNMENT DIRECTORY
            </span>

            <h2 class="section-title">
                City Departments & Offices
            </h2>

            <p class="section-description">
                Find the government office responsible for the
                programs and services you need.
            </p>

        </div>


        <div class="row g-4">

            @foreach($departments as $slug => $department)

                <div class="col-md-6 col-lg-4">

                    <div class="department-card">

                        <div class="department-icon">
                            <i class="bi {{ $department['icon'] }}"></i>
                        </div>

                        <div class="department-content">

                            <span class="department-acronym">
                                {{ $department['acronym'] }}
                            </span>

                            <h3>
                                {{ $department['name'] }}
                            </h3>

                            <p>
                                {{ $department['description'] }}
                            </p>

                            <a href="{{ route('departments.show', \Illuminate\Support\Str::slug($department['name'])) }}"
   class="department-link">

    View Office
    <i class="bi bi-arrow-right"></i>

</a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


<section class="departments-info py-5">

    <div class="container">

        <div class="departments-info-box">

            <div class="departments-info-icon">
                <i class="bi bi-info-circle"></i>
            </div>

            <div>

                <h3>
                    Looking for a specific service?
                </h3>

                <p class="mb-0">
                    Browse the city government's departments and
                    offices to find the appropriate office for
                    your concern.
                </p>

            </div>

        </div>

    </div>

</section>


<section class="about-cta py-5">

    <div class="container">

        <div class="about-cta-content">

            <div>

                <span class="section-label">
                    CITY GOVERNMENT
                </span>

                <h2>
                    Access Government Services
                </h2>

                <p>
                    Find information about city programs,
                    services, announcements, and public
                    information.
                </p>

            </div>

            <div class="about-cta-buttons">

                <a href="#"
                   class="btn btn-light">

                    <i class="bi bi-grid"></i>
                    Government Services

                </a>

                <a href="#"
   class="btn btn-outline-success">

    <i class="bi bi-telephone"></i>
    Contact Us

</a>

            </div>

        </div>

    </div>

</section>

@endsection