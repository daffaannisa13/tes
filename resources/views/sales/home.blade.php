@extends('layouts.main')

@section('title', 'Dashboard - KelasMaju')

@section('content-header')
<h1>Dashboard</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item">Dashboard</div>
</div>
@endsection

@section('content-body')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fa-solid fa-user fa-xl" style="color: #ffffff;"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Customer</h4>
                </div>
                <div class="card-body">
                    {{$total_customer}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection