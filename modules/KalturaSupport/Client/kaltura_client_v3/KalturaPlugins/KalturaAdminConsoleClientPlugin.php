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
require_once(dirname(__FILE__) . "/VidiunFileSyncClientPlugin.php");

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunTrackEntryEventType
{
	const UPLOADED_FILE = 1;
	const WEBCAM_COMPLETED = 2;
	const IMPORT_STARTED = 3;
	const ADD_ENTRY = 4;
	const UPDATE_ENTRY = 5;
	const DELETED_ENTRY = 6;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUiConfAdminOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunTrackEntry extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var VidiunTrackEntryEventType
	 */
	public $trackEventType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $psVersion = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $context = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entryId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $hostName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $userId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $changedProperties = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $paramStr1 = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $paramStr2 = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $paramStr3 = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $vs = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $createdAt = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $updatedAt = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $userIp = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunTrackEntryListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunTrackEntry
	 * @readonly
	 */
	public $objects;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $totalCount = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUiConfAdmin extends VidiunUiConf
{
	/**
	 * 
	 *
	 * @var bool
	 */
	public $isPublic = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUiConfAdminListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunUiConfAdmin
	 * @readonly
	 */
	public $objects;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $totalCount = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunUiConfAdminBaseFilter extends VidiunUiConfFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUiConfAdminFilter extends VidiunUiConfAdminBaseFilter
{

}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEntryAdminService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get base entry by ID with no filters.
	 * 
	 * @param string $entryId Entry id
	 * @param int $version Desired version of the data
	 * @return VidiunBaseEntry
	 */
	function get($entryId, $version = -1)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->addParam($vparams, "version", $version);
		$this->client->queueServiceActionCall("adminconsole_entryadmin", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseEntry");
		return $resultObject;
	}

	/**
	 * Get base entry by flavor ID with no filters.
	 * 
	 * @param string $flavorId 
	 * @param int $version Desired version of the data
	 * @return VidiunBaseEntry
	 */
	function getByFlavorId($flavorId, $version = -1)
	{
		$vparams = array();
		$this->client->addParam($vparams, "flavorId", $flavorId);
		$this->client->addParam($vparams, "version", $version);
		$this->client->queueServiceActionCall("adminconsole_entryadmin", "getByFlavorId", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseEntry");
		return $resultObject;
	}

	/**
	 * Get base entry by ID with no filters.
	 * 
	 * @param string $entryId Entry id
	 * @return VidiunTrackEntryListResponse
	 */
	function getTracks($entryId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entryId", $entryId);
		$this->client->queueServiceActionCall("adminconsole_entryadmin", "getTracks", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunTrackEntryListResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUiConfAdminService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds new UIConf with no partner limitation
	 * 
	 * @param VidiunUiConfAdmin $uiConf 
	 * @return VidiunUiConfAdmin
	 */
	function add(VidiunUiConfAdmin $uiConf)
	{
		$vparams = array();
		$this->client->addParam($vparams, "uiConf", $uiConf->toParams());
		$this->client->queueServiceActionCall("adminconsole_uiconfadmin", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUiConfAdmin");
		return $resultObject;
	}

	/**
	 * Update an existing UIConf with no partner limitation
	 * 
	 * @param int $id 
	 * @param VidiunUiConfAdmin $uiConf 
	 * @return VidiunUiConfAdmin
	 */
	function update($id, VidiunUiConfAdmin $uiConf)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "uiConf", $uiConf->toParams());
		$this->client->queueServiceActionCall("adminconsole_uiconfadmin", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUiConfAdmin");
		return $resultObject;
	}

	/**
	 * Retrieve a UIConf by id with no partner limitation
	 * 
	 * @param int $id 
	 * @return VidiunUiConfAdmin
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("adminconsole_uiconfadmin", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUiConfAdmin");
		return $resultObject;
	}

	/**
	 * Delete an existing UIConf with no partner limitation
	 * 
	 * @param int $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("adminconsole_uiconfadmin", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * Retrieve a list of available UIConfs  with no partner limitation
	 * 
	 * @param VidiunUiConfFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunUiConfAdminListResponse
	 */
	function listAction(VidiunUiConfFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("adminconsole_uiconfadmin", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUiConfAdminListResponse");
		return $resultObject;
	}
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunReportAdminService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * 
	 * 
	 * @param VidiunReport $report 
	 * @return VidiunReport
	 */
	function add(VidiunReport $report)
	{
		$vparams = array();
		$this->client->addParam($vparams, "report", $report->toParams());
		$this->client->queueServiceActionCall("adminconsole_reportadmin", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunReport");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param int $id 
	 * @return VidiunReport
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("adminconsole_reportadmin", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunReport");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param VidiunReportFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunReportListResponse
	 */
	function listAction(VidiunReportFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("adminconsole_reportadmin", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunReportListResponse");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param int $id 
	 * @param VidiunReport $report 
	 * @return VidiunReport
	 */
	function update($id, VidiunReport $report)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "report", $report->toParams());
		$this->client->queueServiceActionCall("adminconsole_reportadmin", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunReport");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param int $id 
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("adminconsole_reportadmin", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param int $id 
	 * @param array $params 
	 * @return VidiunReportResponse
	 */
	function executeDebug($id, array $params = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		if ($params !== null)
			foreach($params as $index => $obj)
			{
				$this->client->addParam($vparams, "params:$index", $obj->toParams());
			}
		$this->client->queueServiceActionCall("adminconsole_reportadmin", "executeDebug", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunReportResponse");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param int $id 
	 * @return array
	 */
	function getParameters($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("adminconsole_reportadmin", "getParameters", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param int $id 
	 * @param int $reportPartnerId 
	 * @return string
	 */
	function getCsvUrl($id, $reportPartnerId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "reportPartnerId", $reportPartnerId);
		$this->client->queueServiceActionCall("adminconsole_reportadmin", "getCsvUrl", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}
}
/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAdminConsoleClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunEntryAdminService
	 */
	public $entryAdmin = null;

	/**
	 * @var VidiunUiConfAdminService
	 */
	public $uiConfAdmin = null;

	/**
	 * @var VidiunReportAdminService
	 */
	public $reportAdmin = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->entryAdmin = new VidiunEntryAdminService($client);
		$this->uiConfAdmin = new VidiunUiConfAdminService($client);
		$this->reportAdmin = new VidiunReportAdminService($client);
	}

	/**
	 * @return VidiunAdminConsoleClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunAdminConsoleClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'entryAdmin' => $this->entryAdmin,
			'uiConfAdmin' => $this->uiConfAdmin,
			'reportAdmin' => $this->reportAdmin,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'adminConsole';
	}
}

