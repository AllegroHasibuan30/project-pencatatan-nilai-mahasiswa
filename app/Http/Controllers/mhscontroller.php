<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mahasiswa;

class mhscontroller extends Controller
{
    //
    public function home(){
        return view ("home");
    }
    public function listmahasiswa(){
      //  $data = DB::table("tblmahasiswa")->get();
      $data = Mahasiswa::all();
        return view("mahasiswa.list")->with(compact("data"));
    }
    public function formmahasiswa(){
        return view ("mahasiswa.form");
    }

    public function simpanform(Request $request){
        $request->validate([
            'nim' => 'required|digits:10|numeric|unique:tblmahasiswa',
            'nama' => 'required|max:25',
            'alamat' => 'required|max:100',
            'telepon' => 'digits_between:7,15|numeric'
        ]);

        /* DB::table('tblmahasiswa')->insert(
             ['nim' =>$request->input("nim"),
             'nama' =>$request->input("nama"),
             'alamat' =>$request->input("alamat"),
             'telepon' =>$request->input("telepon")]
         );*/

       /* $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = $request->input("nim");
        $mahasiswa->nama = $request->input("nama");
        $mahasiswa->alamat = $request->input("alamat");
        $mahasiswa->telepon = $request->input("telepon");
        $mahasiswa->save();*/

        Mahasiswa::create($request->except("_token"));
        

        return redirect()->route('list.mahasiswa');
       
    }
   
    public function rubahmahasiswa($nim){
        /*$data = DB::table('tblmahasiswa')
                        ->where('nim',$nim)
                        ->get();*/

        $data = Mahasiswa::find($nim);

        

        return view('mahasiswa.form')->with(compact("data"));
    }
    public function updatemahasiswa(Request $request,$nim){
        $request->validate([
            'nim' => 'required|digits:10|numeric|unique:tblmahasiswa',
            'nama' => 'required|max:25',
            'alamat' => 'required|max:100',
            'telepon' => 'digits_between:7,15|numeric'
        ]);
        /*DB::table('tblmahasiswa')
            ->where('nim',$nim)
            ->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
            ]); */
            /*$mahasiswa = Mahasiswa::find($nim);
            $mahasiswa->nama = $request->nama;
            $mahasiswa->alamat = $request->alamat;
            $mahasiswa->telepon = $request->telepon;
            $mahasiswa->save();*/

            Mahasiswa::find($nim)
            ->update($request->except("_token"));

        return redirect()->route('list.mahasiswa');
    }
    
    public function deletemahasiswa($nim){
        /*DB::table('tblmahasiswa')
            ->where('nim',$nim)->delete();*/
            Mahasiswa::destroy($nim);

        return redirect()->route("list.mahasiswa");
    }

    
}
