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
require_once(dirname(__FILE__) . "/VidiunCuePointClientPlugin.php");

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAdCuePointOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const DURATION_ASC = "+duration";
	const END_TIME_ASC = "+endTime";
	const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
	const START_TIME_ASC = "+startTime";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const DURATION_DESC = "-duration";
	const END_TIME_DESC = "-endTime";
	const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
	const START_TIME_DESC = "-startTime";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAdProtocolType
{
	const CUSTOM = "0";
	const VAST = "1";
	const VAST_2_0 = "2";
	const VPAID = "3";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAdType
{
	const VIDEO = "1";
	const OVERLAY = "2";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAdCuePoint extends VidiunCuePoint
{
	/**
	 * 
	 *
	 * @var VidiunAdProtocolType
	 * @insertonly
	 */
	public $protocolType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $sourceUrl = null;

	/**
	 * 
	 *
	 * @var VidiunAdType
	 */
	public $adType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $title = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $endTime = null;

	/**
	 * Duration in milliseconds
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $duration = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunAdCuePointBaseFilter extends VidiunCuePointFilter
{
	/**
	 * 
	 *
	 * @var VidiunAdProtocolType
	 */
	public $protocolTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $protocolTypeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $titleLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $titleMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $titleMultiLikeAnd = null;

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

	/**
	 * 
	 *
	 * @var int
	 */
	public $durationGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $durationLessThanOrEqual = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAdCuePointFilter extends VidiunAdCuePointBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAdCuePointClientPlugin extends VidiunClientPlugin
{
	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
	}

	/**
	 * @return VidiunAdCuePointClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunAdCuePointClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'adCuePoint';
	}
}

