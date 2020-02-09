<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property int $id
 * @property string $nama
 * @property string $alamat
 * @property string $no_hp
 * @property string $email
 * @property string $username
 * @property string $password
 * @property int $status
 * @property string $level
 * @property string $isLogin
 * @property Carbon $tgl_register
 *
 * @property Collection|Arsip[] $arsips
 * @property Collection|ArsipDisposisi[] $arsip_disposisis
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int'
	];

	protected $dates = [
		'tgl_register'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'nama',
		'alamat',
		'no_hp',
		'email',
		'username',
		'inisial_surat',
		'password',
		'status',
		'level',
		'isLogin',
		'tgl_register'
	];

	public function arsips()
	{
		return $this->hasMany(Arsip::class, 'users_id');
	}

	public function arsip_disposisis()
	{
		return $this->hasMany(ArsipDisposisi::class, 'users_id');
	}
}
