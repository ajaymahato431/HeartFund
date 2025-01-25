<x-frontend.layout>
    <!--Start slider-section-->
    <section class="slider-section" style="background-image:url(images/slider/2.jpg);">
        <div class="container">
            <div class="slider">
                <div class="text team-light">
                    <h2>our <span> great </span> memories </h2>
                    <p><a href="{{ route('index') }}">Home</a> <i class="fa fa-angle-right" aria-hidden="true"></i> Gallery
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--End slider-section-->
    <!--Start gallery-section-->
    <section class="gallery-section">
        <div class="container">
            <div class="sortable-masonry">
                {{-- <div class="text-center filters">
                    <ul class="clearfix filter-tabs filter-btns">
                        <li class="active filter" data-role="button" data-filter=".all"><span class="txt">all</span>
                        </li>
                        <li class="filter" data-role="button" data-filter=".food"><span class="txt">food</span></li>
                        <li class="filter" data-role="button" data-filter=".education"><span
                                class="txt">education</span></li>
                        <li class="filter" data-role="button" data-filter=".others"><span class="txt">others</span>
                        </li>

                    </ul>
                </div> --}}
                <div class="row items-container">
                    @foreach ($galleries as $gallery)
                        <div class="col-md-3 col-sm-6 col-xs-12 all food education">
                            <!-- Start single-item -->
                            <div class="gallery-item">
                                <div class="img-holder">
                                    <figure><img src="{{ Storage::url($gallery->photo_path) }}" alt="Images"></figure>
                                    <!-- Start overlay -->
                                    <div class="overlay">
                                        <a class="html5lightbox" href="{{ Storage::url($gallery->photo_path) }}"
                                            data-showsocial="false"
                                            data-thumbnail="{{ Storage::url($gallery->photo_path) }}" data-group="set1"
                                            data-width="800" data-height="600">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <!-- End overlay -->
                                </div>
                                <h4>{{ $gallery->title }}</h4>
                            </div>
                            <!-- End single-item -->
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="page-list">
                {{ $galleries->links() }}
            </div>
        </div>
    </section>
    <!--End Gallery Section-->
</x-frontend.layout>
