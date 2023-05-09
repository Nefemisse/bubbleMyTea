<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BubbleTeas;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->firstname = $user->firstname;
        $user->lastname =  $user->lastname;
        $user->phone_number = $user->phone_number;
        $user->adress = $user->adress;
        $user->isAdmin = $request->input('isAdmin') == true ? '1' : '0';
        $user->update();
        $response = $user->isAdmin == 1 ? ' is admin now' : ' is not admin anymore';
        return redirect('/admin')->with('success', $user->firstname . $response);
    }

    public function deleteUser($id)
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin === 1) {
                $user = User::find($id);
                $userName = $user->firstname;
                $user->delete();
                return redirect('admin')->with('success', $userName . ' has been deleted with SUCCESS');
            }
        }
        return redirect('/')->with('success', 'ERRROR');
    }

    public function createBbt(Request $request)
    {
        $requestData = $request->all();
        // Store img
        if ($request->file('img')) {
            $fileName = time() . $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs('images', $fileName, 'public');
            $requestData["img"] = 'storage/' . $path;
            //
            bubbleTeas::create($requestData);
            return redirect('admin')->with('success', $requestData["name"] . ' Added success!');
        } else {

            return redirect('admin')->with('success', 'No IMG');
        }
    }

    public function updateBbt(Request $request, $id)
    {
        $bubbleTea = BubbleTeas::find($id);
        $bubbleTea->name = $request->input('name') ? $request->input('name') : $bubbleTea->name;
        $bubbleTea->temperature = $request->input('temperature') ? $request->input('temperature') : $bubbleTea->temperature;
        $bubbleTea->price = $request->input('price') ? $request->input('price') : $bubbleTea->price;
        $bubbleTea->quantity = $request->input('quantity') ? $request->input('quantity') : $bubbleTea->quantity;
        $bubbleTea->sugar_quantity = $request->input('sugar_quantity') ? $request->input('sugar_quantity') : $bubbleTea->sugar_quantity;
        $bubbleTea->description = $request->input('description') ? $request->input('description') : $bubbleTea->description;

        if ($request->file('img')) {
            $fileName = time() . $request->file('img')->getClientOriginalName();
            $path = $request->file('img')->storeAs('images', $fileName, 'public');
            $requestData["img"] = 'storage/' . $path;
        }
        $bubbleTea->update();

        return redirect('/admin')->with('success', $bubbleTea->name . ' BBT data updated success');
    }

    public function deleteBbt($id)
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin === 1) {
                $bubbletea = BubbleTeas::find($id);
                $bbtName = $bubbletea->name;
                $bubbletea->delete();
                return redirect('admin')->with('success', $bbtName . ' BBT deleted SUCCESS');
            }
        }
        return redirect('/')->with('success', 'ERRROR');
    }
}
