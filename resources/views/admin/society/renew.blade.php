@extends('admin.layouts.app',['title' => $title])
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{$title}}</h4>
        </div>
        {{-- <a href="{{ route('society.create') }}">
            <button type="button" class="btn btn-primary bg-gradient waves-effect waves-light mb-3">Create</button>
        </a> --}}
        <div class="card">
            <div class="card-body">
                  <div>
                                 @include('admin.inc.search')
                            </div>
                <div class="live-preview">
                    <div class="table-responsive">
                         <table  class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                        <thead>
                                <tr>
                                    <th scope="col" class="col-2">Sr No</th>
                                    <th scope="col" class="col-2">Policy Details</th>
                                    <th scope="col" class="col-2">Agent Details</th>
                                    <th scope="col" class="col-2">Expiry Date</th>
                                    <th scope="col" class="col-2">Holder Details</th>
                                    <th scope="col" class="col-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                  @php
                                $currentPage = $items->currentPage()-1;
                                $currentPage = $currentPage*$items->perPage();
                            @endphp
                                @foreach ($items as $society)
                                <tr>
                                   <th scope="row">{{ $loop->index+$currentPage+1 }}</th>

                                    <td><b>Policy Type</b> : <mark>{{ $society->policy }}</mark><br>
                                    <b>Start Date</b> : {{ date('d-m-Y', strtotime($society->start_date)) }}<br>
                                    <b>Policy Id</b> : #{{ $society->id }}<br>
                                    <b>Policy Value</b> : ₹ {{ $society->value }}</td>

                                    <td><b>AG</b> : {{ $society->agentname }}({{ $society->agent }})<br>
                                    <b>TL</b> : {{ $society->tlname }}({{ $society->tl }})<br>
                                <b>DR</b> : {{ $society->directorname }}({{ $society->director }})</td>

                                    <td class="text-danger">{{ date('d-m-Y', strtotime($society->exp_date)) }}</td>

                                    <td>{{ $society->proposer }}<br>
                                    <b>Phone</b> : <a href="tel:{{ $society->mobile }}">{{ $society->mobile }}</a></td>

                                    <td>
                                        <div  >
                                            {{-- <a href="{{ route('society.edit',$society->id) }}" class="action-icon">
                                                <i class="ri-edit-box-line" style="font-size: 20px"></i>
                                            </a> --}}

                                            <a href="{{ route('society.view',$society->id) }}" class="btn btn-primary w-100 btn-sm ">
                                                View Policy
                                            </a>
                                             <a href="{{ route('society.renew',$society->id) }}" class="btn btn-warning w-100 btn-sm mt-2">
                                                Renew Policy
                                            </a>
                                            {{-- <form action="{{ route('society.destroy', $society->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Are You Sure You Want to Delete !!')"
                                                    class="action-icon px-2">
                                                    <i class="ri-delete-bin-line" style="font-size: 20px"></i>
                                                </button>
                                            </form> --}}
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
