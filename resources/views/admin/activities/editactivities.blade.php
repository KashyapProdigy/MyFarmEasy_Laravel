@extends('layouts.master')

@section('title')
Activities Edit
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center">Activities Edit </h4>

                <form action="{{ url('/update-activities/'.$activities->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title :</label>
                            <input type="text" name="title" class="form-control" value="{{ $activities->title }}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Description :</label>
                            <textarea name="description" class="form-control">{{ $activities->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Activity Date :</label>
                            <input type="date" name="act_date" class="form-control"  value="{{ $activities->act_date }}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Activity Time :</label>
                            <input type="time" name="act_time" class="form-control" value="{{ $activities->act_time }}">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Image :</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="image" >
                                <label class="custom-file-label" for="image">{{ $activities->image }}</label>
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Activity From :</label>
                            <select name="act_by" id="" class="form-control" required>
                                <option value="{{ $activities->act_by }}"> {{ $activities->act_by }} </option>
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
                                <option value="{{ $activities->act_to }}"> {{ $activities->act_to }}</option>
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
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                        <a href="{{ url('activities') }}" type="button" class="btn btn-secondary">BACK</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')

@endsection
