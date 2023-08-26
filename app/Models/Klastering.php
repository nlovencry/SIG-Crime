<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Klastering extends Model
{
    use HasFactory;
    protected $table = 'kecamatans';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nama',
        'geojson',
        'latitude',
        'longitude',
        'created_at',
        'updated_at'
    ];

    protected $primaryKey = 'id';

    public function getData($years)
    {
        $data = DB::table('datasets')
            ->select(
                'kecamatan_id',
                DB::raw('sum(curat) as curat'),
                DB::raw('sum(curas) as curas'),
                DB::raw('sum(curanmor) as curanmor')
            );
        if ($years == 'two_years') {
            $data->whereRaw('created_at >= DATE_SUB(CURDATE(), INTERVAL 2 YEAR)');
        } elseif ($years == 'one_years') {
            $data->whereRaw('created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)');
        } elseif ($years == 'three_months') {
            $data->whereRaw('created_at >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)');
        }
        return $data->groupBy('kecamatan_id')->get()
            ->toArray();
    }

    public function hitungBaris()
    {
        return DB::table('datasets')->groupBy('kecamatan_id')->count();
    }

    public function getNama()
    {
        return DB::table('kecamatans')
            ->join('datasets', 'kecamatans.id', '=', 'datasets.kecamatan_id')
            ->select('kecamatans.nama')
            ->groupBy('kecamatans.id')
            ->get()
            ->toArray();
    }

    public function getKecamatan()
    {
        return DB::table('kecamatans')->get()->toArray();
    }

    //get relasi
    public function getRel($years)
    {
        $data = DB::table('kecamatans')
            ->join('datasets', 'kecamatans.id', '=', 'datasets.kecamatan_id')
            ->select(
                'kecamatans.*',
                DB::raw('sum(curat) as curat'),
                DB::raw('sum(curas) as curas'),
                DB::raw('sum(curanmor) as curanmor')
            );
        if ($years == 'two_years') {
            $data->whereRaw('datasets.created_at >= DATE_SUB(CURDATE(), INTERVAL 2 YEAR)');
        } elseif ($years == 'one_years') {
            $data->whereRaw('datasets.created_at >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)');
        } elseif ($years == 'three_months') {
            $data->whereRaw('datasets.created_at >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)');
        }
        return $data->groupBy('datasets.kecamatan_id')
            ->get()
            ->toArray();
    }
}
