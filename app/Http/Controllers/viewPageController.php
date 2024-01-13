<?php

namespace App\Http\Controllers;

use App\Models\detail_product_out;
use App\Models\laporan;
use App\Models\product;
use App\Models\product_in;
use App\Models\product_out;
use App\Models\store;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class viewPageController extends Controller
{
    function dash_view()
    {
        $getTransaction = OwnerController::getTransaction();
        // $profileReport = OwnerController::profileReport();
        // return $getTransaction;
        return view('template.template_dash', compact('getTransaction'));
    }

    function users_view()
    {
        $users = User::where('level', '=', 'admin')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('template.template_addAdmin', compact('users'));
    }

    function landing_view()
    {
        return view('landing.landing');
    }

    function product_in_view()
    {
        $product_ins = product_in::with('product')->paginate(10);
        $product_name = product::all();
        return view('template.template_barang_masuk', compact('product_ins', 'product_name'));
    }

    function product_out_view()
    {
        // $product_outs = product_out::orderBy('id', 'desc')->paginate(10);
        $product_outs = product_out::select('product_outs.*', 'stores.kabupaten as kabupaten', 'stores.name as name_store')
            ->join('stores', 'product_outs.stores', '=', 'stores.id')
            ->orderBy('product_outs.id', 'desc')
            ->paginate(10);
        $detail_out = detail_product_out::select('detail_product_outs.product_outs as detail_product_out', 'detail_product_outs.products as products', 'detail_product_outs.quantity as quantity', 'detail_product_outs.subtotal as subtotal', 'product_outs.id as id')
            ->join('product_outs', 'detail_product_outs.product_outs', '=', 'product_outs.id')
            ->groupBy('detail_product_outs.products', 'detail_product_outs.product_outs')
            ->selectRaw('SUM(detail_product_outs.quantity) as total_quantity')
            ->get();
        $detail_product = detail_product_out::select('detail_product_outs.products as products', 'products.name as name')
            ->join('products', 'detail_product_outs.products', '=', 'products.id')
            ->groupBy('detail_product_outs.products', 'products.name')
            ->get();
        return view('template.template_barang_keluar', compact('product_outs', 'detail_out', 'detail_product'));
    }

    function store_view()
    {
        $stores = store::orderBy('id', 'desc')->paginate(10);
        return view('template.template_toko', compact('stores'));
    }

    function stok_view()
    {
        $products = product::orderBy('id', 'desc')->paginate(10);
        return view('template.template_stok_', compact('products'));
    }

    function report_view()
    {
        $laporan = laporan::orderBy('id', 'desc')->paginate(10);

        $start_date = laporan::min('date');
        $end_date = laporan::max('date');

        $date_begin = new DateTime($start_date);
        $date_end = new DateTime($end_date);
        $date_format_begin = Carbon::parse($date_begin)->format('d-m-Y');
        $date_format_end = Carbon::parse($date_end)->format('d-m-Y');
        return view('template.template_laporan', compact('laporan', 'date_format_begin', 'date_format_end'));
    }

    function product_in_view_admin()
    {
        $product_ins = product_in::with('product')->paginate(10);
        $product_name = product::all();
        return view('template.template_barang_masuk_admin', compact('product_ins', 'product_name'));
    }

    function product_out_view_admin()
    {
        $product_outs = product_out::select('product_outs.*', 'stores.kabupaten as kabupaten', 'stores.name as name_store')
            ->join('stores', 'product_outs.stores', '=', 'stores.id')
            ->orderBy('product_outs.id', 'desc')
            ->paginate(10);

        $grouped_outs = store::select('kabupaten')->groupBy('kabupaten')->get();
        $grouped_stores = store::all();
        $product_all = product::all();

        $detail_product = detail_product_out::select('detail_product_outs.products as products', 'products.name as name')
            ->join('products', 'detail_product_outs.products', '=', 'products.id')
            ->groupBy('detail_product_outs.products', 'products.name')
            ->get();

        $detail_out = detail_product_out::select('detail_product_outs.product_outs as detail_product_out', 'detail_product_outs.products as products', 'detail_product_outs.quantity as quantity', 'detail_product_outs.subtotal as subtotal', 'product_outs.id as id')
            ->join('product_outs', 'detail_product_outs.product_outs', '=', 'product_outs.id')
            ->groupBy('detail_product_outs.products', 'detail_product_outs.product_outs')
            ->selectRaw('SUM(detail_product_outs.quantity) as total_quantity')
            ->get();

        return view('template.template_barang_keluar_admin', compact('product_outs', 'grouped_outs', 'grouped_stores', 'product_all', 'detail_product', 'detail_out'));
    }

    function store_view_admin()
    {
        $stores = store::orderBy('id', 'desc')->paginate(10);
        return view('template.template_toko_admin', compact('stores'));
    }

    function stok_view_admin()
    {
        $products = product::orderBy('id', 'desc')->paginate(10);
        return view('template.template_stok_admin', compact('products'));
    }


   
}
