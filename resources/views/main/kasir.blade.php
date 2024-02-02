<div class="content-wrapper" style="overflow-x: auto">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">List Daftar/</span> Kasir</h4>
        <!-- Bootstrap Toasts with Placement -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row gx-3 gy-2 align-items-center">
                    <div class="col-md-3">
                        <label class="form-label" for="basic-default-password12">Cari Kasir</label>
                        <div class="input-group">
                            <input type="text" id="myInput" class="form-control" aria-describedby="basic-addon11"
                                onkeyup="myFunction()" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label" for="basic-default-password12">Tambah</label>
                        <button id="showToastPlacement" type="button" data-bs-toggle="modal"
                            data-bs-target="#largeModal" class="btn btn-primary d-block">Tambah Kasir</button>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Bootstrap Toasts with Placement -->
        <!-- Contextual Classes -->
        <div class="card">
            <h5 class="card-header">Kasir</h5>
            <div class="text-nowrap" style="overflow-x: auto">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Alamat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp
                        @foreach ($kasir as $user)
                            @if ($no++ % 2 == 0)
                                <tr class="table-active">
                                    <td>{{ $loop->iteration }}</td>
                                    <td><i class="fab fa-react fa-lg text-info me-3"></i>
                                        <strong>{{ $user->name }}</strong>
                                    </td>
                                    @if ($user->email == null)
                                        <td>-</td>
                                    @else
                                        <td>{{ $user->email }}</td>
                                    @endif
                                    <td>{{ $user->username }}</td>
                                    @if ($user->address == null)
                                        <td>-</td>
                                    @else
                                        <td><span class="badge bg-label-success me-1">{{ $user->address }}</span></td>
                                    @endif
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
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#destroy-{{ $user->id }}"><i
                                                    class="bx bx-trash me-1"></i>Hapus Kasir</a>
                                            {{-- <form action="{{ route('', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"><i
                                                        class="bx bx-trash me-1"></i> Delete</button>
                                            </form> --}}
                                        </div>
                                    </td>
                                </tr>

                                <!-- Large Modal Add -->
                                <div class="modal fade" id="editModal-{{ $user->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">Tambah Kasir</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('register-user-kasir/update/' . $user->id) }}"
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
                                                        <label class="form-label" for="email">Email</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                value="{{ $user->email }}" name="email"
                                                                placeholder="Email" aria-label="Email"
                                                                aria-describedby="basic-addon11" />
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label class="form-label" for="Alamat">Alamat</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                value="{{ $user->address }}" name="address"
                                                                placeholder="Alamat" aria-label="Alamat"
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
                                                <form
                                                    action="{{ url('register-user-kasir/update-password/' . $user->id) }}"
                                                    class="demo-vertical-spacing demo-only-element" method="POST"
                                                    autocomplete="off">
                                                    @csrf
                                                    <div class="mt-2">
                                                        <label class="form-label"
                                                            for="basic-default-password12">Password</label>
                                                        <div class="form-password-toggle">
                                                            <div class="input-group">
                                                                <input type="password" class="form-control"
                                                                    name="password"
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
                                                                    name="confirm_password"
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
                                                            <button type="submit" name="submit"
                                                                class="btn btn-primary">Save Change</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="destroy-{{ $user->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">Perhatian!</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('register-user-kasir/delete/' . $user->id) }}"
                                                    class="demo-vertical-spacing demo-only-element" method="POST"
                                                    autocomplete="off">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="mt-2">
                                                        <label for="basic-default-password12">Apakah anda yakin ingin
                                                            menghapus data Kasir <br> nama:
                                                            <span class="form-label">{{ $user->name }}</span>
                                                        </label>
                                                    </div>
                                                    <div class="mt-2">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" name="submit"
                                                                class="btn btn-primary">Delete</button>
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
                                        <strong>{{ $user->name }}</strong>
                                    </td>
                                    @if ($user->email == null)
                                        <td>-</td>
                                    @else
                                        <td>{{ $user->email }}</td>
                                    @endif
                                    <td>{{ $user->username }}</td>
                                    @if ($user->address == null)
                                        <td>-</td>
                                    @else
                                        <td><span class="badge bg-label-success me-1">{{ $user->address }}</span></td>
                                    @endif
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
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#destroy-{{ $user->id }}"><i
                                                    class="bx bx-trash me-1"></i>Hapus Kasir</a>
                                            {{-- <form action="{{ route('', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"><i
                                                        class="bx bx-trash me-1"></i> Delete</button>
                                            </form> --}}
                                        </div>
                                    </td>
                                </tr>

                                <!-- Large Modal Add -->
                                <div class="modal fade" id="editModal-{{ $user->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">Tambah Kasir</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('register-user-kasir/update/' . $user->id) }}"
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
                                                        <label class="form-label" for="email">Email</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                value="{{ $user->email }}" name="email"
                                                                placeholder="Email" aria-label="Email"
                                                                aria-describedby="basic-addon11" />
                                                        </div>
                                                    </div>
                                                    <div class="mt-2">
                                                        <label class="form-label" for="Alamat">Alamat</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                value="{{ $user->address }}" name="address"
                                                                placeholder="Alamat" aria-label="Alamat"
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
                                                <form
                                                    action="{{ url('register-user-kasir/update-password/' . $user->id) }}"
                                                    class="demo-vertical-spacing demo-only-element" method="POST"
                                                    autocomplete="off">
                                                    @csrf
                                                    <div class="mt-2">
                                                        <label class="form-label"
                                                            for="basic-default-password12">Password</label>
                                                        <div class="form-password-toggle">
                                                            <div class="input-group">
                                                                <input type="password" class="form-control"
                                                                    name="password"
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
                                                                    name="confirm_password"
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
                                                            <button type="submit" name="submit"
                                                                class="btn btn-primary">Save Change</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="destroy-{{ $user->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">Perhatian!</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('register-user-kasir/delete/' . $user->id) }}"
                                                    class="demo-vertical-spacing demo-only-element" method="POST"
                                                    autocomplete="off">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="mt-2">
                                                        <label for="basic-default-password12">Apakah anda yakin ingin
                                                            menghapus data Kasir <br> nama:
                                                            <span class="form-label">{{ $user->name }}</span>
                                                        </label>
                                                    </div>
                                                    <div class="mt-2">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" name="submit"
                                                                class="btn btn-primary">Delete</button>
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

        <!-- Large Modal Export Exel -->
        <div class="modal fade" id="largeModalExportExel" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Tambah Kasir</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="register-user/check" class="demo-vertical-spacing demo-only-element"
                            method="POST" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-2">
                                <label class="form-label" for="name">File Exel</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" accept=".xls, .xlsx, .csv"
                                        name="fileExel" aria-describedby="basic-addon11" onkeyup="" required />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#largeModal"
                                    class="btn btn-outline-secondary">Cencel</button>
                                <button type="submit" name="submit" id="btn_save_add_import" disabled
                                    class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Large Modal Add -->
        <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Tambah Kasir</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="register-user-kasir/check" class="demo-vertical-spacing demo-only-element"
                            method="POST" autocomplete="off">
                            @csrf
                            <div class="mt-2">
                                <label class="form-label" for="username">Username <span
                                        style="color: red">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                        value="{{ Session::get('username') }}" name="username_add"
                                        placeholder="Username" aria-label="username" aria-describedby="basic-addon11"
                                        required />
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label" for="name">Nama <span
                                        style="color: red">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ Session::get('name') }}"
                                        name="name_add" placeholder="Name" aria-label="Name"
                                        aria-describedby="basic-addon11" required />
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label" for="email">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon11">@</span>
                                    <input type="text" class="form-control" value="{{ Session::get('email') }}"
                                        name="email_add" placeholder="email" aria-label="email"
                                        aria-describedby="basic-addon11" />
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label" for="address">address</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ Session::get('address') }}"
                                        name="address_add" placeholder="address" aria-label="address"
                                        aria-describedby="basic-addon11" />
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label" for="basic-default-password12">Password <span
                                        style="color: red">*</span></label>
                                <div class="form-password-toggle">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password_add"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="basic-default-password2" required />
                                        <span id="basic-default-password2" class="input-group-text cursor-pointer">
                                            <i class="bx bx-hide"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label" for="basic-default-password12">Ulangi Password <span
                                        style="color: red">*</span></label>
                                <div class="form-password-toggle">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="confirm_password_add"
                                            id="confirm_password" onkeyup="check_add()"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                            aria-describedby="basic-default-password2" required />
                                        <span id="basic-default-password2" class="input-group-text cursor-pointer">
                                            <i class="bx bx-hide"></i>
                                        </span>
                                    </div>
                                    <span id='message_add'></span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="showImportExel" type="button" data-bs-toggle="modal"
                                    data-bs-target="#largeModalExportExel" class="btn btn-primary">Import
                                    Exel</button>
                                <button type="submit" name="submit" id="btn_save_add" disabled
                                    class="btn btn-outline-secondary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{ $kasir->links('vendor.pagination.custom') }}
    </div>
</div>



<script>
    function check() {
        var password = document.querySelector('input[name=password]');
        var confirm_password = document.querySelector('input[name=confirm_password]');
        var message = document.getElementById('message');
        var button = document.getElementById('btn_save');

        if (confirm_password.value === '') {
            message.innerHTML = '';
        } else if (password.value != confirm_password.value) {
            message.innerHTML = 'Password tidak cocok';
            message.style.color = 'red';
            button.disabled = true;
        } else {
            message.innerHTML = '';
            button.disabled = false;
        }
    }

    function check_add() {
        var password_add = document.querySelector('input[name=password_add]');
        var confirm_password_add = document.querySelector('input[name=confirm_password_add]');
        var message = document.getElementById('message_add');
        var button = document.getElementById('btn_save_add');

        if (confirm_password_add.value === '') {
            message.innerHTML = '';
        } else if (password_add.value !== confirm_password_add.value) {
            message.innerHTML = 'Password tidak cocok';
            message.style.color = 'red';
            button.disabled = true;
            button.classList.remove("btn-primary");
            button.classList.add("btn-outline-secondary");
        } else {
            message.innerHTML = '';
            button.disabled = false;
            button.classList.remove("btn-outline-secondary");
            button.classList.add("btn-primary");
        }
    }

    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
