@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.vacancies.title')</h3>
    @can('vacancy_create')
    <p>
        <a href="{{ route('admin.vacancies.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
        @if(!is_null(Auth::getUser()->role_id) && config('global.can_see_all_records_role_id') == Auth::getUser()->role_id)
            @if(Session::get('Vacancy.filter', 'all') == 'my')
                <a href="?filter=all" class="btn btn-default">Show all records</a>
            @else
                <a href="?filter=my" class="btn btn-default">Filter my records</a>
            @endif
        @endif
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.vacancies.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.vacancies.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($vacancies) > 0 ? 'datatable' : '' }} @can('vacancy_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('vacancy_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

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
                                @can('vacancy_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

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
    </div>
@stop

@section('javascript') 
    <script>
        @can('vacancy_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.vacancies.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection