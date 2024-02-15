<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kategori</h3>
                <p class="text-subtitle text-muted">This is the Kategori page.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">Kategori</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('kategori.update', $kategoris->id_kategori) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                            placeholder="kategori" value="{{$kategoris->nama_kategori}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Parent</label>
                        <select class="form-select" aria-label="Default select example" name="id_parent">
                            <option value="">None</option>
                            @foreach ($dropdowns as $dropdown)
                            <option value="{{ $dropdown->id_kategori }}" {{ $kategoris->id_parent
                                == $dropdown->id_kategori ? 'selected' : '' }}>{{
                                $dropdown->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary mt-3" value="Submit">
                </form>
            </div>
        </div>
    </section>
</x-app-layout>