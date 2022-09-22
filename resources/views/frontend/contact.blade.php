@extends('frontend.layouts.app')
@section('title')
    {{ tr('Contact') }}
@endsection
@section('content')
    <section class="inner">
        <div class="inner-in">
            <div class="container">
                <div class="inner-out">
                    <div class="inner-name">
                        <span>{{ tr('Contact') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page">
        <div class="container">
            <div class="main-title">
                <div class="main-icon">
{{--                    <img src="{{ asset('img/main.png') }}" alt="main">--}}
                </div>
                <!-- <div class="main-title-in">
                    <span>МАНЗИЛ</span>
                </div> -->
                <div class="main-deacription">
{{--                    <span>Наши врачи руководствуются главным принципом своей работы: «Интересы пациентов — превыше всего!»</span>--}}
                </div>
{{--                <div class="main-hr"></div>--}}
            </div>
            <div class="page-in">
                <div class="row">
                    <div class="offset-xxl-2 col-xxl-8 col-xl-12">
                        <div class="contact">
                            <div class="contact-in">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="contact-data">
                                            <div class="contact-left">
                                                <span>{{ tr('Address') }}:</span>
                                            </div>
                                            <div class="contact-right">
                                                <span>{{ $contact->address ?? '' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="contact-data">
                                            <div class="contact-left">
                                                <span>{{ tr('Phone') }}</span>
                                            </div>
                                            <div class="contact-right">
                                                <a href="#">{{ $contact->phone ?? '' }}</a>
                                            </div>
                                        </div>
                                    </div>
{{--                                    <div class="col-xl-6">--}}
{{--                                        <div class="contact-data">--}}
{{--                                            <div class="contact-left">--}}
{{--                                                <span>{{ tr('Fax') }}:</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="contact-right">--}}
{{--                                                <a href="#">{{ $contact->fax ?? '' }}</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-xl-6">
                                        <div class="contact-data">
                                            <div class="contact-left">
                                                <span>{{ tr('Email') }}:</span>
                                            </div>
                                            <div class="contact-right">
                                                <a href="#">{{ $contact->email ?? '' }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="contact-data">
                                            <div class="contact-left">
                                                <span>{{ tr('Reception') }}:</span>
                                            </div>
                                            <div class="contact-right">
                                                <span>{{ $contact->reception ?? '' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="contact-data">
                                            <div class="contact-left">
                                                <span>{{ tr('Working time') }}:</span>
                                            </div>
                                            <div class="contact-right">
                                                <span>{{ $contact->working_time ?? '' }}</span>
                                            </div>
                                        </div>
                                    </div>
{{--                                    <div class="col-xl-6">--}}
{{--                                        <div class="contact-data">--}}
{{--                                            <div class="contact-left">--}}
{{--                                                <span>{{ tr('Transport') }}:</span>--}}
{{--                                            </div>--}}
{{--                                            <div class="contact-right">--}}
{{--                                                <span>{{tr('Bus')}}: 28, 44, 57, 68, 89, 91, 97, 115, 120, 148</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="map-contact-out">
                                <div class="map-contact" id="map"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('front-js')
    <script type="text/javascript">
        var latitude = <?= $contact->latitude ?>;
        var longitude = <?= $contact->longitude ?>;
        var map = L.map('map', {center: [latitude, longitude], zoom: 13});
        let open_street = L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png");
        let google_street = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {subdomains: ['mt0', 'mt1', 'mt2', 'mt3']});
        let google_satellite = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {subdomains: ['mt0', 'mt1', 'mt2', 'mt3']});
        let google_hybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}', {subdomains: ['mt0', 'mt1', 'mt2', 'mt3']});
        L.marker([41.322793, 69.252550]).addTo(map);

        let baseMaps = {
            "Open Street Map": open_street,
            "Google Streets": google_street,
            "Google Satellite": google_satellite,
            "Google Hybrid": google_hybrid,
        };

        google_street.addTo(map);

        L.control.layers(baseMaps, null, {}).addTo(map);

    </script>
@endpush
