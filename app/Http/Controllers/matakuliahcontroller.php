<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Matakuliah;


class matakuliahcontroller extends Controller
{
    public function index(){
        return view('home');
    }
    public function matakuliah(){
       // $matakuliah = DB::table("tblmatakuliah")->get();
       $matakuliah = Matakuliah::all();
        return view('matakuliah.matakuliah')->with(compact("matakuliah"));
    }
    public function formmata(){
        return view('matakuliah.formmata');
    }
    public function simpan(Request $request){
        $request->validate([
            'nama' =>'required|max:25'
        ]);
        /*DB::table('tblmatakuliah')
            ->insert([
                'nama' => $request->input('nama'),
                'jurusan' => $request->input('jurusan'),
                'semester' => $request->input('semester')
            ]);*/
            Matakuliah::create($request->except("_token"));
        return redirect()->route('matakuliah.matakuliah');
    }
    public function hapusmatkul($id){
        /*DB::table('tblmatakuliah')
            ->where('id',$id)->delete();*/
            Matakuliah::destroy($id);

        return redirect()->route("matakuliah.matakuliah");
    }
    public function rubahmatkul($id){
       /* $matakuliah = DB::table('tblmatakuliah')
                        ->where('id',$id)
                        ->get();*/
        $matakuliah = Matakuliah::find($id);
        return view('matakuliah.formmata')->with(compact("matakuliah"));
    }
    public function update(Request $request,$id){
        $request->validate([
            'nama' =>'required|max:25'
        ]);
       /* DB::table('tblmatakuliah')
            ->where('id',$id)
            ->update([
                'nama' => $request->nama,
                'jurusan' => $request->jurusan,
                'semester' => $request->semester,
            ]);*/
            Matakuliah::find($id)
            ->update($request->except("_token"));
        return redirect()->route('matakuliah.matakuliah');
    }
}