<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ArsipLock
 * 
 * @property int $id
 * @property string $kode_surat
 * @property string $status_lock
 * @property Carbon $tgl_lock
 * @property string $catatan
 * 
 * @property Arsip $arsip
 *
 * @package App\Models
 */
class ArsipLock extends Model
{
	protected $table = 'arsip_lock';
	public $timestamps = false;

	protected $dates = [
		'tgl_lock'
	];

	protected $fillable = [
		'kode_surat',
		'status_lock',
		'tgl_lock',
		'catatan'
	];

	public function arsip()
	{
		return $this->belongsTo(Arsip::class, 'kode_surat');
	}
}
