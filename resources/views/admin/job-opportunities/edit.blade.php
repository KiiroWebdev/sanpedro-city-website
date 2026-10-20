@extends('layouts.app')

@section('title', 'Edit Job Opportunity')

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

                <h1>Edit Job Opportunity</h1>

                <p>
                    Update the employment opportunity information.
                </p>
            </div>

            <div>
                <a href="{{ route('admin.job-opportunities.index') }}"
                   class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i>
                    Back to Job Opportunities
                </a>
            </div>

        </div>

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="alert alert-danger">

                <strong>Please correct the following:</strong>

                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif

        <form action="{{ route('admin.job-opportunities.update', $jobOpportunity) }}"
              method="POST">

            @csrf
            @method('PUT')

            {{-- Position Information --}}
            <div class="admin-card mb-4">

                <div class="mb-4">
                    <h2 class="h5 mb-1">
                        <i class="bi bi-person-badge me-2"></i>
                        Position Information
                    </h2>

                    <p class="text-muted mb-0">
                        Update the basic information about the vacancy.
                    </p>
                </div>

                <div class="row g-4">

                    {{-- Title --}}
                    <div class="col-lg-8">

                        <label for="title" class="form-label">
                            Position Title <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="title"
                               id="title"
                               class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', $jobOpportunity->title) }}"
                               required>

                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Office --}}
                    <div class="col-lg-4">

                        <label for="office" class="form-label">
                            Office / Department
                        </label>

                        <input type="text"
                               name="office"
                               id="office"
                               class="form-control @error('office') is-invalid @enderror"
                               value="{{ old('office', $jobOpportunity->office) }}">

                        @error('office')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Employment Type --}}
                    <div class="col-lg-6">

                        <label for="employment_type" class="form-label">
                            Employment Type
                        </label>

                        <select name="employment_type"
                                id="employment_type"
                                class="form-select @error('employment_type') is-invalid @enderror">

                            <option value="">Select employment type</option>

                            <option value="Plantilla"
                                {{ old('employment_type', $jobOpportunity->employment_type) === 'Plantilla' ? 'selected' : '' }}>
                                Plantilla
                            </option>

                            <option value="Contract of Service"
                                {{ old('employment_type', $jobOpportunity->employment_type) === 'Contract of Service' ? 'selected' : '' }}>
                                Contract of Service
                            </option>

                            <option value="Job Order"
                                {{ old('employment_type', $jobOpportunity->employment_type) === 'Job Order' ? 'selected' : '' }}>
                                Job Order
                            </option>

                            <option value="Temporary"
                                {{ old('employment_type', $jobOpportunity->employment_type) === 'Temporary' ? 'selected' : '' }}>
                                Temporary
                            </option>

                            <option value="Other"
                                {{ old('employment_type', $jobOpportunity->employment_type) === 'Other' ? 'selected' : '' }}>
                                Other
                            </option>

                        </select>

                        @error('employment_type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Salary Grade --}}
                    <div class="col-lg-6">

                        <label for="salary_grade" class="form-label">
                            Salary Grade
                        </label>

                        <input type="text"
                               name="salary_grade"
                               id="salary_grade"
                               class="form-control @error('salary_grade') is-invalid @enderror"
                               value="{{ old('salary_grade', $jobOpportunity->salary_grade) }}">

                        @error('salary_grade')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

            </div>

            {{-- Qualifications & Duties --}}
            <div class="admin-card mb-4">

                <div class="mb-4">
                    <h2 class="h5 mb-1">
                        <i class="bi bi-list-check me-2"></i>
                        Qualifications & Duties
                    </h2>

                    <p class="text-muted mb-0">
                        Update the qualifications and responsibilities.
                    </p>
                </div>

                <div class="mb-4">

                    <label for="qualification" class="form-label">
                        Qualifications
                    </label>

                    <textarea name="qualification"
                              id="qualification"
                              rows="7"
                              class="form-control @error('qualification') is-invalid @enderror">{{ old('qualification', $jobOpportunity->qualification) }}</textarea>

                    @error('qualification')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div>

                    <label for="duties" class="form-label">
                        Duties and Responsibilities
                    </label>

                    <textarea name="duties"
                              id="duties"
                              rows="7"
                              class="form-control @error('duties') is-invalid @enderror">{{ old('duties', $jobOpportunity->duties) }}</textarea>

                    @error('duties')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

            {{-- Application Information --}}
            <div class="admin-card mb-4">

                <div class="mb-4">
                    <h2 class="h5 mb-1">
                        <i class="bi bi-file-earmark-text me-2"></i>
                        Application Information
                    </h2>

                    <p class="text-muted mb-0">
                        Update the documents and application instructions.
                    </p>
                </div>

                <div class="mb-4">

                    <label for="application_requirements" class="form-label">
                        Application Requirements
                    </label>

                    <textarea name="application_requirements"
                              id="application_requirements"
                              rows="7"
                              class="form-control @error('application_requirements') is-invalid @enderror">{{ old('application_requirements', $jobOpportunity->application_requirements) }}</textarea>

                    @error('application_requirements')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div>

                    <label for="how_to_apply" class="form-label">
                        How to Apply
                    </label>

                    <textarea name="how_to_apply"
                              id="how_to_apply"
                              rows="7"
                              class="form-control @error('how_to_apply') is-invalid @enderror">{{ old('how_to_apply', $jobOpportunity->how_to_apply) }}</textarea>

                    @error('how_to_apply')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

            {{-- Publication Settings --}}
            <div class="admin-card mb-4">

                <div class="mb-4">
                    <h2 class="h5 mb-1">
                        <i class="bi bi-calendar-check me-2"></i>
                        Publication Settings
                    </h2>

                    <p class="text-muted mb-0">
                        Update the dates and publication status.
                    </p>
                </div>

                <div class="row g-4">

                    {{-- Posting Date --}}
                    <div class="col-lg-4">

                        <label for="posting_date" class="form-label">
                            Posting Date
                        </label>

                        <input type="date"
                               name="posting_date"
                               id="posting_date"
                               class="form-control @error('posting_date') is-invalid @enderror"
                               value="{{ old('posting_date', $jobOpportunity->posting_date?->format('Y-m-d')) }}">

                        @error('posting_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Application Deadline --}}
                    <div class="col-lg-4">

                        <label for="application_deadline" class="form-label">
                            Application Deadline
                        </label>

                        <input type="date"
                               name="application_deadline"
                               id="application_deadline"
                               class="form-control @error('application_deadline') is-invalid @enderror"
                               value="{{ old('application_deadline', $jobOpportunity->application_deadline?->format('Y-m-d')) }}">

                        @error('application_deadline')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Status --}}
                    <div class="col-lg-4">

                        <label for="status" class="form-label">
                            Status <span class="text-danger">*</span>
                        </label>

                        <select name="status"
                                id="status"
                                class="form-select @error('status') is-invalid @enderror"
                                required>

                            <option value="draft"
                                {{ old('status', $jobOpportunity->status) === 'draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                            <option value="published"
                                {{ old('status', $jobOpportunity->status) === 'published' ? 'selected' : '' }}>
                                Published
                            </option>

                            <option value="closed"
                                {{ old('status', $jobOpportunity->status) === 'closed' ? 'selected' : '' }}>
                                Closed
                            </option>

                        </select>

                        <div class="form-text">
                            Only published opportunities appear on the public website.
                        </div>

                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    {{-- Published At --}}
                    <div class="col-lg-6">

                        <label for="published_at" class="form-label">
                            Publication Date & Time
                        </label>

                        <input type="datetime-local"
                               name="published_at"
                               id="published_at"
                               class="form-control @error('published_at') is-invalid @enderror"
                               value="{{ old('published_at', $jobOpportunity->published_at?->format('Y-m-d\TH:i')) }}">

                        <div class="form-text">
                            Leave blank when creating a draft. If status is Published and this is blank, the current date and time will be used.
                        </div>

                        @error('published_at')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

            </div>

            {{-- Form Actions --}}
            <div class="d-flex justify-content-end gap-2 mb-5">

                <a href="{{ route('admin.job-opportunities.index') }}"
                   class="btn btn-outline-secondary">
                    Cancel
                </a>

                <button type="submit"
                        class="btn btn-primary">

                    <i class="bi bi-check-lg"></i>
                    Update Job Opportunity

                </button>

            </div>

        </form>

    </div>

</section>

@endsection