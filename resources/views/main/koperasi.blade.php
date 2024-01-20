<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">List Daftar/</span> Koperasi</h4>
        <!-- Bootstrap Toasts with Placement -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row gx-3 gy-2 align-items-center">
                    <div class="col-md-3">
                        <button id="showToastPlacement" type="button" data-bs-toggle="modal" data-bs-target="#largeModal"
                            class="btn btn-primary">Tambah Koperasi</button>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Bootstrap Toasts with Placement -->
        <!-- Contextual Classes -->
        <div class="card">
            <h5 class="card-header">Daftar Koperasi</h5>
            <div class=" table-responsive text-nowrap" style="overflow-x: auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Koperasi</th>
                            <th>Pemilik</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp

                        @foreach ($koperasi as $store)
                            @if ($no++ % 2 == 0)
                                <tr class="table-active">
                                    <td>{{ $loop->iteration }}</td>
                                    <td><i class="fab fa-react fa-lg text-info me-3"></i>
                                        <strong>{{ $store->name }}</strong>
                                    </td>
                                    <td>{{ $store->owner }}</td>
                                    <td>{{ $store->address }}</td>
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
                                                <h5 class="modal-title" id="exampleModalLabel3">Edit Koperasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('stores/update-stores/' . $store->id) }}"
                                                    class="demo-vertical-spacing demo-only-element" method="POST"
                                                    autocomplete="off">
                                                    @csrf
                                                    <div class="mt-2">
                                                        <label class="form-label" for="name">Nama Koperasi</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                value="{{ $store->name }}" name="name_add"
                                                                placeholder="Name" aria-label="Name"
                                                                aria-describedby="basic-addon11" required />
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label class="form-label" for="name">Pemilik Koperasi</label>
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
                                                            <textarea class="form-control" name="address_add" placeholder="Alamat Koperasi" cols="10" rows="4">{{ $store->address }}</textarea>
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
                                    <td>{{ $loop->iteration }}</td>
                                    <td><i class="fab fa-sketch fa-lg text-warning me-3"></i>
                                        <strong>{{ $store->name }}</strong>
                                    </td>
                                    <td>{{ $store->owner }}</td>
                                    <td>{{ $store->address }}</td>
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
                                                <h5 class="modal-title" id="exampleModalLabel3">Edit Koperasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('stores/update-stores/' . $store->id) }}"
                                                    class="demo-vertical-spacing demo-only-element" method="POST"
                                                    autocomplete="off">
                                                    @csrf
                                                    <div class="mt-2">
                                                        <label class="form-label" for="name">Nama Koperasi</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                value="{{ $store->name }}" name="name_add"
                                                                placeholder="Name" aria-label="Name"
                                                                aria-describedby="basic-addon11" required />
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label class="form-label" for="name">Pemilik Koperasi</label>
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
                                                            <textarea class="form-control" name="address_add" placeholder="Alamat Koperasi" cols="10" rows="4">{{ $store->address }}</textarea>
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
                        <h5 class="modal-title" id="exampleModalLabel3">Tambah Koperasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="register-user-koperasi/check" class="demo-vertical-spacing demo-only-element"
                            method="POST" autocomplete="off">
                            @csrf
                            <div class="mt-2">
                                <label class="form-label" for="name">Nama Koperasi <span style="color: red">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name_add" placeholder="Name" value="{{ Session::get('name') }}"
                                        aria-label="Name" aria-describedby="basic-addon11" required onkeyup="check_add()"/>
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label" for="name">Pemilik Koperasi <span style="color: red">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="owner_add" placeholder="Name" value="{{ Session::get('owner') }}"
                                        aria-label="Name" aria-describedby="basic-addon11" required onkeyup="check_add()"/>
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label" for="alamat">Alamat <span style="color: red">*</span></label>
                                <div class="input-group">
                                    <textarea class="form-control" name="address_add" placeholder="Alamat Koperasi" cols="10" rows="4" onkeyup="check_add()"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" name="submit" id="btn_save_add"
                                    class="btn btn-outline-secondary" disabled>Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


        {{ $koperasi->links('vendor.pagination.custom') }}
    </div>
</div>

<script>
    function check_add() {
        var name = document.querySelector('input[name=name_add]');
        var owner = document.querySelector('input[name=owner_add]');
        var address = document.querySelector('textarea[name=address_add]');
        var button = document.getElementById('btn_save_add');

        if (name.value === '') {
            button.disabled = true
            button.classList.remove("btn-primary")
            button.classList.add("btn-outline-secondary")
        } else if (owner.value === '') {
            button.disabled = true
            button.classList.remove("btn-primary")
            button.classList.add("btn-outline-secondary")
        } else if (address.value === '') {
            button.disabled = true
            button.classList.remove("btn-primary")
            button.classList.add("btn-outline-secondary")
        } else {
            button.disabled = false
            button.classList.remove("btn-outline-secondary")
            button.classList.add("btn-primary")
        }

        // if (confirm_password_add.value === '') {
        //     message.innerHTML = '';
        // } else if (password_add.value !== confirm_password_add.value) {
        //     message.innerHTML = 'Password tidak cocok';
        //     message.style.color = 'red';
        //     button.disabled = true;
        //     button.classList.remove("btn-primary");
        //     button.classList.add("btn-outline-secondary");
        // } else {
        //     message.innerHTML = '';
        //     button.disabled = false;
        //     button.classList.remove("btn-outline-secondary");
        //     button.classList.add("btn-primary");
        // }
    }
</script>