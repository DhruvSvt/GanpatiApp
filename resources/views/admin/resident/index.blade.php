@extends('admin.layouts.app',['title' => 'Resident Details'])
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Resident Details</h4>
        </div>
        {{-- <a href="{{ route('resident.create') }}">
            <button type="button" class="btn btn-primary bg-gradient waves-effect waves-light mb-3">Create</button>
        </a> --}}
        <div class="card">
            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Society</th>
                                    <th scope="col">Appartment No.</th>
                                    <th scope="col">Resident ID</th>
                                    <th scope="col">Resident Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($residents as $resident)
                                <tr>
                                    <td>{{ $resident->name }}</td>
                                    <td>{{ $resident->phone }}</td>
                                    <td>{{ $resident->email }}</td>
                                    <td>{{ $resident->society_name->name ?? '' }}</td>
                                    <td>{{ $resident->appartment_no }}</td>
                                    <td>{{ $resident->resident_id }}</td>
                                    <td>{{ $resident->resident_type }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- end table -->
                    </div>
                    <!-- end table responsive -->
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
@endsection
