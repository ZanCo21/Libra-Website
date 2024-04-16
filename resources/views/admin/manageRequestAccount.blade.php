@extends('layouts.admin.master')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data /</span> Manage Request Account</h4>
            <div class="card">
                <div class="card-header py-5">
                    <h3 class="card-title align-items-start d-flex flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Manage Request Account</span>
                    </h3>
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
                    </div>
                </div>
                <div class="card-body table-responsive text-nowrap">
                    <table class="table table-hover mb-2" id="booktable">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($getUser as $item)
                                <tr>
                                    <td>
                                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <span class="fw-medium">{{ $item->anggota->nama_lengkap }}</span>
                                    </td>
                                    <td>
                                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <span class="fw-medium">{{ $item->email }}</span>
                                    </td>
                                    <td>
                                        <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <span class="fw-medium">{{ $item->role }}</span>
                                    </td>
                                    @if ($item->status == 'active')
                                        <td><span class="badge bg-label-success me-1">{{ $item->status }}</span></td>
                                    @elseif($item->status == 'inactive')
                                        <td><span class="badge bg-label-primary me-1">{{ $item->status }}</span></td>
                                    @else
                                        <td><span class="badge bg-label-danger me-1">{{ $item->status }}</span></td>
                                    @endif
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item btnRequestAccount" href="javascript:void(0);" data-id ="{{ $item->id }}" data-username="{{ $item->userName }}" data-email="{{ $item->email }}" data-namalengkap="{{ $item->anggota->nama_lengkap }}" data-notelephone="{{ $item->anggota->no_telephone }}" data-kelamin="{{ $item->anggota->jenis_kelamin }}" data-jeniskartu="{{ $item->anggota->jenis_kartu_identitas }}" data-noidentitas="{{ $item->anggota->no_identitas }}" data-provinsi="{{ $item->anggota->provinsi }}" data-kecamatan="{{ $item->anggota->kecamatan }}" data-kelurahan="{{ $item->anggota->kelurahan }}" data-role="{{ $item->role }}" data-address="{{ $item->anggota->alamat }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Detail</a>
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
    <div class="modal fade" id="modalRequestAccount" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Request Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col mb-3">
                        <label class="form-label" for="username1">Username</label>
                        <input name="username" type="text" id="username" class="form-control"
                            disabled/>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label" for="email1">Email</label>
                        <input name="email" type="text" id="email" class="form-control" disabled/>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label" for="namalengkap">Name Lengkap</label>
                        <input name="namalengkap" type="text" id="namalengkap" class="form-control" disabled/>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label" for="notelephone">No Telephone</label>
                        <input name="notelephone" type="number" id="notelephone" class="form-control" disabled/>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label" for="nomer-telephone">Jenis Kelamin</label>
                        <input name="kelamin" type="text" id="kelamin" class="form-control" disabled/>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label" for="jeniskartu">Jenis Kartu Identitas</label>
                        <input name="jeniskartu" type="text" id="jeniskartu" class="form-control" disabled/>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label" for="noidentitas">No Identitas</label>
                        <input name="noidentitas" type="number" id="noidentitas" class="form-control" disabled/>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label" for="nomer-telephone">Provinsi</label>
                        <input name="provinsi" type="text" id="provinsi" class="form-control" disabled/>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label" for="nomer-telephone">Kota</label>
                        <input name="kota" type="text" id="kota" class="form-control" disabled/>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label" for="nomer-telephone">Kecamatan</label>
                        <input name="kecamatan" type="text" id="kecamatan" class="form-control" disabled/>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label" for="nomer-telephone">Kelurahan</label>
                        <input name="kelurahan" type="text" id="kelurahan" class="form-control" disabled/>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label" for="nomer-telephone">Role</label>
                        <input name="role" type="text" id="role" class="form-control" disabled/>
                    </div>
                    <div class="col-sm-12">
                        <label class="form-label" for="address">Address</label>
                        <textarea name="address" class="form-control" id="address" rows="3" disabled></textarea>
                    </div>
                    <input type="hidden" name="status" value="active">
                </div>
                <div class="modal-footer">
                    <form action="{{ route('approveAccount') }}" method="POST">
                        @csrf
                            <input name="user_id" type="hidden" id="user_id" class="form-control" value=""/>
                            
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" id="#save-button" class="btn btn-primary">Approve</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).on('click', '.btnRequestAccount', function() {
            var id = $(this).data('id');
            var username = $(this).data('username');
            var email = $(this).data('email');
            var namalengkap = $(this).data('namalengkap');
            var notelephone = $(this).data('notelephone');
            var kelamin = $(this).data('kelamin');
            var jeniskartu = $(this).data('jeniskartu');
            var noidentitas = $(this).data('noidentitas');
            var provinsi = $(this).data('provinsi');
            var kecamatan = $(this).data('kecamatan');
            var kelurahan = $(this).data('kelurahan');
            var role = $(this).data('role');
            var address = $(this).data('address');
    
            $('#user_id').val(id);
            $('#username').val(username);
            $('#email').val(email);
            $('#namalengkap').val(namalengkap);
            $('#notelephone').val(notelephone);
            $('#kelamin').val(kelamin);
            $('#jeniskartu').val(jeniskartu);
            $('#noidentitas').val(noidentitas);
            $('#provinsi').val(provinsi);
            $('#kota').val(kecamatan);
            $('#kecamatan').val(kecamatan);
            $('#kelurahan').val(kelurahan);
            $('#role').val(role);
            $('#address').val(address);

    
            // Tampilkan modal
            $('#modalRequestAccount').modal('show');
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
    </script>
@endsection