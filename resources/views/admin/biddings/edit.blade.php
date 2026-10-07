@extends('layouts.app')

@section('title', 'Edit Bidding')

@section('content')

<div class="container py-5">

    {{-- Page Header --}}
    <div class="mb-4">

        <h1 class="h3 mb-1">
            Edit Bidding
        </h1>

        <p class="text-muted mb-0">
            Update the procurement or bidding notice.
        </p>

    </div>


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Please check the following:</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- Main Edit Form --}}
    <form
        action="{{ route('admin.biddings.update', $bidding) }}"
        method="POST"
    >

        @csrf
        @method('PUT')


        <div class="row g-4">


            {{-- =====================================================
                 LEFT COLUMN
                 ===================================================== --}}
            <div class="col-lg-8">


                {{-- Bidding Information --}}
                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-body">

                        <h5 class="card-title mb-4">
                            Bidding Information
                        </h5>


                        {{-- Title --}}
                        <div class="mb-3">

                            <label
                                for="title"
                                class="form-label"
                            >
                                Bidding Title
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                name="title"
                                id="title"
                                class="form-control"
                                value="{{ old('title', $bidding->title) }}"
                                required
                            >

                        </div>


                        {{-- Reference / Type --}}
                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label
                                    for="reference_no"
                                    class="form-label"
                                >
                                    Reference No.
                                </label>

                                <input
                                    type="text"
                                    name="reference_no"
                                    id="reference_no"
                                    class="form-control"
                                    value="{{ old('reference_no', $bidding->reference_no) }}"
                                >

                            </div>


                            <div class="col-md-6 mb-3">

                                <label
                                    for="type"
                                    class="form-label"
                                >
                                    Notice Type
                                    <span class="text-danger">*</span>
                                </label>

                                <select
                                    name="type"
                                    id="type"
                                    class="form-select"
                                    required
                                >

                                    <option
                                        value="Invitation to Bid"
                                        @selected(old('type', $bidding->type) === 'Invitation to Bid')
                                    >
                                        Invitation to Bid
                                    </option>

                                    <option
                                        value="Request for Quotation"
                                        @selected(old('type', $bidding->type) === 'Request for Quotation')
                                    >
                                        Request for Quotation
                                    </option>

                                    <option
                                        value="Notice of Award"
                                        @selected(old('type', $bidding->type) === 'Notice of Award')
                                    >
                                        Notice of Award
                                    </option>

                                    <option
                                        value="Other"
                                        @selected(old('type', $bidding->type) === 'Other')
                                    >
                                        Other
                                    </option>

                                </select>

                            </div>

                        </div>


                        {{-- Description --}}
                        <div class="mb-3">

                            <label
                                for="description"
                                class="form-label"
                            >
                                Description
                            </label>

                            <textarea
                                name="description"
                                id="description"
                                class="form-control"
                                rows="5"
                            >{{ old('description', $bidding->description) }}</textarea>

                        </div>


                        {{-- ABC / Procurement Mode --}}
                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label
                                    for="abc"
                                    class="form-label"
                                >
                                    Approved Budget for the Contract (ABC)
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        ₱
                                    </span>

                                    <input
                                        type="number"
                                        name="abc"
                                        id="abc"
                                        class="form-control"
                                        value="{{ old('abc', $bidding->abc) }}"
                                        step="0.01"
                                        min="0"
                                        placeholder="0.00"
                                    >

                                </div>

                            </div>


                            <div class="col-md-6 mb-3">

                                <label
                                    for="procurement_mode"
                                    class="form-label"
                                >
                                    Procurement Mode
                                </label>

                                <input
                                    type="text"
                                    name="procurement_mode"
                                    id="procurement_mode"
                                    class="form-control"
                                    value="{{ old('procurement_mode', $bidding->procurement_mode) }}"
                                    placeholder="Enter procurement mode"
                                >

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

                            {{-- Posting Date --}}
                            <div class="col-md-4 mb-3">

                                <label
                                    for="posting_date"
                                    class="form-label"
                                >
                                    Posting Date
                                </label>

                                <input
                                    type="date"
                                    name="posting_date"
                                    id="posting_date"
                                    class="form-control"
                                    value="{{ old('posting_date', optional($bidding->posting_date)->format('Y-m-d')) }}"
                                >

                            </div>


                            {{-- Submission Deadline --}}
                            <div class="col-md-4 mb-3">

                                <label
                                    for="submission_deadline"
                                    class="form-label"
                                >
                                    Submission Deadline
                                </label>

                                <input
                                    type="datetime-local"
                                    name="submission_deadline"
                                    id="submission_deadline"
                                    class="form-control"
                                    value="{{ old('submission_deadline', optional($bidding->submission_deadline)->format('Y-m-d\TH:i')) }}"
                                >

                            </div>


                            {{-- Opening Date --}}
                            <div class="col-md-4 mb-3">

                                <label
                                    for="opening_date"
                                    class="form-label"
                                >
                                    Opening Date
                                </label>

                                <input
                                    type="datetime-local"
                                    name="opening_date"
                                    id="opening_date"
                                    class="form-control"
                                    value="{{ old('opening_date', optional($bidding->opening_date)->format('Y-m-d\TH:i')) }}"
                                >

                            </div>

                        </div>


                        {{-- Venue --}}
                        <div class="mb-3">

                            <label
                                for="venue"
                                class="form-label"
                            >
                                Venue
                            </label>

                            <input
                                type="text"
                                name="venue"
                                id="venue"
                                class="form-control"
                                value="{{ old('venue', $bidding->venue) }}"
                            >

                        </div>

                    </div>

                </div>


                {{-- Contact Information --}}
                <div class="card shadow-sm border-0">

                    <div class="card-body">

                        <h5 class="card-title mb-4">
                            Contact Information
                        </h5>


                        {{-- Contact Person --}}
                        <div class="mb-3">

                            <label
                                for="contact_person"
                                class="form-label"
                            >
                                Contact Person
                            </label>

                            <input
                                type="text"
                                name="contact_person"
                                id="contact_person"
                                class="form-control"
                                value="{{ old('contact_person', $bidding->contact_person) }}"
                            >

                        </div>


                        {{-- Email / Telephone --}}
                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label
                                    for="contact_email"
                                    class="form-label"
                                >
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="contact_email"
                                    id="contact_email"
                                    class="form-control"
                                    value="{{ old('contact_email', $bidding->contact_email) }}"
                                >

                            </div>


                            <div class="col-md-6 mb-3">

                                <label
                                    for="contact_phone"
                                    class="form-label"
                                >
                                    Telephone
                                </label>

                                <input
                                    type="text"
                                    name="contact_phone"
                                    id="contact_phone"
                                    class="form-control"
                                    value="{{ old('contact_phone', $bidding->contact_phone) }}"
                                >

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =====================================================
                 RIGHT COLUMN
                 ===================================================== --}}
            <div class="col-lg-4">


                {{-- Publishing --}}
                <div class="card shadow-sm border-0">

                    <div class="card-body">

                        <h5 class="card-title mb-4">
                            Publishing
                        </h5>


                        <div class="mb-3">

                            <label
                                for="status"
                                class="form-label"
                            >
                                Status
                                <span class="text-danger">*</span>
                            </label>

                            <select
                                name="status"
                                id="status"
                                class="form-select"
                                required
                            >

                                <option
                                    value="draft"
                                    @selected(old('status', $bidding->status) === 'draft')
                                >
                                    Draft
                                </option>

                                <option
                                    value="published"
                                    @selected(old('status', $bidding->status) === 'published')
                                >
                                    Published
                                </option>

                                <option
                                    value="closed"
                                    @selected(old('status', $bidding->status) === 'closed')
                                >
                                    Closed
                                </option>

                            </select>

                        </div>


                        <div class="alert alert-light border small mb-0">

                            <i class="bi bi-info-circle"></i>

                            <strong>Draft</strong> notices are only visible
                            in the admin panel.

                            <br>
                            <br>

                            <strong>Published</strong> notices will appear
                            on the public Biddings page.

                            <br>
                            <br>

                            <strong>Closed</strong> notices remain in the
                            admin panel but are not displayed publicly.

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Main Form Buttons --}}
        <div class="d-flex justify-content-between mt-4">

            <a
                href="{{ route('admin.biddings.index') }}"
                class="btn btn-outline-secondary"
            >

                <i class="bi bi-arrow-left"></i>

                Cancel

            </a>


            <button
                type="submit"
                class="btn btn-success"
            >

                <i class="bi bi-check-lg"></i>

                Update Bidding

            </button>

        </div>

    </form>


    {{-- =========================================================
         BIDDING DOCUMENTS
         IMPORTANT: This section is OUTSIDE the main edit form.
         ========================================================= --}}

    <div class="card shadow-sm border-0 mt-4">

        <div class="card-body">

            <h5 class="card-title mb-4">
                Bidding Documents
            </h5>


            {{-- Existing Documents --}}
            @if($bidding->documents->count())

                <div class="table-responsive mb-4">

                    <table class="table table-hover align-middle mb-0">

                        <thead class="table-light">

                            <tr>

                                <th>
                                    Document
                                </th>

                                <th>
                                    Type
                                </th>

                                <th>
                                    File
                                </th>

                                <th class="text-end">
                                    Action
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($bidding->documents as $document)

                                <tr>

                                    <td>

                                        <strong>
                                            {{ $document->title }}
                                        </strong>

                                    </td>


                                    <td>

                                        {{ $document->document_type ?? '—' }}

                                    </td>


                                    <td>

                                        {{ $document->file_name }}

                                    </td>


                                    <td class="text-end">

                                        <a
                                            href="{{ asset('storage/' . $document->file_path) }}"
                                            target="_blank"
                                            class="btn btn-sm btn-outline-success"
                                        >

                                            <i class="bi bi-eye"></i>

                                            View

                                        </a>


                                        <form
                                            action="{{ route('admin.biddings.documents.destroy', [$bidding, $document]) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this document?');"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                            >

                                                <i class="bi bi-trash"></i>

                                                Delete

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <p class="text-muted">
                    No documents have been uploaded for this bidding yet.
                </p>

            @endif


            <hr>


            {{-- Upload New Document --}}
            <h6 class="mb-3">
                Upload New Document
            </h6>


            <form
                action="{{ route('admin.biddings.documents.store', $bidding) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf


                <div class="row">

                    {{-- Document Title --}}
                    <div class="col-md-4 mb-3">

                        <label
                            for="document_title"
                            class="form-label"
                        >
                            Document Title
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="title"
                            id="document_title"
                            class="form-control"
                            placeholder="e.g. Invitation to Bid"
                            required
                        >

                    </div>


                    {{-- Document Type --}}
                    <div class="col-md-3 mb-3">

                        <label
                            for="document_type"
                            class="form-label"
                        >
                            Document Type
                        </label>

                        <select
                            name="document_type"
                            id="document_type"
                            class="form-select"
                        >

                            <option value="">
                                Select Type
                            </option>

                            <option value="Invitation to Bid">
                                Invitation to Bid
                            </option>

                            <option value="Bidding Documents">
                                Bidding Documents
                            </option>

                            <option value="Technical Specifications">
                                Technical Specifications
                            </option>

                            <option value="Terms of Reference">
                                Terms of Reference
                            </option>

                            <option value="BAC Resolution">
                                BAC Resolution
                            </option>

                            <option value="Notice of Award">
                                Notice of Award
                            </option>

                            <option value="Request for Quotation">
                                Request for Quotation
                            </option>

                            <option value="Other">
                                Other
                            </option>

                        </select>

                    </div>


                    {{-- File --}}
                    <div class="col-md-5 mb-3">

                        <label
                            for="document"
                            class="form-label"
                        >
                            File
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="file"
                            name="document"
                            id="document"
                            class="form-control"
                            accept=".pdf,.doc,.docx,.xls,.xlsx"
                            required
                        >

                        <small class="text-muted">
                            PDF, DOC, DOCX, XLS, or XLSX — maximum 20 MB.
                        </small>

                    </div>

                </div>


                <button
                    type="submit"
                    class="btn btn-success"
                >

                    <i class="bi bi-upload"></i>

                    Upload Document

                </button>

            </form>

        </div>

    </div>

</div>

@endsection