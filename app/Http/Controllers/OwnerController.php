<?php

namespace App\Http\Controllers;

use App\Models\detail_product_out;
use App\Models\product;
use App\Models\product_out;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class OwnerController extends Controller
{
    function view_regist() {
        return view('register.register');
    }
    
    function add_admin(Request $request) {
        
        $users_regist = new User();
        Session::flash('name', $request->name_add);
        Session::flash('username', $request->username_add);
        $request->validate([
            'name_add' => 'required',
            'username_add' => 'required|unique:users,username',
            'password_add' => 'required|min:6',
        ], [
            'name_add.required' => 'Kolom nama harus diisi.',
            'username_add.required' => 'Kolom username harus diisi.',
            'username_add.unique' => 'Username sudah terdaftar.',
            'password_add.required' => 'Kolom password harus diisi.',
            'password_add.min' => 'Password harus lebih dari 6',
        ]);
        
        $users_regist->name = $request->input('name_add');
        $users_regist->username = $request->input('username_add');
        $users_regist->password = Hash::make($request->input('password_add'));
        $users_regist->level = 'admin';
        $users_regist->save();
        
        if(!$users_regist) {
            return redirect('users')->withErrors('Silahkan masukkan kembali');
        } else {
            return redirect('users')->with('success', 'Anda berhasil memasukkan');
        }
    }
    
    function add_owner(Request $request) {
        
        $users_regist = new User();
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|min:6',
        ], [
            'name.required' => 'Kolom nama harus diisi.',
            'username.required' => 'Kolom username harus diisi.',
            'password.required' => 'Kolom password harus diisi.',
            'password.min' => 'Password harus lebih dari 6',
        ]);
        
        $users_regist->name = $request->input('name');
        $users_regist->username = $request->input('username');
        $users_regist->password = Hash::make($request->input('password'));
        $users_regist->level = 'owner';
        $users_regist->save();
        
        if(!$users_regist) {
            return redirect('users')->withErrors('Silahkan masukkan kembali');
        } else {
            return redirect('users')->with('success', 'Anda berhasil memasukkan');
        }
    }
    
    
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect('users')->with('success', 'User berhasil dihapus');
        }
        
        return redirect('users')->withErrors('User tidak ditemukan');
    }
    
    public function update(Request $request, $id) {
        $user = User::find($id);
    
        $request->validate([
            'name' => 'required',
            'username' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
        ], [
            'username.unique' => 'Username sudah terdaftar.',
        ]);
    
        if ($user) {
            // Update data
            $user->name = $request->input('name');
            $user->username = $request->input('username');
            $user->save();
    
            return redirect('users')->with('success', 'Admin updated successfully.');
        }
    
        return redirect('users')->withErrors('Admin not found.');
    }
    public function update_password(Request $request, $id) {
        
        $user = User::find($id);
        
        if ($user) {    
            if ($request->has('password')) {
                $user->password =Hash::make($request->input('password'));
            }
            $user->save();
            
            return redirect('users')->with('success', 'Admin updated successfully.');
        }
        
        return redirect('users')->withErrors('Admin not found.');
    }

    public static function getTransaction() {
        $allOfProductOut = product_out::where('status', '=', 'Lunas')->get();
        $allOfProductOutTransaction = product_out::all();
        $allOfDetail = detail_product_out::all();
        $allOfProductOutNotPaid = product_out::where('status', '=', 'Belum lunas')->get();

        $sum_price = $allOfProductOut->sum('price');
        $formatted_price = number_format($sum_price, 0, ',', '.');
        $countProductOut = $allOfProductOutTransaction->count();
        $countDetail = $allOfDetail->count();
        $countNotPaid = $allOfProductOutNotPaid->count();

        $date = now();
        $format_date = Carbon::parse($date)->format('Y');

        return [$formatted_price, $countProductOut, $countDetail, $countNotPaid, $format_date];
    }

    
    static function growUp() {
        $allOfProductOut = product_out::where('status', '=', 'Lunas')->get();
    
        $start_date = $allOfProductOut->min('date');
        $date = new DateTime(now());
        $date_format = Carbon::parse($start_date);
        $dateFormatBegin = Carbon::parse($date)->startOfMonth();
        $dateFormatEnd = Carbon::parse($date)->endOfMonth()->format('d-m-Y');
        
        if ($dateFormatBegin >= $date_format) {
            echo "berhasil";
            
        } else {
            echo "gagal";
        }
    }

    static function profileReport() {
        $allOfProductOut = product_out::where('status', '=', 'Lunas')->get();
        return response()->json($allOfProductOut);
    }
}
