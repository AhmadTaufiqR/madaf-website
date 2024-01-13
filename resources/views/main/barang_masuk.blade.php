<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaksi/</span> Barang Masuk</h4>
        <!-- Contextual Classes -->
        <div class="card">
            <h5 class="card-header">Barang Masuk</h5>
            <div class=" text-nowrap" style="overflow-x: auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Dari</th>
                            <th>Total</th>
                            <th>Harga</th>
                            <th>Tanggal</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp

                        @foreach ($product_ins as $Product_in)
                            @if ($no++ % 2 == 0)
                                <tr class="table-active">
                                    @if ($Product_in->products == null)
                                        <td><i class="fab fa-react fa-lg text-info me-3"></i>
                                            <strong>{{ $Product_in->product_new }}</strong></td>
                                        <td>{{ $Product_in->from }}</td>
                                        <td>{{ $Product_in->total }}</td>
                                        <td>{{ $Product_in->price }}</td>
                                    @else
                                        <td><i class="fab fa-react fa-lg text-info me-3"></i>
                                            <strong>{{ $Product_in->product->name }}</strong></td>
                                        <td>{{ $Product_in->product->from }}</td>
                                        <td>{{ $Product_in->total }}</td>
                                        <td>{{ $Product_in->product->price }}</td>
                                    @endif
                                    <td><span class="badge bg-label-success me-1">{{ $Product_in->date }}</span></td>
                                </tr>
                                <!-- Large Modal Add -->
                                <div class="modal fade" id="editModal-{{ $Product_in->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">Edit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('product-in/update-product/' . $Product_in->id) }}"
                                                    class="demo-vertical-spacing demo-only-element" method="POST"
                                                    autocomplete="off">
                                                    @csrf
                                                    <div class="mt-2">
                                                        <label class="form-label" for="name">Nama Product</label>
                                                        <div class="input-group">
                                                            <input type="text" id="name_add" class="form-control"
                                                                value="{{ $Product_in->name }}" name="name_add"
                                                                placeholder="Isi disini jika product tidak ada dalam daftar"
                                                                aria-label="Name" aria-describedby="basic-addon11" />
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label class="form-label" for="From">Dari</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                value="{{ $Product_in->from }}" name="from_add"
                                                                placeholder="From" aria-label="From"
                                                                aria-describedby="basic-addon11" required />
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label class="form-label" for="Total">Jumlah Product</label>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control"
                                                                value="{{ $Product_in->total }}" name="total_add"
                                                                placeholder="total" aria-label="total"
                                                                aria-describedby="basic-addon11" required />
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label class="form-label" for="price">Harga</label>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control"
                                                                value="{{ $Product_in->price }}" name="price_add"
                                                                placeholder="price" aria-label="price"
                                                                aria-describedby="basic-addon11" required />
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="submit" name="submit" id="btn_save_add"
                                                            class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <tr class="table-default">
                                    @if ($Product_in->products == null)
                                        <td><i class="fab fa-react fa-lg text-info me-3"></i>
                                            <strong>{{ $Product_in->product_new }}</strong></td>
                                        <td>{{ $Product_in->from }}</td>
                                        <td>{{ $Product_in->total }}</td>
                                        <td>{{ $Product_in->price }}</td>
                                    @else
                                        <td><i class="fab fa-react fa-lg text-info me-3"></i>
                                            <strong>{{ $Product_in->product->name }}</strong></td>
                                        <td>{{ $Product_in->product->from }}</td>
                                        <td>{{ $Product_in->total }}</td>
                                        <td>{{ $Product_in->product->price }}</td>
                                    @endif
                                    <td><span class="badge bg-label-primary me-1">{{ $Product_in->date }}</span></td>
                                </tr>
                                <!-- Large Modal Add -->
                                <div class="modal fade" id="editModal-{{ $Product_in->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">Edit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('product-in/update-product' . $Product_in->id) }}"
                                                    class="demo-vertical-spacing demo-only-element" method="POST"
                                                    autocomplete="off">
                                                    @csrf
                                                    <div class="mt-2">
                                                        <label class="form-label" for="name">Nama Product</label>
                                                        <div class="input-group">
                                                            <input type="text" id="name_add" class="form-control"
                                                                value="{{ $Product_in->name }}" name="name_add"
                                                                placeholder="Isi disini jika product tidak ada dalam daftar"
                                                                aria-label="Name" aria-describedby="basic-addon11" />
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label class="form-label" for="From">Dari</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                value="{{ $Product_in->from }}" name="from_add"
                                                                placeholder="From" aria-label="From"
                                                                aria-describedby="basic-addon11" required />
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label class="form-label" for="Total">Jumlah
                                                            Product</label>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control"
                                                                value="{{ $Product_in->total }}" name="total_add"
                                                                placeholder="total" aria-label="total"
                                                                aria-describedby="basic-addon11" required />
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label class="form-label" for="price">Harga</label>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control"
                                                                value="{{ $Product_in->price }}" name="price_add"
                                                                placeholder="price" aria-label="price"
                                                                aria-describedby="basic-addon11" required />
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="submit" name="submit" id="btn_save_add"
                                                            class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </tbody>

                </table>

            </div>

        </div>
        {{ $product_ins->links('vendor.pagination.custom') }}
    </div>
</div>
