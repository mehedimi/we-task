<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooController extends Controller
{
    public function setFoo(Request $request)
    {
        return view('foo.set');
    }

    public function storeFoo(Request $request)
    {
        $request->validate([
            'set_foo' => 'required'
        ], [
            'set_foo.required' => 'You must set the foo to continue.'
        ]);

        $request->session()->put('foo', $request->set_foo);

        return redirect('/home');
    }
}
