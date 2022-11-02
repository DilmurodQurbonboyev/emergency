<div class="container">
    <div class="row">
        @foreach($stats as $stat)
            <div class="col-xl-3 col-md-6">
                <div class="service-in">
                    <div class="service-icon">
                        <img src="{{ $stat->image ?? '' }}">
                    </div>
                    <div class="service-hr"></div>
                    <div class="service-number">
                        <span>{{ $stat->count ?? '' }}</span>
                    </div>
                    <div class="service-text">
                        <span>вызовы, выполненные бригадами за 2022 год</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>
