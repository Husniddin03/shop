<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function login()
    {
        return view('customer.login');
    }
    public function signup()
    {
        return view('customer.signup');
    }
    public function register(Request $request)
    {
        // dd($request);
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Customer::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Session::flash('success', 'Customer created successfully');
        return redirect()->route('index')->with('success', 'Ro\'yxatdan muvaffaqiyatli o\'tdingiz!');
    }
    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        $customer = Customer::where('email', $request->email)->first();
        if ($customer && Hash::check($request->password, $customer->password)) {
            Session::put('customer_id', $customer->id);
            Session::flash('success', 'Siz tizimga kirdingiz');
            return redirect()->route('index')->with('success', 'Siz ro\'yxatdan o\'tdingiz!');
        } else {
            Session::flash('error', 'Email yoki parol noto\'g\'ri!');
            return redirect()->route('login')->with('error', 'Email yoki parol noto\'g\'ri!');
        }
    }


    public function customerlist()
    {
        $customers = Customer::paginate(20);
        return view('admin.customerlist')->with('customer', $customers);
    }
    public function customershow($id)
    {
        $customer = Customer::find($id);
        return view('admin.customershow')->with('customer', $customer);
    }
    public function customerdelete($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        Session::flash('Customer', 'Customer deleted successfully');
        return redirect()->route('customerlist')->with('success', 'Customer deleted successfully!');
    }
}
