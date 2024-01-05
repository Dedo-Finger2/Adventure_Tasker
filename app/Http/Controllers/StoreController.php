<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        return view('store.stores');
    }

    public function itemStore()
    {
        return view('store.item-store');
    }
}
