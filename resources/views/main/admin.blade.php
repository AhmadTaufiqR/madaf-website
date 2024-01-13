<div class="content-wrapper" style="overflow-x: auto">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">List Daftar/</span> Admin</h4>
        <!-- Bootstrap Toasts with Placement -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="row gx-3 gy-2 align-items-center">
                    <div class="col-md-3">
                        {{-- <label class="form-label" for="showToastPlacement">&nbsp;</label> --}}
                        <button id="showToastPlacement" type="button" data-bs-toggle="modal"
                            data-bs-target="#largeModal" class="btn btn-primary d-block">Tambah Admin</button>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Bootstrap Toasts with Placement -->
        <!-- Contextual Classes -->
        <div class="card">
            <h5 class="card-header">Admin</h5>
            <div class="text-nowrap" style="overflow-x: auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 0;
                        @endphp

                        @foreach ($users as $user)
                            @if ($no++ % 2 == 0)
                                <tr class="table-active">
                                    <td><i class="fab fa-react fa-lg text-info me-3"></i>
                                        <strong>{{ $user->name }}</strong>
                                    </td>
                                    <td>{{ $user->username }}</td>
                                    <td><span class="badge bg-label-success me-1">{{ $user->level }}</span></td>
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
                                    <td><i class="fab fa-sketch fa-lg text-warning me-3"></i>
                                        <strong>{{ $user->name }}</strong>
                                    </td>
                                    <td>{{ $user->username }}</td>
                                    <td><span class="badge bg-label-primary me-1">{{ $user->level }}</span></td>
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
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="submit"
                                                                class="btn btn-primary">Save Change</button>
                                                        </div>
                                                        <div class="mt-2">
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
                        <h5 class="modal-title" id="exampleModalLabel3">Tambah Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="register-user/check" class="demo-vertical-spacing demo-only-element"
                            method="POST" autocomplete="off">
                            @csrf
                            <div class="mt-2">
                                <label class="form-label" for="name">Nama</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ Session::get('name') }}"
                                        name="name_add" placeholder="Name" aria-label="Name"
                                        aria-describedby="basic-addon11" required />
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label" for="username">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon11">@</span>
                                    <input type="text" class="form-control"
                                        value="{{ Session::get('username') }}" name="username_add"
                                        placeholder="Username" aria-label="Username" aria-describedby="basic-addon11"
                                        required />
                                </div>
                            </div>
                            <div class="mt-2">
                                <label class="form-label" for="basic-default-password12">Password</label>
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
                                <label class="form-label" for="basic-default-password12">Ulangi Password</label>
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
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" name="submit" id="btn_save_add" disabled
                                    class="btn btn-primary">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>




        {{ $users->links('vendor.pagination.custom') }}
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
        } else {
            message.innerHTML = '';
            button.disabled = false;
        }
    }
</script>
