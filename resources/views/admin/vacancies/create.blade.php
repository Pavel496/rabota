@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.vacancies.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.vacancies.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('global.vacancies.fields.title').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('sphere_id', trans('global.vacancies.fields.sphere-id').'', ['class' => 'control-label']) !!}
                    {!! Form::select('sphere_id[]', $sphere_ids, old('sphere_id'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('sphere_id'))
                        <p class="help-block">
                            {{ $errors->first('sphere_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('text', trans('global.vacancies.fields.text').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('text', old('text'), ['class' => 'form-control editor', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('text'))
                        <p class="help-block">
                            {{ $errors->first('text') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('wage', trans('global.vacancies.fields.wage').'', ['class' => 'control-label']) !!}
                    {!! Form::text('wage', old('wage'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('wage'))
                        <p class="help-block">
                            {{ $errors->first('wage') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('company_address', trans('global.vacancies.fields.company-address').'', ['class' => 'control-label']) !!}
                    {!! Form::text('company_address', old('company_address'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('company_address'))
                        <p class="help-block">
                            {{ $errors->first('company_address') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('schedule_id', trans('global.vacancies.fields.schedule-id').'', ['class' => 'control-label']) !!}
                    {!! Form::select('schedule_id[]', $schedule_ids, old('schedule_id'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('schedule_id'))
                        <p class="help-block">
                            {{ $errors->first('schedule_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('experience_id', trans('global.vacancies.fields.experience').'', ['class' => 'control-label']) !!}
                    {!! Form::select('experience_id', $experiences, old('experience_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('experience_id'))
                        <p class="help-block">
                            {{ $errors->first('experience_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('lasting_id', trans('global.vacancies.fields.lasting').'', ['class' => 'control-label']) !!}
                    {!! Form::select('lasting_id', $lastings, old('lasting_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lasting_id'))
                        <p class="help-block">
                            {{ $errors->first('lasting_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('logotype', trans('global.vacancies.fields.logotype').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('logotype', old('logotype')) !!}
                    {!! Form::file('logotype', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('logotype_max_size', 2) !!}
                    {!! Form::hidden('logotype_max_width', 1000) !!}
                    {!! Form::hidden('logotype_max_height', 1000) !!}
                    <p class="help-block"></p>
                    @if($errors->has('logotype'))
                        <p class="help-block">
                            {{ $errors->first('logotype') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('phone_id', trans('global.vacancies.fields.phone').'', ['class' => 'control-label']) !!}
                    {!! Form::select('phone_id', $phones, old('phone_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block">Ссылка</p>
                    @if($errors->has('phone_id'))
                        <p class="help-block">
                            {{ $errors->first('phone_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('phone_temp', trans('global.vacancies.fields.phone-temp').'', ['class' => 'control-label']) !!}
                    {!! Form::text('phone_temp', old('phone_temp'), ['class' => 'form-control', 'placeholder' => 'Значение']) !!}
                    <p class="help-block">Значение</p>
                    @if($errors->has('phone_temp'))
                        <p class="help-block">
                            {{ $errors->first('phone_temp') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('to_delete_at', trans('global.vacancies.fields.to-delete-at').'', ['class' => 'control-label']) !!}
                    {!! Form::text('to_delete_at', old('to_delete_at'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('to_delete_at'))
                        <p class="help-block">
                            {{ $errors->first('to_delete_at') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
    <script>
        $('.editor').each(function () {
                  CKEDITOR.replace($(this).attr('id'),{
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        });
    </script>
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}"
        });
    </script>

@stop