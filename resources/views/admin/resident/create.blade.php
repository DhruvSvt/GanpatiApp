@extends('admin.layouts.app',['title' => 'Resident Create'])
@section('content')
<div class="row">
    <div class="col">
        <!-- **************************************************  Create Form ************************************************** -->
        @isset($create)
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Create Resident</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <form action="{{ route('resident.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Full Name</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" placeholder="Enter Fullname" name="name">
                                </div>
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label><span class="text-danger">*</span>
                                    <input type="tel" class="form-control" placeholder="Enter the number" name="phone">
                                </div>
                                @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email Address</label><span class="text-danger">*</span>
                                    <input type="email" class="form-control" placeholder="example@gamil.com"
                                        name="email">
                                </div>
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Password</label><span class="text-danger">*</span>
                                    <input type="password" class="form-control" value=""
                                        placeholder="Enter the password" name="password">
                                </div>
                                @error('password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Resident's ID</label>
                                    <input type="text" class="form-control" placeholder="Enter Resident's ID"
                                        name="resident_id">
                                </div>
                                @error('resident_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="ForminputState" class="form-label">Society</label><span
                                        class="text-danger">*</span>
                                    <select id="ForminputState" class="form-select" data-choices=""
                                        data-choices-sorting="true" name="society">
                                        <option selected="">Choose Society</option>
                                        @foreach ($societies as $society )
                                        <option value="{{ $society->id }}">{{ $society->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('society')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Appartment No.</label>
                                    <input type="text" class="form-control" placeholder="Enter Appartment No."
                                        name="appartment_no">
                                </div>
                                @error('appartment_no')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Residentinal Type</label><span
                                        class="text-danger">*</span>
                                    <select id="ForminputState" class="form-select" data-choices=""
                                        data-choices-sorting="true" name="resident_type">
                                        <option selected="">Choose Residentinal Type</option>
                                        <option value="landlord">Landlord</option>
                                        <option value="tenant">Tenant</option>
                                    </select>
                                </div>
                                @error('resident_type')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>
        @endisset

        <!-- **************************************************  Edit Form ************************************************** -->
        @isset($edit)
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Edit Resident</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <form action="{{ route('resident.update' , $resident->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Full Name</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" value="{{ $resident->name ?? '' }}"
                                        name="name">
                                </div>
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label><span class="text-danger">*</span>
                                    <input type="tel" class="form-control" value="{{ $resident->phone }}" name="phone">
                                </div>
                                @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email Address</label><span class="text-danger">*</span>
                                    <input type="email" class="form-control" value="{{ $resident->email }}"
                                        name="email">
                                </div>
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Password</label><span class="text-danger">*</span>
                                    <input type="password" class="form-control" value=""
                                        placeholder="Enter the password" name="password">
                                </div>
                                @error('password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Resident's ID</label>
                                    <input type="text" class="form-control" value="{{ $resident->resident_id }}"
                                        name="resident_id">
                                </div>
                                @error('resident_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="ForminputState" class="form-label">Society</label><span
                                        class="text-danger">*</span>
                                    <select id="ForminputState" class="form-select" data-choices=""
                                        data-choices-sorting="true" name="society">
                                        <option selected="" value="{{ $resident->society }}">{{
                                            $resident->society_name->name }}</option>
                                        @foreach ($societies as $society )
                                        <option value="{{ $society->id }}">{{ $society->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('society')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Appartment No.</label>
                                    <input type="text" class="form-control" value="{{ $resident->appartment_no }}"
                                        name="appartment_no">
                                </div>
                                @error('appartment_no')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Residentinal Type</label><span
                                        class="text-danger">*</span>
                                    <select id="ForminputState" class="form-select" data-choices=""
                                        data-choices-sorting="true" name="resident_type">
                                        <option selected="" value="{{ $resident->resident_type }}">{{
                                            $resident->resident_type }}</option>
                                        <option value="landlord">Landlord</option>
                                        <option value="tenant">Tenant</option>
                                    </select>
                                </div>
                                @error('resident_type')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div>
        @endisset

    </div>
</div>
@endsection
