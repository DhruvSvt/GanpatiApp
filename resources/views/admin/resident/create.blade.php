@extends('admin.layouts.app',['title' => $title])
@section('content')
<div class="row">
    <div class="col">
        <!-- **************************************************  Create Form ************************************************** -->
        @isset($create)
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">{{$title}}</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <form action="{{ route('resident.store') }}" method="POST">
                        @csrf
                        <div class="row">

                            <!--end col-->
                             <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Policy Type</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control"   name="name"  >
                                </div>
                                @error('name')
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
                <h4 class="card-title mb-0 flex-grow-1">{{$title}}</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <form action="{{ route('resident.update' , $resident->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Policy Type</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" value="{{ $resident->name ?? '' }}"
                                        name="name"  >
                                </div>
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!--end col-->

                            <!--end col-->



                            <!--end col-->

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
