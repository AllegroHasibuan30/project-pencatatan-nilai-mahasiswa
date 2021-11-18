<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Kelas;
class kelascontroller extends Controller
{
    public function index(){
        return view('home');
    }
    public function kelas(){
        //$kelas = DB::table('tblkelas')->get();
        $kelas = Kelas::all();
        return view('kelas.kelas')->with(compact("kelas"));
    }
    public function formkelas(){
        return view('kelas.formkelas');
    }
    public function simpan(Request $request){
        $request->validate([
            'nama' =>'required|max:25',
            'ruang' =>'required|digits:3|numeric'
        ]);
       /* DB::table('tblkelas')
            ->insert([
                'nama' => $request->input('nama'),
                'jurusan' => $request->input('jurusan'),
                'semester' => $request->input('semester'),
                'ruang' => $request->input('ruang'),
                'sesi' => $request->input('sesi')
            ]);*/
            Kelas::create($request->except("_token"));
        return redirect()->route('kelas.kelas');
    }
    public function hapuskelas($id){
        /*DB::table('tblkelas')
            ->where('id',$id)->delete();*/
            Kelas::destroy($id);

        return redirect()->route("kelas.kelas");
    }
    public function rubahkelas($id){
        /*$kelas = DB::table('tblkelas')
                        ->where('id',$id)
                        ->get();*/
         $kelas = Kelas::find($id);
        return view('kelas.formkelas')->with(compact("kelas"));
    }
    public function update(Request $request,$id){
        $request->validate([
            'nama' =>'required|max:25',
            'ruang' =>'required|digits:3|numeric'
        ]);
       /* DB::table('tblkelas')
            ->where('id',$id)
            ->update([
                'nama' => $request->nama,
                'jurusan' => $request->jurusan,
                'semester' => $request->semester,
                'ruang' => $request->ruang,
                'sesi' => $request->sesi,
            ]);*/
            Kelas::find($id)
            ->update($request->except("_token"));
        return redirect()->route('kelas.kelas');
    }
}
