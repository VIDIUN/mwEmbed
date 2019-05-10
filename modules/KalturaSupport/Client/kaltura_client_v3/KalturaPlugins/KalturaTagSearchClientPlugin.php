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
class VidiunTag extends VidiunObjectBase
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
	 * @readonly
	 */
	public $tag = null;

	/**
	 * 
	 *
	 * @var VidiunTaggedObjectType
	 * @readonly
	 */
	public $taggedObjectType = null;

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
	 * @var int
	 * @readonly
	 */
	public $instanceCount = null;

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
class VidiunTagListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunTag
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
class VidiunIndexTagsByPrivacyContextJobData extends VidiunJobData
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $changedCategoryId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $deletedPrivacyContexts = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $addedPrivacyContexts = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunTagFilter extends VidiunFilter
{
	/**
	 * 
	 *
	 * @var VidiunTaggedObjectType
	 */
	public $objectTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagStartsWith = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $instanceCountEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $instanceCountIn = null;


}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunTagService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * 
	 * 
	 * @param VidiunTagFilter $tagFilter 
	 * @param VidiunFilterPager $pager 
	 * @return VidiunTagListResponse
	 */
	function search(VidiunTagFilter $tagFilter, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		$this->client->addParam($vparams, "tagFilter", $tagFilter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("tagsearch_tag", "search", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunTagListResponse");
		return $resultObject;
	}

	/**
	 * Action goes over all tags with instanceCount==0 and checks whether they need to be removed from the DB. Returns number of removed tags.
	 * 
	 * @return int
	 */
	function deletePending()
	{
		$vparams = array();
		$this->client->queueServiceActionCall("tagsearch_tag", "deletePending", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "integer");
		return $resultObject;
	}

	/**
	 * 
	 * 
	 * @param int $categoryId 
	 * @param string $pcToDecrement 
	 * @param string $pcToIncrement 
	 * @return 
	 */
	function indexCategoryEntryTags($categoryId, $pcToDecrement, $pcToIncrement)
	{
		$vparams = array();
		$this->client->addParam($vparams, "categoryId", $categoryId);
		$this->client->addParam($vparams, "pcToDecrement", $pcToDecrement);
		$this->client->addParam($vparams, "pcToIncrement", $pcToIncrement);
		$this->client->queueServiceActionCall("tagsearch_tag", "indexCategoryEntryTags", $vparams);
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
class VidiunTagSearchClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunTagService
	 */
	public $tag = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->tag = new VidiunTagService($client);
	}

	/**
	 * @return VidiunTagSearchClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunTagSearchClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'tag' => $this->tag,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'tagSearch';
	}
}

