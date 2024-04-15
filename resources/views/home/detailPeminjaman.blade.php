@extends('layouts.partials.home.main.main')
@section('content')
        <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
            <div class="px-4">
                <p class="text-xl font-medium">Order Summary</p>
                <p class="text-gray-400">Check your items.</p>
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
                                    @endif
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
                <p class="text-4xl font-medium">Booking Details</p>
                {{-- <p class="text-gray-400">Complete your order by providing your payment details.</p> --}}
                <div class="">
                    <div class="relative mt-4">
                        <div class="flex justify-center mt-6 mb-2">
                            <div>
                                {!! $reservedBooks->qr_code !!}
                            </div>
                        </div>
                        <div class="-mx-3 flex flex-wrap mt-4">
                            <div class="w-full px-3 sm:w-1/2">
                                <div class="mb-5">
                                    <label for="date" class="text-xl mb-3 block text-base font-medium text-[#07074D]">
                                        Tanggal Peminjaman
                                    </label>
                                    <input type="date" value="{{ $reservedBooks->tanggal_peminjaman }}"
                                        name="tanggal_peminjaman" id="date"
                                        class="w-full border border-solid border-y-gray-600 rounded-lg bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        disabled />
                                </div>
                            </div>
                            <div class="w-full px-3 sm:w-1/2">
                                <div class="mb-5">
                                    <label for="time" class="text-xl mb-3 block text-base font-medium text-[#07074D]">
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
                    <label for="card-holder" class="text-xl mt-4 mb-2 block text-sm font-medium">Tanggal Batas
                        Pengembalian</label>
                    <div class="relative">
                        <div class="-mx-3 flex flex-wrap">
                            <div class="w-full px-3 sm:w-1/2">
                                <div class="mb-5">
                                    <input type="date" value="{{ $reservedBooks->tanggal_batas_pengembalian }}"
                                        name="tanggal_peminjaman" id="date"
                                        class="w-full border border-solid border-y-gray-600 rounded-lg bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        disabled />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Total -->
                    <div class="mt-4 border-t border-b py-2">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Total Hari</p>
                            <p class="font-semibold text-gray-900">2</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-gray-900">Denda</p>
                            <p class="font-semibold text-gray-900">10.000 Rp</p>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-900">Total</p>
                        <p class="text-2xl font-semibold text-gray-900">$408.00</p>
                    </div>
                </div>
                @foreach ($reservedBooks->DetailPeminjaman as $item)
                    @if ($item->status_peminjaman == 'reserved')
                        <button class="mt-2 mb-8 w-full rounded-md bg-black px-6 py-3 font-medium text-white">Cancel</button>
                    @endif
                @endforeach
            
            </div>
        </div>
    @endsection
