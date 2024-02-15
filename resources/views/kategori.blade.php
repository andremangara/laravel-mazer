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
                        <li class="breadcrumb-item active" aria-current="page">Kategori</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>


    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Kategori</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('kategori.tambah') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                            placeholder="kategori">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Parent</label>
                        <select class="form-select" aria-label="Default select example" name="id_parent">
                            <option value="" selected>None</option>
                            @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id_kategori }}">{{$kategori->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary mt-3" value="Submit">
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List Kategori</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Parent</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategoris as $kategori)
                        <tr>
                            <td>{{ $kategori->id_kategori }}</td>
                            <td>{{ $kategori->nama_kategori }}</td>
                            <td>{{ $kategori->parent->nama_kategori ?? '-' }}</td>
                            <td>
                                @dateformat($kategori->created_at)
                            </td>
                            <td>
                                <a href="{{route('kategori.edit', $kategori->id_kategori)}}"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{route('kategori.delete', $kategori->id_kategori)}}" method="POST">
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