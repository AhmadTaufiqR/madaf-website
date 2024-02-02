<?php

namespace App\Http\Controllers;

use App\Imports\PengurusImport;
use App\Imports\SantriImport;
use App\Models\detail_product_out;
use App\Models\payment_infaq;
use App\Models\product;
use App\Models\product_out;
use App\Models\store;
use App\Models\TransactionSaldoSantri;
use App\Models\User;
use App\Models\UserPaymentRelation;
use Carbon\Carbon;
use DateTime;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Excel;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class OwnerController extends Controller
{
    function view_regist()
    {
        return view('register.register');
    }

    function add_owner(Request $request) {
        $admin = new User();
        $admin->name = $request->input('name');
        $admin->username = $request->input('username');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->level = 'admin';
        $admin->save();

        return redirect('/')->with('success', 'Berhasil ditambahkan');
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

    function addPengurusExcel(Request $request)
    {
        $import = FacadesExcel::import(new PengurusImport, $request->fileExel);
        if ($import) {
            return redirect('pengurus')->with('success', 'Data pengurus berhasil ditambahkan');
        }
        return redirect('pengurus')->withErrors('Silahkan masukkan kembali');
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
        $santri->balance = '0';
        $santri->password = Hash::make($request->input('password_add'));
        $santri->level = 'santri';

        $santri->save();

        if ($santri) {
            return redirect('santri')->with('success', 'Data santri berhasil ditambahkan');
        } else {
            return redirect('santri')->withErrors('Silahkan masukkan kembali');
        }
    }

    function addSantriExcel(Request $request)
    {
        $import = FacadesExcel::import(new SantriImport, $request->fileExel);
        if ($import) {
            return redirect('santri')->with('success', 'Data santri berhasil ditambahkan');
        }
        return redirect('santri')->withErrors('Silahkan masukkan kembali');
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
        $add_stores->balance = '0';
        $add_stores->save();

        if ($add_stores) {
            return redirect('koperasi')->with('success', 'Koperasi berhasil ditambahkan');
        } else {
            return redirect('koperasi')->withErrors('Silahkan Masukkan kembali');
        }
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

    function updatePengurus(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            // Update data
            if ($request->has('name')) {
                $user->name = $request->input('name');
            }
            if ($request->has('email')) {
                $user->email = $request->input('email');
            }
            if ($request->has('address')) {
                $user->address = $request->input('address');
            }
            $user->save();

            return redirect('pengurus')->with('success', 'Pengurus berhasil diperbarui');
        }

        return redirect('pengurus')->withErrors('Pengurus tidak ditemukan');
    }

    function updatePasswordPengurus(Request $request, $id)
    {

        $user = User::find($id);

        if ($request->input('password') == $request->input('confirm_password')) {
            if ($user) {
                $user->password = Hash::make($request->input('password'));
                $user->save();
                return redirect('pengurus')->with('success', 'Password berhasil diperbarui');
            }
        } else {
            return redirect('pengurus')->withErrors('Password Tidak Cocok');
        }

        return redirect('pengurus')->withErrors('Pengurus tidak ditemukan');
    }

    function destroyPengurus($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect('pengurus')->with('success', 'Pengurus berhasil dihapus');
        }

        return redirect('pengurus')->withErrors('Pengurus tidak ditemukan');
    }

    function updateSantri(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            // Update data
            if ($request->has('name')) {
                $user->name = $request->input('name');
            }
            if ($request->has('email')) {
                $user->email = $request->input('email');
            }
            if ($request->has('address')) {
                $user->address = $request->input('address');
            }
            if ($request->has('category_selected_add')) {
                $user->category = $request->input('category_selected_add');
            }
            $user->save();

            return redirect('santri')->with('success', 'Santri berhasil diperbarui');
        }

        return redirect('santri')->withErrors('Santri tidak ditemukan');
    }

    function updateBalanceSantri(Request $request, $id)
    {
        $santri = new TransactionSaldoSantri();

        $request->validate([
            'tambah_saldo' => 'required'
        ], [
            'tambah_saldo.required' => 'Saldo harus diisi'
        ]);

        $santri->users_id = $id;
        $santri->add_saldo = $request->input('tambah_saldo');
        $santri->save();

        if ($santri) {
            return redirect('santri')->with('success', 'Santri berhasil diperbarui');
        } else {
            return redirect('santri')->withErrors('Silahkan dicheck kembali');
        }
    }

    function withdrawBalanceSantri(Request $request, $id) 
    {

        $cek_balance = User::where('id', $id)->pluck('balance')->first();
        if ($cek_balance < $request->input('min_saldo') || $cek_balance == 0) {
            return redirect('santri')->withErrors('Saldo anda tidak mencukupi');
        }

        $santri = new TransactionSaldoSantri();

        $request->validate([
            'min_saldo' => 'required'
        ], [
            'min_saldo.required' => 'Saldo harus diisi'
        ]);

        $santri->users_id = $id;
        $santri->min_saldo = $request->input('min_saldo');
        $santri->save();

        if ($santri) {
            return redirect('santri')->with('success', 'Saldo berhasil dikurangi');
        } else {
            return redirect('santri')->withErrors('Silahkan dicheck kembali');
        }
    }

    function updatePasswordSantri(Request $request, $id)
    {

        $user = User::find($id);

        if ($request->input('password') == $request->input('confirm_password')) {
            if ($user) {
                $user->password = Hash::make($request->input('password'));
                $user->save();
                return redirect('santri')->with('success', 'Password berhasil diperbarui');
            }
        } else {
            return redirect('santri')->withErrors('Password Tidak Cocok');
        }

        return redirect('santri')->withErrors('Santri tidak ditemukan');
    }

    function destroySantri($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect('santri')->with('success', 'Santri berhasil dihapus');
        }

        return redirect('santri')->withErrors('Santri tidak ditemukan');
    }

    function updateKasir(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            // Update data
            if ($request->has('name')) {
                $user->name = $request->input('name');
            }
            if ($request->has('email')) {
                $user->email = $request->input('email');
            }
            if ($request->has('address')) {
                $user->address = $request->input('address');
            }
            if ($request->has('category_selected_add')) {
                $user->category = $request->input('category_selected_add');
            }
            $user->save();

            return redirect('kasir')->with('success', 'Kasir berhasil diperbarui');
        }

        return redirect('kasir')->withErrors('Kasir tidak ditemukan');
    }

    function updatePasswordKasir(Request $request, $id)
    {

        $user = User::find($id);

        if ($request->input('password') == $request->input('confirm_password')) {
            if ($user) {
                $user->password = Hash::make($request->input('password'));
                $user->save();
                return redirect('kasir')->with('success', 'Password berhasil diperbarui');
            }
        } else {
            return redirect('kasir')->withErrors('Password Tidak Cocok');
        }

        return redirect('kasir')->withErrors('Kasir tidak ditemukan');
    }

    function destroyKasir($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect('kasir')->with('success', 'Kasir berhasil dihapus');
        }

        return redirect('kasir')->withErrors('Kasir tidak ditemukan');
    }

    function updateKoperasi(Request $request, $id)
    {
        $user = store::find($id);

        if ($user) {
            // Update data
            if ($request->has('name')) {
                $user->name = $request->input('name');
            }
            if ($request->has('owner')) {
                $user->owner = $request->input('owner');
            }
            if ($request->has('address')) {
                $user->address = $request->input('address');
            }
            $user->save();

            return redirect('koperasi')->with('success', 'Koperasi berhasil diperbarui');
        }

        return redirect('koperasi')->withErrors('Koperasi tidak ditemukan');
    }

    function destroyKoperasi($id)
    {
        $user = store::find($id);

        if ($user) {
            $user->delete();
            return redirect('koperasi')->with('success', 'Koperasi berhasil dihapus');
        }

        return redirect('koperasi')->withErrors('Koperasi tidak ditemukan');
    }
    
}