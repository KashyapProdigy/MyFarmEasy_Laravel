@extends('layouts.master')

@section('title')
Designation Edit
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Subuser Edit </h4>

                <form action="{{ url('/update-subuser/'.$subuser->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name :</label>
                            <input type="text" name="name" class="form-control" value="{{ $subuser->name }}" >
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Phone :</label>
                            <input type="number" name="phone" class="form-control" value="{{ $subuser->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Password :</label>
                            <input type="text" name="password" class="form-control" value="{{ $subuser->password }}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Designation :</label>
                            <select name="designation_id" id="" class="form-control" required>
                                <option value="{{ $subuser->designation_id }}"> {{ $subuser->designation->name }} </option>
                                <option value="">None</option>
                                @foreach ($designation as $data)
                                    <option value="{{ $data->id }}"> {{ $data->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Reports_To :</label>
                            <select name="reports_to" id="" class="form-control" required>
                                <option value={{ $subuser->reports_to }}>  {{$subuser->reports_to}}  </option>
                                <option value="admin">  Admin </option>
                                @foreach ($subuser_list as $data)
                                    <option value=" {{ $data->name }}  "> {{ $data->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                        <a href="{{ url('subuser') }}" type="button" class="btn btn-secondary">BACK</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')

@endsection
