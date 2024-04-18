@extends('layouts.admin.master')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Data /</span> Manage Account</h4>
            <div class="card">
                <div class="card-header py-5">
                    <h4 class="card-title align-items-start d-flex flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Manage Account</span>
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
                        @if(auth()->check() && auth()->user()->hasRole('admin'))
                        <div>
                            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalCenter">
                                    Add Account
                                </button>
                            </div>
                        </div>
                        @endif
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
                                                @if ($item->status == 'active')
                                                <a id="btn-updateStatus" data-id="{{ $item->id }}" data-status="{{ $item->status }}" class="dropdown-item" href="javascript:void(0);" onclick="userStatus()"><i
                                                        class="bx bx-edit-alt me-1"></i>Block</a>
                                                @else
                                                <a id="btn-updateStatus" data-id="{{ $item->id }}" data-status="{{ $item->status }}" class="dropdown-item" href="javascript:void(0);" onclick="userStatus()"><i
                                                        class="bx bx-trash me-1"></i> Unblock</a>
                                                @endif
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
                <form id="tambahBuku" method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Tambah Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col mb-3">
                            <label class="form-label" for="username1">Username</label>
                            <input name="username" type="text" id="username1" class="form-control"
                                placeholder="johnBro" required/>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label" for="email1">Email</label>
                            <input name="email" type="text" id="email" class="form-control" placeholder="john@gmail.com"
                                aria-label="john@gmail.com" required/>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label" for="password60">Password</label>
                            <div class="input-group input-group-merge">
                                <input name="password" type="password" id="password60" class="form-control"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password6" required/>
                                <span class="input-group-text cursor-pointer" id="password6"><i
                                        class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label" for="nama-lengkap">Name Lengkap</label>
                            <input name="nama_lengkap" type="text" id="nama-lengkap" class="form-control"
                                placeholder="John Doe" required/>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label" for="nomer-telephone">No Telephone</label>
                            <input name="no_telephone" type="number" id="nomer-telephone" class="form-control"
                                placeholder="08x-xxx-xxx" required/>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label" for="country1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="select2" id="country1" required>
                                <option label=" "></option>
                                <option value="male">Laki - Laki</option>
                                <option value="female">Perempuan</option>
                            </select>
                        </div>
                        <div class="col mb-3">
                          <div class="flex flex-col">
                            <label class="form-label">Jenis Kartu Identitas</label>
                            <div class="d-flex mt-2">
                              <div class="form-check">
                                <input name="jenis_kartu_identitas" class="form-check-input" type="radio" value="KTP" id="collapsible-addressType-home" checked="">
                                <label class="form-check-label" for="collapsible-addressType-home"> KTP</label>
                              </div>
                              <div class="form-check ms-4">
                                <input name="jenis_kartu_identitas" class="form-check-input" type="radio" value="KARTU PELAJAR" id="collapsible-addressType-office">
                                <label class="form-check-label" for="collapsible-addressType-office"> KARTU PELAJAR </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col mb-3">
                          <label class="form-label" for="nomer-telephone">No Identitas</label>
                          <input name="no_identitas" type="number" id="nomer-identitas" class="form-control"
                              placeholder="xxx-xxx-xxx" required/>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label" for="provinsi">Provinsi</label>
                            <select id="provinsi" class="form-select" name="provinsi" required>
                              <option label="Pilih Provinsi"></option>
                              @foreach ($provinsi as $item)
                              <option value="{{$item['name']}}" data-ProvinsiID="{{ $item['id'] }}">{{$item['name']}}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col mb-3" id="divKota" hidden>
                            <label class="form-label">Kota</label>
                            <select id="kota" class="form-select" name="kota" required>
                            </select>
                        </div>
                        <div class="col mb-3" id="divKecamatan" hidden>
                            <label class="form-label" for="google1">Kecamatan</label>
                            <select id="kecamatan" class="form-select" name="kecamatan" required>
                            </select>
                        </div>
                        <div class="col mb-3" id="divKelurahan" hidden>
                            <label class="form-label" for="linkedin1">Kelurahan</label>
                            <select id="kelurahan" class="form-select" name="kelurahan" required>
                              <option label=""></option>
                            </select>
                        </div>
                        <div class="col mb-3">
                            <label for="select2Basic" class="form-label">Role</label>
                            <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true" name="role">
                                <option disabled selected>Pilih Role</option>
                                @foreach ($getRoles as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12" id="divAddress" hidden>
                          <label class="form-label" for="google1">Address</label>
                          <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Jalan/Gang/Blok/Dusun, RT, RW, Kelurahan, Kecamatan, KodePos" required></textarea>
                        </div>
                        <input type="hidden" name="status" value="active">
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
            $('select[id="provinsi"]').on('change', function(){
  
              var provinsi = $("#provinsi option:selected").attr("data-ProvinsiID");
  
              if(provinsi != null){
                $.ajax({
                    url: '/get/kota/'+ provinsi,
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        $.LoadingOverlay("show");
                    },
                    success: function(data) {
                        $('select[name="kota"]').empty();
                        $('#divKota').removeAttr('hidden');
                        $('#kota').prepend('<option disabled selected>Pilih Kota</option>');
                        $.each(data, function(index, kota) {
                            $('#kota').append('<option value="' + kota.name + '" data-kotaId="' + kota.id + '">' + kota.name + '</option>');
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error:', errorThrown);
                    },
                    complete: function(){
                        $.LoadingOverlay("hide");
                    },
                });
              }else{
                console.log('Error: Provinsi ID tidak dapat ditemukan');
              }
            });
  
            $('select[id="kota"]').on('change', function(){
              var kotaId = $("#kota option:selected").attr("data-kotaId");
  
                if(kotaId != null){
                $.ajax({
                    url: '/get/kecamatan/'+ kotaId,
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        $.LoadingOverlay("show");
                    },
                    success: function(data) {
                        $('select[name="kecamatan"]').empty();
                        $('#divKecamatan').removeAttr('hidden');
                        $('#kecamatan').prepend('<option disabled selected>Pilih Kecamatan</option>');
                        $.each(data, function(index, kecamatan) {
                            $('#kecamatan').append('<option value="' + kecamatan.name + '" data-kecamatanId="' + kecamatan.id + '">' + kecamatan.name + '</option>');
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error:', errorThrown);
                    },
                    complete: function(){
                        $.LoadingOverlay("hide");
                    },
                });
              }else{
                console.log('Error: kota ID tidak dapat ditemukan');
              }
            });
  
            $('select[id="kecamatan"]').on('change', function(){
              var kecamatanId = $("#kecamatan option:selected").attr("data-kecamatanId");
  
                if(kecamatanId != null){
                $.ajax({
                    url: '/get/kelurahan/'+ kecamatanId,
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        $.LoadingOverlay("show");
                    },
                    success: function(data) {
                        $('select[name="kelurahan"]').empty();
                        $('#divKelurahan').removeAttr('hidden');
                        $('#kelurahan').prepend('<option disabled selected>Pilih kelurahan</option>');
                        $.each(data, function(index, kelurahan) {
                            $('#kelurahan').append('<option value="' + kelurahan.name + '" data-kelurahanId="' + kelurahan.id + '">' + kelurahan.name + '</option>');
                        });
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error:', errorThrown);
                    },
                    complete: function(){
                        $.LoadingOverlay("hide");
                    },
                });
              }else{
                console.log('Error: kota ID tidak dapat ditemukan');
              }
            });
  
            $('select[id="kelurahan"]').on('change', function(){
              $('#divAddress').removeAttr('hidden');
            });
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
    <script>
          $(document).ready(function() {
            $('a[id="btn-updateStatus"]').on('click', function(){
                var userId = $('a[id="btn-updateStatus"]').data("id");
                var currentStatus = $('a[id="btn-updateStatus"]').data("status");

                $.ajax({
                    url: "{{ route('changeStatus') }}",
                    type: "POST",
                    data: {
                        user_id: userId,
                        current_status: currentStatus,
                        _token: "{{ csrf_token() }}"
                    },
                    beforeSend: function() {
                        $.LoadingOverlay("show");
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
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
                            text: response.message,
                            error,
                            confirmButtonText: 'OK'
                        });
                    },
                    complete: function() {
                        $.LoadingOverlay("hide");
                    },
                });
            });
        });
    </script>
@endsection