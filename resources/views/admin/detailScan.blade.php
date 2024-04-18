@extends('layouts.admin.master')
@section('title', 'Dashboard')
@section('content')
    <div class="grid lg:grid-cols-2 pt-4  card">
        <div class="px-4">
            <p class="text-xl font-medium">Order Summary</p>
            <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6 ">
                @foreach ($reservedBooks->DetailPeminjaman as $item)
                    <div class="flex flex-col rounded-lg bg-white sm:flex-row items-center">
                        <img class="m-2 h-24 w-28 rounded-md border object-cover object-center"
                            src="{{ asset('storage/') . '/' . $item->buku->front_book_cover }}" alt="" />
                        <div class="flex w-full flex-col px-4 py-4">
                            <span class="font-semibold">{{ $item->buku->judul }}</span>
                            <p class="float-right text-gray-400">{{ $item->buku->penulis }}</p>
                            <span class="float-right">
                                @if ($item->status_peminjaman == 'reserved')
                                    <span class="text-emerald-900">{{ ucwords($item->status_peminjaman) }}</span>
                                @elseif($item->status_peminjaman == 'borrowed')
                                    <span class="text-sky-600">{{ ucwords($item->status_peminjaman) }}</span>
                                @elseif($item->status_peminjaman == 'overdue')
                                    <span class="text-rose-950">{{ ucwords($item->status_peminjaman) }}</span>
                                @elseif($item->status_peminjaman == 'cancelled')
                                    <span class="text-rose-950">{{ ucwords($item->status_peminjaman) }}</span>
                                @elseif($item->status_peminjaman == 'returned')
                                    <span class="text-green-600">{{ ucwords($item->status_peminjaman) }}</span>
                                @else
                                    <span class="text-rose-950">{{ ucwords($item->status_peminjaman) }}</span>
                                @endif
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
            <p class="text-2xl font-medium">Booking Details</p>
            {{-- <p class="text-gray-400">Complete your order by providing your payment details.</p> --}}
            <div class="">
                <div class="relative mt-4">
                    <div class="flex justify-center mt-6 mb-2">
                        <div>
                            {!! $reservedBooks->qr_code !!}
                        </div>
                    </div>
                    <div class="w-full px-3">
                        <label for="card-holder" class="text-base mt-4 mb-2 block text-sm font-medium">Nama Peminjam</label>
                        <input type="text" value="{{ $reservedBooks->user->anggota->nama_lengkap }}"
                            name="tanggal_peminjaman" id="date"
                            class="w-full border border-solid border-y-gray-600 rounded-lg bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            disabled />
                    </div>
                    <div class="w-full px-3">
                        <label for="card-holder" class="text-base mt-4 mb-2 block text-sm font-medium">Nomor Telephone</label>
                        <input type="number" value="{{ $reservedBooks->user->anggota->no_telephone }}"
                            name="tanggal_peminjaman" id="date"
                            class="w-full border border-solid border-y-gray-600 rounded-lg bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            disabled />
                    </div>
                    <div class=" flex flex-wrap mt-4">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-1">
                                <label for="date" class="mb-3 block text-base font-medium">
                                    Tanggal Peminjaman
                                </label>
                                <input type="date" value="{{ $reservedBooks->tanggal_peminjaman }}"
                                    name="tanggal_peminjaman" id="date"
                                    class="w-full border border-solid border-y-gray-600 rounded-lg bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                    disabled />
                            </div>
                        </div>
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="">
                                <label for="time" class="mb-3 block text-base font-medium">
                                    Tanggal Pengembalian
                                </label>
                                <input type="date" value="{{ $reservedBooks->tanggal_pengembalian }}"
                                    name="tanggal_pengembalian" id="date"
                                    class="w-full border border-solid border-y-gray-600 rounded-lg bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                    disabled />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="flex flex-wrap">
                        <div class="w-full px-3 sm:w-1/2">
                            <div class="mb-5">
                                <label for="card-holder" class="text-base mt-4 mb-2 block text-sm font-medium">Tanggal Batas
                                    Pengembalian</label>
                                <input type="date" value="{{ $reservedBooks->tanggal_batas_pengembalian }}"
                                    name="tanggal_peminjaman" id="date"
                                    class="w-full border border-solid border-y-gray-600 rounded-lg bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                    disabled />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total -->
                @if ($item->status_peminjaman == 'overdue' || $item->status_peminjaman == 'lost')
                @php
                    $hasDenda = true
                @endphp
                <div class="border-t border-b ">
                    <label for="card-holder" class="text-base mt-4 mb-2 block text-sm font-medium">
                        @foreach ($reservedBooks->DetailPeminjaman as $index => $item) 
                            {{ $item->buku->judul }} 
                            @if ($index < count($reservedBooks->DetailPeminjaman) - 1)
                                & 
                            @endif
                            @endforeach
                    </label>
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Total Hari</p>
                        <p class="font-semibold text-gray-900">{{ $totalhari }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Total Buku Dipinjam</p>
                        <p class="font-semibold text-gray-900">{{ $totalbuku }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Per Buku</p>
                        <p class="font-semibold text-gray-900">5.000</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Denda Perhari</p>
                        <p class="font-semibold text-gray-900">{{ $totalDendaBukuPerhari }}</p>
                    </div>
                </div>
                @endif
                @if ($totalKeseluruhan)
                <div class="mt-6 flex items-center justify-between">
                    <p class="text-sm font-medium text-gray-900">Total</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ number_format($totalKeseluruhan, 2) }}</p>
                </div>
                @endif
            </div>
            <button class="mt-2 mb-8 w-full rounded-md bg-black px-6 py-3 font-medium text-white" data-bs-toggle="modal" data-bs-target="#modalCenter">Update Status</button>
        </div>
    </div>
    {{-- modal update status --}}
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="tambahBuku" method="POST" action="{{ route('updateStatus') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Update Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @foreach ($reservedBooks->DetailPeminjaman as $item)
                            <input type="hidden" name="peminjaman_id[]" value="{{ $item->peminjaman_id }}">
                            <div class="col mb-4">
                                <label for="nameWithTitle" class="form-label">{{ $item->buku->judul }}</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="buku_id[]" value="{{ $item->buku_id }}">
                                        <label class="form-check-label" for="inlineCheckbox1">{{ $item->buku->judul }}</label>
                                    </div>
                                    <div>
                                </div>
                                    <label for="nameWithTitle" class="form-label">Status</label>
                                    <select class="form-select" name="status_peminjaman[]" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>
                                        <option value="borrowed">Borrowed</option>
                                        <option value="returned">Returned</option>
                                        <option value="cancelled">cancelled</option>
                                    </select>
                                </div>
                            </div>
                        @endforeach
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
<script src="https://cdn.tailwindcss.com"></script>
@endsection
@php
    $showHeader = false; // Hide the sidebar
@endphp
