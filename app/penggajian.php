<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penggajian extends Model
{
    //
    protected $table='penggajians';
    protected $fillable=['id_tunjangan_pegawai','jumlah_jam_lembur','gaji_pokok','total_gaji','tanggal_pengambilan','status_pengambilan','petugas_penerima'];
    protected $visible=['id_tunjangan_pegawai','jumlah_jam_lembur','gaji_pokok','total_gaji','tanggal_pengambilan','status_pengambilan','petugas_penerima'];

     public function tunjangan_pegawai()
    {
        return $this->belongsTo('App\tunjangan_pegawai','tunjangan_pegawai_id');
    }
}
