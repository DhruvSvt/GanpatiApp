@extends('admin.layouts.app', ['title' => 'Policy Details'])
@section('content')
    <style>
        h5.fs-15 {
            font-size: 14px !important;
            color: #6c6c6c;
            font-weight: 400;
        }

        p.fw-medium {
            font-weight: 700 !important;
        }
    </style>
    <div class="row">
        <div class="col-xl-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Policy Details</h4>
            </div>
            {{-- <a href="{{ route('society.create') }}">
            <button type="button" class="btn btn-primary bg-gradient waves-effect waves-light mb-3">Create</button>
        </a> --}}
            <div class="card">
                <div class="card-body">

                    <div class="container-fluid">

                        @php
                            // echo'<pre>';
                            //     print_r($societies);
                            // echo'</pre>';
                            $fs = $societies->first();
                        @endphp
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mt-n4 mx-n4">
                                    <div class="bg-warning-subtle">
                                        <div class="card-body pb-0 px-4">
                                            <div class="row mb-3">
                                                <div class="col-md">
                                                    <div class="row align-items-center g-3">

                                                        <div class="col-md">
                                                            <div>
                                                                <h4 class="fw-bold">{{ $fs->proposer }}</h4>
                                                                <div class="hstack gap-3 flex-wrap">
                                                                    <div>Agent : {{ $fs->auser_id }}
                                                                    </div>
                                                                    <div class="vr"></div>
                                                                      <div>TL : {{ $fs->tuser_id }}
                                                                    </div>
                                                                    <div class="vr"></div>
                                                                      <div>Director : {{ $fs->duser_id }}
                                                                    </div>
                                                                    <div class="vr"></div>
                                                                    <div>Start Date : <span
                                                                            class="fw-medium">{{ date('d-m-Y', strtotime($fs->start_date)) }}</span>
                                                                    </div>
                                                                    <div class="vr"></div>
                                                                    <div>Expiry Date : <span
                                                                            class="fw-medium">{{ date('d-m-Y', strtotime($fs->exp_date)) }}</span>
                                                                    </div>
                                                                    <div class="vr"></div>
                                                                    <div>Policy Type : <span
                                                                            class="fw-medium">{{ $fs->policy }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active fw-semibold" data-bs-toggle="tab"
                                                        href="#project-overview" role="tab">
                                                        Basic Details
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link fw-semibold" data-bs-toggle="tab"
                                                        href="#project-documents" role="tab">
                                                        Members
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link fw-semibold" data-bs-toggle="tab"
                                                        href="#project-activities" role="tab">
                                                        Documents
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link fw-semibold" data-bs-toggle="tab"
                                                        href="#project-team" role="tab">
                                                        Last Policy Details
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link fw-semibold" data-bs-toggle="tab"
                                                        href="#Renewal-team" role="tab">
                                                        Renewal Details
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link fw-semibold" data-bs-toggle="tab"
                                                        href="#Commission-team" role="tab">
                                                        Commission Details
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tab-content text-muted">
                                    <div class="tab-pane fade show active" id="project-overview" role="tabpanel">

                                        <div class="row g-4 mb-3">
                                            <div class="col-sm">
                                                <h6 class="mb-3 fw-semibold text-uppercase">Basic Details</h6>
                                            </div>

                                        </div>
                                        <!-- end row -->

                                        <div class="team-list list-view-filter">
                                            <div class="card team-box">
                                                <div class="card-body px-4">



                                                    <div class="row gy-3">

                                                        <div class="col-lg-6 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Policy Value :</p>
                                                                <h5 class="fs-15 mb-0">₹{{ $fs->value }}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Vehicle Number (IF
                                                                    Any):</p>
                                                                <h5 class="fs-15 mb-0">{{ $fs->vehicle_no }}</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="pt-3 border-top border-top-dashed mt-4">
                                                        <div class="row gy-3">
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div>
                                                                    <p class="mb-2 text-uppercase fw-medium">Address:</p>
                                                                    <h5 class="fs-15 mb-0">{{ $fs->address }}</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div>
                                                                    <p class="mb-2 text-uppercase fw-medium">DOB:</p>
                                                                    <h5 class="fs-15 mb-0">
                                                                        {{ date('d-m-Y', strtotime($fs->dob)) }}</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="pt-3 border-top border-top-dashed mt-4">
                                                        <div class="row gy-3">
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div>
                                                                    <p class="mb-2 text-uppercase fw-medium">Ocupation:</p>
                                                                    <h5 class="fs-15 mb-0">{{ $fs->ocupation }}</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div>
                                                                    <p class="mb-2 text-uppercase fw-medium">Gender:</p>
                                                                    <h5 class="fs-15 mb-0">{{ $fs->gender }}</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="pt-3 border-top border-top-dashed mt-4">
                                                        <div class="row gy-3">
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div>
                                                                    <p class="mb-2 text-uppercase fw-medium">Mobile:</p>
                                                                    <h5 class="fs-15 mb-0">{{ $fs->mobile }}</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div>
                                                                    <p class="mb-2 text-uppercase fw-medium">Email:</p>
                                                                    <h5 class="fs-15 mb-0">{{ $fs->email }}</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="pt-3 border-top border-top-dashed mt-4">
                                                        <div class="row gy-3">
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div>
                                                                    <p class="mb-2 text-uppercase fw-medium">Annual Income:
                                                                    </p>
                                                                    <h5 class="fs-15 mb-0">{{ $fs->annual_income }}</h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div>
                                                                    <p class="mb-2 text-uppercase fw-medium">Sum Insured:
                                                                    </p>
                                                                    <h5 class="fs-15 mb-0">{{ $fs->sum_insured }}</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="project-documents" role="tabpanel">
                                        <div class="row g-4 mb-3">
                                            <div class="col-sm">
                                                <h6 class="mb-3 fw-semibold text-uppercase">Member Details</h6>
                                            </div>

                                        </div>

                                        <div class="team-list list-view-filter">
                                            <div class="card team-box">
                                                <div class="card-body px-4">

                                                    @foreach ($societies as $society)
                                                        <div class="pt-3 border-top border-top-dashed mt-4">
                                                            <div class="row gy-3">

                                                                <div class="col-lg-4 col-sm-4">
                                                                    <div>
                                                                        <p class="mb-2 text-uppercase fw-medium">Name Of
                                                                            Insured :</p>
                                                                        <h5 class="fs-15 mb-0">{{ $society->f_name }}</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-4">
                                                                    <div>
                                                                        <p class="mb-2 text-uppercase fw-medium">Date Of
                                                                            Birth :</p>
                                                                        <h5 class="fs-15 mb-0">
                                                                            {{ date('d-m-Y', strtotime($fs->f_dob)) }}</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-4">
                                                                    <div>
                                                                        <p class="mb-2 text-uppercase fw-medium">HT & WT :
                                                                        </p>
                                                                        <h5 class="fs-15 mb-0">{{ $society->f_ht }}</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-4">
                                                                    <div>
                                                                        <p class="mb-2 text-uppercase fw-medium">Ocuppation
                                                                            :</p>
                                                                        <h5 class="fs-15 mb-0">
                                                                            {{ $society->f_ocuppation }}</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-4">
                                                                    <div>
                                                                        <p class="mb-2 text-uppercase fw-medium">Relation
                                                                            With Proposer :</p>
                                                                        <h5 class="fs-15 mb-0">{{ $society->f_relation }}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-4">
                                                                    <div>
                                                                        <p class="mb-2 text-uppercase fw-medium">Nominee
                                                                            Name :</p>
                                                                        <h5 class="fs-15 mb-0">{{ $society->f_nominee }}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-4">
                                                                    <div>
                                                                        <p class="mb-2 text-uppercase fw-medium">Nominee
                                                                            DOB :</p>
                                                                        <h5 class="fs-15 mb-0">
                                                                            {{ date('d-m-Y', strtotime($fs->f_nomineeDOB)) }}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-4">
                                                                    <div>
                                                                        <p class="mb-2 text-uppercase fw-medium">Diabetes :
                                                                        </p>
                                                                        <h5 class="fs-15 mb-0">{{ $society->f_diabetes }}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-4">
                                                                    <div>
                                                                        <p class="mb-2 text-uppercase fw-medium">B.P. :</p>
                                                                        <h5 class="fs-15 mb-0">{{ $society->f_bp }}</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 col-sm-4">
                                                                    <div>
                                                                        <p class="mb-2 text-uppercase fw-medium">Any Pre
                                                                            Disease :</p>
                                                                        <h5 class="fs-15 mb-0">
                                                                            {{ $society->f_predisease }}</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="project-activities" role="tabpanel">
                                        <div class="row g-4 mb-3">
                                            <div class="col-sm">
                                                <h6 class="mb-3 fw-semibold text-uppercase">Documents</h6>
                                            </div>

                                        </div>

                                        <div class="team-list list-view-filter">
                                            <div class="card team-box">
                                                <div class="card-body px-4">
                                                    @php
                                                        $str = explode(',', $fs->docs);
                                                    @endphp

                                                    @foreach ($str as $st)
                                                        <div class="pt-3 border-top border-top-dashed mt-4">
                                                            <div class="row gy-3">

                                                                <div class="col-lg-12">
                                                                    <div>
                                                                        <p class="mb-2 text-uppercase fw-medium">Document
                                                                            No. {{ $loop->index + 1 }} :</p>
                                                                        <h5 class="fs-15 mb-0"><a
                                                                                href="{{ Storage::url($st) }}"
                                                                                target="_blank">View File</a></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="project-team" role="tabpanel">
                                        <div class="row g-4 mb-3">
                                            <div class="col-sm">
                                                <h6 class="mb-3 fw-semibold text-uppercase">Last Policy Details</h6>
                                            </div>

                                        </div>

                                        <div class="team-list list-view-filter">
                                            <div class="card team-box">
                                                <div class="card-body px-4">



                                                    <div class="row gy-3">

                                                        <div class="col-lg-6 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Last Company Name
                                                                    :</p>
                                                                <h5 class="fs-15 mb-0">{{ $fs->last_c_name }}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Date Of Expiry :
                                                                </p>
                                                                <h5 class="fs-15 mb-0">
                                                                    {{ date('d-m-Y', strtotime($fs->last_expiry)) }}</h5>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="pt-3 border-top border-top-dashed mt-4">
                                                        <div class="row gy-3">
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div>
                                                                    <p class="mb-2 text-uppercase fw-medium">Last Year
                                                                        Copy:</p>
                                                                    <h5 class="fs-15 mb-0"><a
                                                                                href="{{ Storage::url($fs->last_copy) }}"
                                                                                target="_blank">View File</a></h5>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Renewal-team" role="tabpanel">
                                        <div class="row g-4 mb-3">
                                            <div class="col-sm">
                                                <h6 class="mb-3 fw-semibold text-uppercase">Renewal Details</h6>
                                            </div>

                                        </div>

                                        <div class="team-list list-view-filter">
                                            <div class="card team-box">
                                                <div class="card-body px-4">



                                                    <div class="row gy-3">
                                                        @foreach ($renew as $row)
                                                            <div class="col-lg-12">
                                                                <div>
                                                                    <p class="mb-2 text-uppercase fw-medium">
                                                                        ₹{{ $row->amount }} </p>
                                                                    <h5 class="fs-15 mb-0">
                                                                        {{ date('d-m-Y', strtotime($row->created_at)) }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Commission-team" role="tabpanel">
                                        <div class="row g-4 mb-3">
                                            <div class="col-sm">
                                                <h6 class="mb-3 fw-semibold text-uppercase">Commission Details</h6>
                                            </div>

                                        </div>

                                        <div class="team-list list-view-filter">
                                            <div class="card team-box">
                                                <div class="card-body px-4">



                                                    <div class="row gy-3">

                                                            <div class="col-lg-12">
                                                                <table
                                                                    class="table table-hover table-centered align-middle table-nowrap mb-0">
                                                                     <thead class="text-muted table-light">
                                                            <tr>
                                                                <th scope="col">ID</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Commission</th>
                                                                <th scope="col">TDS(5%)</th>
                                                                <th scope="col">After TDS</th>
                                                                <th scope="col">Type</th>
                                                                <th scope="col">Date</th>
                                                            </tr>
                                                        </thead>
                                                                    <tbody>
                                                                           @foreach ($comm as $row)
                                                                        <tr>

                                        <td>{{$row->id}}</td>
                                        <td>{{$row->name}} (#{{$row->user_id}})</td>
                                        <td>{{$row->amount}}</td>
                                        <td>{{$row->TDS}}</td>
                                        <td>{{$row->Final_amnt}}</td>
                                        <td>{{$row->type}}</td>
                                        <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                                                       </tr>
                                                                       @endforeach
                                                                    </tbody>
                                                                </table>



                                                            </div>

                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->


                    <!-- end card -->
                </div>
                <!-- ene col -->

                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
