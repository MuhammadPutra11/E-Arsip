<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    //protected $fillable = ['nama_dokumen', 'tanggal_dokumen', 'pengedit_dokumen','status', 'catatan', 'file_dokumen'];
    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'nama_suratkeluar', 'tanggal_suratkeluar', 'pengirim', 'catatan', 'file_suratkeluar'];



    public function scopeFilter($query, array $filters)
    {
        
    }


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
