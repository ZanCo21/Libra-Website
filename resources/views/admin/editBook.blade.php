@extends('layouts.admin.master')
@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="grid lg:grid-cols-2 pt-4  card">
            <div class="px-4">
                <p class="text-xl font-medium">{{ $getBook->judul }}</p>
                <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6 ">
                    <div class="flex flex-col rounded-lg bg-white sm:flex-row items-center">
                        <img class="m-2 h-full w-28 rounded-md border object-cover object-center"
                            src="{{ asset('storage/') . '/' . $getBook->front_book_cover }}" alt="" />
                        <img class="m-2 h-full w-28 rounded-md border object-cover object-center"
                            src="{{ asset('storage/') . '/' . $getBook->back_book_cover }}" alt="" />
                    </div>
                </div>
            </div>
            <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
                <p class="text-2xl font-medium">Details Book</p>
                <form action="{{ route('getUpdateBook', ['id' => $getBook->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="">
                        <div class="relative mt-4">
                            <div class="flex justify-center mt-6 mb-2">
                            </div>
                            <div class="w-full px-3">
                                <label for="card-holder" class="text-base mt-4 mb-2 block text-sm font-medium">Judul</label>
                                <input type="text" value="{{ $getBook->judul }}"
                                    name="judul" id="text"
                                    class="w-full border border-solid border-y-gray-600 rounded-lg bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        />
                            </div>
                            <div class="w-full px-3">
                                <label for="card-holder" class="text-base mt-4 mb-2 block text-sm font-medium">Front Book Cover</label>
                                <div class="mb-3">
                                    <input class="form-control" type="file" name="front_book_cover" value="{{ $getBook->front_book_cover }}">
                                </div>
                            </div>
                            <div class="w-full px-3">
                                <label for="card-holder" class="text-base mt-4 mb-2 block text-sm font-medium">Back Book Cover</label>
                                <div class="mb-3">
                                    <input class="form-control" type="file" name="back_book_cover" value="{{ $getBook->back_book_cover }}">
                                </div>
                            </div>
                            <div class="w-full px-3">
                                <label for="card-holder" class="text-base mt-4 mb-2 block text-sm font-medium">Penulis</label>
                                <input type="text" value="{{ $getBook->penulis}}"
                                    name="penulis"
                                    class="w-full border border-solid border-y-gray-600 rounded-lg bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        />
                            </div>
                            <div class="w-full px-3">
                                <label for="card-holder" class="text-base mt-4 mb-2 block text-sm font-medium">Penerbit</label>
                                <input type="text" value="{{ $getBook->penerbit}}"
                                    name="penerbit"
                                    class="w-full border border-solid border-y-gray-600 rounded-lg bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                        />
                            </div>
                            <div class=" flex flex-wrap mt-4">
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="mb-1">
                                        <label for="date" class="mb-3 block text-base font-medium">
                                            Stock
                                        </label>
                                        <input type="number" value="{{ $getBook->stock }}"
                                            name="stock"
                                            class="w-full border border-solid border-y-gray-600 rounded-lg bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                />
                                    </div>
                                </div>
                                <div class="w-full px-3 sm:w-1/2">
                                    <div class="">
                                        <label for="time" class="mb-3 block text-base font-medium">
                                            Tahun Terbit
                                        </label>
                                        <input type="date" value="{{ $getBook->tahunTerbit }}"
                                            name="tahunTerbit"
                                            class="w-full border border-solid border-y-gray-600 rounded-lg bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                />
                                    </div>
                                </div>
                            </div>
                            <div class="w-full px-3">
                                <label for="select2Multiple" class="form-label">Kategori</label>
                                <select id="select2Multiple" class="select2 form-select" multiple name="kategori[]">
                                    @foreach ($kategoris as $item)
                                        <option value="{{ $item->id }}"
                                        @if ($getBook->kategorirelasi->contains('kategori_id', $item->id))
                                            selected
                                        @endif    
                                        >{{ $item->namaKategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full px-3 mt-4">
                                <label class="mb-3 block text-base font-medium">
                                    Deskripsi
                                </label>
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
                                                    {!! $getBook->deskripsi !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Snow Theme -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="mt-2 mb-8 w-full rounded-md bg-black px-6 py-3 font-medium text-white" data-bs-toggle="modal">Update Status</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    // Ambil nilai deskripsi dari PHP
    var deskripsi = {!! json_encode($getBook->deskripsi) !!};

    // Set nilai deskripsi ke dalam editor teks saat halaman dimuat
    var quill = new Quill('#snow-editor', {
        theme: 'snow'  // Tema snow untuk Quill.js
    });
    quill.root.innerHTML = deskripsi; // Set konten dari editor teks
</script>
<script>
    $(document).ready(function() {
        $('form').submit(function() {
            var editorText = $('#snow-editor .ql-editor').html();
            $('#deskripsi').val(editorText);
        });
    });

</script>
@endsection
@php
    $showHeader = false; // Hide the sidebar
@endphp
