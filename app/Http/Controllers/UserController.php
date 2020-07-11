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
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.list');
    }

    public function promote($id)
    {
        $user = User::findOrFail($id);
        if ($user->role == 1) {
            alert("Action canceled", "Already a Manager!", "error");
        } else {
            $user->where('id', $id)->update(['role' => 1]);
            alert("Action completed", "User has been promoted", "success");
        }
        return redirect()->route('user.list');
    }

    public function demote($id)
    {
        $user = User::findOrFail($id);
        if ($user->role == 0) {
            alert('Action canceled', "Can't demote this user any further!", 'error');
        } else {
            $user->where('id', $id)->update(['role' => 0]);
            alert("Action completed", "User has been demoted", "success");

        }
        return redirect()->route('user.list');
    }
}
