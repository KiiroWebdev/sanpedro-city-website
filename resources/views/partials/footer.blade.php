<footer class="site-footer">

    <div class="container">

        <div class="row g-4 align-items-start">

            {{-- Government Information --}}
            <div class="col-lg-7 col-md-6">

                <div class="footer-brand">

                    <div class="footer-logos">

    {{-- City Government Seal --}}
    <img
        src="{{ asset('images/city-logo.png') }}"
        alt="City Government of San Pedro"
        class="footer-city-logo"
    >

    {{-- Una sa Laguna --}}
    <img
        src="{{ asset('images/una-sa-laguna-white.png') }}"
        alt="Lungsod ng San Pedro - Una sa Laguna"
        class="footer-una-logo"
    >

    {{-- Bagong Pilipinas --}}
    <img
        src="{{ asset('images/bagong-pilipinas.png') }}"
        alt="Bagong Pilipinas"
        class="footer-bagong-logo"
    >

</div>

                    <h5>
                        City Government of San Pedro
                    </h5>

                    <p>
                        Laguna, Philippines
                    </p>

                    <p class="mb-0">
                        Serving the San Pedrense community.
                    </p>

                </div>

            </div>


            {{-- Quick Links --}}
            <div class="col-lg-5 col-md-6">

                <div class="footer-links">

                    <h6>
                        Quick Links
                    </h6>

                    <a href="{{ route('services.index') }}">
                        <i class="bi bi-chevron-right"></i>
                        Government Services
                    </a>

                    <a href="{{ route('departments') }}">
                        <i class="bi bi-chevron-right"></i>
                        Departments & Offices
                    </a>

                    <a href="{{ route('city-officials') }}">
                        <i class="bi bi-chevron-right"></i>
                        City Officials
                    </a>

                    <a href="{{ route('downloads') }}">
                        <i class="bi bi-chevron-right"></i>
                        Downloads
                    </a>

                    <a href="{{ route('contact') }}">
                        <i class="bi bi-chevron-right"></i>
                        Contact Us
                    </a>

                </div>

            </div>

        </div>


        <hr>


        {{-- Copyright --}}
        <div class="footer-bottom text-center">

            <small>
                © {{ date('Y') }} City Government of San Pedro, Laguna.
                All Rights Reserved.
            </small>

        </div>

    </div>

</footer>