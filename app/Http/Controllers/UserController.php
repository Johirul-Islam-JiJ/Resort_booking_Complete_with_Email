<?php

namespace App\Http\Controllers;

use App\Mail\UserAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withTrashed()->paginate(15);
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // make random password for user
        $valid = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
        ]);

        $password = Str::random(8);
        $valid['password'] = bcrypt($password);

        $user = User::create($valid);

        if ($user) {
            try {
                Mail::to($user->email)->send(new UserAccount($user, $password));
            } catch (\Exception$exception) {
                echo $exception->getMessage();
            }
        }

        return redirect(route('users.index'))->with('message', 'User Added Successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('users.index'))->with('message', 'User Trash Successfully');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        $user->restore();
        return redirect(route('users.index'))->with('message', 'User Restore Successfully');
    }

    public function forceDelete($id)
    {
        $user = User::withTrashed()->find($id);
        $user->forceDelete();
        return redirect(route('users.index'))->with('message', 'User Deleted Successfully');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        // print_r($data);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.'],
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }
}
