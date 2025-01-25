<x-frontend.layout>
    <!--Start slider-section-->
    <section class="slider-section" style="background-image:url(images/blog/9.jpg); position: relative;">
        <div
            style="
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
    ">
        </div>
        <div class="container">
            <div class="slider">
                <div class="text team-light">
                    <h2> Volunteer <span>Registration</span></h2>
                    <p><a href="{{ route('index') }}">Home</a> <i class="fa fa-angle-right" aria-hidden="true"></i>
                        volunteer
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--End slider-section-->
    <!-- start-section-->
    <section class="contact-section contact-page">
        <div class="container">
            <div class="text-center section-title">
                <h2>Volunteer Registration Form</h2>
                <p>Want to become a volunteer!<br>
                    Our team is committed to making a difference through hard work and unwavering dedication.
                    With diverse expertise and a shared passion for helping others, we strive to bring positive
                    change to the lives of those we serve. Together, we work tirelessly to transform challenges into
                    opportunities.
                </p>
            </div>
            <div class="row" style="margin-top: 50px">
                <div class="col-md-10 col-md-offset-1 col-sm-12">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 col-sm-12">
                            <div class="clearfix default-form-2">
                                <form id="volunteer-form" name="volunteer_form" class="default-form"
                                    action="{{ route('volunteerStore') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <!-- Name -->
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" name="name" value="{{ old('name') }}"
                                                    placeholder="Full Name" required="">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Email -->
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input type="email" name="email" value="{{ old('email') }}"
                                                    placeholder="Email Address" required="">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Phone -->
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" name="phone" value="{{ old('phone') }}"
                                                    placeholder="Phone">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Address -->
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" name="address" value="{{ old('address') }}"
                                                    placeholder="Address">
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Country -->
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" name="country" value="{{ old('country') }}"
                                                    placeholder="Country">
                                                @error('country')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Blood Group -->
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" name="blood_group"
                                                    value="{{ old('blood_group') }}" placeholder="Blood Group">
                                                @error('blood_group')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Profile Image -->
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label for="profile_img">Profile Image</label>
                                                <input type="file" name="profile_img" id="profile_img"
                                                    accept="image/*">
                                                @error('profile_img')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Social Media Links -->
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" name="facebook" value="{{ old('facebook') }}"
                                                    placeholder="Facebook Profile Link">
                                                @error('facebook')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" name="insta" value="{{ old('insta') }}"
                                                    placeholder="Instagram Profile Link">
                                                @error('insta')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" name="linkedin" value="{{ old('linkedin') }}"
                                                    placeholder="LinkedIn Profile Link">
                                                @error('linkedin')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Submit Button -->
                                        <div class="col-md-12">
                                            <button class="btn btn-1" type="submit"
                                                data-loading-text="Please wait...">Submit</button>
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
    <!--End-section-->
</x-frontend.layout>
