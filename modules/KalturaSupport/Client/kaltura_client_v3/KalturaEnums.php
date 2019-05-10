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
require_once(dirname(__FILE__) . "/VidiunClientBase.php");

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAppearInListType
{
	const PARTNER_ONLY = 1;
	const CATEGORY_MEMBERS_ONLY = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAssetParamsDeletePolicy
{
	const KEEP = 0;
	const DELETE = 1;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAssetParamsOrigin
{
	const CONVERT = 0;
	const INGEST = 1;
	const CONVERT_WHEN_MISSING = 2;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAssetStatus
{
	const ERROR = -1;
	const QUEUED = 0;
	const READY = 2;
	const DELETED = 3;
	const IMPORTING = 7;
	const EXPORTING = 9;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBatchJobErrorTypes
{
	const APP = 0;
	const RUNTIME = 1;
	const HTTP = 2;
	const CURL = 3;
	const VIDIUN_API = 4;
	const VIDIUN_CLIENT = 5;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBatchJobStatus
{
	const PENDING = 0;
	const QUEUED = 1;
	const PROCESSING = 2;
	const PROCESSED = 3;
	const MOVEFILE = 4;
	const FINISHED = 5;
	const FAILED = 6;
	const ABORTED = 7;
	const ALMOST_DONE = 8;
	const RETRY = 9;
	const FATAL = 10;
	const DONT_PROCESS = 11;
	const FINISHED_PARTIALLY = 12;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBitRateMode
{
	const CBR = 1;
	const VBR = 2;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryEntryStatus
{
	const PENDING = 1;
	const ACTIVE = 2;
	const DELETED = 3;
	const REJECTED = 4;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryStatus
{
	const UPDATING = 1;
	const ACTIVE = 2;
	const DELETED = 3;
	const PURGED = 4;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryUserPermissionLevel
{
	const MANAGER = 0;
	const MODERATOR = 1;
	const CONTRIBUTOR = 2;
	const MEMBER = 3;
	const NONE = 4;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryUserStatus
{
	const ACTIVE = 1;
	const PENDING = 2;
	const NOT_ACTIVE = 3;
	const DELETED = 4;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCommercialUseType
{
	const NON_COMMERCIAL_USE = 0;
	const COMMERCIAL_USE = 1;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunContributionPolicyType
{
	const ALL = 1;
	const MEMBERS_WITH_CONTRIBUTION_PERMISSION = 2;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunControlPanelCommandStatus
{
	const PENDING = 1;
	const HANDLED = 2;
	const DONE = 3;
	const FAILED = 4;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunControlPanelCommandTargetType
{
	const DATA_CENTER = 1;
	const SCHEDULER = 2;
	const JOB_TYPE = 3;
	const JOB = 4;
	const BATCH = 5;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunControlPanelCommandType
{
	const KILL = 4;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCountryRestrictionType
{
	const RESTRICT_COUNTRY_LIST = 0;
	const ALLOW_COUNTRY_LIST = 1;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDVRStatus
{
	const DISABLED = 0;
	const ENABLED = 1;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDirectoryRestrictionType
{
	const DONT_DISPLAY = 0;
	const DISPLAY_WITH_LINK = 1;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEditorType
{
	const SIMPLE = 1;
	const ADVANCED = 2;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEmailIngestionProfileStatus
{
	const INACTIVE = 0;
	const ACTIVE = 1;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEntryModerationStatus
{
	const PENDING_MODERATION = 1;
	const APPROVED = 2;
	const REJECTED = 3;
	const FLAGGED_FOR_REVIEW = 5;
	const AUTO_APPROVED = 6;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFeatureStatusType
{
	const LOCK_CATEGORY = 1;
	const CATEGORY = 2;
	const CATEGORY_ENTRY = 3;
	const ENTRY = 4;
	const CATEGORY_USER = 5;
	const USER = 6;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFlavorAssetStatus
{
	const ERROR = -1;
	const QUEUED = 0;
	const CONVERTING = 1;
	const READY = 2;
	const DELETED = 3;
	const NOT_APPLICABLE = 4;
	const TEMP = 5;
	const WAIT_FOR_CONVERT = 6;
	const IMPORTING = 7;
	const VALIDATING = 8;
	const EXPORTING = 9;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFlavorReadyBehaviorType
{
	const NO_IMPACT = 0;
	const INHERIT_FLAVOR_PARAMS = 0;
	const REQUIRED = 1;
	const OPTIONAL = 2;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGender
{
	const UNKNOWN = 0;
	const MALE = 1;
	const FEMALE = 2;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunInheritanceType
{
	const INHERIT = 1;
	const MANUAL = 2;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunIpAddressRestrictionType
{
	const RESTRICT_LIST = 0;
	const ALLOW_LIST = 1;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLicenseType
{
	const UNKNOWN = -1;
	const NONE = 0;
	const COPYRIGHTED = 1;
	const PUBLIC_DOMAIN = 2;
	const CREATIVECOMMONS_ATTRIBUTION = 3;
	const CREATIVECOMMONS_ATTRIBUTION_SHARE_ALIKE = 4;
	const CREATIVECOMMONS_ATTRIBUTION_NO_DERIVATIVES = 5;
	const CREATIVECOMMONS_ATTRIBUTION_NON_COMMERCIAL = 6;
	const CREATIVECOMMONS_ATTRIBUTION_NON_COMMERCIAL_SHARE_ALIKE = 7;
	const CREATIVECOMMONS_ATTRIBUTION_NON_COMMERCIAL_NO_DERIVATIVES = 8;
	const GFDL = 9;
	const GPL = 10;
	const AFFERO_GPL = 11;
	const LGPL = 12;
	const BSD = 13;
	const APACHE = 14;
	const MOZILLA = 15;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLimitFlavorsRestrictionType
{
	const RESTRICT_LIST = 0;
	const ALLOW_LIST = 1;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLivePublishStatus
{
	const DISABLED = 0;
	const ENABLED = 1;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMailJobStatus
{
	const PENDING = 1;
	const SENT = 2;
	const ERROR = 3;
	const QUEUED = 4;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaServerIndex
{
	const PRIMARY = 0;
	const SECONDARY = 1;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaType
{
	const VIDEO = 1;
	const IMAGE = 2;
	const AUDIO = 5;
	const LIVE_STREAM_FLASH = 201;
	const LIVE_STREAM_WINDOWS_MEDIA = 202;
	const LIVE_STREAM_REAL_MEDIA = 203;
	const LIVE_STREAM_QUICKTIME = 204;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunModerationFlagType
{
	const SEXUAL_CONTENT = 1;
	const VIOLENT_REPULSIVE = 2;
	const HARMFUL_DANGEROUS = 3;
	const SPAM_COMMERCIALS = 4;
	const COPYRIGHT = 5;
	const TERMS_OF_USE_VIOLATION = 6;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMrssExtensionMode
{
	const APPEND = 1;
	const REPLACE = 2;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunNotificationObjectType
{
	const ENTRY = 1;
	const VSHOW = 2;
	const USER = 3;
	const BATCH_JOB = 4;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunNotificationStatus
{
	const PENDING = 1;
	const SENT = 2;
	const ERROR = 3;
	const SHOULD_RESEND = 4;
	const ERROR_RESENDING = 5;
	const SENT_SYNCH = 6;
	const QUEUED = 7;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunNotificationType
{
	const ENTRY_ADD = 1;
	const ENTR_UPDATE_PERMISSIONS = 2;
	const ENTRY_DELETE = 3;
	const ENTRY_BLOCK = 4;
	const ENTRY_UPDATE = 5;
	const ENTRY_UPDATE_THUMBNAIL = 6;
	const ENTRY_UPDATE_MODERATION = 7;
	const USER_ADD = 21;
	const USER_BANNED = 26;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunNullableBoolean
{
	const NULL_VALUE = -1;
	const FALSE_VALUE = 0;
	const TRUE_VALUE = 1;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPartnerGroupType
{
	const PUBLISHER = 1;
	const VAR_GROUP = 2;
	const GROUP = 3;
	const TEMPLATE = 4;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPartnerStatus
{
	const DELETED = 0;
	const ACTIVE = 1;
	const BLOCKED = 2;
	const FULL_BLOCK = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPartnerType
{
	const VMC = 1;
	const WIKI = 100;
	const WORDPRESS = 101;
	const DRUPAL = 102;
	const DEKIWIKI = 103;
	const MOODLE = 104;
	const COMMUNITY_EDITION = 105;
	const JOOMLA = 106;
	const BLACKBOARD = 107;
	const SAKAI = 108;
	const ADMIN_CONSOLE = 109;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPermissionStatus
{
	const ACTIVE = 1;
	const BLOCKED = 2;
	const DELETED = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPermissionType
{
	const NORMAL = 1;
	const SPECIAL_FEATURE = 2;
	const PLUGIN = 3;
	const PARTNER_GROUP = 4;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPlaylistType
{
	const STATIC_LIST = 3;
	const DYNAMIC = 10;
	const EXTERNAL = 101;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPrivacyType
{
	const ALL = 1;
	const AUTHENTICATED_USERS = 2;
	const MEMBERS_ONLY = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunRecordStatus
{
	const DISABLED = 0;
	const ENABLED = 1;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunReportType
{
	const TOP_CONTENT = 1;
	const CONTENT_DROPOFF = 2;
	const CONTENT_INTERACTIONS = 3;
	const MAP_OVERLAY = 4;
	const TOP_CONTRIBUTORS = 5;
	const TOP_SYNDICATION = 6;
	const CONTENT_CONTRIBUTIONS = 7;
	const USER_ENGAGEMENT = 11;
	const SPEFICIC_USER_ENGAGEMENT = 12;
	const USER_TOP_CONTENT = 13;
	const USER_CONTENT_DROPOFF = 14;
	const USER_CONTENT_INTERACTIONS = 15;
	const APPLICATIONS = 16;
	const USER_USAGE = 17;
	const SPECIFIC_USER_USAGE = 18;
	const VAR_USAGE = 19;
	const TOP_CREATORS = 20;
	const PLATFORMS = 21;
	const OPERATION_SYSTEM = 22;
	const BROWSERS = 23;
	const PARTNER_USAGE = 201;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunResponseType
{
	const RESPONSE_TYPE_JSON = 1;
	const RESPONSE_TYPE_XML = 2;
	const RESPONSE_TYPE_PHP = 3;
	const RESPONSE_TYPE_PHP_ARRAY = 4;
	const RESPONSE_TYPE_HTML = 7;
	const RESPONSE_TYPE_MRSS = 8;
	const RESPONSE_TYPE_JSONP = 9;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSearchOperatorType
{
	const SEARCH_AND = 1;
	const SEARCH_OR = 2;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSearchProviderType
{
	const FLICKR = 3;
	const YOUTUBE = 4;
	const MYSPACE = 7;
	const PHOTOBUCKET = 8;
	const JAMENDO = 9;
	const CCMIXTER = 10;
	const NYPL = 11;
	const CURRENT = 12;
	const MEDIA_COMMONS = 13;
	const VIDIUN = 20;
	const VIDIUN_USER_CLIPS = 21;
	const ARCHIVE_ORG = 22;
	const VIDIUN_PARTNER = 23;
	const METACAFE = 24;
	const SEARCH_PROXY = 28;
	const PARTNER_SPECIFIC = 100;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSessionType
{
	const USER = 0;
	const ADMIN = 2;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSiteRestrictionType
{
	const RESTRICT_SITE_LIST = 0;
	const ALLOW_SITE_LIST = 1;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStatsEventType
{
	const WIDGET_LOADED = 1;
	const MEDIA_LOADED = 2;
	const PLAY = 3;
	const PLAY_REACHED_25 = 4;
	const PLAY_REACHED_50 = 5;
	const PLAY_REACHED_75 = 6;
	const PLAY_REACHED_100 = 7;
	const OPEN_EDIT = 8;
	const OPEN_VIRAL = 9;
	const OPEN_DOWNLOAD = 10;
	const OPEN_REPORT = 11;
	const BUFFER_START = 12;
	const BUFFER_END = 13;
	const OPEN_FULL_SCREEN = 14;
	const CLOSE_FULL_SCREEN = 15;
	const REPLAY = 16;
	const SEEK = 17;
	const OPEN_UPLOAD = 18;
	const SAVE_PUBLISH = 19;
	const CLOSE_EDITOR = 20;
	const PRE_BUMPER_PLAYED = 21;
	const POST_BUMPER_PLAYED = 22;
	const BUMPER_CLICKED = 23;
	const PREROLL_STARTED = 24;
	const MIDROLL_STARTED = 25;
	const POSTROLL_STARTED = 26;
	const OVERLAY_STARTED = 27;
	const PREROLL_CLICKED = 28;
	const MIDROLL_CLICKED = 29;
	const POSTROLL_CLICKED = 30;
	const OVERLAY_CLICKED = 31;
	const PREROLL_25 = 32;
	const PREROLL_50 = 33;
	const PREROLL_75 = 34;
	const MIDROLL_25 = 35;
	const MIDROLL_50 = 36;
	const MIDROLL_75 = 37;
	const POSTROLL_25 = 38;
	const POSTROLL_50 = 39;
	const POSTROLL_75 = 40;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStatsFeatureType
{
	const NONE = 0;
	const RELATED = 1;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStatsVmcEventType
{
	const CONTENT_PAGE_VIEW = 1001;
	const CONTENT_ADD_PLAYLIST = 1010;
	const CONTENT_EDIT_PLAYLIST = 1011;
	const CONTENT_DELETE_PLAYLIST = 1012;
	const CONTENT_EDIT_ENTRY = 1013;
	const CONTENT_CHANGE_THUMBNAIL = 1014;
	const CONTENT_ADD_TAGS = 1015;
	const CONTENT_REMOVE_TAGS = 1016;
	const CONTENT_ADD_ADMIN_TAGS = 1017;
	const CONTENT_REMOVE_ADMIN_TAGS = 1018;
	const CONTENT_DOWNLOAD = 1019;
	const CONTENT_APPROVE_MODERATION = 1020;
	const CONTENT_REJECT_MODERATION = 1021;
	const CONTENT_BULK_UPLOAD = 1022;
	const CONTENT_ADMIN_VCW_UPLOAD = 1023;
	const ACCOUNT_CHANGE_PARTNER_INFO = 1030;
	const ACCOUNT_CHANGE_LOGIN_INFO = 1031;
	const ACCOUNT_CONTACT_US_USAGE = 1032;
	const ACCOUNT_UPDATE_SERVER_SETTINGS = 1033;
	const ACCOUNT_ACCOUNT_OVERVIEW = 1034;
	const ACCOUNT_ACCESS_CONTROL = 1035;
	const ACCOUNT_TRANSCODING_SETTINGS = 1036;
	const ACCOUNT_ACCOUNT_UPGRADE = 1037;
	const ACCOUNT_SAVE_SERVER_SETTINGS = 1038;
	const ACCOUNT_ACCESS_CONTROL_DELETE = 1039;
	const ACCOUNT_SAVE_TRANSCODING_SETTINGS = 1040;
	const LOGIN = 1041;
	const DASHBOARD_IMPORT_CONTENT = 1042;
	const DASHBOARD_UPDATE_CONTENT = 1043;
	const DASHBOARD_ACCOUNT_CONTACT_US = 1044;
	const DASHBOARD_VIEW_REPORTS = 1045;
	const DASHBOARD_EMBED_PLAYER = 1046;
	const DASHBOARD_EMBED_PLAYLIST = 1047;
	const DASHBOARD_CUSTOMIZE_PLAYERS = 1048;
	const APP_STUDIO_NEW_PLAYER_SINGLE_VIDEO = 1050;
	const APP_STUDIO_NEW_PLAYER_PLAYLIST = 1051;
	const APP_STUDIO_NEW_PLAYER_MULTI_TAB_PLAYLIST = 1052;
	const APP_STUDIO_EDIT_PLAYER_SINGLE_VIDEO = 1053;
	const APP_STUDIO_EDIT_PLAYER_PLAYLIST = 1054;
	const APP_STUDIO_EDIT_PLAYER_MULTI_TAB_PLAYLIST = 1055;
	const APP_STUDIO_DUPLICATE_PLAYER = 1056;
	const CONTENT_CONTENT_GO_TO_PAGE = 1057;
	const CONTENT_DELETE_ITEM = 1058;
	const CONTENT_DELETE_MIX = 1059;
	const REPORTS_AND_ANALYTICS_BANDWIDTH_USAGE_TAB = 1070;
	const REPORTS_AND_ANALYTICS_CONTENT_REPORTS_TAB = 1071;
	const REPORTS_AND_ANALYTICS_USERS_AND_COMMUNITY_REPORTS_TAB = 1072;
	const REPORTS_AND_ANALYTICS_TOP_CONTRIBUTORS = 1073;
	const REPORTS_AND_ANALYTICS_MAP_OVERLAYS = 1074;
	const REPORTS_AND_ANALYTICS_TOP_SYNDICATIONS = 1075;
	const REPORTS_AND_ANALYTICS_TOP_CONTENT = 1076;
	const REPORTS_AND_ANALYTICS_CONTENT_DROPOFF = 1077;
	const REPORTS_AND_ANALYTICS_CONTENT_INTERACTIONS = 1078;
	const REPORTS_AND_ANALYTICS_CONTENT_CONTRIBUTIONS = 1079;
	const REPORTS_AND_ANALYTICS_VIDEO_DRILL_DOWN = 1080;
	const REPORTS_AND_ANALYTICS_CONTENT_DRILL_DOWN_INTERACTION = 1081;
	const REPORTS_AND_ANALYTICS_CONTENT_CONTRIBUTIONS_DRILLDOWN = 1082;
	const REPORTS_AND_ANALYTICS_VIDEO_DRILL_DOWN_DROPOFF = 1083;
	const REPORTS_AND_ANALYTICS_MAP_OVERLAYS_DRILLDOWN = 1084;
	const REPORTS_AND_ANALYTICS_TOP_SYNDICATIONS_DRILL_DOWN = 1085;
	const REPORTS_AND_ANALYTICS_BANDWIDTH_USAGE_VIEW_MONTHLY = 1086;
	const REPORTS_AND_ANALYTICS_BANDWIDTH_USAGE_VIEW_YEARLY = 1087;
	const CONTENT_ENTRY_DRILLDOWN = 1088;
	const CONTENT_OPEN_PREVIEW_AND_EMBED = 1089;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStorageProfileDeliveryStatus
{
	const ACTIVE = 1;
	const BLOCKED = 2;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStorageProfileReadyBehavior
{
	const NO_IMPACT = 0;
	const REQUIRED = 1;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStorageProfileStatus
{
	const DISABLED = 1;
	const AUTOMATIC = 2;
	const MANUAL = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStorageServePriority
{
	const VIDIUN_ONLY = 1;
	const VIDIUN_FIRST = 2;
	const EXTERNAL_FIRST = 3;
	const EXTERNAL_ONLY = 4;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSyndicationFeedStatus
{
	const DELETED = -1;
	const ACTIVE = 1;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSyndicationFeedType
{
	const GOOGLE_VIDEO = 1;
	const YAHOO = 2;
	const ITUNES = 3;
	const TUBE_MOGUL = 4;
	const VIDIUN = 5;
	const VIDIUN_XSLT = 6;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunThumbAssetStatus
{
	const ERROR = -1;
	const QUEUED = 0;
	const CAPTURING = 1;
	const READY = 2;
	const DELETED = 3;
	const IMPORTING = 7;
	const EXPORTING = 9;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunThumbCropType
{
	const RESIZE = 1;
	const RESIZE_WITH_PADDING = 2;
	const CROP = 3;
	const CROP_FROM_TOP = 4;
	const RESIZE_WITH_FORCE = 5;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUiConfCreationMode
{
	const WIZARD = 2;
	const ADVANCED = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUiConfObjType
{
	const PLAYER = 1;
	const CONTRIBUTION_WIZARD = 2;
	const SIMPLE_EDITOR = 3;
	const ADVANCED_EDITOR = 4;
	const PLAYLIST = 5;
	const APP_STUDIO = 6;
	const VRECORD = 7;
	const PLAYER_V3 = 8;
	const VMC_ACCOUNT = 9;
	const VMC_ANALYTICS = 10;
	const VMC_CONTENT = 11;
	const VMC_DASHBOARD = 12;
	const VMC_LOGIN = 13;
	const PLAYER_SL = 14;
	const CLIENTSIDE_ENCODER = 15;
	const VMC_GENERAL = 16;
	const VMC_ROLES_AND_PERMISSIONS = 17;
	const CLIPPER = 18;
	const VSR = 19;
	const VUPLOAD = 20;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUpdateMethodType
{
	const MANUAL = 0;
	const AUTOMATIC = 1;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUploadErrorCode
{
	const NO_ERROR = 0;
	const GENERAL_ERROR = 1;
	const PARTIAL_UPLOAD = 2;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUploadTokenStatus
{
	const PENDING = 0;
	const PARTIAL_UPLOAD = 1;
	const FULL_UPLOAD = 2;
	const CLOSED = 3;
	const TIMED_OUT = 4;
	const DELETED = 5;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUserAgentRestrictionType
{
	const RESTRICT_LIST = 0;
	const ALLOW_LIST = 1;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUserJoinPolicyType
{
	const AUTO_JOIN = 1;
	const REQUEST_TO_JOIN = 2;
	const NOT_ALLOWED = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUserRoleStatus
{
	const ACTIVE = 1;
	const BLOCKED = 2;
	const DELETED = 3;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUserStatus
{
	const BLOCKED = 0;
	const ACTIVE = 1;
	const DELETED = 2;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidgetSecurityType
{
	const NONE = 1;
	const TIMEHASH = 2;
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAccessControlOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const CREATED_AT_DESC = "-createdAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAccessControlProfileOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAdminUserOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const ID_ASC = "+id";
	const CREATED_AT_DESC = "-createdAt";
	const ID_DESC = "-id";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAkamaiUniversalStreamType
{
	const HD_IPHONE_IPAD_LIVE = "HD iPhone/iPad Live";
	const UNIVERSAL_STREAMING_LIVE = "Universal Streaming Live";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAmazonS3StorageProfileFilesPermissionLevel
{
	const ACL_AUTHENTICATED_READ = "authenticated-read";
	const ACL_PRIVATE = "private";
	const ACL_PUBLIC_READ = "public-read";
	const ACL_PUBLIC_READ_WRITE = "public-read-write";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAmazonS3StorageProfileOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunApiActionPermissionItemOrderBy
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
class VidiunApiParameterPermissionItemAction
{
	const USAGE = "all";
	const INSERT = "insert";
	const READ = "read";
	const UPDATE = "update";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunApiParameterPermissionItemOrderBy
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
class VidiunAssetOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const DELETED_AT_ASC = "+deletedAt";
	const SIZE_ASC = "+size";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const DELETED_AT_DESC = "-deletedAt";
	const SIZE_DESC = "-size";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAssetParamsOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAssetType
{
	const ATTACHMENT = "attachment.Attachment";
	const CAPTION = "caption.Caption";
	const DOCUMENT = "document.Document";
	const IMAGE = "document.Image";
	const PDF = "document.PDF";
	const SWF = "document.SWF";
	const FLAVOR = "1";
	const THUMBNAIL = "2";
	const LIVE = "3";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunAudioCodec
{
	const NONE = "";
	const AAC = "aac";
	const AACHE = "aache";
	const AC3 = "ac3";
	const AMRNB = "amrnb";
	const COPY = "copy";
	const MP3 = "mp3";
	const MPEG2 = "mpeg2";
	const PCM = "pcm";
	const VORBIS = "vorbis";
	const WMA = "wma";
	const WMAPRO = "wmapro";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBaseEntryOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const END_DATE_ASC = "+endDate";
	const MODERATION_COUNT_ASC = "+moderationCount";
	const NAME_ASC = "+name";
	const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
	const RANK_ASC = "+rank";
	const RECENT_ASC = "+recent";
	const START_DATE_ASC = "+startDate";
	const TOTAL_RANK_ASC = "+totalRank";
	const UPDATED_AT_ASC = "+updatedAt";
	const WEIGHT_ASC = "+weight";
	const CREATED_AT_DESC = "-createdAt";
	const END_DATE_DESC = "-endDate";
	const MODERATION_COUNT_DESC = "-moderationCount";
	const NAME_DESC = "-name";
	const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
	const RANK_DESC = "-rank";
	const RECENT_DESC = "-recent";
	const START_DATE_DESC = "-startDate";
	const TOTAL_RANK_DESC = "-totalRank";
	const UPDATED_AT_DESC = "-updatedAt";
	const WEIGHT_DESC = "-weight";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBaseSyndicationFeedOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const NAME_ASC = "+name";
	const PLAYLIST_ID_ASC = "+playlistId";
	const TYPE_ASC = "+type";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const NAME_DESC = "-name";
	const PLAYLIST_ID_DESC = "-playlistId";
	const TYPE_DESC = "-type";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBatchJobOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const ESTIMATED_EFFORT_ASC = "+estimatedEffort";
	const EXECUTION_ATTEMPTS_ASC = "+executionAttempts";
	const FINISH_TIME_ASC = "+finishTime";
	const LOCK_VERSION_ASC = "+lockVersion";
	const PRIORITY_ASC = "+priority";
	const QUEUE_TIME_ASC = "+queueTime";
	const STATUS_ASC = "+status";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const ESTIMATED_EFFORT_DESC = "-estimatedEffort";
	const EXECUTION_ATTEMPTS_DESC = "-executionAttempts";
	const FINISH_TIME_DESC = "-finishTime";
	const LOCK_VERSION_DESC = "-lockVersion";
	const PRIORITY_DESC = "-priority";
	const QUEUE_TIME_DESC = "-queueTime";
	const STATUS_DESC = "-status";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBatchJobType
{
	const PARSE_CAPTION_ASSET = "captionSearch.parseCaptionAsset";
	const DISTRIBUTION_DELETE = "contentDistribution.DistributionDelete";
	const DISTRIBUTION_DISABLE = "contentDistribution.DistributionDisable";
	const DISTRIBUTION_ENABLE = "contentDistribution.DistributionEnable";
	const DISTRIBUTION_FETCH_REPORT = "contentDistribution.DistributionFetchReport";
	const DISTRIBUTION_SUBMIT = "contentDistribution.DistributionSubmit";
	const DISTRIBUTION_SYNC = "contentDistribution.DistributionSync";
	const DISTRIBUTION_UPDATE = "contentDistribution.DistributionUpdate";
	const CONVERT = "0";
	const DROP_FOLDER_CONTENT_PROCESSOR = "dropFolder.DropFolderContentProcessor";
	const DROP_FOLDER_WATCHER = "dropFolder.DropFolderWatcher";
	const EVENT_NOTIFICATION_HANDLER = "eventNotification.EventNotificationHandler";
	const INDEX_TAGS = "tagSearch.IndexTagsByPrivacyContext";
	const TAG_RESOLVE = "tagSearch.TagResolve";
	const VIRUS_SCAN = "virusScan.VirusScan";
	const IMPORT = "1";
	const DELETE = "2";
	const FLATTEN = "3";
	const BULKUPLOAD = "4";
	const DVDCREATOR = "5";
	const DOWNLOAD = "6";
	const OOCONVERT = "7";
	const CONVERT_PROFILE = "10";
	const POSTCONVERT = "11";
	const EXTRACT_MEDIA = "14";
	const MAIL = "15";
	const NOTIFICATION = "16";
	const CLEANUP = "17";
	const SCHEDULER_HELPER = "18";
	const BULKDOWNLOAD = "19";
	const DB_CLEANUP = "20";
	const PROVISION_PROVIDE = "21";
	const CONVERT_COLLECTION = "22";
	const STORAGE_EXPORT = "23";
	const PROVISION_DELETE = "24";
	const STORAGE_DELETE = "25";
	const EMAIL_INGESTION = "26";
	const METADATA_IMPORT = "27";
	const METADATA_TRANSFORM = "28";
	const FILESYNC_IMPORT = "29";
	const CAPTURE_THUMB = "30";
	const DELETE_FILE = "31";
	const INDEX = "32";
	const MOVE_CATEGORY_ENTRIES = "33";
	const COPY = "34";
	const CONCAT = "35";
	const CONVERT_LIVE_SEGMENT = "36";
	const COPY_PARTNER = "37";
	const VALIDATE_LIVE_MEDIA_SERVERS = "38";
	const SYNC_CATEGORY_PRIVACY_CONTEXT = "39";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadAction
{
	const ADD = "1";
	const UPDATE = "2";
	const DELETE = "3";
	const REPLACE = "4";
	const TRANSFORM_XSLT = "5";
	const ADD_OR_UPDATE = "6";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadObjectType
{
	const ENTRY = "1";
	const CATEGORY = "2";
	const USER = "3";
	const CATEGORY_USER = "4";
	const CATEGORY_ENTRY = "5";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadResultObjectType
{
	const ENTRY = "1";
	const CATEGORY = "2";
	const USER = "3";
	const CATEGORY_USER = "4";
	const CATEGORY_ENTRY = "5";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadResultStatus
{
	const ERROR = "1";
	const OK = "2";
	const IN_PROGRESS = "3";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunBulkUploadType
{
	const CSV = "bulkUploadCsv.CSV";
	const FILTER = "bulkUploadFilter.FILTER";
	const XML = "bulkUploadXml.XML";
	const DROP_FOLDER_XML = "dropFolderXmlBulkUpload.DROP_FOLDER_XML";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryEntryAdvancedOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const CREATED_AT_DESC = "-createdAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryEntryOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const CREATED_AT_DESC = "-createdAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryIdentifierField
{
	const FULL_NAME = "fullName";
	const ID = "id";
	const REFERENCE_ID = "referenceId";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const DEPTH_ASC = "+depth";
	const DIRECT_ENTRIES_COUNT_ASC = "+directEntriesCount";
	const DIRECT_SUB_CATEGORIES_COUNT_ASC = "+directSubCategoriesCount";
	const ENTRIES_COUNT_ASC = "+entriesCount";
	const FULL_NAME_ASC = "+fullName";
	const MEMBERS_COUNT_ASC = "+membersCount";
	const NAME_ASC = "+name";
	const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const DEPTH_DESC = "-depth";
	const DIRECT_ENTRIES_COUNT_DESC = "-directEntriesCount";
	const DIRECT_SUB_CATEGORIES_COUNT_DESC = "-directSubCategoriesCount";
	const ENTRIES_COUNT_DESC = "-entriesCount";
	const FULL_NAME_DESC = "-fullName";
	const MEMBERS_COUNT_DESC = "-membersCount";
	const NAME_DESC = "-name";
	const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunCategoryUserOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConditionType
{
	const EVENT_NOTIFICATION_FIELD = "eventNotification.BooleanField";
	const EVENT_NOTIFICATION_OBJECT_CHANGED = "eventNotification.ObjectChanged";
	const METADATA_FIELD_CHANGED = "metadata.FieldChanged";
	const METADATA_FIELD_COMPARE = "metadata.FieldCompare";
	const METADATA_FIELD_MATCH = "metadata.FieldMatch";
	const AUTHENTICATED = "1";
	const COUNTRY = "2";
	const IP_ADDRESS = "3";
	const SITE = "4";
	const USER_AGENT = "5";
	const FIELD_MATCH = "6";
	const FIELD_COMPARE = "7";
	const ASSET_PROPERTIES_COMPARE = "8";
	const USER_ROLE = "9";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunContainerFormat
{
	const _3GP = "3gp";
	const APPLEHTTP = "applehttp";
	const AVI = "avi";
	const BMP = "bmp";
	const COPY = "copy";
	const FLV = "flv";
	const HLS = "hls";
	const ISMV = "ismv";
	const JPG = "jpg";
	const MKV = "mkv";
	const MOV = "mov";
	const MP3 = "mp3";
	const MP4 = "mp4";
	const MPEG = "mpeg";
	const MPEGTS = "mpegts";
	const OGG = "ogg";
	const OGV = "ogv";
	const PDF = "pdf";
	const PNG = "png";
	const SWF = "swf";
	const WAV = "wav";
	const WEBM = "webm";
	const WMA = "wma";
	const WMV = "wmv";
	const WVM = "wvm";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunContextType
{
	const PLAY = "1";
	const DOWNLOAD = "2";
	const THUMBNAIL = "3";
	const METADATA = "4";
	const EXPORT = "5";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunControlPanelCommandOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConversionProfileAssetParamsOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConversionProfileOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const CREATED_AT_DESC = "-createdAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConversionProfileStatus
{
	const DISABLED = "1";
	const ENABLED = "2";
	const DELETED = "3";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunConversionProfileType
{
	const MEDIA = "1";
	const LIVE_STREAM = "2";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDataEntryOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const END_DATE_ASC = "+endDate";
	const MODERATION_COUNT_ASC = "+moderationCount";
	const NAME_ASC = "+name";
	const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
	const RANK_ASC = "+rank";
	const RECENT_ASC = "+recent";
	const START_DATE_ASC = "+startDate";
	const TOTAL_RANK_ASC = "+totalRank";
	const UPDATED_AT_ASC = "+updatedAt";
	const WEIGHT_ASC = "+weight";
	const CREATED_AT_DESC = "-createdAt";
	const END_DATE_DESC = "-endDate";
	const MODERATION_COUNT_DESC = "-moderationCount";
	const NAME_DESC = "-name";
	const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
	const RANK_DESC = "-rank";
	const RECENT_DESC = "-recent";
	const START_DATE_DESC = "-startDate";
	const TOTAL_RANK_DESC = "-totalRank";
	const UPDATED_AT_DESC = "-updatedAt";
	const WEIGHT_DESC = "-weight";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDurationType
{
	const LONG = "long";
	const MEDIUM = "medium";
	const NOT_AVAILABLE = "notavailable";
	const SHORT = "short";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunDynamicEnum
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEntryIdentifierField
{
	const ID = "id";
	const REFERENCE_ID = "referenceId";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEntryReplacementStatus
{
	const NONE = "0";
	const APPROVED_BUT_NOT_READY = "1";
	const READY_BUT_NOT_APPROVED = "2";
	const NOT_READY_AND_NOT_APPROVED = "3";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEntryStatus
{
	const ERROR_IMPORTING = "-2";
	const ERROR_CONVERTING = "-1";
	const SCAN_FAILURE = "virusScan.ScanFailure";
	const IMPORT = "0";
	const INFECTED = "virusScan.Infected";
	const PRECONVERT = "1";
	const READY = "2";
	const DELETED = "3";
	const PENDING = "4";
	const MODERATE = "5";
	const BLOCKED = "6";
	const NO_CONTENT = "7";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunEntryType
{
	const AUTOMATIC = "-1";
	const EXTERNAL_MEDIA = "externalMedia.externalMedia";
	const MEDIA_CLIP = "1";
	const MIX = "2";
	const PLAYLIST = "5";
	const DATA = "6";
	const LIVE_STREAM = "7";
	const LIVE_CHANNEL = "8";
	const DOCUMENT = "10";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFileAssetObjectType
{
	const UI_CONF = "2";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFileAssetStatus
{
	const PENDING = "0";
	const UPLOADING = "1";
	const READY = "2";
	const DELETED = "3";
	const ERROR = "4";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFileSyncObjectType
{
	const DISTRIBUTION_PROFILE = "contentDistribution.DistributionProfile";
	const ENTRY_DISTRIBUTION = "contentDistribution.EntryDistribution";
	const GENERIC_DISTRIBUTION_ACTION = "contentDistribution.GenericDistributionAction";
	const EMAIL_NOTIFICATION_TEMPLATE = "emailNotification.EmailNotificationTemplate";
	const HTTP_NOTIFICATION_TEMPLATE = "httpNotification.HttpNotificationTemplate";
	const ENTRY = "1";
	const UICONF = "2";
	const BATCHJOB = "3";
	const ASSET = "4";
	const FLAVOR_ASSET = "4";
	const METADATA = "5";
	const METADATA_PROFILE = "6";
	const SYNDICATION_FEED = "7";
	const CONVERSION_PROFILE = "8";
	const FILE_ASSET = "9";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFlavorAssetOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const DELETED_AT_ASC = "+deletedAt";
	const SIZE_ASC = "+size";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const DELETED_AT_DESC = "-deletedAt";
	const SIZE_DESC = "-size";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFlavorParamsOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunFlavorParamsOutputOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGenericSyndicationFeedOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const NAME_ASC = "+name";
	const PLAYLIST_ID_ASC = "+playlistId";
	const TYPE_ASC = "+type";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const NAME_DESC = "-name";
	const PLAYLIST_ID_DESC = "-playlistId";
	const TYPE_DESC = "-type";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGenericXsltSyndicationFeedOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const NAME_ASC = "+name";
	const PLAYLIST_ID_ASC = "+playlistId";
	const TYPE_ASC = "+type";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const NAME_DESC = "-name";
	const PLAYLIST_ID_DESC = "-playlistId";
	const TYPE_DESC = "-type";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGeoCoderType
{
	const VIDIUN = "1";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGoogleSyndicationFeedAdultValues
{
	const NO = "No";
	const YES = "Yes";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunGoogleVideoSyndicationFeedOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const NAME_ASC = "+name";
	const PLAYLIST_ID_ASC = "+playlistId";
	const TYPE_ASC = "+type";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const NAME_DESC = "-name";
	const PLAYLIST_ID_DESC = "-playlistId";
	const TYPE_DESC = "-type";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunITunesSyndicationFeedAdultValues
{
	const CLEAN = "clean";
	const NO = "no";
	const YES = "yes";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunITunesSyndicationFeedCategories
{
	const ARTS = "Arts";
	const ARTS_DESIGN = "Arts/Design";
	const ARTS_FASHION_BEAUTY = "Arts/Fashion &amp; Beauty";
	const ARTS_FOOD = "Arts/Food";
	const ARTS_LITERATURE = "Arts/Literature";
	const ARTS_PERFORMING_ARTS = "Arts/Performing Arts";
	const ARTS_VISUAL_ARTS = "Arts/Visual Arts";
	const BUSINESS = "Business";
	const BUSINESS_BUSINESS_NEWS = "Business/Business News";
	const BUSINESS_CAREERS = "Business/Careers";
	const BUSINESS_INVESTING = "Business/Investing";
	const BUSINESS_MANAGEMENT_MARKETING = "Business/Management &amp; Marketing";
	const BUSINESS_SHOPPING = "Business/Shopping";
	const COMEDY = "Comedy";
	const EDUCATION = "Education";
	const EDUCATION_TECHNOLOGY = "Education/Education Technology";
	const EDUCATION_HIGHER_EDUCATION = "Education/Higher Education";
	const EDUCATION_K_12 = "Education/K-12";
	const EDUCATION_LANGUAGE_COURSES = "Education/Language Courses";
	const EDUCATION_TRAINING = "Education/Training";
	const GAMES_HOBBIES = "Games &amp; Hobbies";
	const GAMES_HOBBIES_AUTOMOTIVE = "Games &amp; Hobbies/Automotive";
	const GAMES_HOBBIES_AVIATION = "Games &amp; Hobbies/Aviation";
	const GAMES_HOBBIES_HOBBIES = "Games &amp; Hobbies/Hobbies";
	const GAMES_HOBBIES_OTHER_GAMES = "Games &amp; Hobbies/Other Games";
	const GAMES_HOBBIES_VIDEO_GAMES = "Games &amp; Hobbies/Video Games";
	const GOVERNMENT_ORGANIZATIONS = "Government &amp; Organizations";
	const GOVERNMENT_ORGANIZATIONS_LOCAL = "Government &amp; Organizations/Local";
	const GOVERNMENT_ORGANIZATIONS_NATIONAL = "Government &amp; Organizations/National";
	const GOVERNMENT_ORGANIZATIONS_NON_PROFIT = "Government &amp; Organizations/Non-Profit";
	const GOVERNMENT_ORGANIZATIONS_REGIONAL = "Government &amp; Organizations/Regional";
	const HEALTH = "Health";
	const HEALTH_ALTERNATIVE_HEALTH = "Health/Alternative Health";
	const HEALTH_FITNESS_NUTRITION = "Health/Fitness &amp; Nutrition";
	const HEALTH_SELF_HELP = "Health/Self-Help";
	const HEALTH_SEXUALITY = "Health/Sexuality";
	const KIDS_FAMILY = "Kids &amp; Family";
	const MUSIC = "Music";
	const NEWS_POLITICS = "News &amp; Politics";
	const RELIGION_SPIRITUALITY = "Religion &amp; Spirituality";
	const RELIGION_SPIRITUALITY_BUDDHISM = "Religion &amp; Spirituality/Buddhism";
	const RELIGION_SPIRITUALITY_CHRISTIANITY = "Religion &amp; Spirituality/Christianity";
	const RELIGION_SPIRITUALITY_HINDUISM = "Religion &amp; Spirituality/Hinduism";
	const RELIGION_SPIRITUALITY_ISLAM = "Religion &amp; Spirituality/Islam";
	const RELIGION_SPIRITUALITY_JUDAISM = "Religion &amp; Spirituality/Judaism";
	const RELIGION_SPIRITUALITY_OTHER = "Religion &amp; Spirituality/Other";
	const RELIGION_SPIRITUALITY_SPIRITUALITY = "Religion &amp; Spirituality/Spirituality";
	const SCIENCE_MEDICINE = "Science &amp; Medicine";
	const SCIENCE_MEDICINE_MEDICINE = "Science &amp; Medicine/Medicine";
	const SCIENCE_MEDICINE_NATURAL_SCIENCES = "Science &amp; Medicine/Natural Sciences";
	const SCIENCE_MEDICINE_SOCIAL_SCIENCES = "Science &amp; Medicine/Social Sciences";
	const SOCIETY_CULTURE = "Society &amp; Culture";
	const SOCIETY_CULTURE_HISTORY = "Society &amp; Culture/History";
	const SOCIETY_CULTURE_PERSONAL_JOURNALS = "Society &amp; Culture/Personal Journals";
	const SOCIETY_CULTURE_PHILOSOPHY = "Society &amp; Culture/Philosophy";
	const SOCIETY_CULTURE_PLACES_TRAVEL = "Society &amp; Culture/Places &amp; Travel";
	const SPORTS_RECREATION = "Sports &amp; Recreation";
	const SPORTS_RECREATION_AMATEUR = "Sports &amp; Recreation/Amateur";
	const SPORTS_RECREATION_COLLEGE_HIGH_SCHOOL = "Sports &amp; Recreation/College &amp; High School";
	const SPORTS_RECREATION_OUTDOOR = "Sports &amp; Recreation/Outdoor";
	const SPORTS_RECREATION_PROFESSIONAL = "Sports &amp; Recreation/Professional";
	const TV_FILM = "TV &amp; Film";
	const TECHNOLOGY = "Technology";
	const TECHNOLOGY_GADGETS = "Technology/Gadgets";
	const TECHNOLOGY_PODCASTING = "Technology/Podcasting";
	const TECHNOLOGY_SOFTWARE_HOW_TO = "Technology/Software How-To";
	const TECHNOLOGY_TECH_NEWS = "Technology/Tech News";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunITunesSyndicationFeedOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const NAME_ASC = "+name";
	const PLAYLIST_ID_ASC = "+playlistId";
	const TYPE_ASC = "+type";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const NAME_DESC = "-name";
	const PLAYLIST_ID_DESC = "-playlistId";
	const TYPE_DESC = "-type";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLanguage
{
	const AB = "Abkhazian";
	const AA = "Afar";
	const AF = "Afrikaans";
	const SQ = "Albanian";
	const AM = "Amharic";
	const AR = "Arabic";
	const HY = "Armenian";
	const AS_ = "Assamese";
	const AY = "Aymara";
	const AZ = "Azerbaijani";
	const BA = "Bashkir";
	const EU = "Basque";
	const BN = "Bengali (Bangla)";
	const DZ = "Bhutani";
	const BH = "Bihari";
	const BI = "Bislama";
	const BR = "Breton";
	const BG = "Bulgarian";
	const MY = "Burmese";
	const BE = "Byelorussian (Belarusian)";
	const KM = "Cambodian";
	const CA = "Catalan";
	const ZH = "Chinese";
	const CO = "Corsican";
	const HR = "Croatian";
	const CS = "Czech";
	const DA = "Danish";
	const NL = "Dutch";
	const EN = "English";
	const EO = "Esperanto";
	const ET = "Estonian";
	const FO = "Faeroese";
	const FA = "Farsi";
	const FJ = "Fiji";
	const FI = "Finnish";
	const FR = "French";
	const FY = "Frisian";
	const GV = "Gaelic (Manx)";
	const GD = "Gaelic (Scottish)";
	const GL = "Galician";
	const KA = "Georgian";
	const DE = "German";
	const EL = "Greek";
	const KL = "Greenlandic";
	const GN = "Guarani";
	const GU = "Gujarati";
	const HA = "Hausa";
	const IW = "Hebrew";
	const HE = "Hebrew";
	const HI = "Hindi";
	const HU = "Hungarian";
	const IS = "Icelandic";
	const IN = "Indonesian";
	const ID = "Indonesian";
	const IA = "Interlingua";
	const IE = "Interlingue";
	const IU = "Inuktitut";
	const IK = "Inupiak";
	const GA = "Irish";
	const IT = "Italian";
	const JA = "Japanese";
	const JV = "Javanese";
	const KN = "Kannada";
	const KS = "Kashmiri";
	const KK = "Kazakh";
	const RW = "Kinyarwanda (Ruanda)";
	const KY = "Kirghiz";
	const RN = "Kirundi (Rundi)";
	const KO = "Korean";
	const KU = "Kurdish";
	const LO = "Laothian";
	const LA = "Latin";
	const LV = "Latvian (Lettish)";
	const LI = "Limburgish ( Limburger)";
	const LN = "Lingala";
	const LT = "Lithuanian";
	const MK = "Macedonian";
	const MG = "Malagasy";
	const MS = "Malay";
	const ML = "Malayalam";
	const MT = "Maltese";
	const MI = "Maori";
	const MR = "Marathi";
	const MO = "Moldavian";
	const MN = "Mongolian";
	const NA = "Nauru";
	const NE = "Nepali";
	const NO = "Norwegian";
	const OC = "Occitan";
	const OR_ = "Oriya";
	const OM = "Oromo (Afan, Galla)";
	const PS = "Pashto (Pushto)";
	const PL = "Polish";
	const PT = "Portuguese";
	const PA = "Punjabi";
	const QU = "Quechua";
	const RM = "Rhaeto-Romance";
	const RO = "Romanian";
	const RU = "Russian";
	const SM = "Samoan";
	const SG = "Sangro";
	const SA = "Sanskrit";
	const SR = "Serbian";
	const SH = "Serbo-Croatian";
	const ST = "Sesotho";
	const TN = "Setswana";
	const SN = "Shona";
	const SD = "Sindhi";
	const SI = "Sinhalese";
	const SS = "Siswati";
	const SK = "Slovak";
	const SL = "Slovenian";
	const SO = "Somali";
	const ES = "Spanish";
	const SU = "Sundanese";
	const SW = "Swahili (Kiswahili)";
	const SV = "Swedish";
	const TL = "Tagalog";
	const TG = "Tajik";
	const TA = "Tamil";
	const TT = "Tatar";
	const TE = "Telugu";
	const TH = "Thai";
	const BO = "Tibetan";
	const TI = "Tigrinya";
	const TO = "Tonga";
	const TS = "Tsonga";
	const TR = "Turkish";
	const TK = "Turkmen";
	const TW = "Twi";
	const UG = "Uighur";
	const UK = "Ukrainian";
	const UR = "Urdu";
	const UZ = "Uzbek";
	const VI = "Vietnamese";
	const VO = "Volapuk";
	const CY = "Welsh";
	const WO = "Wolof";
	const XH = "Xhosa";
	const YI = "Yiddish";
	const JI = "Yiddish";
	const YO = "Yoruba";
	const ZU = "Zulu";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLanguageCode
{
	const AA = "aa";
	const AB = "ab";
	const AF = "af";
	const AM = "am";
	const AR = "ar";
	const AS_ = "as";
	const AY = "ay";
	const AZ = "az";
	const BA = "ba";
	const BE = "be";
	const BG = "bg";
	const BH = "bh";
	const BI = "bi";
	const BN = "bn";
	const BO = "bo";
	const BR = "br";
	const CA = "ca";
	const CO = "co";
	const CS = "cs";
	const CY = "cy";
	const DA = "da";
	const DE = "de";
	const DZ = "dz";
	const EL = "el";
	const EN = "en";
	const EO = "eo";
	const ES = "es";
	const ET = "et";
	const EU = "eu";
	const FA = "fa";
	const FI = "fi";
	const FJ = "fj";
	const FO = "fo";
	const FR = "fr";
	const FY = "fy";
	const GA = "ga";
	const GD = "gd";
	const GL = "gl";
	const GN = "gn";
	const GU = "gu";
	const GV = "gv";
	const HA = "ha";
	const HE = "he";
	const HI = "hi";
	const HR = "hr";
	const HU = "hu";
	const HY = "hy";
	const IA = "ia";
	const ID = "id";
	const IE = "ie";
	const IK = "ik";
	const IN = "in";
	const IS = "is";
	const IT = "it";
	const IU = "iu";
	const IW = "iw";
	const JA = "ja";
	const JI = "ji";
	const JV = "jv";
	const KA = "ka";
	const KK = "kk";
	const KL = "kl";
	const KM = "km";
	const KN = "kn";
	const KO = "ko";
	const KS = "ks";
	const KU = "ku";
	const KY = "ky";
	const LA = "la";
	const LI = "li";
	const LN = "ln";
	const LO = "lo";
	const LT = "lt";
	const LV = "lv";
	const MG = "mg";
	const MI = "mi";
	const MK = "mk";
	const ML = "ml";
	const MN = "mn";
	const MO = "mo";
	const MR = "mr";
	const MS = "ms";
	const MT = "mt";
	const MY = "my";
	const NA = "na";
	const NE = "ne";
	const NL = "nl";
	const NO = "no";
	const OC = "oc";
	const OM = "om";
	const OR_ = "or";
	const PA = "pa";
	const PL = "pl";
	const PS = "ps";
	const PT = "pt";
	const QU = "qu";
	const RM = "rm";
	const RN = "rn";
	const RO = "ro";
	const RU = "ru";
	const RW = "rw";
	const SA = "sa";
	const SD = "sd";
	const SG = "sg";
	const SH = "sh";
	const SI = "si";
	const SK = "sk";
	const SL = "sl";
	const SM = "sm";
	const SN = "sn";
	const SO = "so";
	const SQ = "sq";
	const SR = "sr";
	const SS = "ss";
	const ST = "st";
	const SU = "su";
	const SV = "sv";
	const SW = "sw";
	const TA = "ta";
	const TE = "te";
	const TG = "tg";
	const TH = "th";
	const TI = "ti";
	const TK = "tk";
	const TL = "tl";
	const TN = "tn";
	const TO = "to";
	const TR = "tr";
	const TS = "ts";
	const TT = "tt";
	const TW = "tw";
	const UG = "ug";
	const UK = "uk";
	const UR = "ur";
	const UZ = "uz";
	const VI = "vi";
	const VO = "vo";
	const WO = "wo";
	const XH = "xh";
	const YI = "yi";
	const YO = "yo";
	const ZH = "zh";
	const ZU = "zu";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveAssetOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const DELETED_AT_ASC = "+deletedAt";
	const SIZE_ASC = "+size";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const DELETED_AT_DESC = "-deletedAt";
	const SIZE_DESC = "-size";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveChannelOrderBy
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
class VidiunLiveChannelSegmentOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const START_TIME_ASC = "+startTime";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const START_TIME_DESC = "-startTime";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveChannelSegmentStatus
{
	const ACTIVE = "2";
	const DELETED = "3";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveChannelSegmentTriggerType
{
	const CHANNEL_RELATIVE = "1";
	const ABSOLUTE_TIME = "2";
	const SEGMENT_START_RELATIVE = "3";
	const SEGMENT_END_RELATIVE = "4";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveChannelSegmentType
{
	const VIDEO_AND_AUDIO = "1";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveEntryOrderBy
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
class VidiunLiveParamsOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunLiveStreamAdminEntryOrderBy
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
class VidiunLiveStreamEntryOrderBy
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
class VidiunMailType
{
	const MAIL_TYPE_VIDIUN_NEWSLETTER = "10";
	const MAIL_TYPE_ADDED_TO_FAVORITES = "11";
	const MAIL_TYPE_ADDED_TO_CLIP_FAVORITES = "12";
	const MAIL_TYPE_NEW_COMMENT_IN_PROFILE = "13";
	const MAIL_TYPE_CLIP_ADDED_YOUR_VIDIUN = "20";
	const MAIL_TYPE_VIDEO_ADDED = "21";
	const MAIL_TYPE_ROUGHCUT_CREATED = "22";
	const MAIL_TYPE_ADDED_VIDIUN_TO_YOUR_FAVORITES = "23";
	const MAIL_TYPE_NEW_COMMENT_IN_VIDIUN = "24";
	const MAIL_TYPE_CLIP_ADDED = "30";
	const MAIL_TYPE_VIDEO_CREATED = "31";
	const MAIL_TYPE_ADDED_VIDIUN_TO_HIS_FAVORITES = "32";
	const MAIL_TYPE_NEW_COMMENT_IN_VIDIUN_YOU_CONTRIBUTED = "33";
	const MAIL_TYPE_CLIP_CONTRIBUTED = "40";
	const MAIL_TYPE_ROUGHCUT_CREATED_SUBSCRIBED = "41";
	const MAIL_TYPE_ADDED_VIDIUN_TO_HIS_FAVORITES_SUBSCRIBED = "42";
	const MAIL_TYPE_NEW_COMMENT_IN_VIDIUN_YOU_SUBSCRIBED = "43";
	const MAIL_TYPE_REGISTER_CONFIRM = "50";
	const MAIL_TYPE_PASSWORD_RESET = "51";
	const MAIL_TYPE_LOGIN_MAIL_RESET = "52";
	const MAIL_TYPE_REGISTER_CONFIRM_VIDEO_SERVICE = "54";
	const MAIL_TYPE_VIDEO_READY = "60";
	const MAIL_TYPE_VIDEO_IS_READY = "62";
	const MAIL_TYPE_BULK_DOWNLOAD_READY = "63";
	const MAIL_TYPE_BULKUPLOAD_FINISHED = "64";
	const MAIL_TYPE_BULKUPLOAD_FAILED = "65";
	const MAIL_TYPE_BULKUPLOAD_ABORTED = "66";
	const MAIL_TYPE_NOTIFY_ERR = "70";
	const MAIL_TYPE_ACCOUNT_UPGRADE_CONFIRM = "80";
	const MAIL_TYPE_VIDEO_SERVICE_NOTICE = "81";
	const MAIL_TYPE_VIDEO_SERVICE_NOTICE_LIMIT_REACHED = "82";
	const MAIL_TYPE_VIDEO_SERVICE_NOTICE_ACCOUNT_LOCKED = "83";
	const MAIL_TYPE_VIDEO_SERVICE_NOTICE_ACCOUNT_DELETED = "84";
	const MAIL_TYPE_VIDEO_SERVICE_NOTICE_UPGRADE_OFFER = "85";
	const MAIL_TYPE_ACCOUNT_REACTIVE_CONFIRM = "86";
	const MAIL_TYPE_SYSTEM_USER_RESET_PASSWORD = "110";
	const MAIL_TYPE_SYSTEM_USER_RESET_PASSWORD_SUCCESS = "111";
	const MAIL_TYPE_SYSTEM_USER_NEW_PASSWORD = "112";
	const MAIL_TYPE_SYSTEM_USER_CREDENTIALS_SAVED = "113";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaEntryOrderBy
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
class VidiunMediaFlavorParamsOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaFlavorParamsOutputOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaInfoOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaParserType
{
	const MEDIAINFO = "0";
	const FFMPEG = "1";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMediaServerOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunMixEntryOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const DURATION_ASC = "+duration";
	const END_DATE_ASC = "+endDate";
	const LAST_PLAYED_AT_ASC = "+lastPlayedAt";
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
class VidiunModerationFlagStatus
{
	const PENDING = "1";
	const MODERATED = "2";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunModerationObjectType
{
	const ENTRY = "2";
	const USER = "3";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPartnerOrderBy
{
	const ADMIN_EMAIL_ASC = "+adminEmail";
	const ADMIN_NAME_ASC = "+adminName";
	const CREATED_AT_ASC = "+createdAt";
	const ID_ASC = "+id";
	const NAME_ASC = "+name";
	const STATUS_ASC = "+status";
	const WEBSITE_ASC = "+website";
	const ADMIN_EMAIL_DESC = "-adminEmail";
	const ADMIN_NAME_DESC = "-adminName";
	const CREATED_AT_DESC = "-createdAt";
	const ID_DESC = "-id";
	const NAME_DESC = "-name";
	const STATUS_DESC = "-status";
	const WEBSITE_DESC = "-website";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPermissionItemOrderBy
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
class VidiunPermissionItemType
{
	const API_ACTION_ITEM = "vApiActionPermissionItem";
	const API_PARAMETER_ITEM = "vApiParameterPermissionItem";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPermissionOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const ID_ASC = "+id";
	const NAME_ASC = "+name";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const ID_DESC = "-id";
	const NAME_DESC = "-name";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPlayableEntryOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const DURATION_ASC = "+duration";
	const END_DATE_ASC = "+endDate";
	const LAST_PLAYED_AT_ASC = "+lastPlayedAt";
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
class VidiunPlaybackProtocol
{
	const APPLE_HTTP = "applehttp";
	const AUTO = "auto";
	const AKAMAI_HD = "hdnetwork";
	const AKAMAI_HDS = "hdnetworkmanifest";
	const HDS = "hds";
	const HLS = "hls";
	const HTTP = "http";
	const MPEG_DASH = "mpegdash";
	const RTMP = "rtmp";
	const RTSP = "rtsp";
	const SILVER_LIGHT = "sl";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunPlaylistOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const END_DATE_ASC = "+endDate";
	const MODERATION_COUNT_ASC = "+moderationCount";
	const NAME_ASC = "+name";
	const PARTNER_SORT_VALUE_ASC = "+partnerSortValue";
	const RANK_ASC = "+rank";
	const RECENT_ASC = "+recent";
	const START_DATE_ASC = "+startDate";
	const TOTAL_RANK_ASC = "+totalRank";
	const UPDATED_AT_ASC = "+updatedAt";
	const WEIGHT_ASC = "+weight";
	const CREATED_AT_DESC = "-createdAt";
	const END_DATE_DESC = "-endDate";
	const MODERATION_COUNT_DESC = "-moderationCount";
	const NAME_DESC = "-name";
	const PARTNER_SORT_VALUE_DESC = "-partnerSortValue";
	const RANK_DESC = "-rank";
	const RECENT_DESC = "-recent";
	const START_DATE_DESC = "-startDate";
	const TOTAL_RANK_DESC = "-totalRank";
	const UPDATED_AT_DESC = "-updatedAt";
	const WEIGHT_DESC = "-weight";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunReportInterval
{
	const DAYS = "days";
	const MONTHS = "months";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunReportOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const CREATED_AT_DESC = "-createdAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunRuleActionType
{
	const BLOCK = "1";
	const PREVIEW = "2";
	const LIMIT_FLAVORS = "3";
	const ADD_TO_STORAGE = "4";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSchemaType
{
	const BULK_UPLOAD_RESULT_XML = "bulkUploadXml.bulkUploadResultXML";
	const BULK_UPLOAD_XML = "bulkUploadXml.bulkUploadXML";
	const INGEST_API = "cuePoint.ingestAPI";
	const SERVE_API = "cuePoint.serveAPI";
	const DROP_FOLDER_XML = "dropFolderXmlBulkUpload.dropFolderXml";
	const SYNDICATION = "syndication";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSearchConditionComparison
{
	const EQUAL = "1";
	const GREATER_THAN = "2";
	const GREATER_THAN_OR_EQUAL = "3";
	const LESS_THAN = "4";
	const LESS_THAN_OR_EQUAL = "5";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSourceType
{
	const VELOCIX_LIVE = "velocix.VELOCIX_LIVE";
	const FILE = "1";
	const WEBCAM = "2";
	const URL = "5";
	const SEARCH_PROVIDER = "6";
	const AKAMAI_LIVE = "29";
	const MANUAL_LIVE_STREAM = "30";
	const AKAMAI_UNIVERSAL_LIVE = "31";
	const LIVE_STREAM = "32";
	const LIVE_CHANNEL = "33";
	const RECORDED_LIVE = "34";
	const CLIP = "35";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStorageProfileOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunStorageProfileProtocol
{
	const KONTIKI = "kontiki.KONTIKI";
	const VIDIUN_DC = "0";
	const FTP = "1";
	const SCP = "2";
	const SFTP = "3";
	const S3 = "6";
	const LOCAL = "7";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunSyndicationFeedEntriesOrderBy
{
	const CREATED_AT_DESC = "-createdAt";
	const RECENT = "recent";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunTaggedObjectType
{
	const ENTRY = "1";
	const CATEGORY = "2";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunThumbAssetOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const DELETED_AT_ASC = "+deletedAt";
	const SIZE_ASC = "+size";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const DELETED_AT_DESC = "-deletedAt";
	const SIZE_DESC = "-size";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunThumbParamsOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunThumbParamsOutputOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunTubeMogulSyndicationFeedCategories
{
	const ANIMALS_AND_PETS = "Animals &amp; Pets";
	const ARTS_AND_ANIMATION = "Arts &amp; Animation";
	const AUTOS = "Autos";
	const COMEDY = "Comedy";
	const COMMERCIALS_PROMOTIONAL = "Commercials/Promotional";
	const ENTERTAINMENT = "Entertainment";
	const FAMILY_AND_KIDS = "Family &amp; Kids";
	const HOW_TO_INSTRUCTIONAL_DIY = "How To/Instructional/DIY";
	const MUSIC = "Music";
	const NEWS_AND_BLOGS = "News &amp; Blogs";
	const SCIENCE_AND_TECHNOLOGY = "Science &amp; Technology";
	const SPORTS = "Sports";
	const TRAVEL_AND_PLACES = "Travel &amp; Places";
	const VIDEO_GAMES = "Video Games";
	const VLOGS_PEOPLE = "Vlogs &amp; People";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunTubeMogulSyndicationFeedOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const NAME_ASC = "+name";
	const PLAYLIST_ID_ASC = "+playlistId";
	const TYPE_ASC = "+type";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const NAME_DESC = "-name";
	const PLAYLIST_ID_DESC = "-playlistId";
	const TYPE_DESC = "-type";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUiConfOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUploadTokenOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const CREATED_AT_DESC = "-createdAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUserLoginDataOrderBy
{
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUserOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const ID_ASC = "+id";
	const CREATED_AT_DESC = "-createdAt";
	const ID_DESC = "-id";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunUserRoleOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const ID_ASC = "+id";
	const NAME_ASC = "+name";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const ID_DESC = "-id";
	const NAME_DESC = "-name";
	const UPDATED_AT_DESC = "-updatedAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunVideoCodec
{
	const NONE = "";
	const APCH = "apch";
	const APCN = "apcn";
	const APCO = "apco";
	const APCS = "apcs";
	const COPY = "copy";
	const DNXHD = "dnxhd";
	const DV = "dv";
	const FLV = "flv";
	const H263 = "h263";
	const H264 = "h264";
	const H264B = "h264b";
	const H264H = "h264h";
	const H264M = "h264m";
	const MPEG2 = "mpeg2";
	const MPEG4 = "mpeg4";
	const THEORA = "theora";
	const VP6 = "vp6";
	const VP8 = "vp8";
	const VP9 = "vp9";
	const WMV2 = "wmv2";
	const WMV3 = "wmv3";
	const WVC1A = "wvc1a";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunWidgetOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const CREATED_AT_DESC = "-createdAt";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunYahooSyndicationFeedAdultValues
{
	const ADULT = "adult";
	const NON_ADULT = "nonadult";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunYahooSyndicationFeedCategories
{
	const ACTION = "Action";
	const ANIMALS = "Animals";
	const ART_AND_ANIMATION = "Art &amp; Animation";
	const COMMERCIALS = "Commercials";
	const ENTERTAINMENT_AND_TV = "Entertainment &amp; TV";
	const FAMILY = "Family";
	const FOOD = "Food";
	const FUNNY_VIDEOS = "Funny Videos";
	const GAMES = "Games";
	const HEALTH_AND_BEAUTY = "Health &amp; Beauty";
	const HOW_TO = "How-To";
	const MOVIES_AND_SHORTS = "Movies &amp; Shorts";
	const MUSIC = "Music";
	const NEWS_AND_POLITICS = "News &amp; Politics";
	const PEOPLE_AND_VLOGS = "People &amp; Vlogs";
	const PRODUCTS_AND_TECH = "Products &amp; Tech.";
	const SCIENCE_AND_ENVIRONMENT = "Science &amp; Environment";
	const SPORTS = "Sports";
	const TRANSPORTATION = "Transportation";
	const TRAVEL = "Travel";
}

/**
 * @package Vidiun
 * @subpackage Client
 */
class VidiunYahooSyndicationFeedOrderBy
{
	const CREATED_AT_ASC = "+createdAt";
	const NAME_ASC = "+name";
	const PLAYLIST_ID_ASC = "+playlistId";
	const TYPE_ASC = "+type";
	const UPDATED_AT_ASC = "+updatedAt";
	const CREATED_AT_DESC = "-createdAt";
	const NAME_DESC = "-name";
	const PLAYLIST_ID_DESC = "-playlistId";
	const TYPE_DESC = "-type";
	const UPDATED_AT_DESC = "-updatedAt";
}

