@extends('layouts.app')

@section('title', $category['name'] . ' | City Government of San Pedro')

@section('content')

<section class="page-header">

    <div class="container">

        <span class="page-header-label">
            PUBLIC DOCUMENTS
        </span>

        <h1>{{ $category['name'] }}</h1>

        <p>
            {{ $category['description'] }}
        </p>

    </div>

</section>


<section class="downloads-page py-5">

    <div class="container">

        <div class="download-category-header text-center mb-5">

            <div class="download-category-icon">
                <i class="bi {{ $category['icon'] }}"></i>
            </div>

            <span class="section-label">
                DOWNLOADS
            </span>

            <h2>{{ $category['name'] }}</h2>

            <p>
                {{ $category['description'] }}
            </p>

        </div>


        @if($documents->isEmpty())

    <div class="download-empty-state">

        <div class="download-empty-icon">
            <i class="bi bi-file-earmark-x"></i>
        </div>

        <h3>No Documents Available Yet</h3>

        <p>
            There are currently no downloadable documents
            available in this category.
        </p>

    </div>

@else

    <div class="download-document-list">

        @foreach($documents as $document)

            <div class="download-document-card">

                <div class="download-document-icon">
                    <i class="bi bi-file-earmark-pdf"></i>
                </div>

                <div class="download-document-content">

                    <h3>
                        {{ $document->title }}
                    </h3>

                    @if($document->description)

                        <p>
                            {{ $document->description }}
                        </p>

                    @endif

                    <div class="download-document-meta">

                        @if($document->file_size)

                            <span>
                                <i class="bi bi-hdd"></i>
                                {{ number_format($document->file_size / 1024 / 1024, 2) }} MB
                            </span>

                        @endif

                        @if($document->published_at)

                            <span>
                                <i class="bi bi-calendar3"></i>
                                {{ $document->published_at->format('F d, Y') }}
                            </span>

                        @endif

                    </div>

                </div>

                <div class="download-document-action">

                    <a
                        href="{{ asset('storage/' . $document->file_path) }}"
                        class="download-button"
                        target="_blank"
                    >
                        <i class="bi bi-download"></i>
                        Download
                    </a>

                </div>

            </div>

        @endforeach

    </div>

@endif


<div class="text-center mt-5">

    <a
        href="{{ route('downloads') }}"
        class="download-back-link"
    >
        <i class="bi bi-arrow-left"></i>
        Back to Downloads
    </a>

</div>

    </div>

</section>

@endsection