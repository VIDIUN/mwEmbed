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
require_once(dirname(__FILE__) . "/VidiunEventNotificationClientPlugin.php");

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEmailNotificationTemplatePriority
{
	const HIGH = 1;
	const NORMAL = 3;
	const LOW = 5;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEmailNotificationFormat
{
	const HTML = "1";
	const TEXT = "2";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEmailNotificationRecipientProviderType
{
	const STATIC_LIST = "1";
	const CATEGORY = "2";
	const USER = "3";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEmailNotificationTemplateOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const ID_ASC = "+id";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const ID_DESC = "-id";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEmailNotificationRecipient extends VidiunObjectBase
{
	/**
	 * Recipient e-mail address
	 * 	 
	 *
	 * @var VidiunStringValue
	 */
	public $email;

	/**
	 * Recipient name
	 * 	 
	 *
	 * @var VidiunStringValue
	 */
	public $name;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunEmailNotificationRecipientJobData extends VidiunObjectBase
{
	/**
	 * Provider type of the job data.
	 * 	  
	 *
	 * @var VidiunEmailNotificationRecipientProviderType
	 * @readonly
	 */
	public $providerType = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunEmailNotificationRecipientProvider extends VidiunObjectBase
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryUserProviderFilter extends VidiunFilter
{
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
	 * @var VidiunCategoryUserStatus
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
	 * @var VidiunUpdateMethodType
	 */
	public $updateMethodEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $updateMethodIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $permissionNamesMatchAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $permissionNamesMatchOr = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEmailNotificationCategoryRecipientJobData extends VidiunEmailNotificationRecipientJobData
{
	/**
	 * 
	 *
	 * @var VidiunCategoryUserFilter
	 */
	public $categoryUserFilter;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEmailNotificationCategoryRecipientProvider extends VidiunEmailNotificationRecipientProvider
{
	/**
	 * The ID of the category whose subscribers should receive the email notification.
	 * 	 
	 *
	 * @var VidiunStringValue
	 */
	public $categoryId;

	/**
	 * 
	 *
	 * @var VidiunCategoryUserProviderFilter
	 */
	public $categoryUserFilter;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEmailNotificationParameter extends VidiunEventNotificationParameter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEmailNotificationStaticRecipientJobData extends VidiunEmailNotificationRecipientJobData
{
	/**
	 * Email to emails and names
	 * 	 
	 *
	 * @var array of VidiunKeyValue
	 */
	public $emailRecipients;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEmailNotificationStaticRecipientProvider extends VidiunEmailNotificationRecipientProvider
{
	/**
	 * Email to emails and names
	 * 	 
	 *
	 * @var array of VidiunEmailNotificationRecipient
	 */
	public $emailRecipients;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEmailNotificationTemplate extends VidiunEventNotificationTemplate
{
	/**
	 * Define the email body format
	 * 	 
	 *
	 * @var VidiunEmailNotificationFormat
	 */
	public $format = null;

	/**
	 * Define the email subject 
	 * 	 
	 *
	 * @var string
	 */
	public $subject = null;

	/**
	 * Define the email body content
	 * 	 
	 *
	 * @var string
	 */
	public $body = null;

	/**
	 * Define the email sender email
	 * 	 
	 *
	 * @var string
	 */
	public $fromEmail = null;

	/**
	 * Define the email sender name
	 * 	 
	 *
	 * @var string
	 */
	public $fromName = null;

	/**
	 * Email recipient emails and names
	 * 	 
	 *
	 * @var VidiunEmailNotificationRecipientProvider
	 */
	public $to;

	/**
	 * Email recipient emails and names
	 * 	 
	 *
	 * @var VidiunEmailNotificationRecipientProvider
	 */
	public $cc;

	/**
	 * Email recipient emails and names
	 * 	 
	 *
	 * @var VidiunEmailNotificationRecipientProvider
	 */
	public $bcc;

	/**
	 * Default email addresses to whom the reply should be sent. 
	 * 	 
	 *
	 * @var VidiunEmailNotificationRecipientProvider
	 */
	public $replyTo;

	/**
	 * Define the email priority
	 * 	 
	 *
	 * @var VidiunEmailNotificationTemplatePriority
	 */
	public $priority = null;

	/**
	 * Email address that a reading confirmation will be sent
	 * 	 
	 *
	 * @var string
	 */
	public $confirmReadingTo = null;

	/**
	 * Hostname to use in Message-Id and Received headers and as default HELLO string. 
	 * 	 If empty, the value returned by SERVER_NAME is used or 'localhost.localdomain'.
	 * 	 
	 *
	 * @var string
	 */
	public $hostname = null;

	/**
	 * Sets the message ID to be used in the Message-Id header.
	 * 	 If empty, a unique id will be generated.
	 * 	 
	 *
	 * @var string
	 */
	public $messageID = null;

	/**
	 * Adds a e-mail custom header
	 * 	 
	 *
	 * @var array of VidiunKeyValue
	 */
	public $customHeaders;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEmailNotificationUserRecipientJobData extends VidiunEmailNotificationRecipientJobData
{
	/**
	 * 
	 *
	 * @var VidiunUserFilter
	 */
	public $filter;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEmailNotificationUserRecipientProvider extends VidiunEmailNotificationRecipientProvider
{
	/**
	 * 
	 *
	 * @var VidiunUserFilter
	 */
	public $filter;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEmailNotificationDispatchJobData extends VidiunEventNotificationDispatchJobData
{
	/**
	 * Define the email sender email
	 * 	 
	 *
	 * @var string
	 */
	public $fromEmail = null;

	/**
	 * Define the email sender name
	 * 	 
	 *
	 * @var string
	 */
	public $fromName = null;

	/**
	 * Email recipient emails and names, key is mail address and value is the name
	 * 	 
	 *
	 * @var VidiunEmailNotificationRecipientJobData
	 */
	public $to;

	/**
	 * Email cc emails and names, key is mail address and value is the name
	 * 	 
	 *
	 * @var VidiunEmailNotificationRecipientJobData
	 */
	public $cc;

	/**
	 * Email bcc emails and names, key is mail address and value is the name
	 * 	 
	 *
	 * @var VidiunEmailNotificationRecipientJobData
	 */
	public $bcc;

	/**
	 * Email addresses that a replies should be sent to, key is mail address and value is the name
	 * 	 
	 *
	 * @var VidiunEmailNotificationRecipientJobData
	 */
	public $replyTo;

	/**
	 * Define the email priority
	 * 	 
	 *
	 * @var VidiunEmailNotificationTemplatePriority
	 */
	public $priority = null;

	/**
	 * Email address that a reading confirmation will be sent to
	 * 	 
	 *
	 * @var string
	 */
	public $confirmReadingTo = null;

	/**
	 * Hostname to use in Message-Id and Received headers and as default HELO string. 
	 * 	 If empty, the value returned by SERVER_NAME is used or 'localhost.localdomain'.
	 * 	 
	 *
	 * @var string
	 */
	public $hostname = null;

	/**
	 * Sets the message ID to be used in the Message-Id header.
	 * 	 If empty, a unique id will be generated.
	 * 	 
	 *
	 * @var string
	 */
	public $messageID = null;

	/**
	 * Adds a e-mail custom header
	 * 	 
	 *
	 * @var array of VidiunKeyValue
	 */
	public $customHeaders;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunEmailNotificationTemplateBaseFilter extends VidiunEventNotificationTemplateFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEmailNotificationTemplateFilter extends VidiunEmailNotificationTemplateBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEmailNotificationClientPlugin extends VidiunClientPlugin
{
	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
	}

	/**
	 * @return VidiunEmailNotificationClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunEmailNotificationClientPlugin($client);
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
		return 'emailNotification';
	}
}

