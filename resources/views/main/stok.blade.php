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
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp

                        @foreach ($products as $product)
                            @if ($no++ % 2 == 0)
                                <tr class="table-active">
                                    <td><i class="fab fa-react fa-lg text-info me-3"></i>
                                        <strong>{{ $product->name }}</strong></td>
                                    <td>{{ $product->from }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->price }}</td>
                                </tr>
                            @else
                                <tr class="table-default">
                                    <td><i class="fab fa-sketch fa-lg text-warning me-3"></i>
                                        <strong>{{ $product->name }}</strong></td>
                                    <td>{{ $product->from }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->price }}</td>
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
