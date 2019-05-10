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
class VidiunDrmProfileStatus
{
	const ACTIVE = 1;
	const DELETED = 2;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDrmProfileOrderBy
{
	const ID_ASC = "+id";
	const NAME_ASC = "+name";
	const ID_DESC = "-id";
	const NAME_DESC = "-name";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDrmProviderType
{
	const WIDEVINE = "widevine.WIDEVINE";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDrmProfile extends VidiunObjectBase
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
	 * @insertonly
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
	 * @var string
	 */
	public $description = null;

	/**
	 * 
	 *
	 * @var VidiunDrmProviderType
	 */
	public $provider = null;

	/**
	 * 
	 *
	 * @var VidiunDrmProfileStatus
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $licenseServerUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $defaultPolicy = null;

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


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDrmProfileListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunDrmProfile
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
abstract class VidiunDrmProfileBaseFilter extends VidiunFilter
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
	public $nameLike = null;

	/**
	 * 
	 *
	 * @var VidiunDrmProviderType
	 */
	public $providerEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $providerIn = null;

	/**
	 * 
	 *
	 * @var VidiunDrmProfileStatus
	 */
	public $statusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $statusIn = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDrmProfileFilter extends VidiunDrmProfileBaseFilter
{

}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDrmProfileService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Allows you to add a new DrmProfile object
	 * 
	 * @param VidiunDrmProfile $drmProfile 
	 * @return VidiunDrmProfile
	 */
	function add(VidiunDrmProfile $drmProfile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "drmProfile", $drmProfile->toParams());
		$this->client->queueServiceActionCall("drm_drmprofile", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDrmProfile");
		return $resultObject;
	}

	/**
	 * Retrieve a VidiunDrmProfile object by ID
	 * 
	 * @param int $drmProfileId 
	 * @return VidiunDrmProfile
	 */
	function get($drmProfileId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "drmProfileId", $drmProfileId);
		$this->client->queueServiceActionCall("drm_drmprofile", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDrmProfile");
		return $resultObject;
	}

	/**
	 * Update an existing VidiunDrmProfile object
	 * 
	 * @param int $drmProfileId 
	 * @param VidiunDrmProfile $drmProfile Id
	 * @return VidiunDrmProfile
	 */
	function update($drmProfileId, VidiunDrmProfile $drmProfile)
	{
		$vparams = array();
		$this->client->addParam($vparams, "drmProfileId", $drmProfileId);
		$this->client->addParam($vparams, "drmProfile", $drmProfile->toParams());
		$this->client->queueServiceActionCall("drm_drmprofile", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDrmProfile");
		return $resultObject;
	}

	/**
	 * Mark the VidiunDrmProfile object as deleted
	 * 
	 * @param int $drmProfileId 
	 * @return VidiunDrmProfile
	 */
	function delete($drmProfileId)
	{
		$vparams = array();
		$this->client->addParam($vparams, "drmProfileId", $drmProfileId);
		$this->client->queueServiceActionCall("drm_drmprofile", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDrmProfile");
		return $resultObject;
	}

	/**
	 * List VidiunDrmProfile objects
	 * 
	 * @param VidiunDrmProfileFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunDrmProfileListResponse
	 */
	function listAction(VidiunDrmProfileFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("drm_drmprofile", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDrmProfileListResponse");
		return $resultObject;
	}

	/**
	 * Retrieve a VidiunDrmProfile object by provider, if no specific profile defined return default profile
	 * 
	 * @param string $provider 
	 * @return VidiunDrmProfile
	 */
	function getByProvider($provider)
	{
		$vparams = array();
		$this->client->addParam($vparams, "provider", $provider);
		$this->client->queueServiceActionCall("drm_drmprofile", "getByProvider", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunDrmProfile");
		return $resultObject;
	}
}
/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDrmClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunDrmProfileService
	 */
	public $drmProfile = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->drmProfile = new VidiunDrmProfileService($client);
	}

	/**
	 * @return VidiunDrmClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunDrmClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'drmProfile' => $this->drmProfile,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'drm';
	}
}

