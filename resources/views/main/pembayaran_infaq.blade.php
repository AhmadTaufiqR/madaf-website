<div class="content-wrapper" style="overflow-x: auto">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">List Daftar/</span> Infaq</h4>
        <!-- Bootstrap Toasts with Placement -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row gx-3 gy-2 align-items-center">
                    <div class="col-md-3">
                        <button id="showToastPlacement" type="button" data-bs-toggle="modal"
                            data-bs-target="#largeModal" class="btn btn-primary d-block">Tambah Infaq</button>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Bootstrap Toasts with Placement -->
        <!-- Contextual Classes -->
        <div class="card">
            <h5 class="card-header">Infaq</h5>
            <div class="text-nowrap" style="overflow-x: auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Kelas</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($infaq as $user)
                            @if ($no++ % 2 == 0)
                                <tr class="table-active">
                                    <td>{{ $loop->iteration }}</td>
                                    <td><i class="fab fa-react fa-lg text-info me-3"></i>
                                        <strong>{{ $user->month }}</strong>
                                    </td>
                                    <td>-</td>
                                    <td>{{ $user->amount }}</td>
                                    <td>{{ $user->category }}</td>
                                    <td>
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#editModal-{{ $user->id }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#editModalPassword-{{ $user->id }}"><i
                                                    class="bx bx-lock-open me-1"></i>Ubah Password</a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"><i
                                                        class="bx bx-trash me-1"></i> Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Large Modal Add -->
                                <div class="modal fade" id="editModal-{{ $user->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">Tambah Admin</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('register-user/update/' . $user->id) }}"
                                                    class="demo-vertical-spacing demo-only-element" method="POST"
                                                    autocomplete="off">
                                                    @csrf
                                                    <div class="mt-2">
                                                        <label class="form-label" for="name">Nama</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                value="{{ $user->name }}" name="name"
                                                                placeholder="Name" aria-label="Name"
                                                                aria-describedby="basic-addon11" />
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label class="form-label" for="username">Username</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="basic-addon11">@</span>
                                                            <input type="text" class="form-control"
                                                                value="{{ $user->username }}" name="username"
                                                                placeholder="Username" aria-label="Username"
                                                                aria-describedby="basic-addon11" />
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" name="submit"
                                                                class="btn btn-primary">Save Change</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="editModalPassword-{{ $user->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">Ubah Password</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('register-user/update-password/' . $user->id) }}"
                                                    class="demo-vertical-spacing demo-only-element" method="POST"
                                                    autocomplete="off">
                                                    @csrf
                                                    <div class="mt-2">
                                                        <label class="form-label"
                                                            for="basic-default-password12">Password</label>
                                                        <div class="form-password-toggle">
                                                            <div class="input-group">
                                                                <input type="password" class="form-control"
                                                                    name="password" onkeyup="check()"
                                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                                    aria-describedby="basic-default-password2" />
                                                                <span id="basic-default-password2"
                                                                    class="input-group-text cursor-pointer">
                                                                    <i class="bx bx-hide"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label class="form-label"
                                                            for="basic-default-password12">Ulangi Password</label>
                                                        <div class="form-password-toggle">
                                                            <div class="input-group">
                                                                <input type="password" class="form-control"
                                                                    name="confirm_password" id="confirm_password"
                                                                    onkeyup="check()"
                                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                                    aria-describedby="basic-default-password2"
                                                                    required />
                                                                <span id="basic-default-password2"
                                                                    class="input-group-text cursor-pointer">
                                                                    <i class="bx bx-hide"></i>
                                                                </span>
                                                            </div>
                                                            <span id='message'></span>
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" name="submit" id="btn_save"
                                                                disabled class="btn btn-primary">Save Change</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <tr class="table-default">
                                    <td>{{ $loop->iteration }}</td>
                                    <td><i class="fab fa-react fa-lg text-info me-3"></i>
                                        <strong>{{ $user->month }}</strong>
                                    </td>
                                    <td>-</td>
                                    <td>{{ $user->amount }}</td>
                                    <td>{{ $user->category }}</td>
                                    <td>
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#editModal-{{ $user->id }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#editModalPassword-{{ $user->id }}"><i
                                                    class="bx bx-lock-open me-1"></i>Ubah Password</a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"><i
                                                        class="bx bx-trash me-1"></i> Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Large Modal Add -->
                                <div class="modal fade" id="editModal-{{ $user->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">Tambah Admin</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('register-user/update/' . $user->id) }}"
                                                    class="demo-vertical-spacing demo-only-element" method="POST"
                                                    autocomplete="off">
                                                    @csrf
                                                    <div class="mt-2">
                                                        <label class="form-label" for="name">Nama</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                value="{{ $user->name }}" name="name"
                                                                placeholder="Name" aria-label="Name"
                                                                aria-describedby="basic-addon11" />
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label class="form-label" for="username">Username</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text" id="basic-addon11">@</span>
                                                            <input type="text" class="form-control"
                                                                value="{{ $user->username }}" name="username"
                                                                placeholder="Username" aria-label="Username"
                                                                aria-describedby="basic-addon11" />
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" name="submit"
                                                                class="btn btn-primary">Save Change</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="editModalPassword-{{ $user->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">Ubah Password</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('register-user/update-password/' . $user->id) }}"
                                                    class="demo-vertical-spacing demo-only-element" method="POST"
                                                    autocomplete="off">
                                                    @csrf
                                                    <div class="mt-2">
                                                        <label class="form-label"
                                                            for="basic-default-password12">Password</label>
                                                        <div class="form-password-toggle">
                                                            <div class="input-group">
                                                                <input type="password" class="form-control"
                                                                    name="password" onkeyup="check()"
                                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                                    aria-describedby="basic-default-password2" />
                                                                <span id="basic-default-password2"
                                                                    class="input-group-text cursor-pointer">
                                                                    <i class="bx bx-hide"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label class="form-label"
                                                            for="basic-default-password12">Ulangi Password</label>
                                                        <div class="form-password-toggle">
                                                            <div class="input-group">
                                                                <input type="password" class="form-control"
                                                                    name="confirm_password" id="confirm_password"
                                                                    onkeyup="check()"
                                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                                    aria-describedby="basic-default-password2"
                                                                    required />
                                                                <span id="basic-default-password2"
                                                                    class="input-group-text cursor-pointer">
                                                                    <i class="bx bx-hide"></i>
                                                                </span>
                                                            </div>
                                                            <span id='message'></span>
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" name="submit" id="btn_save"
                                                                disabled class="btn btn-primary">Save Change</button>
                                                        </div>
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
                        <h5 class="modal-title" id="exampleModalLabel3">Tambah Infaq</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="payment-infaq/check" class="demo-vertical-spacing demo-only-element"
                            method="POST" autocomplete="off">
                            @csrf
                            <div class="mt-2">
                                <label class="form-label" for="price">Bulan <span style="color: red">*</span></label>

                                <div class="input-group">
                                    <select id="selectmethod" class="form-select" onchange="check()" required name="month_selected_add"
                                        required>
                                        <option value="default">Silahkan dipilih</option>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-2">
                                <label class="form-label" for="price">Sekolah <span style="color: red">*</span></label>
                                <div class="input-group">
                                    <select id="selectmethod" class="form-select" onchange="check()" required name="category_selected_add"
                                        required>
                                        <option value="default">Silahkan dipilih</option>
                                        <option value="MTS">MTS</option>
                                        <option value="MAN">MAN</option>
                                        <option value="SMK">SMK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label" for="username">Jumlah <span
                                        style="color: red">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" onkeyup="check()" name="amount_add" placeholder="Jumlah"
                                        aria-label="Jumlah" aria-describedby="basic-addon11" required />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" name="submit" id="btn_save_add"
                                    class="btn btn-outline-secondary" disabled >Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- {{ $Infaq->links('vendor.pagination.custom') }} --}}
    </div>
</div>

<script>
    function check() {
        var month = document.querySelector('select[name=month_selected_add]');
        var category = document.querySelector('select[name=category_selected_add]');
        var jumlah = document.querySelector('input[name=amount_add]');
        var button = document.getElementById('btn_save_add');

        if (month.value === 'default') {
            button.disabled = true;
            button.classList.remove("btn-primary");
            button.classList.add("btn-outline-secondary");
        } else if (category.value === 'default') {
            button.disabled = true;
            button.classList.remove("btn-primary");
            button.classList.add("btn-outline-secondary");
        } else if (jumlah.value === '') {  
            button.disabled = true;
            button.classList.remove("btn-primary");
            button.classList.add("btn-outline-secondary");
        } else {
            button.disabled = false;
            button.classList.remove("btn-outline-secondary");
            button.classList.add("btn-primary");
        }
    }
</script>