<?php

namespace App\Http\Controllers;

use App\Models\Firms;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function SwitchFirm(Request $request)
    {
        $Result = 1;
		if (Firms::find($request->firm_id)) {
            session(['LoggedInFirmId' => $request->firm_id]);
			$Result = 0;
		}

		return response()->json(['Result' => $Result]);
    }
}
