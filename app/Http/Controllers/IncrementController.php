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
        //$cekjumlahdata = IncrementModel::all()->count(); // menghitung jumlah data pada table
        
        
        $input = new IncrementModel();
    
        $cekincrement = IncrementModel::orderBy('created_at', 'DESC')->first(); //memakai data yang terakhir diinput berdasarkan kolom created_at
         if($cekincrement->kode_unik % 5 == 0){// jika jumlah data 5 dibagi 5 = 0
          
            $input = new IncrementModel();
            $input->kode_unik = 101; //membuat nilai kode unik dengan nilai awal 101
        $input->harga = $request->harga; 
        $input->total = $input->kode_unik + $input->harga;
        $input->save();
       return redirect('index');
        }
        

        else{
            //$cekincrement = IncrementModel::orderBy('created_at', 'DESC')->first(); //memakai data yang terakhir diinput berdasarkan kolom created_at
            $input->kode_unik = $cekincrement->kode_unik+1;// menjumlah data kode_unik menggunakan data kode_unik sebelumnya
        $input->harga = $request->harga;
        $input->total = $input->kode_unik + $input->harga;
        $input->save();
       return redirect('index');
        

    
}
        
}
}
