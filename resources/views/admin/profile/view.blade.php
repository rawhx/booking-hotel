<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Profile</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item text-muted active" aria-current="page">Authentication</li>
                        <li class="breadcrumb-item text-muted" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right info">
                <button type="button" onclick="password()" class="btn btn-primary d-flex justify-content-center align-items-center mx-2"><i class="fa fa-lock"></i> <span class="d-none d-sm-block mx-2">Password</span></button>
            </div>
            <div class="customize-input float-right password d-none">
                <button type="button" onclick="back()" class="btn btn-primary d-flex justify-content-center align-items-center mx-2"><i class="fa fa-solid fa-chevron-left"></i> <span class="d-none d-sm-block mx-2">Back</span></button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card info">
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                        data-img="{{auth()->user()->profile ?? 'https://www.its.ac.id/international/wp-content/uploads/sites/66/2020/02/blank-profile-picture-973460_1280-300x300.jpg'}}"
                        src="{{auth()->user()->profile ?? 'https://www.its.ac.id/international/wp-content/uploads/sites/66/2020/02/blank-profile-picture-973460_1280-300x300.jpg'}}"
                        alt="user-avatar"
                        class="d-block rounded mr-4"
                        height="100"
                        id="uploadedAvatar"
                        />
                      <div class="button-wrapper">
                        <form id="upload-img" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="upload" class="btn btn-primary m-0" tabindex="0">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="fas fa-image d-block d-sm-none"></i>
                                <input
                                type="file"
                                id="upload"
                                class="account-file-input"
                                hidden
                                name="gambar"
                                accept=".png, .jpg, .jpeg"
                                />
                            </label> 
                            <button type="button" class="btn btn-outline-secondary account-image-reset">
                                <i class="fas fa-undo d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                            </button>
                        </form>
                      </div>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <form id="form-profile" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input
                                class="form-control"
                                type="text"
                                id="email"
                                name="email"
                                value="{{auth()->user()->email ?? ''}}"
                                placeholder="testing@example.com"
                                />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nama" class="form-label">Name</label>
                                <input class="form-control"  type="text" name="name" id="nama" value="{{auth()->user()->name ?? ''}}" placeholder="name" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="username" class="form-label">Username</label>
                                <input
                                class="form-control"
                                type="text"
                                id="username"
                                name="username"
                                value="{{auth()->user()->username ?? ''}}"
                                placeholder="example.qy"
                                maxlength="25"
                                autofocus
                                />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="alamat" class="form-label">Address</label>
                                <textarea name="adress" placeholder="address" style="overflow: hidden" id="alamat" class="form-control" rows="3">{{auth()->user()->address ?? ''}}</textarea>
                            </div>
                        </div>
                        <div class="mt-2 float-right">
                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card password d-none">
                <div class="card-body">
                    <form id="form-password">
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <div class="input-group input-group-merge">
                            <input
                                type="password"
                                id="password"
                                class="form-control"
                                name="password1"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password"
                            />
                        </div>
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Confirmation Password 1</label>
                            <input class="form-control" type="password" name="password2" id="password2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"/>
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Confirmation Password 2</label>
                            <input class="form-control" type="password" name="password3" id="password2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"/>
                        </div>
                        <div class="mt-2 float-right">
                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
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
    $(document).ready(function() {
        // Fungsi untuk mengatur tinggi textarea
        function autoResizeTextarea() {
        // Mengambil semua textarea pada halaman
        $('textarea').each(function() {
            // Mengatur tinggi textarea berdasarkan scrollHeight (tinggi konten)
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
        }
    
        // Panggil fungsi autoResizeTextarea saat halaman dimuat dan saat textarea diubah isinya
        autoResizeTextarea();
        $('textarea').on('input', autoResizeTextarea);

    });

    function password() { 
        $('.password').removeClass('d-none');
        $('.info').hide(); 
    }
    
    function back() { 
        $('.password').addClass('d-none');
        $('.info').show(); 
    }

    document.getElementById("upload").addEventListener("change", function () {
        var file = this.files[0];
        var formData = new FormData();
        formData.append("gambar", file);
        
        var xhr = new XMLHttpRequest();

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to upload an image?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Save Image'
        }).then((result) => {
        if (result.isConfirmed) {
            xhr.open("POST", "/profile/img/{{auth()->user()->id}}", true);
            xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            xhr.send(formData);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // Aksi yang diambil setelah gambar berhasil diunggah
                        $('.page-wrapper').load("/profile")
                        $('.top-navbar').load("/navbar")
                        Swal.fire(
                            'Save!',
                            'data is successfully saved',
                            'success'
                        );
                    } else {
                        // Tangani jika ada kesalahan
                        Swal.fire(
                            'Fail!',
                            'Data not saved',
                            'error'
                        );
                    }
                }
            };
        }
        })
    });

    $('#upload').change(function () { 
        var img = this.files[0];

        $input = $(this);
        if ($input.val().length > 0) {
            fileReader = new FileReader();
            fileReader.onload = function(data) {
                $('#uploadedAvatar').attr('src', data.target.result);
            }
            fileReader.readAsDataURL($input.prop('files')[0]);
            $('#uploadedAvatar').css('display', 'block');
        } 
    });

    $('.account-image-reset ').click(function () { 
        var img = $('#uploadedAvatar').data('img');
        $('#uploadedAvatar').attr('src', img);
    });

    $('#form-profile').on('submit', function submit(e) {
        e.preventDefault();
        var nama = $('input[name=name]').val();
        var alamat = $('textarea[name=adress]').val();
        var email = $('input[name=email]').val();
        var username = $('input[name=username]').val();
        var formData = {nama: nama, alamat: alamat, email: email, username: username};
        
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
                    type: 'GET',
                    url: "/profile/"+'{{auth()->user()->id}}',
                    data: formData,
                    success: function (response) { 
                        $('.page-wrapper').load("/profile")
                        // $('.top-navbar').load("/navbar")
                        Swal.fire(
                        'Save!',
                        'data is successfully saved',
                        'success'
                        );
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
        })
    });

    $('#form-password').on('submit', function submit(e) {
        e.preventDefault();
        var password1 = $('input[name=password1]').val();
        var password2 = $('input[name=password2]').val();
        var password3 = $('input[name=password3]').val();
        var formData = {password3: password3};
      
        Swal.fire({
            title: 'Information',
            text: 'are you sure to save password??',
            icon: 'info',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: '<i class="bx bx-check"></i> Yes',
            cancelButtonText: '<i class="bx bx-x"></i> No'
        }).then((result) => {
          if (password1 == password2 && password2 == password3) {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: '/profile/password/'+'{{auth()->user()->id}}',
                    data: formData,
                    success: function (response) { 
                        $('#form-password').trigger('reset');
                        back();
                        Swal.fire(
                            'Save!',
                            'password is successfully saved',
                            'success'
                        ); 
                    },
                    error: function () {
                        Swal.fire(
                        'Fail!',
                        'password not saved',
                        'error'
                        );
                    },
                });
            } 
          } else {
            Swal.fire(
                'Fail!',
                'password not saved',
                'error'
            );
          }
        })
    });
   
</script>