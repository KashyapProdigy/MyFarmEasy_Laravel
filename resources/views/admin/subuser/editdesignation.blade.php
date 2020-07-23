@extends('layouts.master')

@section('title')
Designation Edit
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Designation Edit </h4>

                <form action="{{ url('update-designation/'.$currentdesignation->id) }}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Designation Name :</label>
                            <input type="text" name="designation_name" class="form-control" value = {{ $currentdesignation->name }}>
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
