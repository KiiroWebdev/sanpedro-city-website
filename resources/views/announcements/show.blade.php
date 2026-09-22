@extends('layouts.app')

@section('title', $announcement->title . ' | City Government of San Pedro, Laguna')

@section('content')

<section class="announcement-detail-page">

    <div class="container">

        {{-- Back to Announcements --}}
        <div class="announcement-detail-back">

            <a href="{{ route('announcements.index') }}">
                <i class="bi bi-arrow-left"></i>
                Back to Announcements
            </a>

        </div>


        {{-- Announcement Article --}}
        <article class="announcement-detail-card">

            <div class="announcement-detail-header">

                {{-- Meta --}}
                <div class="announcement-detail-meta">

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


                {{-- Title --}}
                <h1>
                    {{ $announcement->title }}
                </h1>


                {{-- Author --}}
                @if($announcement->author)

                    <div class="announcement-detail-author">

                        <i class="bi bi-person"></i>

                        Published by {{ $announcement->author }}

                    </div>

                @endif

            </div>


            {{-- Article Content --}}
            <div class="announcement-detail-body">

                {{-- Excerpt / Highlight --}}
                @if($announcement->excerpt)

                    <div class="announcement-detail-excerpt">

                        {{ $announcement->excerpt }}

                    </div>

                @endif


                {{-- Full Content --}}
                @if($announcement->content)

                    <div class="announcement-detail-content">

                        {!! nl2br(e($announcement->content)) !!}

                    </div>

                @endif

            </div>


        </article>


        {{-- Bottom Back Button --}}
        <div class="announcement-detail-footer">

            <a
                href="{{ route('announcements.index') }}"
                class="btn btn-primary"
            >
                <i class="bi bi-arrow-left"></i>
                Back to Announcements
            </a>

        </div>

    </div>

</section>

@endsection