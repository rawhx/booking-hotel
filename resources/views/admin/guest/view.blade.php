            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Guest</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Report</li>
                                    <li class="breadcrumb-item text-muted" aria-current="page">Guest</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right addroom">
                            <button type="button" class="btn btn-primary d-flex justify-content-center align-items-center mx-2"><i class="fa fa-solid fa-plus"></i> <span class="d-none d-sm-block mx-2">Add Guest</span></button>
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
                            <div class="data p-4">
                                <table id="DataTable" class="table table-bordered table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Id Number</th>
                                            <th class="text-center">Check In</th>
                                            <th class="text-center">Check Out</th>
                                            <th class="text-center">Room</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data">
                                        @foreach ($guest as $no => $guest)    
                                        <tr>
                                            <td class="text-truncate text-center align-middle">{{$no+1}}</td>
                                            <td class="text-truncate align-middle">
                                                {{$guest['name']}}
                                                <p style="font-size: 9pt; margin:0">{{$guest['phone']}}</p>
                                            </td>
                                            <td class="text-truncate align-middle">{{$guest['number_id']}}</td>
                                            <td class="text-truncate align-middle">{{$guest['checkin']}}</td>
                                            <td class="text-truncate align-middle">{{$guest['checkout']}}</td>
                                            <td class="text-truncate align-middle">{{$guest->rooms->name ?? None}}</td>
                                            <td class="text-truncate align-middle">
                                                <button type="button" id="{{$guest['id']}}" data-room="{{$guest->room}}" class="btn btn-danger deleted"><i class="fa fa-regular fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Id Number</th>
                                            <th class="text-center">Check In</th>
                                            <th class="text-center">Check Out</th>
                                            <th class="text-center">Room</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="form d-none p-4">
                                @include('admin.guest.form')
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
                    $('.number-format').on('input', function() {
                        var amount = $(this).val().replace(/\D/g, '');
                        $(this).val(amount.toLocaleString());
                    });
                });

                $('.addroom').click(function () { 
                    $('.data').addClass("d-none");
                    $('.form').removeClass("d-none");
                    $('.addroom').addClass("d-none");
                    $('.back').removeClass("d-none");
                });

                function back() {   
                    $('.form').addClass("d-none");
                    $('.data').removeClass("d-none");
                    $('.back').addClass("d-none");
                    $('.addroom').removeClass("d-none");
                }

                function show() {
                    let formatter = new Intl.NumberFormat({maximumFractionDigits: 3});
                    var idprice = $('select[name=room]').val();
                    var price = $('#rooms-'+idprice).attr('data-price');
                    var avaible = $('#rooms-'+idprice).data('avaible1');
                    var avaible2 = $('#rooms-'+idprice).data('avaible2');
                    $("#price").val(formatter.format(price));
                    if (price <= 200000) {
                        $("#avaible").val(avaible2);
                    } else {
                        $("#avaible").val(avaible);
                    }
                }
                
                $('#cash').on('input', function() {
                    let formatter = new Intl.NumberFormat({maximumFractionDigits: 3});
                    var idprice = $('select[name=room]').val();
                    var price = $('#rooms-'+idprice).attr('data-price');
                    console.log(formatter.format(price));
                    $("#change").val(formatter.format($(this).val() - price));
                });

                $('#payment').on('change', function () {
                    var payment = $('select[name=payment]').val();
                    if(payment == 'nocash'){
                        $('.cash').addClass("d-none");
                    } else {
                        $('.cash').removeClass("d-none");
                    }
                });
                
                $('.select').select2({
                    placeholder: "-input-",
                    // allowClear: true
                });

                $('#form-guest').on('submit', function submit(e) {
                    e.preventDefault();
                    var name = $('input[name=nama]').val();
                    var idnum = $('input[name=idnumber]').val();
                    var phone = $('input[name=telp]').val();
                    var checkin = $('input[name=checkin]').val();
                    var checkout = $('input[name=checkout]').val();
                    var pay = $('input[name=price]').val();
                    var room = $('select[name=room]').val();
                    var cash = $('input[name=cash]').val();
                    var formData = {name: name, idnum: idnum, idnum: idnum, phone: phone, checkin: checkin, checkout: checkout, pay: pay, room: room};
                
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
                                url: '/store/guest',
                                data: formData,
                                success: function (response) { 
                                    Swal.fire(
                                        'Save!',
                                        'data is successfully saved',
                                        'success'
                                    );
                                    $('.data').load('/data/guest');
                                    $('.form').load('/form/guest');
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
                    var room = $(this).data('room');
                    var formData = {id: id, room: room};

                    Swal.fire({
                        title: 'Information',
                        text: 'are you sure to delete the data?',
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
                                        'data deleted successfully',
                                        'success'
                                    );
                                    $('.data').load('/data/guest');
                                    $('.form').load('/form/guest');
                                },
                                error: function () {
                                    Swal.fire(
                                        'Fail!',
                                        'data failed to delete',
                                        'error'
                                    );
                                },
                            });
                        } 
                    });
                });
            </script>