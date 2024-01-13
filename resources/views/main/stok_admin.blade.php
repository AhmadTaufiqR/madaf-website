
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">List Barang/</span> Barang</h4>
        <!-- Contextual Classes -->
        <div class="card">
            <h5 class="card-header">Barang</h5>
            <div class=" text-nowrap" style="overflow-x: auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Dari</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 0;
                        @endphp
                        
                        @foreach($products as $product)
                        @if ($no++%2 == 0)
                        <tr class="table-active">
                            <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>{{ $product->name }}</strong></td>
                            <td>{{ $product->from }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                {{-- <div class="dropdown"> --}}
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <form action="{{ url('products/delete-product', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                        </form>
                                    </div>
                                {{-- </div> --}}
                            </td>
                        </tr>
                        
                        @else
                        
                        <tr class="table-default">
                            <td><i class="fab fa-sketch fa-lg text-warning me-3"></i> <strong>{{ $product->name }}</strong></td>
                            <td>{{ $product->from }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                {{-- <div class="dropdown"> --}}
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <form action="{{ url('products/delete-product', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                        </form>
                                    </div>
                                {{-- </div> --}}
                            </td>
                        </tr>
                        
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $products->links('vendor.pagination.custom') }}
    </div>
</div>

