<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IncrementModel;
class IncrementController extends Controller
{
    public function index()
    {
        // mengambil data pegawai
       $data=IncrementModel::all();

    	// mengirim data pegawai ke view pegawai
    	return view('index', compact('data'));
    }
    public function tambah(){
        return view('increment');
    }
    public function input(Request $request)
    {
        $cekdatakosong = IncrementModel::all()->count();
        
        
        $input = new IncrementModel();
     if( $cekdatakosong <1 ){
        $cekincrement = IncrementModel::all();
       $input = new IncrementModel();
            $input->kode_unik = 101;
        $input->harga = $request->harga;
        $input->total = $input->kode_unik + $input->harga;
        $input->save();
       return redirect('index');
        }

        else if($cekdatakosong % 5 == 0){
            $cekincrement = IncrementModel::all();
            $input = new IncrementModel();
            $input->kode_unik = 101;
        $input->harga = $request->harga;
        $input->total = $input->kode_unik + $input->harga;
        $input->save();
       return redirect('index');
        }
        

        else{
            $cekincrement = IncrementModel::orderBy('created_at', 'DESC')->first();
            $input->kode_unik = $cekincrement->kode_unik+1;
        $input->harga = $request->harga;
        $input->total = $input->kode_unik + $input->harga;
        $input->save();
       return redirect('index');
        

    
}
        
}
}
