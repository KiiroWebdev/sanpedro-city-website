@extends('layouts.app')

@section('title', 'Downloads | City Government of San Pedro')

@section('content')

<section class="page-header">
    <div class="container">

        <span class="page-header-label">
            PUBLIC DOCUMENTS
        </span>

        <h1>Downloads</h1>

        <p>
            Access forms, documents, and other downloadable resources
            from the City Government of San Pedro.
        </p>

    </div>
</section>

<section class="downloads-page py-5">

    <div class="container">

        <div class="section-heading text-center mb-5">

            <span class="section-label">
                CITY GOVERNMENT RESOURCES
            </span>

            <h2>Forms & Documents</h2>

            <p>
                Access government forms, documents, and other resources
                for your transactions and information needs.
            </p>

        </div>


        <div class="row g-4 justify-content-center">

    @foreach($categories as $slug => $category)

        <div class="col-md-6 col-lg-4">

            <div class="download-category-card h-100">

                <div class="download-category-icon">
                    <i class="bi {{ $category['icon'] }}"></i>
                </div>

                <h3>
                    {{ $category['name'] }}
                </h3>

                <p>
                    {{ $category['description'] }}
                </p>

                <a
                    href="{{ route('downloads.show', $slug) }}"
                    class="download-category-link"
                >
                    View Documents
                    <i class="bi bi-arrow-right"></i>
                </a>

            </div>

        </div>

    @endforeach

</div>
            </div>

        </div>

    </div>

</section>

@endsection