<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Arsip
 *
 * @property string $kode_surat
 * @property string $judul_surat
 * @property int $jenis_id
 * @property string $file_surat
 * @property string $file_surat_pdf
 * @property int $users_id
 *
 * @property Jeni $jeni
 * @property User $user
 * @property Collection|ArsipDisposisi[] $arsip_disposisis
 * @property Collection|ArsipLock[] $arsip_locks
 *
 * @package App\Models
 */
class Arsip extends Model
{
	protected $table = 'arsip';
	protected $primaryKey = 'kode_surat';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'jenis_id' => 'int',
		'users_id' => 'int'
	];

	protected $fillable = [
		'kode_surat',
		'judul_surat',
		'jenis_id',
		'file_surat',
		'file_surat_pdf',
		'users_id'
	];

	public function jeni()
	{
		return $this->belongsTo(Jeni::class, 'jenis_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}

	public function arsip_disposisis()
	{
		return $this->hasMany(ArsipDisposisi::class, 'kode_surat');
	}

	public function arsip_locks()
	{
		return $this->hasMany(ArsipLock::class, 'kode_surat');
	}
}
