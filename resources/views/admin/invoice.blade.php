@if (auth()->user()->role == 'admin')
    @extends('layouts.admin.master')
@elseif (auth()->user()->role == 'peminjam')
    @extends('layouts.partials.home.main.main')
@endif
{{-- @dd(auth()->user()->role) --}}

@section('title', 'Dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div
                            class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                            <div class="mb-xl-0 mb-4">
                                <div class="d-flex svg-illustration mb-3 gap-2">
                                    <span class="app-brand-logo demo">
                                        <img alt=" Minim - Minimal &amp; Clean Furniture Store Shopify Theme" src="{{ asset('assets/home/cdn/shop/t/9/assets/logo.png?v=76281246793426370331552127529')}}" width="90px;" class="img-logo">
                                    </span>
                                </div>
                                <p class="mb-1">Office 149, 450 South Brand Brooklyn</p>
                                <p class="mb-1">San Diego County, CA 91905, USA</p>
                                <p class="mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
                            </div>
                            <div>
                                <h4>Invoice #{{ $reservedBooks->order_id }}</h4>
                                <div class="mb-2">
                                    <span class="me-1">Date Issues:</span>
                                    <span class="fw-medium">{{ $reservedBooks->tanggal_peminjaman }}</span>
                                </div>
                                <div>
                                    <span class="me-1">Date Due:</span>
                                    <span class="fw-medium">{{ $reservedBooks->tanggal_batas_pengembalian }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <div class="row p-sm-3 p-0">
                            <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                                <h6 class="pb-2">Invoice To:</h6>
                                <p class="mb-1">Libra</p>
                                <p class="mb-1">Libra Company</p>
                                <p class="mb-1">Small Heath, B10 0HF, UK</p>
                                <p class="mb-1">718-926-6062</p>
                                <p class="mb-0">contact@libra.com</p>
                            </div>
                            <div class="col-xl-6 col-md-12 col-sm-7 col-12">
                                <h6 class="pb-2">Bill To:</h6>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="pe-3">Total Due:</td>
                                            <td>{{ number_format($totalKeseluruhan,2) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-3">Bank name:</td>
                                            <td>Indo Bank</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-3">Country:</td>
                                            <td>ID</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table border-top m-0">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Status</th>
                                    <th>Qty</th>
                                    <th></th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservedBooks->DetailPeminjaman as $item)
                                    <tr>
                                        <td class="text-nowrap">{{ $item->buku->judul }}</td>
                                        <td class="text-nowrap">{{ $item->status_peminjaman }}</td>
                                        <td>1</td>
                                        <td></td>
                                        @if ($item->status_peminjaman == 'lost')
                                            <td>{{ number_format($hargaHilang, 2) }}</td>
                                        @else
                                            <td>5.000</td>
                                        @endif
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3" class="align-top px-4 py-5">
                                        <span>Thanks for your business</span>
                                    </td>
                                    <td class="text-end px-4 py-5">
                                        <p class="mb-2">Total Hari:</p>
                                        <p class="mb-2">Total Buku Dipinjam:</p>
                                        <p class="mb-2">Denda Perhari:</p>
                                        <p class="mb-2">Harga Hilang:</p>
                                        <p class="mb-0">Total:</p>
                                    </td>
                                    <td class="px-4 py-5">
                                        <p class="fw-medium mb-2">{{ $totalhari }}</p>
                                        <p class="fw-medium mb-2">{{ $totalbuku }}</p>
                                        <p class="fw-medium mb-2">{{ number_format($totalDendaBukuPerhari, 2) }}</p>
                                        <p class="fw-medium mb-2">{{ number_format($hargaHilang, 2) }}</p>
                                        @if ($totalKeseluruhan)
                                        <p class="fw-medium mb-0">{{ number_format($totalKeseluruhan, 2) }}</p>
                                        <input type="hidden" name="harga_total" value="{{ $totalKeseluruhan }}">
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Invoice -->

            <!-- Invoice Actions -->
            <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary d-grid w-100" id="pay-button">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                                    class="bx bx-dollar bx-xs me-1"></i>Add Payment</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>

    </div>

    {{-- <div id="snap-container"></div> --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var userRole = "{{ auth()->user()->role }}";
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    // alert("payment success!"); 
                    if (userRole === 'admin') {
                        window.location.href =
                            '/dashboard/transactionBooks/changePageScan/{{ $reservedBooks->id }}';
                    } else if (userRole === 'peminjam') {
                        window.location.href =
                                '/home/detail/peminjaman/{{ $reservedBooks->id }}';
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        method: "GET",
                        url: "/dashboard/transactionBooks/sendEmail/{{ $reservedBooks->id }}",
                        data: "",
                        dataType: "",
                        success: function(response) {
                            console.log("done send email")
                        }
                    });

                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>

@endsection
