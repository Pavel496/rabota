<?php

namespace App\Http\Controllers\Admin;

use App\Sphere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSpheresRequest;
use App\Http\Requests\Admin\UpdateSpheresRequest;

class SpheresController extends Controller
{
    /**
     * Display a listing of Sphere.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('sphere_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('sphere_delete')) {
                return abort(401);
            }
            $spheres = Sphere::onlyTrashed()->get();
        } else {
            $spheres = Sphere::all();
        }

        return view('admin.spheres.index', compact('spheres'));
    }

    /**
     * Show the form for creating new Sphere.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('sphere_create')) {
            return abort(401);
        }
        return view('admin.spheres.create');
    }

    /**
     * Store a newly created Sphere in storage.
     *
     * @param  \App\Http\Requests\StoreSpheresRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpheresRequest $request)
    {
        if (! Gate::allows('sphere_create')) {
            return abort(401);
        }
        $sphere = Sphere::create($request->all());



        return redirect()->route('admin.spheres.index');
    }


    /**
     * Show the form for editing Sphere.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('sphere_edit')) {
            return abort(401);
        }
        $sphere = Sphere::findOrFail($id);

        return view('admin.spheres.edit', compact('sphere'));
    }

    /**
     * Update Sphere in storage.
     *
     * @param  \App\Http\Requests\UpdateSpheresRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpheresRequest $request, $id)
    {
        if (! Gate::allows('sphere_edit')) {
            return abort(401);
        }
        $sphere = Sphere::findOrFail($id);
        $sphere->update($request->all());



        return redirect()->route('admin.spheres.index');
    }


    /**
     * Display Sphere.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('sphere_view')) {
            return abort(401);
        }
        $vacancies = \App\Vacancy::whereHas('sphere_id',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();$resumes = \App\Resume::whereHas('sphere_id',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();

        $sphere = Sphere::findOrFail($id);

        return view('admin.spheres.show', compact('sphere', 'vacancies', 'resumes'));
    }


    /**
     * Remove Sphere from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('sphere_delete')) {
            return abort(401);
        }
        $sphere = Sphere::findOrFail($id);
        $sphere->delete();

        return redirect()->route('admin.spheres.index');
    }

    /**
     * Delete all selected Sphere at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('sphere_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Sphere::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Sphere from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('sphere_delete')) {
            return abort(401);
        }
        $sphere = Sphere::onlyTrashed()->findOrFail($id);
        $sphere->restore();

        return redirect()->route('admin.spheres.index');
    }

    /**
     * Permanently delete Sphere from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('sphere_delete')) {
            return abort(401);
        }
        $sphere = Sphere::onlyTrashed()->findOrFail($id);
        $sphere->forceDelete();

        return redirect()->route('admin.spheres.index');
    }
}
