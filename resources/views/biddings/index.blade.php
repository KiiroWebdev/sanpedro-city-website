@extends('layouts.app')

@section('title', 'Biddings | City Government of San Pedro, Laguna')

@section('content')

{{-- Page Header --}}
<section class="page-header">
    <div class="container">

        <span class="page-header-label">
            PROCUREMENT
        </span>

        <h1>Biddings</h1>

        <p>
            Procurement opportunities and bidding notices of the City Government of San Pedro, Laguna.
        </p>

    </div>
</section>


{{-- Biddings --}}
<section class="bidding-list-section">

    <div class="container">

        @if($biddings->count())

            <div class="bidding-list-header">

                <div>
                    <h2>Procurement Notices</h2>
                    <p>
                        View current bidding opportunities and related procurement information.
                    </p>
                </div>

                <div class="bidding-count">
                    {{ $biddings->count() }}
                    {{ $biddings->count() === 1 ? 'Notice' : 'Notices' }}
                </div>

            </div>


            <div class="bidding-list">

                @foreach($biddings as $bidding)

                    <article class="bidding-card">

                        {{-- Top Row --}}
                        <div class="bidding-card-top">

                            <div>

                                <span class="bidding-type-badge">
                                    {{ $bidding->type }}
                                </span>

                                <h3>
                                    {{ $bidding->title }}
                                </h3>

                                @if($bidding->reference_no)
                                    <p class="bidding-reference">
                                        <i class="bi bi-hash"></i>
                                        Reference No.:
                                        <strong>{{ $bidding->reference_no }}</strong>
                                    </p>
                                @endif

                            </div>

                           @if($bidding->posting_date)
    <div class="bidding-posting-date">

        <small>POSTED</small>

        <strong>
            {{ $bidding->posting_date->format('M d, Y') }}
        </strong>

        @if($bidding->submission_deadline)

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

        @endif

    </div>
@endif

                        </div>


                        {{-- Details --}}
                        <div class="bidding-card-details">

                            @if($bidding->abc)
                                <div class="bidding-detail">

                                    <i class="bi bi-cash-stack"></i>

                                    <div>
                                        <small>
                                            Approved Budget for the Contract
                                        </small>

                                        <strong>
                                            ₱{{ number_format($bidding->abc, 2) }}
                                        </strong>
                                    </div>

                                </div>
                            @endif


                            @if($bidding->submission_deadline)
                                <div class="bidding-detail bidding-deadline">

                                    <i class="bi bi-calendar-event"></i>

                                    <div>
                                        <small>
                                            Submission Deadline
                                        </small>

                                        <strong>
                                            {{ $bidding->submission_deadline->format('M d, Y h:i A') }}
                                        </strong>
                                    </div>

                                </div>
                            @endif

                        </div>


                        {{-- Footer --}}
                        <div class="bidding-card-footer">

                            <span>
                                <i class="bi bi-file-earmark-text"></i>
                                Procurement Notice
                            </span>

                            <a
                                href="{{ route('biddings.show', $bidding->slug) }}"
                                class="btn btn-outline-success"
                            >
                                View Bidding
                                <i class="bi bi-arrow-right"></i>
                            </a>

                        </div>

                    </article>

                @endforeach

            </div>

        @else

            <div class="bidding-empty-state">

                <div class="bidding-empty-icon">
                    <i class="bi bi-file-earmark-text"></i>
                </div>

                <h2>No Biddings Available</h2>

                <p>
                    There are currently no published bidding notices.
                    Please check again later for new procurement opportunities.
                </p>

            </div>

        @endif

    </div>

</section>

@endsection