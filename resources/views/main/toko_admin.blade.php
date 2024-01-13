<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">List Daftar/</span> Toko</h4>
        <!-- Bootstrap Toasts with Placement -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row gx-3 gy-2 align-items-center">
                    <div class="col-md-3">
                        <button id="showToastPlacement" type="button" data-bs-toggle="modal" data-bs-target="#largeModal"
                            class="btn btn-primary">Tambah Toko</button>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Bootstrap Toasts with Placement -->
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
                            <th>Aksi</th>
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
                                        <strong>{{ $store->name }}</strong>
                                    </td>
                                    <td>{{ $store->owner }}</td>
                                    <td>{{ $store->address }}</td>
                                    <td>{{ $store->kecamatan }}</td>
                                    <td>{{ $store->kabupaten }}</td>
                                    <td>{{ $store->date }}</td>
                                    <td>
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#editModal-{{ $store->id }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="{{ url('stores/delete-stores/' . $store->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"><i
                                                        class="bx bx-trash me-1"></i> Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editModal-{{ $store->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">Edit Toko</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('stores/update-stores/' . $store->id) }}"
                                                    class="demo-vertical-spacing demo-only-element" method="POST"
                                                    autocomplete="off">
                                                    @csrf
                                                    <div class="mt-2">
                                                        <label class="form-label" for="name">Nama Toko</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                value="{{ $store->name }}" name="name_add"
                                                                placeholder="Name" aria-label="Name"
                                                                aria-describedby="basic-addon11" required />
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label class="form-label" for="name">Pemilik Toko</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                value="{{ $store->owner }}" name="owner_add"
                                                                placeholder="Name" aria-label="Name"
                                                                aria-describedby="basic-addon11" required />
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label class="form-label" for="alamat">Alamat</label>
                                                        <div class="input-group">
                                                            <textarea class="form-control" name="address_add" placeholder="Alamat Toko" cols="10" rows="4">{{ $store->address }}</textarea>
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
                                    <td><i class="fab fa-sketch fa-lg text-warning me-3"></i>
                                        <strong>{{ $store->name }}</strong>
                                    </td>
                                    <td>{{ $store->owner }}</td>
                                    <td>{{ $store->address }}</td>
                                    <td>{{ $store->kecamatan }}</td>
                                    <td>{{ $store->kabupaten }}</td>
                                    <td>{{ $store->date }}</td>
                                    <td>
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#editModal-{{ $store->id }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <form action="{{ url('stores/delete-stores/' . $store->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"><i
                                                        class="bx bx-trash me-1"></i> Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="editModal-{{ $store->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">Edit Toko</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('stores/update-stores/' . $store->id) }}"
                                                    class="demo-vertical-spacing demo-only-element" method="POST"
                                                    autocomplete="off">
                                                    @csrf
                                                    <div class="mt-2">
                                                        <label class="form-label" for="name">Nama Toko</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                value="{{ $store->name }}" name="name_add"
                                                                placeholder="Name" aria-label="Name"
                                                                aria-describedby="basic-addon11" required />
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label class="form-label" for="name">Pemilik Toko</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                value="{{ $store->owner }}" name="owner_add"
                                                                placeholder="Name" aria-label="Name"
                                                                aria-describedby="basic-addon11" required />
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label class="form-label" for="alamat">Alamat</label>
                                                        <div class="input-group">
                                                            <textarea class="form-control" name="address_add" placeholder="Alamat Toko" cols="10" rows="4">{{ $store->address }}</textarea>
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
        <!-- Large Modal Add -->
        <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Tambah Toko</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="stores/add-stores" class="demo-vertical-spacing demo-only-element"
                            method="POST" autocomplete="off">
                            @csrf
                            <div class="mt-2">
                                <label class="form-label" for="name">Nama Toko</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name_add" placeholder="Name"
                                        aria-label="Name" aria-describedby="basic-addon11" required />
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label" for="name">Pemilik Toko</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="owner_add" placeholder="Name"
                                        aria-label="Name" aria-describedby="basic-addon11" required />
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label" for="alamat">Alamat</label>
                                <div class="input-group">
                                    <textarea class="form-control" name="address_add" placeholder="Alamat Toko" cols="10" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label" for="kecamatan">Kecamatan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="kecamatan_add"
                                        placeholder="kecamatan" aria-label="kecamatan"
                                        aria-describedby="basic-addon11" required />
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label" for="kabupaten">Kabupaten</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="kabupaten_add"
                                        placeholder="kabupaten" aria-label="kabupaten"
                                        aria-describedby="basic-addon11" required />
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label" for="date">Tanggal Gabung</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" name="date_add" placeholder="date"
                                        aria-label="date" aria-describedby="basic-addon11" required />
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


        {{ $stores->links('vendor.pagination.custom') }}
    </div>
</div>
