@extends('layouts.app')

@section('title', 'Contact Us | City Government of San Pedro')

@section('content')

<section class="page-header">
    <div class="container">

        <span class="page-header-label">
            GET IN TOUCH
        </span>

        <h1>Contact Us</h1>

        <p>
            Contact the City Government of San Pedro for inquiries,
            assistance, and other government concerns.
        </p>

    </div>
</section>


<section class="contact-page py-5">

    <div class="container">

        {{-- Page Introduction --}}
        <div class="section-heading text-center mb-5">

            <span class="section-label">
                CITY GOVERNMENT OF SAN PEDRO
            </span>

            <h2>How Can We Help You?</h2>

            <p>
                For government services, inquiries, and other concerns,
                you may contact the appropriate city government office.
            </p>

        </div>


        {{-- Contact Cards --}}
        <div class="row justify-content-center g-4 contact-cards">

            {{-- City Hall --}}
            <div class="col-sm-10 col-md-4">

                <div class="contact-card h-100">

                    <div class="contact-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>

                    <h3>City Hall</h3>

                    <p>
                        City Government of San Pedro
                    </p>

                    <p class="contact-detail">
                        4F New City Hall Bldg., Brgy. Poblacion,
                        City of San Pedro, Laguna
                    </p>

                </div>

            </div>


            {{-- Telephone --}}
            <div class="col-sm-10 col-md-4">

                <div class="contact-card h-100">

                    <div class="contact-icon">
                        <i class="bi bi-telephone"></i>
                    </div>

                    <h3>Telephone</h3>

                    <p>
                        For general city government inquiries.
                    </p>

                    <p class="contact-detail">

                        <strong>Telephone:</strong><br>

                        <a href="tel:+63288082020">
                            (02) 8808-2020
                        </a>

                    </p>

                </div>

            </div>


            {{-- Email --}}
            <div class="col-sm-10 col-md-4">

                <div class="contact-card h-100">

                    <div class="contact-icon">
                        <i class="bi bi-envelope"></i>
                    </div>

                    <h3>Email</h3>

                    <p>
                        For general inquiries and information requests.
                    </p>

                    <p class="contact-detail">

                        <strong>Email:</strong><br>

                        <a href="mailto:paio.cityofsanpedro@gmail.com">
                            paio.cityofsanpedro@gmail.com
                        </a>

                    </p>

                </div>

            </div>

        </div>


        {{-- Office Information
        <div class="contact-information">

            <div class="contact-info-card">

                <span class="section-label">
                    OFFICE INFORMATION
                </span>

                <h2>
                    City Government of San Pedro
                </h2>

                <p>
                    The City Government of San Pedro provides public
                    services, programs, and assistance to the residents
                    of San Pedro, Laguna.
                </p>


                <div class="contact-list">

                    <div class="contact-list-item">

                        <i class="bi bi-building"></i>

                        <div>
                            <strong>City Hall Address</strong>

                            <span>
                                4F New City Hall Bldg.,
                                Brgy. Poblacion,
                                City of San Pedro, Laguna
                            </span>
                        </div>

                    </div>


                    <div class="contact-list-item">

                        <i class="bi bi-telephone"></i>

                        <div>
                            <strong>Telephone</strong>

                            <span>
                                (02) 8808-2020
                            </span>
                        </div>

                    </div>


                    <div class="contact-list-item">

                        <i class="bi bi-envelope"></i>

                        <div>
                            <strong>General Inquiries</strong>

                            <span>
                                <a href="mailto:paio.cityofsanpedro@gmail.com">
                                    paio.cityofsanpedro@gmail.com
                                </a>
                            </span>
                        </div>

                    </div>

                </div>

            </div>

        </div>  --}}


        {{-- City Hall Map --}}
        <div class="contact-map-section">

            <div class="map-heading text-center">

                <span class="section-label">
                    CITY HALL LOCATION
                </span>

                <h2>Find Us</h2>

                <p>
                    Locate the City Government of San Pedro City Hall
                    in Brgy. Poblacion, San Pedro, Laguna.
                </p>

            </div>


            <div class="contact-map">

                <iframe
                    src="https://www.google.com/maps?q=San+Pedro+City+Hall,+Brgy.+Poblacion,+San+Pedro,+Laguna&output=embed"
                    width="100%"
                    height="400"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>

            </div>

        </div>

    </div>

</section>

@endsection