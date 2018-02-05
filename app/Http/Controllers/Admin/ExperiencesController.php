<?php

namespace App\Http\Controllers\Admin;

use App\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreExperiencesRequest;
use App\Http\Requests\Admin\UpdateExperiencesRequest;

class ExperiencesController extends Controller
{
    /**
     * Display a listing of Experience.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('experience_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('experience_delete')) {
                return abort(401);
            }
            $experiences = Experience::onlyTrashed()->get();
        } else {
            $experiences = Experience::all();
        }

        return view('admin.experiences.index', compact('experiences'));
    }

    /**
     * Show the form for creating new Experience.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('experience_create')) {
            return abort(401);
        }
        return view('admin.experiences.create');
    }

    /**
     * Store a newly created Experience in storage.
     *
     * @param  \App\Http\Requests\StoreExperiencesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExperiencesRequest $request)
    {
        if (! Gate::allows('experience_create')) {
            return abort(401);
        }
        $experience = Experience::create($request->all());



        return redirect()->route('admin.experiences.index');
    }


    /**
     * Show the form for editing Experience.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('experience_edit')) {
            return abort(401);
        }
        $experience = Experience::findOrFail($id);

        return view('admin.experiences.edit', compact('experience'));
    }

    /**
     * Update Experience in storage.
     *
     * @param  \App\Http\Requests\UpdateExperiencesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExperiencesRequest $request, $id)
    {
        if (! Gate::allows('experience_edit')) {
            return abort(401);
        }
        $experience = Experience::findOrFail($id);
        $experience->update($request->all());



        return redirect()->route('admin.experiences.index');
    }


    /**
     * Display Experience.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('experience_view')) {
            return abort(401);
        }
        $vacancies = \App\Vacancy::where('experience_id', $id)->get();$resumes = \App\Resume::where('experience_id', $id)->get();

        $experience = Experience::findOrFail($id);

        return view('admin.experiences.show', compact('experience', 'vacancies', 'resumes'));
    }


    /**
     * Remove Experience from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('experience_delete')) {
            return abort(401);
        }
        $experience = Experience::findOrFail($id);
        $experience->delete();

        return redirect()->route('admin.experiences.index');
    }

    /**
     * Delete all selected Experience at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('experience_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Experience::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Experience from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('experience_delete')) {
            return abort(401);
        }
        $experience = Experience::onlyTrashed()->findOrFail($id);
        $experience->restore();

        return redirect()->route('admin.experiences.index');
    }

    /**
     * Permanently delete Experience from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('experience_delete')) {
            return abort(401);
        }
        $experience = Experience::onlyTrashed()->findOrFail($id);
        $experience->forceDelete();

        return redirect()->route('admin.experiences.index');
    }
}
