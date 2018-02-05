@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.companies.title')</h3>
    @can('company_create')
    <p>
        <a href="{{ route('admin.companies.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
        @if(!is_null(Auth::getUser()->role_id) && config('global.can_see_all_records_role_id') == Auth::getUser()->role_id)
            @if(Session::get('Company.filter', 'all') == 'my')
                <a href="?filter=all" class="btn btn-default">Show all records</a>
            @else
                <a href="?filter=my" class="btn btn-default">Filter my records</a>
            @endif
        @endif
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.companies.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.companies.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($companies) > 0 ? 'datatable' : '' }} @can('company_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('company_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

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
                                @can('company_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

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
                                        'route' => ['admin.companies.restore', $company->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.companies.perma_del', $company->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('company_view')
                                    <a href="{{ route('admin.companies.show',[$company->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('company_edit')
                                    <a href="{{ route('admin.companies.edit',[$company->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('company_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.companies.destroy', $company->id])) !!}
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
    </div>
@stop

@section('javascript') 
    <script>
        @can('company_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.companies.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection