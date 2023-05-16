            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">History</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Report</li>
                                    <li class="breadcrumb-item text-muted" aria-current="page">History</li>
                                </ol>
                            </nav>
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
                                            <th style="width: 10px;">No</th>
                                            <th>Name</th>
                                            <th>Id Number</th>
                                            <th>Check In</th>
                                            <th>Check Out</th>
                                            <th>Room</th>
                                            {{-- <th>Status</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($guest as $no => $guest)    
                                        <tr>
                                            <td>{{$no+1}}</td>
                                            <td>
                                                {{$guest['name']}}
                                                <p style="font-size: 9pt; margin:0">{{$guest['phone']}}</p>
                                            </td>
                                            <td>{{$guest['number_id']}}</td>
                                            <td>{{$guest['checkin']}}</td>
                                            <td>{{$guest['checkout']}}</td>
                                            <td>{{$guest->rooms->name ?? None}}</td>
                                            {{-- <td>
                                                <button type="button" id="{{$guest['id']}}" data-room="{{$guest->room}}" class="btn btn-danger deleted"><i class="fa fa-regular fa-trash"></i></button>
                                            </td> --}}
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
                                            {{-- <th>Status</th> --}}
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
            </script>