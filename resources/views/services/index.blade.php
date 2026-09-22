@extends('layouts.app')

@section('title', 'Government Services | City Government of San Pedro')

@section('content')

<section class="page-header">
    <div class="container">
        <span class="page-header-label">PUBLIC SERVICES</span>
        <h1>Government Services</h1>
        <p>
            Explore the services and assistance provided by the
            City Government of San Pedro.
        </p>
    </div>
</section>

<section class="services-page py-5">
    <div class="container">

        <div class="section-heading text-center mb-5">
            <span class="section-label">SERVICES FOR SAN PEDRENSES</span>
            <h2>How Can We Help You?</h2>
            <p>
                Browse government services by category and find the
                office responsible for each service.
            </p>
        </div>

        <div class="row g-4">

            @foreach($categories as $category)

                <div class="col-md-6 col-lg-4">

                    <div class="service-category-card h-100">

                        <div class="service-category-icon">
                            <i class="bi {{ $category['icon'] }}"></i>
                        </div>

                        <h3>{{ $category['name'] }}</h3>

                        <p>
                            {{ $category['description'] }}
                        </p>

                        <a href="#" class="service-category-link">
                            View Services
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    </div>
</section>

@endsection