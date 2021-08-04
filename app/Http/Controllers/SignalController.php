<?php

namespace App\Http\Controllers;

use App\Stackflows\Signal\ThrowSignalAction;
use Illuminate\Http\Request;

class SignalController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('signals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param ThrowSignalAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, ThrowSignalAction $action)
    {
        $request->validate(['signal' => ['required', 'string']]);
        $signal = $request->get('signal');

        try {
            $action->execute($signal);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('status', "Signal \"{$signal}\" sent successfully");
    }
}
