<?php

namespace App\Http\Controllers\Admin;

use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVacanciesRequest;
use App\Http\Requests\Admin\UpdateVacanciesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class VacanciesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Vacancy.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('vacancy_access')) {
            return abort(401);
        }
        if ($filterBy = Input::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('Vacancy.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('Vacancy.filter', 'my');
            }
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('vacancy_delete')) {
                return abort(401);
            }
            $vacancies = Vacancy::onlyTrashed()->get();
        } else {
            $vacancies = Vacancy::all();
        }

        return view('admin.vacancies.index', compact('vacancies'));
    }

    /**
     * Show the form for creating new Vacancy.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('vacancy_create')) {
            return abort(401);
        }
        
        $sphere_ids = \App\Sphere::get()->pluck('title', 'id');

        $schedule_ids = \App\Schedule::get()->pluck('title', 'id');

        $experiences = \App\Experience::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $lastings = \App\Lasting::get()->pluck('lasting', 'id')->prepend(trans('global.app_please_select'), '');
        $phones = \App\Phone::get()->pluck('phone', 'id')->prepend(trans('global.app_please_select'), '');
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.vacancies.create', compact('sphere_ids', 'schedule_ids', 'experiences', 'lastings', 'phones', 'created_bies'));
    }

    /**
     * Store a newly created Vacancy in storage.
     *
     * @param  \App\Http\Requests\StoreVacanciesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVacanciesRequest $request)
    {
        if (! Gate::allows('vacancy_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $vacancy = Vacancy::create($request->all());
        $vacancy->sphere_id()->sync(array_filter((array)$request->input('sphere_id')));
        $vacancy->schedule_id()->sync(array_filter((array)$request->input('schedule_id')));



        return redirect()->route('admin.vacancies.index');
    }


    /**
     * Show the form for editing Vacancy.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('vacancy_edit')) {
            return abort(401);
        }
        
        $sphere_ids = \App\Sphere::get()->pluck('title', 'id');

        $schedule_ids = \App\Schedule::get()->pluck('title', 'id');

        $experiences = \App\Experience::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $lastings = \App\Lasting::get()->pluck('lasting', 'id')->prepend(trans('global.app_please_select'), '');
        $phones = \App\Phone::get()->pluck('phone', 'id')->prepend(trans('global.app_please_select'), '');
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $vacancy = Vacancy::findOrFail($id);

        return view('admin.vacancies.edit', compact('vacancy', 'sphere_ids', 'schedule_ids', 'experiences', 'lastings', 'phones', 'created_bies'));
    }

    /**
     * Update Vacancy in storage.
     *
     * @param  \App\Http\Requests\UpdateVacanciesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVacanciesRequest $request, $id)
    {
        if (! Gate::allows('vacancy_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->update($request->all());
        $vacancy->sphere_id()->sync(array_filter((array)$request->input('sphere_id')));
        $vacancy->schedule_id()->sync(array_filter((array)$request->input('schedule_id')));



        return redirect()->route('admin.vacancies.index');
    }


    /**
     * Display Vacancy.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('vacancy_view')) {
            return abort(401);
        }
        $vacancy = Vacancy::findOrFail($id);

        return view('admin.vacancies.show', compact('vacancy'));
    }


    /**
     * Remove Vacancy from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('vacancy_delete')) {
            return abort(401);
        }
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->delete();

        return redirect()->route('admin.vacancies.index');
    }

    /**
     * Delete all selected Vacancy at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('vacancy_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Vacancy::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Vacancy from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('vacancy_delete')) {
            return abort(401);
        }
        $vacancy = Vacancy::onlyTrashed()->findOrFail($id);
        $vacancy->restore();

        return redirect()->route('admin.vacancies.index');
    }

    /**
     * Permanently delete Vacancy from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('vacancy_delete')) {
            return abort(401);
        }
        $vacancy = Vacancy::onlyTrashed()->findOrFail($id);
        $vacancy->forceDelete();

        return redirect()->route('admin.vacancies.index');
    }
}
