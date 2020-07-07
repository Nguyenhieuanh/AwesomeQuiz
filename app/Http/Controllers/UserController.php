<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::paginate(5);

        return view('users.list', compact('users'));
    }
    public function destroy($id)
    {
        $category = User::findOrFail($id);
        $category->delete();

        return redirect()->route('users.list');
    }
}
