<?php

namespace App\Http\Controllers;

use App\Kota;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    public function city($id)
    {
        $kota = Kota::with('provinsi')->where('kotas.id_prov', $id)->get();
        $output = '<label for="email"
                                       class="col-md-4 col-form-label text-md-right">City</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="id_kota">';
        foreach ($kota as $item) {
            $output .= '<option value=' . $item->id . '>' . $item->kota . '</option>';
        }
        $output .= '</select >
                                </div > ';
        return $output;
    }
}
