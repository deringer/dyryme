<?php namespace Dyrme\Models;

class AclGroup extends \Eloquent {

	protected $table = 'acl_groups';

	protected $fillable = [ 'name', 'description', ];

	public $timestamps = false;


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function users()
	{
		return $this->belongsToMany('Dyryme\Models\User', 'acl_user_group');
	}


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function permissions()
	{
		return $this->belongsToMany('Dyryme\Models\AclPermission', 'acl_group_permission');
	}
}
