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
class VidiunVarPartnerUsageItem extends VidiunObjectBase
{
	/**
	 * Partner ID
	 * 	 
	 *
	 * @var int
	 */
	public $partnerId = null;

	/**
	 * Partner name
	 * 	 
	 *
	 * @var string
	 */
	public $partnerName = null;

	/**
	 * Partner status
	 * 	 
	 *
	 * @var VidiunPartnerStatus
	 */
	public $partnerStatus = null;

	/**
	 * Partner package
	 * 	 
	 *
	 * @var int
	 */
	public $partnerPackage = null;

	/**
	 * Partner creation date (Unix timestamp)
	 * 	 
	 *
	 * @var int
	 */
	public $partnerCreatedAt = null;

	/**
	 * Number of player loads in the specific date range
	 * 	 
	 *
	 * @var int
	 */
	public $views = null;

	/**
	 * Number of plays in the specific date range
	 * 	 
	 *
	 * @var int
	 */
	public $plays = null;

	/**
	 * Number of new entries created during specific date range
	 * 	 
	 *
	 * @var int
	 */
	public $entriesCount = null;

	/**
	 * Total number of entries
	 * 	 
	 *
	 * @var int
	 */
	public $totalEntriesCount = null;

	/**
	 * Number of new video entries created during specific date range
	 * 	 
	 *
	 * @var int
	 */
	public $videoEntriesCount = null;

	/**
	 * Number of new image entries created during specific date range
	 * 	 
	 *
	 * @var int
	 */
	public $imageEntriesCount = null;

	/**
	 * Number of new audio entries created during specific date range
	 * 	 
	 *
	 * @var int
	 */
	public $audioEntriesCount = null;

	/**
	 * Number of new mix entries created during specific date range
	 * 	 
	 *
	 * @var int
	 */
	public $mixEntriesCount = null;

	/**
	 * The total bandwidth usage during the given date range (in MB)
	 * 	 
	 *
	 * @var float
	 */
	public $bandwidth = null;

	/**
	 * The total storage consumption (in MB)
	 * 	 
	 *
	 * @var float
	 */
	public $totalStorage = null;

	/**
	 * The added storage consumption (new uploads) during the given date range (in MB)
	 * 	 
	 *
	 * @var float
	 */
	public $storage = null;

	/**
	 * The deleted storage consumption (new uploads) during the given date range (in MB)
	 * 	 
	 *
	 * @var float
	 */
	public $deletedStorage = null;

	/**
	 * The peak amount of storage consumption during the given date range for the specific publisher
	 * 	 
	 *
	 * @var float
	 */
	public $peakStorage = null;

	/**
	 * The average amount of storage consumption during the given date range for the specific publisher
	 * 	 
	 *
	 * @var float
	 */
	public $avgStorage = null;

	/**
	 * The combined amount of bandwidth and storage consumed during the given date range for the specific publisher
	 * 	 
	 *
	 * @var float
	 */
	public $combinedStorageBandwidth = null;

	/**
	 * Amount of transcoding usage in MB
	 * 	 
	 *
	 * @var float
	 */
	public $transcodingUsage = null;

	/**
	 * TGhe date at which the report was taken - Unix Timestamp
	 * 	 
	 *
	 * @var string
	 */
	public $dateId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPartnerUsageListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var VidiunVarPartnerUsageItem
	 */
	public $total;

	/**
	 * 
	 *
	 * @var array of VidiunVarPartnerUsageItem
	 */
	public $objects;

	/**
	 * 
	 *
	 * @var int
	 */
	public $totalCount = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunVarPartnerUsageTotalItem extends VidiunVarPartnerUsageItem
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunVarConsolePartnerFilter extends VidiunPartnerFilter
{
	/**
	 * Eq filter for the partner's group type
	 *      
	 *
	 * @var VidiunPartnerGroupType
	 */
	public $groupTypeEq = null;

	/**
	 * In filter for the partner's group type
	 *      
	 *
	 * @var string
	 */
	public $groupTypeIn = null;

	/**
	 * Filter for partner permissions- filter contains comma-separated string of permission names which the returned partners should have.
	 *      
	 *
	 * @var string
	 */
	public $partnerPermissionsExist = null;


}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunVarConsoleService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Function which calulates partner usage of a group of a VAR's sub-publishers
	 * 
	 * @param VidiunPartnerFilter $partnerFilter 
	 * @param VidiunReportInputFilter $usageFilter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunPartnerUsageListResponse
	 */
	function getPartnerUsage(VidiunPartnerFilter $partnerFilter = null, VidiunReportInputFilter $usageFilter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($partnerFilter !== null)
			$this->client->addParam($vparams, "partnerFilter", $partnerFilter->toParams());
		if ($usageFilter !== null)
			$this->client->addParam($vparams, "usageFilter", $usageFilter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("varconsole_varconsole", "getPartnerUsage", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPartnerUsageListResponse");
		return $resultObject;
	}

	/**
	 * Function to change a sub-publisher's status
	 * 
	 * @param int $id 
	 * @param int $status 
	 * @return 
	 */
	function updateStatus($id, $status)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "status", $status);
		$this->client->queueServiceActionCall("varconsole_varconsole", "updateStatus", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}
}
/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunVarConsoleClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunVarConsoleService
	 */
	public $varConsole = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->varConsole = new VidiunVarConsoleService($client);
	}

	/**
	 * @return VidiunVarConsoleClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunVarConsoleClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'varConsole' => $this->varConsole,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'varConsole';
	}
}

