<?php

namespace App\Http\Controllers;

use App\Models\WpChange;
use App\Services\DiffService;
use Illuminate\Http\Request;


class DiffController extends Controller
{
    public function index()
    {
        $changes = WpChange::latest()->get();
        return view('index', ['changes' => $changes]);
    }

    public function show(WpChange $change)
    {
        return view('show', ['change' => $change]);
    }

    public function diff(WpChange $old, WpChange $new)
    {
        $diffService = new DiffService($old->contents, $new->contents);
        return view('diff', ['old' => $old, 'new' => $new, 'diff' => $diffService->diff()]);
    }
}
