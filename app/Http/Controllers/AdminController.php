<?php

namespace App\Http\Controllers;

use App\Models\detail_product_out;
use App\Models\product;
use App\Models\product_in;
use App\Models\product_out;
use App\Models\store;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function add_barang_masuk(Request $request) {
        $add_product = new product_in();
        $add_stock = new product();
        
        if ($request->input('name_selected') != 'default') {
            $add_product->products = $request->input('name_selected');
            $add_product->from = $request->input('from_add');
            $add_product->total = $request->input('total_add');
            $add_product->date = $request->input('date_add');
            $add_product->price = $request->input('price_add');
            $add_product->save();
            
            return redirect('product-in-admin')->with('success', 'Admin updated successfully.');
            
        } else {
            
            $add_stock->name = $request->input('name_add');
            $add_stock->from = $request->input('from_add');
            $add_stock->stock = $request->input('total_add');
            $add_stock->price = $request->input('price_add');
            $add_stock->save();
            
            // $id_new_product = product::where('name', '=', $request->input('name_add'))->pluck('id')->first();
            
            $add_product->product_new = $request->input('name_add');
            $add_product->from = $request->input('from_add');
            $add_product->total = $request->input('total_add');
            $add_product->date = $request->input('date_add');
            $add_product->price = $request->input('price_add');
            $add_product->save();
            
            return redirect('product-in-admin')->with('success', 'Admin updated successfully.');
        }
        
        
    }
    
    
    function adding_stores(Request $request){
        $add_stores = new store();
        
        $add_stores->name = $request->input('name_add');
        $add_stores->owner = $request->input('owner_add');
        $add_stores->kecamatan = $request->input('kecamatan_add');
        $add_stores->kabupaten = $request->input('kabupaten_add');
        $add_stores->address = $request->input('address_add');
        $add_stores->date = $request->input('date_add');
        $add_stores->save();
        
        return redirect('toko-admin')->with('success', 'Admin updated successfully.');
    }
    
    function edit_store(Request $request, $id) {
        $edit_store = store::find($id);
        
        if ($edit_store) {
            $edit_store->name = $request->input('name_add');
            $edit_store->owner = $request->input('owner_add');
            $edit_store->address = $request->input('address_add');
            $edit_store->save();
            
            return redirect('toko-admin')->with('success', 'Berhasil diubah');
        }
        return redirect('toko-admin')->withErrors('Silahkan isikan kembali');
    }
    
    function delete_store($id) {
        $delete_store = store::find($id);
        
        if($delete_store){
            $delete_store->delete();
            return redirect('toko-admin')->with('success', 'Berhasil dihapus');
        }
        return redirect('toko-admin')->withErrors('Silahkan ulangi kembali');
    }
    
    function edit_ins(Request $request, $id) {
        $edit_product_in = product_in::find($id);
        $edit_product = product::where('id', '=', $edit_product_in->products)->first();
        
        if ($edit_product_in) {
            
            $edit_product->name = $request->input('name_add');
            $edit_product->from = $request->input('from_add');
            $edit_product->stock = $request->input('total_add');
            $edit_product->price = $request->input('price_add');
            $edit_product->save();
            
            $edit_product_in->from = $request->input('from_add');
            $edit_product_in->total = $request->input('total_add');
            $edit_product_in->price = $request->input('price_add');
            $edit_product_in->save();
            
            return redirect('product-in-admin')->with('success', 'Berhasil diubah');
        }
        return redirect('product-in-admin')->withErrors('Silahkan isikan kembali');
    }
    
    function delete_product_in($id) {
        $delete_store = product_in::find($id);
        
        if($delete_store){
            $delete_store->delete();
            return redirect('product-in-admin')->with('success', 'Berhasil dihapus');
        }
        return redirect('product-in-admin')->withErrors('Silahkan ulangi kembali');
    }
    
    function delete_product($id) {
        $delete = product::find($id);
        
        if ($delete) {
            $delete->delete();
            return redirect('barang-admin')->with('success', 'Berhasil dhapus');
        }
        return redirect('barang-admin')->withErrors('Silahkan ulangi kembali');
    }
    
    
    function add_product_out(Request $request) {
        $product_out = new product_out();
        
        // $product_out->products = $request->input('name_selected');
        $product_out->stores = $request->input('name_selected');
        $product_out->price = 0;
        $product_out->date = $request->input('date_add');
        $product_out->method = $request->input('method_selected_add');
        $product_out->status = $request->input('status_selected');
        if($request->has('bon_add')) {
            $product_out->amount = $request->input('bon_add');
        }
        if($request->has('date_tempo_add')) {
            $product_out->date_tempo = $request->input('date_tempo_add');
        }
        $product_out->save();
        
        return redirect('product-out-admin')->with('success', 'Barang keluar berhasil ditambahkan');
        
    }
    function delete_product_out($id) {
        $delete_product_out = product_out::find($id);
        
        if($delete_product_out){
            $delete_product_out->delete();
            return redirect('product-out-admin')->with('success', 'Berhasil dihapus');
        }
        return redirect('product-out-admin')->withErrors('Silahkan ulangi kembali');
    }
    
    function add_product_on_product_out(Request $request, $id) {
        $add_product = new detail_product_out();
        
        $add_product->product_outs = $id;
        $add_product->products = $request->input('product_selected');
        $add_product->quantity = $request->input('quantity_add');
        $add_product->subtotal = $request->input('price_add');
        
        $add_product->save();
        
        return redirect('product-out-admin')->with('success', 'Barang berhasil ditambahkan');
    }
    
    function edit_product_out(Request $request, $id) {
        $edit = product_out::find($id);
        
        
        if($request->input('method_selected') === 'cash') {
            
            if($request->has('method_selected')) {
                $edit->method = $request->input('method_selected');
            }
            if($request->has('bon_add')){
                $edit->amount = '';
            }
            if($request->has('date_tempo_add')) {
                $edit->date_tempo = '';
            }
            if($request->has('status_selected')) {
                $edit->status = $request->input('status_selected');
            }
            if ($request->has('date_add')) {
                $edit->date = $request->input('date_add');
            }
            
            $edit->save();
            
            return redirect('product-out-admin')->with('success', 'Barang berhasil ditambahkan');
        }
            if($request->has('method_selected')) {
                $edit->method = $request->input('method_selected');
            }
            if($request->has('bon_add')){
                $edit->amount = $request->input('bon_add');
            }
            if($request->has('date_tempo_add')) {
                $edit->date_tempo = $request->input('date_tempo_add');
            }
            if($request->has('status_selected')) {
                $edit->status = $request->input('status_selected');
            }
            if ($request->has('date_add')) {
                $edit->date = $request->input('date_add');
            }
            
            $edit->save();
            
            return redirect('product-out-admin')->with('success', 'Barang berhasil ditambahkan');
    }
}
