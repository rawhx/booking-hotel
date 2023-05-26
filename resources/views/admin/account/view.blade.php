            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Accounts</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Authentication</li>
                                    <li class="breadcrumb-item text-muted" aria-current="page">Accounts</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right addaccount">
                            <button type="button" onclick="formAccount()" class="btn btn-primary d-flex justify-content-center align-items-center mx-2"><i class="fa fa-solid fa-plus"></i> <span class="d-none d-sm-block mx-2">New Account</span></button>
                        </div>
                        <div class="customize-input float-right back d-none">
                            <button type="button" onclick="back()" class="btn btn-primary d-flex justify-content-center align-items-center mx-2"><i class="fa fa-solid fa-chevron-left"></i> <span class="d-none d-sm-block mx-2">Back</span></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="data p-4 table-responsive">
                                <table id="DataTable" class="table table-bordered table-responsive-xl">
                                    <thead>
                                        <tr>
                                            <th class="text-truncate text-center" style="width: 10px;">No</th>
                                            <th class="text-truncate text-center">Name</th>
                                            <th class="text-truncate text-center">Division</th>
                                            <th class="text-truncate text-center">Profile</th>
                                            <th class="text-truncate text-center">Status</th>
                                            <th class="text-truncate text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        @foreach ($user as $key => $item)
                                            <tr>
                                                <td class="text-center align-middle">{{$key+1}}</td>
                                                <td class="text-truncate align-middle">
                                                    <p class="m-0 text-dark font-weight-medium">{{$item['name']}}</p>
                                                    <span class="m-0 font-12">{{$item['email']}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    @if ($item['access'] == 1)
                                                        admin hotel
                                                        @elseif($item['access'] == 2)
                                                        admin retaurant
                                                        @else
                                                        Super Admin                                                
                                                    @endif
                                                </td>
                                                <td class="align-middle text-center">
                                                    <img src="{{$item['profile'] ?? 'https://www.its.ac.id/international/wp-content/uploads/sites/66/2020/02/blank-profile-picture-973460_1280-300x300.jpg'}}" alt="user" class="rounded-circle" style="object-fit: cover; object-position: center" width="45" height="45">
                                                </td>
                                                <td class="align-middle text-center"></td>
                                                <td class="text-center align-middle">
                                                    @if ($item['access'] == 0)
                                                        <button type="button" class="btn btn-warning edit-profile my-1"><i class='bx bxs-edit' style="color:white"></i></button>
                                                    @else
                                                        <button type="button" id="{{$item['id']}}" class="btn btn-warning my-1 update"><i class='bx bxs-edit' style="color:white"></i></button>
                                                        <button type="button" id="{{$item['id']}}" class="btn btn-danger my-1 deleted"><i class='bx bxs-trash-alt' style="color:white"></i></button>
                                                    @endif
                                                </td>
                                            </tr>
                                            
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Division</th>
                                            <th class="text-center">Profile</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="form d-none p-4">
                                <form id="form-account" method="POST">
                                    <div class="row">
                                        <div class="col-lg-9 mb-3">
                                            <label for="nama" class="form-label">Name</label>
                                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Rudi Aksara">
                                        </div>

                                        <div class="col-lg-3 mb-3 d-flex flex-column">
                                            <label for="access" class="form-label">Access</label>
                                            <select class="form-control select" id="accesss" name="access">
                                                <option></option>
                                                <option value="0">Super Admin</option>
                                                <option value="1">Admin Hotel</option>
                                                <option value="2">Admin Restaurant</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="12345678" value="12345678">
                                    </div>
                                
                                    <div class="row float-right m-2">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-outline-secondary reset">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer d-sm-flex justify-content-between text-center text-muted">
                <p>Rawh</p>
                <p>
                    All Rights Reserved by Adminmart. Designed and Developed by <a
                        href="https://wrappixel.com">WrapPixel</a>.
                </p>
            </footer>

            <script>
                $(document).ready(function () {
                    $('#DataTable').DataTable();
                });

                $('.edit-profile').click(function (e) { 
                    e.preventDefault();
                    $('.page-wrapper').load("/profile");
                    $('.dashboard').removeClass("selected");
                    $('.guest').removeClass("selected");
                    $('.history').removeClass("selected");
                    $('.income').removeClass("selected");
                    $('.account').removeClass("selected");
                    $('.profile').addClass("selected");
                    $('.topprofile').addClass("active");
                });

                function formAccount() {
                    $('.data').addClass("d-none");
                    $('.form').removeClass("d-none");
                    $('.addaccount').addClass("d-none");
                    $('.back').removeClass("d-none");
                    $('input').val(null).trigger('change');
                    $('.select').val(null).trigger('change');
                    $('input[name=password]').val('admin').trigger('change');
                }

                // $('.addaccount').click(function () { 
                // });

                function back() {   
                    $('.form').addClass("d-none");
                    $('.data').removeClass("d-none");
                    $('.back').addClass("d-none");
                    $('.addaccount').removeClass("d-none");
                }

                $('.select').select2({
                    placeholder: "-input-",
                    allowClear: true,
                });

                $('.update').click(function (e) { 
                    let id = $(this).attr('id');
                    let url = '/edit/accounts/'+id;
                    $('.form').load(url);
                    formAccount();
                });

                $('#form-account').on('submit', function submit(e) {
                    e.preventDefault();
                    var name = $('input[name=nama]').val();
                    var email = $('input[name=email]').val();
                    var access = $('select[name=access]').val();
                    var password = $('input[name=password]').val();
                    var formData = {name: name, email: email, access: access, password: password};
                
                    Swal.fire({
                        title: 'Information',
                        text: 'are you sure to save the data?',
                        icon: 'info',
                        showCancelButton: true,
                        cancelButtonColor: '#d33',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: '<i class="bx bx-check"></i> Yes',
                        cancelButtonText: '<i class="bx bx-x"></i> No'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'POST',
                                url: '/store/accounts',
                                data: formData,
                                success: function (response) { 
                                        Swal.fire(
                                        'Save!',
                                        'data is successfully saved',
                                        'success'
                                    );
                                    $('.select').val(null).trigger('change');
                                    $('.data').load('/data/accounts');
                                    $('#form-account').trigger('reset');
                                    back();
                                },
                                error: function () {
                                    Swal.fire(
                                        'Fail!',
                                        'Data not saved',
                                        'error'
                                    );
                                },
                            });
                        } 
                    });
                });
                
                $('.deleted').click(function (e) { 
                    e.preventDefault();
                    var id = $(this).attr('id');
                    var formData = {id: id};

                    Swal.fire({
                        title: 'Information',
                        text: 'are you sure to delete the account?',
                        icon: 'info',
                        showCancelButton: true,
                        cancelButtonColor: '#d33',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: '<i class="bx bx-check"></i> Yes',
                        cancelButtonText: '<i class="bx bx-x"></i> No'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'POST',
                                url: '/destroy/accounts/'+id,
                                data: formData,
                                success: function (response) { 
                                    Swal.fire(
                                        'Save!',
                                        'account deleted successfully',
                                        'success'
                                    );
                                    $('.data').load('/data/accounts');
                                },
                                error: function () {
                                    Swal.fire(
                                        'Fail!',
                                        'account failed to delete',
                                        'error'
                                    );
                                },
                            });
                        } 
                    });
                });

                $('.reset').click(function (e) { 
                    $('.select').val(null).trigger('change');
                    $('#form-account').trigger('reset');
                });
            </script>