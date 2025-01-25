<!--.footer-section-->
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="footer-item">
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="widget">
                        <h2>Information</h2>
                        <p>At HeartFund, we believe in the power of compassion and collective effort. Our
                            mission is to extend a helping hand to those in need, empowering communities and
                            changing lives for the better. Together, we can create a brighter future for
                            everyone.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget">
                        <h5><i class="fa fa-map-marker" aria-hidden="true"></i>Dadeldhura, Nepal</h5>
                        <h5><i class="fa fa-envelope-o" aria-hidden="true"></i> heartfund@gmail.com</h5>
                        <h5><i class="fa fa-phone" aria-hidden="true"></i>+977 9855000000</h5>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="gallery-widget">
                        <h2>Gallery Photos</h2>
                        <ul class="gallery">
                            @foreach ($galleries as $gallery)
                                <li>
                                    <div class="img-holder">
                                        <img style="width: 80px; height: 80px; object-fit: cover;"
                                            src="{{ Storage::url($gallery->photo_path) }}" alt="Images">
                                        <div class="overlay">
                                            <div class="box">
                                                <div class="content">
                                                    <a href="{{ route('gallery') }}"><i class="fa fa-link"
                                                            aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p><span><a target="_blank" href="https://www.ajaymahato9988.com.np">HeartFund</a></span> </p>
    </div>
</footer>
<!--/footer-section-->
