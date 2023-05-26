<form id="form-account" method="POST">
    <div class="row">
        <div class="col-lg-9 mb-3">
            <label for="nama" class="form-label">Name</label>
            <input type="text" name="nama"  data-id="{{$user['id']}}" class="form-control" id="nama" placeholder="Rudi Aksara" value="{{$user['name']}}">
        </div>

        <div class="col-lg-3 mb-3 d-flex flex-column">
            <label for="access" class="form-label">Access</label>
            <select class="form-control select" id="accesss" name="access">
                <option></option>
                @if ($user['access'] == 0)
                    <option value="0" selected>Super Admin</option>
                    <option value="1">Admin Hotel</option>
                    <option value="2">Admin Restaurant</option>
                @elseif($user['access'] == 1)
                    <option value="0">Super Admin</option>
                    <option value="1" selected>Admin Hotel</option>
                    <option value="2">Admin Restaurant</option>
                @else
                    <option value="0">Super Admin</option>
                    <option value="1">Admin Hotel</option>
                    <option value="2" selected>Admin Restaurant</option>
                @endif
            </select>
        </div>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="email" value="{{$user['email']}}">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
    </div>

    <div class="row float-right m-2">
        <div class="col">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-outline-secondary reset">Reset</button>
        </div>
    </div>
</form>

<script>
    $('.select').select2({
        placeholder: "-input-",
        allowClear: true,
    });

    $('.reset').click(function (e) { 
        var access = $('select[name=access]').val();

        $('.select').val(access).change();
        $('#form-account').trigger('reset');
    });

    $('#form-account').on('submit', function submit(e) {
        e.preventDefault();
        let id = $('#nama').attr('data-id');

        console.log(id);
        var name = $('input[name=nama]').val();
        var email = $('input[name=email]').val();
        var access = $('select[name=access]').val();
        var password = $('input[name=password]').val();
        var formData = {name: name, email: email, access: access, password: password};
    
        Swal.fire({
            title: 'Information',
            text: 'are you sure to edit the data?',
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
                    url: '/edit/accounts/'+id,
                    data: formData,
                    success: function (response) { 
                            Swal.fire(
                            'Save!',
                            'data is successfully edited',
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
                
</script>