<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stackflows\Stackflows;

class VariableController extends Controller
{
    private Stackflows $stackflows;

    protected array $variableTypes;

    public function __construct(Stackflows $stackflows)
    {
        $this->stackflows = $stackflows;
        $this->variableTypes = config('stackflows.variable_types');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $variables = $this->stackflows->getVariables();

        return view('variables.index', compact('variables'));
    }

    /**
     * Show create variable form
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('variables.create')
            ->with('types', $this->variableTypes);
    }

    /**
     * Save variable to StackFlows
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validation = $this->validateVariable($request);
        if (! $this->isValidaVariableResponse($validation)) {
            return redirect()->back()
                ->withErrors($validation['errors'] ?? ['Validation error']);
        }

        $options = json_decode($request->input('options', '[]'), true);

        $result = $this->stackflows->createVariable(
            $request->input('name'),
            $request->input('type'),
            $request->input('values', ''),
            $options,
        );

        if ($result) {
            return redirect()->route('variables.index');
        }

        return redirect()
            ->back()
            ->withInput($request->all())
            ->withErrors(['Variable save error']);
    }

    /**
     * Show edit variable form
     *
     * @param string  $id
     * @return Application|Factory|View
     */
    public function edit(string $id)
    {
        $variable = $this->stackflows->getVariableById($id);

        return view('variables.edit', compact('variable'))
            ->with('types', $this->variableTypes);
    }

    /**
     * Update variable to StackFlows
     *
     * @param string  $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(string $id, Request $request): RedirectResponse
    {
        $validation = $this->validateVariable($request);
        if (! $this->isValidaVariableResponse($validation)) {
            return redirect()->back()
                ->withErrors($validation['errors'] ?? ['Validation error']);
        }

        $options = json_decode($request->input('options', '[]'), true);

        $result = $this->stackflows->updateVariable(
            $id,
            $request->input('name'),
            $request->input('type'),
            $request->input('values', ''),
            $options,
        );

        if ($result) {
            return redirect()->route('variables.index');
        }

        return redirect()
            ->back()
            ->withInput($request->all())
            ->withErrors(['Variable update error']);
    }

    /**
     * @param Request $request
     * @return RedirectResponse|void
     */
    protected function validateVariable(Request $request)
    {
        $options = json_decode($request->input('options', '[]'), true);

        $variables = [
            [
                'type' => $request->input('type'),
                'name' => $request->input('name'),
                'value' => $request->input('values', ''),
                'option' => $options,
            ]
        ];

        return $this->stackflows->validateVariables($variables);
    }

    protected function isValidaVariableResponse($validation):bool
    {
        return ! is_null($validation['status']) && $validation['status'] === true;
    }
}
