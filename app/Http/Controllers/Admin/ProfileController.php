<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\ProfilesHistory;
use Carbon\Carbon;

class ProfileController extends Controller
{

        public function add()
        {
        return view('admin.profile.create');
        }
       
       
        
        public function edit(Request $request)
        {
          
          $profiles = Profile::find($request->id);
          if (empty($profiles)) {
            abort(404);    
          }
          return view('admin.profile.edit', ['profiles_form' => $profiles]);
        }
        
        
        public function uptate(Request $request)
        {
              // Validationをかける
            $this->validate($request, Profile::$rules);
              // News Modelからデータを取得する
            $profiles = Profile::find($request->id);
              // 送信されてきたフォームデータを格納する
            $profiles_form = $request->all();
            unset($profiles_form['_token']);
        
              // 該当するデータを上書きして保存する
            $profiles->fill($profiles_form)->save();
            
            $profileshistory = new ProfilesHistory();
            $profileshistory->profiles_id = $profiles->id;
            $profileshistory->edited_at = Carbon::now();
            $profileshistory->save();
            
            return redirect('admin/profile/create');
        }
    
        public function create(Request $request)
        {
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
