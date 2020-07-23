@extends('layouts.master')

@section('title')
Sub Users | Accounts
@endsection

@section('content')

<!-- Add Designation Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Designation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/save-designation" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Designation Name :</label>
                        <input type="text" name="designation_name" class="form-control" id="recipient-name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">SAVE</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add Designation Modal END-->

<!-- Delete Designation Modal -->
<div class="modal fade" id="deletedesignationmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"> Delete Designation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="delete_designation_modal_form" method="POST">
                {{csrf_field()}}
                {{method_field('DELETE')}}

                <div class="modal-body">
                    <input type="hidden" id="delete_designation_name">
                    <h6>Are you sure ? This will delete all users with this designation ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Yes, DELETE</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>

                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Designation Modal END-->

<!-- Add SUBUSER Modal -->
<div class="modal fade" id="subuserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subuserModalLabel">Add New Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/save-subuser') }}" method="POST">
                {{ csrf_field() }}

                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name :</label>
                        <input type="text" name="name" class="form-control" id="recipient-name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Phone :</label>
                        <input type="number" name="phone" class="form-control" id="recipient-name" placeholder="Enter Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Password :</label>
                        <input type="text" name="password" class="form-control" id="recipient-name" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Designation :</label>
                        <select name="designation_id" id="" class="form-control" required>
                            <option value="">  Select Designation  </option>
                            @foreach ($designation as $item)
                                <option value="{{ $item->id }}"> {{ $item->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Reports_To :</label>
                        <select name="reports_to" id="" class="form-control" required>
                            <option value="">  User Reports To  </option>
                            <option value="Admin">  Admin </option>
                            @foreach ($subuser as $item)
                                <option value=" {{ $item->name }}  "> {{ $item->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">SAVE</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Add SUBUSER Modal END-->

<!-- Delete SUBUSER Modal -->
<div class="modal fade" id="deletesubusermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"> Delete Subuser</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="delete_subuser_modal_form" method="POST">
                {{csrf_field()}}
                {{method_field('DELETE')}}

                <div class="modal-body">
                    <input type="hidden" id="delete_subuser_name">
                    <h6>Are you sure ? you want to delete this User ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Yes, DELETE</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>

                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete SUBUSER Modal END-->

<!-- Designation Table -->
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">
                    Designations
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleModal">ADD</button>
                </h4>

            </div>
            <div class="card-body text-center">
                <div class="table-responsive">
                    <table id="designationtable" class="table">
                        <thead class=" text-primary">
                            <th style="display: none;">ID</th>
                            <th>Designation</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </thead>
                        <tbody>
                            @foreach ($designation as $data)
                            <tr>
                                <td style="display:none;">{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>
                                    <a href=" {{ url('edit-designation/'.$data->id) }} "
                                        class='btn btn-success'>EDIT</a>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" class='btn btn-danger deletedesignationbtn'>DELETE</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Designation Table END -->

<!-- SubUser Table -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Sub Users
                    <button type="button" class="btn btn-primary " data-toggle="modal"
                        data-target="#subuserModal">ADD</button>
                </h4>
            </div>
            <div class="card-body text-center">
                <div class="table-responsive">
                    <table id="subusertable" class="table">
                        <thead class=" text-primary">
                            <th style="display: none;">ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            {{-- <th style="display: none;">Password</th> --}}
                            <th>Designation</th>
                            <th>Reports To</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </thead>
                        <tbody>
                            @foreach ($subuser as $data)
                            <tr>
                                <td style="display: none;">{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->phone }}</td>
                                {{-- <td style="display: none;">{{ $data->password }}</td> --}}
                                <td>{{ $data->designation->name }}</td>
                                <td>{{ $data->reports_to }}</td>

                                    <td>
                                        <a href=" {{ url('edit-subuser/'.$data->id) }} "
                                            class='btn btn-success'>EDIT</a>
                                    </td>

                                    <td>
                                        <a href="javascript:void(0)" class='btn btn-danger deletesubuserbtn'>DELETE</a>
                                    </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SubUser Table END -->

@endsection

@section('script')

    <script>
        $(document).ready( function () {
            $('#designationtable').DataTable();


            $('#designationtable').on('click','.deletedesignationbtn', function () {
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                $('#delete_designation_name').val(data[0]);

                $('#delete_designation_modal_form').attr('action','/delete-designation/'+data[0]);

                $('#deletedesignationmodal').modal('show');
            });

        });
    </script>
    <script>
        $(document).ready( function () {

            $('#subusertable').DataTable();


            $('#subusertable').on('click','.deletesubuserbtn', function () {
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                $('#delete_subuser_name').val(data[0]);

                $('#delete_subuser_modal_form').attr('action','/delete-subuser/'+data[0]);

                $('#deletesubusermodal').modal('show');
            });
        });
    </script>
@endsection
