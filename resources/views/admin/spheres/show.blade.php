@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.spheres.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.spheres.fields.title')</th>
                            <td field-key='title'>{{ $sphere->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.spheres.fields.slug')</th>
                            <td field-key='slug'>{{ $sphere->slug }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#vacancies" aria-controls="vacancies" role="tab" data-toggle="tab">Вакансии</a></li>
<li role="presentation" class=""><a href="#resume" aria-controls="resume" role="tab" data-toggle="tab">Резюме</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="vacancies">
<table class="table table-bordered table-striped {{ count($vacancies) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.vacancies.fields.title')</th>
                        <th>@lang('global.vacancies.fields.sphere-id')</th>
                        <th>@lang('global.vacancies.fields.text')</th>
                        <th>@lang('global.vacancies.fields.wage')</th>
                        <th>@lang('global.vacancies.fields.company-address')</th>
                        <th>@lang('global.vacancies.fields.schedule-id')</th>
                        <th>@lang('global.vacancies.fields.experience')</th>
                        <th>@lang('global.vacancies.fields.lasting')</th>
                        <th>@lang('global.vacancies.fields.logotype')</th>
                        <th>@lang('global.vacancies.fields.phone')</th>
                        <th>@lang('global.vacancies.fields.phone-temp')</th>
                        <th>@lang('global.vacancies.fields.created-by')</th>
                        <th>@lang('global.vacancies.fields.to-delete-at')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($vacancies) > 0)
            @foreach ($vacancies as $vacancy)
                <tr data-entry-id="{{ $vacancy->id }}">
                    <td field-key='title'>{{ $vacancy->title }}</td>
                                <td field-key='sphere_id'>
                                    @foreach ($vacancy->sphere_id as $singleSphereId)
                                        <span class="label label-info label-many">{{ $singleSphereId->title }}</span>
                                    @endforeach
                                </td>
                                <td field-key='text'>{!! $vacancy->text !!}</td>
                                <td field-key='wage'>{{ $vacancy->wage }}</td>
                                <td field-key='company_address'>{{ $vacancy->company_address }}</td>
                                <td field-key='schedule_id'>
                                    @foreach ($vacancy->schedule_id as $singleScheduleId)
                                        <span class="label label-info label-many">{{ $singleScheduleId->title }}</span>
                                    @endforeach
                                </td>
                                <td field-key='experience'>{{ $vacancy->experience->title or '' }}</td>
                                <td field-key='lasting'>{{ $vacancy->lasting->lasting or '' }}</td>
                                <td field-key='logotype'>@if($vacancy->logotype)<a href="{{ asset(env('UPLOAD_PATH').'/' . $vacancy->logotype) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $vacancy->logotype) }}"/></a>@endif</td>
                                <td field-key='phone'>{{ $vacancy->phone->phone or '' }}</td>
                                <td field-key='phone_temp'>{{ $vacancy->phone_temp }}</td>
                                <td field-key='created_by'>{{ $vacancy->created_by->name or '' }}</td>
                                <td field-key='to_delete_at'>{{ $vacancy->to_delete_at }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.vacancies.restore', $vacancy->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.vacancies.perma_del', $vacancy->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('vacancy_view')
                                    <a href="{{ route('admin.vacancies.show',[$vacancy->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('vacancy_edit')
                                    <a href="{{ route('admin.vacancies.edit',[$vacancy->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('vacancy_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.vacancies.destroy', $vacancy->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="18">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="resume">
<table class="table table-bordered table-striped {{ count($resumes) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.resume.fields.title')</th>
                        <th>@lang('global.resume.fields.sphere-id')</th>
                        <th>@lang('global.resume.fields.text')</th>
                        <th>@lang('global.resume.fields.wage')</th>
                        <th>@lang('global.resume.fields.company-address')</th>
                        <th>@lang('global.resume.fields.schedule-id')</th>
                        <th>@lang('global.resume.fields.experience')</th>
                        <th>@lang('global.resume.fields.lasting')</th>
                        <th>@lang('global.resume.fields.avatar')</th>
                        <th>@lang('global.resume.fields.phone')</th>
                        <th>@lang('global.resume.fields.phone-temp')</th>
                        <th>@lang('global.resume.fields.created-by')</th>
                        <th>@lang('global.resume.fields.to-delete-at')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($resumes) > 0)
            @foreach ($resumes as $resume)
                <tr data-entry-id="{{ $resume->id }}">
                    <td field-key='title'>{{ $resume->title }}</td>
                                <td field-key='sphere_id'>
                                    @foreach ($resume->sphere_id as $singleSphereId)
                                        <span class="label label-info label-many">{{ $singleSphereId->title }}</span>
                                    @endforeach
                                </td>
                                <td field-key='text'>{!! $resume->text !!}</td>
                                <td field-key='wage'>{{ $resume->wage }}</td>
                                <td field-key='company_address'>{{ $resume->company_address }}</td>
                                <td field-key='schedule_id'>
                                    @foreach ($resume->schedule_id as $singleScheduleId)
                                        <span class="label label-info label-many">{{ $singleScheduleId->title }}</span>
                                    @endforeach
                                </td>
                                <td field-key='experience'>{{ $resume->experience->title or '' }}</td>
                                <td field-key='lasting'>{{ $resume->lasting->lasting or '' }}</td>
                                <td field-key='avatar'>@if($resume->avatar)<a href="{{ asset(env('UPLOAD_PATH').'/' . $resume->avatar) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $resume->avatar) }}"/></a>@endif</td>
                                <td field-key='phone'>{{ $resume->phone->phone or '' }}</td>
                                <td field-key='phone_temp'>{{ $resume->phone_temp }}</td>
                                <td field-key='created_by'>{{ $resume->created_by->name or '' }}</td>
                                <td field-key='to_delete_at'>{{ $resume->to_delete_at }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.resumes.restore', $resume->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.resumes.perma_del', $resume->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('resume_view')
                                    <a href="{{ route('admin.resumes.show',[$resume->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('resume_edit')
                                    <a href="{{ route('admin.resumes.edit',[$resume->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('resume_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.resumes.destroy', $resume->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="18">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.spheres.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
