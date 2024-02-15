<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Order</h3>
                <p class="text-subtitle text-muted">This is the Order page.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page">Order</li>
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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Item
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Item</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('orderitem.store')}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="id_kategori" class="form-label">Product</label>
                                        <select class="form-select" aria-label="Default select example"
                                            name="id_produk">
                                            @foreach($products as $product)
                                            <option value="{{ $product->id_produk }}">{{$product->nama_produk}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="kuota" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" id="kuota" name="kuota"
                                            placeholder="kuantitas">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga Produk</th>
                            <th scope="col">Kuantitas</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderitems as $orderitem)
                        <tr>
                            <td>{{ $orderitem->nama_produk }}</td>
                            <td>
                                @money($orderitem->parent->harga)
                            </td>
                            <td>
                                {{ $orderitem->kuota }}
                            </td>
                            <td>
                                @money($orderitem->subtotal)
                            </td>
                            <td>
                                <form action="{{route('orderitem.delete', $orderitem->id_order_item)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="{{ route('order.store', 1) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="order_date" class="form-label">Tanggal Pesan</label>
                        <input type="date" class="form-control" id="order_date" name="order_date">
                    </div>
                    <div class="mb-3">
                        <label for="order_status" class="form-label">Order Status</label>
                        <select class="form-select" aria-label="Default select example" name="order_status">
                            <option value="Pending" selected>Pending</option>
                            <option value="On_Progress">On Progress</option>
                            <option value="Paid">Paid</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Done">Done</option>
                            <option value="Cancel">Cancel</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary mt-3" value="Submit">
                </form>
            </div>
        </div>
    </section>
</x-app-layout>