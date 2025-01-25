<x-frontend.layout>
    <!--Start slider-section-->
    <section class="slider-section" style="background-image:url(images/slider/2.jpg);">
        <div class="container">
            <div class="slider">
                <div class="text">
                    <h2>Save <span>people’s</span> Life</h2>
                    <p><a href="{{ route('index') }}">Home</a> <i class="fa fa-angle-right" aria-hidden="true"></i> About
                        Us</p>
                </div>
            </div>
        </div>
    </section>
    <!--End slider-section-->
    <!--.video-seciton-->
    <section class="video-seciton">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!-- Start single-item -->
                    <div class="single-item">
                        <h2>who we <span>are?</span></h2>
                        <h4>We help children:</h4>
                        <p>At HeartFund, we are dedicated to changing lives and making a positive impact in the world.
                            Through kindness, collaboration, and tireless efforts, we aim to bring hope and support to
                            those in need.
                        </p>
                    </div>
                    <!-- End single-item -->
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!-- video-preview start -->
                    <div class="video-preview" style="background-image:url(images/blog/bg7.jpg);">
                        <ul class="text-center v-container">
                            <li>
                                <a href="https://www.youtube.com/watch?v=TqhNILVX8IE" class="html5lightbox"><i
                                        class="fa fa-play" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/watch?v=TqhNILVX8IE" class="html5lightbox"
                                    id="watch-video"></a>
                            </li>
                        </ul>
                    </div>
                    <!-- video-preview end -->
                </div>
            </div>
        </div>
    </section>
    <!--/video-seciton-->
    <!--.mission-seciton-->
    <section class="mission-seciton">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <!-- Start single-item -->
                    <div class="mission-item ab-item">
                        <i class="flaticon-medical"></i>
                        <h4><a href="#">give donation</a></h4>
                        <p>Your generosity can transform lives. Every donation makes a difference and helps us continue
                            our mission to support those in need. Join us in bringing hope and relief to vulnerable
                            communities.
                        </p>
                    </div>
                    <!-- End single-item -->
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <!-- Start single-item -->
                    <div class="mission-item ab-item">
                        <i class="flaticon-heart-3"></i>
                        <h4><a href="#">become volunteer</a></h4>
                        <p>Be the change you want to see. Join our team of passionate volunteers and contribute your
                            time, energy, and skills to make a lasting impact. Together, we can achieve incredible
                            things.
                        </p>
                    </div>
                    <!-- End single-item -->
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <!-- Start single-item -->
                    <div class="mission-item ab-item">
                        <i class="flaticon-heart"></i>
                        <h4><a href="#">fund raising</a></h4>
                        <p>Support our fundraising initiatives to create sustainable solutions for pressing social
                            issues. Your contributions will directly impact lives and help us achieve our goals.
                        </p>
                    </div>
                    <!-- End single-item -->
                </div>
            </div>
        </div>
    </section>
    <!--/mission-seciton-->
    <!--Start volunteer-section -->
    <section class="volunteer-section ab-mar" style="background-image:url(images/blog/bg6.jpg);">
        <div class="container">
            <div class="volunteer-item">
                <div class="text-center section-title">
                    <h2>WE HELP many people</h2>
                    <h4>want to become a <span> volunteer!</span></h4>
                </div>
                <p>Join us in making a difference!<br>
                    Sit calmly and embrace meaningful progress. Work steadily with focus and dedication. Together, we
                    can create a brighter future.
                </p>
                <a href="#" class="btn-3">Apply now</a>
            </div>
        </div>
    </section>
    <!--End volunteer-section -->
    <!--.team-seciton-->
    <section class="team-seciton pad-top">
        <div class="container">
            <div class="text-center section-title">
                <h2>dadicated <span>team</span></h2>
                <p>Our team is committed to making a difference through hard work and unwavering dedication. <br>With
                    diverse expertise and a shared passion for helping others, we strive to bring positive change to
                    the<br>
                    lives of those we serve. Together, we work tirelessly to transform challenges into opportunities.
                </p>
            </div>
            <div class="row">
                <div class="teamcarosule">
                    @foreach ($volunteers as $volunteer)
                        <div class="team-item">
                            <!-- Start single-item -->
                            <div class="single-item wow fadeInUp">
                                <div class="img-holder">
                                    <figure><img src="{{ asset(Storage::url($volunteer->profile_img)) }}"
                                            alt="Images"></figure>
                                    <!-- Start overlay -->
                                    <div class="overlay">
                                        <div class="link-icon">
                                            <ul class="link">
                                                <li>
                                                    <a href="{{ $volunteer->facebook }}"><i class="fa fa-facebook"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ $volunteer->insta }}"><i class="fa fa-instagram"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                                <li>
                                                    <a href="{{ $volunteer->linkedin }}"><i class="fa fa-linkedin"
                                                            aria-hidden="true"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End overlay -->
                                </div>
                                <div class="text">
                                    <h4><a href="#">{{ $volunteer->name }}</a></h4>
                                    <p>volunteer</p>
                                </div>
                            </div>
                            <!-- End single-item -->
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!--/team-seciton-->
</x-frontend.layout>
