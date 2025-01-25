<x-frontend.layout>
    <!--Start slider-section-->
    <section class="slider-section" style="background-image:url(images/slider/2.jpg);">
        <div class="container">
            <div class="slider">
                <div class="text team-light">
                    <h2> contact <span>with</span> us </h2>
                    <p><a href="{{ route('index') }}">Home</a> <i class="fa fa-angle-right" aria-hidden="true"></i> contact
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--End slider-section-->
    <!-- start blog-section-->
    <section class="contact-section contact-page">
        <div class="container">
            <div class="text-center section-title">
                <h2>contact us</h2>
                <p>We’d love to hear from you!<br>
                    Whether you have questions, suggestions, or would like to get involved, reach out to us.<br>
                    "Stay connected and let’s build something meaningful together. Your voice matters, and together, we
                    can create a brighter future."
                </p>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12">
                    <div class="contact-us">
                        <div class="contaat-item">
                            <div class="icon">
                                <i class="fa fa-home" aria-hidden="true"></i>
                            </div>
                            <div class="text">
                                <h4>Head Office:</h4>
                                <p>Dadeldhura, Nepal
                                </p>
                            </div>
                        </div>
                        <div class="contaat-item con-pd">
                            <div class="icon">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="text">
                                <h4>Email Address:</h4>
                                <p>heartfund@gmail.com
                                </p>
                            </div>
                        </div>
                        <div class="contaat-item con-pd">
                            <div class="icon">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="text">
                                <h4>Phone</h4>
                                <p>+977 9855000000
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 col-sm-12">
                            <div class="clearfix default-form-2">
                                <form id="contact-form" name="contact_form" class="default-form"
                                    action="{{ route('contactMessage') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" name="form_name" value="{{ old('form_name') }}"
                                                    placeholder="Full Name" required="">
                                                @error('form_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input type="email" name="form_email" value="{{ old('form_email') }}"
                                                    placeholder="Email Address" required="">
                                                @error('form_email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="form_subject"
                                                    value="{{ old('form_subject') }}" placeholder="Subject"
                                                    required="">
                                                @error('form_subject')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="form_phone" value="{{ old('form_phone') }}"
                                                    placeholder="Phone" required="">
                                                @error('form_phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group comments">
                                                <textarea name="form_message" placeholder="Detail" required="">{{ old('form_message') }}</textarea>
                                                @error('form_message')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <input id="form_botcheck" name="form_botcheck" class="form-control"
                                                type="hidden" value="">
                                            <button class="btn btn-1" type="submit"
                                                data-loading-text="Please wait...">Contact Now</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End blog-section-->
</x-frontend.layout>
