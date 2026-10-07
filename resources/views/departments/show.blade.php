@extends('layouts.app')

@section('title', $department['name'] . ' | City Government of San Pedro, Laguna')

@section('content')

{{-- Page Header --}}
<section class="page-header departments-page-header">
    <div class="container">
        <div class="page-header-content">

            <span class="page-header-label">
                CITY GOVERNMENT
            </span>

            <h1>{{ $department['name'] }}</h1>

            <p>
                {{ $department['acronym'] }}
            </p>

        </div>
    </div>
</section>

{{-- Back to Departments --}}
<div class="department-detail-back">
    <div class="container">
        <a href="{{ route('departments') }}">
            <i class="bi bi-arrow-left"></i>
            Back to Departments
        </a>
    </div>
</div>


{{-- Department Overview --}}
<section class="department-detail-section py-5">

    <div class="container">

        <div class="row g-5">

            {{-- Main Content --}}
            <div class="col-lg-8">

                <div class="department-detail-card">

                    <div class="department-detail-icon">
                        <i class="bi {{ $department['icon'] }}"></i>
                    </div>

                    <span class="section-label">
                        {{ $department['acronym'] }}
                    </span>

                    <h2>
                        {{ $department['name'] }}
                    </h2>

                    <p class="department-detail-description">
                        {{ $department['description'] }}
                    </p>

                </div>


                {{-- Services --}}
                <div class="department-services-card mt-4">

                    <div class="department-detail-heading">

                        <div class="department-heading-icon">
                            <i class="bi bi-list-check"></i>
                        </div>

                        <div>
                            <span class="section-label">
                                SERVICES
                            </span>

                            <h3>
                                Services Offered
                            </h3>
                        </div>

                    </div>

                    <p>
                        Information about the services provided by
                        this office will be published here.
                    </p>

                    <div class="service-placeholder">

    <i class="bi bi-info-circle"></i>

    <span>
        Please contact this office for information on its programs and services.
    </span>

</div>

                </div>

            </div>


            {{-- Sidebar --}}
            <div class="col-lg-4">

                <div class="department-contact-card">

                    <div class="department-contact-heading">

                        <div class="department-heading-icon">
                            <i class="bi bi-telephone"></i>
                        </div>

                        <h3>
                            Office Information
                        </h3>

                    </div>


                    @if(!empty($department['head']))
    <div class="contact-detail">

        <i class="bi bi-person"></i>

        <div>

            <span>
                Office Head
            </span>

            <strong>
                {{ $department['head'] }}
            </strong>

        </div>

    </div>
@endif


                   @if(!empty($department['address']))
    <div class="contact-detail">

        <i class="bi bi-geo-alt"></i>

        <div>

            <span>
                Office Address
            </span>

            <strong>
                {{ $department['address'] }}
            </strong>

        </div>

    </div>
@endif


                    @if(!empty($department['phone']))
    <div class="contact-detail">

        <i class="bi bi-telephone"></i>

        <div>

            <span>
                Telephone
            </span>

            <strong>
                {{ $department['phone'] }}
            </strong>

        </div>

    </div>
@endif


                    @if(!empty($department['hours']))
    <div class="contact-detail">

        <i class="bi bi-clock"></i>

        <div>

            <span>
                Office Hours
            </span>

            <strong>
                {{ $department['hours'] }}
            </strong>

        </div>

    </div>
@endif

@if(!empty($department['email']))
    <div class="contact-detail">

        <i class="bi bi-envelope"></i>

        <div>

            <span>
                Email
            </span>

            <strong>
                <a href="mailto:{{ $department['email'] }}">
                    {{ $department['email'] }}
                </a>
            </strong>

        </div>

    </div>
@endif
 </div>

             
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
                    Need More Information?
                </h2>

                <p>
                    Explore other departments and offices of the
                    City Government of San Pedro.
                </p>

            </div>

            <div class="about-cta-buttons">

                <a href="{{ route('departments') }}"
                   class="btn btn-light">

                    <i class="bi bi-building"></i>
                    All Departments

                </a>

                <a href="{{ route('news.index') }}"
                   class="btn btn-outline-success">

                    <i class="bi bi-newspaper"></i>
                    News & Updates

                </a>

            </div>

        </div>

    </div>

</section>

@endsection