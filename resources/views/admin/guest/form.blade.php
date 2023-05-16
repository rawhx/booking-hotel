<form id="form-guest">
    <div class="row">
        <div class="col-sm form-group d-flex flex-column">
            <label for="room">Room</label>
            <select class="form-control select" id="room" name="room" onchange="show()">
                <option></option>
                @foreach ($room as $room)
                <option id="rooms-{{$room['id']}}" value="{{$room['id']}}" data-avaible1="{{$avaible}}" data-avaible2="{{$avaible2}}" data-price="{{$room['price']}}">{{ $room['name'] }}</option>
                @endforeach
            </select>
          </div>
        <div class="col-sm mb-3">
            <label for="avaible" class="form-label">Avaible Space</label>
            <input type="text" name="Avaible" class="form-control" id="avaible" value="" readonly>
        </div>
        <div class="col-lg mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" name="price" class="form-control" id="price" value="" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col-lg mb-3">
            <label for="nama" class="form-label">Name Guest</label>
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Rudi Aksara">
        </div>
        <div class="col-lg mb-3">
            <label for="id" class="form-label">ID Number</label>
            <input type="text" name="idnumber" maxlength="16" onkeypress="return number(event)" class="form-control" id="id" placeholder="100000">
        </div>
        <div class="col-lg mb-3">
            <label for="notelp" class="form-label">Phone Number</label>
            <input type="tel" name="telp" maxlength="13" onkeypress="return number(event)" class="form-control" id="notelp" placeholder="08123456789">
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm mb-3">
            <label for="checkin" class="form-label">Check In</label>
            <input type="date" name="checkin" class="form-control date" id="checkin">
        </div>
        <div class="col-sm mb-3">
            <label for="checkout" class="form-label">Check Out</label>
            <input type="date" name="checkout" class="form-control date" id="checkout">
        </div>
    </div>

    <div class="row">
        <div class="col-sm mb-3 d-flex flex-column">
            <label for="payment" class="form-label">Payment</label>
            <select class="form-control select" id="payment" name="payment">
                <option value="cash">Cash</option>
                <option value="nocash">Non Cash</option>
            </select>
        </div>
        <div class="col-sm mb-3 cash">
            <label for="cash" class="form-label">Total Payment</label>
            <input type="text" onkeypress="return number(event)" name="cash" class="form-control" id="cash" placeholder="150000">
        </div>
        <div class="col-sm mb-3 cash">
            <label for="change" class="form-label">Change</label>
            <input type="text" onkeypress="return number(event)" name="change" class="form-control" id="change" placeholder="150000" readonly>
        </div>
    </div>

    <div class="row float-right m-2">
        <div class="col">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </div>
</form>

<script>
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
        allowClear: true
    });

    $('#form-guest').on('submit', function submit(e) {
        e.preventDefault();
        var name = $('input[name=nama]').val();
        var idnum = $('input[name=idnumber]').val();
        var phone = $('input[name=telp]').val();
        var checkin = $('input[name=checkin]').val();
        var checkout = $('input[name=checkout]').val();
        var pay = $('input[name=price]').val();
        var cash = $('input[name=cash]').val();
        var room = $('select[name=room]').val();
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
                        $('.form').addClass("d-none");
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