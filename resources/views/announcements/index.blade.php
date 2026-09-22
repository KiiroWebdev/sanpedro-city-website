@extends('layouts.app')

@section('title', 'Announcements | City Government of San Pedro, Laguna')

@section('content')

<section class="news-page">

    <div class="container">

        {{-- Page Header --}}
        <div class="news-page-header">

            <span class="news-page-label">
                <i class="bi bi-megaphone"></i>
                Announcements
            </span>

            <h1>Official Announcements</h1>

            <p>
                Stay informed about public advisories, important notices,
                and official announcements from the City Government of San Pedro.
            </p>

        </div>


        {{-- Announcements --}}
        @if($announcements->count())

            <div class="row g-4 justify-content-center">

                @foreach($announcements as $announcement)

                    <div class="col-lg-6 col-md-10">

                        <article class="announcement-page-card h-100">

                            <a
                                href="{{ route(
                                    'announcements.show',
                                    $announcement->slug
                                ) }}"
                                class="announcement-page-icon"
                            >
                                <i class="bi bi-megaphone"></i>
                            </a>

                            <div class="announcement-page-content">

                                <div class="announcement-page-meta">

                                    <span class="news-category">
                                        {{ $announcement->category }}
                                    </span>

                                    @if($announcement->published_at)

                                        <span class="news-date">
                                            <i class="bi bi-calendar3"></i>
                                            {{ $announcement->published_at->format('F d, Y') }}
                                        </span>

                                    @endif

                                </div>


                                <h2>

                                    <a
                                        href="{{ route(
                                            'announcements.show',
                                            $announcement->slug
                                        ) }}"
                                    >
                                        {{ $announcement->title }}
                                    </a>

                                </h2>


                                @if($announcement->excerpt)

                                    <p>
                                        {{ $announcement->excerpt }}
                                    </p>

                                @endif


                                <a
                                    href="{{ route(
                                        'announcements.show',
                                        $announcement->slug
                                    ) }}"
                                    class="announcement-page-read-more"
                                >
                                    Read Announcement
                                    <i class="bi bi-arrow-right"></i>
                                </a>

                            </div>

                        </article>

                    </div>

                @endforeach

            </div>


            {{-- Pagination --}}
            @if($announcements->hasPages())

                <div class="news-pagination">
                    {{ $announcements->links() }}
                </div>

            @endif


        @else

            <div class="news-empty">

                <div class="news-empty-icon">
                    <i class="bi bi-megaphone"></i>
                </div>

                <h2>No Announcements Available</h2>

                <p>
                    There are currently no published announcements.
                    Please check back later.
                </p>

                <a
                    href="{{ url('/') }}"
                    class="btn btn-primary"
                >
                    <i class="bi bi-house"></i>
                    Back to Home
                </a>

            </div>

        @endif

    </div>

</section>

@endsection