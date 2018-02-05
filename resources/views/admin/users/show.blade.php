@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.users.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.users.fields.name')</th>
                            <td field-key='name'>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.email')</th>
                            <td field-key='email'>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.role')</th>
                            <td field-key='role'>
                                @foreach ($user->role as $singleRole)
                                    <span class="label label-info label-many">{{ $singleRole->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.approved')</th>
                            <td field-key='approved'>{{ Form::checkbox("approved", 1, $user->approved == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#phones" aria-controls="phones" role="tab" data-toggle="tab">Телефоны</a></li>
<li role="presentation" class=""><a href="#companies" aria-controls="companies" role="tab" data-toggle="tab">Организации</a></li>
<li role="presentation" class=""><a href="#vacancies" aria-controls="vacancies" role="tab" data-toggle="tab">Вакансии</a></li>
<li role="presentation" class=""><a href="#resume" aria-controls="resume" role="tab" data-toggle="tab">Резюме</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="phones">
<table class="table table-bordered table-striped {{ count($phones) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.phones.fields.phone')</th>
                        <th>@lang('global.phones.fields.code')</th>
                        <th>@lang('global.phones.fields.status')</th>
                        <th>@lang('global.phones.fields.created-by')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($phones) > 0)
            @foreach ($phones as $phone)
                <tr data-entry-id="{{ $phone->id }}">
                    <td field-key='phone'>{{ $phone->phone }}</td>
                                <td field-key='code'>{{ $phone->code }}</td>
                                <td field-key='status'>{{ Form::checkbox("status", 1, $phone->status == 1 ? true : false, ["disabled"]) }}</td>
                                <td field-key='created_by'>{{ $phone->created_by->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['phones.restore', $phone->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['phones.perma_del', $phone->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('phones.show',[$phone->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('phones.edit',[$phone->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['phones.destroy', $phone->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="companies">
<table class="table table-bordered table-striped {{ count($companies) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.companies.fields.name')</th>
                        <th>@lang('global.companies.fields.describition')</th>
                        <th>@lang('global.companies.fields.sphere')</th>
                        <th>@lang('global.companies.fields.address')</th>
                        <th>@lang('global.companies.fields.site')</th>
                        <th>@lang('global.companies.fields.phone')</th>
                        <th>@lang('global.companies.fields.contacts')</th>
                        <th>@lang('global.companies.fields.rating')</th>
                        <th>@lang('global.companies.fields.moder-checking')</th>
                        <th>@lang('global.companies.fields.created-by')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($companies) > 0)
            @foreach ($companies as $company)
                <tr data-entry-id="{{ $company->id }}">
                    <td field-key='name'>{{ $company->name }}</td>
                                <td field-key='describition'>{!! $company->describition !!}</td>
                                <td field-key='sphere'>
                                    @foreach ($company->sphere as $singleSphere)
                                        <span class="label label-info label-many">{{ $singleSphere->title }}</span>
                                    @endforeach
                                </td>
                                <td field-key='address'>{{ $company->address }}</td>
                                <td field-key='site'>{{ $company->site }}</td>
                                <td field-key='phone'>{{ $company->phone }}</td>
                                <td field-key='contacts'>{{ $company->contacts }}</td>
                                <td field-key='rating'>{{ $company->rating }}</td>
                                <td field-key='moder_checking'>{{ $company->moder_checking }}</td>
                                <td field-key='created_by'>{{ $company->created_by->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['companies.restore', $company->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['companies.perma_del', $company->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('companies.show',[$company->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('companies.edit',[$company->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['companies.destroy', $company->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="15">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="vacancies">
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
                                        'route' => ['vacancies.restore', $vacancy->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['vacancies.perma_del', $vacancy->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('vacancies.show',[$vacancy->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('vacancies.edit',[$vacancy->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['vacancies.destroy', $vacancy->id])) !!}
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
                                        'route' => ['resumes.restore', $resume->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['resumes.perma_del', $resume->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('view')
                                    <a href="{{ route('resumes.show',[$resume->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('resumes.edit',[$resume->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['resumes.destroy', $resume->id])) !!}
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

            <a href="{{ route('admin.users.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
