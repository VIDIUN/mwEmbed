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
class VidiunSystemPartnerLimitType
{
	const ACCESS_CONTROLS = "ACCESS_CONTROLS";
	const ADMIN_LOGIN_USERS = "ADMIN_LOGIN_USERS";
	const BULK_SIZE = "BULK_SIZE";
	const END_USERS = "END_USERS";
	const ENTRIES = "ENTRIES";
	const LIVE_STREAM_INPUTS = "LIVE_STREAM_INPUTS";
	const LIVE_STREAM_OUTPUTS = "LIVE_STREAM_OUTPUTS";
	const LOGIN_USERS = "LOGIN_USERS";
	const MONTHLY_BANDWIDTH = "MONTHLY_BANDWIDTH";
	const MONTHLY_STORAGE = "MONTHLY_STORAGE";
	const MONTHLY_STORAGE_AND_BANDWIDTH = "MONTHLY_STORAGE_AND_BANDWIDTH";
	const MONTHLY_STREAM_ENTRIES = "MONTHLY_STREAM_ENTRIES";
	const PUBLISHERS = "PUBLISHERS";
	const USER_LOGIN_ATTEMPTS = "USER_LOGIN_ATTEMPTS";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSystemPartnerLimit extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var VidiunSystemPartnerLimitType
	 */
	public $type = null;

	/**
	 * 
	 *
	 * @var float
	 */
	public $max = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSystemPartnerConfiguration extends VidiunObjectBase
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
	 * @var string
	 */
	public $partnerName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $adminName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $adminEmail = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $host = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $cdnHost = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $thumbnailHost = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerPackage = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $monitorUsage = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $moderateContent = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $rtmpUrl = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $storageDeleteFromVidiun = null;

	/**
	 * 
	 *
	 * @var VidiunStorageServePriority
	 */
	public $storageServePriority = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $vmcVersion = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $restrictThumbnailByVs = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $supportAnimatedThumbnails = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $defThumbOffset = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $defThumbDensity = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $userSessionRoleId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $adminSessionRoleId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $alwaysAllowedPermissionNames = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $importRemoteSourceForConvert = null;

	/**
	 * 
	 *
	 * @var array of VidiunPermission
	 */
	public $permissions;

	/**
	 * 
	 *
	 * @var string
	 */
	public $notificationsConfig = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $allowMultiNotification = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $loginBlockPeriod = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $numPrevPassToKeep = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $passReplaceFreq = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $isFirstLogin = null;

	/**
	 * 
	 *
	 * @var VidiunPartnerGroupType
	 */
	public $partnerGroupType = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerParentId = null;

	/**
	 * 
	 *
	 * @var array of VidiunSystemPartnerLimit
	 */
	public $limits;

	/**
	 * http/rtmp/hdnetwork
	 * 	 
	 *
	 * @var string
	 */
	public $streamerType = null;

	/**
	 * http/https, rtmp/rtmpe
	 * 	 
	 *
	 * @var string
	 */
	public $mediaProtocol = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $extendedFreeTrailExpiryReason = null;

	/**
	 * Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 */
	public $extendedFreeTrailExpiryDate = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $extendedFreeTrail = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $crmId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $crmLink = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $verticalClasiffication = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $partnerPackageClassOfService = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $enableBulkUploadNotificationsEmails = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $deliveryRestrictions = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $bulkUploadNotificationsEmail = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $internalUse = null;

	/**
	 * 
	 *
	 * @var VidiunSourceType
	 */
	public $defaultLiveStreamEntrySourceType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $liveStreamProvisionParams = null;

	/**
	 * 
	 *
	 * @var VidiunBaseEntryFilter
	 */
	public $autoModerateEntryFilter;

	/**
	 * 
	 *
	 * @var string
	 */
	public $logoutUrl = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $defaultEntitlementEnforcement = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $cacheFlavorVersion = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $apiAccessControlId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $defaultDeliveryType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $defaultEmbedCodeType = null;

	/**
	 * 
	 *
	 * @var array of VidiunString
	 */
	public $disabledDeliveryTypes;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $restrictEntryByMetadata = null;

	/**
	 * 
	 *
	 * @var VidiunLanguageCode
	 */
	public $language = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSystemPartnerPackage extends VidiunObjectBase
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
	 * @var string
	 */
	public $name = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSystemPartnerUsageItem extends VidiunObjectBase
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
	 * The change in storage consumption (new uploads) during the given date range (in MB)
	 * 	 
	 *
	 * @var float
	 */
	public $storage = null;

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
	public $combinedBandwidthStorage = null;

	/**
	 * Amount of deleted storage in MB
	 * 	 
	 *
	 * @var float
	 */
	public $deletedStorage = null;

	/**
	 * Amount of transcoding usage in MB
	 * 	 
	 *
	 * @var float
	 */
	public $transcodingUsage = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSystemPartnerUsageListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunSystemPartnerUsageItem
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
class VidiunSystemPartnerOveragedLimit extends VidiunSystemPartnerLimit
{
	/**
	 * 
	 *
	 * @var float
	 */
	public $overagePrice = null;

	/**
	 * 
	 *
	 * @var float
	 */
	public $overageUnit = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSystemPartnerUsageFilter extends VidiunFilter
{
	/**
	 * Date range from
	 * 	 
	 *
	 * @var int
	 */
	public $fromDate = null;

	/**
	 * Date range to
	 * 	 
	 *
	 * @var int
	 */
	public $toDate = null;

	/**
	 * Time zone offset
	 * 	 
	 *
	 * @var int
	 */
	public $timezoneOffset = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSystemPartnerFilter extends VidiunPartnerFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerParentIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $partnerParentIdIn = null;


}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSystemPartnerService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve all info about partner
	 This service gets partner id as parameter and accessable to the admin console partner only
	 * 
	 * @param int $partnerId X
	 * @return VidiunPartner
	 */
	function get($partnerId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "partnerId", $partnerId);
		$this->client->queueServiceActionCall("systempartner_systempartner", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPartner");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param VidiunPartnerFilter $partnerFilter 
	 * @param VidiunSystemPartnerUsageFilter $usageFilter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunSystemPartnerUsageListResponse
	 */
	function getUsage(VidiunPartnerFilter $partnerFilter = null, VidiunSystemPartnerUsageFilter $usageFilter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($partnerFilter !== null)
			$this->client->addParam($vparams, "partnerFilter", $partnerFilter->toParams());
		if ($usageFilter !== null)
			$this->client->addParam($vparams, "usageFilter", $usageFilter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("systempartner_systempartner", "getUsage", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunSystemPartnerUsageListResponse");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param VidiunPartnerFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunPartnerListResponse
	 */
	function listAction(VidiunPartnerFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("systempartner_systempartner", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunPartnerListResponse");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param int $partnerId 
	 * @param int $status 
	 * @param string $reason 
	 * @return 
	 */
	function updateStatus($partnerId, $status, $reason)
	{
		$vparams = array();
		$this->client->addParam($vparams, "partnerId", $partnerId);
		$this->client->addParam($vparams, "status", $status);
		$this->client->addParam($vparams, "reason", $reason);
		$this->client->queueServiceActionCall("systempartner_systempartner", "updateStatus", $vparams);
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
	 * @param int $partnerId 
	 * @param string $userId 
	 * @return string
	 */
	function getAdminSession($partnerId, $userId = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "partnerId", $partnerId);
		$this->client->addParam($vparams, "userId", $userId);
		$this->client->queueServiceActionCall("systempartner_systempartner", "getAdminSession", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param int $partnerId 
	 * @param VidiunSystemPartnerConfiguration $configuration 
	 * @return 
	 */
	function updateConfiguration($partnerId, VidiunSystemPartnerConfiguration $configuration)
	{
		$vparams = array();
		$this->client->addParam($vparams, "partnerId", $partnerId);
		$this->client->addParam($vparams, "configuration", $configuration->toParams());
		$this->client->queueServiceActionCall("systempartner_systempartner", "updateConfiguration", $vparams);
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
	 * @param int $partnerId 
	 * @return VidiunSystemPartnerConfiguration
	 */
	function getConfiguration($partnerId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "partnerId", $partnerId);
		$this->client->queueServiceActionCall("systempartner_systempartner", "getConfiguration", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunSystemPartnerConfiguration");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @return array
	 */
	function getPackages()
	{
		$vparams = array();
		$this->client->queueServiceActionCall("systempartner_systempartner", "getPackages", $vparams);
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
	 * @return array
	 */
	function getPackagesClassOfService()
	{
		$vparams = array();
		$this->client->queueServiceActionCall("systempartner_systempartner", "getPackagesClassOfService", $vparams);
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
	 * @return array
	 */
	function getPackagesVertical()
	{
		$vparams = array();
		$this->client->queueServiceActionCall("systempartner_systempartner", "getPackagesVertical", $vparams);
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
	 * @return array
	 */
	function getPlayerEmbedCodeTypes()
	{
		$vparams = array();
		$this->client->queueServiceActionCall("systempartner_systempartner", "getPlayerEmbedCodeTypes", $vparams);
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
	 * @return array
	 */
	function getPlayerDeliveryTypes()
	{
		$vparams = array();
		$this->client->queueServiceActionCall("systempartner_systempartner", "getPlayerDeliveryTypes", $vparams);
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
	 * @param string $userId 
	 * @param int $partnerId 
	 * @param string $newPassword 
	 * @return 
	 */
	function resetUserPassword($userId, $partnerId, $newPassword)
	{
		$vparams = array();
		$this->client->addParam($vparams, "userId", $userId);
		$this->client->addParam($vparams, "partnerId", $partnerId);
		$this->client->addParam($vparams, "newPassword", $newPassword);
		$this->client->queueServiceActionCall("systempartner_systempartner", "resetUserPassword", $vparams);
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
	 * @param VidiunUserLoginDataFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunUserLoginDataListResponse
	 */
	function listUserLoginData(VidiunUserLoginDataFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("systempartner_systempartner", "listUserLoginData", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunUserLoginDataListResponse");
		return $resultObject;
	}
}
/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSystemPartnerClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunSystemPartnerService
	 */
	public $systemPartner = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->systemPartner = new VidiunSystemPartnerService($client);
	}

	/**
	 * @return VidiunSystemPartnerClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunSystemPartnerClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'systemPartner' => $this->systemPartner,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'systemPartner';
	}
}

