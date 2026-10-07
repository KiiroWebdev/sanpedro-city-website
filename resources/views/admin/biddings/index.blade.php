@extends('layouts.app')

@section('title', 'Admin - Biddings')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
    <h1>Biddings</h1>
    <p>Manage procurement and bidding notices.</p>
</div>

<div class="d-flex gap-2">

    <a
        href="{{ route('admin.dashboard') }}"
        class="btn btn-outline-secondary"
    >
        <i class="bi bi-arrow-left"></i>
        Back to Dashboard
    </a>

    <a
        href="{{ route('admin.biddings.create') }}"
        class="btn btn-success"
    >
        <i class="bi bi-plus-lg"></i>
        Add Bidding
    </a>

</div>
</div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0">

        <div class="card-body p-0">

            @if($biddings->count())

                <div class="table-responsive">

    <table class="table align-middle">

        <thead>
            <tr>
                <th>Bidding Notice</th>
                <th>Reference No.</th>
                <th>ABC</th>
<th>Procurement Mode</th>
<th>Posting Date</th>
                <th>Submission Deadline</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse($biddings as $bidding)

                <tr>

                    {{-- Bidding Notice --}}
                    <td>

                        <div class="fw-semibold">
                            {{ $bidding->title }}
                        </div>

                        <small class="text-muted">
                            {{ $bidding->type }}
                        </small>

                    </td>


                    {{-- Reference Number --}}
                    <td>

                        @if($bidding->reference_no)

                            {{ $bidding->reference_no }}

                        @else

                            <span class="text-muted">—</span>

                        @endif

                    </td>


                    {{-- ABC --}}
                    <td>

                        @if($bidding->abc)

                            ₱{{ number_format($bidding->abc, 2) }}

                        @else

                            <span class="text-muted">—</span>

                        @endif

                    </td>

                    <td>

    @if($bidding->procurement_mode)

        {{ $bidding->procurement_mode }}

    @else

        <span class="text-muted">—</span>

    @endif

</td>


                    {{-- Posting Date --}}
                    <td>

                        @if($bidding->posting_date)

                            {{ $bidding->posting_date->format('M d, Y') }}

                        @else

                            <span class="text-muted">—</span>

                        @endif

                    </td>


                    {{-- Submission Deadline --}}
                    <td>

                        @if($bidding->submission_deadline)

                            {{ $bidding->submission_deadline->format('M d, Y') }}

                            <br>

                            <small class="text-muted">
                                {{ $bidding->submission_deadline->format('h:i A') }}
                            </small>

                        @else

                            <span class="text-muted">—</span>

                        @endif

                    </td>


                    {{-- Status --}}
                    <td>

                        @if($bidding->status === 'published')

                            <span class="badge bg-success">
                                Published
                            </span>

                        @elseif($bidding->status === 'draft')

                            <span class="badge bg-secondary">
                                Draft
                            </span>

                        @elseif($bidding->status === 'closed')

                            <span class="badge bg-danger">
                                Closed
                            </span>

                        @endif

                    </td>


                    {{-- Actions --}}
                    <td class="text-end">

                        <div class="d-inline-flex gap-1">

                            <a
                                href="{{ route('biddings.show', $bidding->slug) }}"
                                target="_blank"
                                class="btn btn-sm btn-outline-success"
                                title="View"
                            >
                                <i class="bi bi-eye"></i>
                            </a>

                            <a
                                href="{{ route('admin.biddings.edit', $bidding) }}"
                                class="btn btn-sm btn-outline-primary"
                                title="Edit"
                            >
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form
                                action="{{ route('admin.biddings.destroy', $bidding) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this bidding notice?');"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-sm btn-outline-danger"
                                    title="Delete"
                                >
                                    <i class="bi bi-trash"></i>
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="8"
                        class="text-center py-5"
                    >

                        <i class="bi bi-file-earmark-text fs-2 text-muted"></i>

                        <p class="mt-2 mb-0 text-muted">
                            No bidding notices have been added yet.
                        </p>

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>

            @else

                <div class="text-center py-5">

                    <i class="bi bi-file-earmark-text display-4 text-muted"></i>

                    <h4 class="mt-3">
                        No Biddings Yet
                    </h4>

                    <p class="text-muted">
                        Add your first bidding notice to get started.
                    </p>

                    <a href="{{ route('admin.biddings.create') }}"
                       class="btn btn-success">
                        <i class="bi bi-plus-lg"></i>
                        Add Bidding
                    </a>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection