<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    //protected $fillable = ['nama_dokumen', 'tanggal_dokumen', 'pengedit_dokumen','status', 'catatan', 'file_dokumen'];
    protected $guarded = ['id'];


    public function scopeFilter($query, array $filters)
    {
        
    }


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
