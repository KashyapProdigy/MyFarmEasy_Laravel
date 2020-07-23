@extends('layouts.master')

@section('title')
Activities | FarmingEasy
@endsection


@section('content')

<!-- Add Acitivies Modal -->
<div class="modal fade" id="activitiesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="activitiesModalLabel">Add New Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/save-activities') }}" method="POST" enctype="multipart/form-data" >
                {{ csrf_field() }}

                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Title :</label>
                        <input type="text" name="title" class="form-control" id="recipient-name" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Description :</label>
                        <textarea name="description" class="form-control" id="recipient-name" placeholder="Enter Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Activity Date :</label>
                        <input type="date" name="act_date" class="form-control" id="recipient-name" >
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Activity Time :</label>
                        <input type="time" name="act_time" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Image :</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="image">
                            <label class="custom-file-label" for="#image">Choose file</label>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Activity From :</label>
                        <select name="act_by" id="" class="form-control" required>
                            <option value=""> From User </option>
                            @foreach ($user as $item)
                                <option value="{{ $item->name }}"> {{ $item->name }} </option>
                            @endforeach
                            @foreach ($subuser as $item)
                                <option value=" {{ $item->name }}  "> {{ $item->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Activity To :</label>
                        <select name="act_to" id="" class="form-control" required>
                            <option value=""> To User </option>
                            @foreach ($user as $item)
                                <option value="{{ $item->name }}"> {{ $item->name }} </option>
                            @endforeach
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
<!-- Add Acitivies Modal END -->

<!-- Delete activities Modal -->
<div class="modal fade" id="deleteactivitiesmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"> Delete Activity</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="delete_activities_modal_form" method="POST">
                {{csrf_field()}}
                {{method_field('DELETE')}}

                <div class="modal-body">
                    <input type="hidden" id="delete_activities_name">
                    <h6>Are you sure ? you want to delete this Activity ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Yes, DELETE</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>

                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete activities Modal END-->


<!-- Acitivies Table -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Activities
                    <button type="button" class="btn btn-primary " data-toggle="modal"
                        data-target="#activitiesModal">ADD</button>
                </h4>
            </div>
            <div class="card-body text-center">
                <div class="table-responsive">
                    <table class="table" id="activitiestable">
                        <thead class=" text-primary">
                            <th style="display: none;">Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Image</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </thead>
                        <tbody>
                            @foreach ($activities as $data)


                            <tr>
                                <td style="display: none;">{{ $data->id }}</td>
                                <td>{{ $data->title }} </td>
                                <td>{{ $data->description }}</td>
                                <td>{{ $data->act_date }}</td>
                                <td>{{ $data->act_time }}</td>
                                <td>{{ $data->act_by }}</td>
                                <td>{{ $data->act_to }}</td>
                                <td><img src="{{ asset('uploads/activities/' . $data->image ) }}" width="100px" height="100px" alt="Image" ></td>
                                <td>
                                    <a href=" {{ url('edit-activities/'.$data->id) }} "
                                        class='btn btn-success'>EDIT</a>
                                </td>

                                <td>
                                    <a href="javascript:void(0)" class='btn btn-danger deleteactivitiesbtn'>DELETE</a>
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
<!-- Acitivies Table END -->

@endsection


@section('script')


<script>
    $(document).ready( function () {

        $('#activitiestable').DataTable();


        $('#activitiestable').on('click','.deleteactivitiesbtn', function () {
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            $('#delete_activities_name').val(data[0]);

            $('#delete_activities_modal_form').attr('action','/delete-activities/'+data[0]);

            $('#deleteactivitiesmodal').modal('show');
        });
    });
</script>


@endsection
