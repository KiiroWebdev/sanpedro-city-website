@extends('layouts.app')

@section('title', $service['name'] . ' | City Government of San Pedro')

@section('content')

<section class="page-header">
    <div class="container">

        <span class="page-header-label">
            {{ $category['name'] }}
        </span>

        <h1>
            {{ $service['name'] }}
        </h1>

        <p>
            {{ $service['description'] }}
        </p>

    </div>
</section>


<section class="service-information-page py-5">

    <div class="container">

    {{-- Back Link --}}
<div class="mb-4">

    <a href="{{ route('services.show', $categorySlug) }}"
       class="back-link">

        <i class="bi bi-arrow-left"></i>
        Back to {{ $category['name'] }}

    </a>

</div>

        <div class="row g-4">

            {{-- =========================================================
                 MAIN INFORMATION
            ========================================================== --}}
            <div class="col-lg-8">

                <div class="service-information-card">

                    <h2>
                        Service Information
                    </h2>

                    <p class="text-muted">
                        {{ $service['description'] }}
                    </p>


                    {{-- =================================================
                         SOURCE
                    ================================================== --}}
                    @if(isset($service['source']))

                        <div class="service-source-note">

                            <i class="bi bi-info-circle"></i>

                            <div>

                                <strong>Source</strong>

                                <p>
                                    {{ $service['source'] }}
                                </p>

                                @if(isset($service['last_updated']))

                                    <small>
                                        Reference:
                                        {{ $service['last_updated'] }}
                                    </small>

                                @endif

                                <small class="d-block mt-1">
                                    Please verify current requirements, fees,
                                    and procedures with the responsible office
                                    before processing your transaction.
                                </small>

                            </div>

                        </div>

                    @endif


                    {{-- =================================================
                         SERVICE CLASSIFICATION
                    ================================================== --}}
                    @if(isset($service['classification']) || isset($service['transaction_type']))

                        <div class="service-info-section">

                            <h3>
                                <i class="bi bi-info-circle"></i>
                                Service Classification
                            </h3>

                            @if(isset($service['classification']))

                                <p>
                                    <strong>Classification:</strong>
                                    {{ $service['classification'] }}
                                </p>

                            @endif

                            @if(isset($service['transaction_type']))

                                <p>
                                    <strong>Transaction Type:</strong>
                                    {{ $service['transaction_type'] }}
                                </p>

                            @endif

                        </div>

                    @endif


                    {{-- =================================================
                         WHO MAY AVAIL
                    ================================================== --}}
                    @if(isset($service['who_may_avail']))

                        <div class="service-info-section">

                            <h3>
                                <i class="bi bi-person-check"></i>
                                Who May Avail
                            </h3>

                            <p>
                                {{ $service['who_may_avail'] }}
                            </p>

                        </div>

                    @endif


                    {{-- =================================================
                         REQUIREMENTS
                    ================================================== --}}
                    @if(!empty($service['requirements']))

                        <div class="service-info-section">

                            <h3>
                                <i class="bi bi-list-check"></i>
                                Requirements
                            </h3>

                            <ul class="service-requirements">

                                @foreach($service['requirements'] as $requirement)

                                    <li>
                                        <i class="bi bi-check2"></i>
                                        <span>
                                            {{ $requirement }}
                                        </span>
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    {{-- =================================================
                         PROCEDURE
                    ================================================== --}}
                    @if(!empty($service['procedure']))

                        <div class="service-info-section">

                            <h3>
                                <i class="bi bi-diagram-3"></i>
                                Procedure
                            </h3>

                            <div class="service-procedure-table">

                                @foreach($service['procedure'] as $index => $step)

                                    <div class="procedure-row">

                                        <div class="procedure-number">
                                            {{ $index + 1 }}
                                        </div>

                                        <div class="procedure-content">

                                            <div class="procedure-column">

                                                <span class="procedure-label">
                                                    Client Step
                                                </span>

                                                <p>
                                                    {{ $step['client_step'] }}
                                                </p>

                                            </div>


                                            <div class="procedure-column">

                                                <span class="procedure-label">
                                                    Agency Action
                                                </span>

                                                <p>
                                                    {{ $step['agency_action'] }}
                                                </p>

                                            </div>


                                            <div class="procedure-meta">

                                                <div>

                                                    <span class="procedure-label">
                                                        Fees
                                                    </span>

                                                    <p>
                                                        {{ $step['fee'] }}
                                                    </p>

                                                </div>


                                                <div>

                                                    <span class="procedure-label">
                                                        Processing Time
                                                    </span>

                                                    <p>
                                                        {{ $step['processing_time'] }}
                                                    </p>

                                                </div>


                                                <div>

                                                    <span class="procedure-label">
                                                        Person Responsible
                                                    </span>

                                                    <p>
                                                        {{ $step['person_responsible'] }}
                                                    </p>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    @endif


                    {{-- =================================================
                         PROCESSING TIME
                    ================================================== --}}
                    @if(isset($service['processing_time']))

                        <div class="service-info-section">

                            <h3>
                                <i class="bi bi-clock"></i>
                                Processing Time
                            </h3>

                            <p>
                                {{ $service['processing_time'] }}
                            </p>

                        </div>

                    @endif


                    {{-- =================================================
                         FEES
                    ================================================== --}}
                    @if(isset($service['fees']))

                        <div class="service-info-section">

                            <h3>
                                <i class="bi bi-cash-stack"></i>
                                Fees
                            </h3>

                            <p>
                                {{ $service['fees'] }}
                            </p>

                        </div>

                    @endif

                </div>

            </div>


            {{-- =========================================================
                 SIDEBAR
            ========================================================== --}}
            <div class="col-lg-4">


                {{-- =================================================
                     RESPONSIBLE OFFICE
                ================================================== --}}
                <div class="service-information-card">

                    <h3>
                        <i class="bi bi-building"></i>
                        Responsible Office
                    </h3>

                    @if(!empty($service['office']))
    <p>
        {{ $service['office'] }}
    </p>
@endif

                </div>


                {{-- =================================================
     CONTACT INFORMATION
================================================== --}}
@if(!empty($service['contact']))
    <div class="service-information-card">

        <h3>
            <i class="bi bi-telephone"></i>
            Contact Information
        </h3>

        <p>
            {{ $service['contact'] }}
        </p>

    </div>
@endif
                </div>


                {{-- =================================================
                     FORMS & DOWNLOADS
                ================================================== --}}
         <div class="service-information-card">
    <h3>
        <i class="bi bi-file-earmark-arrow-down"></i>
        Forms & Downloads
    </h3>

    @if($serviceDownloads->count())
        <div class="service-download-list">

            @foreach($serviceDownloads as $download)

                <div class="service-download-item">

                    <div class="service-download-icon">
                        <i class="bi bi-file-earmark-pdf"></i>
                    </div>

                    <div class="service-download-content">

                        <h4>
                            {{ $download->title }}
                        </h4>

                        @if($download->description)
                            <p>
                                {{ $download->description }}
                            </p>
                        @endif

                        <div class="service-download-meta">
                            <span>
                                <i class="bi bi-filetype-pdf"></i>
                                PDF Document
                            </span>

                            @if($download->file_size)
                                <span>
                                    <i class="bi bi-hdd"></i>
                                    {{ number_format($download->file_size / 1024 / 1024, 2) }} MB
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="service-download-action">

                        <a
                            href="{{ asset('storage/' . $download->file_path) }}"
                            target="_blank"
                            class="service-download-button"
                        >
                            <i class="bi bi-download"></i>
                            Download
                        </a>

                    </div>

                </div>

            @endforeach

        </div>
    @else
        <div class="service-download-empty">
            <i class="bi bi-file-earmark-x"></i>

            <p>
                No forms are available for this service yet.
            </p>
        </div>
    @endif
</div>

            </div>

        </div>


       

    </div>

</section>

@endsection