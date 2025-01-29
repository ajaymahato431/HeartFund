<x-frontend.layout>
    <!--Start slider-section-->
    <section class="slider-section"
        style="background-image:url({{ Storage::url($campaign->featured_img) }}); position: relative;">
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
                    <h2> {{ $campaign->title }}</span></h2>
                    <p><a href="{{ route('index') }}">Home</a> <i class="fa fa-angle-right" aria-hidden="true"></i>
                        Causes
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
                <div class="col-md-12 col-sm-8 col-xs-12">
                    <!-- Start single-item -->
                    <div class="causes-item">
                        <div class="img-holder">
                            <figure style="text-align: center"><img src="{{ Storage::url($campaign->featured_img) }}"
                                    style="height: 500px" alt="Images">
                            </figure>
                            <h5><i class="fa fa-user" aria-hidden="true"></i>By
                                <span>{{ $campaign->charity->creator->name }} </span>
                            </h5>
                            {{-- <h5><i class="fa fa-map-marker" aria-hidden="true"></i>Cause in <span> Rohingya</span></h5> --}}
                        </div>
                        <div class="clearfix text text-bg">
                            <h2>{{ $campaign->title }}</h2>
                            <h4 style="font-weight: bolder">{{ $campaign->start_date }} to {{ $campaign->end_date }}
                            </h4>

                            <div class="pro-text">
                                <h4>${{ $campaign->raised_amt }}</h4>
                                <p>Raised of <span>${{ $campaign->goal_amt }}</span></p>
                            </div>
                            <!--.progress-item -->
                            @php
                                $percentage = ($campaign->raised_amt / $campaign->goal_amt) * 100;
                            @endphp
                            <div class="causes-progress" style="margin-top: 50px">
                                <div class="progress-item">
                                    <div class="progress" data-value="{{ $percentage }}">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                            aria-valuemin="0" aria-valuemax="100">
                                            <div class="value-holder"><span class="value">{{ $percentage }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /progress-item -->

                            <h4 style="font-weight: bolder; margin-top: 40px;">Campaing Description:</h4>
                            <p>{!! $campaign->description !!}</p>

                            {{-- <h2 style="font-weight: bolder; margin-top: 40px;">About Charity:</h2> --}}
                            <h3 style="text-align: center; margin-top: 60px;">{{ $campaign->charity->name }}</h3>
                            <div class="img-holder">
                                <figure style="text-align: center"><img
                                        src="{{ Storage::url($campaign->charity->logo) }}" style="height: 300px"
                                        alt="Images">
                                </figure>
                            </div>
                            <h4 style="font-weight: bolder; margin-top: 40px;">Charity Description:</h4>
                            <p>{!! $campaign->charity->description !!}</p>

                            <h4 style="font-weight: bolder; margin-top: 20px;">Contact Informatio:</h4>
                            <p>Cotact Phone: {{ $campaign->charity->contact_phone }}</p>
                            <p>Cotact Email: {{ $campaign->charity->contact_email }}</p>
                            <p>Website: <a href="{{ $campaign->charity->website_url }}"
                                    target="_blank">{{ $campaign->charity->website_url }}</a>
                            </p>

                            <h4 style="font-weight: bolder; margin-top: 40px;">Donation QR Code:</h4>
                            <div class="img-holder">
                                <figure style="text-align: center"><img src="{{ Storage::url($campaign->bank_qr) }}"
                                        style="height: 300px" alt="Images">
                                </figure>
                            </div>

                            <div class="row" style="margin-top: 100px; margin-bottom: 50px;">
                                <div class="col-md-8 col-md-offset-2 col-sm-12">
                                    <div class="clearfix default-form-2">
                                        <h3 style="text-align: center">Donation Form</h3>
                                        <form id="donation-form" name="donation_form" class="default-form"
                                            action="{{ route('donationStore') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <!-- Hidden Fields -->
                                            <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
                                            <input type="hidden" name="user_id"
                                                value="{{ auth()->check() ? auth()->id() : '' }}">

                                            <!-- Amount Input -->
                                            <div class="form-group">
                                                <input type="number" name="amount" value="{{ old('amount') }}"
                                                    placeholder="Donation Amount (e.g., 5000.00)" step="0.01"
                                                    required="">
                                                @error('amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Payment Method Selection -->
                                            <div class="form-group">
                                                <select name="payment_method" required="">
                                                    <option value="" disabled selected>Choose Payment
                                                        Method
                                                    </option>
                                                    <option value="card"
                                                        {{ old('payment_method') == 'card' ? 'selected' : '' }}>
                                                        Card</option>
                                                    <option value="bank_transfer"
                                                        {{ old('payment_method') == 'bank_transfer' ? 'selected' : '' }}>
                                                        Bank
                                                        Transfer</option>
                                                    <option value="cash"
                                                        {{ old('payment_method') == 'cash' ? 'selected' : '' }}>
                                                        Cash</option>
                                                    <option value="esewa"
                                                        {{ old('payment_method') == 'esewa' ? 'selected' : '' }}>
                                                        eSewa
                                                    </option>
                                                    <option value="khalti"
                                                        {{ old('payment_method') == 'khalti' ? 'selected' : '' }}>
                                                        Khalti</option>
                                                    <option value="imepay"
                                                        {{ old('payment_method') == 'imepay' ? 'selected' : '' }}>
                                                        IME
                                                        Pay</option>
                                                </select>
                                                @error('payment_method')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Transaction Proof Upload -->
                                            <div class="form-group">
                                                <label for="transaction_proof">Transaction Proof
                                                    (optional)</label>
                                                <input type="file" name="transaction_proof" id="transaction_proof"
                                                    accept="image/*,application/pdf">
                                                @error('transaction_proof')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Donor Message -->
                                            <div class="form-group comments">
                                                <textarea name="donor_message" placeholder="Message (optional)">{{ old('donor_message') }}</textarea>
                                                @error('donor_message')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="form-group">
                                                <button class="btn btn-1" type="button" id="submit-button"
                                                    data-loading-text="Please wait...">Donate Now</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <script>
                                document.getElementById('submit-button').addEventListener('click', function() {
                                    @if (auth()->check())
                                        // Submit the form if the user is logged in
                                        document.getElementById('donation-form').submit();
                                    @else
                                        // Redirect to login page if the user is not logged in
                                        window.location.href = "{{ route('login') }}";
                                    @endif
                                });
                            </script>

                        </div>
                        <div class="clearfix item-left">
                            <div class="section-title">
                                <h2><span>Donator of </span>this cause</h2>
                                <p>Our donors fuel our mission with their generosity, enabling us to uplift communities
                                    and create
                                    lasting positive change. Together, we bring hope and make a difference. </p>
                            </div>
                            <h4>Join Our Campaign to become <span>Donator:</span></h4>
                            <div class="row">
                                @foreach ($donators as $donator)
                                    <div class="col-md-4 col-sm-4">
                                        <div class="donator">
                                            <div class="img-holder">
                                                <figure>
                                                    <img src="{{ $donator->userDetails && $donator->userDetails->profile_img ? Storage::url($donator->userDetails->profile_img) : asset('images/blankprofile.webp') }}"
                                                        style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;"
                                                        alt="Profile Image">
                                                </figure>

                                            </div>
                                            <div class="donator-text">
                                                <h4>{{ $donator->name }}</h4>
                                                <a href="#">Donator</a>
                                                <h5>Donated :
                                                    {{ $donator->donations->where('campaign_id', $campaign->id)->sum('amount') }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <!-- End single-item -->
                </div>

            </div>
        </div>
    </section>
    <!--/wellcome-seciton-->
</x-frontend.layout>
