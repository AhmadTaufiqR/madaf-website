<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">List Daftar/</span> Toko</h4>
        <!-- Contextual Classes -->
        <div class="card">
            <h5 class="card-header">Daftar Toko</h5>
            <div class=" text-nowrap" style="overflow-x: auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Toko</th>
                            <th>Pemilik</th>
                            <th>Alamat</th>
                            <th>Kecamatan</th>
                            <th>Kabupaten</th>
                            <th>Tanggal Gabung</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp

                        @foreach ($stores as $store)
                            @if ($no++ % 2 == 0)
                                <tr class="table-active">
                                    <td><i class="fab fa-react fa-lg text-info me-3"></i>
                                        <strong>{{ $store->name }}</strong></td>
                                    <td>{{ $store->owner }}</td>
                                    <td>{{ $store->address }}</td>
                                    <td>{{ $store->kecamatan }}</td>
                                    <td>{{ $store->kabupaten }}</td>
                                    <td>{{ $store->date }}</td>
                                </tr>
                            @else
                                <tr class="table-default">
                                    <td><i class="fab fa-sketch fa-lg text-warning me-3"></i>
                                        <strong>{{ $store->name }}</strong></td>
                                    <td>{{ $store->owner }}</td>
                                    <td>{{ $store->address }}</td>
                                    <td>{{ $store->kecamatan }}</td>
                                    <td>{{ $store->kabupaten }}</td>
                                    <td>{{ $store->date }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>

                </table>

            </div>

        </div>


        {{ $stores->links('vendor.pagination.custom') }}
    </div>
</div>
