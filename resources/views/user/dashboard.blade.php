<x-user.layout>
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-4">
            <div class="card author-box">
                <div class="card-body">
                    <div class="author-box-center">
                        <img alt="image" src="{{ Storage::url(optional(auth()->user()->userDetails)->profile_img) }}"
                            class="rounded-circle author-box-picture">
                        <div class="clearfix"></div>
                        <div class="author-box-name">
                            <a href="#">{{ auth()->user()->name }}</a>
                        </div>
                        <div class="author-box-job">{{ auth()->user()->email }}</div>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Personal Details</h4>
                </div>
                <div class="card-body">
                    <div class="py-4">
                        <p class="clearfix">
                            <span class="float-left">
                                Address
                            </span>
                            <span class="float-right text-muted">
                                {{ auth()->user()->userDetails->address }}
                            </span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">
                                Country
                            </span>
                            <span class="float-right text-muted">
                                <a href="#">{{ auth()->user()->userDetails->country }}</a>
                            </span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">
                                Blood Group
                            </span>
                            <span class="float-right text-muted">
                                <a href="#">{{ auth()->user()->userDetails->blood_group }}</a>
                            </span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">
                                Phone
                            </span>
                            <span class="float-right text-muted">
                                {{ auth()->user()->userDetails->phone }}
                            </span>
                        </p>
                        <p class="clearfix">
                            <span class="float-left">
                                Mail
                            </span>
                            <span class="float-right text-muted">
                                {{ auth()->user()->email }}
                            </span>
                        </p>

                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-md-12 col-lg-8">
            <div class="card">
                <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                                aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                                aria-selected="false">Setting</a>
                        </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                        <div class="tab-pane fade show active" id="about" role="tabpanel"
                            aria-labelledby="home-tab2">
                            <div class="row">
                                <div class="col-md-3 col-6 b-r">
                                    <strong>Full Name</strong>
                                    <br>
                                    <p class="text-muted">{{ auth()->user()->name }}</p>
                                </div>
                                <div class="col-md-3 col-6 b-r">
                                    <strong>Mobile</strong>
                                    <br>
                                    <p class="text-muted">{{ auth()->user()->userDetails->phone }}</p>
                                </div>
                                <div class="col-md-3 col-6 b-r">
                                    <strong>Email</strong>
                                    <br>
                                    <p class="text-muted">{{ auth()->user()->email }}</p>
                                </div>
                                <div class="col-md-3 col-6">
                                    <strong>Location</strong>
                                    <br>
                                    <p class="text-muted">{{ auth()->user()->userDetails->country }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Donations</h4>
                                        </div>
                                        @php
                                            $donations = auth()->user()->donations()->paginate(5);
                                        @endphp
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-md">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Charity</th>
                                                        <th>Campaign</th>
                                                        <th>Amount</th>
                                                        <th>Payment Method</th>
                                                        <th>Status</th>
                                                        <th>Transaction Proof</th>
                                                    </tr>

                                                    @if ($donations->isNotEmpty())
                                                        @foreach ($donations as $donation)
                                                            <tr>
                                                                <td>{{ ($donations->currentPage() - 1) * $donations->perPage() + $loop->iteration }}
                                                                </td>

                                                                <td>{{ $donation->campaign->charity->name }}</td>
                                                                <td>{{ $donation->campaign->title }}</td>
                                                                <td>{{ $donation->amount }}</td>
                                                                <td>{{ $donation->payment_method }}</td>
                                                                <td>
                                                                    @if ($donation->payment_status == 'pending')
                                                                        <span class="badge badge-warning">Pending</span>
                                                                    @elseif ($donation->payment_status == 'completed')
                                                                        <span
                                                                            class="badge badge-success">Completed</span>
                                                                    @else
                                                                        <span class="badge badge-danger">Rejected</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a href="{{ Storage::url($donation->transaction_proof) }}"
                                                                        target="_blank" class="btn btn-primary">View</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="7" class="text-center">No donations found.
                                                            </td>
                                                        </tr>
                                                    @endif

                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <nav class="d-inline-block">
                                                {{ $donations->links('pagination::bootstrap-4') }}
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                            <form method="post" class="needs-validation">
                                <div class="card-header">
                                    <h4>Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" value="John">
                                            <div class="invalid-feedback">
                                                Please fill in the first name
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" value="Deo">
                                            <div class="invalid-feedback">
                                                Please fill in the last name
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-7 col-12">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="test@example.com">
                                            <div class="invalid-feedback">
                                                Please fill in the email
                                            </div>
                                        </div>
                                        <div class="form-group col-md-5 col-12">
                                            <label>Phone</label>
                                            <input type="tel" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Bio</label>
                                            <textarea class="form-control summernote-simple">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur voluptatum alias molestias minus quod dignissimos.</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group mb-0 col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="remember" class="custom-control-input"
                                                    id="newsletter">
                                                <label class="custom-control-label" for="newsletter">Subscribe to
                                                    newsletter</label>
                                                <div class="text-muted form-text">
                                                    You will get new information about products, offers and promotions
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-user.layout>
