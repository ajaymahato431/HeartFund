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
                                aria-selected="false">Settings</a>
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
                                        <div class="p-0 card-body">
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
                                        <div class="text-right card-footer">
                                            <nav class="d-inline-block">
                                                {{ $donations->links('pagination::bootstrap-4') }}
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                            <form method="POST" action="{{ route('profile.update') }}" class="needs-validation"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="card-header">
                                    <h4>Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label for="name">Full Name</label>
                                            <input class="form-control" id="name" type="text" name="name"
                                                :value="old('name')" required autofocus autocomplete="name"
                                                value="{{ auth()->user()->name }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label for="email">Email</label>
                                            <input id="email" class="form-control" type="email" name="email"
                                                :value="old('email')" value="{{ auth()->user()->email }}" required
                                                autocomplete="username">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label for="phone">Phone</label>
                                            <input id="phone" class="form-control" type="text" name="phone"
                                                :value="old('phone')"
                                                value="{{ auth()->user()->userDetails->phone }}" required>
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label for="address">Address</label>
                                            <input id="address" class="form-control" type="text" name="address"
                                                :value="old('address')"
                                                value="{{ auth()->user()->userDetails->address }}" required>
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label for="country">Country</label>
                                            <input id="country" class="form-control" ype="text" name="country"
                                                :value="old('country')"
                                                value="{{ auth()->user()->userDetails->country }}" required>
                                            @error('country')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label for="blood_group">Blood Group</label>
                                            <input id="blood_group" class="form-control" type="text"
                                                name="blood_group" :value="old('blood_group')"
                                                value="{{ auth()->user()->userDetails->blood_group }}" required>
                                            @error('blood_group')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label for="profile_img">Profile Image</label>
                                            <input id="profile_img" class="form-control" type="file"
                                                name="profile_img"
                                                value="{{ auth()->user()->userDetails->profile_img }}">
                                            @error('profile_img')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right card-footer">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>

                            <form method="POST" action="{{ route('password.update') }}" class="needs-validation">
                                @csrf
                                @method('put')
                                <div class="card-header">
                                    <h4>Update Password</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label for="update_password_current_password">Current Password</label>
                                            <input id="update_password_current_password" name="current_password"
                                                type="password" autocomplete="current-password" class="form-control">
                                            @error('current_password', 'updatePassword')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label for="update_password_password">New Password</label>
                                            <input id="update_password_password" name="password" type="password"
                                                autocomplete="new-password" class="form-control">
                                            @error('password', 'updatePassword')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12 col-12">
                                            <label for="update_password_password_confirmation">Confirm Password</label>
                                            <input id="update_password_password_confirmation"
                                                name="password_confirmation" type="password"
                                                autocomplete="new-password" class="form-control">
                                            @error('password_confirmation', 'updatePassword')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right card-footer">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-user.layout>
