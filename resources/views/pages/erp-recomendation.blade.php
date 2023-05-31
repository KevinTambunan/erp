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
                        </div>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        @if (Auth::user()->owner == null)
                            <div class="row">
                                <div class="col-md-6">
                                    <p>
                                        You have not filled in the profile data, you cannot use the ERP Recommendation menu
                                        before filling it in. Fill in the profile data by clicking the button below or going
                                        to the profile page.
                                    </p>
                                </div>
                            </div>

                            <a href="/owner" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fa-solid fa-add mr-2"></i>Fill in Profile data</a>
                            <!-- Modal -->
                        @else
                            <div class="accordion" id="accordionExample">
                                <form action="/erp-recomendation/respon" method="post">
                                    @csrf
                                    {{-- pertanyaan 1 --}}

                                    <div id="soalPertama" class="mb-3 border-bottom p-3">
                                        <label for="budget">1. Apa jenis perusahaan yang sedang dikelola pada saat ini?
                                        </label><br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="1"
                                                id="Perusahaan Manufaktur" value="Perusahaan Manufaktur">
                                            <label class="form-check-label" for="Perusahaan Manufaktur">Perusahaan
                                                Manufaktur</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="1"
                                                id="Perusahaan Ritel" value="Perusahaan Ritel">
                                            <label class="form-check-label" for="Perusahaan Ritel">Perusahaan Ritel</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="1"
                                                id="Perusahaan Keuangan" value="Perusahaan Keuangan">
                                            <label class="form-check-label" for="Perusahaan Keuangan">Perusahaan
                                                Keuangan</label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="1"
                                                id="Layanan Kesehatan" value="Layanan Kesehatan">
                                            <label class="form-check-label" for="Layanan Kesehatan">Layanan
                                                Kesehatan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="1"
                                                id="Perusahaan E-commerce" value="Perusahaan E-commerce">
                                            <label class="form-check-label" for="Perusahaan E-commerce">Perusahaan
                                                E-commerce</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="1"
                                                id="Perusahaan Pertanian" value="Perusahaan Pertanian">
                                            <label class="form-check-label" for="Perusahaan Pertanian">Perusahaan
                                                Pertanian</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="1"
                                                id="Perusahaan Media Hiburan" value="Perusahaan Media Hiburan">
                                            <label class="form-check-label" for="Perusahaan Media Hiburan">Perusahaan Media
                                                Hiburan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="1"
                                                id="Perusahaan Konstruksi" value="Perusahaan Konstruksi">
                                            <label class="form-check-label" for="Perusahaan Konstruksi">Perusahaan
                                                Konstruksi</label>
                                        </div>

                                        <p class="text-danger" id="errorSoalSatu"></p>
                                        <div class="mt-3">
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="NextSoalSatu()">Next</button>
                                        </div>
                                    </div>

                                    {{-- pertanyaan 2 --}}
                                    <div id="soalKedua" class="mb-3 border-bottom p-3" style="display: none">
                                        <label for="budget">2. Apakah Anda memiliki pengalaman sebelumnya dalam
                                            menggunakan perangkat lunak ERP?</label><br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="2" id="manu"
                                                value="sap">
                                            <label class="form-check-label" for="manu">
                                                Ya</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="2" id="e-com"
                                                value="odoo">
                                            <label class="form-check-label" for="e-com">Tidak</label>
                                        </div>
                                        <p class="text-danger" id="errorSoalDua"></p>

                                        <div class="mt-3">
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="BackSoalDua()">Back</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="NextSoalDua()">Next</button>
                                        </div>
                                    </div>

                                    {{-- pertanyaan 3 --}}
                                    <div id="soalKetiga" class="mb-3 border-bottom p-3" style="display: none">
                                        <label for="budget">3. Apa kategori ukuran perusahaan yang paling tepat untuk
                                            perusahaan Anda, berdasarkan jumlah dari karyawan di perusahaan Anda saat
                                            ini?</label><br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="3"
                                                id="Kecil ( lebih kecil dari 50)" value="dolibar">
                                            <label class="form-check-label" for="Kecil ( lebih kecil dari 50)">Kecil (
                                                lebih kecil dari 50)</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="3"
                                                id="Menengah ( 50-500 )" value="odoo">
                                            <label class="form-check-label" for="Menengah ( 50-500 )">Menengah ( 50-500 )
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="3"
                                                id="Besar (>500)" value="sap">
                                            <label class="form-check-label" for="Besar (>500)">Besar (>500)</label>
                                        </div>
                                        <p class="text-danger" id="errorSoalTiga"></p>
                                        <div class="mt-3">
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="BackSoalTiga()">Back</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="NextSoalTiga()">Next</button>
                                        </div>
                                    </div>

                                    {{-- pertanyaan 4 --}}
                                    <div id="soalKeempat" class="mb-3 border-bottom p-3" style="display: none">
                                        <label for="budget">4. Apa jenis Lisensi ERP yang diinginkan?</label><br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="4"
                                                id="Open Source" value="dolibar">
                                            <label class="form-check-label" for="Open Source">Open Source</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="4" id="Hybrid"
                                                value="odoo">
                                            <label class="form-check-label" for="Hybrid">Hybrid </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="4"
                                                id="Proprietary" value="sap">
                                            <label class="form-check-label" for="Proprietary">Proprietary</label>
                                        </div>
                                        <p class="text-danger" id="errorSoalEmpat"></p>
                                        <div class="mt-3">
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="BackSoalEmpat()">Back</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="NextSoalEmpat()">Next</button>
                                        </div>
                                    </div>

                                    {{-- pertanyaan 5 --}}
                                    <div id="soalKelima" class="mb-3 border-bottom p-3" style="display: none">
                                        <label for="budget">5. Terkait kostumisasi ERP, ERP yang bagaimana yang Anda
                                            harapkan nantinya?</label><br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="5"
                                                id="Tidak dapat dikostumisasi" value="dolibar">
                                            <label class="form-check-label" for="Tidak dapat dikostumisasi">Tidak dapat
                                                dikostumisasi</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="5"
                                                id="Dapat dikostumisasi namun terbatas" value="odoo">
                                            <label class="form-check-label" for="Dapat dikostumisasi namun terbatas">Dapat
                                                dikostumisasi namun terbatas</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="5"
                                                id="Dapat dikostumisasi" value="sap">
                                            <label class="form-check-label" for="Dapat dikostumisasi">Dapat
                                                dikostumisasi</label>
                                        </div>
                                        <p class="text-danger" id="errorSoalLima"></p>
                                        <div class="mt-3">
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="BackSoalLima()">Back</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="NextSoalLima()">Next</button>
                                        </div>
                                    </div>

                                    {{-- pertanyaan 6 --}}
                                    <div id="soalKeenam" class="mb-3 border-bottom p-3" style="display: none">
                                        <label for="budget">6. Apakah Anda memiliki anggaran yang akan digunakan untuk
                                            implementasi dan pemeliharaan ERP? </label><br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="6"
                                                id="Perusahaan tidak memiliki anggaran khusus untuk menginvestasikan dalam sistem ERP"
                                                value="dolibar">
                                            <label class="form-check-label"
                                                for="Perusahaan tidak memiliki anggaran khusus untuk menginvestasikan dalam sistem ERP">Perusahaan
                                                tidak memiliki anggaran khusus untuk menginvestasikan dalam sistem
                                                ERP</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="6"
                                                id="Perusahaan memiliki anggaran terbatas untuk menginvestasikan dalam sistem ERP"
                                                value="odoo">
                                            <label class="form-check-label"
                                                for="Perusahaan memiliki anggaran terbatas untuk menginvestasikan dalam sistem ERP">Perusahaan
                                                memiliki anggaran terbatas untuk menginvestasikan dalam sistem ERP</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="6"
                                                id="Ya, perusahaan memiliki anggaran yang signifikan untuk menginvestasikan dalam sistem ERP"
                                                value="sap">
                                            <label class="form-check-label"
                                                for="Ya, perusahaan memiliki anggaran yang signifikan untuk menginvestasikan dalam sistem ERP">Ya,
                                                perusahaan memiliki anggaran yang signifikan untuk menginvestasikan dalam
                                                sistem ERP</label>
                                        </div>
                                        <p class="text-danger" id="errorSoalEnam"></p>
                                        <div class="mt-3">
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="BackSoalEnam()">Back</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="NextSoalEnam()">Next</button>
                                        </div>
                                    </div>

                                    {{-- pertanyaan 7 --}}
                                    <div id="soalKetujuh" class="mb-3 border-bottom p-3" style="display: none">
                                        <label for="budget">7. Apakah Anda lebih suka menggunakan sistem ERP dengan
                                            antarmuka pengguna yang sederhana atau apakah tingkat keahlian teknis tidak
                                            menjadi masalah?</label><br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="7"
                                                id="Saya lebih suka menggunakan sistem ERP dengan antarmuka pengguna yang sederhana."
                                                value="dolibar">
                                            <label class="form-check-label"
                                                for="Saya lebih suka menggunakan sistem ERP dengan antarmuka pengguna yang sederhana.">Saya
                                                lebih suka menggunakan sistem ERP dengan antarmuka pengguna yang
                                                sederhana.</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="7"
                                                id="Saya tidak memiliki preferensi khusus terkait antarmuka pengguna, tingkat keahlian teknis tidak menjadi masalah"
                                                value="odoo">
                                            <label class="form-check-label"
                                                for="Saya tidak memiliki preferensi khusus terkait antarmuka pengguna, tingkat keahlian teknis tidak menjadi masalah">Saya
                                                tidak memiliki preferensi khusus terkait antarmuka pengguna, tingkat
                                                keahlian teknis tidak menjadi masalah</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="7"
                                                id="Saya lebih memilih sistem ERP dengan tingkat keahlian teknis yang tinggi, antarmuka pengguna bukanlah faktor utama"
                                                value="sap">
                                            <label class="form-check-label"
                                                for="Saya lebih memilih sistem ERP dengan tingkat keahlian teknis yang tinggi, antarmuka pengguna bukanlah faktor utama">Saya
                                                lebih memilih sistem ERP dengan tingkat keahlian teknis yang tinggi,
                                                antarmuka pengguna bukanlah faktor utama</label>
                                        </div>
                                        <p class="text-danger" id="errorSoalTujuh"></p>
                                        <div class="mt-3">
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="BackSoalTujuh()">Back</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="NextSoalTujuh()">Next</button>
                                            {{-- <button type="button" class="btn btn-outline-primary" onclick="NextSoalTujuh()">Next</button> --}}
                                        </div>
                                    </div>

                                    {{-- pertanyaan 8 --}}
                                    <div id="soalKedelapan" class="mb-3 border-bottom p-3" style="display: none">
                                        <label for="budget">8. Berapa lama waktu implementasi sistem erp yang
                                            diinginkan?</label><br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="8"
                                                id="<= 12 bulan" value="dolibar">
                                            <label class="form-check-label" for="<= 12 bulan">
                                                <= 12 bulan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="8"
                                                id="13 bulan – 24 bulan" value="odoo">
                                            <label class="form-check-label" for="13 bulan – 24 bulan">13 bulan – 24
                                                bulan</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="8"
                                                id="> 24 bulan" value="sap">
                                            <label class="form-check-label" for="> 24 bulan">> 24 bulan</label>
                                        </div>
                                        <p class="text-danger" id="errorSoalDelapan"></p>
                                        <div class="mt-3">
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="BackSoalDelapan()">Back</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="NextSoalDelapan()">Next</button>
                                            {{-- <button type="button" class="btn btn-outline-primary" onclick="NextSoalTujuh()">Next</button> --}}
                                        </div>
                                    </div>

                                    {{-- pertanyaan 9 --}}
                                    <div id="soalKesembilan" class="mb-3 border-bottom p-3" style="display: none">
                                        <label for="budget">9. Aspek skalabilitas apa yang akan lebih ditingkatkan dari
                                            penggunaan ERP? </label><br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="91"
                                                value="Skalabilitas Keuangan" id="Skalabilitas Keuangan">
                                            <label class="form-check-label" for="Skalabilitas Keuangan">
                                                Skalabilitas Keuangan
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="92"
                                                value="Skalabilitas Kinerja Sistem" id="Skalabilitas Kinerja Sistem">
                                            <label class="form-check-label" for="Skalabilitas Kinerja Sistem">
                                                Skalabilitas Kinerja Sistem
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="93"
                                                value="Skalabilitas Infrastuktur" id="Skalabilitas Infrastuktur">
                                            <label class="form-check-label" for="Skalabilitas Infrastuktur">
                                                Skalabilitas Infrastuktur
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="94"
                                                value="Skalabilitas Fungsionalitas" id="Skalabilitas Fungsionalitas">
                                            <label class="form-check-label" for="Skalabilitas Fungsionalitas">
                                                Skalabilitas Fungsionalitas
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="95"
                                                value="Skalabilitas Integrasi" id="Skalabilitas Integrasi">
                                            <label class="form-check-label" for="Skalabilitas Integrasi">
                                                Skalabilitas Integrasi
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="96"
                                                value="Skalabilitas Proses Bisnis" id="Skalabilitas Proses Bisnis">
                                            <label class="form-check-label" for="Skalabilitas Proses Bisnis">
                                                Skalabilitas Proses Bisnis
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="97"
                                                value="Skalabilitas Modal" id="Skalabilitas Modal">
                                            <label class="form-check-label" for="Skalabilitas Modal">
                                                Skalabilitas Modal
                                            </label>
                                        </div>
                                        <p class="text-danger" id="errorSoalSembilan"></p>
                                        <div class="mt-3">
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="BackSoalSembilan()">Back</button>
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="NextSoalSembilan()">Next</button>
                                            {{-- <button type="button" class="btn btn-outline-primary" onclick="NextSoalTujuh()">Next</button> --}}
                                        </div>
                                    </div>

                                    {{-- pertanyaan 10 --}}
                                    <div id="soalKesepuluh" class="mb-3 border-bottom p-3" style="display: none">
                                        <label for="budget">10. Modul apa saja yang dibutuhkan oleh perusaan anda dalam
                                            penggunaan ERP akan direkomendasikan? </label><br>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="101"
                                                value="Manajemen Penjualan (Sales management)"
                                                id="Manajemen Penjualan (Sales management)">
                                            <label class="form-check-label" for="Manajemen Penjualan (Sales management)">
                                                Manajemen Penjualan (Sales management)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="102"
                                                value="Manajemen Persediaan (Inventory management)"
                                                id="Manajemen Persediaan (Inventory management)">
                                            <label class="form-check-label"
                                                for="Manajemen Persediaan (Inventory management)">
                                                Manajemen Persediaan (Inventory management)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="103"
                                                value="Manajemen Pemblian (Purchase management)"
                                                id="Manajemen Pemblian (Purchase management)">
                                            <label class="form-check-label"
                                                for="Manajemen Pemblian (Purchase management)">
                                                Manajemen Pemblian (Purchase management)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="104"
                                                value="Manajemen Produksi (Manufacturing management)"
                                                id="Manajemen Produksi (Manufacturing management)">
                                            <label class="form-check-label"
                                                for="Manajemen Produksi (Manufacturing management)">
                                                Manajemen Produksi (Manufacturing management)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="105"
                                                value="Manajemen Keuangan (Accounting management)"
                                                id="Manajemen Keuangan (Accounting management)">
                                            <label class="form-check-label"
                                                for="Manajemen Keuangan (Accounting management)">
                                                Manajemen Keuangan (Accounting management)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="106"
                                                value="Manajemen Sumber Daya Manusia (Human resource management)"
                                                id="Manajemen Sumber Daya Manusia (Human resource management)">
                                            <label class="form-check-label"
                                                for="Manajemen Sumber Daya Manusia (Human resource management)">
                                                Manajemen Sumber Daya Manusia (Human resource management)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="107"
                                                value="Manajemen Hubungan Pelanggan (Customer Relationship Management/CRM)"
                                                id="Manajemen Hubungan Pelanggan (Customer Relationship Management/CRM)">
                                            <label class="form-check-label"
                                                for="Manajemen Hubungan Pelanggan (Customer Relationship Management/CRM)">
                                                Manajemen Hubungan Pelanggan (Customer Relationship Management/CRM)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="108"
                                                value="Manajemen Proyek (Project Management)"
                                                id="Manajemen Proyek (Project Management)">
                                            <label class="form-check-label" for="Manajemen Proyek (Project Management)">
                                                Manajemen Proyek (Project Management)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="109"
                                                value="Manufaktur (Manufacturing)" id="Manufaktur (Manufacturing)">
                                            <label class="form-check-label" for="Manufaktur (Manufacturing)">
                                                Manufaktur (Manufacturing)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="110"
                                                value="Layanan Pelanggan (Helpdesk)" id="Layanan Pelanggan (Helpdesk)">
                                            <label class="form-check-label" for="Layanan Pelanggan (Helpdesk)">
                                                Layanan Pelanggan (Helpdesk)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="111"
                                                value="Proyek Kolaborasi (Collaborative Projects)"
                                                id="Proyek Kolaborasi (Collaborative Projects)">
                                            <label class="form-check-label"
                                                for="Proyek Kolaborasi (Collaborative Projects)">
                                                Proyek Kolaborasi (Collaborative Projects)
                                            </label>
                                        </div>
                                        <p class="text-danger" id="errorSoalSepuluh"></p>
                                        <div class="mt-3">
                                            <button type="button" class="btn btn-outline-primary"
                                                onclick="BackSoalSepuluh()">Back</button>
                                            {{-- <button type="button" class="btn btn-outline-primary" onclick="NextSoalTujuh()">Next</button> --}}
                                        </div>
                                    </div>

                                    <button class="btn btn-outline-danger" type="reset">Clear</button>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12" id="penjelasanSoalEmpat" style="display: none">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Penjelasan Lisensi ERP</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        <p>
                            <b>• Open Source</b> <br>
                            Dalam konteks pertanyaan ini, jenis lisensi ERP yang diinginkan adalah lisensi open source.
                            Lisensi open source memberikan kebebasan kepada pengguna untuk menggunakan, memodifikasi, dan
                            mendistribusikan perangkat lunak ERP dengan lebih fleksibel. Dengan memilih lisensi open source,
                            perusahaan dapat memanfaatkan kekuatan kolaborasi dan akses ke kode sumber yang terbuka, yang
                            dapat memungkinkan penyesuaian dan pengembangan yang lebih baik sesuai dengan kebutuhan bisnis.
                            <br> <b>• Hybrid</b> <br>
                            Lisensi hybrid mengacu pada pendekatan di mana beberapa komponen perangkat lunak ERP
                            dilisensikan sebagai open source, sementara beberapa komponen lainnya dilisensikan sebagai
                            proprietary. Dalam skenario lisensi hybrid, perusahaan dapat memanfaatkan kelebihan dari kedua
                            jenis lisensi.
                            <br> <b>• Proprietary</b> <br>
                            Lisensi ini sering kali melibatkan pembatasan penggunaan, modifikasi, dan distribusi perangkat
                            lunak, serta mungkin memerlukan biaya lisensi yang harus dibayar oleh pengguna atau perusahaan
                            yang ingin menggunakan ERP tersebut. Perusahaan biasanya mendapatkan akses eksklusif ke
                            perangkat lunak tersebut, tetapi mungkin terbatas dalam hal penyesuaian, modifikasi, atau
                            distribusi lebih lanjut tanpa izin dari pemilik lisensi. Jenis lisensi proprietary sering kali
                            digunakan oleh vendor ERP komersial yang mengembangkan perangkat lunak mereka dan menjual
                            lisensi penggunaannya kepada perusahaan atau organisasi.

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12" id="penjelasanSoalLima" style="display: none">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Penjelasan Kostumisasi ERP</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        <p>Terkait pada bagaimana kostumisasi, sebuah sistem perencanaan sumber day perusahaan (ERP) dapat
                            disesuaikan atau dikostumisasi untuk memenuhi kebutuhan khusus suatu organisasi. Kostumisasi ERP
                            mengacu pada kemampuan untuk mengubah atau menyesuaikan sistem ERP yang ada agar sesuai dengan
                            kebutuhan unik suatu perusahaan. Setiap perusahaan memiliki proses bisnis yang berbeda,
                            kebijakan internal, dan persyaratan operasional yang unik. Oleh karena itu, dengan
                            mengkostumisasi ERP, perusahaan dapat memodifikasi atau menyesuaikan fungsi-fungsi dan
                            fitur-fitur ERP yang sesuai dengan kebutuhan perusahaan.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12" id="penjelasanSoalKeenam" style="display: none">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Penjelasan Anggaran ERP</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        <p>
                            Pertanyaan diatas bertujuan untuk mengetahui apakah perusahaan memiliki sumber daya finansial
                            yang cukup untuk melaksanakan implementasi dan pemeliharaan sistem ERP. Implementasi ERP
                            melibatkan biaya yang mencakup pembelian, instalasi, konfigurasi, pelatihan, dan migrasi data.
                            Pemeliharaan ERP juga melibatkan biaya untuk pembaruan, perawatan, dukungan teknis, dan
                            peningkatan sistem secara berkala.
                            <br>
                            Dengan menanyakan pertanyaan ini, dapat diketahui apakah perusahaan telah menganggarkan dana
                            yang cukup untuk melaksanakan seluruh proses implementasi dan pemeliharaan ERP dengan lancar.
                            Hal ini penting karena kekurangan anggaran yang memadai dapat menghambat kemajuan implementasi
                            atau menyebabkan kesulitan dalam menjaga sistem ERP yang sudah terpasang.

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12" id="penjelasanSoalKetujuh" style="display: none">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Penjelasan Antarmuka ERP</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        <p>
                            Jika Anda lebih suka menggunakan sistem ERP dengan antarmuka pengguna yang sederhana, itu
                            berarti Anda mengutamakan kemudahan penggunaan dan kesederhanaan dalam mengoperasikan sistem.
                            Anda mungkin menginginkan pengalaman pengguna yang intuitif dan mudah dipahami tanpa memerlukan
                            tingkat keahlian teknis yang tinggi. Prioritas Anda adalah untuk memiliki sistem yang dapat
                            digunakan dengan cepat oleh pengguna dengan berbagai tingkat keahlian.
                            <br>
                            Di sisi lain, jika tingkat keahlian teknis bukanlah masalah bagi Anda, itu berarti Anda mungkin
                            lebih fokus pada kemampuan dan fleksibilitas sistem ERP. Anda mungkin memiliki pengetahuan atau
                            tim yang terampil dalam bidang teknis yang dapat mengelola dan mengkonfigurasi sistem dengan
                            lebih baik. Dalam hal ini, Anda mungkin lebih mempertimbangkan sistem ERP yang menawarkan fitur
                            dan kemampuan yang luas, bahkan jika itu berarti antarmuka pengguna yang lebih kompleks.

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12" id="penjelasanSoalKedelapan" style="display: none">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Penjelasan waktu implementasi</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        <p>
                            Waktu implementasi mengarah pada periode waktu yang diharapkan untuk mengimplementasikan sistem
                            ERP (Enterprise Resource Planning) dalam suatu organisasi atau perusahaan. Implementasi sistem
                            ERP dapat menjadi proses yang kompleks dan melibatkan berbagai faktor, termasuk ukuran
                            perusahaan, kompleksitas sistem yang diterapkan, sumber daya yang tersedia, dan tingkat
                            persiapan dan kesiapan organisasi.
                            <br>
                            Waktu implementasi sistem ERP dapat bervariasi secara signifikan. Pada umumnya, implementasi
                            sistem ERP dapat memakan waktu beberapa bulan hingga beberapa tahun, tergantung pada
                            kompleksitas dan skala proyeknya. Proses implementasi meliputi perencanaan, analisis kebutuhan,
                            desain sistem, pengembangan atau pengadaan perangkat lunak, konfigurasi, pengujian, pelatihan,
                            migrasi data, dan pemeliharaan.

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12" id="penjelasanSoalKesembilan" style="display: none">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Penjelasan Skalabilitas</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        <p>
                            Skalabilitas adalah ukuran beberapa aspek yang akan ditingkat sesuai dengan kebutuhan perusahaan
                            dari ERP yang akan digunakan. ERP ini akan membantu perusahan melihat aspek yang akan lebih
                            ditingkat dan dikembangkan. Dimana bertujuan untuk mengetahui aspek-aspek tertentu dalam
                            skalabilitas yang perlu ditingkatkan ketika nantinya menggunakan ERP.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12" id="penjelasanSoalKesepuluh" style="display: none">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Penjelasan Modul</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        <p>
                            Pertanyaan diatas bertujuan untuk mengetahui modul atau fitur-fitur khusus yang diperlukan oleh
                            perusahaan dalam sistem ERP. Karena pada umumnya sistem ERP memiliki berbagai modul yang
                            mencakup berbagai fungsi seperti keuangan, persediaan, produksi, sumber daya manusia, penjualan,
                            dan lain sebagainya.
                            <br>
                            Dengan pertanyaan ini, dapat diketahui kebutuhan spesifik perusahaan terkait modul atau fitur
                            yang ingin mereka gunakan dalam sistem ERP. Setiap perusahaan memiliki kebutuhan yang
                            berbeda-beda tergantung pada jenis industri, ukuran perusahaan, dan proses bisnis yang
                            dijalankan.

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div id="myDiv" style="background-color: red; width: 200px; height: 100px;"></div>
        <div id="myDiv2" style="background-color: red; width: 500px; height: 100px; display:none;"></div>
        <button onclick="changeStyle()">test</button> --}}

    </div>

    <script>
        var soalPertama = document.getElementById("soalPertama");
        var soalKedua = document.getElementById("soalKedua");
        var soalKetiga = document.getElementById("soalKetiga");
        var soalKeempat = document.getElementById("soalKeempat");
        var soalKelima = document.getElementById("soalKelima");
        var soalKeenam = document.getElementById("soalKeenam");
        var soalKetujuh = document.getElementById("soalKetujuh");
        var soalKedelapan = document.getElementById("soalKedelapan");
        var soalKesembilan = document.getElementById("soalKesembilan");
        var soalKesepuluh = document.getElementById("soalKesepuluh");

        // penjelasan
        var penjelasanSoalEmpat = document.getElementById("penjelasanSoalEmpat");
        var penjelasanSoalLima = document.getElementById("penjelasanSoalLima");
        var penjelasanSoalKeenam = document.getElementById("penjelasanSoalKeenam");
        var penjelasanSoalKetujuh = document.getElementById("penjelasanSoalKetujuh");
        var penjelasanSoalKedelapan = document.getElementById("penjelasanSoalKedelapan");
        var penjelasanSoalKesembilan = document.getElementById("penjelasanSoalKesembilan");
        var penjelasanSoalKesepuluh = document.getElementById("penjelasanSoalKesepuluh");

        // error message
        var errorSoalSatu = document.getElementById("errorSoalSatu");
        var errorSoalDua = document.getElementById("errorSoalDua");
        var errorSoalTiga = document.getElementById("errorSoalTiga");
        var errorSoalEmpat = document.getElementById("errorSoalEmpat");
        var errorSoalLima = document.getElementById("errorSoalLima");
        var errorSoalEnam = document.getElementById("errorSoalEnam");
        var errorSoalTujuh = document.getElementById("errorSoalTujuh");
        var errorSoalDelapan = document.getElementById("errorSoalDelapan");
        var errorSoalSembilan = document.getElementById("errorSoalSembilan");
        var errorSoalSepuluh = document.getElementById("errorSoalSepuluh");

        // soal 1 check error
        var radioButtons = document.querySelectorAll('input[name="1"]');
        var selectedOption = null;
        var selectedValue = null;

        for (var i = 0; i < radioButtons.length; i++) {
            radioButtons[i].addEventListener('change', function() {
                selectedOption = this;
                selectedValue = selectedOption.value;
            });
        }

        // soal 2 check error
        var radioButtons2 = document.querySelectorAll('input[name="2"]');
        var selectedOption2 = null;
        var selectedValue2 = null;

        for (var i = 0; i < radioButtons2.length; i++) {
            radioButtons2[i].addEventListener('change', function() {
                selectedOption2 = this;
                selectedValue2 = selectedOption2.value;
            });
        }

        // soal 3 check error
        var radioButtons3 = document.querySelectorAll('input[name="3"]');
        var selectedOption3 = null;
        var selectedValue3 = null;

        for (var i = 0; i < radioButtons3.length; i++) {
            radioButtons3[i].addEventListener('change', function() {
                selectedOption3 = this;
                selectedValue3 = selectedOption3.value;
            });
        }

        // soal 4 check error
        var radioButtons4 = document.querySelectorAll('input[name="4"]');
        var selectedOption4 = null;
        var selectedValue4 = null;

        for (var i = 0; i < radioButtons4.length; i++) {
            radioButtons4[i].addEventListener('change', function() {
                selectedOption4 = this;
                selectedValue4 = selectedOption4.value;
            });
        }

        // soal 5 check error
        var radioButtons5 = document.querySelectorAll('input[name="5"]');
        var selectedOption5 = null;
        var selectedValue5 = null;

        for (var i = 0; i < radioButtons5.length; i++) {
            radioButtons5[i].addEventListener('change', function() {
                selectedOption5 = this;
                selectedValue5 = selectedOption5.value;
            });
        }

        // soal 6 check error
        var radioButtons6 = document.querySelectorAll('input[name="6"]');
        var selectedOption6 = null;
        var selectedValue6 = null;

        for (var i = 0; i < radioButtons6.length; i++) {
            radioButtons6[i].addEventListener('change', function() {
                selectedOption6 = this;
                selectedValue6 = selectedOption6.value;
            });
        }

        // soal 7 check error
        var radioButtons7 = document.querySelectorAll('input[name="7"]');
        var selectedOption7 = null;
        var selectedValue7 = null;

        for (var i = 0; i < radioButtons7.length; i++) {
            radioButtons7[i].addEventListener('change', function() {
                selectedOption7 = this;
                selectedValue7 = selectedOption7.value;
            });
        }

        // soal 8 check error
        var radioButtons8 = document.querySelectorAll('input[name="8"]');
        var selectedOption8 = null;
        var selectedValue8 = null;

        for (var i = 0; i < radioButtons8.length; i++) {
            radioButtons8[i].addEventListener('change', function() {
                selectedOption8 = this;
                selectedValue8 = selectedOption8.value;
            });
        }
        // soal 9 check error
        var radioButtons9 = document.querySelectorAll('input[name="9"]');
        var selectedOption9 = null;
        var selectedValue9 = null;

        for (var i = 0; i < radioButtons9.length; i++) {
            radioButtons9[i].addEventListener('change', function() {
                selectedOption9 = this;
                selectedValue9 = selectedOption9.value;
            });
        }
        // soal 10 check error
        var radioButtons10 = document.querySelectorAll('input[name="10"]');
        var selectedOption10 = null;
        var selectedValue10 = null;

        for (var i = 0; i < radioButtons10.length; i++) {
            radioButtons10[i].addEventListener('change', function() {
                selectedOption10 = this;
                selectedValue10 = selectedOption10.value;
            });
        }

        function NextSoalSatu() {
            // console.log(selectedValue);
            if (!selectedValue) {
                errorSoalSatu.textContent = 'Jawaban belum dipilih, pilih salah satu Jawaban';
            } else {
                soalPertama.style.display = 'none';
                soalKedua.style.display = '';
            }
        }

        function NextSoalDua() {
            if (!selectedValue2) {
                errorSoalDua.textContent = 'Jawaban belum dipilih, pilih salah satu Jawaban';
            } else {
                soalKedua.style.display = 'none';
                soalKetiga.style.display = '';
            }

        }

        function BackSoalDua() {
            soalKedua.style.display = 'none';
            soalPertama.style.display = '';
        }

        function NextSoalTiga() {
            if (!selectedValue3) {
                errorSoalTiga.textContent = 'Jawaban belum dipilih, pilih salah satu Jawaban';
            } else {
                soalKetiga.style.display = 'none';
                soalKeempat.style.display = '';
                penjelasanSoalEmpat.style.display = '';
            }

        }

        function BackSoalTiga() {
            soalKetiga.style.display = 'none';
            soalKedua.style.display = '';
        }

        function NextSoalEmpat() {
            if (!selectedValue4) {
                errorSoalEmpat.textContent = 'Jawaban belum dipilih, pilih salah satu Jawaban';
            } else {
                soalKeempat.style.display = 'none';
                soalKelima.style.display = '';
                penjelasanSoalEmpat.style.display = 'none';
                penjelasanSoalLima.style.display = '';
            }

        }

        function BackSoalEmpat() {
            soalKeempat.style.display = 'none';
            soalKetiga.style.display = '';
            penjelasanSoalEmpat.style.display = 'none';
        }

        function NextSoalLima() {
            if (!selectedValue5) {
                errorSoalLima.textContent = 'Jawaban belum dipilih, pilih salah satu Jawaban';
            } else {
                soalKelima.style.display = 'none';
                soalKeenam.style.display = '';
                penjelasanSoalLima.style.display = 'none';
                penjelasanSoalKeenam.style.display = '';
            }

        }

        function BackSoalLima() {
            soalKelima.style.display = 'none';
            soalKeempat.style.display = '';
            penjelasanSoalEmpat.style.display = '';
            penjelasanSoalLima.style.display = 'none';


        }

        function NextSoalEnam() {
            if (!selectedValue6) {
                errorSoalEnam.textContent = 'Jawaban belum dipilih, pilih salah satu Jawaban';
            } else {
                soalKeenam.style.display = 'none';
                soalKetujuh.style.display = '';
                penjelasanSoalKeenam.style.display = 'none';
                penjelasanSoalKetujuh.style.display = '';
            }

        }

        function BackSoalEnam() {
            soalKeenam.style.display = 'none';
            soalKelima.style.display = '';
            penjelasanSoalLima.style.display = '';
            penjelasanSoalKeenam.style.display = 'none';


        }

        function NextSoalTujuh() {
            if (!selectedValue7) {
                errorSoalTujuh.textContent = 'Jawaban belum dipilih, pilih salah satu Jawaban';
            } else {
                soalKedelapan.style.display = '';
                soalKetujuh.style.display = 'none';
                penjelasanSoalKetujuh.style.display = 'none';
                penjelasanSoalKedelapan.style.display = '';
            }

        }

        function BackSoalTujuh() {
            soalKetujuh.style.display = 'none';
            soalKeenam.style.display = '';
            penjelasanSoalKeenam.style.display = '';
            penjelasanSoalKetujuh.style.display = 'none';

        }

        function NextSoalDelapan() {
            if (!selectedValue8) {
                errorSoalDelapan.textContent = 'Jawaban belum dipilih, pilih salah satu Jawaban';
            } else {
                soalKedelapan.style.display = 'none';
                soalKesembilan.style.display = '';
                penjelasanSoalKedelapan.style.display = 'none';
                penjelasanSoalKesembilan.style.display = '';
            }
        }

        function BackSoalDelapan() {
            soalKetujuh.style.display = '';
            soalKedelapan.style.display = 'none';
            penjelasanSoalKedelapan.style.display = 'none';
            penjelasanSoalKetujuh.style.display = '';

        }

        function NextSoalSembilan() {
            // if (!selectedValue9) {
            //     errorSoalSembilan.textContent = 'Jawaban belum dipilih, pilih salah satu Jawaban';
            // } else {
                soalKesembilan.style.display = 'none';
                soalKesepuluh.style.display = '';
                penjelasanSoalKesembilan.style.display = 'none';
                penjelasanSoalKesepuluh.style.display = '';
            // }
        }

        function BackSoalSembilan() {
            soalKedelapan.style.display = '';
            soalKesembilan.style.display = 'none';
            penjelasanSoalKedelapan.style.display = '';
            penjelasanSoalKesembilan.style.display = '';

        }
        // function NextSoalSepuluh() {
        //     if (!selectedValue10) {
        //         errorSoalSepuluh.textContent = 'Jawaban belum dipilih, pilih salah satu Jawaban';
        //     } else {
        //         soal.style.display = '';
        //         // penjelasanSoalKetujuh.style.display = '';
        //         penjelasanSoalKedelapan.style.display = 'none';
        //         // penjelasanSoalKetujuh.style.display = '';
        //     }
        //     soalKetujuh.style.display = 'none';

        // }

        function BackSoalSepuluh() {
            soalKesepuluh.style.display = 'none';
            soalKesembilan.style.display = '';
            penjelasanSoalKesembilan.style.display = '';
            penjelasanSoalKesepuluh.style.display = 'none';

        }
    </script>
@endsection
