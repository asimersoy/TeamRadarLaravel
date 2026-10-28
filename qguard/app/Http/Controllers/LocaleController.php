<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LocaleController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate(['locale' => ['required', Rule::in(['en', 'tr'])]]);
        $request->session()->put('interface_locale', $data['locale']);
        $previous = url()->previous();
        $origin = $request->getSchemeAndHttpHost();

        return redirect(str_starts_with($previous, $origin.'/') ? $previous : '/');
    }
}
