<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class AdminController extends Controller
{   
    public function index()
    {
        $kecamatan = Kecamatan::count();
        
        $dataset = Dataset::count();
        return view('admin.index', compact('kecamatan','dataset'));
    }
    
}
