@extends('layouts.admin.master')
@section('title', 'Dashboard')
@section('content')
    
    <div class="content-wrapper hidden cardscanQr">
    <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
            <div id="reader" width="500px"></div>
            </div>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data /</span> Transactions Books</h4>
            <div class="card">
                <div class="card-header py-5">
                    <h4 class="card-title align-items-start d-flex flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Transactions Books</span>
                    </h4>
                    <div
                        class="md:items-center align-items-start gap-2 gap-md-5 d-flex flex-column flex-md-row justify-content-between">
                        <!-- Search input -->
                        <div class="d-flex flex-col align-items-start position-relative">
                            <form>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="tf-icons bx bx-search"></i></span>
                                    <input type="text" id="searchBook" data-filter="search" class="form-control"
                                        placeholder="Search..." />
                                </div>
                            </form>
                            <div class="mt-2 card-toolbar flex-row-fluid justify-content-end gap-5">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalAddPeminjaman">
                                    Add Peminjaman
                                </button>
                            </div>
                        </div>
                        <!-- Add Book button -->
                        <div>
                            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                <button type="button" id="showButton" class="btn btn-primary">
                                    Fine Transactions
                                </button>
                            </div>
                            <div class="mt-2 card-toolbar flex-row-fluid justify-content-end gap-5">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="">
                                      <a class="dropdown-item" href="{{ route('exportYearlyReport',['year' => $today->year]) }}">Export {{$today->year}}</a>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive text-nowrap">
                    <table class="table table-hover mb-2" id="booktable">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Peminjam</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Tanggal Batas Pengembalian</th>
                                <th>Status</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($peminjaman as $item)
                                <tr>
                                    <td>
                                        <span class="fw-medium">{{ $item->user->anggota->nama_lengkap }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-medium formatDate">{{ $item->tanggal_peminjaman }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-medium formatDate">{{ $item->tanggal_pengembalian }}</span>
                                    </td>
                                    <td>
                                        <span class="fw-medium formatDate">{{ $item->tanggal_batas_pengembalian }}</span>
                                    </td>
                                    <td>
                                        @if ($item->DetailPeminjaman->isNotEmpty())
                                        @php
                                            $firstBook = $item->DetailPeminjaman->first();
                                        @endphp
                                            <span class="badge bg-label-primary me-1">{{ $firstBook->status_peminjaman }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/dashboard/transactionBooks/changePageScan/') . '/' . $item->id }}">
                                            <button type="button" class="btn btn-icon btn-primary">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>


     {{-- Modal add --}}
     <div class="modal fade" id="modalAddPeminjaman" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="tambahBuku" method="POST" action="{{ route('storePeminjamanManual') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Tambah Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Multiple -->
                        <div class="col mb-3">
                            <label for="select2Multiple" class="form-label">Select User</label>
                            <select id="select2Basic" name="userId" class="select2 form-select form-select-lg select2-hidden-accessible" data-allow-clear="true" data-select2-id="select2Basic" tabindex="-1" aria-hidden="true">
                                <option selected></option>
                                @foreach ($getUser as $item)
                                    <option value="{{ $item->id }}">{{ $item->userName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameWithTitle" class="form-label">Cari buku</label>
                                <select id="select2Multiple" class="select2 form-select" multiple name="buku_id">
                                    <option selected></option>
                                    @foreach ($getBuku as $item)
                                        <option value="{{ $item->id }}">{{ $item->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col mb-0">
                            <label for="tahunTerbit" class="form-label">Tanggal Peminjaman </label>
                            <input type="date" name="tanggal_peminjaman" class="form-control" />
                        </div>
                        <div class="col mb-0">
                            <label for="tahunTerbit" class="form-label">Tanggal Pengembalian </label>
                            <input type="date" name="tanggal_pengembalian" class="form-control" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" id="#save-button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- modal add end --}}

    <script>
        $(document).ready(function() {
            function loadData(peminjamanId) {
                $.ajax({
                    url: "{{ url('/dashboard/transactionBooks/scanQr/') }}" + "/" + peminjamanId,
                    type: 'GET',
                    success: function(data) {
                        console.log(data);
                        setTimeout(function() {
                            window.location.href = "{{ url('/dashboard/transactionBooks/changePageScan/') }}" + "/" + data;
                        }, 1000);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
            
            function onScanSuccess(decodedText, decodedResult) {
                // handle the scanned code as you like, for example:
                console.log(`Code matched = ${decodedText}`, decodedResult);
                var decodedData = JSON.parse(decodedText);
    
                var peminjamanId = decodedData.peminjaman_id;
                loadData(peminjamanId);
            }
    
            function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            // console.warn(`Code scan error = ${error}`);
            }
    
            let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader",
            { fps: 10, qrbox: {width: 250, height: 250} },
            /* verbose= */ false);
            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        });
    </script>
    <script>
        const showButton = document.getElementById('showButton');
        const hiddenDiv = document.querySelector('.cardscanQr');

        showButton.addEventListener('click', function() {
            hiddenDiv.classList.toggle('hidden');
        });
    </script>
    <script>
        $(document).ready(function() {
            var dataTable = new DataTable('#booktable', {
                buttons: ['showSelected'],
                dom: 'rtp',
                select: true,
                pageLength: 5,
                border: false,
            });

            $('#searchBook').on('keyup', function() {
                dataTable.search($(this).val()).draw();
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var dateCells = document.querySelectorAll('.formatDate');
            dateCells.forEach(function(cell) {
                var originalDate = cell.textContent.trim();
                var formattedDate = new Date(originalDate).toLocaleDateString('en-US', {
                    day: 'numeric',
                    month: 'short',
                    year: 'numeric'
                });
                cell.textContent = formattedDate;
            });
        });

        function formatDateString(dateString) {
            var dateObj = new Date(dateString);
            return dateObj.toLocaleDateString('en-US', {
                day: 'numeric',
                month: 'short',
                year: 'numeric'
            });
        }
    </script>
<script src="https://cdn.tailwindcss.com"></script>

@endsection
