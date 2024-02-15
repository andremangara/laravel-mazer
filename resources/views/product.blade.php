<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Produk</h3>
                <p class="text-subtitle text-muted">This is the Produk page.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Produk</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List Produk</h4>
            </div>
            <div class="card-body">
                <a href="{{route('product.tambah')}}" class="btn btn-primary">Tambah Produk</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 0;
                        @endphp
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>
                                {{ $product->nama_produk }} <br>
                                Kategori: <span class="badge bg-info">{{ $product->parent->nama_kategori ?? '-'
                                    }}</span> <br>
                                Berat: <span class="badge bg-info">{{$product->berat}}gr</span>
                            </td>
                            <td>
                                @money($product->harga)
                            </td>
                            <td>
                                @dateformat($product->created_at)
                            </td>
                            <td><span class="badge bg-secondary">{{ $product->status }}</span></td>
                            <td>
                                <a href="{{route('product.edit', $product->id_produk)}}"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{route('product.delete', $product->id_produk)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-app-layout>