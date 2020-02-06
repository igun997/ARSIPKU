<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ArsipDisposisi
 * 
 * @property int $id
 * @property string $kode_surat
 * @property int $users_id
 * @property int $users_konf
 * @property Carbon $tgl_konf
 * @property Carbon $tgl_kirim
 * @property string $catatan
 * 
 * @property User $user
 * @property Arsip $arsip
 *
 * @package App\Models
 */
class ArsipDisposisi extends Model
{
	protected $table = 'arsip_disposisi';
	public $timestamps = false;

	protected $casts = [
		'users_id' => 'int',
		'users_konf' => 'int'
	];

	protected $dates = [
		'tgl_konf',
		'tgl_kirim'
	];

	protected $fillable = [
		'kode_surat',
		'users_id',
		'users_konf',
		'tgl_konf',
		'tgl_kirim',
		'catatan'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}

	public function arsip()
	{
		return $this->belongsTo(Arsip::class, 'kode_surat');
	}
}
