@extends('layouts.admin.master')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data /</span> Manage Books</h4>
            <div class="card">
                <div class="card-header py-5">
                    <h4 class="card-title align-items-start d-flex flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Manage Book</span>
                    </h4>
                    <div
                        class="md:items-center align-items-start gap-2 gap-md-5 d-flex flex-column flex-md-row justify-content-between">
                        <!-- Search input -->
                        <div class="d-flex align-items-center position-relative">
                            <form>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="tf-icons bx bx-search"></i></span>
                                    <input type="text" id="searchBook" data-filter="search" class="form-control"
                                        placeholder="Search..." />
                                </div>
                            </form>
                        </div>
                        <!-- Add Book button -->
                        <div>
                            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalCenter">
                                    Add Book
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive text-nowrap">
                    <table class="table table-hover mb-2" id="booktable">
                        <thead class="table-light">
                            <tr>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Tahun Terbit</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($books as $item)
                                <tr>
                                    <td>
                                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <span class="fw-medium">{{ $item->judul }}</span>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                                class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                                <img src="../assets/img/avatars/5.png" alt="Avatar"
                                                    class="rounded-circle lazyload" />
                                            </li>
                                            <li>
                                                {{ $item->penulis }}
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <span class="fw-medium formatDate">{{ $item->tahunTerbit }}</span>
                                    </td>
                                    @if ($item->stock == 0)
                                        <td><span class="badge bg-label-primary me-1">out of stock</span></td>
                                    @else
                                        <td><span class="badge bg-label-primary me-1">Available</span></td>
                                    @endif
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="tambahBuku" method="POST" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Tambah Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameWithTitle" class="form-label">Judul Buku</label>
                                <input type="text" name="judul" id="nameWithTitle" class="form-control"
                                    placeholder="Judul Buku" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="row mt-2">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Front Book Cover</label>
                                    <input class="form-control" type="file" name="front_book_cover">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Back Book Cover</label>
                                    <input class="form-control" type="file" name="back_book_cover">
                                </div>
                            </div>
                            <div class="col mb-3">
                                <label for="penulis" class="form-label">Penulis</label>
                                <input type="text" name="penulis" id="penulis" class="form-control"
                                    placeholder="Penulis Buku" />
                            </div>
                        </div>
                        <div class="row">

                        </div>
                        <div class="col mb-3">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" name="penerbit" id="penerbit" class="form-control"
                                placeholder="Kepustakaan Libra" />
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col mb-0">
                                <label for="penerbit" class="form-label">Stock</label>
                                <input class="form-control" name="stock" type="number" value="1"
                                    id="html5-number-input" />
                            </div>
                            <div class="col mb-0">
                                <label for="tahunTerbit" class="form-label">Tahun Terbit</label>
                                <input type="date" name="tahunTerbit" id="tahunTerbit" class="form-control" />
                            </div>
                        </div>
                        <!-- Multiple -->
                        <div class="col mb-3">
                            <label for="select2Multiple" class="form-label">Multiple</label>
                            <select id="select2Multiple" class="select2 form-select" multiple name="kategori[]">
                                @foreach ($kategoris as $item)
                                    <option value="{{ $item->id }}">{{ $item->namaKategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="deskripsi" id="deskripsi">
                        <div class="row">
                            <!-- Snow Theme -->
                            <div class="col-12">
                                <div class="card mb-4">
                                    <h6 class="card-header">Deskripsi</h6>
                                    <div class="card-body">
                                        <div id="snow-toolbar">
                                            <span class="ql-formats">
                                                <select class="ql-font"></select>
                                                <select class="ql-size"></select>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-bold"></button>
                                                <button class="ql-italic"></button>
                                                <button class="ql-underline"></button>
                                                <button class="ql-strike"></button>
                                            </span>
                                            <span class="ql-formats">
                                                <select class="ql-color"></select>
                                                <select class="ql-background"></select>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-script" value="sub"></button>
                                                <button class="ql-script" value="super"></button>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-header" value="1"></button>
                                                <button class="ql-header" value="2"></button>
                                                <button class="ql-blockquote"></button>
                                                <button class="ql-code-block"></button>
                                            </span>
                                        </div>
                                        <div id="snow-editor" name="deskripsi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Snow Theme -->
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

        $('form[id="tambahBuku"]').submit(function(event) {
            event.preventDefault();
            var editorText = $('#snow-editor .ql-editor').html();
            $('#deskripsi').val(editorText);
            var formData = new FormData($(this)[0]);

            $.ajax({
                url: '{{ route('storeBooks') }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#modalCenter').modal('hide');
                    $.LoadingOverlay("show");
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Book berhasil ditambahkan.',
                        confirmButtonText: 'OK',
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat menyimpan data.',
                        confirmButtonText: 'OK'
                    });
                },
                complete: function() {
                    $.LoadingOverlay("hide");
                },
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
@endsection
