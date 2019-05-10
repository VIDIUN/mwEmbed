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
class VidiunShortLinkStatus
{
	const DISABLED = 1;
	const ENABLED = 2;
	const DELETED = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunShortLinkOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const EXPIRES_AT_ASC = "+expiresAt";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const EXPIRES_AT_DESC = "-expiresAt";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunShortLink extends VidiunObjectBase
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
	 */
	public $expiresAt = null;

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
	public $userId = null;

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
	public $systemName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fullUrl = null;

	/**
	 * 
	 *
	 * @var VidiunShortLinkStatus
	 */
	public $status = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunShortLinkListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunShortLink
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
abstract class VidiunShortLinkBaseFilter extends VidiunFilter
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
	public $expiresAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $expiresAtLessThanOrEqual = null;

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
	public $userIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $userIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $systemNameEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $systemNameIn = null;

	/**
	 * 
	 *
	 * @var VidiunShortLinkStatus
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
class VidiunShortLinkFilter extends VidiunShortLinkBaseFilter
{

}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunShortLinkService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * List short link objects by filter and pager
	 * 
	 * @param VidiunShortLinkFilter $filter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunShortLinkListResponse
	 */
	function listAction(VidiunShortLinkFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("shortlink_shortlink", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunShortLinkListResponse");
		return $resultObject;
	}

	/**
	 * Allows you to add a short link object
	 * 
	 * @param VidiunShortLink $shortLink 
	 * @return VidiunShortLink
	 */
	function add(VidiunShortLink $shortLink)
	{
		$vparams = array();
		$this->client->addParam($vparams, "shortLink", $shortLink->toParams());
		$this->client->queueServiceActionCall("shortlink_shortlink", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunShortLink");
		return $resultObject;
	}

	/**
	 * Retrieve an short link object by id
	 * 
	 * @param string $id 
	 * @return VidiunShortLink
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("shortlink_shortlink", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunShortLink");
		return $resultObject;
	}

	/**
	 * Update exisitng short link
	 * 
	 * @param string $id 
	 * @param VidiunShortLink $shortLink 
	 * @return VidiunShortLink
	 */
	function update($id, VidiunShortLink $shortLink)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "shortLink", $shortLink->toParams());
		$this->client->queueServiceActionCall("shortlink_shortlink", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunShortLink");
		return $resultObject;
	}

	/**
	 * Mark the short link as deleted
	 * 
	 * @param string $id 
	 * @return VidiunShortLink
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("shortlink_shortlink", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunShortLink");
		return $resultObject;
	}

	/**
	 * Serves short link
	 * 
	 * @param string $id 
	 * @param bool $proxy Proxy the response instead of redirect
	 * @return file
	 */
	function gotoAction($id, $proxy = false)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "proxy", $proxy);
		$this->client->queueServiceActionCall("shortlink_shortlink", "goto", $vparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}
}
/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunShortLinkClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunShortLinkService
	 */
	public $shortLink = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->shortLink = new VidiunShortLinkService($client);
	}

	/**
	 * @return VidiunShortLinkClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunShortLinkClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'shortLink' => $this->shortLink,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'shortLink';
	}
}

