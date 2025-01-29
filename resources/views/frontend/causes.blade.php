<x-frontend.layout>
    <!--Start slider-section-->
    <section class="slider-section" style="background-image:url(images/slider/2.jpg);">
        <div class="container">
            <div class="slider">
                <div class="text team-light">
                    <h2>our <span>recent</span> causes</h2>
                    <p><a href="{{ route('index') }}">Home</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Causes
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--End slider-section-->
    <!--.welcome-seciton-->
    <section class="welcome-seciton page-causes">
        <div class="container">
            <div class="row">
                @foreach ($campaigns as $campaign)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <!-- Start single-item -->
                        <div class="welcome-item hvr-float-shadow">
                            <div class="img-holder">
                                <figure><a href="{{ route('singleCauses', $campaign->id) }}"><img
                                            src="{{ Storage::url($campaign->charity->logo) }}" alt="Images"></a>
                                </figure>
                                <!-- Start overlay -->
                                <div class="overlay">
                                    <h4><a
                                            href="{{ route('singleCauses', $campaign->id) }}">{{ $campaign->charity->name }}</a>
                                    </h4>
                                </div>
                                <!-- End overlay -->
                            </div>
                            <div class="text">
                                <div class="pro-text">
                                    <h4>{{ $campaign->raised_amt }}</h4><br>
                                    <p>Raised of <span>{{ $campaign->goal_amt }}</span></p>
                                </div>
                                <!--.progress-item -->
                                @php
                                    $percentage = ($campaign->raised_amt / $campaign->goal_amt) * 100;
                                @endphp
                                <div class="causes-progress">
                                    <div class="progress-item">
                                        <div class="progress" data-value="{{ $percentage }}">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                                aria-valuemin="0" aria-valuemax="100">
                                                <div class="value-holder"><span
                                                        class="value">{{ $percentage }}</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /progress-item -->
                                <h4 style="padding-top: 20px; font-weight: bold"">{{ $campaign->title }}</a>
                                    </h3>
                                    <p style="padding-bottom: 2px">Start Date: {{ $campaign->start_date }}</p>
                                    <p style="padding-top: 2px">End Date: {{ $campaign->end_date }}</p>
                                    <a href="{{ route('singleCauses', $campaign->id) }}">Donate now</a>
                            </div>
                        </div>
                        <!-- End single-item -->
                    </div>
                @endforeach
            </div>
            <div class="page-list">
                {{ $campaigns->links() }}
            </div>
        </div>
    </section>
    <!--/wellcome-seciton-->
</x-frontend.layout>
