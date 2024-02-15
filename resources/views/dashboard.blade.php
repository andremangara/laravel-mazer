<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
                <p class="text-subtitle text-muted">This is the main page.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Aktivitas Toko</h4>
            </div>
            <div class="card-body">
                <main>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Keseluruhan Omset
                                    </div>
                                    <div
                                        class="card-footer bg-primary d-flex align-items-center justify-content-between">
                                        <div class="small text-white">
                                            @money($omset)
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Customer
                                    </div>
                                    <div
                                        class="card-footer bg-warning d-flex align-items-center justify-content-between">
                                        <div class="small text-white">
                                            {{$user}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Kategori Produk
                                    </div>
                                    <div
                                        class="card-footer bg-success d-flex align-items-center justify-content-between">
                                        <div class="small text-white">
                                            {{$kategoricount}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Produk
                                    </div>
                                    <div
                                        class="card-footer bg-danger d-flex align-items-center justify-content-between">
                                        <div class="small text-white">
                                            {{$productcount}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Orderan Baru
                                    </div>
                                    <div
                                        class="card-footer bg-primary d-flex align-items-center justify-content-between">
                                        <div class="small text-white">
                                            {{$ordernew}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Order sedang diproses
                                    </div>
                                    <div
                                        class="card-footer bg-warning d-flex align-items-center justify-content-between">
                                        <div class="small text-white">
                                            {{$orderonprog}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Orderan Dikirim
                                    </div>
                                    <div
                                        class="card-footer bg-success d-flex align-items-center justify-content-between">
                                        <div class="small text-white">
                                            {{$orderdelivered}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Orderan Selesai
                                    </div>
                                    <div
                                        class="card-footer bg-danger d-flex align-items-center justify-content-between">
                                        <div class="small text-white">
                                            {{$orderdone}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </section>
</x-app-layout>