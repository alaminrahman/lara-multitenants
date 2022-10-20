<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Multitenancy\Models\Tenant;
use DB;
use Artisan;
use Redirect;

class ShopController extends Controller
{
    public function register()
    {
        return view('shop.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            Tenant::create([
                'name' => $request->shop_name,
                'domain' => $request->domain.'.localhost',
                'database' => $request->shop_name
            ]);
    
            self::createDatabase($request->domain);
            Artisan::call('tenants:artisan "migrate --database=tenant"');

            DB::commit();
    
            return Redirect::to('http://'.$request->domain.'.localhost:8000');

        }catch(\Exception $e){
            DB::rollback();

            dd($e->getMessage(), $e->getLine());
        }
    }

    protected function createDatabase($name)
    {
        return DB::statement("CREATE DATABASE {$name} CHARACTER SET utf8 COLLATE utf8_general_ci");
    }
}
