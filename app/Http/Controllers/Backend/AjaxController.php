<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Import;
use App\Oder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Object_;

class AjaxController extends Controller
{
    public function statisticalOder()
    {
        $result = new Object_();
        $result->success = Oder::select(DB::raw('month(created_at) as thang'), DB::raw('count(*) as count'))->where('status','1')->groupBy(DB::raw('month(created_at)'))->get();
        $result->destroy = Oder::onlyTrashed()->select(DB::raw('month(created_at) as thang'), DB::raw('count(*) as count'))->groupBy(DB::raw('month(created_at)'))->get();
        return json_encode($result);
    }

    public function revenue()
    {
        $result = new Object_();
        $result->sell = Oder::select(DB::raw('month(created_at) as thang'), DB::raw('sum(payment) as total_sell'))->where('status',1)->groupBy(DB::raw('month(created_at)'))->get();
        $result->import = Import::select(DB::raw('month(date_import) as thang'), DB::raw('sum(payment) as total_import'))->where('status',1)->groupBy(DB::raw('month(date_import)'))->get();
        return json_encode($result);
    }
}
