@extends('layouts.app')

@section('title', $bidding->title . ' | City Government of San Pedro, Laguna')

@section('content')

<section class="page-header">

    <div class="container">

       <span class="bidding-type-badge mb-2">
    {{ $bidding->type }}
</span>

        <h1>{{ $bidding->title }}</h1>

        @if($bidding->reference_no)
            <p class="mb-0">
                Reference No.: {{ $bidding->reference_no }}
            </p>
        @endif

    </div>

</section>


<section class="bidding-detail-section">

    <div class="container">

        <div class="row g-4">

            {{-- =====================================================
                 LEFT COLUMN
                 ===================================================== --}}

            <div class="col-lg-8">

                {{-- Bidding Information --}}
                <div class="content-card">

                    <h2 class="h4 mb-4">
                        Bidding Information
                    </h2>

                    @if($bidding->description)

                        <div class="mb-4">
                            {!! nl2br(e($bidding->description)) !!}
                        </div>

                    @endif


                    <div class="row g-3">

                        @if($bidding->reference_no)

                            <div class="col-md-6">

                                <strong>
                                    Reference No.
                                </strong>

                                <p>
                                    {{ $bidding->reference_no }}
                                </p>

                            </div>

                        @endif


                        @if($bidding->procurement_mode)

                            <div class="col-md-6">

                                <strong>
                                    Procurement Mode
                                </strong>

                                <p>
                                    {{ $bidding->procurement_mode }}
                                </p>

                            </div>

                        @endif


                        @if($bidding->abc)

                            <div class="col-md-6">

                                <strong>
                                    Approved Budget for the Contract
                                </strong>

                                <p>
                                    ₱{{ number_format($bidding->abc, 2) }}
                                </p>

                            </div>

                        @endif


                        @if($bidding->posting_date)

                            <div class="col-md-6">

                                <strong>
                                    Posting Date
                                </strong>

                                <p>
                                    {{ $bidding->posting_date->format('F d, Y') }}
                                </p>

                            </div>

                        @endif


                       @if($bidding->submission_deadline)
    <div class="col-md-6">

        <strong>Submission Deadline</strong>

        <p class="mb-1">
            {{ $bidding->submission_deadline->format('F d, Y h:i A') }}
        </p>

        @if($bidding->submission_deadline->isPast())

            <span class="bidding-status-badge bidding-status-closed">
                Deadline Passed
            </span>

        @elseif($bidding->submission_deadline->lte(now()->addDays(3)))

            <span class="bidding-status-badge bidding-status-soon">
                Closing Soon
            </span>

        @else

            <span class="bidding-status-badge bidding-status-open">
                Open
            </span>

        @endif

    </div>
@endif


                        @if($bidding->opening_date)

                            <div class="col-md-6">

                                <strong>
                                    Opening Date
                                </strong>

                                <p>
                                    {{ $bidding->opening_date->format('F d, Y h:i A') }}
                                </p>

                            </div>

                        @endif


                        @if($bidding->venue)

                            <div class="col-12">

                                <strong>
                                    Venue
                                </strong>

                                <p>
                                    {{ $bidding->venue }}
                                </p>

                            </div>

                        @endif

                    </div>

                </div>


                {{-- =================================================
                     BIDDING DOCUMENTS
                     ================================================= --}}

                <div class="content-card mt-4">

                    <h2 class="h4 mb-4">
                        Bidding Documents
                    </h2>


                    @if($bidding->documents->count())

                        <div class="list-group">

                            @foreach($bidding->documents as $document)

                                <div class="list-group-item">

                                    <div class="d-flex justify-content-between align-items-center gap-3">

                                        <div class="flex-grow-1">

                                            <div class="fw-semibold">

                                                <i class="bi bi-file-earmark-text me-1"></i>

                                                {{ $document->title }}

                                            </div>


                                            <small class="text-muted">

                                                @if($document->document_type)

                                                    {{ $document->document_type }}

                                                @endif


                                                @if($document->document_type && $document->file_name)
                                                    ·
                                                @endif


                                                {{ $document->file_name }}


                                                @if($document->file_size)

                                                    ·

                                                    {{ number_format($document->file_size / 1024, 1) }}
                                                    KB

                                                @endif

                                            </small>

                                        </div>


                                        <a href="{{ asset('storage/' . $document->file_path) }}"
                                           target="_blank"
                                           class="btn btn-outline-success btn-sm flex-shrink-0">

                                            <i class="bi bi-download"></i>

                                            View / Download

                                        </a>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <p class="text-muted mb-0">

                            No bidding documents have been posted yet.

                        </p>

                    @endif

                </div>

            </div>


            {{-- =====================================================
                 RIGHT COLUMN
                 ===================================================== --}}

            <div class="col-lg-4">

                {{-- Contact Information --}}
                <div class="content-card">

                    <h2 class="h5 mb-4">
                        Contact Information
                    </h2>


                    @if($bidding->contact_person)

                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Contact Person
                            </small>

                            <strong>
                                {{ $bidding->contact_person }}
                            </strong>

                        </div>

                    @endif


                    @if($bidding->contact_email)

                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Email
                            </small>

                            <a href="mailto:{{ $bidding->contact_email }}">
                                {{ $bidding->contact_email }}
                            </a>

                        </div>

                    @endif


                    @if($bidding->contact_phone)

                        <div class="mb-3">

                            <small class="text-muted d-block">
                                Telephone
                            </small>

                            <strong>
                                {{ $bidding->contact_phone }}
                            </strong>

                        </div>

                    @endif


                    @if(
                        !$bidding->contact_person &&
                        !$bidding->contact_email &&
                        !$bidding->contact_phone
                    )

                        <p class="text-muted mb-0">

                            Contact information will be provided
                            with the bidding notice.

                        </p>

                    @endif

                </div>


                {{-- Back Button --}}
                <a href="{{ route('biddings.index') }}"
                   class="btn btn-outline-success mt-3">

                    <i class="bi bi-arrow-left"></i>

                    Back to Biddings

                </a>

            </div>

        </div>

    </div>

</section>

@endsection