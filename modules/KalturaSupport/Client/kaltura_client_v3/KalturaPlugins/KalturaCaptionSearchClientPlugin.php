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
require_once(dirname(__FILE__) . "/VidiunCaptionClientPlugin.php");

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCaptionAssetItem extends VidiunObjectBase
{
	/**
	 * The Caption Asset object
	 * 	 
	 *
	 * @var VidiunCaptionAsset
	 */
	public $asset;

	/**
	 * The entry object
	 * 	 
	 *
	 * @var VidiunBaseEntry
	 */
	public $entry;

	/**
	 * 
	 *
	 * @var int
	 */
	public $startTime = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $endTime = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $content = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCaptionAssetItemListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunCaptionAssetItem
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
class VidiunCaptionAssetItemFilter extends VidiunCaptionAssetFilter
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $contentLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $contentMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $contentMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $partnerDescriptionLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $partnerDescriptionMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $partnerDescriptionMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var VidiunLanguage
	 */
	public $languageEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $languageIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $labelEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $labelIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $startTimeGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $startTimeLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $endTimeGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $endTimeLessThanOrEqual = null;


}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCaptionAssetItemService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Search caption asset items by filter, pager and free text
	 * 
	 * @param VidiunBaseEntryFilter $entryFilter 
	 * @param VidiunCaptionAssetItemFilter $captionAssetItemFilter 
	 * @param VidiunFilterPager $captionAssetItemPager 
	 * @return VidiunCaptionAssetItemListResponse
	 */
	function search(VidiunBaseEntryFilter $entryFilter = null, VidiunCaptionAssetItemFilter $captionAssetItemFilter = null, VidiunFilterPager $captionAssetItemPager = null)
	{
		$vparams = array();
		if ($entryFilter !== null)
			$this->client->addParam($vparams, "entryFilter", $entryFilter->toParams());
		if ($captionAssetItemFilter !== null)
			$this->client->addParam($vparams, "captionAssetItemFilter", $captionAssetItemFilter->toParams());
		if ($captionAssetItemPager !== null)
			$this->client->addParam($vparams, "captionAssetItemPager", $captionAssetItemPager->toParams());
		$this->client->queueServiceActionCall("captionsearch_captionassetitem", "search", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunCaptionAssetItemListResponse");
		return $resultObject;
	}

	/**
	 * Search caption asset items by filter, pager and free text
	 * 
	 * @param VidiunBaseEntryFilter $entryFilter 
	 * @param VidiunCaptionAssetItemFilter $captionAssetItemFilter 
	 * @param VidiunFilterPager $captionAssetItemPager 
	 * @return VidiunBaseEntryListResponse
	 */
	function searchEntries(VidiunBaseEntryFilter $entryFilter = null, VidiunCaptionAssetItemFilter $captionAssetItemFilter = null, VidiunFilterPager $captionAssetItemPager = null)
	{
		$vparams = array();
		if ($entryFilter !== null)
			$this->client->addParam($vparams, "entryFilter", $entryFilter->toParams());
		if ($captionAssetItemFilter !== null)
			$this->client->addParam($vparams, "captionAssetItemFilter", $captionAssetItemFilter->toParams());
		if ($captionAssetItemPager !== null)
			$this->client->addParam($vparams, "captionAssetItemPager", $captionAssetItemPager->toParams());
		$this->client->queueServiceActionCall("captionsearch_captionassetitem", "searchEntries", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunBaseEntryListResponse");
		return $resultObject;
	}
}
/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCaptionSearchClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunCaptionAssetItemService
	 */
	public $captionAssetItem = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->captionAssetItem = new VidiunCaptionAssetItemService($client);
	}

	/**
	 * @return VidiunCaptionSearchClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunCaptionSearchClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'captionAssetItem' => $this->captionAssetItem,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'captionSearch';
	}
}

