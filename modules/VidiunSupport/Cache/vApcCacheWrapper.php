<?php

require_once(dirname(__FILE__) . '/vBaseCacheWrapper.php');

/**
 * @package infra
 * @subpackage cache
 */
class vApcCacheWrapper extends vBaseCacheWrapper
{
	/**
	 * @return bool false on error
	 */
	public function init()
	{
		if (!function_exists('apc_fetch'))
			return false;
		return true;
	}

	/* (non-PHPdoc)
	 * @see vBaseCacheWrapper::get()
	 */
	public function get($key)
	{
		return apc_fetch($key);
	}
		
	/* (non-PHPdoc)
	 * @see vBaseCacheWrapper::set()
	 */
	public function set($key, $var, $expiry = 0)
	{
		return apc_store($key, $var, $expiry);
	}
	
	/* (non-PHPdoc)
	 * @see vBaseCacheWrapper::multiGet()
	 */
	public function multiGet($keys)
	{
		return apc_fetch($keys);
	}


	/* (non-PHPdoc)
	 * @see vBaseCacheWrapper::delete()
	 */
	public function delete($key)
	{
		return apc_delete($key);
	}
	
	/* (non-PHPdoc)
	 * @see vBaseCacheWrapper::increment()
	 */
	public function increment($key, $delta = 1)
	{
		return apc_inc($key, $delta);
	}
	
	/* (non-PHPdoc)
	 * @see vBaseCacheWrapper::decrement()
	 */
	public function decrement($key, $delta = 1)
	{
		return apc_dec($key, $delta);
	}
}
