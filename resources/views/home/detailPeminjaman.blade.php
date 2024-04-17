@extends('layouts.partials.home.main.main')
@section('content')
    <style>
        .ratingDua {
            width: auto;
            unicode-bidi: bidi-override;
            direction: rtl;
            float: left;
            text-align: center;
            position: relative;
        }

        .ratingDua>label {
            float: right;
            display: inline;
            padding: 0;
            margin: 0;
            position: relative;
            width: 1.1em;
            cursor: pointer;
            color: #000;
        }

        .ratingDua #star5Dua:checked~label,
        .ratingDua #star4Dua:checked~label,
        .ratingDua #star3Dua:checked~label,
        .ratingDua #star2Dua:checked~label,
        .ratingDua #star1Dua:checked~label,
        .ratingDua>label:hover,
        .ratingDua>label:hover~label,
        .ratingDua>input.radio-btn:checked~label {
            color: transparent;
        }

        .ratingDua>label:hover:before,
        .ratingDua>label:hover~label:before,
        .ratingDua>input.radio-btn:checked~label:before {
            content: "\2605";
            position: absolute;
            left: 0;
            color: #FFD700;
        }

    </style>
    <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
        <div class="px-4">
            <p class="text-xl font-medium">Order Summary</p>
            <p class="text-gray-400">Check your items.</p>
            <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6 ">
                <form method="post" action="{{ url('/home/storeUlasanMultiple') }}" class="reviewformpeminjaman">
                    @csrf
                    @foreach ($reservedBooks->DetailPeminjaman as $index => $item)
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
                                    @else
                                        <span class="text-green-600">{{ ucwords($item->status_peminjaman) }}</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                        @if ($item->status_peminjaman == 'returned')
                            <div id="formReview{{ $index }}" class="spr-form" style="">
                                <input type="hidden" name="detailpeminjamanid[]" value="{{ $item->id }}">
                                <input type="hidden" name="bookid[]" value="{{ $item->buku->id }}">
                                <h3 class="spr-form-title mb-6">Write a review</h3>
                                <fieldset class="spr-form-review mb-6">
                                    <div>
                                        <label class="spr-form-label" for="review[rating]">Rating</label>
                                    </div>
                                    <div class="ratingDua mb-2">
                                        <input id="star5{{ $index }}_{{ $loop->iteration }}" name="star[{{ $index }}]" type="radio" value="5" class="radio-btn hide" />
                                        <label for="star5{{ $index }}_{{ $loop->iteration }}">☆</label>
                                        <input id="star4{{ $index }}_{{ $loop->iteration }}" name="star[{{ $index }}]" type="radio" value="4" class="radio-btn hide" />
                                        <label for="star4{{ $index }}_{{ $loop->iteration }}">☆</label>
                                        <input id="star3{{ $index }}_{{ $loop->iteration }}" name="star[{{ $index }}]" type="radio" value="3" class="radio-btn hide" />
                                        <label for="star3{{ $index }}_{{ $loop->iteration }}">☆</label>
                                        <input id="star2{{ $index }}_{{ $loop->iteration }}" name="star[{{ $index }}]" type="radio" value="2" class="radio-btn hide" />
                                        <label for="star2{{ $index }}_{{ $loop->iteration }}">☆</label>
                                        <input id="star1{{ $index }}_{{ $loop->iteration }}" name="star[{{ $index }}]" type="radio" value="1" class="radio-btn hide" />
                                        <label for="star1{{ $index }}_{{ $loop->iteration }}">☆</label>

                                        <div class="clear"></div>
                                    </div>
                                </fieldset>
                                <fieldset class="spr-form-contact">
                                    <div class="spr-form-review-body">
                                        <label class="spr-form-label" for="review_body_2426722123881">
                                            Body of Review
                                            <span role="status" aria-live="polite" aria-atomic="true">
                                                <span class="spr-form-review-body-charactersremaining">(1500)</span>
                                                <span class="visuallyhidden">characters
                                                    remaining</span>
                                            </span>
                                        </label>
                                        <div class="spr-form-input">
                                            <textarea class="spr-form-input " name="ulasan[]" rows="1"
                                                style="resize: none !important;
                                            height: 100px;
                                            border: 1px solid #ddd;
                                            width: 100%;
                                            border-radius: 0 !important;
                                            padding-top: 30px;
                                            padding-left: 30px;"
                                                placeholder="Write your comments here" required></textarea>
                                            <script>
                                                function sprUpdateCount(e) {
                                                    var $el = SPR.$(e.currentTarget);
                                                    SPR.$(".spr-form-review-body-charactersremaining").html('(' + (1500 - $el.val().length) + ')');
                                                }
                                                SPR.$("textarea[data-product-id=2426722123881]").keyup(sprUpdateCount).trigger("keyup");
                                            </script>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        @endif
                    @endforeach
                    @foreach ($reservedBooks->DetailPeminjaman as $item)
                            @if ($item->status_peminjaman == 'returned')
                                <button type="submit" class="mt-2 mb-8 w-full rounded-md bg-black px-6 py-3 font-medium text-white">Review</button>
                            @endif
                        @break
                    @endforeach
                </form>
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
                <button data-peminjamanid="{{ $reservedBooks->id }}"
                    class="btncancelpeminjaman mt-2 mb-8 w-full rounded-md bg-black px-6 py-3 font-medium text-white">Cancel</button>
            @endif
        @break
    @endforeach
</div>
</div>

<script>
    jQuery(document).ready(function($) {
        $('.btncancelpeminjaman').on('click', function(e) {
            e.preventDefault();
            var peminjamanId = $(this).attr('data-peminjamanid');
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            $.ajax({
                url: "{{ url('/home/cancelPeminjaman') }}" + "/" + peminjamanId,
                method: 'POST',
                data: {
                    _token: token,
                },
                beforeSend: function() {
                    $.LoadingOverlay("show");
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Buku berhasil dicancel.',
                        confirmButtonText: 'OK',
                    }).then(() => {
                        window.location.href = "{{ route('home') }}";
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat memuat data.',
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
