@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
        {{ trans('grades_trans.title_page') }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{__('main_trans.Grades')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"
                                                   class="default-color">{{__('main_trans.Dashboard')}}</a>
                    </li>
                    <li class="breadcrumb-item active">{{__('main_trans.Grades_list')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- main body -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('grades_trans.add_Grade') }}
                    </button>
                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('grades_trans.Name')}}</th>
                                <th>{{__('grades_trans.Notes')}}</th>
                                <th>{{__('grades_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($Grades as $Grade)
                                <?php $i++; ?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$Grade->Name}}</td>
                                    <td>{{$Grade->Notes}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $Grade->id }}"
                                                title="{{ trans('grades_trans.Edit') }}"><i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $Grade->id }}"
                                                title="{{ trans('grades_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $Grade->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('grades_trans.edit_Grade') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- add_form -->
                                                <form action="{{ route('Grades.update', 'test') }}" method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                   class="mr-sm-2">{{ trans('grades_trans.stage_name_ar') }}
                                                                :</label>
                                                            <input id="Name" type="text" name="Name"
                                                                   class="form-control"
                                                                   value="{{ $Grade->getTranslation('Name', 'ar') }}"
                                                                   required>
                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value="{{ $Grade->id }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                   class="mr-sm-2">{{ trans('grades_trans.stage_name_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                   value="{{ $Grade->getTranslation('Name', 'en') }}"
                                                                   name="Name_en" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('grades_trans.Notes') }}
                                                            :</label>
                                                        <textarea class="form-control" name="Notes"
                                                                  id="exampleFormControlTextarea1"
                                                                  rows="3">{{ $Grade->Notes }}</textarea>
                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('grades_trans.Close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-success">{{ trans('grades_trans.submit') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End add_form -->

                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $Grade->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('grades_trans.delete_Grade') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('Grades.destroy', 'test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    {{ trans('grades_trans.Warning_Grade') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $Grade->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('grades_trans.Close') }}</button>
                                                        <button type="submit"
                                                                class="btn btn-danger">{{ trans('grades_trans.Delete') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- add_modal_Grade -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            {{ trans('grades_trans.add_Grade') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('Grades.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="Name" class="mr-sm-2">{{ trans('grades_trans.stage_name_ar') }}
                                        :</label>
                                    <input id="Name" type="text" name="Name" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="Name_en" class="mr-sm-2">{{ trans('grades_trans.stage_name_en') }}
                                        :</label>
                                    <input type="text" class="form-control" name="Name_en">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ trans('grades_trans.Notes') }}
                                    :</label>
                                <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                          rows="3"></textarea>
                            </div>
                            <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ trans('grades_trans.Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('grades_trans.submit') }}</button>
                    </div>
                    </form>

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
