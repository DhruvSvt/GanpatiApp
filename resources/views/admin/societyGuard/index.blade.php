@extends('admin.layouts.app',['title' => 'Agent Details'])
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Agent Details</h4>
        </div>
        {{-- <a href="{{ route('guard.create') }}">
            <button type="button" class="btn btn-primary bg-gradient waves-effect waves-light mb-3">Create</button>
        </a> --}}
        <div class="card">
            <div class="card-body">
               <div>
                                 @include('admin.inc.search')
                            </div>
                <div class="live-preview">
                    <div class="table-responsive">
                         <table class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                        <thead>
                                <tr>
                                    <th scope="col">SrNo</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Agent Code</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">PAN</th>
                                    <th scope="col">Commission</th>
                                    <th scope="col">Director</th>
                                    <th scope="col">TL</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                               <tbody>
                                 @php
                                $currentPage = $items->currentPage()-1;
                                $currentPage = $currentPage*$items->perPage();
                            @endphp
                                @foreach ($items as $member)
                                <tr>
                                     <th scope="row">{{ $loop->index+$currentPage+1 }}</th>
                                     <td><img class="header-profile-user rounded-circle shadow-4-strong" src="{{ Storage::url($member->profile_dp) }}"
                        onerror="this.onerror=null;this.src='{{ config('app.url') }}/assets/images/user-badge-vector-removebg-preview.png';"
                             alt="Header Avatar"></td>
                                    <td><b>{{ $member->user_id }}</b></td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->phone }}</td>
                                    <td>{{ $member->email }}</td>
                                     <td>{{ $member->PAN }}</td>
                                     <td><mark>₹ {{ $member->commision }}</mark></td>
                                     <td>{{ $member->director }}</td>
                                      <td>{{ $member->tlname }}</td>
                                    <td>
                                        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd"
                                                data-id="{{ $member->id }}" name="status" {{ $member->status == 1 ?
                                            'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('guard.edit',$member->id) }}" class="action-icon">
                                                <i class="ri-edit-box-line" style="font-size: 20px"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- end table -->
                    </div>
                    <!-- end table responsive -->
                </div>
                    <div>
                                 @include('admin.inc.pagination')
                            </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div>
@endsection
@section('scripts')
<script>
    @if(Session::has('message'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }
            toastr.error("{{ session('error') }}");
    @endif
</script>

<script>
    // Ajax Request
    $(document).ready(function() {
        $('.form-check-input').change(function() {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let userId = $(this).data('id');
            $.ajax({
                type: "POST", // Change this to POST
                dataType: "json",
                url: '{{ route('guard.status') }}',
                data: {
                    '_token': '{{ csrf_token() }}', // Add the CSRF token
                    'status': status,
                    'user_id': userId
                },
                success: function(data) {
                    console.log(data.message);
                }
            });
        });
    });
</script>
@endsection
