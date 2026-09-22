@extends('layouts.app')

@section('title', 'News & Updates | City Government of San Pedro, Laguna')

@section('content')

<section class="news-page">

    <div class="container">

        {{-- Page Header --}}
        <div class="news-page-header">
            <span class="news-page-label">
                <i class="bi bi-newspaper"></i>
                News & Updates
            </span>

            <h1>Latest News & Updates</h1>

            <p>
                Stay informed about the latest activities, announcements,
                programs, and updates from the City Government of San Pedro.
            </p>
        </div>

        {{-- News Grid --}}
        @if($posts->count())

            <div class="row g-4 justify-content-center">

                @foreach($posts as $post)

                    <div class="col-lg-4 col-md-6">

                        <article class="news-card h-100">

                            {{-- Featured Image --}}
                            <a
                                href="{{ route('news.show', $post->slug) }}"
                                class="news-card-image"
                            >
                                <img
                                    src="{{ $post->featured_image
                                        ? asset('images/' . $post->featured_image)
                                        : asset('images/city-hall.jpg') }}"
                                    alt="{{ $post->title }}"
                                    loading="lazy"
                                >
                            </a>

                            {{-- Card Content --}}
                            <div class="news-card-body">

                                <div class="news-card-meta">

                                    <span class="news-category">
                                        {{ $post->category }}
                                    </span>

                                    @if($post->published_at)
                                        <span class="news-date">
                                            <i class="bi bi-calendar3"></i>
                                            {{ $post->published_at->format('F d, Y') }}
                                        </span>
                                    @endif

                                </div>

                                <h2 class="news-card-title">
                                    <a href="{{ route('news.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>

                                @if($post->excerpt)
                                    <p class="news-card-excerpt">
                                        {{ $post->excerpt }}
                                    </p>
                                @endif

                                <a
                                    href="{{ route('news.show', $post->slug) }}"
                                    class="news-read-more"
                                >
                                    Read More
                                    <i class="bi bi-arrow-right"></i>
                                </a>

                            </div>

                        </article>

                    </div>

                @endforeach

            </div>

            {{-- Pagination --}}
            @if($posts->hasPages())

                <div class="news-pagination">
                    {{ $posts->links() }}
                </div>

            @endif

        @else

            {{-- Empty State --}}
            <div class="news-empty">

                <div class="news-empty-icon">
                    <i class="bi bi-newspaper"></i>
                </div>

                <h2>No News Available</h2>

                <p>
                    There are currently no published news and updates.
                    Please check back later.
                </p>

                <a href="{{ url('/') }}" class="btn btn-primary">
                    <i class="bi bi-house"></i>
                    Back to Home
                </a>

            </div>

        @endif

    </div>

</section>

@endsection