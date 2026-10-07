@extends('layouts.app')

@section('title', $category['name'] . ' | City Government of San Pedro')

@section('content')

<section class="page-header">
    <div class="container">

        <span class="page-header-label">
            GOVERNMENT SERVICES
        </span>

        <h1>
            {{ $category['name'] }}
        </h1>

        <p>
            {{ $category['description'] }}
        </p>

    </div>
</section>
</div>
{{-- Back to Government Services --}}
<div class="service-detail-back">
    <div class="container">
        <a href="{{ route('services.index') }}">
            <i class="bi bi-arrow-left"></i>
            Back to Government Services
        </a>
    </div>
</div>


<section class="service-detail-page py-5">

    <div class="container">

        <div class="row g-4">

            {{-- Main Content --}}
            <div class="col-lg-8">

                <div class="service-detail-card">

                    <div class="service-detail-icon">
                        <i class="bi {{ $category['icon'] }}"></i>
                    </div>

                    <h2>
                        {{ $category['name'] }}
                    </h2>

                    <p class="service-detail-intro">
                        {{ $category['description'] }}
                    </p>

                    <hr>

                    <h3>
    Available Services
</h3>

<div class="row g-3">

    @foreach($category['services'] as $service)

        <div class="col-12">

            <div class="service-item-card">

                <div class="service-item-icon">
                    <i class="bi bi-file-earmark-text"></i>
                </div>

                <div class="service-item-content">

                    <h4>
                        {{ $service['name'] }}
                    </h4>

                    <p>
                        {{ $service['description'] }}
                    </p>

                    <a href="{{ route('services.service', [
    'categorySlug' => $categorySlug,
    'serviceSlug' => $service['slug']
]) }}"
   class="service-item-link">

    View Service Details
    <i class="bi bi-arrow-right"></i>

</a>

                </div>

            </div>

        </div>

    @endforeach

</div>
                </div>

            </div>


            {{-- Sidebar --}}
<div class="col-lg-4">

    {{-- Responsible Office --}}
    <div class="service-info-card">

        <h4>
            <i class="bi bi-building"></i>
            Responsible Office
        </h4>

       @if(!empty($category['office']))
    <p>
        {{ $category['office'] }}
    </p>
@endif

    </div>


   {{-- Contact Information --}}
@if(!empty($category['contact']))
    <div class="service-info-card">

        <h4>
            <i class="bi bi-telephone"></i>
            Contact Information
        </h4>

        <p>
            {{ $category['contact']['address'] }}
        </p>

        <p class="mb-1">
            <i class="bi bi-telephone me-1"></i>
            {{ $category['contact']['phone'] }}
        </p>

        <p class="mb-0">
            <i class="bi bi-envelope me-1"></i>
            <a href="mailto:{{ $category['contact']['email'] }}">
                {{ $category['contact']['email'] }}
            </a>
        </p>

    </div>
@endif


   {{-- Office Hours --}}
@if(!empty($category['hours']))
    <div class="service-info-card">

        <h4>
            <i class="bi bi-clock"></i>
            Office Hours
        </h4>

        <p>
            {{ $category['hours'] }}
        </p>

    </div>
@endif

</div>


               


       

    </div>

</section>

@endsection