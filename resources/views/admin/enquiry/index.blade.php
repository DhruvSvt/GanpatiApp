@extends('admin.layouts.app', ['title' => $title])
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">{{ $title }}</h4>
            </div>
            <a href="{{ route('insurances.create') }}">
                <button type="button" class="btn btn-primary bg-gradient waves-effect waves-light mb-3">Create</button>
            </a>
            <div class="card">
                <div class="card-body">
                    <div>
                        @include('admin.inc.search')
                    </div>
                    <div class="live-preview">
                        <div class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">SrNo</th>
                                        <th scope="col">Policy</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">Status</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $currentPage = $items->currentPage() - 1;
                                        $currentPage = $currentPage * $items->perPage();
                                    @endphp
                                    @foreach ($items as $member)
                                        <tr>
                                            <th scope="row">{{ $loop->index + $currentPage + 1 }}</th>

                                            <td>{{ $member->ptype }}</td>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->phone }}</td>
                                            <td>{{ $member->gender }}</td>
                                            <td>{{ $member->dob }}</td>


                                            <td>
                                                <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                                    <input type="checkbox" class="form-check-input" id="customSwitchsizemd"
                                                        data-id="{{ $member->id }}" name="status"
                                                        {{ $member->status == 1 ? 'checked' : '' }}>
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
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
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
                    url: '{{ route('enquiries.status') }}',
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
