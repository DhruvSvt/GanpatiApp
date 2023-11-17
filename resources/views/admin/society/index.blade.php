@extends('admin.layouts.app',['title' => 'Society Details'])
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Society Details</h4>
        </div>
        {{-- <a href="{{ route('society.create') }}">
            <button type="button" class="btn btn-primary bg-gradient waves-effect waves-light mb-3">Create</button>
        </a> --}}
        <div class="card">
            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr class="col-8">
                                    <th scope="col" class="col-2">Society Name</th>
                                    <th scope="col" class="col-2">No of Appartments</th>
                                    <th scope="col" class="col-2">City</th>
                                    <th scope="col" class="col-2">Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($societies as $society)
                                <tr>
                                    <td>{{ $society->name }}</td>
                                    <td>{{ $society->total_appartments }}</td>
                                    <td>{{ $society->city }}</td>
                                    <td>{{ $society->address }}</td>
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
