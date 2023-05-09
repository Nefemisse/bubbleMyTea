<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\BubbleTeas;
// use App\Models\Commands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class SampleController extends Controller
{
    public $search = '';

    function validate_registration(Request $request)
    {
        $request->validate([
            'firstname'            => 'required',
            'lastname'             => 'required',
            'adress'               => 'required',
            'phone_number'          => 'required',
            'email'                 => 'required|email|unique:users',
            'password'             => 'required|min:6'
        ]);

        $data = $request->all();

        User::create([
            'lastname'       => $data['lastname'],
            'firstname'      => $data['firstname'],
            'adress'         => $data['adress'],
            'phone_number'    => $data['phone_number'],
            'email'           => $data['email'],
            'password'       => Hash::make($data['password'])
        ]);
        return redirect('/')->with('success', 'Registration success');
    }

    function validate_login(Request $request)
    {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('dashboard');
        }
        return redirect('/')->with('success', 'Login details not valid');
    }

    function dashboard()
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin === 1) {
                return redirect('/admin');
            }
            return view('dashboard');
        }
        return redirect('/')->with('success', 'You are not allowed to access');
    }

    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/')->with('success', 'You logged out successfully');
    }

    function adminPage()
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin === 1) {
                $bubbleTea = BubbleTeas::all();
                $user = User::all();
                return view('admin', compact('bubbleTea', 'user'));
            }
            return redirect('dashboard')->with('success', 'You are not logged as admin');
        }
        return redirect('/')->with('success', 'You are not logged');
    }

    public function updateProfil(Request $request, $id)
    {
        $userData = User::find($id);
        $userData->firstname = $request->input('firstname') ? $request->input('firstname') : $userData->firstname;
        $userData->lastname = $request->input('lastname') ? $request->input('lastname') : $userData->lastname;
        $userData->phone_number = $request->input('phone_number') ? $request->input('phone_number') : $userData->phone_number;
        $userData->adress = $request->input('adress') ? $request->input('adress') : $userData->adress;
        $userData->update();

        return redirect('/dashboard')->with('success', 'USER data updated success');
    }

    public function deleteProfil($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/')->with('success', 'your account has been DELETED SUCCESSFULLY');
    }

    public function renderSearchBar()
    {
        $bubbleTea = BubbleTeas::where('name', 'like', '%' . $this->search . '%')->orderBy('id', 'ASC')->paginate(3);
        return view('order', ['bubbleTea' => $bubbleTea]);
    }

    public function searchBubbleTeaByName(Request $request)
    {
        if ($request->search) {

            $searchBubbleTea = BubbleTeas::where('name', 'LIKE', '%' . $request->search . '%')->latest()->paginate(15);
            return view('order', compact('searchBubbleTea'));
        } else {
            return redirect()->back()->with('message', 'Empty Search');
        }
    }
}
