<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stackflows\Stackflows;

class ProcessController extends Controller
{
    private Stackflows $stackflows;

    public function __construct(Stackflows $stackflows)
    {
        $this->stackflows = $stackflows;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function form()
    {
        return view('process.form');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function start(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tag' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $request->validate(['tag' => ['required', 'string']]);

        $tag = $request->get('tag');
        try {
            $this->stackflows->startBusinessProcesses([$tag]);
        } catch (\Exception $e) {
            return redirect()->back()->with('exception', $e->getMessage());
        }

        return redirect()
            ->back()
            ->with('status', "Business process tagged with \"{$tag}\" was started successfully");
    }
}
