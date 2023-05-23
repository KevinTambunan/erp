@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Erp</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">3 Erp</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    {{ $erps[0]->nama }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $erps[0]->tipe }}</div>
                            </div>
                            <div class="col-auto">
                                <img src="{{ asset('assets/image/' . $erps[0]->foto) }}" alt="" srcset=""
                                    style="max-height: 50px" class="rounded">
                                {{-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{ $erps[1]->nama }}
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $erps[1]->tipe }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <img src="{{ asset('assets/image/' . $erps[1]->foto) }}" alt="" srcset=""
                                    style="max-height: 50px" class="rounded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    {{ $erps[2]->nama }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $erps[2]->tipe }}</div>
                            </div>
                            <div class="col-auto">
                                <img src="{{ asset('assets/image/' . $erps[2]->foto) }}" alt="" srcset=""
                                    style="max-height: 50px" class="rounded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            {{-- erps_result --}}
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Penggunaan ERP</h6>
                        <div class="dropdown no-arrow">
                            <a href="/erp-history" class="btn btn-sm btn-primary shadow-sm"><i
                                    class="fa-solid fa-eye mr-2"></i>Selengkapnya</a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Tanggal Penggunaan</th>
                                        <th>Opsi Odoo</th>
                                        <th>Opsi Dolibarr</th>
                                        <th>Opsi SAP</th>
                                        <th>Pilihan Akhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($erps_result as $erp)
                                        <tr>
                                            <td>{{ $erp->created_at }}</td>
                                            <td>{{ $erp->odoo }}</td>
                                            <td>{{ $erp->dolibar }}</td>
                                            <td>{{ $erp->sap }}</td>
                                            <td>
                                                <p>{{ $erp->erp->nama }}</p>
                                                <img src="{{ asset('assets/image/' . $erp->erp->foto) }}" alt=""
                                                    srcset="" style="max-height: 100px">
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Kelengkapan Profile</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="card shadow">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Company profile</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if (Auth::user()->company == null)
                                            <i class="fa-solid fa-xmark fa-sm fa-fw text-danger"></i>
                                        @else
                                            <i class="fas fa-check fa-sm fa-fw text-success"></i>
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                @if (Auth::user()->company == null)
                                    <span>Profile owner belum diisi, klik button dibawah untuk mengisi</span> <br>
                                    <a href="/company" class="btn btn-sm btn-primary shadow-sm"><i
                                            class="fa-solid fa-add mr-2"></i>Profile</a>
                                @else
                                    <p>Nama : {{Auth::user()->company->nama}}</p>
                                    <p>Email : {{Auth::user()->company->email}}</p>
                                    <p>Phone : {{Auth::user()->company->no_hp}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Owner profile</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if (Auth::user()->owner == null)
                                            <i class="fa-solid fa-xmark fa-sm fa-fw text-danger"></i>
                                        @else
                                            <i class="fas fa-check fa-sm fa-fw text-success"></i>
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                @if (Auth::user()->owner == null)
                                    <span>Profile owner belum diisi, klik button dibawah untuk mengisi</span> <br>
                                    <a href="/owner" class="btn btn-sm btn-primary shadow-sm"><i
                                            class="fa-solid fa-add mr-2"></i>Profile</a>
                                @else
                                    <p>Nama : {{Auth::user()->owner->name}}</p>
                                    <p>Email : {{Auth::user()->owner->email}}</p>
                                    <p>Phone : {{Auth::user()->owner->no_hp}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
