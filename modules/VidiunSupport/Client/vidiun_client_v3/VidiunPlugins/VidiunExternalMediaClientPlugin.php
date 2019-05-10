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
class VidiunExternalMediaEntryOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const DURATION_ASC = "+duration";
	const END_DATE_ASC = "+endDate";
	const LAST_PLAYED_AT_ASC = "+lastPlayedAt";
	const MEDIA_TYPE_ASC = "+mediaType";
	const MODERATION_COUNT_ASC = "+moderationCount";
	const NAME_ASC = "+name";
	const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
	const PLAYS_ASC = "+plays";
	const RANK_ASC = "+rank";
	const RECENT_ASC = "+recent";
	const START_DATE_ASC = "+startDate";
	const TOTAL_RANK_ASC = "+totalRank";
	const UPDATED_AT_ASC = "+updatedAt";
	const VIEWS_ASC = "+views";
	const WEIGHT_ASC = "+weight";
	const CREATED_AT_DESC = "-createdAt";
	const DURATION_DESC = "-duration";
	const END_DATE_DESC = "-endDate";
	const LAST_PLAYED_AT_DESC = "-lastPlayedAt";
	const MEDIA_TYPE_DESC = "-mediaType";
	const MODERATION_COUNT_DESC = "-moderationCount";
	const NAME_DESC = "-name";
	const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
	const PLAYS_DESC = "-plays";
	const RANK_DESC = "-rank";
	const RECENT_DESC = "-recent";
	const START_DATE_DESC = "-startDate";
	const TOTAL_RANK_DESC = "-totalRank";
	const UPDATED_AT_DESC = "-updatedAt";
	const VIEWS_DESC = "-views";
	const WEIGHT_DESC = "-weight";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunExternalMediaSourceType
{
	const INTERCALL = "InterCall";
	const YOUTUBE = "YouTube";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunExternalMediaEntry extends VidiunMediaEntry
{
	/**
	 * The source type of the external media
	 * 	 
	 *
	 * @var VidiunExternalMediaSourceType
	 * @insertonly
	 */
	public $externalSourceType = null;

	/**
	 * Comma separated asset params ids that exists for this external media entry
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $assetParamsIds = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunExternalMediaEntryListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunExternalMediaEntry
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
abstract class VidiunExternalMediaEntryBaseFilter extends VidiunMediaEntryFilter
{
	/**
	 * 
	 *
	 * @var VidiunExternalMediaSourceType
	 */
	public $externalSourceTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $externalSourceTypeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $assetParamsIdsMatchOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $assetParamsIdsMatchAnd = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunExternalMediaEntryFilter extends VidiunExternalMediaEntryBaseFilter
{

}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunExternalMediaService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add external media entry
	 * 
	 * @param VidiunExternalMediaEntry $entry 
	 * @return VidiunExternalMediaEntry
	 */
	function add(VidiunExternalMediaEntry $entry)
	{
		$vparams = array();
		$this->client->addParam($vparams, "entry", $entry->toParams());
		$this->client->queueServiceActionCall("externalmedia_externalmedia", "add", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunExternalMediaEntry");
		return $resultObject;
	}

	/**
	 * Get external media entry by ID.
	 * 
	 * @param string $id External media entry id
	 * @return VidiunExternalMediaEntry
	 */
	function get($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("externalmedia_externalmedia", "get", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunExternalMediaEntry");
		return $resultObject;
	}

	/**
	 * Update external media entry. Only the properties that were set will be updated.
	 * 
	 * @param string $id External media entry id to update
	 * @param VidiunExternalMediaEntry $entry External media entry object to update
	 * @return VidiunExternalMediaEntry
	 */
	function update($id, VidiunExternalMediaEntry $entry)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->addParam($vparams, "entry", $entry->toParams());
		$this->client->queueServiceActionCall("externalmedia_externalmedia", "update", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunExternalMediaEntry");
		return $resultObject;
	}

	/**
	 * Delete a external media entry.
	 * 
	 * @param string $id External media entry id to delete
	 * @return 
	 */
	function delete($id)
	{
		$vparams = array();
		$this->client->addParam($vparams, "id", $id);
		$this->client->queueServiceActionCall("externalmedia_externalmedia", "delete", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
		return $resultObject;
	}

	/**
	 * List media entries by filter with paging support.
	 * 
	 * @param VidiunExternalMediaEntryFilter $filter External media entry filter
	 * @param VidiunFilterPager $pager Pager
	 * @return VidiunExternalMediaEntryListResponse
	 */
	function listAction(VidiunExternalMediaEntryFilter $filter = null, VidiunFilterPager $pager = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($vparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("externalmedia_externalmedia", "list", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunExternalMediaEntryListResponse");
		return $resultObject;
	}

	/**
	 * Count media entries by filter.
	 * 
	 * @param VidiunExternalMediaEntryFilter $filter External media entry filter
	 * @return int
	 */
	function count(VidiunExternalMediaEntryFilter $filter = null)
	{
		$vparams = array();
		if ($filter !== null)
			$this->client->addParam($vparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("externalmedia_externalmedia", "count", $vparams);
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
class VidiunExternalMediaClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunExternalMediaService
	 */
	public $externalMedia = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->externalMedia = new VidiunExternalMediaService($client);
	}

	/**
	 * @return VidiunExternalMediaClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunExternalMediaClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'externalMedia' => $this->externalMedia,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'externalMedia';
	}
}

