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
                        <li class="breadcrumb-item" aria-current="page">Produk</li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                            placeholder="kategori">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" aria-label="Default select example" name="status">
                            <option value="Draft" selected>Draft</option>
                            <option value="Published">Published</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_kategori" class="form-label">Kategori</label>
                        <select class="form-select" aria-label="Default select example" name="id_kategori">
                            <option value="" selected>None</option>
                            @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id_kategori }}">{{$kategori->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="harga">
                    </div>
                    <div class="mb-3">
                        <label for="berat" class="form-label">Berat</label>
                        <input type="number" class="form-control" id="berat" name="berat" placeholder="berat">
                    </div>
                    <input type="submit" class="btn btn-primary mt-3" value="Submit">
                </form>
            </div>
        </div>
    </section>
</x-app-layout>