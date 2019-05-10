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
class VidiunVirusFoundAction
{
	const NONE = 0;
	const DELETE = 1;
	const CLEAN_NONE = 2;
	const CLEAN_DELETE = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunVirusScanJobResult
{
	const SCAN_ERROR = 1;
	const FILE_IS_CLEAN = 2;
	const FILE_WAS_CLEANED = 3;
	const FILE_INFECTED = 4;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunVirusScanProfileStatus
{
	const DISABLED = 1;
	const ENABLED = 2;
	const DELETED = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunVirusScanEngineType
{
	const CLAMAV_SCAN_ENGINE = "clamAVScanEngine.ClamAV";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunVirusScanProfileOrderBy
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
class VidiunVirusScanProfile extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $updatedAt = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * 
	 *
	 * @var VidiunVirusScanProfileStatus
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var VidiunVirusScanEngineType
	 */
	public $engineType = null;

	/**
	 * 
	 *
	 * @var VidiunBaseEntryFilter
	 */
	public $entryFilter;

	/**
	 * 
	 *
	 * @var VidiunVirusFoundAction
	 */
	public $actionIfInfected = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunVirusScanProfileListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunVirusScanProfile
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
class VidiunParseCaptionAssetJobData extends VidiunJobData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $captionAssetId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunVirusScanJobData extends VidiunJobData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $srcFilePath = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorAssetId = null;

	/**
	 * 
	 *
	 * @var VidiunVirusScanJobResult
	 */
	public $scanResult = null;

	/**
	 * 
	 *
	 * @var VidiunVirusFoundAction
	 */
	public $virusFoundAction = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunVirusScanProfileBaseFilter extends VidiunFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $idEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $createdAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $createdAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $updatedAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $updatedAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $partnerIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $nameEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $nameLike = null;

	/**
	 * 
	 *
	 * @var VidiunVirusScanProfileStatus
	 */
	public $statusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $statusIn = null;

	/**
	 * 
	 *
	 * @var VidiunVirusScanEngineType
	 */
	public $engineTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $engineTypeIn = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunVirusScanProfileFilter extends VidiunVirusScanProfileBaseFilter
{

}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunVirusScanProfileService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * List virus scan profile objects by filter and pager
	 * 
	 * @param VidiunVirusScanProfileFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunVirusScanProfileListResponse
	 */
	function listAction(VidiunVirusScanProfileFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("virusscan_virusscanprofile", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunVirusScanProfileListResponse");
		return $resultObject;
	}

	/**
	 * Allows you to add an virus scan profile object and virus scan profile content associated with Vidiun object
	 * 
	 * @param VidiunVirusScanProfile $virusScanProfile 
	 * @return VidiunVirusScanProfile
	 */
	function add(VidiunVirusScanProfile $virusScanProfile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "virusScanProfile", $virusScanProfile->toParams());
		$this->client->queueServiceActionCall("virusscan_virusscanprofile", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunVirusScanProfile");
		return $resultObject;
	}

	/**
	 * Retrieve an virus scan profile object by id
	 * 
	 * @param int $virusScanProfileId 
	 * @return VidiunVirusScanProfile
	 */
	function get($virusScanProfileId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "virusScanProfileId", $virusScanProfileId);
		$this->client->queueServiceActionCall("virusscan_virusscanprofile", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunVirusScanProfile");
		return $resultObject;
	}

	/**
	 * Update exisitng virus scan profile, it is possible to update the virus scan profile id too
	 * 
	 * @param int $virusScanProfileId 
	 * @param VidiunVirusScanProfile $virusScanProfile Id
	 * @return VidiunVirusScanProfile
	 */
	function update($virusScanProfileId, VidiunVirusScanProfile $virusScanProfile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "virusScanProfileId", $virusScanProfileId);
		$this->client->addParam($vparams, "virusScanProfile", $virusScanProfile->toParams());
		$this->client->queueServiceActionCall("virusscan_virusscanprofile", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunVirusScanProfile");
		return $resultObject;
	}

	/**
	 * Mark the virus scan profile as deleted
	 * 
	 * @param int $virusScanProfileId 
	 * @return VidiunVirusScanProfile
	 */
	function delete($virusScanProfileId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "virusScanProfileId", $virusScanProfileId);
		$this->client->queueServiceActionCall("virusscan_virusscanprofile", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunVirusScanProfile");
		return $resultObject;
	}

	/**
	 * Scan flavor asset according to virus scan profile
	 * 
	 * @param string $flavorAssetId 
	 * @param int $virusScanProfileId 
	 * @return int
	 */
	function scan($flavorAssetId, $virusScanProfileId = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "flavorAssetId", $flavorAssetId);
		$this->client->addParam($vparams, "virusScanProfileId", $virusScanProfileId);
		$this->client->queueServiceActionCall("virusscan_virusscanprofile", "scan", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}
}
/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunVirusScanClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunVirusScanProfileService
	 */
	public $virusScanProfile = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->virusScanProfile = new VidiunVirusScanProfileService($client);
	}

	/**
	 * @return VidiunVirusScanClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunVirusScanClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'virusScanProfile' => $this->virusScanProfile,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'virusScan';
	}
}

