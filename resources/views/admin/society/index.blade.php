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
                                    <th scope="col" class="col-2">Status</th>
                                    <th scope="col" class="col-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($societies as $society)
                                <tr>
                                    <td>{{ $society->name }}</td>
                                    <td>{{ $society->total_appartments }}</td>
                                    <td>{{ $society->city }}</td>
                                    <td>{{ $society->address }}</td>
                                    <td>
                                        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                                            <input type="checkbox" class="form-check-input" id="customSwitchsizemd"
                                                data-id="{{ $society->id }}" name="status" {{ $society->status == 1 ?
                                            'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('society.edit',$society->id) }}" class="action-icon">
                                                <i class="ri-edit-box-line" style="font-size: 20px"></i>
                                            </a>
                                            <form action="{{ route('society.destroy', $society->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Are You Sure You Want to Delete !!')"
                                                    class="action-icon px-2">
                                                    <i class="ri-delete-bin-line" style="font-size: 20px"></i>
                                                </button>
                                            </form>
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
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div>
@endsection
@section('scripts')
<script>
    // Ajax Request
    $(document).ready(function() {
        $('.form-check-input').change(function() {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let societyId = $(this).data('id');
            $.ajax({
                type: "POST", // Change this to POST
                dataType: "json",
                url: '{{ route('society.status') }}',
                data: {
                    '_token': '{{ csrf_token() }}', // Add the CSRF token
                    'status': status,
                    'societyId': societyId
                },
                success: function(data) {
                    console.log(data.message);
                }
            });
        });
    });
</script>
@endsection
