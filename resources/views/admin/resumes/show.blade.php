@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.resume.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.resume.fields.title')</th>
                            <td field-key='title'>{{ $resume->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resume.fields.sphere-id')</th>
                            <td field-key='sphere_id'>
                                @foreach ($resume->sphere_id as $singleSphereId)
                                    <span class="label label-info label-many">{{ $singleSphereId->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('global.resume.fields.text')</th>
                            <td field-key='text'>{!! $resume->text !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resume.fields.wage')</th>
                            <td field-key='wage'>{{ $resume->wage }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resume.fields.company-address')</th>
                            <td field-key='company_address'>{{ $resume->company_address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resume.fields.schedule-id')</th>
                            <td field-key='schedule_id'>
                                @foreach ($resume->schedule_id as $singleScheduleId)
                                    <span class="label label-info label-many">{{ $singleScheduleId->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('global.resume.fields.experience')</th>
                            <td field-key='experience'>{{ $resume->experience->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resume.fields.lasting')</th>
                            <td field-key='lasting'>{{ $resume->lasting->lasting or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resume.fields.avatar')</th>
                            <td field-key='avatar'>@if($resume->avatar)<a href="{{ asset(env('UPLOAD_PATH').'/' . $resume->avatar) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $resume->avatar) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resume.fields.phone')</th>
                            <td field-key='phone'>{{ $resume->phone->phone or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resume.fields.phone-temp')</th>
                            <td field-key='phone_temp'>{{ $resume->phone_temp }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resume.fields.created-by')</th>
                            <td field-key='created_by'>{{ $resume->created_by->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.resume.fields.to-delete-at')</th>
                            <td field-key='to_delete_at'>{{ $resume->to_delete_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.resumes.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
