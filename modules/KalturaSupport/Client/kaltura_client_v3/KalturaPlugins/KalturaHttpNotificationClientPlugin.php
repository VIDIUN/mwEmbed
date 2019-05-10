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
class VidiunHttpNotificationAuthenticationMethod
{
	const ANYSAFE = -18;
	const ANY = -17;
	const BASIC = 1;
	const DIGEST = 2;
	const GSSNEGOTIATE = 4;
	const NTLM = 8;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunHttpNotificationMethod
{
	const GET = 1;
	const POST = 2;
	const PUT = 3;
	const DELETE = 4;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunHttpNotificationSslVersion
{
	const V2 = 2;
	const V3 = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunHttpNotificationCertificateType
{
	const DER = "DER";
	const ENG = "ENG";
	const PEM = "PEM";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunHttpNotificationSslKeyType
{
	const DER = "DER";
	const ENG = "ENG";
	const PEM = "PEM";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunHttpNotificationTemplateOrderBy
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
class VidiunHttpNotification extends VidiunObjectBase
{
	/**
	 * Object that triggered the notification
	 * 	 
	 *
	 * @var VidiunObjectBase
	 */
	public $object;

	/**
	 * Object type that triggered the notification
	 * 	 
	 *
	 * @var VidiunEventNotificationEventObjectType
	 */
	public $eventObjectType = null;

	/**
	 * ID of the batch job that execute the notification
	 * 	 
	 *
	 * @var int
	 */
	public $eventNotificationJobId = null;

	/**
	 * ID of the template that triggered the notification
	 * 	 
	 *
	 * @var int
	 */
	public $templateId = null;

	/**
	 * Name of the template that triggered the notification
	 * 	 
	 *
	 * @var string
	 */
	public $templateName = null;

	/**
	 * System name of the template that triggered the notification
	 * 	 
	 *
	 * @var string
	 */
	public $templateSystemName = null;

	/**
	 * Ecent type that triggered the notification
	 * 	 
	 *
	 * @var VidiunEventNotificationEventType
	 */
	public $eventType = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunHttpNotificationData extends VidiunObjectBase
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunHttpNotificationDataFields extends VidiunHttpNotificationData
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunHttpNotificationDataText extends VidiunHttpNotificationData
{
	/**
	 * 
	 *
	 * @var VidiunStringValue
	 */
	public $content;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunHttpNotificationObjectData extends VidiunHttpNotificationData
{
	/**
	 * Vidiun API object type
	 * 	 
	 *
	 * @var string
	 */
	public $apiObjectType = null;

	/**
	 * Data format
	 * 	 
	 *
	 * @var VidiunResponseType
	 */
	public $format = null;

	/**
	 * Ignore null attributes during serialization
	 * 	 
	 *
	 * @var bool
	 */
	public $ignoreNull = null;

	/**
	 * PHP code
	 * 	 
	 *
	 * @var string
	 */
	public $code = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunHttpNotificationTemplate extends VidiunEventNotificationTemplate
{
	/**
	 * Remote server URL
	 * 	 
	 *
	 * @var string
	 */
	public $url = null;

	/**
	 * Request method.
	 * 	 
	 *
	 * @var VidiunHttpNotificationMethod
	 */
	public $method = null;

	/**
	 * Data to send.
	 * 	 
	 *
	 * @var VidiunHttpNotificationData
	 */
	public $data;

	/**
	 * The maximum number of seconds to allow cURL functions to execute.
	 * 	 
	 *
	 * @var int
	 */
	public $timeout = null;

	/**
	 * The number of seconds to wait while trying to connect.
	 * 	 Must be larger than zero.
	 * 	 
	 *
	 * @var int
	 */
	public $connectTimeout = null;

	/**
	 * A username to use for the connection.
	 * 	 
	 *
	 * @var string
	 */
	public $username = null;

	/**
	 * A password to use for the connection.
	 * 	 
	 *
	 * @var string
	 */
	public $password = null;

	/**
	 * The HTTP authentication method to use.
	 * 	 
	 *
	 * @var VidiunHttpNotificationAuthenticationMethod
	 */
	public $authenticationMethod = null;

	/**
	 * The SSL version (2 or 3) to use.
	 * 	 By default PHP will try to determine this itself, although in some cases this must be set manually.
	 * 	 
	 *
	 * @var VidiunHttpNotificationSslVersion
	 */
	public $sslVersion = null;

	/**
	 * SSL certificate to verify the peer with.
	 * 	 
	 *
	 * @var string
	 */
	public $sslCertificate = null;

	/**
	 * The format of the certificate.
	 * 	 
	 *
	 * @var VidiunHttpNotificationCertificateType
	 */
	public $sslCertificateType = null;

	/**
	 * The password required to use the certificate.
	 * 	 
	 *
	 * @var string
	 */
	public $sslCertificatePassword = null;

	/**
	 * The identifier for the crypto engine of the private SSL key specified in ssl key.
	 * 	 
	 *
	 * @var string
	 */
	public $sslEngine = null;

	/**
	 * The identifier for the crypto engine used for asymmetric crypto operations.
	 * 	 
	 *
	 * @var string
	 */
	public $sslEngineDefault = null;

	/**
	 * The key type of the private SSL key specified in ssl key - PEM / DER / ENG.
	 * 	 
	 *
	 * @var VidiunHttpNotificationSslKeyType
	 */
	public $sslKeyType = null;

	/**
	 * Private SSL key.
	 * 	 
	 *
	 * @var string
	 */
	public $sslKey = null;

	/**
	 * The secret password needed to use the private SSL key specified in ssl key.
	 * 	 
	 *
	 * @var string
	 */
	public $sslKeyPassword = null;

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
class VidiunHttpNotificationDispatchJobData extends VidiunEventNotificationDispatchJobData
{
	/**
	 * Remote server URL
	 * 	 
	 *
	 * @var string
	 */
	public $url = null;

	/**
	 * Request method.
	 * 	 
	 *
	 * @var VidiunHttpNotificationMethod
	 */
	public $method = null;

	/**
	 * Data to send.
	 * 	 
	 *
	 * @var string
	 */
	public $data = null;

	/**
	 * The maximum number of seconds to allow cURL functions to execute.
	 * 	 
	 *
	 * @var int
	 */
	public $timeout = null;

	/**
	 * The number of seconds to wait while trying to connect.
	 * 	 Must be larger than zero.
	 * 	 
	 *
	 * @var int
	 */
	public $connectTimeout = null;

	/**
	 * A username to use for the connection.
	 * 	 
	 *
	 * @var string
	 */
	public $username = null;

	/**
	 * A password to use for the connection.
	 * 	 
	 *
	 * @var string
	 */
	public $password = null;

	/**
	 * The HTTP authentication method to use.
	 * 	 
	 *
	 * @var VidiunHttpNotificationAuthenticationMethod
	 */
	public $authenticationMethod = null;

	/**
	 * The SSL version (2 or 3) to use.
	 * 	 By default PHP will try to determine this itself, although in some cases this must be set manually.
	 * 	 
	 *
	 * @var VidiunHttpNotificationSslVersion
	 */
	public $sslVersion = null;

	/**
	 * SSL certificate to verify the peer with.
	 * 	 
	 *
	 * @var string
	 */
	public $sslCertificate = null;

	/**
	 * The format of the certificate.
	 * 	 
	 *
	 * @var VidiunHttpNotificationCertificateType
	 */
	public $sslCertificateType = null;

	/**
	 * The password required to use the certificate.
	 * 	 
	 *
	 * @var string
	 */
	public $sslCertificatePassword = null;

	/**
	 * The identifier for the crypto engine of the private SSL key specified in ssl key.
	 * 	 
	 *
	 * @var string
	 */
	public $sslEngine = null;

	/**
	 * The identifier for the crypto engine used for asymmetric crypto operations.
	 * 	 
	 *
	 * @var string
	 */
	public $sslEngineDefault = null;

	/**
	 * The key type of the private SSL key specified in ssl key - PEM / DER / ENG.
	 * 	 
	 *
	 * @var VidiunHttpNotificationSslKeyType
	 */
	public $sslKeyType = null;

	/**
	 * Private SSL key.
	 * 	 
	 *
	 * @var string
	 */
	public $sslKey = null;

	/**
	 * The secret password needed to use the private SSL key specified in ssl key.
	 * 	 
	 *
	 * @var string
	 */
	public $sslKeyPassword = null;

	/**
	 * Adds a e-mail custom header
	 * 	 
	 *
	 * @var array of VidiunKeyValue
	 */
	public $customHeaders;

	/**
	 * The secret to sign the notification with
	 * 	 
	 *
	 * @var string
	 */
	public $signSecret = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunHttpNotificationTemplateBaseFilter extends VidiunEventNotificationTemplateFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunHttpNotificationTemplateFilter extends VidiunHttpNotificationTemplateBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunHttpNotificationClientPlugin extends VidiunClientPlugin
{
	protected function __construct(VidiunClient $client)
	{
		parent::__construct($client);
	}

	/**
	 * @return VidiunHttpNotificationClientPlugin
	 */
	public static function get(VidiunClient $client)
	{
		return new VidiunHttpNotificationClientPlugin($client);
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
		return 'httpNotification';
	}
}

