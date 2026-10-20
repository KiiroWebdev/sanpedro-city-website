@extends('layouts.app')

@section('title', 'Job Opportunities Management')

@section('content')

<section class="admin-page">

    <div class="container-fluid">

        {{-- Header --}}
        <div class="admin-page-header">

            <div>
                <span class="admin-label">
                    <i class="bi bi-briefcase"></i>
                    Content Management
                </span>

                <h1>Job Opportunities</h1>

                <p>
                    Manage employment opportunities published on the city government website.
                </p>
            </div>

            <div class="d-flex gap-2 align-items-center">

                <a href="{{ route('admin.dashboard') }}"
                   class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i>
                    Back to Dashboard
                </a>

                <a href="{{ route('admin.job-opportunities.create') }}"
                   class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i>
                    New Job Opportunity
                </a>

            </div>

        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">

                <i class="bi bi-check-circle me-1"></i>

                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close">
                </button>

            </div>
        @endif

        {{-- Job Opportunities --}}
        <div class="admin-card">

            @if($jobs->count())

                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">

                        <thead>
                            <tr>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Employment Type</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($jobs as $job)

                                <tr>

                                    {{-- Position --}}
                                    <td>
                                        <strong>
                                            {{ $job->title }}
                                        </strong>

                                        @if($job->salary_grade)
                                            <small class="d-block text-muted">
                                                Salary Grade:
                                                {{ $job->salary_grade }}
                                            </small>
                                        @endif
                                    </td>

                                    {{-- Office --}}
                                    <td>
                                        {{ $job->office ?? '—' }}
                                    </td>

                                    {{-- Employment Type --}}
                                    <td>
                                        {{ $job->employment_type ?? '—' }}
                                    </td>

                                    {{-- Deadline --}}
                                    <td>

                                        @if($job->application_deadline)

                                            {{ $job->application_deadline->format('M d, Y') }}

                                            @if($job->application_deadline->isPast())
                                                <small class="d-block text-danger">
                                                    Deadline passed
                                                </small>
                                            @endif

                                        @else
                                            —
                                        @endif

                                    </td>

                                    {{-- Status --}}
                                    <td>

                                        @if($job->status === 'published')

                                            <span class="badge bg-success">
                                                Published
                                            </span>

                                        @elseif($job->status === 'closed')

                                            <span class="badge bg-secondary">
                                                Closed
                                            </span>

                                        @else

                                            <span class="badge bg-warning text-dark">
                                                Draft
                                            </span>

                                        @endif

                                    </td>

                                    {{-- Actions --}}
                                    <td class="text-end">

                                        <div class="d-inline-flex gap-1">

                                            @if($job->status === 'published')

                                                <a href="{{ route('job-opportunities.show', $job->slug) }}"
                                                   class="btn btn-sm btn-outline-success"
                                                   target="_blank"
                                                   title="View">

                                                    <i class="bi bi-eye"></i>

                                                </a>

                                            @endif

                                            <a href="{{ route('admin.job-opportunities.edit', $job) }}"
                                               class="btn btn-sm btn-outline-primary"
                                               title="Edit">

                                                <i class="bi bi-pencil"></i>

                                            </a>

                                            <form action="{{ route('admin.job-opportunities.destroy', $job) }}"
                                                  method="POST"
                                                  class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this job opportunity?');">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger"
                                                        title="Delete">

                                                    <i class="bi bi-trash"></i>

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

                {{-- Pagination --}}
                @if($jobs->hasPages())

                    <div class="admin-pagination">
                        {{ $jobs->links() }}
                    </div>

                @endif

            @else

                {{-- Empty State --}}
                <div class="admin-empty-state">

                    <i class="bi bi-briefcase"></i>

                    <h3>No Job Opportunities</h3>

                    <p>
                        There are currently no job opportunities in the system.
                    </p>

                    <a href="{{ route('admin.job-opportunities.create') }}"
                       class="btn btn-primary">

                        <i class="bi bi-plus-lg"></i>
                        Add Job Opportunity

                    </a>

                </div>

            @endif

        </div>

    </div>

</section>

@endsection