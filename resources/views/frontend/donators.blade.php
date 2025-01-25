<x-frontend.layout>
    <!--Start slider-section-->
    <section class="slider-section" style="background-image:url(images/slider/2.jpg);">
        <div class="container">
            <div class="slider">
                <div class="text team-light">
                    <h2>our <span>dedicated</span> team</h2>
                    <p><a href="index-2.html">Home</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Team</p>
                </div>
            </div>
        </div>
    </section>
    <!--End slider-section-->
    <!--donator-seciton-->
    <section class="team-seciton team-page">
        <div class="container">
            <div class="row">
                <div class="team-item">
                    @foreach ($donators as $donator)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <!-- Start single-item -->
                            <div class="single-item wow fadeInUp">
                                <div class="img-holder">
                                    <figure><img src="{{ Storage::url($donator->userDetails->profile_img) }}"
                                            alt="Images">
                                    </figure>
                                </div>
                                <div class="text">
                                    <h4><a>{{ $donator->name }}</a></h4>
                                    <p>volunteer</p>
                                </div>
                            </div>
                            <!-- End single-item -->
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="page-list">
                {{ $donators->links() }}
            </div>
        </div>
    </section>
    <!--/donator-seciton-->
</x-frontend.layout>
