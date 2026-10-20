@extends('layouts.app')

@section('title', $job->title . ' - Job Opportunities')

@section('content')

{{-- Hero --}}
<section class="job-opportunities-page-header">

    <div class="container">

        <div class="job-opportunities-page-header-content">

            <span class="page-header-label">
                <i class="bi bi-briefcase"></i>
                CAREER OPPORTUNITY
            </span>

            <h1>
                {{ $job->title }}
            </h1>

            @if($job->office)
                <p>
                    {{ $job->office }}
                </p>
            @endif

        </div>

    </div>

</section>


{{-- Job Details --}}
<section class="job-detail-section">

    <div class="container">

        {{-- Back Link --}}
        <div class="job-detail-back">

            <a href="{{ route('job-opportunities.index') }}">
                <i class="bi bi-arrow-left"></i>
                Back to Job Opportunities
            </a>

        </div>


        <div class="row g-4">

            {{-- Main Content --}}
            <div class="col-lg-8">

                <article class="job-detail-card">

                    {{-- Job Badges --}}
                    <div class="job-detail-badges">

                        @if($job->employment_type)
                            <span class="job-badge job-badge-primary">
                                <i class="bi bi-briefcase"></i>
                                {{ $job->employment_type }}
                            </span>
                        @endif

                        @if($job->salary_grade)
                            <span class="job-badge">
                                <i class="bi bi-award"></i>
                                Salary Grade: {{ $job->salary_grade }}
                            </span>
                        @endif

                    </div>


                    {{-- Qualifications --}}
                    @if($job->qualification)

                        <div class="job-detail-block">

                            <h2>
                                <i class="bi bi-person-check"></i>
                                Qualifications
                            </h2>

                            <div class="job-detail-content">
                                {!! nl2br(e($job->qualification)) !!}
                            </div>

                        </div>

                    @endif


                    {{-- Duties --}}
                    @if($job->duties)

                        <div class="job-detail-block">

                            <h2>
                                <i class="bi bi-list-check"></i>
                                Duties and Responsibilities
                            </h2>

                            <div class="job-detail-content">
                                {!! nl2br(e($job->duties)) !!}
                            </div>

                        </div>

                    @endif


                    {{-- Requirements --}}
                    @if($job->application_requirements)

                        <div class="job-detail-block">

                            <h2>
                                <i class="bi bi-file-earmark-text"></i>
                                Application Requirements
                            </h2>

                            <div class="job-detail-content">
                                {!! nl2br(e($job->application_requirements)) !!}
                            </div>

                        </div>

                    @endif


                    {{-- How to Apply --}}
                    @if($job->how_to_apply)

                        <div class="job-detail-block job-detail-block-last">

                            <h2>
                                <i class="bi bi-send"></i>
                                How to Apply
                            </h2>

                            <div class="job-detail-content">
                                {!! nl2br(e($job->how_to_apply)) !!}
                            </div>

                        </div>

                    @endif

                </article>

            </div>


            {{-- Sidebar --}}
            <div class="col-lg-4">

                <aside class="job-info-card">

                    <div class="job-info-header">

                        <i class="bi bi-info-circle"></i>

                        <h2>
                            Opportunity Information
                        </h2>

                    </div>


                    @if($job->office)

                        <div class="job-info-item">

                            <span>
                                Office / Department
                            </span>

                            <strong>
                                {{ $job->office }}
                            </strong>

                        </div>

                    @endif


                    @if($job->employment_type)

                        <div class="job-info-item">

                            <span>
                                Employment Type
                            </span>

                            <strong>
                                {{ $job->employment_type }}
                            </strong>

                        </div>

                    @endif


                    @if($job->salary_grade)

                        <div class="job-info-item">

                            <span>
                                Salary Grade
                            </span>

                            <strong>
                                {{ $job->salary_grade }}
                            </strong>

                        </div>

                    @endif


                    @if($job->posting_date)

                        <div class="job-info-item">

                            <span>
                                Posting Date
                            </span>

                            <strong>
                                {{ $job->posting_date->format('F d, Y') }}
                            </strong>

                        </div>

                    @endif


                    @if($job->application_deadline)

                        <div class="job-info-item">

                            <span>
                                Application Deadline
                            </span>

                            <strong>
                                {{ $job->application_deadline->format('F d, Y') }}
                            </strong>

                        </div>

                    @endif


                    @if($job->application_deadline)

                        <div class="job-deadline-note">

                            <i class="bi bi-calendar-check"></i>

                            <div>

                                <strong>
                                    Application Deadline
                                </strong>

                                <span>
                                    {{ $job->application_deadline->format('F d, Y') }}
                                </span>

                            </div>

                        </div>

                    @endif

                </aside>

            </div>

        </div>


        {{-- Bottom Back Link --}}
        <div class="job-detail-footer">

            <a href="{{ route('job-opportunities.index') }}"
               class="btn btn-outline-success">

                <i class="bi bi-arrow-left me-1"></i>
                Back to Job Opportunities

            </a>

        </div>

    </div>

</section>

@endsection