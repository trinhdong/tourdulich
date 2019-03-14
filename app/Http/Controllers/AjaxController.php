<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaitour;
use App\noiden;
class AjaxController extends Controller
{
    public function getNoiden($idloaitour)
    {
        $noiden = noiden::where('idloaitour',$idloaitour)->get();
        foreach ($noiden as $nd) {
            echo "<option value='".$nd->id."'>".$nd->tennoiden."</option>";
        }
    }
}
