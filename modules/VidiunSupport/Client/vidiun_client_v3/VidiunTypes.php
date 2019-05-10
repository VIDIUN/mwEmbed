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
class VidiunFlavorAssetUrlOptions extends VidiunObjectBase
{
		/**
 		* The name of the downloaded file
		*
		*
		* @var string
		*/
		public $fileName = null;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
require_once(dirname(__FILE__) . "/VidiunClientBase.php");

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunBaseRestriction extends VidiunObjectBase
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAccessControl extends VidiunObjectBase
{
	/**
	 * The id of the Access Control Profile
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
	public $partnerId = null;

	/**
	 * The name of the Access Control Profile
	 * 	 
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * System name of the Access Control Profile
	 * 	 
	 *
	 * @var string
	 */
	public $systemName = null;

	/**
	 * The description of the Access Control Profile
	 * 	 
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * Creation date as Unix timestamp (In seconds) 
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * True if this Conversion Profile is the default
	 * 	 
	 *
	 * @var VidiunNullableBoolean
	 */
	public $isDefault = null;

	/**
	 * Array of Access Control Restrictions
	 * 	 
	 *
	 * @var array of VidiunBaseRestriction
	 */
	public $restrictions;

	/**
	 * Indicates that the access control profile is new and should be handled using VidiunAccessControlProfile object and accessControlProfile service
	 * 	 
	 *
	 * @var bool
	 * @readonly
	 */
	public $containsUnsuportedRestrictions = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunContextTypeHolder extends VidiunObjectBase
{
	/**
	 * The type of the condition context
	 * 	 
	 *
	 * @var VidiunContextType
	 */
	public $type = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAccessControlContextTypeHolder extends VidiunContextTypeHolder
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAccessControlListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunAccessControl
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
abstract class VidiunRuleAction extends VidiunObjectBase
{
	/**
	 * The type of the action
	 * 	 
	 *
	 * @var VidiunRuleActionType
	 * @readonly
	 */
	public $type = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunCondition extends VidiunObjectBase
{
	/**
	 * The type of the access control condition
	 * 	 
	 *
	 * @var VidiunConditionType
	 * @readonly
	 */
	public $type = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $not = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunRule extends VidiunObjectBase
{
	/**
	 * Message to be thrown to the player in case the rule is fulfilled
	 * 	 
	 *
	 * @var string
	 */
	public $message = null;

	/**
	 * Actions to be performed by the player in case the rule is fulfilled
	 * 	 
	 *
	 * @var array of VidiunRuleAction
	 */
	public $actions;

	/**
	 * Conditions to validate the rule
	 * 	 
	 *
	 * @var array of VidiunCondition
	 */
	public $conditions;

	/**
	 * Indicates what contexts should be tested by this rule 
	 * 	 
	 *
	 * @var array of VidiunContextTypeHolder
	 */
	public $contexts;

	/**
	 * Indicates that this rule is enough and no need to continue checking the rest of the rules 
	 * 	 
	 *
	 * @var bool
	 */
	public $stopProcessing = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAccessControlProfile extends VidiunObjectBase
{
	/**
	 * The id of the Access Control Profile
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
	public $partnerId = null;

	/**
	 * The name of the Access Control Profile
	 * 	 
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * System name of the Access Control Profile
	 * 	 
	 *
	 * @var string
	 */
	public $systemName = null;

	/**
	 * The description of the Access Control Profile
	 * 	 
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * Creation time as Unix timestamp (In seconds) 
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * Update time as Unix timestamp (In seconds) 
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $updatedAt = null;

	/**
	 * True if this access control profile is the partner default
	 * 	 
	 *
	 * @var VidiunNullableBoolean
	 */
	public $isDefault = null;

	/**
	 * Array of access control rules
	 * 	 
	 *
	 * @var array of VidiunRule
	 */
	public $rules;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAccessControlProfileListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunAccessControlProfile
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
class VidiunKeyValue extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $key = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $value = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAccessControlScope extends VidiunObjectBase
{
	/**
	 * URL to be used to test domain conditions.
	 * 	 
	 *
	 * @var string
	 */
	public $referrer = null;

	/**
	 * IP to be used to test geographic location conditions.
	 * 	 
	 *
	 * @var string
	 */
	public $ip = null;

	/**
	 * Vidiun session to be used to test session and user conditions.
	 * 	 
	 *
	 * @var string
	 */
	public $vs = null;

	/**
	 * Browser or client application to be used to test agent conditions.
	 * 	 
	 *
	 * @var string
	 */
	public $userAgent = null;

	/**
	 * Unix timestamp (In seconds) to be used to test entry scheduling, keep null to use now.
	 * 	 
	 *
	 * @var int
	 */
	public $time = null;

	/**
	 * Indicates what contexts should be tested. No contexts means any context.
	 * 	 
	 *
	 * @var array of VidiunAccessControlContextTypeHolder
	 */
	public $contexts;

	/**
	 * Array of hashes to pass to the access control profile scope
	 * 	 
	 *
	 * @var array of VidiunKeyValue
	 */
	public $hashes;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAsset extends VidiunObjectBase
{
	/**
	 * The ID of the Flavor Asset
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * The entry ID of the Flavor Asset
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $entryId = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * The version of the Flavor Asset
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $version = null;

	/**
	 * The size (in KBytes) of the Flavor Asset
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $size = null;

	/**
	 * Tags used to identify the Flavor Asset in various scenarios
	 * 	 
	 *
	 * @var string
	 */
	public $tags = null;

	/**
	 * The file extension
	 * 	 
	 *
	 * @var string
	 * @insertonly
	 */
	public $fileExt = null;

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
	 * @readonly
	 */
	public $deletedAt = null;

	/**
	 * System description, error message, warnings and failure cause.
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $description = null;

	/**
	 * Partner private data
	 * 	 
	 *
	 * @var string
	 */
	public $partnerData = null;

	/**
	 * Partner friendly description
	 * 	 
	 *
	 * @var string
	 */
	public $partnerDescription = null;

	/**
	 * Comma separated list of source flavor params ids
	 * 	 
	 *
	 * @var string
	 */
	public $actualSourceAssetParamsIds = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunString extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $value = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAssetParams extends VidiunObjectBase
{
	/**
	 * The id of the Flavor Params
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
	public $partnerId = null;

	/**
	 * The name of the Flavor Params
	 * 	 
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * System name of the Flavor Params
	 * 	 
	 *
	 * @var string
	 */
	public $systemName = null;

	/**
	 * The description of the Flavor Params
	 * 	 
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * Creation date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * True if those Flavor Params are part of system defaults
	 * 	 
	 *
	 * @var VidiunNullableBoolean
	 * @readonly
	 */
	public $isSystemDefault = null;

	/**
	 * The Flavor Params tags are used to identify the flavor for different usage (e.g. web, hd, mobile)
	 * 	 
	 *
	 * @var string
	 */
	public $tags = null;

	/**
	 * Array of partner permisison names that required for using this asset params
	 * 	 
	 *
	 * @var array of VidiunString
	 */
	public $requiredPermissions;

	/**
	 * Id of remote storage profile that used to get the source, zero indicates Vidiun data center
	 * 	 
	 *
	 * @var int
	 */
	public $sourceRemoteStorageProfileId = null;

	/**
	 * Comma seperated ids of remote storage profiles that the flavor distributed to, the distribution done by the conversion engine
	 * 	 
	 *
	 * @var int
	 */
	public $remoteStorageProfileIds = null;

	/**
	 * Media parser type to be used for post-conversion validation
	 * 	 
	 *
	 * @var VidiunMediaParserType
	 */
	public $mediaParserType = null;

	/**
	 * Comma seperated ids of source flavor params this flavor is created from
	 * 	 
	 *
	 * @var string
	 */
	public $sourceAssetParamsIds = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunResource extends VidiunObjectBase
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunContentResource extends VidiunResource
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAssetParamsResourceContainer extends VidiunResource
{
	/**
	 * The content resource to associate with asset params
	 * 	 
	 *
	 * @var VidiunContentResource
	 */
	public $resource;

	/**
	 * The asset params to associate with the reaource
	 * 	 
	 *
	 * @var int
	 */
	public $assetParamsId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunOperationAttributes extends VidiunObjectBase
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBaseEntry extends VidiunObjectBase
{
	/**
	 * Auto generated 10 characters alphanumeric string
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * Entry name (Min 1 chars)
	 * 	 
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Entry description
	 * 	 
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * The ID of the user who is the owner of this entry 
	 * 	 
	 *
	 * @var string
	 */
	public $userId = null;

	/**
	 * The ID of the user who created this entry 
	 * 	 
	 *
	 * @var string
	 * @insertonly
	 */
	public $creatorId = null;

	/**
	 * Entry tags
	 * 	 
	 *
	 * @var string
	 */
	public $tags = null;

	/**
	 * Entry admin tags can be updated only by administrators
	 * 	 
	 *
	 * @var string
	 */
	public $adminTags = null;

	/**
	 * Categories with no entitlement that this entry belongs to.
	 * 	 
	 *
	 * @var string
	 */
	public $categories = null;

	/**
	 * Categories Ids of categories with no entitlement that this entry belongs to
	 * 	 
	 *
	 * @var string
	 */
	public $categoriesIds = null;

	/**
	 * 
	 *
	 * @var VidiunEntryStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * Entry moderation status
	 * 	 
	 *
	 * @var VidiunEntryModerationStatus
	 * @readonly
	 */
	public $moderationStatus = null;

	/**
	 * Number of moderation requests waiting for this entry
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $moderationCount = null;

	/**
	 * The type of the entry, this is auto filled by the derived entry object
	 * 	 
	 *
	 * @var VidiunEntryType
	 */
	public $type = null;

	/**
	 * Entry creation date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * Entry update date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $updatedAt = null;

	/**
	 * The calculated average rank. rank = totalRank / votes
	 * 	 
	 *
	 * @var float
	 * @readonly
	 */
	public $rank = null;

	/**
	 * The sum of all rank values submitted to the baseEntry.anonymousRank action
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $totalRank = null;

	/**
	 * A count of all requests made to the baseEntry.anonymousRank action
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $votes = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $groupId = null;

	/**
	 * Can be used to store various partner related data as a string 
	 * 	 
	 *
	 * @var string
	 */
	public $partnerData = null;

	/**
	 * Download URL for the entry
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $downloadUrl = null;

	/**
	 * Indexed search text for full text search
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $searchText = null;

	/**
	 * License type used for this entry
	 * 	 
	 *
	 * @var VidiunLicenseType
	 */
	public $licenseType = null;

	/**
	 * Version of the entry data
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $version = null;

	/**
	 * Thumbnail URL
	 * 	 
	 *
	 * @var string
	 * @insertonly
	 */
	public $thumbnailUrl = null;

	/**
	 * The Access Control ID assigned to this entry (null when not set, send -1 to remove)  
	 * 	 
	 *
	 * @var int
	 */
	public $accessControlId = null;

	/**
	 * Entry scheduling start date (null when not set, send -1 to remove)
	 * 	 
	 *
	 * @var int
	 */
	public $startDate = null;

	/**
	 * Entry scheduling end date (null when not set, send -1 to remove)
	 * 	 
	 *
	 * @var int
	 */
	public $endDate = null;

	/**
	 * Entry external reference id
	 * 	 
	 *
	 * @var string
	 */
	public $referenceId = null;

	/**
	 * ID of temporary entry that will replace this entry when it's approved and ready for replacement
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $replacingEntryId = null;

	/**
	 * ID of the entry that will be replaced when the replacement approved and this entry is ready
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $replacedEntryId = null;

	/**
	 * Status of the replacement readiness and approval
	 * 	 
	 *
	 * @var VidiunEntryReplacementStatus
	 * @readonly
	 */
	public $replacementStatus = null;

	/**
	 * Can be used to store various partner related data as a numeric value
	 * 	 
	 *
	 * @var int
	 */
	public $partnerSortValue = null;

	/**
	 * Override the default ingestion profile  
	 * 	 
	 *
	 * @var int
	 */
	public $conversionProfileId = null;

	/**
	 * IF not empty, points to an entry ID the should replace this current entry's id. 
	 * 	 
	 *
	 * @var string
	 */
	public $redirectEntryId = null;

	/**
	 * ID of source root entry, used for clipped, skipped and cropped entries that created from another entry
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $rootEntryId = null;

	/**
	 * clipping, skipping and cropping attributes that used to create this entry  
	 * 	 
	 *
	 * @var array of VidiunOperationAttributes
	 */
	public $operationAttributes;

	/**
	 * list of user ids that are entitled to edit the entry (no server enforcement) The difference between entitledUsersEdit and entitledUsersPublish is applicative only
	 * 	 
	 *
	 * @var string
	 */
	public $entitledUsersEdit = null;

	/**
	 * list of user ids that are entitled to publish the entry (no server enforcement) The difference between entitledUsersEdit and entitledUsersPublish is applicative only
	 * 	 
	 *
	 * @var string
	 */
	public $entitledUsersPublish = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBaseEntryListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunBaseEntry
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
abstract class VidiunBaseSyndicationFeed extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $feedUrl = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * link a playlist that will set what content the feed will include
	 * 	 if empty, all content will be included in feed
	 * 	 
	 *
	 * @var string
	 */
	public $playlistId = null;

	/**
	 * feed name
	 * 	 
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * feed status
	 * 	 
	 *
	 * @var VidiunSyndicationFeedStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * feed type
	 * 	 
	 *
	 * @var VidiunSyndicationFeedType
	 * @insertonly
	 */
	public $type = null;

	/**
	 * Base URL for each video, on the partners site
	 * 	 This is required by all syndication types.
	 * 	 
	 *
	 * @var string
	 */
	public $landingPage = null;

	/**
	 * Creation date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * allow_embed tells google OR yahoo weather to allow embedding the video on google OR yahoo video results
	 * 	 or just to provide a link to the landing page.
	 * 	 it is applied on the video-player_loc property in the XML (google)
	 * 	 and addes media-player tag (yahoo)
	 * 	 
	 *
	 * @var bool
	 */
	public $allowEmbed = null;

	/**
	 * Select a uiconf ID as player skin to include in the vwidget url
	 * 	 
	 *
	 * @var int
	 */
	public $playerUiconfId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $flavorParamId = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $transcodeExistingContent = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $addToDefaultConversionProfile = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $categories = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $storageId = null;

	/**
	 * 
	 *
	 * @var VidiunSyndicationFeedEntriesOrderBy
	 */
	public $entriesOrderBy = null;

	/**
	 * Should enforce entitlement on feed entries
	 * 	 
	 *
	 * @var bool
	 */
	public $enforceEntitlement = null;

	/**
	 * Set privacy context for search entries that assiged to private and public categories within a category privacy context.
	 * 	 
	 *
	 * @var string
	 */
	public $privacyContext = null;

	/**
	 * Update date as Unix timestamp (In seconds)
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
class VidiunBaseSyndicationFeedListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunBaseSyndicationFeed
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
class VidiunBulkUploadPluginData extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $field = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $value = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadResult extends VidiunObjectBase
{
	/**
	 * The id of the result
	 *      
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * The id of the parent job
	 * 	 
	 *
	 * @var int
	 */
	public $bulkUploadJobId = null;

	/**
	 * The index of the line in the CSV
	 * 	 
	 *
	 * @var int
	 */
	public $lineIndex = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerId = null;

	/**
	 * 
	 *
	 * @var VidiunBulkUploadResultStatus
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var VidiunBulkUploadAction
	 */
	public $action = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $objectId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $objectStatus = null;

	/**
	 * 
	 *
	 * @var VidiunBulkUploadResultObjectType
	 */
	public $bulkUploadResultObjectType = null;

	/**
	 * The data as recieved in the csv
	 * 	 
	 *
	 * @var string
	 */
	public $rowData = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $partnerData = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $objectErrorDescription = null;

	/**
	 * 
	 *
	 * @var array of VidiunBulkUploadPluginData
	 */
	public $pluginsData;

	/**
	 * 
	 *
	 * @var string
	 */
	public $errorDescription = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $errorCode = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $errorType = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUpload extends VidiunObjectBase
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
	public $uploadedBy = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $uploadedByUserId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $uploadedOn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $numOfEntries = null;

	/**
	 * 
	 *
	 * @var VidiunBatchJobStatus
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $logFileUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $csvFileUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $bulkFileUrl = null;

	/**
	 * 
	 *
	 * @var VidiunBulkUploadType
	 */
	public $bulkUploadType = null;

	/**
	 * 
	 *
	 * @var array of VidiunBulkUploadResult
	 */
	public $results;

	/**
	 * 
	 *
	 * @var string
	 */
	public $error = null;

	/**
	 * 
	 *
	 * @var VidiunBatchJobErrorTypes
	 */
	public $errorType = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $errorNumber = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fileName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $numOfObjects = null;

	/**
	 * 
	 *
	 * @var VidiunBulkUploadObjectType
	 */
	public $bulkUploadObjectType = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunBulkUpload
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
abstract class VidiunBulkUploadObjectData extends VidiunObjectBase
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCEError extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $browser = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $serverIp = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $serverOs = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $phpVersion = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $ceAdminEmail = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $type = null;

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
	public $data = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategory extends VidiunObjectBase
{
	/**
	 * The id of the Category
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
	 */
	public $parentId = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $depth = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * The name of the Category. 
	 * 	 The following characters are not allowed: '<', '>', ','
	 * 	 
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * The full name of the Category
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $fullName = null;

	/**
	 * The full ids of the Category
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $fullIds = null;

	/**
	 * Number of entries in this Category (including child categories)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $entriesCount = null;

	/**
	 * Creation date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * Update date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $updatedAt = null;

	/**
	 * Category description
	 * 	 
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * Category tags
	 * 	 
	 *
	 * @var string
	 */
	public $tags = null;

	/**
	 * If category will be returned for list action.
	 * 	 
	 *
	 * @var VidiunAppearInListType
	 */
	public $appearInList = null;

	/**
	 * defines the privacy of the entries that assigned to this category
	 * 	 
	 *
	 * @var VidiunPrivacyType
	 */
	public $privacy = null;

	/**
	 * If Category members are inherited from parent category or set manualy. 
	 * 	 
	 *
	 * @var VidiunInheritanceType
	 */
	public $inheritanceType = null;

	/**
	 * Who can ask to join this category
	 * 	 
	 *
	 * @var VidiunUserJoinPolicyType
	 * @readonly
	 */
	public $userJoinPolicy = null;

	/**
	 * Default permissionLevel for new users
	 * 	 
	 *
	 * @var VidiunCategoryUserPermissionLevel
	 */
	public $defaultPermissionLevel = null;

	/**
	 * Category Owner (User id)
	 * 	 
	 *
	 * @var string
	 */
	public $owner = null;

	/**
	 * Number of entries that belong to this category directly
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $directEntriesCount = null;

	/**
	 * Category external id, controlled and managed by the partner.
	 * 	 
	 *
	 * @var string
	 */
	public $referenceId = null;

	/**
	 * who can assign entries to this category
	 * 	 
	 *
	 * @var VidiunContributionPolicyType
	 */
	public $contributionPolicy = null;

	/**
	 * Number of active members for this category
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $membersCount = null;

	/**
	 * Number of pending members for this category
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $pendingMembersCount = null;

	/**
	 * Set privacy context for search entries that assiged to private and public categories. the entries will be private if the search context is set with those categories.
	 * 	 
	 *
	 * @var string
	 */
	public $privacyContext = null;

	/**
	 * comma separated parents that defines a privacyContext for search
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $privacyContexts = null;

	/**
	 * Status
	 * 	 
	 *
	 * @var VidiunCategoryStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * The category id that this category inherit its members and members permission (for contribution and join)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $inheritedParentId = null;

	/**
	 * Can be used to store various partner related data as a numeric value
	 * 	 
	 *
	 * @var int
	 */
	public $partnerSortValue = null;

	/**
	 * Can be used to store various partner related data as a string 
	 * 	 
	 *
	 * @var string
	 */
	public $partnerData = null;

	/**
	 * Enable client side applications to define how to sort the category child categories 
	 * 	 
	 *
	 * @var VidiunCategoryOrderBy
	 */
	public $defaultOrderBy = null;

	/**
	 * Number of direct children categories
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $directSubCategoriesCount = null;

	/**
	 * Moderation to add entries to this category by users that are not of permission level Manager or Moderator.  
	 * 	 
	 *
	 * @var VidiunNullableBoolean
	 */
	public $moderation = null;

	/**
	 * Nunber of pending moderation entries
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $pendingEntriesCount = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryEntry extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $categoryId = null;

	/**
	 * entry id
	 * 	 
	 *
	 * @var string
	 */
	public $entryId = null;

	/**
	 * Creation date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * The full ids of the Category
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $categoryFullIds = null;

	/**
	 * CategroyEntry status
	 * 	 
	 *
	 * @var VidiunCategoryEntryStatus
	 * @readonly
	 */
	public $status = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryEntryListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunCategoryEntry
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
class VidiunCategoryListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunCategory
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
class VidiunCategoryUser extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 * @insertonly
	 */
	public $categoryId = null;

	/**
	 * User id
	 * 	 
	 *
	 * @var string
	 * @insertonly
	 */
	public $userId = null;

	/**
	 * Partner id
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * Permission level
	 * 	 
	 *
	 * @var VidiunCategoryUserPermissionLevel
	 */
	public $permissionLevel = null;

	/**
	 * Status
	 * 	 
	 *
	 * @var VidiunCategoryUserStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * CategoryUser creation date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * CategoryUser update date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $updatedAt = null;

	/**
	 * Update method can be either manual or automatic to distinguish between manual operations (for example in VMC) on automatic - using bulk upload 
	 * 	 
	 *
	 * @var VidiunUpdateMethodType
	 */
	public $updateMethod = null;

	/**
	 * The full ids of the Category
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $categoryFullIds = null;

	/**
	 * Set of category-related permissions for the current category user.
	 * 	 
	 *
	 * @var string
	 */
	public $permissionNames = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryUserListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunCategoryUser
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
class VidiunClientNotification extends VidiunObjectBase
{
	/**
	 * The URL where the notification should be sent to 
	 *      
	 *
	 * @var string
	 */
	public $url = null;

	/**
	 * The serialized notification data to send
	 *      
	 *
	 * @var string
	 */
	public $data = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunContext extends VidiunObjectBase
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunContextDataResult extends VidiunObjectBase
{
	/**
	 * Array of messages as received from the rules that invalidated
	 * 	 
	 *
	 * @var array of VidiunString
	 */
	public $messages;

	/**
	 * Array of actions as received from the rules that invalidated
	 * 	 
	 *
	 * @var array of VidiunRuleAction
	 */
	public $actions;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConversionAttribute extends VidiunObjectBase
{
	/**
	 * The id of the flavor params, set to null for source flavor
	 * 	 
	 *
	 * @var int
	 */
	public $flavorParamsId = null;

	/**
	 * Attribute name  
	 * 	 
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Attribute value  
	 * 	 
	 *
	 * @var string
	 */
	public $value = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCropDimensions extends VidiunObjectBase
{
	/**
	 * Crop left point
	 * 	 
	 *
	 * @var int
	 */
	public $left = null;

	/**
	 * Crop top point
	 * 	 
	 *
	 * @var int
	 */
	public $top = null;

	/**
	 * Crop width
	 * 	 
	 *
	 * @var int
	 */
	public $width = null;

	/**
	 * Crop height
	 * 	 
	 *
	 * @var int
	 */
	public $height = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConversionProfile extends VidiunObjectBase
{
	/**
	 * The id of the Conversion Profile
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
	public $partnerId = null;

	/**
	 * 
	 *
	 * @var VidiunConversionProfileStatus
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var VidiunConversionProfileType
	 * @insertonly
	 */
	public $type = null;

	/**
	 * The name of the Conversion Profile
	 * 	 
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * System name of the Conversion Profile
	 * 	 
	 *
	 * @var string
	 */
	public $systemName = null;

	/**
	 * Comma separated tags
	 * 	 
	 *
	 * @var string
	 */
	public $tags = null;

	/**
	 * The description of the Conversion Profile
	 * 	 
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * ID of the default entry to be used for template data
	 * 	 
	 *
	 * @var string
	 */
	public $defaultEntryId = null;

	/**
	 * Creation date as Unix timestamp (In seconds) 
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * List of included flavor ids (comma separated)
	 * 	 
	 *
	 * @var string
	 */
	public $flavorParamsIds = null;

	/**
	 * Indicates that this conversion profile is system default
	 * 	 
	 *
	 * @var VidiunNullableBoolean
	 */
	public $isDefault = null;

	/**
	 * Indicates that this conversion profile is partner default
	 * 	 
	 *
	 * @var bool
	 * @readonly
	 */
	public $isPartnerDefault = null;

	/**
	 * Cropping dimensions
	 * 	 
	 *
	 * @var VidiunCropDimensions
	 */
	public $cropDimensions;

	/**
	 * Clipping start position (in miliseconds)
	 * 	 
	 *
	 * @var int
	 */
	public $clipStart = null;

	/**
	 * Clipping duration (in miliseconds)
	 * 	 
	 *
	 * @var int
	 */
	public $clipDuration = null;

	/**
	 * XSL to transform ingestion MRSS XML
	 * 	 
	 *
	 * @var string
	 */
	public $xslTransformation = null;

	/**
	 * ID of default storage profile to be used for linked net-storage file syncs
	 * 	 
	 *
	 * @var int
	 */
	public $storageProfileId = null;

	/**
	 * Media parser type to be used for extract media
	 * 	 
	 *
	 * @var VidiunMediaParserType
	 */
	public $mediaParserType = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConversionProfileAssetParams extends VidiunObjectBase
{
	/**
	 * The id of the conversion profile
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $conversionProfileId = null;

	/**
	 * The id of the asset params
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $assetParamsId = null;

	/**
	 * The ingestion origin of the asset params
	 * 	 
	 *
	 * @var VidiunFlavorReadyBehaviorType
	 */
	public $readyBehavior = null;

	/**
	 * The ingestion origin of the asset params
	 * 	 
	 *
	 * @var VidiunAssetParamsOrigin
	 */
	public $origin = null;

	/**
	 * Asset params system name
	 * 	 
	 *
	 * @var string
	 */
	public $systemName = null;

	/**
	 * Starts conversion even if the decision layer reduced the configuration to comply with the source
	 * 	 
	 *
	 * @var VidiunNullableBoolean
	 */
	public $forceNoneComplied = null;

	/**
	 * Specifies how to treat the flavor after conversion is finished
	 * 	 
	 *
	 * @var VidiunAssetParamsDeletePolicy
	 */
	public $deletePolicy = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConversionProfileAssetParamsListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunConversionProfileAssetParams
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
class VidiunConversionProfileListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunConversionProfile
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
class VidiunConvertCollectionFlavorData extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorAssetId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $flavorParamsOutputId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $readyBehavior = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $videoBitrate = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $audioBitrate = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $destFileSyncLocalPath = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $destFileSyncRemoteUrl = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDataEntry extends VidiunBaseEntry
{
	/**
	 * The data of the entry
	 * 	 
	 *
	 * @var string
	 */
	public $dataContent = null;

	/**
	 * indicator whether to return the object for get action with the dataContent field.
	 * 	 
	 *
	 * @var bool
	 * @insertonly
	 */
	public $retrieveDataContentByGet = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDataListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunDataEntry
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
class VidiunFileSyncDescriptor extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $fileSyncLocalPath = null;

	/**
	 * The translated path as used by the scheduler
	 * 	 
	 *
	 * @var string
	 */
	public $fileSyncRemoteUrl = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $fileSyncObjectSubType = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDestFileSyncDescriptor extends VidiunFileSyncDescriptor
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEmailIngestionProfile extends VidiunObjectBase
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
	 * @var string
	 */
	public $emailAddress = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $mailboxId = null;

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
	 */
	public $conversionProfile2Id = null;

	/**
	 * 
	 *
	 * @var VidiunEntryModerationStatus
	 */
	public $moderationStatus = null;

	/**
	 * 
	 *
	 * @var VidiunEmailIngestionProfileStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $defaultCategory = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $defaultUserId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $defaultTags = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $defaultAdminTags = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $maxAttachmentSizeKbytes = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $maxAttachmentsPerMail = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunValue extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $description = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStringValue extends VidiunValue
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $value = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunObjectIdentifier extends VidiunObjectBase
{
	/**
	 * Comma separated string of enum values denoting which features of the item need to be included in the MRSS 
	 * 	 
	 *
	 * @var string
	 */
	public $extendedFeatures = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunExtendingItemMrssParameter extends VidiunObjectBase
{
	/**
	 * XPath for the extending item
	 * 	 
	 *
	 * @var string
	 */
	public $xpath = null;

	/**
	 * Object identifier
	 * 	 
	 *
	 * @var VidiunObjectIdentifier
	 */
	public $identifier;

	/**
	 * Mode of extension - append to MRSS or replace the xpath content.
	 * 	 
	 *
	 * @var VidiunMrssExtensionMode
	 */
	public $extensionMode = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPlayableEntry extends VidiunBaseEntry
{
	/**
	 * Number of plays
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $plays = null;

	/**
	 * Number of views
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $views = null;

	/**
	 * The last time the entry was played
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $lastPlayedAt = null;

	/**
	 * The width in pixels
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $width = null;

	/**
	 * The height in pixels
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $height = null;

	/**
	 * The duration in seconds
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $duration = null;

	/**
	 * The duration in miliseconds
	 * 	 
	 *
	 * @var int
	 */
	public $msDuration = null;

	/**
	 * The duration type (short for 0-4 mins, medium for 4-20 mins, long for 20+ mins)
	 * 	 
	 *
	 * @var VidiunDurationType
	 * @readonly
	 */
	public $durationType = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaEntry extends VidiunPlayableEntry
{
	/**
	 * The media type of the entry
	 * 	 
	 *
	 * @var VidiunMediaType
	 * @insertonly
	 */
	public $mediaType = null;

	/**
	 * Override the default conversion quality  
	 * 	 
	 *
	 * @var string
	 * @insertonly
	 */
	public $conversionQuality = null;

	/**
	 * The source type of the entry 
	 * 	 
	 *
	 * @var VidiunSourceType
	 * @insertonly
	 */
	public $sourceType = null;

	/**
	 * The search provider type used to import this entry
	 * 	 
	 *
	 * @var VidiunSearchProviderType
	 * @insertonly
	 */
	public $searchProviderType = null;

	/**
	 * The ID of the media in the importing site
	 * 	 
	 *
	 * @var string
	 * @insertonly
	 */
	public $searchProviderId = null;

	/**
	 * The user name used for credits
	 * 	 
	 *
	 * @var string
	 */
	public $creditUserName = null;

	/**
	 * The URL for credits
	 * 	 
	 *
	 * @var string
	 */
	public $creditUrl = null;

	/**
	 * The media date extracted from EXIF data (For images) as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $mediaDate = null;

	/**
	 * The URL used for playback. This is not the download URL.
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $dataUrl = null;

	/**
	 * Comma separated flavor params ids that exists for this media entry
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $flavorParamsIds = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFeatureStatus extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var VidiunFeatureStatusType
	 */
	public $type = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $value = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFeatureStatusListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunFeatureStatus
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
class VidiunFileAsset extends VidiunObjectBase
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
	public $partnerId = null;

	/**
	 * 
	 *
	 * @var VidiunFileAssetObjectType
	 * @insertonly
	 */
	public $fileAssetObjectType = null;

	/**
	 * 
	 *
	 * @var string
	 * @insertonly
	 */
	public $objectId = null;

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
	public $fileExt = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $version = null;

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
	 * @var VidiunFileAssetStatus
	 * @readonly
	 */
	public $status = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFileAssetListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunFileAsset
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
abstract class VidiunSearchItem extends VidiunObjectBase
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFilter extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $orderBy = null;

	/**
	 * 
	 *
	 * @var VidiunSearchItem
	 */
	public $advancedSearch;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFilterPager extends VidiunObjectBase
{
	/**
	 * The number of objects to retrieve. (Default is 30, maximum page size is 500).
	 * 	 
	 *
	 * @var int
	 */
	public $pageSize = null;

	/**
	 * The page number for which {pageSize} of objects should be retrieved (Default is 1).
	 * 	 
	 *
	 * @var int
	 */
	public $pageIndex = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFlavorAsset extends VidiunAsset
{
	/**
	 * The Flavor Params used to create this Flavor Asset
	 * 	 
	 *
	 * @var int
	 * @insertonly
	 */
	public $flavorParamsId = null;

	/**
	 * The width of the Flavor Asset 
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $width = null;

	/**
	 * The height of the Flavor Asset
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $height = null;

	/**
	 * The overall bitrate (in KBits) of the Flavor Asset 
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $bitrate = null;

	/**
	 * The frame rate (in FPS) of the Flavor Asset
	 * 	 
	 *
	 * @var float
	 * @readonly
	 */
	public $frameRate = null;

	/**
	 * True if this Flavor Asset is the original source
	 * 	 
	 *
	 * @var bool
	 * @readonly
	 */
	public $isOriginal = null;

	/**
	 * True if this Flavor Asset is playable in VDP
	 * 	 
	 *
	 * @var bool
	 * @readonly
	 */
	public $isWeb = null;

	/**
	 * The container format
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $containerFormat = null;

	/**
	 * The video codec
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $videoCodecId = null;

	/**
	 * The status of the Flavor Asset
	 * 	 
	 *
	 * @var VidiunFlavorAssetStatus
	 * @readonly
	 */
	public $status = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFlavorAssetListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunFlavorAsset
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
class VidiunFlavorParams extends VidiunAssetParams
{
	/**
	 * The video codec of the Flavor Params
	 * 	 
	 *
	 * @var VidiunVideoCodec
	 */
	public $videoCodec = null;

	/**
	 * The video bitrate (in KBits) of the Flavor Params
	 * 	 
	 *
	 * @var int
	 */
	public $videoBitrate = null;

	/**
	 * The audio codec of the Flavor Params
	 * 	 
	 *
	 * @var VidiunAudioCodec
	 */
	public $audioCodec = null;

	/**
	 * The audio bitrate (in KBits) of the Flavor Params
	 * 	 
	 *
	 * @var int
	 */
	public $audioBitrate = null;

	/**
	 * The number of audio channels for "downmixing"
	 * 	 
	 *
	 * @var int
	 */
	public $audioChannels = null;

	/**
	 * The audio sample rate of the Flavor Params
	 * 	 
	 *
	 * @var int
	 */
	public $audioSampleRate = null;

	/**
	 * The desired width of the Flavor Params
	 * 	 
	 *
	 * @var int
	 */
	public $width = null;

	/**
	 * The desired height of the Flavor Params
	 * 	 
	 *
	 * @var int
	 */
	public $height = null;

	/**
	 * The frame rate of the Flavor Params
	 * 	 
	 *
	 * @var int
	 */
	public $frameRate = null;

	/**
	 * The gop size of the Flavor Params
	 * 	 
	 *
	 * @var int
	 */
	public $gopSize = null;

	/**
	 * The list of conversion engines (comma separated)
	 * 	 
	 *
	 * @var string
	 */
	public $conversionEngines = null;

	/**
	 * The list of conversion engines extra params (separated with "|")
	 * 	 
	 *
	 * @var string
	 */
	public $conversionEnginesExtraParams = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $twoPass = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $deinterlice = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $rotate = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $operators = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $engineVersion = null;

	/**
	 * The container format of the Flavor Params
	 * 	 
	 *
	 * @var VidiunContainerFormat
	 */
	public $format = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $aspectRatioProcessingMode = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $forceFrameToMultiplication16 = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $isGopInSec = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $isAvoidVideoShrinkFramesizeToSource = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $isAvoidVideoShrinkBitrateToSource = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $isVideoFrameRateForLowBrAppleHls = null;

	/**
	 * 
	 *
	 * @var float
	 */
	public $anamorphicPixels = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $isAvoidForcedKeyFrames = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $maxFrameRate = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $videoConstantBitrate = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $videoBitrateTolerance = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $clipOffset = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $clipDuration = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFlavorAssetWithParams extends VidiunObjectBase
{
	/**
	 * The Flavor Asset (Can be null when there are params without asset)
	 * 	 
	 *
	 * @var VidiunFlavorAsset
	 */
	public $flavorAsset;

	/**
	 * The Flavor Params
	 * 	 
	 *
	 * @var VidiunFlavorParams
	 */
	public $flavorParams;

	/**
	 * The entry id
	 * 	 
	 *
	 * @var string
	 */
	public $entryId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFlavorParamsListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunFlavorParams
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
class VidiunFlavorParamsOutput extends VidiunFlavorParams
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $flavorParamsId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $commandLinesStr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorParamsVersion = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorAssetId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorAssetVersion = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $readyBehavior = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFlavorParamsOutputListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunFlavorParamsOutput
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
abstract class VidiunObject extends VidiunObjectBase
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunJobData extends VidiunObjectBase
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveStreamConfiguration extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var VidiunPlaybackProtocol
	 */
	public $protocol = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $url = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $publishUrl = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunLiveEntry extends VidiunMediaEntry
{
	/**
	 * The message to be presented when the stream is offline
	 * 	 
	 *
	 * @var string
	 */
	public $offlineMessage = null;

	/**
	 * Recording Status Enabled/Disabled
	 * 	 
	 *
	 * @var VidiunRecordStatus
	 * @insertonly
	 */
	public $recordStatus = null;

	/**
	 * DVR Status Enabled/Disabled
	 * 	 
	 *
	 * @var VidiunDVRStatus
	 * @insertonly
	 */
	public $dvrStatus = null;

	/**
	 * Window of time which the DVR allows for backwards scrubbing (in minutes)
	 * 	 
	 *
	 * @var int
	 * @insertonly
	 */
	public $dvrWindow = null;

	/**
	 * Array of key value protocol->live stream url objects
	 * 	 
	 *
	 * @var array of VidiunLiveStreamConfiguration
	 */
	public $liveStreamConfigurations;

	/**
	 * Recorded entry id
	 * 	 
	 *
	 * @var string
	 */
	public $recordedEntryId = null;

	/**
	 * Flag denoting whether entry should be published by the media server
	 * 	 
	 *
	 * @var VidiunLivePublishStatus
	 */
	public $pushPublishEnabled = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveChannel extends VidiunLiveEntry
{
	/**
	 * Playlist id to be played
	 * 	 
	 *
	 * @var string
	 */
	public $playlistId = null;

	/**
	 * Indicates that the segments should be repeated for ever
	 * 	 
	 *
	 * @var VidiunNullableBoolean
	 */
	public $repeat = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveChannelListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunLiveChannel
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
class VidiunLiveChannelSegment extends VidiunObjectBase
{
	/**
	 * Unique identifier
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * Segment creation date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * Segment update date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $updatedAt = null;

	/**
	 * Segment name
	 * 	 
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Segment description
	 * 	 
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * Segment tags
	 * 	 
	 *
	 * @var string
	 */
	public $tags = null;

	/**
	 * Segment could be associated with the main stream, as additional stream or as overlay
	 * 	 
	 *
	 * @var VidiunLiveChannelSegmentType
	 */
	public $type = null;

	/**
	 * 
	 *
	 * @var VidiunLiveChannelSegmentStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * Live channel id
	 * 	 
	 *
	 * @var string
	 */
	public $channelId = null;

	/**
	 * Entry id to be played
	 * 	 
	 *
	 * @var string
	 */
	public $entryId = null;

	/**
	 * Segment start time trigger type
	 * 	 
	 *
	 * @var VidiunLiveChannelSegmentTriggerType
	 */
	public $triggerType = null;

	/**
	 * Live channel segment that the trigger relates to
	 * 	 
	 *
	 * @var string
	 */
	public $triggerSegmentId = null;

	/**
	 * Segment play start time, in mili-seconds, according to trigger type
	 * 	 
	 *
	 * @var float
	 */
	public $startTime = null;

	/**
	 * Segment play duration time, in mili-seconds
	 * 	 
	 *
	 * @var float
	 */
	public $duration = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveChannelSegmentListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunLiveChannelSegment
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
class VidiunLiveStreamBitrate extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $bitrate = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $width = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $height = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tags = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveStreamEntry extends VidiunLiveEntry
{
	/**
	 * The stream id as provided by the provider
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $streamRemoteId = null;

	/**
	 * The backup stream id as provided by the provider
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $streamRemoteBackupId = null;

	/**
	 * Array of supported bitrates
	 * 	 
	 *
	 * @var array of VidiunLiveStreamBitrate
	 */
	public $bitrates;

	/**
	 * 
	 *
	 * @var string
	 */
	public $primaryBroadcastingUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $secondaryBroadcastingUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $streamName = null;

	/**
	 * The stream url
	 * 	 
	 *
	 * @var string
	 */
	public $streamUrl = null;

	/**
	 * HLS URL - URL for live stream playback on mobile device
	 * 	 
	 *
	 * @var string
	 */
	public $hlsStreamUrl = null;

	/**
	 * URL Manager to handle the live stream URL (for instance, add token)
	 * 	 
	 *
	 * @var string
	 */
	public $urlManager = null;

	/**
	 * The broadcast primary ip
	 * 	 
	 *
	 * @var string
	 */
	public $encodingIP1 = null;

	/**
	 * The broadcast secondary ip
	 * 	 
	 *
	 * @var string
	 */
	public $encodingIP2 = null;

	/**
	 * The broadcast password
	 * 	 
	 *
	 * @var string
	 */
	public $streamPassword = null;

	/**
	 * The broadcast username
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $streamUsername = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveStreamListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunLiveStreamEntry
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
abstract class VidiunBaseEntryBaseFilter extends VidiunFilter
{
	/**
	 * This filter should be in use for retrieving only a specific entry (identified by its entryId).
	 * 	 
	 *
	 * @var string
	 */
	public $idEqual = null;

	/**
	 * This filter should be in use for retrieving few specific entries (string should include comma separated list of entryId strings).
	 * 	 
	 *
	 * @var string
	 */
	public $idIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $idNotIn = null;

	/**
	 * This filter should be in use for retrieving specific entries. It should include only one string to search for in entry names (no wildcards, spaces are treated as part of the string).
	 * 	 
	 *
	 * @var string
	 */
	public $nameLike = null;

	/**
	 * This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry names, while applying an OR logic to retrieve entries that contain at least one input string (no wildcards, spaces are treated as part of the string).
	 * 	 
	 *
	 * @var string
	 */
	public $nameMultiLikeOr = null;

	/**
	 * This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry names, while applying an AND logic to retrieve entries that contain all input strings (no wildcards, spaces are treated as part of the string).
	 * 	 
	 *
	 * @var string
	 */
	public $nameMultiLikeAnd = null;

	/**
	 * This filter should be in use for retrieving entries with a specific name.
	 * 	 
	 *
	 * @var string
	 */
	public $nameEqual = null;

	/**
	 * This filter should be in use for retrieving only entries which were uploaded by/assigned to users of a specific Vidiun Partner (identified by Partner ID).
	 * 	 
	 *
	 * @var int
	 */
	public $partnerIdEqual = null;

	/**
	 * This filter should be in use for retrieving only entries within Vidiun network which were uploaded by/assigned to users of few Vidiun Partners  (string should include comma separated list of PartnerIDs)
	 * 	 
	 *
	 * @var string
	 */
	public $partnerIdIn = null;

	/**
	 * This filter parameter should be in use for retrieving only entries, uploaded by/assigned to a specific user (identified by user Id).
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
	public $creatorIdEqual = null;

	/**
	 * This filter should be in use for retrieving specific entries. It should include only one string to search for in entry tags (no wildcards, spaces are treated as part of the string).
	 * 	 
	 *
	 * @var string
	 */
	public $tagsLike = null;

	/**
	 * This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags, while applying an OR logic to retrieve entries that contain at least one input string (no wildcards, spaces are treated as part of the string).
	 * 	 
	 *
	 * @var string
	 */
	public $tagsMultiLikeOr = null;

	/**
	 * This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags, while applying an AND logic to retrieve entries that contain all input strings (no wildcards, spaces are treated as part of the string).
	 * 	 
	 *
	 * @var string
	 */
	public $tagsMultiLikeAnd = null;

	/**
	 * This filter should be in use for retrieving specific entries. It should include only one string to search for in entry tags set by an ADMIN user (no wildcards, spaces are treated as part of the string).
	 * 	 
	 *
	 * @var string
	 */
	public $adminTagsLike = null;

	/**
	 * This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags, set by an ADMIN user, while applying an OR logic to retrieve entries that contain at least one input string (no wildcards, spaces are treated as part of the string).
	 * 	 
	 *
	 * @var string
	 */
	public $adminTagsMultiLikeOr = null;

	/**
	 * This filter should be in use for retrieving specific entries. It could include few (comma separated) strings for searching in entry tags, set by an ADMIN user, while applying an AND logic to retrieve entries that contain all input strings (no wildcards, spaces are treated as part of the string).
	 * 	 
	 *
	 * @var string
	 */
	public $adminTagsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $categoriesMatchAnd = null;

	/**
	 * All entries within these categories or their child categories.
	 * 	 
	 *
	 * @var string
	 */
	public $categoriesMatchOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $categoriesNotContains = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $categoriesIdsMatchAnd = null;

	/**
	 * All entries of the categories, excluding their child categories.
	 * 	 To include entries of the child categories, use categoryAncestorIdIn, or categoriesMatchOr.
	 * 	 
	 *
	 * @var string
	 */
	public $categoriesIdsMatchOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $categoriesIdsNotContains = null;

	/**
	 * 
	 *
	 * @var VidiunNullableBoolean
	 */
	public $categoriesIdsEmpty = null;

	/**
	 * This filter should be in use for retrieving only entries, at a specific {
	 *
	 * @var VidiunEntryStatus
	 */
	public $statusEqual = null;

	/**
	 * This filter should be in use for retrieving only entries, not at a specific {
	 *
	 * @var VidiunEntryStatus
	 */
	public $statusNotEqual = null;

	/**
	 * This filter should be in use for retrieving only entries, at few specific {
	 *
	 * @var string
	 */
	public $statusIn = null;

	/**
	 * This filter should be in use for retrieving only entries, not at few specific {
	 *
	 * @var string
	 */
	public $statusNotIn = null;

	/**
	 * 
	 *
	 * @var VidiunEntryModerationStatus
	 */
	public $moderationStatusEqual = null;

	/**
	 * 
	 *
	 * @var VidiunEntryModerationStatus
	 */
	public $moderationStatusNotEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $moderationStatusIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $moderationStatusNotIn = null;

	/**
	 * 
	 *
	 * @var VidiunEntryType
	 */
	public $typeEqual = null;

	/**
	 * This filter should be in use for retrieving entries of few {
	 *
	 * @var string
	 */
	public $typeIn = null;

	/**
	 * This filter parameter should be in use for retrieving only entries which were created at Vidiun system after a specific time/date (standard timestamp format).
	 * 	 
	 *
	 * @var int
	 */
	public $createdAtGreaterThanOrEqual = null;

	/**
	 * This filter parameter should be in use for retrieving only entries which were created at Vidiun system before a specific time/date (standard timestamp format).
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
	public $totalRankLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $totalRankGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $groupIdEqual = null;

	/**
	 * This filter should be in use for retrieving specific entries while search match the input string within all of the following metadata attributes: name, description, tags, adminTags.
	 * 	 
	 *
	 * @var string
	 */
	public $searchTextMatchAnd = null;

	/**
	 * This filter should be in use for retrieving specific entries while search match the input string within at least one of the following metadata attributes: name, description, tags, adminTags.
	 * 	 
	 *
	 * @var string
	 */
	public $searchTextMatchOr = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $accessControlIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $accessControlIdIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $startDateGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $startDateLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $startDateGreaterThanOrEqualOrNull = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $startDateLessThanOrEqualOrNull = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $endDateGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $endDateLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $endDateGreaterThanOrEqualOrNull = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $endDateLessThanOrEqualOrNull = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $referenceIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $referenceIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $replacingEntryIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $replacingEntryIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $replacedEntryIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $replacedEntryIdIn = null;

	/**
	 * 
	 *
	 * @var VidiunEntryReplacementStatus
	 */
	public $replacementStatusEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $replacementStatusIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerSortValueGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerSortValueLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $rootEntryIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $rootEntryIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsNameMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsAdminTagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsAdminTagsNameMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsNameMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsAdminTagsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsAdminTagsNameMultiLikeAnd = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBaseEntryFilter extends VidiunBaseEntryBaseFilter
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $freeText = null;

	/**
	 * 
	 *
	 * @var VidiunNullableBoolean
	 */
	public $isRoot = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $categoriesFullNameIn = null;

	/**
	 * All entries within this categoy or in child categories  
	 * 	 
	 *
	 * @var string
	 */
	public $categoryAncestorIdIn = null;

	/**
	 * The id of the original entry
	 * 	 
	 *
	 * @var string
	 */
	public $redirectFromEntryId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunPlayableEntryBaseFilter extends VidiunBaseEntryFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $lastPlayedAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $lastPlayedAtLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $durationLessThan = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $durationGreaterThan = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $durationLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $durationGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $durationTypeMatchOr = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPlayableEntryFilter extends VidiunPlayableEntryBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunMediaEntryBaseFilter extends VidiunPlayableEntryFilter
{
	/**
	 * 
	 *
	 * @var VidiunMediaType
	 */
	public $mediaTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $mediaTypeIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $mediaDateGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $mediaDateLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorParamsIdsMatchOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorParamsIdsMatchAnd = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaEntryFilter extends VidiunMediaEntryBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaEntryFilterForPlaylist extends VidiunMediaEntryFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $limit = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaInfo extends VidiunObjectBase
{
	/**
	 * The id of the media info
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * The id of the related flavor asset
	 * 	 
	 *
	 * @var string
	 */
	public $flavorAssetId = null;

	/**
	 * The file size
	 * 	 
	 *
	 * @var int
	 */
	public $fileSize = null;

	/**
	 * The container format
	 * 	 
	 *
	 * @var string
	 */
	public $containerFormat = null;

	/**
	 * The container id
	 * 	 
	 *
	 * @var string
	 */
	public $containerId = null;

	/**
	 * The container profile
	 * 	 
	 *
	 * @var string
	 */
	public $containerProfile = null;

	/**
	 * The container duration
	 * 	 
	 *
	 * @var int
	 */
	public $containerDuration = null;

	/**
	 * The container bit rate
	 * 	 
	 *
	 * @var int
	 */
	public $containerBitRate = null;

	/**
	 * The video format
	 * 	 
	 *
	 * @var string
	 */
	public $videoFormat = null;

	/**
	 * The video codec id
	 * 	 
	 *
	 * @var string
	 */
	public $videoCodecId = null;

	/**
	 * The video duration
	 * 	 
	 *
	 * @var int
	 */
	public $videoDuration = null;

	/**
	 * The video bit rate
	 * 	 
	 *
	 * @var int
	 */
	public $videoBitRate = null;

	/**
	 * The video bit rate mode
	 * 	 
	 *
	 * @var VidiunBitRateMode
	 */
	public $videoBitRateMode = null;

	/**
	 * The video width
	 * 	 
	 *
	 * @var int
	 */
	public $videoWidth = null;

	/**
	 * The video height
	 * 	 
	 *
	 * @var int
	 */
	public $videoHeight = null;

	/**
	 * The video frame rate
	 * 	 
	 *
	 * @var float
	 */
	public $videoFrameRate = null;

	/**
	 * The video display aspect ratio (dar)
	 * 	 
	 *
	 * @var float
	 */
	public $videoDar = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $videoRotation = null;

	/**
	 * The audio format
	 * 	 
	 *
	 * @var string
	 */
	public $audioFormat = null;

	/**
	 * The audio codec id
	 * 	 
	 *
	 * @var string
	 */
	public $audioCodecId = null;

	/**
	 * The audio duration
	 * 	 
	 *
	 * @var int
	 */
	public $audioDuration = null;

	/**
	 * The audio bit rate
	 * 	 
	 *
	 * @var int
	 */
	public $audioBitRate = null;

	/**
	 * The audio bit rate mode
	 * 	 
	 *
	 * @var VidiunBitRateMode
	 */
	public $audioBitRateMode = null;

	/**
	 * The number of audio channels
	 * 	 
	 *
	 * @var int
	 */
	public $audioChannels = null;

	/**
	 * The audio sampling rate
	 * 	 
	 *
	 * @var int
	 */
	public $audioSamplingRate = null;

	/**
	 * The audio resolution
	 * 	 
	 *
	 * @var int
	 */
	public $audioResolution = null;

	/**
	 * The writing library
	 * 	 
	 *
	 * @var string
	 */
	public $writingLib = null;

	/**
	 * The data as returned by the mediainfo command line
	 * 	 
	 *
	 * @var string
	 */
	public $rawData = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $multiStreamInfo = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $scanType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $multiStream = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaInfoListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunMediaInfo
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
class VidiunMediaListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunMediaEntry
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
class VidiunMediaServer extends VidiunObjectBase
{
	/**
	 * Unique identifier
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Server data center id
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $dc = null;

	/**
	 * Server host name
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $hostname = null;

	/**
	 * Server first registration date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * Server last update date as Unix timestamp (In seconds)
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
class VidiunMediaServerStatus extends VidiunObjectBase
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMixEntry extends VidiunPlayableEntry
{
	/**
	 * Indicates whether the user has submited a real thumbnail to the mix (Not the one that was generated automaticaly)
	 * 	 
	 *
	 * @var bool
	 * @readonly
	 */
	public $hasRealThumbnail = null;

	/**
	 * The editor type used to edit the metadata
	 * 	 
	 *
	 * @var VidiunEditorType
	 */
	public $editorType = null;

	/**
	 * The xml data of the mix
	 * 	 
	 *
	 * @var string
	 */
	public $dataContent = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMixListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunMixEntry
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
class VidiunModerationFlag extends VidiunObjectBase
{
	/**
	 * Moderation flag id
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
	public $partnerId = null;

	/**
	 * The user id that added the moderation flag
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $userId = null;

	/**
	 * The type of the moderation flag (entry or user)
	 * 	 
	 *
	 * @var VidiunModerationObjectType
	 * @readonly
	 */
	public $moderationObjectType = null;

	/**
	 * If moderation flag is set for entry, this is the flagged entry id
	 * 	 
	 *
	 * @var string
	 */
	public $flaggedEntryId = null;

	/**
	 * If moderation flag is set for user, this is the flagged user id
	 * 	 
	 *
	 * @var string
	 */
	public $flaggedUserId = null;

	/**
	 * The moderation flag status
	 * 	 
	 *
	 * @var VidiunModerationFlagStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * The comment that was added to the flag
	 * 	 
	 *
	 * @var string
	 */
	public $comments = null;

	/**
	 * 
	 *
	 * @var VidiunModerationFlagType
	 */
	public $flagType = null;

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
class VidiunModerationFlagListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunModerationFlag
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
class VidiunPlayerDeliveryType extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $label = null;

	/**
	 * 
	 *
	 * @var array of VidiunKeyValue
	 */
	public $flashvars;

	/**
	 * 
	 *
	 * @var string
	 */
	public $minVersion = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPlayerEmbedCodeType extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $label = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $entryOnly = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $minVersion = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPartner extends VidiunObjectBase
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
	public $name = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $website = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $notificationUrl = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $appearInSearch = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * deprecated - lastName and firstName replaces this field
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
	public $description = null;

	/**
	 * 
	 *
	 * @var VidiunCommercialUseType
	 */
	public $commercialUse = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $landingPage = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $userLandingPage = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $contentCategories = null;

	/**
	 * 
	 *
	 * @var VidiunPartnerType
	 */
	public $type = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $phone = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $describeYourself = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $adultContent = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $defConversionProfileType = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $notify = null;

	/**
	 * 
	 *
	 * @var VidiunPartnerStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $allowQuickEdit = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $mergeEntryLists = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $notificationsConfig = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $maxUploadSize = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerPackage = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $secret = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $adminSecret = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $cmsPassword = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $allowMultiNotification = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $adminLoginUsersQuota = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $adminUserId = null;

	/**
	 * firstName and lastName replace the old (deprecated) adminName
	 * 	 
	 *
	 * @var string
	 */
	public $firstName = null;

	/**
	 * lastName and firstName replace the old (deprecated) adminName
	 * 	 
	 *
	 * @var string
	 */
	public $lastName = null;

	/**
	 * country code (2char) - this field is optional
	 * 	 
	 *
	 * @var string
	 */
	public $country = null;

	/**
	 * state code (2char) - this field is optional
	 * 	 
	 *
	 * @var string
	 */
	public $state = null;

	/**
	 * 
	 *
	 * @var array of VidiunKeyValue
	 * @insertonly
	 */
	public $additionalParams;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $publishersQuota = null;

	/**
	 * 
	 *
	 * @var VidiunPartnerGroupType
	 * @readonly
	 */
	public $partnerGroupType = null;

	/**
	 * 
	 *
	 * @var bool
	 * @readonly
	 */
	public $defaultEntitlementEnforcement = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $defaultDeliveryType = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $defaultEmbedCodeType = null;

	/**
	 * 
	 *
	 * @var array of VidiunPlayerDeliveryType
	 * @readonly
	 */
	public $deliveryTypes;

	/**
	 * 
	 *
	 * @var array of VidiunPlayerEmbedCodeType
	 * @readonly
	 */
	public $embedCodeTypes;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $templatePartnerId = null;

	/**
	 * 
	 *
	 * @var bool
	 * @readonly
	 */
	public $ignoreSeoLinks = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $host = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $cdnHost = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $rtmpUrl = null;

	/**
	 * 
	 *
	 * @var bool
	 * @readonly
	 */
	public $isFirstLogin = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $logoutUrl = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerParentId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPartnerListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunPartner
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
class VidiunPartnerStatistics extends VidiunObjectBase
{
	/**
	 * Package total allowed bandwidth and storage
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $packageBandwidthAndStorage = null;

	/**
	 * Partner total hosting in GB on the disk
	 * 	 
	 *
	 * @var float
	 * @readonly
	 */
	public $hosting = null;

	/**
	 * Partner total bandwidth in GB
	 * 	 
	 *
	 * @var float
	 * @readonly
	 */
	public $bandwidth = null;

	/**
	 * total usage in GB - including bandwidth and storage
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $usage = null;

	/**
	 * Percent of usage out of partner's package. if usage is 5GB and package is 10GB, this value will be 50
	 * 	 
	 *
	 * @var float
	 * @readonly
	 */
	public $usagePercent = null;

	/**
	 * date when partner reached the limit of his package (timestamp)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $reachedLimitDate = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPartnerUsage extends VidiunObjectBase
{
	/**
	 * Partner total hosting in GB on the disk
	 * 	 
	 *
	 * @var float
	 * @readonly
	 */
	public $hostingGB = null;

	/**
	 * percent of usage out of partner's package. if usageGB is 5 and package is 10GB, this value will be 50
	 * 	 
	 *
	 * @var float
	 * @readonly
	 */
	public $Percent = null;

	/**
	 * package total BW - actually this is usage, which represents BW+storage
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $packageBW = null;

	/**
	 * total usage in GB - including bandwidth and storage
	 * 	 
	 *
	 * @var float
	 * @readonly
	 */
	public $usageGB = null;

	/**
	 * date when partner reached the limit of his package (timestamp)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $reachedLimitDate = null;

	/**
	 * a semi-colon separated list of comma-separated key-values to represent a usage graph.
	 * 	 keys could be 1-12 for a year view (1,1.2;2,1.1;3,0.9;...;12,1.4;)
	 * 	 keys could be 1-[28,29,30,31] depending on the requested month, for a daily view in a given month (1,0.4;2,0.2;...;31,0.1;)
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $usageGraph = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPermission extends VidiunObjectBase
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
	 * @var VidiunPermissionType
	 * @readonly
	 */
	public $type = null;

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
	public $friendlyName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * 
	 *
	 * @var VidiunPermissionStatus
	 */
	public $status = null;

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
	public $dependsOnPermissionNames = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tags = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $permissionItemsIds = null;

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
	 * @var string
	 */
	public $partnerGroup = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunPermissionItem extends VidiunObjectBase
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
	 * @var VidiunPermissionItemType
	 * @readonly
	 */
	public $type = null;

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
	public $tags = null;

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
class VidiunPermissionItemListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunPermissionItem
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
class VidiunPermissionListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunPermission
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
class VidiunPlaylist extends VidiunBaseEntry
{
	/**
	 * Content of the playlist - 
	 * 	 XML if the playlistType is dynamic 
	 * 	 text if the playlistType is static 
	 * 	 url if the playlistType is mRss 
	 * 	 
	 *
	 * @var string
	 */
	public $playlistContent = null;

	/**
	 * 
	 *
	 * @var array of VidiunMediaEntryFilterForPlaylist
	 */
	public $filters;

	/**
	 * Maximum count of results to be returned in playlist execution
	 * 	 
	 *
	 * @var int
	 */
	public $totalResults = null;

	/**
	 * Type of playlist
	 * 	 
	 *
	 * @var VidiunPlaylistType
	 */
	public $playlistType = null;

	/**
	 * Number of plays
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $plays = null;

	/**
	 * Number of views
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $views = null;

	/**
	 * The duration in seconds
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $duration = null;

	/**
	 * The url for this playlist
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $executeUrl = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPlaylistListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunPlaylist
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
class VidiunRemotePath extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $storageProfileId = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $uri = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunRemotePathListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunRemotePath
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
class VidiunUrlResource extends VidiunContentResource
{
	/**
	 * Remote URL, FTP, HTTP or HTTPS 
	 * 	 
	 *
	 * @var string
	 */
	public $url = null;

	/**
	 * Force Import Job 
	 * 	 
	 *
	 * @var bool
	 */
	public $forceAsyncDownload = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunRemoteStorageResource extends VidiunUrlResource
{
	/**
	 * ID of storage profile to be associated with the created file sync, used for file serving URL composing. 
	 * 	 
	 *
	 * @var int
	 */
	public $storageProfileId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunReport extends VidiunObjectBase
{
	/**
	 * Report id
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Partner id associated with the report
	 * 	 
	 *
	 * @var int
	 */
	public $partnerId = null;

	/**
	 * Report name
	 * 	 
	 *
	 * @var string
	 */
	public $name = null;

	/**
	 * Used to identify system reports in a friendly way
	 * 	 
	 *
	 * @var string
	 */
	public $systemName = null;

	/**
	 * Report description
	 * 	 
	 *
	 * @var string
	 */
	public $description = null;

	/**
	 * Report query
	 * 	 
	 *
	 * @var string
	 */
	public $query = null;

	/**
	 * Creation date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * Last update date as Unix timestamp (In seconds)
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
class VidiunReportBaseTotal extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $data = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunReportGraph extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $data = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunReportInputBaseFilter extends VidiunObjectBase
{
	/**
	 * Start date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 */
	public $fromDate = null;

	/**
	 * End date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 */
	public $toDate = null;

	/**
	 * Start day as string (YYYYMMDD)
	 * 	 
	 *
	 * @var string
	 */
	public $fromDay = null;

	/**
	 * End date as string (YYYYMMDD)
	 * 	 
	 *
	 * @var string
	 */
	public $toDay = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunReportListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunReport
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
class VidiunReportResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $columns = null;

	/**
	 * 
	 *
	 * @var array of VidiunString
	 */
	public $results;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunReportTable extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $header = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $data = null;

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
class VidiunReportTotal extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $header = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $data = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunScope extends VidiunObjectBase
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSearch extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $keyWords = null;

	/**
	 * 
	 *
	 * @var VidiunSearchProviderType
	 */
	public $searchSource = null;

	/**
	 * 
	 *
	 * @var VidiunMediaType
	 */
	public $mediaType = null;

	/**
	 * Use this field to pass dynamic data for searching
	 * 	 For example - if you set this field to "mymovies_$partner_id"
	 * 	 The $partner_id will be automatically replcaed with your real partner Id
	 * 	 
	 *
	 * @var string
	 */
	public $extraData = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $authData = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSearchAuthData extends VidiunObjectBase
{
	/**
	 * The authentication data that further should be used for search
	 * 	 
	 *
	 * @var string
	 */
	public $authData = null;

	/**
	 * Login URL when user need to sign-in and authorize the search
	 * 	 
	 *
	 * @var string
	 */
	public $loginUrl = null;

	/**
	 * Information when there was an error
	 * 	 
	 *
	 * @var string
	 */
	public $message = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSearchResult extends VidiunSearch
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $title = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $thumbUrl = null;

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
	public $tags = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $url = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $sourceLink = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $credit = null;

	/**
	 * 
	 *
	 * @var VidiunLicenseType
	 */
	public $licenseType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $flashPlaybackType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fileExt = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSearchResultResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunSearchResult
	 * @readonly
	 */
	public $objects;

	/**
	 * 
	 *
	 * @var bool
	 * @readonly
	 */
	public $needMediaInfo = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSessionInfo extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $vs = null;

	/**
	 * 
	 *
	 * @var VidiunSessionType
	 * @readonly
	 */
	public $sessionType = null;

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
	 * @readonly
	 */
	public $userId = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $expiry = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $privileges = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSourceFileSyncDescriptor extends VidiunFileSyncDescriptor
{
	/**
	 * The translated path as used by the scheduler
	 * 	 
	 *
	 * @var string
	 */
	public $actualFileSyncLocalPath = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $assetId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $assetParamsId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStartWidgetSessionResponse extends VidiunObjectBase
{
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
	 * @readonly
	 */
	public $vs = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $userId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStatsEvent extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $clientVer = null;

	/**
	 * 
	 *
	 * @var VidiunStatsEventType
	 */
	public $eventType = null;

	/**
	 * the client's timestamp of this event
	 * 	 
	 *
	 * @var float
	 */
	public $eventTimestamp = null;

	/**
	 * a unique string generated by the client that will represent the client-side session: the primary component will pass it on to other components that sprout from it
	 * 	 
	 *
	 * @var string
	 */
	public $sessionId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entryId = null;

	/**
	 * the UV cookie - creates in the operational system and should be passed on ofr every event 
	 * 	 
	 *
	 * @var string
	 */
	public $uniqueViewer = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $widgetId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $uiconfId = null;

	/**
	 * the partner's user id 
	 * 	 
	 *
	 * @var string
	 */
	public $userId = null;

	/**
	 * the timestamp along the video when the event happend 
	 * 	 
	 *
	 * @var int
	 */
	public $currentPoint = null;

	/**
	 * the duration of the video in milliseconds - will make it much faster than quering the db for each entry 
	 * 	 
	 *
	 * @var int
	 */
	public $duration = null;

	/**
	 * will be retrieved from the request of the user 
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $userIp = null;

	/**
	 * the time in milliseconds the event took
	 * 	 
	 *
	 * @var int
	 */
	public $processDuration = null;

	/**
	 * the id of the GUI control - will be used in the future to better understand what the user clicked
	 * 	 
	 *
	 * @var string
	 */
	public $controlId = null;

	/**
	 * true if the user ever used seek in this session 
	 * 	 
	 *
	 * @var bool
	 */
	public $seek = null;

	/**
	 * timestamp of the new point on the timeline of the video after the user seeks 
	 * 	 
	 *
	 * @var int
	 */
	public $newPoint = null;

	/**
	 * the referrer of the client
	 * 	 
	 *
	 * @var string
	 */
	public $referrer = null;

	/**
	 * will indicate if the event is thrown for the first video in the session
	 * 	 
	 *
	 * @var bool
	 */
	public $isFirstInSession = null;

	/**
	 * vidiun application name 
	 * 	 
	 *
	 * @var string
	 */
	public $applicationId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $contextId = null;

	/**
	 * 
	 *
	 * @var VidiunStatsFeatureType
	 */
	public $featureType = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStatsVmcEvent extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $clientVer = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $vmcEventActionPath = null;

	/**
	 * 
	 *
	 * @var VidiunStatsVmcEventType
	 */
	public $vmcEventType = null;

	/**
	 * the client's timestamp of this event
	 * 	 
	 *
	 * @var float
	 */
	public $eventTimestamp = null;

	/**
	 * a unique string generated by the client that will represent the client-side session: the primary component will pass it on to other components that sprout from it
	 * 	 
	 *
	 * @var string
	 */
	public $sessionId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entryId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $widgetId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $uiconfId = null;

	/**
	 * the partner's user id 
	 * 	 
	 *
	 * @var string
	 */
	public $userId = null;

	/**
	 * will be retrieved from the request of the user 
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $userIp = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStorageProfile extends VidiunObjectBase
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
	 * @readonly
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
	public $systemName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $desciption = null;

	/**
	 * 
	 *
	 * @var VidiunStorageProfileStatus
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var VidiunStorageProfileProtocol
	 */
	public $protocol = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $storageUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $storageBaseDir = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $storageUsername = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $storagePassword = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $storageFtpPassiveMode = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $deliveryHttpBaseUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $deliveryHttpsBaseUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $deliveryRmpBaseUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $deliveryIisBaseUrl = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $minFileSize = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $maxFileSize = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorParamsIds = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $maxConcurrentConnections = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $pathManagerClass = null;

	/**
	 * 
	 *
	 * @var array of VidiunKeyValue
	 */
	public $pathManagerParams;

	/**
	 * 
	 *
	 * @var string
	 */
	public $urlManagerClass = null;

	/**
	 * 
	 *
	 * @var array of VidiunKeyValue
	 */
	public $urlManagerParams;

	/**
	 * No need to create enum for temp field
	 * 	 
	 *
	 * @var int
	 */
	public $trigger = null;

	/**
	 * Delivery Priority
	 * 	 
	 *
	 * @var int
	 */
	public $deliveryPriority = null;

	/**
	 * 
	 *
	 * @var VidiunStorageProfileDeliveryStatus
	 */
	public $deliveryStatus = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $rtmpPrefix = null;

	/**
	 * 
	 *
	 * @var VidiunStorageProfileReadyBehavior
	 */
	public $readyBehavior = null;

	/**
	 * Flag sugnifying that the storage exported content should be deleted when soure entry is deleted
	 * 	 
	 *
	 * @var int
	 */
	public $allowAutoDelete = null;

	/**
	 * Indicates to the local file transfer manager to create a link to the file instead of copying it
	 * 	 
	 *
	 * @var bool
	 */
	public $createFileLink = null;

	/**
	 * Holds storage profile export rules
	 * 	 
	 *
	 * @var array of VidiunRule
	 */
	public $rules;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStorageProfileListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunStorageProfile
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
class VidiunSyndicationFeedEntryCount extends VidiunObjectBase
{
	/**
	 * the total count of entries that should appear in the feed without flavor filtering
	 * 	 
	 *
	 * @var int
	 */
	public $totalEntryCount = null;

	/**
	 * count of entries that will appear in the feed (including all relevant filters)
	 * 	 
	 *
	 * @var int
	 */
	public $actualEntryCount = null;

	/**
	 * count of entries that requires transcoding in order to be included in feed
	 * 	 
	 *
	 * @var int
	 */
	public $requireTranscodingCount = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunThumbAsset extends VidiunAsset
{
	/**
	 * The Flavor Params used to create this Flavor Asset
	 * 	 
	 *
	 * @var int
	 * @insertonly
	 */
	public $thumbParamsId = null;

	/**
	 * The width of the Flavor Asset 
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $width = null;

	/**
	 * The height of the Flavor Asset
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $height = null;

	/**
	 * The status of the asset
	 * 	 
	 *
	 * @var VidiunThumbAssetStatus
	 * @readonly
	 */
	public $status = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunThumbAssetListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunThumbAsset
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
class VidiunThumbParams extends VidiunAssetParams
{
	/**
	 * 
	 *
	 * @var VidiunThumbCropType
	 */
	public $cropType = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $quality = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $cropX = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $cropY = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $cropWidth = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $cropHeight = null;

	/**
	 * 
	 *
	 * @var float
	 */
	public $videoOffset = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $width = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $height = null;

	/**
	 * 
	 *
	 * @var float
	 */
	public $scaleWidth = null;

	/**
	 * 
	 *
	 * @var float
	 */
	public $scaleHeight = null;

	/**
	 * Hexadecimal value
	 * 	 
	 *
	 * @var string
	 */
	public $backgroundColor = null;

	/**
	 * Id of the flavor params or the thumbnail params to be used as source for the thumbnail creation
	 * 	 
	 *
	 * @var int
	 */
	public $sourceParamsId = null;

	/**
	 * The container format of the Flavor Params
	 * 	 
	 *
	 * @var VidiunContainerFormat
	 */
	public $format = null;

	/**
	 * The image density (dpi) for example: 72 or 96
	 * 	 
	 *
	 * @var int
	 */
	public $density = null;

	/**
	 * Strip profiles and comments
	 * 	 
	 *
	 * @var bool
	 */
	public $stripProfiles = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunThumbParamsListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunThumbParams
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
class VidiunThumbParamsOutput extends VidiunThumbParams
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $thumbParamsId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $thumbParamsVersion = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $thumbAssetId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $thumbAssetVersion = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $rotate = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunThumbParamsOutputListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunThumbParamsOutput
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
class VidiunThumbnailServeOptions extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var bool
	 */
	public $download = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUiConf extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $id = null;

	/**
	 * Name of the uiConf, this is not a primary key
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
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * 
	 *
	 * @var VidiunUiConfObjType
	 */
	public $objType = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $objTypeAsString = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $width = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $height = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $htmlParams = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $swfUrl = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $confFilePath = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $confFile = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $confFileFeatures = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $config = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $confVars = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $useCdn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tags = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $swfUrlVersion = null;

	/**
	 * Entry creation date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * Entry creation date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $updatedAt = null;

	/**
	 * 
	 *
	 * @var VidiunUiConfCreationMode
	 */
	public $creationMode = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $html5Url = null;

	/**
	 * UiConf version
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $version = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $partnerTags = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUiConfListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunUiConf
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
class VidiunUiConfTypeInfo extends VidiunObjectBase
{
	/**
	 * UiConf Type
	 * 	 
	 *
	 * @var VidiunUiConfObjType
	 */
	public $type = null;

	/**
	 * Available versions
	 *      
	 *
	 * @var array of VidiunString
	 */
	public $versions;

	/**
	 * The direcotry this type is saved at
	 *      
	 *
	 * @var string
	 */
	public $directory = null;

	/**
	 * Filename for this UiConf type
	 *      
	 *
	 * @var string
	 */
	public $filename = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUploadResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $uploadTokenId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $fileSize = null;

	/**
	 * 
	 *
	 * @var VidiunUploadErrorCode
	 */
	public $errorCode = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $errorDescription = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUploadToken extends VidiunObjectBase
{
	/**
	 * Upload token unique ID
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * Partner ID of the upload token
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $partnerId = null;

	/**
	 * User id for the upload token
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $userId = null;

	/**
	 * Status of the upload token
	 * 	 
	 *
	 * @var VidiunUploadTokenStatus
	 * @readonly
	 */
	public $status = null;

	/**
	 * Name of the file for the upload token, can be empty when the upload token is created and will be updated internally after the file is uploaded
	 * 	 
	 *
	 * @var string
	 * @insertonly
	 */
	public $fileName = null;

	/**
	 * File size in bytes, can be empty when the upload token is created and will be updated internally after the file is uploaded
	 * 	 
	 *
	 * @var float
	 * @insertonly
	 */
	public $fileSize = null;

	/**
	 * Uploaded file size in bytes, can be used to identify how many bytes were uploaded before resuming
	 * 	 
	 *
	 * @var float
	 * @readonly
	 */
	public $uploadedFileSize = null;

	/**
	 * Creation date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * Last update date as Unix timestamp (In seconds)
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
class VidiunUploadTokenListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunUploadToken
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
class VidiunUser extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $id = null;

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
	public $screenName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fullName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $email = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $dateOfBirth = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $country = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $state = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $city = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $zip = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $thumbnailUrl = null;

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
	public $tags = null;

	/**
	 * Admin tags can be updated only by using an admin session
	 * 	 
	 *
	 * @var string
	 */
	public $adminTags = null;

	/**
	 * 
	 *
	 * @var VidiunGender
	 */
	public $gender = null;

	/**
	 * 
	 *
	 * @var VidiunUserStatus
	 */
	public $status = null;

	/**
	 * Creation date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $createdAt = null;

	/**
	 * Last update date as Unix timestamp (In seconds)
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $updatedAt = null;

	/**
	 * Can be used to store various partner related data as a string 
	 * 	 
	 *
	 * @var string
	 */
	public $partnerData = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $indexedPartnerDataInt = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $indexedPartnerDataString = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $storageSize = null;

	/**
	 * 
	 *
	 * @var string
	 * @insertonly
	 */
	public $password = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $firstName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $lastName = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $isAdmin = null;

	/**
	 * 
	 *
	 * @var VidiunLanguageCode
	 */
	public $language = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $lastLoginTime = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $statusUpdatedAt = null;

	/**
	 * 
	 *
	 * @var int
	 * @readonly
	 */
	public $deletedAt = null;

	/**
	 * 
	 *
	 * @var bool
	 * @readonly
	 */
	public $loginEnabled = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $roleIds = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $roleNames = null;

	/**
	 * 
	 *
	 * @var bool
	 * @readonly
	 */
	public $isAccountOwner = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $allowedPartnerIds = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $allowedPartnerPackages = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUserListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunUser
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
class VidiunUserLoginData extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $loginEmail = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUserLoginDataListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunUserLoginData
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
class VidiunUserRole extends VidiunObjectBase
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
	public $description = null;

	/**
	 * 
	 *
	 * @var VidiunUserRoleStatus
	 */
	public $status = null;

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
	public $permissionNames = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tags = null;

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
class VidiunUserRoleListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunUserRole
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
class VidiunWidget extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $id = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $sourceWidgetId = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $rootWidgetId = null;

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
	public $entryId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $uiConfId = null;

	/**
	 * 
	 *
	 * @var VidiunWidgetSecurityType
	 */
	public $securityType = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $securityPolicy = null;

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
	 * Can be used to store various partner related data as a string 
	 * 	 
	 *
	 * @var string
	 */
	public $partnerData = null;

	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $widgetHTML = null;

	/**
	 * Should enforce entitlement on feed entries
	 * 	 
	 *
	 * @var bool
	 */
	public $enforceEntitlement = null;

	/**
	 * Set privacy context for search entries that assiged to private and public categories within a category privacy context.
	 * 	 
	 *
	 * @var string
	 */
	public $privacyContext = null;

	/**
	 * Addes the HTML5 script line to the widget's embed code
	 * 	 
	 *
	 * @var bool
	 */
	public $addEmbedHtml5Support = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidgetListResponse extends VidiunObjectBase
{
	/**
	 * 
	 *
	 * @var array of VidiunWidget
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
abstract class VidiunAccessControlBaseFilter extends VidiunFilter
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
	 * @var int
	 */
	public $createdAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $createdAtLessThanOrEqual = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAccessControlBlockAction extends VidiunRuleAction
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAccessControlLimitFlavorsAction extends VidiunRuleAction
{
	/**
	 * Comma separated list of flavor ids 
	 * 	 
	 *
	 * @var string
	 */
	public $flavorParamsIds = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $isBlockedList = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAccessControlPreviewAction extends VidiunRuleAction
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $limit = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunAccessControlProfileBaseFilter extends VidiunFilter
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


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAdminUser extends VidiunUser
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAmazonS3StorageProfile extends VidiunStorageProfile
{
	/**
	 * 
	 *
	 * @var VidiunAmazonS3StorageProfileFilesPermissionLevel
	 */
	public $filesPermissionInS3 = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunApiActionPermissionItem extends VidiunPermissionItem
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $service = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $action = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunApiParameterPermissionItem extends VidiunPermissionItem
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $object = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $parameter = null;

	/**
	 * 
	 *
	 * @var VidiunApiParameterPermissionItemAction
	 */
	public $action = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunAssetBaseFilter extends VidiunFilter
{
	/**
	 * 
	 *
	 * @var string
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
	 * @var string
	 */
	public $entryIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entryIdIn = null;

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
	 * @var int
	 */
	public $sizeGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $sizeLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsMultiLikeAnd = null;

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
	public $deletedAtGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $deletedAtLessThanOrEqual = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunAssetParamsBaseFilter extends VidiunFilter
{
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
	 * @var VidiunNullableBoolean
	 */
	public $isSystemDefaultEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsEqual = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAssetParamsOutput extends VidiunAssetParams
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $assetParamsId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $assetParamsVersion = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $assetId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $assetVersion = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $readyBehavior = null;

	/**
	 * The container format of the Flavor Params
	 * 	 
	 *
	 * @var VidiunContainerFormat
	 */
	public $format = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAssetPropertiesCompareCondition extends VidiunCondition
{
	/**
	 * Array of key/value objects that holds the property and the value to find and compare on an asset object
	 * 	 
	 *
	 * @var array of VidiunKeyValue
	 */
	public $properties;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAssetsParamsResourceContainers extends VidiunResource
{
	/**
	 * Array of resources associated with asset params ids
	 * 	 
	 *
	 * @var array of VidiunAssetParamsResourceContainer
	 */
	public $resources;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAuthenticatedCondition extends VidiunCondition
{
	/**
	 * The privelege needed to remove the restriction
	 * 	 
	 *
	 * @var array of VidiunStringValue
	 */
	public $privileges;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunBaseSyndicationFeedBaseFilter extends VidiunFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunBatchJobBaseFilter extends VidiunFilter
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
	 * @var int
	 */
	public $idGreaterThanOrEqual = null;

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
	public $partnerIdNotIn = null;

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
	public $executionAttemptsGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $executionAttemptsLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $lockVersionGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $lockVersionLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entryIdEqual = null;

	/**
	 * 
	 *
	 * @var VidiunBatchJobType
	 */
	public $jobTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $jobTypeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $jobTypeNotIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $jobSubTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $jobSubTypeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $jobSubTypeNotIn = null;

	/**
	 * 
	 *
	 * @var VidiunBatchJobStatus
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
	 * @var string
	 */
	public $statusNotIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $priorityGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $priorityLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $priorityEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $priorityIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $priorityNotIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $batchVersionGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $batchVersionLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $batchVersionEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $queueTimeGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $queueTimeLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $finishTimeGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $finishTimeLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var VidiunBatchJobErrorTypes
	 */
	public $errTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $errTypeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $errTypeNotIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $errNumberEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $errNumberIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $errNumberNotIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $estimatedEffortLessThan = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $estimatedEffortGreaterThan = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $urgencyLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $urgencyGreaterThanOrEqual = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBooleanValue extends VidiunValue
{
	/**
	 * 
	 *
	 * @var bool
	 */
	public $value = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkDownloadJobData extends VidiunJobData
{
	/**
	 * Comma separated list of entry ids
	 * 	 
	 *
	 * @var string
	 */
	public $entryIds = null;

	/**
	 * Flavor params id to use for conversion
	 * 	 
	 *
	 * @var int
	 */
	public $flavorParamsId = null;

	/**
	 * The id of the requesting user
	 * 	 
	 *
	 * @var string
	 */
	public $puserId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunBulkUploadBaseFilter extends VidiunFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $uploadedOnGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $uploadedOnLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $uploadedOnEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $statusIn = null;

	/**
	 * 
	 *
	 * @var VidiunBatchJobStatus
	 */
	public $statusEqual = null;

	/**
	 * 
	 *
	 * @var VidiunBulkUploadObjectType
	 */
	public $bulkUploadObjectTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $bulkUploadObjectTypeIn = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadCategoryData extends VidiunBulkUploadObjectData
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadCategoryEntryData extends VidiunBulkUploadObjectData
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadCategoryUserData extends VidiunBulkUploadObjectData
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadEntryData extends VidiunBulkUploadObjectData
{
	/**
	 * Selected profile id for all bulk entries
	 *      
	 *
	 * @var int
	 */
	public $conversionProfileId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadJobData extends VidiunJobData
{
	/**
	 * 
	 *
	 * @var string
	 * @readonly
	 */
	public $userId = null;

	/**
	 * The screen name of the user
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $uploadedBy = null;

	/**
	 * Selected profile id for all bulk entries
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $conversionProfileId = null;

	/**
	 * Created by the API
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $resultsFileLocalPath = null;

	/**
	 * Created by the API
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $resultsFileUrl = null;

	/**
	 * Number of created entries
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $numOfEntries = null;

	/**
	 * Number of created objects
	 * 	 
	 *
	 * @var int
	 * @readonly
	 */
	public $numOfObjects = null;

	/**
	 * The bulk upload file path
	 * 	 
	 *
	 * @var string
	 * @readonly
	 */
	public $filePath = null;

	/**
	 * Type of object for bulk upload
	 * 	 
	 *
	 * @var VidiunBulkUploadObjectType
	 * @readonly
	 */
	public $bulkUploadObjectType = null;

	/**
	 * Friendly name of the file, used to be recognized later in the logs.
	 * 	 
	 *
	 * @var string
	 */
	public $fileName = null;

	/**
	 * Data pertaining to the objects being uploaded
	 * 	 
	 *
	 * @var VidiunBulkUploadObjectData
	 * @readonly
	 */
	public $objectData;

	/**
	 * Type of bulk upload
	 * 	 
	 *
	 * @var VidiunBulkUploadType
	 * @readonly
	 */
	public $type = null;

	/**
	 * Recipients of the email for bulk upload success/failure
	 * 	 
	 *
	 * @var string
	 */
	public $emailRecipients = null;

	/**
	 * Number of objects that finished on error status
	 * 	 
	 *
	 * @var int
	 */
	public $numOfErrorObjects = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadResultCategory extends VidiunBulkUploadResult
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $relativePath = null;

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
	public $referenceId = null;

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
	public $tags = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $appearInList = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $privacy = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $inheritanceType = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $userJoinPolicy = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $defaultPermissionLevel = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $owner = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $contributionPolicy = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerSortValue = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $moderation = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadResultCategoryEntry extends VidiunBulkUploadResult
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $categoryId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entryId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadResultCategoryUser extends VidiunBulkUploadResult
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $categoryId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $categoryReferenceId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $userId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $permissionLevel = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $updateMethod = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $requiredObjectStatus = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadResultEntry extends VidiunBulkUploadResult
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $entryId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $title = null;

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
	public $tags = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $url = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $contentType = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $conversionProfileId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $accessControlProfileId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $category = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $scheduleStartDate = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $scheduleEndDate = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $entryStatus = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $thumbnailUrl = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $thumbnailSaved = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $sshPrivateKey = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $sshPublicKey = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $sshKeyPassphrase = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $creatorId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entitledUsersEdit = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entitledUsersPublish = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $ownerId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadResultUser extends VidiunBulkUploadResult
{
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
	public $screenName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $email = null;

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
	public $tags = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $dateOfBirth = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $country = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $state = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $city = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $zip = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $gender = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $firstName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $lastName = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadUserData extends VidiunBulkUploadObjectData
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCaptureThumbJobData extends VidiunJobData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $srcFileSyncLocalPath = null;

	/**
	 * The translated path as used by the scheduler
	 * 	 
	 *
	 * @var string
	 */
	public $actualSrcFileSyncLocalPath = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $srcFileSyncRemoteUrl = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $thumbParamsOutputId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $thumbAssetId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $srcAssetId = null;

	/**
	 * 
	 *
	 * @var VidiunAssetType
	 */
	public $srcAssetType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $thumbPath = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunCategoryBaseFilter extends VidiunFilter
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
	public $parentIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $parentIdIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $depthEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fullNameEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fullNameStartsWith = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fullNameIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fullIdsEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fullIdsStartsWith = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fullIdsMatchOr = null;

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
	 * @var string
	 */
	public $tagsLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var VidiunAppearInListType
	 */
	public $appearInListEqual = null;

	/**
	 * 
	 *
	 * @var VidiunPrivacyType
	 */
	public $privacyEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $privacyIn = null;

	/**
	 * 
	 *
	 * @var VidiunInheritanceType
	 */
	public $inheritanceTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $inheritanceTypeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $referenceIdEqual = null;

	/**
	 * 
	 *
	 * @var VidiunNullableBoolean
	 */
	public $referenceIdEmpty = null;

	/**
	 * 
	 *
	 * @var VidiunContributionPolicyType
	 */
	public $contributionPolicyEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $membersCountGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $membersCountLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $pendingMembersCountGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $pendingMembersCountLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $privacyContextEqual = null;

	/**
	 * 
	 *
	 * @var VidiunCategoryStatus
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
	public $inheritedParentIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $inheritedParentIdIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerSortValueGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerSortValueLessThanOrEqual = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryEntryAdvancedFilter extends VidiunSearchItem
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $categoriesMatchOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $categoryEntryStatusIn = null;

	/**
	 * 
	 *
	 * @var VidiunCategoryEntryAdvancedOrderBy
	 */
	public $orderBy = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $categoryIdEqual = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunCategoryEntryBaseFilter extends VidiunFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $categoryIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $categoryIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entryIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $entryIdIn = null;

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
	 * @var string
	 */
	public $categoryFullIdsStartsWith = null;

	/**
	 * 
	 *
	 * @var VidiunCategoryEntryStatus
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
class VidiunCategoryIdentifier extends VidiunObjectIdentifier
{
	/**
	 * Identifier of the object
	 * 	 
	 *
	 * @var VidiunCategoryIdentifierField
	 */
	public $identifier = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryUserAdvancedFilter extends VidiunSearchItem
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $memberIdEq = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $memberIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $memberPermissionsMatchOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $memberPermissionsMatchAnd = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunCategoryUserBaseFilter extends VidiunFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $categoryIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $categoryIdIn = null;

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
	 * @var VidiunCategoryUserPermissionLevel
	 */
	public $permissionLevelEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $permissionLevelIn = null;

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
	public $categoryFullIdsStartsWith = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $categoryFullIdsEqual = null;

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

	/**
	 * 
	 *
	 * @var string
	 */
	public $permissionNamesNotContains = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunClipAttributes extends VidiunOperationAttributes
{
	/**
	 * Offset in milliseconds
	 * 	 
	 *
	 * @var int
	 */
	public $offset = null;

	/**
	 * Duration in milliseconds
	 * 	 
	 *
	 * @var int
	 */
	public $duration = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunIntegerValue extends VidiunValue
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $value = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunCompareCondition extends VidiunCondition
{
	/**
	 * Value to evaluate against the field and operator
	 * 	 
	 *
	 * @var VidiunIntegerValue
	 */
	public $value;

	/**
	 * Comparing operator
	 * 	 
	 *
	 * @var VidiunSearchConditionComparison
	 */
	public $comparison = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunDataCenterContentResource extends VidiunContentResource
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConcatAttributes extends VidiunOperationAttributes
{
	/**
	 * The resource to be concatenated
	 * 	 
	 *
	 * @var VidiunDataCenterContentResource
	 */
	public $resource;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConcatJobData extends VidiunJobData
{
	/**
	 * Source files to be concatenated
	 * 	 
	 *
	 * @var array of VidiunString
	 */
	public $srcFiles;

	/**
	 * Output file
	 * 	 
	 *
	 * @var string
	 */
	public $destFilePath = null;

	/**
	 * Flavor asset to be ingested with the output
	 * 	 
	 *
	 * @var string
	 */
	public $flavorAssetId = null;

	/**
	 * Clipping offset in seconds
	 * 	 
	 *
	 * @var float
	 */
	public $offset = null;

	/**
	 * Clipping duration in seconds
	 * 	 
	 *
	 * @var float
	 */
	public $duration = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunControlPanelCommandBaseFilter extends VidiunFilter
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
	public $createdByIdEqual = null;

	/**
	 * 
	 *
	 * @var VidiunControlPanelCommandType
	 */
	public $typeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $typeIn = null;

	/**
	 * 
	 *
	 * @var VidiunControlPanelCommandTargetType
	 */
	public $targetTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $targetTypeIn = null;

	/**
	 * 
	 *
	 * @var VidiunControlPanelCommandStatus
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
class VidiunConvartableJobData extends VidiunJobData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $srcFileSyncLocalPath = null;

	/**
	 * The translated path as used by the scheduler
	 * 	 
	 *
	 * @var string
	 */
	public $actualSrcFileSyncLocalPath = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $srcFileSyncRemoteUrl = null;

	/**
	 * 
	 *
	 * @var array of VidiunSourceFileSyncDescriptor
	 */
	public $srcFileSyncs;

	/**
	 * 
	 *
	 * @var int
	 */
	public $engineVersion = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $flavorParamsOutputId = null;

	/**
	 * 
	 *
	 * @var VidiunFlavorParamsOutput
	 */
	public $flavorParamsOutput;

	/**
	 * 
	 *
	 * @var int
	 */
	public $mediaInfoId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $currentOperationSet = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $currentOperationIndex = null;

	/**
	 * 
	 *
	 * @var array of VidiunKeyValue
	 */
	public $pluginData;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunConversionProfileAssetParamsBaseFilter extends VidiunFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $conversionProfileIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $conversionProfileIdIn = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $assetParamsIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $assetParamsIdIn = null;

	/**
	 * 
	 *
	 * @var VidiunFlavorReadyBehaviorType
	 */
	public $readyBehaviorEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $readyBehaviorIn = null;

	/**
	 * 
	 *
	 * @var VidiunAssetParamsOrigin
	 */
	public $originEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $originIn = null;

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


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunConversionProfileBaseFilter extends VidiunFilter
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
	 * @var VidiunConversionProfileStatus
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
	 * @var VidiunConversionProfileType
	 */
	public $typeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $typeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $nameEqual = null;

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
	 * @var string
	 */
	public $tagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $defaultEntryIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $defaultEntryIdIn = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConvertLiveSegmentJobData extends VidiunJobData
{
	/**
	 * Live stream entry id
	 * 	 
	 *
	 * @var string
	 */
	public $entryId = null;

	/**
	 * Primary or secondary media server
	 * 	 
	 *
	 * @var VidiunMediaServerIndex
	 */
	public $mediaServerIndex = null;

	/**
	 * The index of the file within the entry
	 * 	 
	 *
	 * @var int
	 */
	public $fileIndex = null;

	/**
	 * The recorded live media
	 * 	 
	 *
	 * @var string
	 */
	public $srcFilePath = null;

	/**
	 * The output file
	 * 	 
	 *
	 * @var string
	 */
	public $destFilePath = null;

	/**
	 * Duration of the live entry including all recorded segments including the current
	 * 	 
	 *
	 * @var float
	 */
	public $endTime = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConvertProfileJobData extends VidiunJobData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $inputFileSyncLocalPath = null;

	/**
	 * The height of last created thumbnail, will be used to comapare if this thumbnail is the best we can have
	 * 	 
	 *
	 * @var int
	 */
	public $thumbHeight = null;

	/**
	 * The bit rate of last created thumbnail, will be used to comapare if this thumbnail is the best we can have
	 * 	 
	 *
	 * @var int
	 */
	public $thumbBitrate = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCopyPartnerJobData extends VidiunJobData
{
	/**
	 * Id of the partner to copy from
	 * 	 
	 *
	 * @var int
	 */
	public $fromPartnerId = null;

	/**
	 * Id of the partner to copy to
	 * 	 
	 *
	 * @var int
	 */
	public $toPartnerId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCountryRestriction extends VidiunBaseRestriction
{
	/**
	 * Country restriction type (Allow or deny)
	 * 	 
	 *
	 * @var VidiunCountryRestrictionType
	 */
	public $countryRestrictionType = null;

	/**
	 * Comma separated list of country codes to allow to deny 
	 * 	 
	 *
	 * @var string
	 */
	public $countryList = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDeleteFileJobData extends VidiunJobData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $localFileSyncPath = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDeleteJobData extends VidiunJobData
{
	/**
	 * The filter should return the list of objects that need to be deleted.
	 * 	 
	 *
	 * @var VidiunFilter
	 */
	public $filter;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDirectoryRestriction extends VidiunBaseRestriction
{
	/**
	 * Vidiun directory restriction type
	 * 	 
	 *
	 * @var VidiunDirectoryRestrictionType
	 */
	public $directoryRestrictionType = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryUserFilter extends VidiunCategoryUserBaseFilter
{
	/**
	 * Return the list of categoryUser that are not inherited from parent category - only the direct categoryUsers.
	 * 	 
	 *
	 * @var bool
	 */
	public $categoryDirectMembers = null;

	/**
	 * Free text search on user id or screen name
	 * 	 
	 *
	 * @var string
	 */
	public $freeText = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunUserBaseFilter extends VidiunFilter
{
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
	public $screenNameLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $screenNameStartsWith = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $emailLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $emailStartsWith = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var VidiunUserStatus
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
	 * @var string
	 */
	public $firstNameStartsWith = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $lastNameStartsWith = null;

	/**
	 * 
	 *
	 * @var VidiunNullableBoolean
	 */
	public $isAdminEqual = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUserFilter extends VidiunUserBaseFilter
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $idOrScreenNameStartsWith = null;

	/**
	 * 
	 *
	 * @var string
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
	 * @var VidiunNullableBoolean
	 */
	public $loginEnabledEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $roleIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $roleIdsEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $roleIdsIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $firstNameOrLastNameStartsWith = null;

	/**
	 * Permission names filter expression
	 * 	 
	 *
	 * @var string
	 */
	public $permissionNamesMultiLikeOr = null;

	/**
	 * Permission names filter expression
	 * 	 
	 *
	 * @var string
	 */
	public $permissionNamesMultiLikeAnd = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEntryContext extends VidiunContext
{
	/**
	 * The entry ID in the context of which the playlist should be built
	 *      
	 *
	 * @var string
	 */
	public $entryId = null;

	/**
	 * Is this a redirected entry followup?
	 *      
	 *
	 * @var VidiunNullableBoolean
	 */
	public $followEntryRedirect = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEntryContextDataParams extends VidiunAccessControlScope
{
	/**
	 * Id of the current flavor.
	 * 	 
	 *
	 * @var string
	 */
	public $flavorAssetId = null;

	/**
	 * The tags of the flavors that should be used for playback.
	 * 	 
	 *
	 * @var string
	 */
	public $flavorTags = null;

	/**
	 * Playback streamer type: RTMP, HTTP, appleHttps, rtsp, sl.
	 * 	 
	 *
	 * @var string
	 */
	public $streamerType = null;

	/**
	 * Protocol of the specific media object.
	 * 	 
	 *
	 * @var string
	 */
	public $mediaProtocol = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEntryContextDataResult extends VidiunContextDataResult
{
	/**
	 * 
	 *
	 * @var bool
	 */
	public $isSiteRestricted = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $isCountryRestricted = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $isSessionRestricted = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $isIpAddressRestricted = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $isUserAgentRestricted = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $previewLength = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $isScheduledNow = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $isAdmin = null;

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
	public $storageProfilesXML = null;

	/**
	 * Array of messages as received from the access control rules that invalidated
	 * 	 
	 *
	 * @var array of VidiunString
	 */
	public $accessControlMessages;

	/**
	 * Array of actions as received from the access control rules that invalidated
	 * 	 
	 *
	 * @var array of VidiunRuleAction
	 */
	public $accessControlActions;

	/**
	 * Array of allowed flavor assets according to access control limitations and requested tags
	 * 	 
	 *
	 * @var array of VidiunFlavorAsset
	 */
	public $flavorAssets;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEntryIdentifier extends VidiunObjectIdentifier
{
	/**
	 * Identifier of the object
	 * 	 
	 *
	 * @var VidiunEntryIdentifierField
	 */
	public $identifier = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunBooleanField extends VidiunBooleanValue
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFlattenJobData extends VidiunJobData
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGenericSyndicationFeed extends VidiunBaseSyndicationFeed
{
	/**
	 * feed description
	 *     
	 *
	 * @var string
	 */
	public $feedDescription = null;

	/**
	 * feed landing page (i.e publisher website)
	 * 	
	 *
	 * @var string
	 */
	public $feedLandingPage = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGoogleVideoSyndicationFeed extends VidiunBaseSyndicationFeed
{
	/**
	 * 
	 *
	 * @var VidiunGoogleSyndicationFeedAdultValues
	 */
	public $adultContent = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunITunesSyndicationFeed extends VidiunBaseSyndicationFeed
{
	/**
	 * feed description
	 *          
	 *
	 * @var string
	 */
	public $feedDescription = null;

	/**
	 * feed language
	 *          
	 *
	 * @var string
	 */
	public $language = null;

	/**
	 * feed landing page (i.e publisher website)
	 *          
	 *
	 * @var string
	 */
	public $feedLandingPage = null;

	/**
	 * author/publisher name
	 *          
	 *
	 * @var string
	 */
	public $ownerName = null;

	/**
	 * publisher email
	 *          
	 *
	 * @var string
	 */
	public $ownerEmail = null;

	/**
	 * podcast thumbnail
	 *          
	 *
	 * @var string
	 */
	public $feedImageUrl = null;

	/**
	 * 
	 *
	 * @var VidiunITunesSyndicationFeedCategories
	 * @readonly
	 */
	public $category = null;

	/**
	 * 
	 *
	 * @var VidiunITunesSyndicationFeedAdultValues
	 */
	public $adultContent = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $feedAuthor = null;

	/**
	 * true in case you want to enfore the palylist order on the 
	 * 		 
	 *
	 * @var VidiunNullableBoolean
	 */
	public $enforceOrder = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunImportJobData extends VidiunJobData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $srcFileUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $destFileLocalPath = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorAssetId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $fileSize = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunIndexAdvancedFilter extends VidiunSearchItem
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $indexIdGreaterThan = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunIndexJobData extends VidiunJobData
{
	/**
	 * The filter should return the list of objects that need to be reindexed.
	 * 	 
	 *
	 * @var VidiunFilter
	 */
	public $filter;

	/**
	 * Indicates the last id that reindexed, used when the batch crached, to re-run from the last crash point.
	 * 	 
	 *
	 * @var int
	 */
	public $lastIndexId = null;

	/**
	 * Indicates that the object columns and attributes values should be recalculated before reindexed.
	 * 	 
	 *
	 * @var bool
	 */
	public $shouldUpdate = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunIpAddressRestriction extends VidiunBaseRestriction
{
	/**
	 * Ip address restriction type (Allow or deny)
	 * 	 
	 *
	 * @var VidiunIpAddressRestrictionType
	 */
	public $ipAddressRestrictionType = null;

	/**
	 * Comma separated list of ip address to allow to deny 
	 * 	 
	 *
	 * @var string
	 */
	public $ipAddressList = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLimitFlavorsRestriction extends VidiunBaseRestriction
{
	/**
	 * Limit flavors restriction type (Allow or deny)
	 * 	 
	 *
	 * @var VidiunLimitFlavorsRestrictionType
	 */
	public $limitFlavorsRestrictionType = null;

	/**
	 * Comma separated list of flavor params ids to allow to deny 
	 * 	 
	 *
	 * @var string
	 */
	public $flavorParamsIds = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunLiveChannelSegmentBaseFilter extends VidiunFilter
{
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
	 * @var VidiunLiveChannelSegmentStatus
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
	 * @var string
	 */
	public $channelIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $channelIdIn = null;

	/**
	 * 
	 *
	 * @var float
	 */
	public $startTimeGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var float
	 */
	public $startTimeLessThanOrEqual = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMailJobData extends VidiunJobData
{
	/**
	 * 
	 *
	 * @var VidiunMailType
	 */
	public $mailType = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $mailPriority = null;

	/**
	 * 
	 *
	 * @var VidiunMailJobStatus
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $recipientName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $recipientEmail = null;

	/**
	 * vuserId  
	 * 	 
	 *
	 * @var int
	 */
	public $recipientId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fromName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fromEmail = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $bodyParams = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $subjectParams = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $templatePath = null;

	/**
	 * 
	 *
	 * @var VidiunLanguageCode
	 */
	public $language = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $campaignId = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $minSendDate = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $isHtml = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $separator = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunMatchCondition extends VidiunCondition
{
	/**
	 * 
	 *
	 * @var array of VidiunStringValue
	 */
	public $values;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunMediaInfoBaseFilter extends VidiunFilter
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorAssetIdEqual = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunMediaServerBaseFilter extends VidiunFilter
{
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


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMoveCategoryEntriesJobData extends VidiunJobData
{
	/**
	 * Source category id
	 * 	 
	 *
	 * @var int
	 */
	public $srcCategoryId = null;

	/**
	 * Destination category id
	 *      
	 *
	 * @var int
	 */
	public $destCategoryId = null;

	/**
	 * Saves the last category id that its entries moved completely
	 *      In case of crash the batch will restart from that point
	 *      
	 *
	 * @var int
	 */
	public $lastMovedCategoryId = null;

	/**
	 * Saves the last page index of the child categories filter pager
	 *      In case of crash the batch will restart from that point
	 *      
	 *
	 * @var int
	 */
	public $lastMovedCategoryPageIndex = null;

	/**
	 * Saves the last page index of the category entries filter pager
	 *      In case of crash the batch will restart from that point
	 *      
	 *
	 * @var int
	 */
	public $lastMovedCategoryEntryPageIndex = null;

	/**
	 * All entries from all child categories will be moved as well
	 *      
	 *
	 * @var bool
	 */
	public $moveFromChildren = null;

	/**
	 * Entries won't be deleted from the source entry
	 *      
	 *
	 * @var bool
	 */
	public $copyOnly = null;

	/**
	 * Destination categories fallback ids
	 *      
	 *
	 * @var string
	 */
	public $destCategoryFullIds = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunNotificationJobData extends VidiunJobData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $userId = null;

	/**
	 * 
	 *
	 * @var VidiunNotificationType
	 */
	public $type = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $typeAsString = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $objectId = null;

	/**
	 * 
	 *
	 * @var VidiunNotificationStatus
	 */
	public $status = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $data = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $numberOfAttempts = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $notificationResult = null;

	/**
	 * 
	 *
	 * @var VidiunNotificationObjectType
	 */
	public $objType = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunPartnerBaseFilter extends VidiunFilter
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
	 * @var string
	 */
	public $idNotIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $nameLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $nameMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $nameMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $nameEqual = null;

	/**
	 * 
	 *
	 * @var VidiunPartnerStatus
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
	public $partnerPackageEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerPackageGreaterThanOrEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $partnerPackageLessThanOrEqual = null;

	/**
	 * 
	 *
	 * @var VidiunPartnerGroupType
	 */
	public $partnerGroupTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $partnerNameDescriptionWebsiteAdminNameAdminEmailLike = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunPermissionBaseFilter extends VidiunFilter
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
	 * @var VidiunPermissionType
	 */
	public $typeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $typeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $nameEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $nameIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $friendlyNameLike = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $descriptionLike = null;

	/**
	 * 
	 *
	 * @var VidiunPermissionStatus
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
	public $dependsOnPermissionNamesMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $dependsOnPermissionNamesMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsMultiLikeAnd = null;

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


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunPermissionItemBaseFilter extends VidiunFilter
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
	 * @var VidiunPermissionItemType
	 */
	public $typeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $typeIn = null;

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
	public $tagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsMultiLikeAnd = null;

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


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunProvisionJobData extends VidiunJobData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $streamID = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $backupStreamID = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $rtmp = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $encoderIP = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $backupEncoderIP = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $encoderPassword = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $encoderUsername = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $endDate = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $returnVal = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $mediaType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $primaryBroadcastingUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $secondaryBroadcastingUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $streamName = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunReportBaseFilter extends VidiunFilter
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
	public $systemNameEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $systemNameIn = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunReportInputFilter extends VidiunReportInputBaseFilter
{
	/**
	 * Search keywords to filter objects
	 * 	 
	 *
	 * @var string
	 */
	public $keywords = null;

	/**
	 * Search keywords in onjects tags
	 * 	 
	 *
	 * @var bool
	 */
	public $searchInTags = null;

	/**
	 * Search keywords in onjects admin tags
	 * 	 
	 *
	 * @var bool
	 */
	public $searchInAdminTags = null;

	/**
	 * Search onjects in specified categories
	 * 	 
	 *
	 * @var string
	 */
	public $categories = null;

	/**
	 * Time zone offset in minutes
	 * 	 
	 *
	 * @var int
	 */
	public $timeZoneOffset = null;

	/**
	 * Aggregated results according to interval
	 * 	 
	 *
	 * @var VidiunReportInterval
	 */
	public $interval = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSearchCondition extends VidiunSearchItem
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $field = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $value = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSearchOperator extends VidiunSearchItem
{
	/**
	 * 
	 *
	 * @var VidiunSearchOperatorType
	 */
	public $type = null;

	/**
	 * 
	 *
	 * @var array of VidiunSearchItem
	 */
	public $items;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSessionRestriction extends VidiunBaseRestriction
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSiteRestriction extends VidiunBaseRestriction
{
	/**
	 * The site restriction type (allow or deny)
	 * 	 
	 *
	 * @var VidiunSiteRestrictionType
	 */
	public $siteRestrictionType = null;

	/**
	 * Comma separated list of sites (domains) to allow or deny
	 * 	 
	 *
	 * @var string
	 */
	public $siteList = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStorageAddAction extends VidiunRuleAction
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStorageJobData extends VidiunJobData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $serverUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $serverUsername = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $serverPassword = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $ftpPassiveMode = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $srcFileSyncLocalPath = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $srcFileSyncId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $destFileSyncStoredPath = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunStorageProfileBaseFilter extends VidiunFilter
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
	 * @var VidiunStorageProfileStatus
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
	 * @var VidiunStorageProfileProtocol
	 */
	public $protocolEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $protocolIn = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSyncCategoryPrivacyContextJobData extends VidiunJobData
{
	/**
	 * category id
	 * 	 
	 *
	 * @var int
	 */
	public $categoryId = null;

	/**
	 * Saves the last category entry creation date that was updated
	 *      In case of crash the batch will restart from that point
	 *      
	 *
	 * @var int
	 */
	public $lastUpdatedCategoryEntryCreatedAt = null;

	/**
	 * Saves the last sub category creation date that was updated
	 *      In case of crash the batch will restart from that point
	 *      
	 *
	 * @var int
	 */
	public $lastUpdatedCategoryCreatedAt = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunTubeMogulSyndicationFeed extends VidiunBaseSyndicationFeed
{
	/**
	 * 
	 *
	 * @var VidiunTubeMogulSyndicationFeedCategories
	 * @readonly
	 */
	public $category = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunUiConfBaseFilter extends VidiunFilter
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
	 * @var string
	 */
	public $nameLike = null;

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
	 * @var VidiunUiConfObjType
	 */
	public $objTypeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $objTypeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsMultiLikeAnd = null;

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
	 * @var VidiunUiConfCreationMode
	 */
	public $creationModeEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $creationModeIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $versionEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $versionMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $versionMultiLikeAnd = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $partnerTagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $partnerTagsMultiLikeAnd = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunUploadTokenBaseFilter extends VidiunFilter
{
	/**
	 * 
	 *
	 * @var string
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
	 * @var string
	 */
	public $userIdEqual = null;

	/**
	 * 
	 *
	 * @var VidiunUploadTokenStatus
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
	 * @var string
	 */
	public $fileNameEqual = null;

	/**
	 * 
	 *
	 * @var float
	 */
	public $fileSizeEqual = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUserAgentRestriction extends VidiunBaseRestriction
{
	/**
	 * User agent restriction type (Allow or deny)
	 * 	 
	 *
	 * @var VidiunUserAgentRestrictionType
	 */
	public $userAgentRestrictionType = null;

	/**
	 * A comma seperated list of user agent regular expressions
	 * 	 
	 *
	 * @var string
	 */
	public $userAgentRegexList = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunUserLoginDataBaseFilter extends VidiunFilter
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $loginEmailEqual = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunUserRoleBaseFilter extends VidiunFilter
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
	 * @var string
	 */
	public $nameEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $nameIn = null;

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
	 * @var string
	 */
	public $descriptionLike = null;

	/**
	 * 
	 *
	 * @var VidiunUserRoleStatus
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
	public $tagsMultiLikeOr = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $tagsMultiLikeAnd = null;

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


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUserRoleCondition extends VidiunCondition
{
	/**
	 * Comma separated list of role ids
	 * 	 
	 *
	 * @var string
	 */
	public $roleIds = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunWidgetBaseFilter extends VidiunFilter
{
	/**
	 * 
	 *
	 * @var string
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
	 * @var string
	 */
	public $sourceWidgetIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $rootWidgetIdEqual = null;

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
	public $entryIdEqual = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $uiConfIdEqual = null;

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
	 * @var string
	 */
	public $partnerDataLike = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunYahooSyndicationFeed extends VidiunBaseSyndicationFeed
{
	/**
	 * 
	 *
	 * @var VidiunYahooSyndicationFeedCategories
	 * @readonly
	 */
	public $category = null;

	/**
	 * 
	 *
	 * @var VidiunYahooSyndicationFeedAdultValues
	 */
	public $adultContent = null;

	/**
	 * feed description
	 *          
	 *
	 * @var string
	 */
	public $feedDescription = null;

	/**
	 * feed landing page (i.e publisher website)
	 *          
	 *
	 * @var string
	 */
	public $feedLandingPage = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAccessControlFilter extends VidiunAccessControlBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAccessControlProfileFilter extends VidiunAccessControlProfileBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAkamaiProvisionJobData extends VidiunProvisionJobData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $wsdlUsername = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $wsdlPassword = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $cpcode = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $emailId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $primaryContact = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $secondaryContact = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAkamaiUniversalProvisionJobData extends VidiunProvisionJobData
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $streamId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $systemUserName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $systemPassword = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $domainName = null;

	/**
	 * 
	 *
	 * @var VidiunDVRStatus
	 */
	public $dvrEnabled = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $dvrWindow = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $primaryContact = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $secondaryContact = null;

	/**
	 * 
	 *
	 * @var VidiunAkamaiUniversalStreamType
	 */
	public $streamType = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $notificationEmail = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAssetFilter extends VidiunAssetBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAssetParamsFilter extends VidiunAssetParamsBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAssetResource extends VidiunContentResource
{
	/**
	 * ID of the source asset 
	 * 	 
	 *
	 * @var string
	 */
	public $assetId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBaseSyndicationFeedFilter extends VidiunBaseSyndicationFeedBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBatchJobFilter extends VidiunBatchJobBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadFilter extends VidiunBulkUploadBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryEntryFilter extends VidiunCategoryEntryBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryFilter extends VidiunCategoryBaseFilter
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $freeText = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $membersIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $nameOrReferenceIdStartsWith = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $managerEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $memberEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $fullNameStartsWithIn = null;

	/**
	 * not includes the category itself (only sub categories)
	 * 	 
	 *
	 * @var string
	 */
	public $ancestorIdIn = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $idOrInheritedParentIdIn = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunControlPanelCommandFilter extends VidiunControlPanelCommandBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConversionProfileFilter extends VidiunConversionProfileBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConversionProfileAssetParamsFilter extends VidiunConversionProfileAssetParamsBaseFilter
{
	/**
	 * 
	 *
	 * @var VidiunConversionProfileFilter
	 */
	public $conversionProfileIdFilter;

	/**
	 * 
	 *
	 * @var VidiunAssetParamsFilter
	 */
	public $assetParamsIdFilter;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConvertCollectionJobData extends VidiunConvartableJobData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $destDirLocalPath = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $destDirRemoteUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $destFileName = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $inputXmlLocalPath = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $inputXmlRemoteUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $commandLinesStr = null;

	/**
	 * 
	 *
	 * @var array of VidiunConvertCollectionFlavorData
	 */
	public $flavors;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConvertJobData extends VidiunConvartableJobData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $destFileSyncLocalPath = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $destFileSyncRemoteUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $logFileSyncLocalPath = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $logFileSyncRemoteUrl = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorAssetId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $remoteMediaId = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $customData = null;

	/**
	 * 
	 *
	 * @var array of VidiunDestFileSyncDescriptor
	 */
	public $extraDestFileSyncs;

	/**
	 * 
	 *
	 * @var string
	 */
	public $engineMessage = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCountryCondition extends VidiunMatchCondition
{
	/**
	 * The ip geo coder engine to be used
	 * 	 
	 *
	 * @var VidiunGeoCoderType
	 */
	public $geoCoderType = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEndUserReportInputFilter extends VidiunReportInputFilter
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $application = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $userIds = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $playbackContext = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEntryResource extends VidiunContentResource
{
	/**
	 * ID of the source entry 
	 * 	 
	 *
	 * @var string
	 */
	public $entryId = null;

	/**
	 * ID of the source flavor params, set to null to use the source flavor
	 * 	 
	 *
	 * @var int
	 */
	public $flavorParamsId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunExtractMediaJobData extends VidiunConvartableJobData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorAssetId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunIntegerField extends VidiunIntegerValue
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFieldCompareCondition extends VidiunCompareCondition
{
	/**
	 * Field to evaluate
	 * 	 
	 *
	 * @var VidiunIntegerField
	 */
	public $field;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunStringField extends VidiunStringValue
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFieldMatchCondition extends VidiunMatchCondition
{
	/**
	 * Field to evaluate
	 * 	 
	 *
	 * @var VidiunStringField
	 */
	public $field;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFileSyncResource extends VidiunContentResource
{
	/**
	 * The object type of the file sync object 
	 * 	 
	 *
	 * @var int
	 */
	public $fileSyncObjectType = null;

	/**
	 * The object sub-type of the file sync object 
	 * 	 
	 *
	 * @var int
	 */
	public $objectSubType = null;

	/**
	 * The object id of the file sync object 
	 * 	 
	 *
	 * @var string
	 */
	public $objectId = null;

	/**
	 * The version of the file sync object 
	 * 	 
	 *
	 * @var string
	 */
	public $version = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGenericXsltSyndicationFeed extends VidiunGenericSyndicationFeed
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $xslt = null;

	/**
	 * 
	 *
	 * @var array of VidiunExtendingItemMrssParameter
	 */
	public $itemXpathsToExtend;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunIpAddressCondition extends VidiunMatchCondition
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveAsset extends VidiunFlavorAsset
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $multicastIP = null;

	/**
	 * 
	 *
	 * @var int
	 */
	public $multicastPort = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveChannelSegmentFilter extends VidiunLiveChannelSegmentBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveParams extends VidiunFlavorParams
{
	/**
	 * Suffix to be added to the stream name after the entry id {entry_id}_{stream_suffix}, e.g. for entry id 0_kjdu5jr6 and suffix 1, the stream name will be 0_kjdu5jr6_1
	 * 	 
	 *
	 * @var string
	 */
	public $streamSuffix = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaFlavorParams extends VidiunFlavorParams
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaInfoFilter extends VidiunMediaInfoBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaServerFilter extends VidiunMediaServerBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunOperationResource extends VidiunContentResource
{
	/**
	 * Only VidiunEntryResource and VidiunAssetResource are supported
	 * 	 
	 *
	 * @var VidiunContentResource
	 */
	public $resource;

	/**
	 * 
	 *
	 * @var array of VidiunOperationAttributes
	 */
	public $operationAttributes;

	/**
	 * ID of alternative asset params to be used instead of the system default flavor params 
	 * 	 
	 *
	 * @var int
	 */
	public $assetParamsId = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPartnerFilter extends VidiunPartnerBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPermissionFilter extends VidiunPermissionBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPermissionItemFilter extends VidiunPermissionItemBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPostConvertJobData extends VidiunConvartableJobData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorAssetId = null;

	/**
	 * Indicates if a thumbnail should be created
	 * 	 
	 *
	 * @var bool
	 */
	public $createThumb = null;

	/**
	 * The path of the created thumbnail
	 * 	 
	 *
	 * @var string
	 */
	public $thumbPath = null;

	/**
	 * The position of the thumbnail in the media file
	 * 	 
	 *
	 * @var int
	 */
	public $thumbOffset = null;

	/**
	 * The height of the movie, will be used to comapare if this thumbnail is the best we can have
	 * 	 
	 *
	 * @var int
	 */
	public $thumbHeight = null;

	/**
	 * The bit rate of the movie, will be used to comapare if this thumbnail is the best we can have
	 * 	 
	 *
	 * @var int
	 */
	public $thumbBitrate = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $customData = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPreviewRestriction extends VidiunSessionRestriction
{
	/**
	 * The preview restriction length 
	 * 	 
	 *
	 * @var int
	 */
	public $previewLength = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunRegexCondition extends VidiunMatchCondition
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunRemoteStorageResources extends VidiunContentResource
{
	/**
	 * Array of remote stoage resources 
	 * 	 
	 *
	 * @var array of VidiunRemoteStorageResource
	 */
	public $resources;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunReportFilter extends VidiunReportBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSearchComparableCondition extends VidiunSearchCondition
{
	/**
	 * 
	 *
	 * @var VidiunSearchConditionComparison
	 */
	public $comparison = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSiteCondition extends VidiunMatchCondition
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSshImportJobData extends VidiunImportJobData
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $privateKey = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $publicKey = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $passPhrase = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStorageDeleteJobData extends VidiunStorageJobData
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStorageExportJobData extends VidiunStorageJobData
{
	/**
	 * 
	 *
	 * @var bool
	 */
	public $force = null;

	/**
	 * 
	 *
	 * @var bool
	 */
	public $createLink = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStorageProfileFilter extends VidiunStorageProfileBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStringResource extends VidiunContentResource
{
	/**
	 * Textual content
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
class VidiunUiConfFilter extends VidiunUiConfBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUploadTokenFilter extends VidiunUploadTokenBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUserLoginDataFilter extends VidiunUserLoginDataBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUserRoleFilter extends VidiunUserRoleBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidgetFilter extends VidiunWidgetBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunAdminUserBaseFilter extends VidiunUserFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAmazonS3StorageExportJobData extends VidiunStorageExportJobData
{
	/**
	 * 
	 *
	 * @var VidiunAmazonS3StorageProfileFilesPermissionLevel
	 */
	public $filesPermissionInS3 = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunAmazonS3StorageProfileBaseFilter extends VidiunStorageProfileFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunApiActionPermissionItemBaseFilter extends VidiunPermissionItemFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunApiParameterPermissionItemBaseFilter extends VidiunPermissionItemFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBatchJobFilterExt extends VidiunBatchJobFilter
{
	/**
	 * 
	 *
	 * @var string
	 */
	public $jobTypeAndSubTypeIn = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCountryContextField extends VidiunStringField
{
	/**
	 * The ip geo coder engine to be used
	 * 	 
	 *
	 * @var VidiunGeoCoderType
	 */
	public $geoCoderType = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunDataEntryBaseFilter extends VidiunBaseEntryFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEvalBooleanField extends VidiunBooleanField
{
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
class VidiunEvalStringField extends VidiunStringField
{
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
abstract class VidiunFlavorAssetBaseFilter extends VidiunAssetFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $flavorParamsIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorParamsIdIn = null;

	/**
	 * 
	 *
	 * @var VidiunFlavorAssetStatus
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
	 * @var string
	 */
	public $statusNotIn = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunFlavorParamsBaseFilter extends VidiunAssetParamsFilter
{
	/**
	 * 
	 *
	 * @var VidiunContainerFormat
	 */
	public $formatEqual = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunGenericSyndicationFeedBaseFilter extends VidiunBaseSyndicationFeedFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunGoogleVideoSyndicationFeedBaseFilter extends VidiunBaseSyndicationFeedFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunITunesSyndicationFeedBaseFilter extends VidiunBaseSyndicationFeedFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunIpAddressContextField extends VidiunStringField
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaFlavorParamsOutput extends VidiunFlavorParamsOutput
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunObjectIdField extends VidiunStringField
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunPlaylistBaseFilter extends VidiunBaseEntryFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunServerFileResource extends VidiunDataCenterContentResource
{
	/**
	 * Full path to the local file 
	 * 	 
	 *
	 * @var string
	 */
	public $localFilePath = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSshUrlResource extends VidiunUrlResource
{
	/**
	 * SSH private key
	 * 	 
	 *
	 * @var string
	 */
	public $privateKey = null;

	/**
	 * SSH public key
	 * 	 
	 *
	 * @var string
	 */
	public $publicKey = null;

	/**
	 * Passphrase for SSH keys
	 * 	 
	 *
	 * @var string
	 */
	public $keyPassphrase = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunThumbAssetBaseFilter extends VidiunAssetFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $thumbParamsIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $thumbParamsIdIn = null;

	/**
	 * 
	 *
	 * @var VidiunThumbAssetStatus
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
	 * @var string
	 */
	public $statusNotIn = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunThumbParamsBaseFilter extends VidiunAssetParamsFilter
{
	/**
	 * 
	 *
	 * @var VidiunContainerFormat
	 */
	public $formatEqual = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunTimeContextField extends VidiunIntegerField
{
	/**
	 * Time offset in seconds since current time
	 * 	 
	 *
	 * @var int
	 */
	public $offset = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunTubeMogulSyndicationFeedBaseFilter extends VidiunBaseSyndicationFeedFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUploadedFileTokenResource extends VidiunDataCenterContentResource
{
	/**
	 * Token that returned from upload.upload action or uploadToken.add action. 
	 * 	 
	 *
	 * @var string
	 */
	public $token = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUserAgentCondition extends VidiunRegexCondition
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUserAgentContextField extends VidiunStringField
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUserEmailContextField extends VidiunStringField
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWebcamTokenResource extends VidiunDataCenterContentResource
{
	/**
	 * Token that returned from media server such as FMS or red5.
	 * 	 
	 *
	 * @var string
	 */
	public $token = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunYahooSyndicationFeedBaseFilter extends VidiunBaseSyndicationFeedFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAdminUserFilter extends VidiunAdminUserBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAmazonS3StorageProfileFilter extends VidiunAmazonS3StorageProfileBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunApiActionPermissionItemFilter extends VidiunApiActionPermissionItemBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunApiParameterPermissionItemFilter extends VidiunApiParameterPermissionItemBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDataEntryFilter extends VidiunDataEntryBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFlavorAssetFilter extends VidiunFlavorAssetBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFlavorParamsFilter extends VidiunFlavorParamsBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGenericSyndicationFeedFilter extends VidiunGenericSyndicationFeedBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGoogleVideoSyndicationFeedFilter extends VidiunGoogleVideoSyndicationFeedBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunITunesSyndicationFeedFilter extends VidiunITunesSyndicationFeedBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPlaylistFilter extends VidiunPlaylistBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunThumbAssetFilter extends VidiunThumbAssetBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunThumbParamsFilter extends VidiunThumbParamsBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunTubeMogulSyndicationFeedFilter extends VidiunTubeMogulSyndicationFeedBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunYahooSyndicationFeedFilter extends VidiunYahooSyndicationFeedBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunFlavorParamsOutputBaseFilter extends VidiunFlavorParamsFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $flavorParamsIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorParamsVersionEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorAssetIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $flavorAssetVersionEqual = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunGenericXsltSyndicationFeedBaseFilter extends VidiunGenericSyndicationFeedFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunLiveAssetBaseFilter extends VidiunFlavorAssetFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunLiveParamsBaseFilter extends VidiunFlavorParamsFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveStreamAdminEntry extends VidiunLiveStreamEntry
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunMediaFlavorParamsBaseFilter extends VidiunFlavorParamsFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunMixEntryBaseFilter extends VidiunPlayableEntryFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunThumbParamsOutputBaseFilter extends VidiunThumbParamsFilter
{
	/**
	 * 
	 *
	 * @var int
	 */
	public $thumbParamsIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $thumbParamsVersionEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $thumbAssetIdEqual = null;

	/**
	 * 
	 *
	 * @var string
	 */
	public $thumbAssetVersionEqual = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFlavorParamsOutputFilter extends VidiunFlavorParamsOutputBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGenericXsltSyndicationFeedFilter extends VidiunGenericXsltSyndicationFeedBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveAssetFilter extends VidiunLiveAssetBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveParamsFilter extends VidiunLiveParamsBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaFlavorParamsFilter extends VidiunMediaFlavorParamsBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMixEntryFilter extends VidiunMixEntryBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunThumbParamsOutputFilter extends VidiunThumbParamsOutputBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunLiveEntryBaseFilter extends VidiunMediaEntryFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunMediaFlavorParamsOutputBaseFilter extends VidiunFlavorParamsOutputFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveEntryFilter extends VidiunLiveEntryBaseFilter
{
	/**
	 * 
	 *
	 * @var VidiunNullableBoolean
	 */
	public $isLive = null;


}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaFlavorParamsOutputFilter extends VidiunMediaFlavorParamsOutputBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunLiveChannelBaseFilter extends VidiunLiveEntryFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunLiveStreamEntryBaseFilter extends VidiunLiveEntryFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveChannelFilter extends VidiunLiveChannelBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveStreamEntryFilter extends VidiunLiveStreamEntryBaseFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
abstract class VidiunLiveStreamAdminEntryBaseFilter extends VidiunLiveStreamEntryFilter
{

}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveStreamAdminEntryFilter extends VidiunLiveStreamAdminEntryBaseFilter
{

}

