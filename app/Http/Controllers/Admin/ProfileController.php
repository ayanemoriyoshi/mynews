<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

class ProfileController extends Controller
{

        //1つ目
        public function add()
        {
        return view('admin.profile.create');
        
            
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
    
     public function create(Request $request)
  {
    // 以下を追記
      // Varidationを行う
      $this->validate($request, Profile::$rules);
      $profiles = new Profile;
      $form = $request->all();
      
      $profiles->fill($form);
      $profiles->save();
      
      // admin/news/createにリダイレクトする
      return redirect('admin/profile/create');
  }  
}
