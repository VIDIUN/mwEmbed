<?php
// ===================================================================================================
//                           _  __     _ _
//                          | |/ /__ _| | |_ _  _ _ _ __ _
//                          | ' </ _` | |  _| || | '_/ _` |
//                          |_|\_\__,_|_|\__|\_,_|_| \__,_|
//
// This file is part of the Vidiun Collaborative Media Suite which allows users
// to do with audio, video, and animation what Wiki platfroms allow them to do with
// text.
//
// Copyright (C) 2006-2011  Vidiun Inc.
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU Affero General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Affero General Public License for more details.
//
// You should have received a copy of the GNU Affero General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.
//
// @ignore
// ===================================================================================================

/**
 * @package Vidiun
 * @subpackage Client
 */
require_once(dirname(__FILE__) . "/../VidiunClientBase.php");
require_once(dirname(__FILE__) . "/../VidiunEnums.php");
require_once(dirname(__FILE__) . "/../VidiunTypes.php");

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunBulkServiceData extends VidiunObjectBase
{

}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get bulk upload batch job by id
	 * 
	 * @param int $id 
	 * @return VidiunBulkUpload
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("bulkupload_bulk", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBulkUpload");
		return $resultObject;
	}

	/**
	 * List bulk upload batch jobs
	 * 
	 * @param VidiunBulkUploadFilter $bulkUploadFilter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunBulkUploadListResponse
	 */
	function listAction(VidiunBulkUploadFilter $bulkUploadFilter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($bulkUploadFilter !== null)
			$this->client->addParam($vparams, "bulkUploadFilter", $bulkUploadFilter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("bulkupload_bulk", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBulkUploadListResponse");
		return $resultObject;
	}

	/**
	 * Serve action returns the original file.
	 * 
	 * @param int $id Job id
	 * @return file
	 */
	function serve($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("bulkupload_bulk", "serve", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * ServeLog action returns the log file for the bulk-upload job.
	 * 
	 * @param int $id Job id
	 * @return file
	 */
	function serveLog($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("bulkupload_bulk", "serveLog", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * Aborts the bulk upload and all its child jobs
	 * 
	 * @param int $id Job id
	 * @return VidiunBulkUpload
	 */
	function abort($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("bulkupload_bulk", "abort", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBulkUpload");
		return $resultObject;
	}
}
/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunBulkService
	 */
	public $bulk = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->bulk = new VidiunBulkService($client);
	}

	/**
	 * @return VidiunBulkUploadClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunBulkUploadClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'bulk' => $this->bulk,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'bulkUpload';
	}
}

