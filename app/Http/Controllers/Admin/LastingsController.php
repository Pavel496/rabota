<?php

namespace App\Http\Controllers\Admin;

use App\Lasting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLastingsRequest;
use App\Http\Requests\Admin\UpdateLastingsRequest;

class LastingsController extends Controller
{
    /**
     * Display a listing of Lasting.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('lasting_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('lasting_delete')) {
                return abort(401);
            }
            $lastings = Lasting::onlyTrashed()->get();
        } else {
            $lastings = Lasting::all();
        }

        return view('admin.lastings.index', compact('lastings'));
    }

    /**
     * Show the form for creating new Lasting.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('lasting_create')) {
            return abort(401);
        }
        return view('admin.lastings.create');
    }

    /**
     * Store a newly created Lasting in storage.
     *
     * @param  \App\Http\Requests\StoreLastingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLastingsRequest $request)
    {
        if (! Gate::allows('lasting_create')) {
            return abort(401);
        }
        $lasting = Lasting::create($request->all());



        return redirect()->route('admin.lastings.index');
    }


    /**
     * Show the form for editing Lasting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('lasting_edit')) {
            return abort(401);
        }
        $lasting = Lasting::findOrFail($id);

        return view('admin.lastings.edit', compact('lasting'));
    }

    /**
     * Update Lasting in storage.
     *
     * @param  \App\Http\Requests\UpdateLastingsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLastingsRequest $request, $id)
    {
        if (! Gate::allows('lasting_edit')) {
            return abort(401);
        }
        $lasting = Lasting::findOrFail($id);
        $lasting->update($request->all());



        return redirect()->route('admin.lastings.index');
    }


    /**
     * Display Lasting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('lasting_view')) {
            return abort(401);
        }
        $vacancies = \App\Vacancy::where('lasting_id', $id)->get();$resumes = \App\Resume::where('lasting_id', $id)->get();

        $lasting = Lasting::findOrFail($id);

        return view('admin.lastings.show', compact('lasting', 'vacancies', 'resumes'));
    }


    /**
     * Remove Lasting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('lasting_delete')) {
            return abort(401);
        }
        $lasting = Lasting::findOrFail($id);
        $lasting->delete();

        return redirect()->route('admin.lastings.index');
    }

    /**
     * Delete all selected Lasting at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('lasting_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Lasting::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Lasting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('lasting_delete')) {
            return abort(401);
        }
        $lasting = Lasting::onlyTrashed()->findOrFail($id);
        $lasting->restore();

        return redirect()->route('admin.lastings.index');
    }

    /**
     * Permanently delete Lasting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('lasting_delete')) {
            return abort(401);
        }
        $lasting = Lasting::onlyTrashed()->findOrFail($id);
        $lasting->forceDelete();

        return redirect()->route('admin.lastings.index');
    }
}
