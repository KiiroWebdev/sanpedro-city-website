@extends('layouts.app')

@section('title', 'Job Opportunities - City Government of San Pedro')

@section('content')

<section class="job-opportunities-page-header">
    <div class="container">

        <div class="departments-page-header-content">

            <span class="page-header-label">
                <i class="bi bi-briefcase"></i>
                CAREER OPPORTUNITIES
            </span>

            <h1>
                Job Opportunities
            </h1>

            <p>
                Explore current employment opportunities with the
                City Government of San Pedro.
            </p>

        </div>

    </div>

</section>


<section class="content-section">
    <div class="container">

        <div class="job-opportunities-heading">

    <span class="section-label">
        <i class="bi bi-briefcase"></i>
        CURRENT OPPORTUNITIES
    </span>

    <h2>Available Positions</h2>

    <p>
        View current vacancies and application information
        from the City Government of San Pedro.
    </p>

</div>


        @if($jobs->count())

            <div class="row g-4">

                @foreach($jobs as $job)

                    <div class="col-lg-6">

                        <article class="job-opportunity-card">
    <div class="job-card-meta">

                                <span class="badge bg-success">
                                    {{ $job->employment_type ?? 'Employment Opportunity' }}
                                </span>

                                @if($job->posting_date)
                                    <small class="text-muted">
                                        {{ $job->posting_date->format('M d, Y') }}
                                    </small>
                                @endif

                            </div>


                            <h3 class="mb-2">
                                {{ $job->title }}
                            </h3>


                            @if($job->office)
                                <p class="mb-2">
                                    <i class="bi bi-building me-1"></i>
                                    {{ $job->office }}
                                </p>
                            @endif


                            @if($job->salary_grade)
                                <p class="text-muted mb-2">
                                    <strong>Salary Grade:</strong>
                                    {{ $job->salary_grade }}
                                </p>
                            @endif


                            @if($job->application_deadline)
                                <p class="text-muted mb-3">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    <strong>Application Deadline:</strong>
                                    {{ $job->application_deadline->format('M d, Y') }}
                                </p>
                            @endif


                            <a
                                href="{{ route('job-opportunities.show', $job->slug) }}"
                                class="btn btn-outline-success"
                            >
                                View Opportunity
                                <i class="bi bi-arrow-right ms-1"></i>
                            </a>

                        </article>

                    </div>

                @endforeach

            </div>


            @if($jobs->hasPages())

                <div class="mt-5">
                    {{ $jobs->links() }}
                </div>

            @endif

        @else

            <div class="content-card text-center py-5">

                <i class="bi bi-briefcase display-5 text-muted"></i>

                <h3 class="mt-3">
                    No Job Opportunities Available
                </h3>

                <p class="text-muted mb-0">
                    There are currently no published job opportunities.
                </p>

            </div>

        @endif

    </div>
</section>

@endsection