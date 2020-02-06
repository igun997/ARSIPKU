<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Jeni
 * 
 * @property int $id
 * @property string $nama_jenis
 * @property string $kode_jenis
 * @property int $jenis_id
 * 
 * @property Jeni $jeni
 * @property Collection|Arsip[] $arsips
 * @property Collection|Jeni[] $jenis
 *
 * @package App\Models
 */
class Jeni extends Model
{
	protected $table = 'jenis';
	public $timestamps = false;

	protected $casts = [
		'jenis_id' => 'int'
	];

	protected $fillable = [
		'nama_jenis',
		'kode_jenis',
		'jenis_id'
	];

	public function jeni()
	{
		return $this->belongsTo(Jeni::class, 'jenis_id');
	}

	public function arsips()
	{
		return $this->hasMany(Arsip::class, 'jenis_id');
	}

	public function jenis()
	{
		return $this->hasMany(Jeni::class, 'jenis_id');
	}
}
