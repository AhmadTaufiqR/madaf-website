<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaksi/</span> Barang Keluar</h4>
        <!-- Bootstrap Toasts with Placement -->
        <div class="card mb-4">
            <h5 class="card-header">Filter</h5>
            <div class="card-body">
                <div class="row gx-3 gy-2 align-items-center">
                    <div class="col-md-3">
                        <label class="form-label" for="selectTypeOpt">Wilayah</label>
                        <select id="selectTypeOpt" class="form-select color-dropdown">
                            <option value="default">Silahkan Pilih Wilayah</option>
                            @foreach ($grouped_outs as $Group_outs)
                                <option value="{{ $Group_outs->kabupaten }}">{{ $Group_outs->kabupaten }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="showToastPlacement">&nbsp;</label>
                        <button id="showToastPlacement" type="button" data-bs-toggle="modal"
                            data-bs-target="#largeModal" class="btn btn-primary d-block">Barang Keluar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Bootstrap Toasts with Placement -->
        <!-- Contextual Classes -->
        <div class="card">
            <h5 class="card-header">Barang Keluar</h5>
            <div class="text-nowrap" style="overflow-x: auto;">
                <table id="dataTable" class="table">
                    <thead>
                        <tr>
                            <th>Nama Toko</th>
                            <th>Tanggal Kirim</th>
                            <th>Wilayah</th>
                            <th>Total Harga</th>
                            <th>Metode</th>
                            <th>Bon</th>
                            <th>Tanggal Tempo</th>
                            <th>status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($product_outs as $Product_outs)
                            @if ($no++ % 2 == 0)
                                <tr class="table-active">
                                    <td><i class="fab fa-react fa-lg text-info me-3"></i>
                                        <strong>{{ $Product_outs->name_store }}</strong></td>
                                    <td>{{ $Product_outs->date }}</td>
                                    <td>{{ $Product_outs->kabupaten }}</td>
                                    @if ($Product_outs->price != '')
                                        <td>{{ $Product_outs->price }}</td>
                                    @else
                                        <td>0</td>
                                    @endif
                                    <td>{{ $Product_outs->method }}</td>
                                    @if ($Product_outs->amount != '' && $Product_outs->amount != 0)
                                        <td>{{ $Product_outs->amount }}</td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    @if ($Product_outs->date_tempo != '')
                                        <td>{{ $Product_outs->date_tempo }}</td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    @if ($Product_outs->status != 'Lunas')
                                        <td><span class="badge bg-label-danger me-1">{{ $Product_outs->status }}</span>
                                        </td>
                                    @else
                                        <td><span
                                                class="badge bg-label-success me-1">{{ $Product_outs->status }}</span>
                                        </td>
                                    @endif
                                    <td>
                                        {{-- <div class="dropdown"> --}}
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#editModal-{{ $Product_outs->id }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#editModalTambah-{{ $Product_outs->id }}"><i
                                                        class="bx bx-package me-1"></i>Tambah Produk</a>
                                                <a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#editModalDetail-{{ $Product_outs->id }}"><i
                                                        class="bx bx-list-ul me-1"></i>Detail Produk</a>
                                                <form action="{{ url('product-out/delete-out', $Product_outs->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item"><i
                                                            class="bx bx-trash me-1"></i> Delete</button>
                                                </form>
                                            </div>
                                        {{-- </div> --}}
                                    </td>
                                </tr>
                                @include('modals.modals_edit_product_in')
                                @include('modals.modals_add_product_in_product_out')
                                @include('modals.modals_show_product_in_product_out')
                            @else
                                <tr class="table-default">
                                    <td><i class="fab fa-react fa-lg text-info me-3"></i>
                                        <strong>{{ $Product_outs->name_store }}</strong></td>
                                    <td>{{ $Product_outs->date }}</td>
                                    <td>{{ $Product_outs->kabupaten }}</td>
                                    @if ($Product_outs->price != '')
                                        <td>{{ $Product_outs->price }}</td>
                                    @else
                                        <td>0</td>
                                    @endif
                                    <td>{{ $Product_outs->method }}</td>
                                    @if ($Product_outs->amount != '' && $Product_outs->amount != 0)
                                        <td>{{ $Product_outs->amount }}</td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    @if ($Product_outs->date_tempo != '')
                                        <td>{{ $Product_outs->date_tempo }}</td>
                                    @else
                                        <td>-</td>
                                    @endif
                                    @if ($Product_outs->status != 'Lunas')
                                        <td><span class="badge bg-label-danger me-1">{{ $Product_outs->status }}</span>
                                        </td>
                                    @else
                                        <td><span
                                                class="badge bg-label-success me-1">{{ $Product_outs->status }}</span>
                                        </td>
                                    @endif
                                    <td>
                                        {{-- <div class="dropdown"> --}}
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#editModal-{{ $Product_outs->id }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#editModalTambah-{{ $Product_outs->id }}"><i
                                                        class="bx bx-package me-1"></i>Tambah Produk</a>
                                                <a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#editModalDetail-{{ $Product_outs->id }}"><i
                                                        class="bx bx-list-ul me-1"></i>Detail Produk</a>
                                                <form action="{{ url('product-out/delete-out', $Product_outs->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item"><i
                                                            class="bx bx-trash me-1"></i> Delete</button>
                                                </form>
                                            </div>
                                        {{-- </div> --}}
                                    </td>
                                </tr>
                                @include('modals.modals_edit_product_in')
                                @include('modals.modals_add_product_in_product_out')
                                @include('modals.modals_show_product_in_product_out')
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Large Modal Add -->
        <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Barang Keluar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="product-out/add-out" class="demo-vertical-spacing demo-only-element"
                            method="POST" autocomplete="off">
                            @csrf
                            <div class="mt-2">
                                <label class="form-label" for="name">Toko</label>
                                <select id="selecid" class="form-select" name="name_selected" required>
                                    <option value="default">Silahkan dipilih</option>
                                    @foreach ($grouped_stores as $grouped_stores)
                                        <option value="{{ $grouped_stores->id }}">{{ $grouped_stores->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-2">
                                <label class="form-label" for="name">Tanggal kirim</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="date_add"
                                        placeholder="Tanggal kirim" aria-label="Tanggal kirim"
                                        aria-describedby="basic-addon11" required />
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label" for="price">Methode</label>
                                <div class="input-group">
                                    <select id="selectmethod" class="form-select" required name="method_selected_add"
                                        onchange="checkSelect1()" required>
                                        <option value="default">Silahkan dipilih</option>
                                        <option value="cash">Cash</option>
                                        <option value="bon">Bon</option>
                                        <option value="tempo">Tempo</option>
                                    </select>
                                </div>
                            </div>
                            <div hidden id="bonselect1" class="mt-2">
                                <label class="form-label" for="price">Bon</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="bon_add" placeholder="Bon"
                                        aria-label="Bon" aria-describedby="basic-addon11" />
                                </div>
                            </div>
                            <div hidden id="temposelect1" class="mt-2">
                                <label class="form-label" for="price">Tanggal Tempo</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="date_tempo_add"
                                        placeholder="Tanggal Tempo" aria-label="Tanggal Tempo"
                                        aria-describedby="basic-addon11" />
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label" for="price">Status</label>
                                <div class="input-group">
                                    <select id="selectstatus" class="form-select" name="status_selected" required>
                                        <option value="default">Silahkan dipilih</option>
                                        <option value="Belum lunas">Belum lunas</option>
                                        <option value="Lunas">Lunas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
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
        {{ $product_outs->links('vendor.pagination.custom') }}
    </div>
</div>



<script>
    function checkSelect(productOutsId) {
        // var select = document.querySelector('select[name=method_selected]');
        // var bon = document.getElementById('bonselect');
        // var tempo = document.getElementById('temposelect');

        var select = document.getElementById('selectmethodedit-' + productOutsId);
        var bon = document.getElementById('bonselectedit-' + productOutsId);
        var tempo = document.getElementById('temposelectedit-' + productOutsId);
        // console.log(select.value);
        if (select.value === 'bon') {
            bon.hidden = false;
            tempo.hidden = true;
        } else if (select.value === 'tempo') {
            tempo.hidden = false;
            bon.hidden = true;
        } else {
            bon.hidden = true;
            tempo.hidden = true;
        }
    }

    function checkSelect1() {
        var select = document.querySelector('select[name=method_selected_add]');
        var bon = document.getElementById('bonselect1');
        var tempo = document.getElementById('temposelect1');
        // console.log(select.value);
        if (select.value === 'bon') {
            bon.hidden = false;
            tempo.hidden = true;
        } else if (select.value === 'tempo') {
            tempo.hidden = false;
            bon.hidden = true;
        } else {
            bon.hidden = true;
            tempo.hidden = true;
        }
    }

    document.getElementById('selectTypeOpt').addEventListener('change', function() {
        var selectedValue = this.value;
        var rows = document.querySelectorAll('#dataTable tbody tr');

        rows.forEach(function(row) {
            if (selectedValue === 'default' || selectedValue === 'semua') {
                row.style.display = ''; // Tampilkan semua baris
            } else {
                var kabupatenCell = row.querySelector('td:nth-child(3)');
                var kabupatenText = kabupatenCell.textContent;

                if (kabupatenText === selectedValue) {
                    row.style.display = ''; // Tampilkan baris yang cocok
                } else {
                    row.style.display = 'none'; // Sembunyikan baris yang tidak cocok
                }
            }
        });
    });
</script>
