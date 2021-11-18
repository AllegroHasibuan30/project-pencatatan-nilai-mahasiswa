<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    protected $table = "tblkelas";
    protected $fillable = ["nama","jurusan","semester","nilai"];

    public function getNamaJurusanAttribute(){
        $namajurusan = "";
        if($this->jurusan=="si"){
            $namajurusan = "Sistem Informasi";
        }elseif($this->jurusan=="ti"){
            $namajurusan = "Teknik Informatika";
        }

        return $namajurusan;
        }

        public function getNamaSemesterAttribute(){
            $namasemester ="";
            switch ($this->semester){
                case 1 :
                        $namasemester = "I";
                        break;
                case 2 :
                        $namasemester = "II";
                        break;
                case 3 :
                        $namasemester = "III";
                        break;
                case 4 :
                        $namasemester = "IV";
                        break;
                case 5 :
                        $namasemester = "V";
                        break;
                case 6 :
                        $namasemester = "VI";
                        break;
                case 7 :
                        $namasemester = "VII";
                        break;
                case 8 :
                        $namasemester = "VIII";
                        break;
                        
                        
            }
            return $namasemester;
        }
        public function getNamaSesiAttribute(){
            $namasesi = "";
            if($this->sesi=="p"){
                $namasesi = "Pagi";
            }elseif($this->sesi=="s"){
                $namasesi = "Sore";
            }
    
            return $namasesi;
            }
}
