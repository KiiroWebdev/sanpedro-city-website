@extends('layouts.app')

@section('title', 'Add Bidding')

@section('content')

<div class="container py-5">

    <div class="mb-4">
        <h1 class="h3 mb-1">Add Bidding</h1>
        <p class="text-muted mb-0">
            Create a new procurement or bidding notice.
        </p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Please check the following:</strong>

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.biddings.store') }}" method="POST">

        @csrf

        <div class="row g-4">

            {{-- Main Information --}}
            <div class="col-lg-8">

                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-body">

                        <h5 class="card-title mb-4">
                            Bidding Information
                        </h5>

                        <div class="mb-3">
                            <label for="title" class="form-label">
                                Title <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   name="title"
                                   id="title"
                                   class="form-control"
                                   value="{{ old('title') }}"
                                   required>
                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label for="reference_no" class="form-label">
                                    Reference No.
                                </label>

                                <input type="text"
                                       name="reference_no"
                                       id="reference_no"
                                       class="form-control"
                                       value="{{ old('reference_no') }}">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label for="type" class="form-label">
                                    Type <span class="text-danger">*</span>
                                </label>

                                <select name="type"
                                        id="type"
                                        class="form-select"
                                        required>

                                    <option value="Invitation to Bid"
                                        {{ old('type') === 'Invitation to Bid' ? 'selected' : '' }}>
                                        Invitation to Bid
                                    </option>

                                    <option value="Request for Quotation"
                                        {{ old('type') === 'Request for Quotation' ? 'selected' : '' }}>
                                        Request for Quotation
                                    </option>

                                    <option value="Notice of Award"
                                        {{ old('type') === 'Notice of Award' ? 'selected' : '' }}>
                                        Notice of Award
                                    </option>

                                    <option value="Other"
                                        {{ old('type') === 'Other' ? 'selected' : '' }}>
                                        Other
                                    </option>

                                </select>

                            </div>

                        </div>

                        <div class="mb-3">

                            <label for="description" class="form-label">
                                Description
                            </label>

                            <textarea name="description"
                                      id="description"
                                      rows="6"
                                      class="form-control">{{ old('description') }}</textarea>

                        </div>

                        <div class="row">

                            <div class="mb-3">
    <label for="abc" class="form-label">
        Approved Budget for the Contract (ABC)
    </label>

    <div class="input-group">
        <span class="input-group-text">₱</span>

        <input
            type="number"
            id="abc"
            name="abc"
            class="form-control"
            value="{{ old('abc') }}"
            min="0"
            step="0.01"
            placeholder="0.00"
        >
    </div>

    <div class="form-text">
        Enter the total approved budget for the procurement.
    </div>

    @error('abc')
        <div class="text-danger small mt-1">
            {{ $message }}
        </div>
    @enderror
</div>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label for="procurement_mode" class="form-label">
                                    Procurement Mode
                                </label>

                                <input type="text"
                                       name="procurement_mode"
                                       id="procurement_mode"
                                       class="form-control"
                                       value="{{ old('procurement_mode') }}">

                            </div>

                        </div>

                    </div>

                </div>

                {{-- Schedule --}}
                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-body">

                        <h5 class="card-title mb-4">
                            Schedule
                        </h5>

                        <div class="row">

                            <div class="mb-3">
    <label for="posting_date" class="form-label">
        Posting Date
    </label>

    <input
        type="date"
        id="posting_date"
        name="posting_date"
        class="form-control"
        value="{{ old('posting_date') }}"
    >

    @error('posting_date')
        <div class="text-danger small mt-1">
            {{ $message }}
        </div>
    @enderror
</div>

                            <div class="mb-3">
    <label for="submission_deadline" class="form-label">
        Submission Deadline
    </label>

    <input
        type="datetime-local"
        id="submission_deadline"
        name="submission_deadline"
        class="form-control"
        value="{{ old('submission_deadline') }}"
    >

    @error('submission_deadline')
        <div class="text-danger small mt-1">
            {{ $message }}
        </div>
    @enderror
</div>

                            <div class="mb-3">
    <label for="opening_date" class="form-label">
        Opening Date
    </label>

    <input
        type="datetime-local"
        id="opening_date"
        name="opening_date"
        class="form-control"
        value="{{ old('opening_date') }}"
    >

    @error('opening_date')
        <div class="text-danger small mt-1">
            {{ $message }}
        </div>
    @enderror
</div>

                        </div>

                        <div class="mb-3">

                            <label for="venue" class="form-label">
                                Venue
                            </label>

                            <input type="text"
                                   name="venue"
                                   id="venue"
                                   class="form-control"
                                   value="{{ old('venue') }}">

                        </div>

                    </div>

                </div>

                {{-- Contact --}}
                <div class="card shadow-sm border-0">

                    <div class="card-body">

                        <h5 class="card-title mb-4">
                            Contact Information
                        </h5>

                        <div class="mb-3">

                            <label for="contact_person" class="form-label">
                                Contact Person
                            </label>

                            <input type="text"
                                   name="contact_person"
                                   id="contact_person"
                                   class="form-control"
                                   value="{{ old('contact_person') }}">

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label for="contact_email" class="form-label">
                                    Email
                                </label>

                                <input type="email"
                                       name="contact_email"
                                       id="contact_email"
                                       class="form-control"
                                       value="{{ old('contact_email') }}">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label for="contact_phone" class="form-label">
                                    Telephone
                                </label>

                                <input type="text"
                                       name="contact_phone"
                                       id="contact_phone"
                                       class="form-control"
                                       value="{{ old('contact_phone') }}">

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Publishing --}}
            <div class="col-lg-4">

                <div class="card shadow-sm border-0">

                    <div class="card-body">

                        <h5 class="card-title mb-4">
                            Publishing
                        </h5>

                        <div class="mb-3">

                            <label for="status" class="form-label">
                                Status <span class="text-danger">*</span>
                            </label>

                            <select name="status"
                                    id="status"
                                    class="form-select"
                                    required>

                                <option value="draft"
                                    {{ old('status', 'draft') === 'draft' ? 'selected' : '' }}>
                                    Draft
                                </option>

                                <option value="published"
                                    {{ old('status') === 'published' ? 'selected' : '' }}>
                                    Published
                                </option>

                                <option value="closed"
                                    {{ old('status') === 'closed' ? 'selected' : '' }}>
                                    Closed
                                </option>

                            </select>

                        </div>

                        <div class="alert alert-light border small">
                            <i class="bi bi-info-circle"></i>

                            <strong>Draft</strong> notices are only visible
                            in the admin panel.

                            <br><br>

                            <strong>Published</strong> notices will appear
                            on the public Biddings page.

                            <br><br>

                            <strong>Closed</strong> notices remain in the
                            admin panel but are not displayed publicly.
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="d-flex justify-content-between mt-4">

            <a href="{{ route('admin.biddings.index') }}"
               class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i>
                Cancel
            </a>

            <button type="submit"
                    class="btn btn-success">
                <i class="bi bi-check-lg"></i>
                Save Bidding
            </button>

        </div>

    </form>

</div>

@endsection