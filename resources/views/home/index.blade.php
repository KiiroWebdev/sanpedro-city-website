@extends('layouts.app')

@section('title', 'City Government of San Pedro, Laguna')

@section('content')

    <!-- HERO -->
    <section class="hero">

        <img
            src="{{ asset('images/city-hall.jpg') }}"
            alt="San Pedro City Hall"
        >

        <div class="hero-overlay">

            <div class="container">

                <div class="hero-content">

                    <h1>
                        CITY GOVERNMENT
                        <br>
                        OF SAN PEDRO
                    </h1>

                    <p>
                        Laguna, Philippines
                    </p>

                    <a href="#latest-news" class="btn btn-light">
                        Latest News
                    </a>

                </div>

            </div>

        </div>

    </section>


    {{-- Latest News --}}
<section class="home-news-section">

    <div class="container">

        <div class="home-section-heading">

            <div>
                <span class="home-section-label">
                    <i class="bi bi-newspaper"></i>
                    News & Updates
                </span>

                <h2>Latest News</h2>

                <p>
                    Stay updated with the latest news, announcements,
                    and activities from the City Government of San Pedro.
                </p>
            </div>

            <a
                href="{{ route('news.index') }}"
                class="home-news-view-all"
            >
                View All News
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>

        @if($latestPosts->count())

            <div class="row g-4 justify-content-center">

                @foreach($latestPosts as $post)

                    <div class="col-lg-4 col-md-6">

                        <article class="home-news-card h-100">

                            {{-- Image --}}
                            <a
                                href="{{ route('news.show', $post->slug) }}"
                                class="home-news-image"
                            >
                                <img
                                    src="{{ $post->featured_image
                                        ? asset('images/' . $post->featured_image)
                                        : asset('images/city-hall.jpg') }}"
                                    alt="{{ $post->title }}"
                                    loading="lazy"
                                >
                            </a>

                            {{-- Content --}}
                            <div class="home-news-body">

                                <div class="home-news-meta">

                                    <span class="news-category">
                                        {{ $post->category }}
                                    </span>

                                    @if($post->published_at)
                                        <span class="news-date">
                                            <i class="bi bi-calendar3"></i>
                                            {{ $post->published_at->format('M d, Y') }}
                                        </span>
                                    @endif

                                </div>

                                <h3>
                                    <a href="{{ route('news.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>

                                @if($post->excerpt)
                                    <p>
                                        {{ $post->excerpt }}
                                    </p>
                                @endif

                                <a
                                    href="{{ route('news.show', $post->slug) }}"
                                    class="home-news-read-more"
                                >
                                    Read More
                                    <i class="bi bi-arrow-right"></i>
                                </a>

                            </div>

                        </article>

                    </div>

                @endforeach

            </div>

        @else

            <div class="home-news-empty">

                <i class="bi bi-newspaper"></i>

                <h3>No News Available</h3>

                <p>
                    There are currently no published news and updates.
                </p>

            </div>

        @endif

    </div>

</section>

   <!-- ANNOUNCEMENTS -->

<section class="announcement-section">

    <div class="container">

        <div class="row align-items-center g-5">

            {{-- Section Introduction --}}
            <div class="col-lg-4">

                <div class="announcement-intro">

                    <span class="section-label">
                        <i class="bi bi-megaphone"></i>
                        IMPORTANT
                    </span>

                    <h2>
                        Announcements
                    </h2>

                    <p>
                        Stay informed about important notices,
                        public advisories, and official announcements
                        from the City Government of San Pedro.
                    </p>

                    <a
                        href="{{ route('announcements.index') }}"
                        class="announcement-view-all"
                    >
                        View All Announcements
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </div>


            {{-- Announcement List --}}
            <div class="col-lg-8">

                @if($latestAnnouncements->count())

                    <div class="announcement-list">

                        @foreach($latestAnnouncements as $announcement)

                            <a
                                href="{{ route(
                                    'announcements.show',
                                    $announcement->slug
                                ) }}"
                                class="announcement-item"
                            >

                                <div class="announcement-icon">
                                    <i class="bi bi-megaphone"></i>
                                </div>


                                <div class="announcement-content">

                                    <strong>
                                        {{ $announcement->title }}
                                    </strong>

                                    @if($announcement->published_at)

                                        <small>
                                            <i class="bi bi-calendar3"></i>

                                            {{ $announcement->published_at->format('F d, Y') }}
                                        </small>

                                    @endif

                                </div>


                                <div class="announcement-arrow">
                                    <i class="bi bi-chevron-right"></i>
                                </div>

                            </a>

                        @endforeach

                    </div>

                @else

                    <div class="home-news-empty">

                        <i class="bi bi-megaphone"></i>

                        <h3>
                            No Announcements Available
                        </h3>

                        <p>
                            There are currently no published announcements.
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>

</section>

{{-- Latest Biddings --}}
<section class="home-biddings-section">

    <div class="container">

        <div class="home-section-heading">

            <div>

                <span class="home-section-label">
                    <i class="bi bi-file-earmark-text"></i>
                    PROCUREMENT
                </span>

                <h2>
                    Latest Biddings
                </h2>

                <p>
                    View the latest procurement opportunities and
                    bidding notices from the City Government of San Pedro.
                </p>

            </div>


            <a
                href="{{ route('biddings.index') }}"
                class="home-news-view-all"
            >
                View All Biddings
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>


        @if($latestBiddings->count())

            <div class="row g-4">

                @foreach($latestBiddings as $bidding)

                    <div class="col-lg-4 col-md-6">

                        <article class="home-bidding-card h-100">

                            {{-- Notice Type --}}
                            <div class="home-bidding-top">

                                <span class="home-bidding-type">
                                    {{ $bidding->type }}
                                </span>

                                @if($bidding->posting_date)

                                    <small>
                                        {{ $bidding->posting_date->format('M d, Y') }}
                                    </small>

                                @endif

                            </div>


                            {{-- Title --}}
                            <h3>

                                <a
                                    href="{{ route('biddings.show', $bidding->slug) }}"
                                >
                                    {{ $bidding->title }}
                                </a>

                            </h3>


                            {{-- Reference --}}
                            @if($bidding->reference_no)

                                <div class="home-bidding-reference">

                                    <i class="bi bi-hash"></i>

                                    Reference No.:
                                    <strong>
                                        {{ $bidding->reference_no }}
                                    </strong>

                                </div>

                            @endif


                            {{-- ABC --}}
                            @if($bidding->abc)

                                <div class="home-bidding-detail">

                                    <span>
                                        Approved Budget for the Contract
                                    </span>

                                    <strong>
                                        ₱{{ number_format($bidding->abc, 2) }}
                                    </strong>

                                </div>

                            @endif


                            {{-- Deadline --}}
                            @if($bidding->submission_deadline)

                                <div class="home-bidding-detail">

                                    <span>
                                        Submission Deadline
                                    </span>

                                    <strong>
                                        {{ $bidding->submission_deadline->format('M d, Y h:i A') }}
                                    </strong>

                                </div>


                                {{-- Deadline Status --}}
                                <div class="mt-3">

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


                            {{-- View --}}
                            <div class="home-bidding-footer">

                                <a
                                    href="{{ route('biddings.show', $bidding->slug) }}"
                                >
                                    View Bidding
                                    <i class="bi bi-arrow-right"></i>
                                </a>

                            </div>

                        </article>

                    </div>

                @endforeach

            </div>

        @else

            <div class="home-news-empty">

                <i class="bi bi-file-earmark-text"></i>

                <h3>
                    No Biddings Available
                </h3>

                <p>
                    There are currently no published bidding notices.
                </p>

            </div>

        @endif

    </div>

</section>

   <!-- GOVERNMENT SERVICES -->

<section class="quick-links">


<div class="container">

    {{-- Section Heading --}}
    <div class="section-heading text-center">

        <span>
            <i class="bi bi-grid"></i>
            EXPLORE
        </span>

        <h2>
            Government Services
        </h2>

        <p>
            Access important information, services, and resources
            from the City Government of San Pedro.
        </p>

    </div>


    {{-- Service Cards --}}
    <div class="row g-4">

        {{-- Departments --}}
        <div class="col-lg-3 col-md-6">

            <a href="{{ route('departments') }}" class="quick-link-card">

                <div class="quick-link-icon">
                    <i class="bi bi-building"></i>
                </div>

                <div class="quick-link-content">

                    <h3>
                        Departments
                    </h3>

                    <p>
                        Explore city government offices
                        and departments.
                    </p>

                </div>

                <span class="quick-link-arrow">
                    <i class="bi bi-arrow-right"></i>
                </span>

            </a>

        </div>


        {{-- City Officials --}}
        <div class="col-lg-3 col-md-6">

            <a href="{{ route('city-officials') }}" class="quick-link-card">

                <div class="quick-link-icon">
                    <i class="bi bi-person-badge"></i>
                </div>

                <div class="quick-link-content">

                    <h3>
                        City Officials
                    </h3>

                    <p>
                        Meet the elected and appointed
                        officials of the city.
                    </p>

                </div>

                <span class="quick-link-arrow">
                    <i class="bi bi-arrow-right"></i>
                </span>

            </a>

        </div>


        {{-- Downloads --}}
        <div class="col-lg-3 col-md-6">

            <a href="{{ route('downloads') }}" class="quick-link-card">

                <div class="quick-link-icon">
                    <i class="bi bi-file-earmark-arrow-down"></i>
                </div>

                <div class="quick-link-content">

                    <h3>
                        Downloads
                    </h3>

                    <p>
                        Access forms, documents,
                        and other resources.
                    </p>

                </div>

                <span class="quick-link-arrow">
                    <i class="bi bi-arrow-right"></i>
                </span>

            </a>

        </div>


        {{-- Contact --}}
        <div class="col-lg-3 col-md-6">

            <a href="{{ route('contact') }}">

                <div class="quick-link-icon">
                    <i class="bi bi-telephone"></i>
                </div>

                <div class="quick-link-content">

                    <h3>
                        Contact Us
                    </h3>

                    <p>
                        Find contact information
                        for the City Government.
                    </p>

                </div>

                <span class="quick-link-arrow">
                    <i class="bi bi-arrow-right"></i>
                </span>

            </a>

        </div>

    </div>

</div>


</section>
@endsection