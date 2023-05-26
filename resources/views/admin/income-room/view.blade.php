<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Income Rooms</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item text-muted active" aria-current="page">Income</li>
                        <li class="breadcrumb-item text-muted" aria-current="page">Rooms</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-right info">
                <button type="button" onclick="downloadexcel()" class="btn btn-success d-flex justify-content-center align-items-center mx-2"><i class="far fa-file-excel"></i> <span class="d-none d-sm-block mx-2">Export</span></button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="data p-4">
                    <table id="DataTable" class="table table-bordered table-responsive-md">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:20px">No</th>
                                <th>Date</th>
                                <th>Income</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($data as $tanggal => $totalHarga)
                                <tr>
                                    <td class="text-truncate text-center">{{$no++}}</td>
                                    <td class="text-truncate">{{ date('d-M-Y', strtotime($tanggal)) }}</td>
                                    <td class="text-truncate">Rp {{number_format($totalHarga) }}</td>
                                </tr> 
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2" class="text-center">Total</th>
                                <th>Rp {{number_format($total)}}</th>
                            </tr>
                        </tfoot>
                    </table>
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

    function downloadexcel() {
        $.ajax({
            type: "GET",
            url: "/excel-income-rooms",
            xhrFields: {
                responseType: 'blob' // Mengatur respons sebagai blob (binary large object)
            },
            success: function (response) {
                // Membuat tautan untuk mengunduh file
                var blob = new Blob([response]);
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'income-rooms.xlsx';
                link.click();
            }
        });
    }
</script>