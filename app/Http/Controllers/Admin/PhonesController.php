<?php

namespace App\Http\Controllers\Admin;

use App\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePhonesRequest;
use App\Http\Requests\Admin\UpdatePhonesRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class PhonesController extends Controller
{
    /**
     * Display a listing of Phone.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('phone_access')) {
            return abort(401);
        }
        if ($filterBy = Input::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('Phone.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('Phone.filter', 'my');
            }
        }

        if (request('show_deleted') == 1) {
            if (! Gate::allows('phone_delete')) {
                return abort(401);
            }
            $phones = Phone::onlyTrashed()->get();
        } else {
            $phones = Phone::all();
        }

        return view('admin.phones.index', compact('phones'));
    }

    /**
     * Show the form for creating new Phone.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('phone_create')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.phones.create', compact('created_bies'));
    }

    /**
     * Store a newly created Phone in storage.
     *
     * @param  \App\Http\Requests\StorePhonesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePhonesRequest $request)
    {
        if (! Gate::allows('phone_create')) {
            return abort(401);
        }
        $phone = Phone::create($request->all());



        return redirect()->route('admin.phones.index');
    }


    /**
     * Show the form for editing Phone.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('phone_edit')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $phone = Phone::findOrFail($id);

        return view('admin.phones.edit', compact('phone', 'created_bies'));
    }

    /**
     * Update Phone in storage.
     *
     * @param  \App\Http\Requests\UpdatePhonesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePhonesRequest $request, $id)
    {
        if (! Gate::allows('phone_edit')) {
            return abort(401);
        }
        $phone = Phone::findOrFail($id);
        $phone->update($request->all());



        return redirect()->route('admin.phones.index');
    }


    /**
     * Display Phone.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('phone_view')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');$vacancies = \App\Vacancy::where('phone_id', $id)->get();$resumes = \App\Resume::where('phone_id', $id)->get();

        $phone = Phone::findOrFail($id);

        return view('admin.phones.show', compact('phone', 'vacancies', 'resumes'));
    }


    /**
     * Remove Phone from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('phone_delete')) {
            return abort(401);
        }
        $phone = Phone::findOrFail($id);
        $phone->delete();

        return redirect()->route('admin.phones.index');
    }

    /**
     * Delete all selected Phone at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('phone_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Phone::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Phone from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('phone_delete')) {
            return abort(401);
        }
        $phone = Phone::onlyTrashed()->findOrFail($id);
        $phone->restore();

        return redirect()->route('admin.phones.index');
    }

    /**
     * Permanently delete Phone from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('phone_delete')) {
            return abort(401);
        }
        $phone = Phone::onlyTrashed()->findOrFail($id);
        $phone->forceDelete();

        return redirect()->route('admin.phones.index');
    }
}
