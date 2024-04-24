@extends('admin.layouts.app',['title' => 'Sale Report'])
@section('heads')
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />

@endsection
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Sale Report</h4>
        </div>
        {{-- <a href="{{ route('members.create') }}">
            <button type="button" class="btn btn-primary bg-gradient waves-effect waves-light mb-3">Create</button>
        </a> --}}
        <div class="card">
             <div class="card-header">  <div class="row input-daterange">
                <div class="col-md-4">
                    <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
                </div>
                <div class="col-md-4">
                    <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
                </div>
                <div class="col-md-4">
                    <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                    <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                </div>
            </div></div>
            <div class="card-body">

                <div class="live-preview">

                    <div class="table-responsive">
                          <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>SrNo</th>
                <th>Policy ID</th>
                <th>Policy Value</th>
                <th>Proposer</th>
                <th>Policy Type</th>
                <th>Start Date</th>
                <th>Expiry Date</th>
                <th>Director</th>
                <th>TL</th>
                <th>Agent</th>
                <th>View</th>


            </tr>
        </thead>
        <tbody>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">


$(document).ready(function(){
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format:'yyyy-mm-dd',
  autoclose:true
 });

 load_data();

 function load_data(from_date = '', to_date = '')
 {

  $('.yajra-datatable').DataTable({
    processing: true,
        serverSide: true,
        "aaSorting": [],
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
        dom:"Bfrtip",
        buttons:["pageLength","excel"],
   ajax: {
    url:'{{ route('report.sale') }}',
    data:{from_date:from_date, to_date:to_date}
   },
   columns: [
            {data: 'DT_RowIndex', name: 'sr'},
            {data: 'id', name: 'id'},
            {data: 'value', name: 'value'},
            {data: 'proposer', name: 'proposer'},
             {data: 'policy', name: 'policy'},
              {data: 'start_date', name: 'start_date'},
            {data: 'exp_date', name: 'exp_date'},
            {data: 'director', name: 'director'},
            {data: 'tl', name: 'tl'},
            {data: 'agent', name: 'agent'},
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]

  });
 }

 $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  if(from_date != '' &&  to_date != '')
  {
   $('.yajra-datatable').DataTable().destroy();
   load_data(from_date, to_date);
  }
  else
  {
   alert('Both Date is required');
  }
 });

 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
  $('.yajra-datatable').DataTable().destroy();
  load_data();
 });

});
</script>

@endsection
