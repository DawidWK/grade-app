<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;



class AdminController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function edit($id): View
    {
        $user = User::findOrFail($id);
        return view('admin.edit', ['user' => $user]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($request->user_id);
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user->password = Hash::make($request->password);
        $user->save();
    
        return redirect()->back()->with('status', 'password-updated');
        }
    

    public function destroy(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);
    
        if ($request->user()->isAdmin()) {
            $user->delete();
            Log::info('Administrator usunął użytkownika o ID: ' . $id);
    
            return redirect()->back()->with('success', 'Użytkownik usunięty pomyślnie');
        }
    
        return redirect()->back()->with('error', 'Brak uprawnień do usunięcia użytkownika');
    }
    
}
