<table id="DataTable" class="table table-bordered table-responsive-lg">
    <thead>
        <tr>
            <th style="width: 10px;">No</th>
            <th>Name</th>
            <th>Id Number</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Room</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($guest as $no => $guest)    
        <tr>
            <td>{{$no+1}}</td>
            <td style="max-width: 70px">
                {{$guest['name']}}
                <p style="font-size: 9pt; margin:0">{{$guest['phone']}}</p>
            </td>
            <td>{{$guest['number_id']}}</td>
            <td>{{$guest['checkin']}}</td>
            <td>{{$guest['checkout']}}</td>
            <td>{{$guest->rooms->name ?? None}}</td>
            <td>
                <button type="button" id="{{$guest['id']}}" data-room="{{$guest->room}}" class="btn btn-danger deleted"><i class="fa fa-regular fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Id Number</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Room</th>
            <th>Status</th>
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
        var room = $(this).data('room');
        var formData = {id: id, room: room};

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
                    url: '/destroy/guest/'+id,
                    data: formData,
                    success: function (response) { 
                        Swal.fire(
                            'Save!',
                            'data is successfully saved',
                            'success'
                        );
                        $('.data').load('/data/guest');
                        $('.form').load('/form/guest');
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