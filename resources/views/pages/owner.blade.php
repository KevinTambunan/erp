@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Owner Profile</h1>
            <div class="d-none d-sm-inline-block ">
                @if (Auth::user()->owner == null)
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="button"
                        data-toggle="modal" data-target="#ubahmodalaasdas"><i class="fa-solid fa-pen mr-2"></i>Ubah Data</a>
                @else
                    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="button"
                        data-toggle="modal" data-target="#ubahmodal"><i class="fa-solid fa-pen mr-2"></i>Ubah Data</a>
                    <!-- Modal -->
                    <div class="modal fade" id="ubahmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/owner/update/{{ $owner->id }}" method="post">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="name" value="{{$owner->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Gender</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="gender" value="{{$owner->gender}}">
                                                <option>Laki-laki</option>
                                                <option>Perempuan</option>
                                                <option>Tidak ingin memberitahu</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Alamat Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="email" value="{{$owner->email}}">
                                            <small id="emailHelp" class="form-text text-muted">Kami tidak akan
                                                membagian email anda kepada siapapun</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">No Handphone</label>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{$owner->no_hp}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Age</label>
                                            <input type="number" class="form-control" id="nama" name="age" value="{{$owner->age}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="education">Education</label>
                                            <input type="text" class="form-control" id="education" name="education" value="{{$owner->education}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="employment_history">Employment History</label>
                                            <input type="text" class="form-control" id="employment_history"
                                                name="employment_history" value="{{$owner->employment_history}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="position">Position</label>
                                            <input type="text" class="form-control" id="position" name="position" value="{{$owner->position}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Alamat</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address">{{$owner->address}}</textarea>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif


                @if (Auth::user()->owner == null)
                    <a href="#" class="btn btn-sm btn-danger shadow-sm"><i
                            class="fa-solid fa-trash mr-2"></i>Kosongkan
                        Data</a>
                @else
                    <a href="#" class="btn btn-sm btn-danger shadow-sm" type="button" data-toggle="modal"
                        data-target="#deleteModal"><i class="fa-solid fa-trash mr-2"></i>Kosongkan
                        Data</a>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Kosongkan Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/owner/destroy/{{ $owner->id }}" method="post">
                                        @csrf
                                        <h5>Anda yakin ingin mengosongkan data?</h5>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya, kosongkan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif

            </div>

        </div>
        <div class="row">
            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-11">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Owner Profile</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            {{-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div> --}}
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        @if ($feedback != null)
                            @foreach ($feedback as $item)
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ $item }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endforeach
                        @endif
                        @if (Auth::user()->owner == null)
                            <p>Anda belum mengisi data owner, click button dibawah untuk menambahkan</p>
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                                type="button" data-toggle="modal" data-target="#exampleModal"><i
                                    class="fa-solid fa-add mr-2"></i>Isi Data</a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Isi Data</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/owner/store" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" class="form-control" id="nama"
                                                        name="name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Gender</label>
                                                    <select class="form-control" id="exampleFormControlSelect1"
                                                        name="gender">
                                                        <option>Laki-laki</option>
                                                        <option>Perempuan</option>
                                                        <option>Tidak ingin memberitahu</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Alamat Email</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="email">
                                                    <small id="emailHelp" class="form-text text-muted">Kami tidak akan
                                                        membagian email anda kepada siapapun</small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_hp">No Handphone</label>
                                                    <input type="text" class="form-control" id="no_hp"
                                                        name="no_hp">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama">Age</label>
                                                    <input type="number" class="form-control" id="nama"
                                                        name="age">
                                                </div>
                                                <div class="form-group">
                                                    <label for="education">Education</label>
                                                    <input type="text" class="form-control" id="education"
                                                        name="education">
                                                </div>
                                                <div class="form-group">
                                                    <label for="employment_history">Employment History</label>
                                                    <input type="text" class="form-control" id="employment_history"
                                                        name="employment_history">
                                                </div>
                                                <div class="form-group">
                                                    <label for="position">Position</label>
                                                    <input type="text" class="form-control" id="position"
                                                        name="position">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address"></textarea>
                                                </div>
                                                <div class="custom-file mb-3">
                                                    <input type="file" class="custom-file-input"
                                                        id="validatedCustomFile" required name="foto">
                                                    <label class="custom-file-label" for="validatedCustomFile">Pilih Foto
                                                        Profil</label>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group mt-2">
                                        <label for="exampleInputEmail1">Nama</label>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="exampleInputPassword1">Gender</label>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="exampleInputPassword1">Address</label>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="exampleInputPassword1">Email</label>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="exampleInputEmail1">No Telephone</label>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="exampleInputPassword1">Age</label>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="exampleInputPassword1">Education</label>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="exampleInputPassword1">Employment History</label>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="exampleInputPassword1">Position</label>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="exampleInputEmail1">Tanggal Diperbaharui</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <form>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" disabled value="{{ $owner->name }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" disabled value="{{ $owner->gender }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" disabled value="{{ $owner->address }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" disabled value="{{ $owner->email }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" disabled value="{{ $owner->no_hp }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" disabled value="{{ $owner->age }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" disabled value="{{ $owner->education }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" disabled value="{{ $owner->employment_history }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" disabled value="{{ $owner->position }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" disabled value="{{ $owner->updated_at }}">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <img src="{{asset("assets/image/".$owner->foto)}}" class="rounded" alt="" srcset="" style="max-width:280px">
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
