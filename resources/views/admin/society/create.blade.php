@extends('admin.layouts.app',['title' => $title])
@section('content')
<div class="row">
    <div class="col">
        <!-- **************************************************  Create Form ************************************************** -->
        @isset($isCreate)
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Create Society</h4>
            </div>
            <!-- end card header -->
            <div class="card-body">
                <div class="live-preview">
                    <form action="{{ route('society.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="firstNameinput" class="form-label">Name</label><span
                                        class="text-danger">*</span>
                                    <input type="text" class="form-control" placeholder="Enter the Society Name"
                                        name="name">
                                </div>
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="firstNameinput" class="form-label">No. of Appartments</label>
                                    <input type="number" class="form-control" placeholder="Enter No. of Appartments"
                                        min="0" name="total_appartments">
                                </div>
                                @error('total_appartments')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phonenumberInput" class="form-label">City</label><span
                                        class="text-danger">*</span>
                                    <input type="text" class="form-control" placeholder="Enter the City" name="city">
                                </div>
                                @error('city')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="emailidInput" class="form-label">Address</label><span
                                        class="text-danger">*</span>
                                    <input type="text" class="form-control" placeholder="Enter the Address"
                                        name="address">
                                </div>
                                @error('address')
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
        @isset($isEdit)
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Edit Society</h4>
            </div>
            <!-- end card header -->
            <div class="card-body">
                <div class="live-preview">
                    <form action="{{ route('society.update',$society->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="firstNameinput" class="form-label">Name</label><span
                                        class="text-danger">*</span>
                                    <input type="text" class="form-control" value="{{ $society->name }}"
                                        name="name">
                                </div>
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="firstNameinput" class="form-label">No. of Appartments</label>
                                    <input type="number" class="form-control" value="{{ $society->total_appartments }}"
                                        min="0" name="total_appartments">
                                </div>
                                @error('total_appartments')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phonenumberInput" class="form-label">City</label><span
                                        class="text-danger">*</span>
                                    <input type="text" class="form-control" value="{{ $society->city }}" name="city">
                                </div>
                                @error('city')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="emailidInput" class="form-label">Address</label><span
                                        class="text-danger">*</span>
                                    <input type="text" class="form-control" value="{{ $society->address }}"
                                        name="address">
                                </div>
                                @error('address')
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
