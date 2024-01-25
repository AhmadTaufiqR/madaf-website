<?php

namespace App\Http\Controllers;

use App\Models\detail_product_out;
use App\Models\payment_infaq;
use App\Models\product;
use App\Models\product_out;
use App\Models\store;
use App\Models\User;
use App\Models\UserPaymentRelation;
use Carbon\Carbon;
use DateTime;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class OwnerController extends Controller
{
    function view_regist()
    {
        return view('register.register');
    }

    function addPengurus(Request $request)
    {

        $pengurus = new User();
        Session::flash('name', $request->name_add);
        Session::flash('username', $request->username_add);
        Session::flash('email', $request->email_add);
        Session::flash('address', $request->address_add);

        $request->validate([
            'name_add' => 'required',
            'username_add' => 'required|unique:users,username',
            'password_add' => 'required|min:6',
            'confirm_password_add' => 'required'
        ], [
            'name_add.required' => 'Kolom nama tidak boleh kosong',
            'username.required' => 'Kolom username tidak boleh kosong',
            'username.unique' => 'Username sudah terdaftar',
            'password_add.required' => 'Kolom password tidak boleh kosong',
            'password_add.min' => 'Password minimal 6 karakter',
            'confirm_password_add.required' => 'Kolom konfirmasi password tidak boleh kosong',
        ]);

        $pengurus->name = $request->input('name_add');
        $pengurus->username = $request->input('username_add');
        $pengurus->email = $request->input('email_add');
        $pengurus->address = $request->input('address_add');
        $pengurus->password = Hash::make($request->input('password_add'));
        $pengurus->level = 'pengurus';
        $pengurus->save();
        if ($pengurus) {
            return redirect('pengurus')->with('success', 'Berhasil ditambahkan');
        } else {
            return redirect('pengurus')->withErrors('Silahkan masukkan kembali');
        }
    }


    function addSantri(Request $request)
    {
        $santri = new User();
        Session::flash('name', $request->name_add);
        Session::flash('username', $request->username_add);
        Session::flash('email', $request->email_add);
        Session::flash('address', $request->address_add);
        $request->validate([
            'name_add' => 'required',
            'username_add' => 'required|unique:users,username',
            'password_add' => 'required|min:6',
            'confirm_password_add' => 'required'
        ], [
            'name_add.required' => 'Kolom nama tidak boleh kosong',
            'username_add.required' => 'Kolom username tidak boleh kosong',
            'username_add.unique' => 'Username sudah terdaftar',
            'password_add.required' => 'Kolom password tidak boleh kosong',
            'password_add.min' => 'Password minimal 6 karakter',
            'confirm_password_add.required' => 'Kolom konfirmasi password tidak boleh kosong',
        ]);

        $santri->name = $request->input('name_add');
        $santri->username = $request->input('username_add');
        $santri->category = $request->input('category_selected_add');
        if ($request->input('email_add') != '') {
            $santri->email = $request->input('email_add');
        }
        if ($request->input('address_add') != '') {
            $santri->address = $request->input('address_add');
        }
        $santri->password = Hash::make($request->input('password_add'));
        $santri->level = 'santri';

        $santri->save();

        if ($santri) {
            return redirect('santri')->with('success', 'Data santri berhasil ditambahkan');
        } else {
            return redirect('santri')->withErrors('Silahkan masukkan kembali');
        }
    }

    function addKasir(Request $request)
    {
        $santri = new User();
        Session::flash('name', $request->name_add);
        Session::flash('username', $request->username_add);
        Session::flash('email', $request->email_add);
        Session::flash('address', $request->address_add);
        $request->validate([
            'name_add' => 'required',
            'username_add' => 'required|unique:users,username',
            'password_add' => 'required|min:6',
            'confirm_password_add' => 'required'
        ], [
            'name_add.required' => 'Kolom nama tidak boleh kosong',
            'username_add.required' => 'Kolom username tidak boleh kosong',
            'username_add.unique' => 'Username sudah terdaftar',
            'password_add.required' => 'Kolom password tidak boleh kosong',
            'password_add.min' => 'Password minimal 6 karakter',
            'confirm_password_add.required' => 'Kolom konfirmasi password tidak boleh kosong',
        ]);

        $santri->name = $request->input('name_add');
        $santri->username = $request->input('username_add');
        if ($request->input('email_add') != '') {
            $santri->email = $request->input('email_add');
        }
        if ($request->input('address_add') != '') {
            $santri->address = $request->input('address_add');
        }
        $santri->password = Hash::make($request->input('password_add'));
        $santri->level = 'kasir';

        $santri->save();

        if ($santri) {
            return redirect('kasir')->with('success', 'Data kasir berhasil ditambahkan');
        } else {
            return redirect('kasir')->withErrors('Silahkan masukkan kembali');
        }
    }




    function addingKoperasi(Request $request)
    {

        Session::flash('name', $request->input('name_add'));
        Session::flash('owner', $request->input('owner_add'));
        Session::flash('address', $request->input('address_add'));

        $add_stores = new store();

        $add_stores->name = $request->input('name_add');
        $add_stores->owner = $request->input('owner_add');
        $add_stores->address = $request->input('address_add');
        $add_stores->save();

        if ($add_stores) {
            return redirect('koperasi')->with('success', 'Koperasi berhasil ditambahkan');
        } else {
            return redirect('koperasi')->withErrors('Silahkan Masukkan kembali');
        }
    }

    function editKoperasi(Request $request, $id)
    {
        $edit_store = store::find($id);

        if ($edit_store) {
            $edit_store->name = $request->input('name_add');
            $edit_store->owner = $request->input('owner_add');
            $edit_store->address = $request->input('address_add');
            $edit_store->save();

            return redirect('toko-admin')->with('success', 'Data berhasil diubah');
        }
        return redirect('toko-admin')->withErrors('Silahkan isikan kembali');
    }

    function deleteKoperasi($id)
    {
        $delete_store = store::find($id);

        if ($delete_store) {
            $delete_store->delete();
            return redirect('toko-admin')->with('success', ' Data berhasil dihapus');
        }
        return redirect('toko-admin')->withErrors('Silahkan ulangi kembali');
    }

    //Bagian Infaq
    function addingInfaq(Request $request)
    {

        $payment = new payment_infaq();
        $payment->month = $request->input('month_selected_add');
        $payment->category = $request->input('category_selected_add');
        $payment->eat_amount = $request->input('eat_amount_add');
        $payment->amount = $request->input('amount_add');
        $payment->save();

        if ($payment) {
            $categories = ['MIMA', 'KULIAH', 'MTS', 'MAN', 'SMK'];

            foreach ($categories as $category) {
                $users = User::where('category', $category)->get();
                $paymentInfaqs = payment_infaq::where('category', $category)->get();

                foreach ($users as $user) {
                    foreach ($paymentInfaqs as $paymentInfaq) {
                        $user->paymentInfaqs()->sync($paymentInfaq);
                    }
                }
            }
            return redirect('infaq')->with('success', 'Infaq berhasil ditambahkan');
        } else {
            return redirect('infaq')->withErrors('Silahkan Masukkan kembali');
        }
    }



    // public function destroy($id)
    // {
    //     $user = User::find($id);

    //     if ($user) {
    //         $user->delete();
    //         return redirect('users')->with('success', 'User berhasil dihapus');
    //     }

    //     return redirect('users')->withErrors('User tidak ditemukan');
    // }

    // public function update(Request $request, $id) {
    //     $user = User::find($id);

    //     $request->validate([
    //         'name' => 'required',
    //         'username' => [
    //             'required',
    //             Rule::unique('users')->ignore($user->id),
    //         ],
    //     ], [
    //         'username.unique' => 'Username sudah terdaftar.',
    //     ]);

    //     if ($user) {
    //         // Update data
    //         $user->name = $request->input('name');
    //         $user->username = $request->input('username');
    //         $user->save();

    //         return redirect('users')->with('success', 'Admin updated successfully.');
    //     }

    //     return redirect('users')->withErrors('Admin not found.');
    // }
    // public function update_password(Request $request, $id) {

    //     $user = User::find($id);

    //     if ($user) {    
    //         if ($request->has('password')) {
    //             $user->password =Hash::make($request->input('password'));
    //         }
    //         $user->save();

    //         return redirect('users')->with('success', 'Admin updated successfully.');
    //     }

    //     return redirect('users')->withErrors('Admin not found.');
    // }

    //     public static function getTransaction() {
    //         $allOfProductOut = product_out::where('status', '=', 'Lunas')->get();
    //         $allOfProductOutTransaction = product_out::all();
    //         $allOfDetail = detail_product_out::all();
    //         $allOfProductOutNotPaid = product_out::where('status', '=', 'Belum lunas')->get();

    //         $sum_price = $allOfProductOut->sum('price');
    //         $formatted_price = number_format($sum_price, 0, ',', '.');
    //         $countProductOut = $allOfProductOutTransaction->count();
    //         $countDetail = $allOfDetail->count();
    //         $countNotPaid = $allOfProductOutNotPaid->count();

    //         $date = now();
    //         $format_date = Carbon::parse($date)->format('Y');

    //         return [$formatted_price, $countProductOut, $countDetail, $countNotPaid, $format_date];
    //     }


    //     static function growUp() {
    //         $allOfProductOut = product_out::where('status', '=', 'Lunas')->get();

    //         $start_date = $allOfProductOut->min('date');
    //         $date = new DateTime(now());
    //         $date_format = Carbon::parse($start_date);
    //         $dateFormatBegin = Carbon::parse($date)->startOfMonth();
    //         $dateFormatEnd = Carbon::parse($date)->endOfMonth()->format('d-m-Y');

    //         if ($dateFormatBegin >= $date_format) {
    //             echo "berhasil";

    //         } else {
    //             echo "gagal";
    //         }
    //     }

    //     static function profileReport() {
    //         $allOfProductOut = product_out::where('status', '=', 'Lunas')->get();
    //         return response()->json($allOfProductOut);
    //     }
}
