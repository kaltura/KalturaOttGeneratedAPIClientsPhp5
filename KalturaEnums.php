<?php
// ===================================================================================================
//                           _  __     _ _
//                          | |/ /__ _| | |_ _  _ _ _ __ _
//                          | ' </ _` | |  _| || | '_/ _` |
//                          |_|\_\__,_|_|\__|\_,_|_| \__,_|
//
// This file is part of the Kaltura Collaborative Media Suite which allows users
// to do with audio, video, and animation what Wiki platfroms allow them to do with
// text.
//
// Copyright (C) 2006-2018  Kaltura Inc.
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
 * @package Kaltura
 * @subpackage Client
 */
require_once(dirname(__FILE__) . "/KalturaClientBase.php");

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAdsPolicy extends KalturaEnumBase
{
	const NO_ADS = "NO_ADS";
	const KEEP_ADS = "KEEP_ADS";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAggregationCountOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAnnouncementOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAnnouncementRecipientsType extends KalturaEnumBase
{
	const ALL = "All";
	const LOGGEDIN = "LoggedIn";
	const GUESTS = "Guests";
	const OTHER = "Other";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAnnouncementStatus extends KalturaEnumBase
{
	const NOTSENT = "NotSent";
	const SENDING = "Sending";
	const SENT = "Sent";
	const ABORTED = "Aborted";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAppTokenHashType extends KalturaEnumBase
{
	const SHA1 = "SHA1";
	const SHA256 = "SHA256";
	const SHA512 = "SHA512";
	const MD5 = "MD5";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetCommentOrderBy extends KalturaEnumBase
{
	const CREATE_DATE_DESC = "CREATE_DATE_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetHistoryOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetOrderBy extends KalturaEnumBase
{
	const RELEVANCY_DESC = "RELEVANCY_DESC";
	const NAME_ASC = "NAME_ASC";
	const NAME_DESC = "NAME_DESC";
	const VIEWS_DESC = "VIEWS_DESC";
	const RATINGS_DESC = "RATINGS_DESC";
	const VOTES_DESC = "VOTES_DESC";
	const START_DATE_DESC = "START_DATE_DESC";
	const START_DATE_ASC = "START_DATE_ASC";
	const LIKES_DESC = "LIKES_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetReferenceType extends KalturaEnumBase
{
	const MEDIA = "media";
	const EPG_INTERNAL = "epg_internal";
	const EPG_EXTERNAL = "epg_external";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetReminderOrderBy extends KalturaEnumBase
{
	const RELEVANCY_DESC = "RELEVANCY_DESC";
	const NAME_ASC = "NAME_ASC";
	const NAME_DESC = "NAME_DESC";
	const VIEWS_DESC = "VIEWS_DESC";
	const RATINGS_DESC = "RATINGS_DESC";
	const VOTES_DESC = "VOTES_DESC";
	const START_DATE_DESC = "START_DATE_DESC";
	const START_DATE_ASC = "START_DATE_ASC";
	const LIKES_DESC = "LIKES_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetType extends KalturaEnumBase
{
	const MEDIA = "media";
	const RECORDING = "recording";
	const EPG = "epg";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetUserRuleOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBillingAction extends KalturaEnumBase
{
	const UNKNOWN = "unknown";
	const PURCHASE = "purchase";
	const RENEW_PAYMENT = "renew_payment";
	const RENEW_CANCELED_SUBSCRIPTION = "renew_canceled_subscription";
	const CANCEL_SUBSCRIPTION_ORDER = "cancel_subscription_order";
	const SUBSCRIPTION_DATE_CHANGED = "subscription_date_changed";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBillingItemsType extends KalturaEnumBase
{
	const UNKNOWN = "unknown";
	const PPV = "ppv";
	const SUBSCRIPTION = "subscription";
	const PRE_PAID = "pre_paid";
	const PRE_PAID_EXPIRED = "pre_paid_expired";
	const COLLECTION = "collection";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBillingPriceType extends KalturaEnumBase
{
	const FULLPERIOD = "FullPeriod";
	const PARTIALPERIOD = "PartialPeriod";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBookmarkActionType extends KalturaEnumBase
{
	const HIT = "HIT";
	const PLAY = "PLAY";
	const STOP = "STOP";
	const PAUSE = "PAUSE";
	const FIRST_PLAY = "FIRST_PLAY";
	const SWOOSH = "SWOOSH";
	const FULL_SCREEN = "FULL_SCREEN";
	const SEND_TO_FRIEND = "SEND_TO_FRIEND";
	const LOAD = "LOAD";
	const FULL_SCREEN_EXIT = "FULL_SCREEN_EXIT";
	const FINISH = "FINISH";
	const ERROR = "ERROR";
	const BITRATE_CHANGE = "BITRATE_CHANGE";
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBookmarkOrderBy extends KalturaEnumBase
{
	const POSITION_ASC = "POSITION_ASC";
	const POSITION_DESC = "POSITION_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBundleType extends KalturaEnumBase
{
	const SUBSCRIPTION = "subscription";
	const COLLECTION = "collection";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaChannelEnrichment extends KalturaEnumBase
{
	const CLIENTLOCATION = "ClientLocation";
	const USERID = "UserId";
	const HOUSEHOLDID = "HouseholdId";
	const DEVICEID = "DeviceId";
	const DEVICETYPE = "DeviceType";
	const UTCOFFSET = "UTCOffset";
	const LANGUAGE = "Language";
	const NPVRSUPPORT = "NPVRSupport";
	const CATCHUP = "Catchup";
	const PARENTAL = "Parental";
	const DTTREGION = "DTTRegion";
	const ATHOME = "AtHome";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCollectionOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCompensationType extends KalturaEnumBase
{
	const PERCENTAGE = "PERCENTAGE";
	const FIXED_AMOUNT = "FIXED_AMOUNT";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationGroupDeviceOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationGroupTagOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationsOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaContextType extends KalturaEnumBase
{
	const NONE = "none";
	const RECORDING = "recording";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCountryOrderBy extends KalturaEnumBase
{
	const NAME_ASC = "NAME_ASC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCouponGroupType extends KalturaEnumBase
{
	const COUPON = "COUPON";
	const GIFT_CARD = "GIFT_CARD";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCouponStatus extends KalturaEnumBase
{
	const VALID = "VALID";
	const NOT_EXISTS = "NOT_EXISTS";
	const ALREADY_USED = "ALREADY_USED";
	const EXPIRED = "EXPIRED";
	const INACTIVE = "INACTIVE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCurrencyOrderBy extends KalturaEnumBase
{
	const NAME_ASC = "NAME_ASC";
	const NAME_DESC = "NAME_DESC";
	const CODE_ASC = "CODE_ASC";
	const CODE_DESC = "CODE_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceStatus extends KalturaEnumBase
{
	const PENDING = "PENDING";
	const ACTIVATED = "ACTIVATED";
	const NOT_ACTIVATED = "NOT_ACTIVATED";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDrmSchemeName extends KalturaEnumBase
{
	const PLAYREADY_CENC = "PLAYREADY_CENC";
	const WIDEVINE_CENC = "WIDEVINE_CENC";
	const FAIRPLAY = "FAIRPLAY";
	const WIDEVINE = "WIDEVINE";
	const PLAYREADY = "PLAYREADY";
	const CUSTOM_DRM = "CUSTOM_DRM";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEngagementOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEngagementType extends KalturaEnumBase
{
	const CHURN = "Churn";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEntitlementOrderBy extends KalturaEnumBase
{
	const PURCHASE_DATE_ASC = "PURCHASE_DATE_ASC";
	const PURCHASE_DATE_DESC = "PURCHASE_DATE_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEntityReferenceBy extends KalturaEnumBase
{
	const USER = "user";
	const HOUSEHOLD = "household";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaExportDataType extends KalturaEnumBase
{
	const VOD = "vod";
	const EPG = "epg";
	const USERS = "users";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaExportTaskOrderBy extends KalturaEnumBase
{
	const CREATE_DATE_ASC = "CREATE_DATE_ASC";
	const CREATE_DATE_DESC = "CREATE_DATE_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaExportType extends KalturaEnumBase
{
	const FULL = "full";
	const INCREMENTAL = "incremental";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFavoriteOrderBy extends KalturaEnumBase
{
	const CREATE_DATE_ASC = "CREATE_DATE_ASC";
	const CREATE_DATE_DESC = "CREATE_DATE_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFollowTvSeriesOrderBy extends KalturaEnumBase
{
	const START_DATE_DESC = "START_DATE_DESC";
	const START_DATE_ASC = "START_DATE_ASC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaGroupByField extends KalturaEnumBase
{
	const MEDIA_TYPE_ID = "media_type_id";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdDeviceOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdFrequencyType extends KalturaEnumBase
{
	const DEVICES = "devices";
	const USERS = "users";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdPaymentGatewaySelectedBy extends KalturaEnumBase
{
	const NONE = "none";
	const ACCOUNT = "account";
	const HOUSEHOLD = "household";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdRestriction extends KalturaEnumBase
{
	const NOT_RESTRICTED = "not_restricted";
	const USER_MASTER_RESTRICTED = "user_master_restricted";
	const DEVICE_MASTER_RESTRICTED = "device_master_restricted";
	const DEVICE_USER_MASTER_RESTRICTED = "device_user_master_restricted";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdState extends KalturaEnumBase
{
	const OK = "ok";
	const CREATED_WITHOUT_NPVR_ACCOUNT = "created_without_npvr_account";
	const SUSPENDED = "suspended";
	const NO_USERS_IN_HOUSEHOLD = "no_users_in_household";
	const PENDING = "pending";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdSuspensionState extends KalturaEnumBase
{
	const NOT_SUSPENDED = "NOT_SUSPENDED";
	const SUSPENDED = "SUSPENDED";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdUserOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdUserStatus extends KalturaEnumBase
{
	const OK = "OK";
	const PENDING = "PENDING";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaInboxMessageOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaInboxMessageStatus extends KalturaEnumBase
{
	const UNREAD = "Unread";
	const READ = "Read";
	const DELETED = "Deleted";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaInboxMessageType extends KalturaEnumBase
{
	const SYSTEMANNOUNCEMENT = "SystemAnnouncement";
	const FOLLOWED = "Followed";
	const ENGAGEMENT = "Engagement";
	const INTEREST = "Interest";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLanguageOrderBy extends KalturaEnumBase
{
	const SYSTEM_NAME_ASC = "SYSTEM_NAME_ASC";
	const SYSTEM_NAME_DESC = "SYSTEM_NAME_DESC";
	const CODE_ASC = "CODE_ASC";
	const CODE_DESC = "CODE_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMessageTemplateType extends KalturaEnumBase
{
	const SERIES = "Series";
	const REMINDER = "Reminder";
	const CHURN = "Churn";
	const SERIESREMINDER = "SeriesReminder";
	const INTERESTVOD = "InterestVod";
	const INTERESTEPG = "InterestEPG";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetaFieldName extends KalturaEnumBase
{
	const NONE = "NONE";
	const SERIES_ID = "SERIES_ID";
	const SEASON_NUMBER = "SEASON_NUMBER";
	const EPISODE_NUMBER = "EPISODE_NUMBER";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetaOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetaTagOrderBy extends KalturaEnumBase
{
	const META_ASC = "META_ASC";
	const META_DESC = "META_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetaType extends KalturaEnumBase
{
	const STRING = "STRING";
	const NUMBER = "NUMBER";
	const BOOLEAN = "BOOLEAN";
	const STRING_ARRAY = "STRING_ARRAY";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaNotificationType extends KalturaEnumBase
{
	const ANNOUNCEMENT = "announcement";
	const SYSTEM = "system";
	const REMINDER = "Reminder";
	const SERIES_REMINDER = "series_reminder";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOTTUserOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaParentalRuleOrderBy extends KalturaEnumBase
{
	const PARTNER_SORT_VALUE = "PARTNER_SORT_VALUE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaParentalRuleType extends KalturaEnumBase
{
	const ALL = "ALL";
	const MOVIES = "MOVIES";
	const TV_SERIES = "TV_SERIES";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPartnerConfigurationType extends KalturaEnumBase
{
	const DEFAULTPAYMENTGATEWAY = "DefaultPaymentGateway";
	const ENABLEPAYMENTGATEWAYSELECTION = "EnablePaymentGatewaySelection";
	const OSSADAPTER = "OSSAdapter";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPaymentMethodProfileOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPaymentMethodType extends KalturaEnumBase
{
	const UNKNOWN = "unknown";
	const CREDIT_CARD = "credit_card";
	const SMS = "sms";
	const PAY_PAL = "pay_pal";
	const DEBIT_CARD = "debit_card";
	const IDEAL = "ideal";
	const INCASO = "incaso";
	const GIFT = "gift";
	const VISA = "visa";
	const MASTER_CARD = "master_card";
	const IN_APP = "in_app";
	const M1 = "m1";
	const CHANGE_SUBSCRIPTION = "change_subscription";
	const OFFLINE = "offline";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPersonalFeedOrderBy extends KalturaEnumBase
{
	const RELEVANCY_DESC = "RELEVANCY_DESC";
	const NAME_ASC = "NAME_ASC";
	const NAME_DESC = "NAME_DESC";
	const VIEWS_DESC = "VIEWS_DESC";
	const RATINGS_DESC = "RATINGS_DESC";
	const VOTES_DESC = "VOTES_DESC";
	const START_DATE_DESC = "START_DATE_DESC";
	const START_DATE_ASC = "START_DATE_ASC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPinType extends KalturaEnumBase
{
	const PURCHASE = "purchase";
	const PARENTAL = "parental";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPlatform extends KalturaEnumBase
{
	const ANDROID = "Android";
	const IOS = "iOS";
	const WINDOWSPHONE = "WindowsPhone";
	const BLACKBERRY = "Blackberry";
	const STB = "STB";
	const CTV = "CTV";
	const OTHER = "Other";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPlaybackContextType extends KalturaEnumBase
{
	const TRAILER = "TRAILER";
	const CATCHUP = "CATCHUP";
	const START_OVER = "START_OVER";
	const PLAYBACK = "PLAYBACK";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPositionOwner extends KalturaEnumBase
{
	const HOUSEHOLD = "household";
	const USER = "user";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPriceDetailsOrderBy extends KalturaEnumBase
{
	const NAME_ASC = "NAME_ASC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPricePlanOrderBy extends KalturaEnumBase
{
	const CREATE_DATE_DESC = "CREATE_DATE_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaProductPriceOrderBy extends KalturaEnumBase
{
	const PRODUCT_ID_ASC = "PRODUCT_ID_ASC";
	const PRODUCT_ID_DESC = "PRODUCT_ID_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaProtectionPolicy extends KalturaEnumBase
{
	const EXTENDINGRECORDINGLIFETIME = "ExtendingRecordingLifetime";
	const LIMITEDBYRECORDINGLIFETIME = "LimitedByRecordingLifetime";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPurchaseSettingsType extends KalturaEnumBase
{
	const BLOCK = "block";
	const ASK = "ask";
	const ALLOW = "allow";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPurchaseStatus extends KalturaEnumBase
{
	const PPV_PURCHASED = "ppv_purchased";
	const FREE = "free";
	const FOR_PURCHASE_SUBSCRIPTION_ONLY = "for_purchase_subscription_only";
	const SUBSCRIPTION_PURCHASED = "subscription_purchased";
	const FOR_PURCHASE = "for_purchase";
	const SUBSCRIPTION_PURCHASED_WRONG_CURRENCY = "subscription_purchased_wrong_currency";
	const PRE_PAID_PURCHASED = "pre_paid_purchased";
	const GEO_COMMERCE_BLOCKED = "geo_commerce_blocked";
	const ENTITLED_TO_PREVIEW_MODULE = "entitled_to_preview_module";
	const FIRST_DEVICE_LIMITATION = "first_device_limitation";
	const COLLECTION_PURCHASED = "collection_purchased";
	const USER_SUSPENDED = "user_suspended";
	const NOT_FOR_PURCHASE = "not_for_purchase";
	const INVALID_CURRENCY = "invalid_currency";
	const CURRENCY_NOT_DEFINED_ON_PRICE_CODE = "currency_not_defined_on_price_code";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaQuotaOveragePolicy extends KalturaEnumBase
{
	const STOPATQUOTA = "StopAtQuota";
	const FIFOAUTODELETE = "FIFOAutoDelete";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRecordingContextOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRecordingOrderBy extends KalturaEnumBase
{
	const TITLE_ASC = "TITLE_ASC";
	const TITLE_DESC = "TITLE_DESC";
	const START_DATE_ASC = "START_DATE_ASC";
	const START_DATE_DESC = "START_DATE_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRecordingStatus extends KalturaEnumBase
{
	const SCHEDULED = "SCHEDULED";
	const RECORDING = "RECORDING";
	const RECORDED = "RECORDED";
	const CANCELED = "CANCELED";
	const FAILED = "FAILED";
	const DELETED = "DELETED";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRecordingType extends KalturaEnumBase
{
	const SINGLE = "SINGLE";
	const SEASON = "SEASON";
	const SERIES = "SERIES";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRegionOrderBy extends KalturaEnumBase
{
	const CREATE_DATE_ASC = "CREATE_DATE_ASC";
	const CREATE_DATE_DESC = "CREATE_DATE_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaReminderType extends KalturaEnumBase
{
	const ASSET = "ASSET";
	const SERIES = "SERIES";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaReportOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRuleActionType extends KalturaEnumBase
{
	const BLOCK = "BLOCK";
	const START_DATE_OFFSET = "START_DATE_OFFSET";
	const END_DATE_OFFSET = "END_DATE_OFFSET";
	const USER_BLOCK = "USER_BLOCK";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRuleLevel extends KalturaEnumBase
{
	const INVALID = "invalid";
	const USER = "user";
	const HOUSEHOLD = "household";
	const ACCOUNT = "account";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRuleType extends KalturaEnumBase
{
	const PARENTAL = "parental";
	const GEO = "geo";
	const USER_TYPE = "user_type";
	const DEVICE = "device";
	const ASSETUSER = "assetUser";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaScheduledRecordingAssetType extends KalturaEnumBase
{
	const SINGLE = "single";
	const SERIES = "series";
	const ALL = "all";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchHistoryOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSeriesRecordingOrderBy extends KalturaEnumBase
{
	const START_DATE_ASC = "START_DATE_ASC";
	const START_DATE_DESC = "START_DATE_DESC";
	const ID_ASC = "ID_ASC";
	const ID_DESC = "ID_DESC";
	const SERIES_ID_ASC = "SERIES_ID_ASC";
	const SERIES_ID_DESC = "SERIES_ID_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSeriesReminderOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialActionOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialActionPrivacy extends KalturaEnumBase
{
	const ALLOW = "ALLOW";
	const DONT_ALLOW = "DONT_ALLOW";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialActionType extends KalturaEnumBase
{
	const LIKE = "LIKE";
	const WATCH = "WATCH";
	const RATE = "RATE";
	const SHARE = "SHARE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialCommentOrderBy extends KalturaEnumBase
{
	const CREATE_DATE_ASC = "CREATE_DATE_ASC";
	const CREATE_DATE_DESC = "CREATE_DATE_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialFriendActivityOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
	const UPDATE_DATE_DESC = "UPDATE_DATE_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialNetwork extends KalturaEnumBase
{
	const FACEBOOK = "facebook";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialPlatform extends KalturaEnumBase
{
	const IN_APP = "IN_APP";
	const FACEBOOK = "FACEBOOK";
	const TWITTER = "TWITTER";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialPrivacy extends KalturaEnumBase
{
	const UNKNOWN = "UNKNOWN";
	const EVERYONE = "EVERYONE";
	const ALL_FRIENDS = "ALL_FRIENDS";
	const FRIENDS_OF_FRIENDS = "FRIENDS_OF_FRIENDS";
	const SELF = "SELF";
	const CUSTOM = "CUSTOM";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialStatus extends KalturaEnumBase
{
	const ERROR = "error";
	const OK = "ok";
	const USER_DOES_NOT_EXIST = "user_does_not_exist";
	const NO_USER_SOCIAL_SETTINGS_FOUND = "no_user_social_settings_found";
	const ASSET_ALREADY_LIKED = "asset_already_liked";
	const NOT_ALLOWED = "not_allowed";
	const INVALID_PARAMETERS = "invalid_parameters";
	const NO_FACEBOOK_ACTION = "no_facebook_action";
	const ASSET_ALREADY_RATED = "asset_already_rated";
	const ASSET_DOSE_NOT_EXISTS = "asset_dose_not_exists";
	const INVALID_PLATFORM_REQUEST = "invalid_platform_request";
	const INVALID_ACCESS_TOKEN = "invalid_access_token";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaStreamType extends KalturaEnumBase
{
	const CATCHUP = "catchup";
	const START_OVER = "start_over";
	const TRICK_PLAY = "trick_play";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscriptionDependencyType extends KalturaEnumBase
{
	const NOTAPPLICABLE = "NOTAPPLICABLE";
	const BASE = "BASE";
	const ADDON = "ADDON";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscriptionOrderBy extends KalturaEnumBase
{
	const START_DATE_ASC = "START_DATE_ASC";
	const START_DATE_DESC = "START_DATE_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscriptionSetOrderBy extends KalturaEnumBase
{
	const NAME_ASC = "NAME_ASC";
	const NAME_DESC = "NAME_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscriptionSetType extends KalturaEnumBase
{
	const SWITCH = "SWITCH";
	const DEPENDENCY = "DEPENDENCY";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTopicAutomaticIssueNotification extends KalturaEnumBase
{
	const INHERIT = "Inherit";
	const YES = "Yes";
	const NO = "No";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTopicOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTransactionAdapterStatus extends KalturaEnumBase
{
	const OK = "OK";
	const PENDING = "PENDING";
	const FAILED = "FAILED";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTransactionHistoryOrderBy extends KalturaEnumBase
{
	const CREATE_DATE_ASC = "CREATE_DATE_ASC";
	const CREATE_DATE_DESC = "CREATE_DATE_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTransactionType extends KalturaEnumBase
{
	const PPV = "ppv";
	const SUBSCRIPTION = "subscription";
	const COLLECTION = "collection";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserAssetRuleOrderBy extends KalturaEnumBase
{
	const NAME_ASC = "NAME_ASC";
	const NAME_DESC = "NAME_DESC";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserAssetsListItemType extends KalturaEnumBase
{
	const ALL = "all";
	const MEDIA = "media";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserAssetsListType extends KalturaEnumBase
{
	const ALL = "all";
	const WATCH = "watch";
	const PURCHASE = "purchase";
	const LIBRARY = "library";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserRoleOrderBy extends KalturaEnumBase
{
	const NONE = "NONE";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserState extends KalturaEnumBase
{
	const OK = "ok";
	const USER_WITH_NO_HOUSEHOLD = "user_with_no_household";
	const USER_CREATED_WITH_NO_ROLE = "user_created_with_no_role";
	const USER_NOT_ACTIVATED = "user_not_activated";
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaWatchStatus extends KalturaEnumBase
{
	const PROGRESS = "progress";
	const DONE = "done";
	const ALL = "all";
}

