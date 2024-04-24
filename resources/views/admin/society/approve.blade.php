@extends('admin.layouts.app',['title' => $title])
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{$title}}</h4>
        </div>

        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h5><b>Proposer </b> :  {{ $society->proposer }}<br>
                                    <b>Start Date</b> : {{ date('d-m-Y', strtotime($society->start_date)) }}<br>
                                    <b>Policy Id</b> : #{{ $society->id }}<br>
                                    <b>Policy Value</b> : ₹ {{ $society->value }}</h5>


            </div>

            <!-- end card header -->
            <div class="card-body">
                <div class="live-preview">
                     <form action="{{ route('society.approve', $society->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-danger">Enter commission in % from (0-100) </p>
                            </div>
                            @if($society->agent!='')
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="firstNameinput" class="form-label">Agent Commission (CODE : #{{ $society->agent }})</label><span
                                        class="text-danger">*</span>
                                    <input type="number" class="form-control" placeholder="Enter Commission in %"
                                        min="0" min="100" name="agent" required>
                                </div>
                                @error('agent')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                             @endisset

                              @if($society->tl!='')
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="firstNameinput" class="form-label">TL Commission (CODE : #{{ $society->tl }})</label><span
                                        class="text-danger">*</span>
                                    <input type="number" class="form-control" placeholder="Enter Commission in %"
                                        min="0" min="100" name="tl" required>
                                </div>
                                @error('tl')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                             @endisset

                              @if($society->director!='')
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="firstNameinput" class="form-label">Director Commission (CODE : #{{ $society->director }})</label><span
                                        class="text-danger">*</span>
                                    <input type="number" class="form-control" placeholder="Enter Commission in %"
                                        min="0" min="100" name="director" required>
                                </div>
                                @error('director')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                             @endisset

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


        <!-- **************************************************  Edit Form ************************************************** -->

    </div>
</div>

@endsection
