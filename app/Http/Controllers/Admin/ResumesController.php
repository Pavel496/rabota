<?php

namespace App\Http\Controllers\Admin;

use App\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreResumesRequest;
use App\Http\Requests\Admin\UpdateResumesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class ResumesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Resume.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('resume_access')) {
            return abort(401);
        }
        if ($filterBy = Input::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('Resume.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('Resume.filter', 'my');
            }
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('resume_delete')) {
                return abort(401);
            }
            $resumes = Resume::onlyTrashed()->get();
        } else {
            $resumes = Resume::all();
        }

        return view('admin.resumes.index', compact('resumes'));
    }

    /**
     * Show the form for creating new Resume.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('resume_create')) {
            return abort(401);
        }
        
        $sphere_ids = \App\Sphere::get()->pluck('title', 'id');

        $schedule_ids = \App\Schedule::get()->pluck('title', 'id');

        $experiences = \App\Experience::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $lastings = \App\Lasting::get()->pluck('lasting', 'id')->prepend(trans('global.app_please_select'), '');
        $phones = \App\Phone::get()->pluck('phone', 'id')->prepend(trans('global.app_please_select'), '');
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.resumes.create', compact('sphere_ids', 'schedule_ids', 'experiences', 'lastings', 'phones', 'created_bies'));
    }

    /**
     * Store a newly created Resume in storage.
     *
     * @param  \App\Http\Requests\StoreResumesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResumesRequest $request)
    {
        if (! Gate::allows('resume_create')) {
            return abort(401);
        }
      

        $request = $this->saveFiles($request);
        
        
        $resume = Resume::create($request->all());

        $resume->sphere_id()->sync(array_filter((array)$request->input('sphere_id')));
        $resume->schedule_id()->sync(array_filter((array)$request->input('schedule_id')));



        return redirect()->route('admin.resumes.index');
    }


    /**
     * Show the form for editing Resume.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('resume_edit')) {
            return abort(401);
        }
        
        $sphere_ids = \App\Sphere::get()->pluck('title', 'id');

        $schedule_ids = \App\Schedule::get()->pluck('title', 'id');

        $experiences = \App\Experience::get()->pluck('title', 'id')->prepend(trans('global.app_please_select'), '');
        $lastings = \App\Lasting::get()->pluck('lasting', 'id')->prepend(trans('global.app_please_select'), '');
        $phones = \App\Phone::get()->pluck('phone', 'id')->prepend(trans('global.app_please_select'), '');
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $resume = Resume::findOrFail($id);

        return view('admin.resumes.edit', compact('resume', 'sphere_ids', 'schedule_ids', 'experiences', 'lastings', 'phones', 'created_bies'));
    }

    /**
     * Update Resume in storage.
     *
     * @param  \App\Http\Requests\UpdateResumesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResumesRequest $request, $id)
    {
        if (! Gate::allows('resume_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $resume = Resume::findOrFail($id);
        $resume->update($request->all());
        $resume->sphere_id()->sync(array_filter((array)$request->input('sphere_id')));
        $resume->schedule_id()->sync(array_filter((array)$request->input('schedule_id')));



        return redirect()->route('admin.resumes.index');
    }


    /**
     * Display Resume.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('resume_view')) {
            return abort(401);
        }
        $resume = Resume::findOrFail($id);

        return view('admin.resumes.show', compact('resume'));
    }


    /**
     * Remove Resume from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('resume_delete')) {
            return abort(401);
        }
        $resume = Resume::findOrFail($id);
        $resume->delete();

        return redirect()->route('admin.resumes.index');
    }

    /**
     * Delete all selected Resume at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('resume_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Resume::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Resume from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('resume_delete')) {
            return abort(401);
        }
        $resume = Resume::onlyTrashed()->findOrFail($id);
        $resume->created_at = Carbon::now();
        $resume->restore();        

        return redirect()->route('admin.resumes.index');
    }

    /**
     * Permanently delete Resume from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('resume_delete')) {
            return abort(401);
        }
        $resume = Resume::onlyTrashed()->findOrFail($id);
        $resume->forceDelete();

        return redirect()->route('admin.resumes.index');
    }
}
