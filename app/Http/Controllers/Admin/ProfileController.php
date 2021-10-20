<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

        //1つ目
        public function add()
        {
        return view('admin.profile.create');
        
            
        }
        //2つ目
        public function create()
        {
            return redirect('admin/profile/create');
        }
    
    
        //3つ目
        public function edit()
        {
            return view('admin.profile.create');
        }
    
    
    
        //4つ目
        public function uptate()
        {
            return redirect('admin/profile/create');
        }
    
}
