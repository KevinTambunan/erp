@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Erp Recomendation</h1>

        </div>

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Erp Recomendation</h6>
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
                        <div class="accordion" id="accordionExample">
                            <form action="/erp-recomendation/respon" method="post">
                                @csrf
                                {{-- pertanyaan 1 --}}
                                <div class="mb-3 border-bottom p-3">
                                    <label for="budget">1. Berapakah Budget yang dibutuhkan oleh perusahaan?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="1" id="gratis"
                                            value="dolibar">
                                        <label class="form-check-label" for="gratis">Gratis</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="1" id="0-1-"
                                            value="odoo">
                                        <label class="form-check-label" for="0-1-">0 - 15.000.000</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="1" id="1500"
                                            value="sap">
                                        <label class="form-check-label" for="1500">> 15.000.000</label>
                                    </div>
                                </div>

                                {{-- pertanyaan 2 --}}
                                <div class="mb-3 border-bottom p-3">
                                    <label for="budget">2.	Apa jenis perusahaan yang akan digunakan oleh ERP?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="2" id="manu"
                                            value="odoo">
                                        <label class="form-check-label" for="manu">Perusahaan manufaktur & konsultan</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="2" id="e-com"
                                            value="sap">
                                        <label class="form-check-label" for="e-com">E-commerce & Startup</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="2" id="ritel"
                                            value="dolibar">
                                        <label class="form-check-label" for="ritel">Ritell & UKM</label>
                                    </div>
                                </div>

                                {{-- pertanyaan 3 --}}
                                <div class="mb-3 border-bottom p-3">
                                    <label for="budget">3.	Berapa lama waktu implementasi sistem erp yang diinginkan?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="3" id="0-20"
                                            value="sap">
                                        <label class="form-check-label" for="inlineRadio">0 – 12 Bulan</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="3" id="inlineRadio2"
                                            value="dolibar">
                                        <label class="form-check-label" for="inlineRadio2">12 – 19 bulan</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="3" id="inlineRadio2"
                                            value="odoo">
                                        <label class="form-check-label" for="inlineRadio2">> 20 bulan</label>
                                    </div>
                                </div>

                                {{-- pertanyaan 4 --}}
                                <div class="mb-3 border-bottom p-3">
                                    <label for="budget">4.	Apa kategori ukuran perusahaan yang paling tepat untuk perusahaan Anda saat ini?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="4" id="0-20"
                                            value="odoo">
                                        <label class="form-check-label" for="0-20">1 – 200 karyawan</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="4" id="200-500"
                                            value="dolibar">
                                        <label class="form-check-label" for="200-500">200 – 500 karyawan</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="4" id="500plus"
                                            value="sap">
                                        <label class="form-check-label" for="500plus">> 500 karyawan</label>
                                    </div>
                                </div>

                                {{-- pertanyaan 5 --}}
                                <div class="mb-3 border-bottom p-3">
                                    <label for="budget">5.	Bagaimana deployment method ERP yang dibutuhkan oleh perusahaan anda</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="5" id="cloud"
                                            value="odoo">
                                        <label class="form-check-label" for="cloud">Cloud Based</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="5" id="on promise"
                                            value="dolibar">
                                        <label class="form-check-label" for="on promise">On premise Deployment</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="5" id="private"
                                            value="sap">
                                        <label class="form-check-label" for="private">Private Deployment</label>
                                    </div>
                                </div>

                                {{-- pertanyaan 6 --}}
                                <div class="mb-3 border-bottom p-3">
                                    <label for="budget">6.	Modul seperti apa yang dibutuhkan oleh perusahaan anda?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="6" id="inventory man"
                                            value="odoo">
                                        <label class="form-check-label" for="inventory man">Inventory management, purchase management, accounting management, Customer Relarionship Management</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="6" id="product man"
                                            value="dolibar">
                                        <label class="form-check-label" for="product man">Inventory management, Product management, purchase management, sales management, Customer Relarionship Management</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="6" id="material"
                                            value="sap">
                                        <label class="form-check-label" for="material">Material management, Sales and marketing, Human resource mangement, Finance, Supply Chain Management</label>
                                    </div>
                                </div>

                                {{-- pertanyaan 7 --}}
                                <div class="mb-3 border-bottom p-3">
                                    <label for="budget">7.	Kelebihan ERP seperti apa yang perusahaan anda butuhkan?</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="7" id="open"
                                            value="dolibar">
                                        <label class="form-check-label" for="open">Open source</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="7" id="hybrid"
                                            value="odoo">
                                        <label class="form-check-label" for="hybrid">Hybrid</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="7" id="prioperty"
                                            value="sap">
                                        <label class="form-check-label" for="prioperty">Propierty</label>
                                    </div>
                                </div>



                                <button class="btn btn-primary" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
