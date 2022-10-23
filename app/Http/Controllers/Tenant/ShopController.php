<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Multitenancy\Models\Tenant;
use App\Models\User;
use DB;
use Artisan;
use Redirect;
use Session;

class ShopController extends Controller
{
    public function register()
    {
        return view('shop.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'shop_name' => 'required',
            'domain' => 'required',
        ]);

        DB::beginTransaction();
        try{
            $tenant = Tenant::create([
                'name' => $request->shop_name,
                'domain' => $request->domain.'.localhost',
                'database' => $request->domain
            ]);

            if($tenant){
                Session::put('domain', $request->domain);
                self::createDatabase($request->domain);
                Artisan::call('tenants:artisan "migrate --database=tenant"');

            }

            DB::commit();
            return Redirect::to('http://'.$request->domain.'.localhost:8000/users/form?tenant='.$request->domain);
            

        }catch(\Exception $e){
            DB::rollback();

            dd($e->getMessage(), $e->getLine());
        }
    }

    public function user_form(Request $request)
    {
        return view('shop.user_store', ['tenant' => $request->tenant]);
    }

    public function user_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            
        ]);

        return Redirect::to('http://'.$request->domain.'.localhost:8000');
    }

    protected function createDatabase($name)
    {
        return DB::statement("CREATE DATABASE {$name} CHARACTER SET utf8 COLLATE utf8_general_ci");
    }
}
