<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::paginate(20);
        return view('admins.index', compact('admins'));
    }

    public function create()
    {
        return view('admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8'
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        Session::flash('success', "Successfully created");
        return redirect()->route('admins.index')->with('success', 'admin created successfully');
    }

    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admins.show', compact('admin'));
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admins.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email,'.$id,
        ]);

        $admin = admin::findOrFail($id);
        $admin->update($request->only(['name', 'email']));

        Session::flash('success', "Successfully updated");
        return redirect()->route('admins.index')->with('success', 'admin updated successfully');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        Session::flash('success', "Successfully deleted");
        return redirect()->route('admins.index')->with('success', 'admin deleted successfully');
    }

    public function showLoginForm()
    {
        Session::forget('login');
        return view('admins.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Agar kirish muvaffaqiyatli bo'lsa
            Session::flash('success', 'Muvaffaqiyatli');
            Session::put('login', 'login');
            return redirect()->route('admins.index');
        }

        // Agar kirish muvaffaqiyatsiz bo'lsa
        return redirect()->back()->with('xato', 'Email yoki parol noto\'g\'ri');
    }

    public function logout(){
        Session::forget('login');
        return redirect()->route('showLoginForm');
    }
}
