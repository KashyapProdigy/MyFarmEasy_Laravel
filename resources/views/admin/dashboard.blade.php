@extends('layouts.master')

@section('title')
Dashboard | FarmingEasy
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header text-center">
                <h4 class="card-title"> Dashboard - Farm Easy </h4>
            </div>
            <div class="card-body">
                <div class="card text-center " style="width: 25rem;">
                    <div class="card-body">
                      <h5 class="card-title">My Accounts</h5>
                      <p class="card-text">Used / Total Accounts</p>
                      <a href="#" class="btn btn-primary">Manage</a>
                    </div>
                </div>
                <div class="card text-center " style="width: 25rem;">
                    <div class="card-body">
                      <h5 class="card-title">Salary</h5>
                      <p class="card-text">Check Transactional Wages</p>
                      <a href="#" class="btn btn-primary">Manage</a>
                    </div>
                </div>
                <div class="card text-center " style="width: 25rem;">
                    <div class="card-body">
                      <h5 class="card-title">Activities</h5>
                      <p class="card-text">Check & Manage Activies </p>
                      <a href="#" class="btn btn-primary">Manage</a>
                    </div>
                </div>
                <div class="card text-center " style="width: 25rem;">
                    <div class="card-body">
                      <h5 class="card-title">Notifications</h5>
                      <p class="card-text">Check & Manage Notifications </p>
                      <a href="#" class="btn btn-primary">Manage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')

@endsection
