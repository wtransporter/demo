<?php

namespace App\Http\Controllers;

use App\Models\Icon;
use Illuminate\Http\Request;

class IconController extends Controller
{
    /**
     * Display listing of resources
     *
     */
    public function index()
    {
        return view('admin.icons.index', [
            'icons' => Icon::all()
        ]);
    }

    /**
     * Update given resource
     *
     * @param Icon $icon
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Icon $icon, Request $request)
    {
        $icon->update(['body' => $request->get('body')]);

        return redirect()->route('icons.index')->with(['message' => 'Icon updated.']);
    }

    /**
     * Store given resource
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Icon::create([
            'body' => $request->get('body')
        ]);

        return redirect()->route('icons.index')->with(['message' => 'Icon added successfully.']);
    }

    /**
    * Delete the given icon.
    *
    * @param Icon $icon
    * @return \Illuminate\Http\RedirectResponse
    */
    public function destroy(Icon $icon)
    {
    
        $icon->delete();
    
        return redirect()->route('icons.index')->with(['message' => 'Icon deleted.']);
    }
}
