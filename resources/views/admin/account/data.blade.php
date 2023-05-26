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

<script>
    $(document).ready(function () {
        $('#DataTable').DataTable();
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

    $('.update').click(function (e) { 
        let id = $(this).attr('id');
        let url = '/edit/accounts/'+id;
        $('.form').load(url);
        formAccount();
    });
</script>