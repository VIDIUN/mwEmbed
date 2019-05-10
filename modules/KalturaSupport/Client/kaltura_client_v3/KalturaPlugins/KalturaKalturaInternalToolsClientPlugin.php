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
class VidiunInternalToolsSession extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $partner_id = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $valid_until = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $partner_pattern = null;

	/**
	 * 
	 *
	 * @var VidiunSessionType
	 */
	public $type = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $error = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $rand = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $user = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $privileges = null;


}


/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunVidiunInternalToolsSystemHelperService extends VidiunServiceBase
{
	function __construct(VidiunClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * VS from Secure String
	 * 
	 * @param string $str 
	 * @return VidiunInternalToolsSession
	 */
	function fromSecureString($str)
	{
		$vparams = array();
		$this->client->addParam($vparams, "str", $str);
		$this->client->queueServiceActionCall("vidiuninternaltools_vidiuninternaltoolssystemhelper", "fromSecureString", $vparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "VidiunInternalToolsSession");
		return $resultObject;
	}

	/**
	 * From ip to country
	 * 
	 * @param string $remote_addr 
	 * @return string
	 */
	function iptocountry($remote_addr)
	{
		$vparams = array();
		$this->client->addParam($vparams, "remote_addr", $remote_addr);
		$this->client->queueServiceActionCall("vidiuninternaltools_vidiuninternaltoolssystemhelper", "iptocountry", $vparams);
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
	 * @return string
	 */
	function getRemoteAddress()
	{
		$vparams = array();
		$this->client->queueServiceActionCall("vidiuninternaltools_vidiuninternaltoolssystemhelper", "getRemoteAddress", $vparams);
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
class VidiunVidiunInternalToolsClientPlugin extends VidiunClientPlugin
{
	/**
	 * @var VidiunVidiunInternalToolsSystemHelperService
	 */
	public $VidiunInternalToolsSystemHelper = null;

	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
		$this->VidiunInternalToolsSystemHelper = new VidiunVidiunInternalToolsSystemHelperService($client);
	}

	/**
	 * @return VidiunVidiunInternalToolsClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunVidiunInternalToolsClientPlugin($client);
	}

	/**
	 * @return array<VidiunServiceBase>
	 */
	public function getServices()
	{
		$services = array(
			'VidiunInternalToolsSystemHelper' => $this->VidiunInternalToolsSystemHelper,
		);
		return $services;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'VidiunInternalTools';
	}
}

