@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
        {{trans('main_trans.list_Promotions')}}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{trans('main_trans.list_students')}}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">

                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#Delete_all">
                                    {{trans('Students_trans.Everyone_backed_down')}}                                </button>
                                <br><br>


                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">{{trans('Students_trans.name')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.Previous_Grade')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.Previous_Academic_year')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.Previous_classrooms')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.Previous_section')}}</th>
                                            <th class="alert-success">{{trans('Students_trans.Current_Grade')}}</th>
                                            <th class="alert-success">{{trans('Students_trans.Current_Academic_year')}}</th>
                                            <th class="alert-success">{{trans('Students_trans.Current_classrooms')}}</th>
                                            <th class="alert-success">{{trans('Students_trans.Current_section')}}</th>
                                            <th>{{trans('Students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$promotion->student->name}}</td>
                                                <td>{{$promotion->f_grade->Name}}</td>
                                                <td>{{$promotion->academic_year}}</td>
                                                <td>{{$promotion->f_classroom->Name_Class}}</td>
                                                <td>{{$promotion->f_section->Name_Section}}</td>
                                                <td>{{$promotion->t_grade->Name}}</td>
                                                <td>{{$promotion->academic_year_new}}</td>
                                                <td>{{$promotion->t_classroom->Name_Class}}</td>
                                                <td>{{$promotion->t_section->Name_Section}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-danger"
                                                            data-toggle="modal"
                                                            data-target="#Delete_one{{$promotion->id}}">ارجاع الطالب
                                                    </button>

                                                    <button type="button" class="btn btn-outline-success"
                                                            data-toggle="modal" data-target="#">تخرج الطالب
                                                    </button>
                                                </td>
                                            </tr>
                                        @include('pages.Students.promotion.Delete_all')
                                        @include('pages.Students.promotion.Delete_one')
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
