<?php

namespace App\Http\Controllers;

use App\Exports\CsvExport;
use App\Http\Requests\SchoolsRequest;
use App\Result;
use App\School;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{

    /**
     * Index page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $result = Result::query()
            ->with('school')
            ->orderByDesc('created_at')
            ->paginate(10);
        $schools = School::all();

        return view('admin.index', compact('result', 'schools'));
    }

    /**
     * Export
     *
     * @param Request $request
     * @return mixed
     */

    public function csv_export(Request $request)
    {
        return Excel::download(new CsvExport($request->get('school_id', false)), 'users.xlsx');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function list()
    {
        $schools = School::query()->orderByDesc('created_at')->get();

        return view('admin.schools.list', compact('schools'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function add()
    {
        return view('admin.schools.add');
    }

    /**
     * @param SchoolsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(SchoolsRequest $request)
    {
        $data = $request->validated();

        $newData = [
            'name' => $data['orderName'],
            'city' => $data['orderCity'],
        ];

        School::query()->create($newData);
        flash(__('admin.school_added_success'));
        return redirect()->route('admin.schools.add');

    }

    /**
     * @param School $school
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */

    public function delete(School $school)
    {
        $school->delete();
        flash(__('admin.school_deleted_success'))->success();
        return redirect()->back();
    }

}
