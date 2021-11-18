<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $table = "tblmahasiswa";
    protected $fillable = ["nim","nama","alamat","telepon"];
    protected $primaryKey = "nim";
    protected $keyType ="string";
    public function setNamaAttribute($value){
        $this -> attributes["nama"] = ucfirst(strtolower($value));

    }
    public function setAlamatAttribute($value){
        $this -> attributes["alamat"] = ucfirst(strtolower($value));

    }
}
