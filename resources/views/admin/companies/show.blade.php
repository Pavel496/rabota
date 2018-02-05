@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.companies.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.companies.fields.name')</th>
                            <td field-key='name'>{{ $company->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.companies.fields.describition')</th>
                            <td field-key='describition'>{!! $company->describition !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.companies.fields.sphere')</th>
                            <td field-key='sphere'>
                                @foreach ($company->sphere as $singleSphere)
                                    <span class="label label-info label-many">{{ $singleSphere->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('global.companies.fields.address')</th>
                            <td field-key='address'>{{ $company->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.companies.fields.site')</th>
                            <td field-key='site'>{{ $company->site }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.companies.fields.phone')</th>
                            <td field-key='phone'>{{ $company->phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.companies.fields.contacts')</th>
                            <td field-key='contacts'>{{ $company->contacts }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.companies.fields.rating')</th>
                            <td field-key='rating'>{{ $company->rating }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.companies.fields.moder-checking')</th>
                            <td field-key='moder_checking'>{{ $company->moder_checking }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.companies.fields.created-by')</th>
                            <td field-key='created_by'>{{ $company->created_by->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.companies.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
