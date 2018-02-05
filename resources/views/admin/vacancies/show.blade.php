@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.vacancies.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.vacancies.fields.title')</th>
                            <td field-key='title'>{{ $vacancy->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.vacancies.fields.sphere-id')</th>
                            <td field-key='sphere_id'>
                                @foreach ($vacancy->sphere_id as $singleSphereId)
                                    <span class="label label-info label-many">{{ $singleSphereId->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('global.vacancies.fields.text')</th>
                            <td field-key='text'>{!! $vacancy->text !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.vacancies.fields.wage')</th>
                            <td field-key='wage'>{{ $vacancy->wage }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.vacancies.fields.company-address')</th>
                            <td field-key='company_address'>{{ $vacancy->company_address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.vacancies.fields.schedule-id')</th>
                            <td field-key='schedule_id'>
                                @foreach ($vacancy->schedule_id as $singleScheduleId)
                                    <span class="label label-info label-many">{{ $singleScheduleId->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('global.vacancies.fields.experience')</th>
                            <td field-key='experience'>{{ $vacancy->experience->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.vacancies.fields.lasting')</th>
                            <td field-key='lasting'>{{ $vacancy->lasting->lasting or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.vacancies.fields.logotype')</th>
                            <td field-key='logotype'>@if($vacancy->logotype)<a href="{{ asset(env('UPLOAD_PATH').'/' . $vacancy->logotype) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $vacancy->logotype) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('global.vacancies.fields.phone')</th>
                            <td field-key='phone'>{{ $vacancy->phone->phone or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.vacancies.fields.phone-temp')</th>
                            <td field-key='phone_temp'>{{ $vacancy->phone_temp }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.vacancies.fields.created-by')</th>
                            <td field-key='created_by'>{{ $vacancy->created_by->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.vacancies.fields.to-delete-at')</th>
                            <td field-key='to_delete_at'>{{ $vacancy->to_delete_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.vacancies.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
