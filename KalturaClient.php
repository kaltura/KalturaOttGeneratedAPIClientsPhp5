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
require_once(dirname(__FILE__) . "/KalturaEnums.php");
require_once(dirname(__FILE__) . "/KalturaTypes.php");


/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAnnouncementService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new future scheduled system announcement push notification
	 * 
	 * @param KalturaAnnouncement $announcement The announcement to be added.
            timezone parameter should be taken from the 'name of timezone' from: https://msdn.microsoft.com/en-us/library/ms912391(v=winembedded.11).aspx
            Recipients values: All, LoggedIn, Guests
	 * @return KalturaAnnouncement
	 */
	function add(KalturaAnnouncement $announcement)
	{
		$kparams = array();
		$this->client->addParam($kparams, "announcement", $announcement->toParams());
		$this->client->queueServiceActionCall("announcement", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAnnouncement");
		return $resultObject;
	}

	/**
	 * Delete an existing announcing. Announcement cannot be delete while being sent.
	 * 
	 * @param bigint $id Id of the announcement.
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("announcement", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Enable system announcements
	 * 
	 * @return bool
	 */
	function enableSystemAnnouncements()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("announcement", "enableSystemAnnouncements", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Lists all announcements in the system.
	 * 
	 * @param KalturaAnnouncementFilter $filter Filter object
	 * @param KalturaFilterPager $pager Paging the request
	 * @return KalturaAnnouncementListResponse
	 */
	function listAction(KalturaAnnouncementFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("announcement", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAnnouncementListResponse");
		return $resultObject;
	}

	/**
	 * Update an existing future system announcement push notification. Announcement can only be updated only before sending
	 * 
	 * @param int $announcementId The announcement identifier
	 * @param KalturaAnnouncement $announcement The announcement to update.
            timezone parameter should be taken from the 'name of timezone' from: https://msdn.microsoft.com/en-us/library/ms912391(v=winembedded.11).aspx
            Recipients values: All, LoggedIn, Guests
	 * @return KalturaAnnouncement
	 */
	function update($announcementId, KalturaAnnouncement $announcement)
	{
		$kparams = array();
		$this->client->addParam($kparams, "announcementId", $announcementId);
		$this->client->addParam($kparams, "announcement", $announcement->toParams());
		$this->client->queueServiceActionCall("announcement", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAnnouncement");
		return $resultObject;
	}

	/**
	 * Update a system announcement status
	 * 
	 * @param bigint $id Id of the announcement.
	 * @param bool $status Status to update to.
	 * @return bool
	 */
	function updateStatus($id, $status)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "status", $status);
		$this->client->queueServiceActionCall("announcement", "updateStatus", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAppTokenService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add new application authentication token
	 * 
	 * @param KalturaAppToken $appToken Application token
	 * @return KalturaAppToken
	 */
	function add(KalturaAppToken $appToken)
	{
		$kparams = array();
		$this->client->addParam($kparams, "appToken", $appToken->toParams());
		$this->client->queueServiceActionCall("apptoken", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAppToken");
		return $resultObject;
	}

	/**
	 * Delete application authentication token by id
	 * 
	 * @param string $id Application token identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("apptoken", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get application authentication token by id
	 * 
	 * @param string $id Application token identifier
	 * @return KalturaAppToken
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("apptoken", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAppToken");
		return $resultObject;
	}

	/**
	 * Starts a new KS (Kaltura Session) based on application authentication token id
	 * 
	 * @param string $id Application token id
	 * @param string $tokenHash Hashed token - current KS concatenated with the application token hashed using the application token ‘hashType’
	 * @param string $userId Session user id, will be ignored if a different user id already defined on the application token
	 * @param int $expiry Session expiry (in seconds), could be overwritten by shorter expiry of the application token and the session-expiry that defined on the application token
	 * @param string $udid Device UDID
	 * @return KalturaSessionInfo
	 */
	function startSession($id, $tokenHash, $userId = null, $expiry = null, $udid = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "tokenHash", $tokenHash);
		$this->client->addParam($kparams, "userId", $userId);
		$this->client->addParam($kparams, "expiry", $expiry);
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->queueServiceActionCall("apptoken", "startSession", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSessionInfo");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetCommentService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add asset comments by asset id
	 * 
	 * @param KalturaAssetComment $comment Comment
	 * @return KalturaAssetComment
	 */
	function add(KalturaAssetComment $comment)
	{
		$kparams = array();
		$this->client->addParam($kparams, "comment", $comment->toParams());
		$this->client->queueServiceActionCall("assetcomment", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetComment");
		return $resultObject;
	}

	/**
	 * Returns asset comments by asset id
	 * 
	 * @param KalturaAssetCommentFilter $filter Filtering the assets comments request
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaAssetCommentListResponse
	 */
	function listAction(KalturaAssetCommentFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("assetcomment", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetCommentListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns a group-by result for media or EPG according to given filter. Lists values of each field and their respective count.
	 * 
	 * @param KalturaSearchAssetFilter $filter Filtering the assets request
	 * @return KalturaAssetCount
	 */
	function count(KalturaSearchAssetFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("asset", "count", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetCount");
		return $resultObject;
	}

	/**
	 * Returns media or EPG asset by media / EPG internal or external identifier
	 * 
	 * @param string $id Asset identifier
	 * @param string $assetReferenceType Asset type
	 * @return KalturaAsset
	 */
	function get($id, $assetReferenceType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "assetReferenceType", $assetReferenceType);
		$this->client->queueServiceActionCall("asset", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAsset");
		return $resultObject;
	}

	/**
	 * Returns the data for ads control
	 * 
	 * @param string $assetId Asset identifier
	 * @param string $assetType Asset type
	 * @param KalturaPlaybackContextOptions $contextDataParams Parameters for the request
	 * @return KalturaAdsContext
	 */
	function getAdsContext($assetId, $assetType, KalturaPlaybackContextOptions $contextDataParams)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "assetType", $assetType);
		$this->client->addParam($kparams, "contextDataParams", $contextDataParams->toParams());
		$this->client->queueServiceActionCall("asset", "getAdsContext", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAdsContext");
		return $resultObject;
	}

	/**
	 * This action delivers all data relevant for player
	 * 
	 * @param string $assetId Asset identifier
	 * @param string $assetType Asset type
	 * @param KalturaPlaybackContextOptions $contextDataParams Parameters for the request
	 * @return KalturaPlaybackContext
	 */
	function getPlaybackContext($assetId, $assetType, KalturaPlaybackContextOptions $contextDataParams)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "assetType", $assetType);
		$this->client->addParam($kparams, "contextDataParams", $contextDataParams->toParams());
		$this->client->queueServiceActionCall("asset", "getPlaybackContext", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPlaybackContext");
		return $resultObject;
	}

	/**
	 * Returns media or EPG assets. Filters by media identifiers or by EPG internal or external identifier.
	 * 
	 * @param KalturaAssetFilter $filter Filtering the assets request
	 * @param KalturaFilterPager $pager Paging the request
	 * @return KalturaAssetListResponse
	 */
	function listAction(KalturaAssetFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("asset", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetFileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get KalturaAssetFileContext
	 * 
	 * @param string $id Asset file identifier
	 * @param string $contextType Kaltura Context Type (none = 0, recording = 1)
	 * @return KalturaAssetFileContext
	 */
	function getContext($id, $contextType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "contextType", $contextType);
		$this->client->queueServiceActionCall("assetfile", "getContext", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetFileContext");
		return $resultObject;
	}

	/**
	 * Redirects to play manifest
	 * 
	 * @param int $partnerId Partner identifier
	 * @param string $assetId Asset identifier
	 * @param string $assetType Asset type
	 * @param bigint $assetFileId Asset file identifier
	 * @param string $contextType Playback context type
	 * @param string $ks Kaltura session for the user, not mandatory for anonymous user
	 */
	function playManifest($partnerId, $assetId, $assetType, $assetFileId, $contextType, $ks = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "assetType", $assetType);
		$this->client->addParam($kparams, "assetFileId", $assetFileId);
		$this->client->addParam($kparams, "contextType", $contextType);
		$this->client->addParam($kparams, "ks", $ks);
		$this->client->queueServiceActionCall("assetfile", "playManifest", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetHistoryService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Clean the user’s viewing history
	 * 
	 * @param KalturaAssetHistoryFilter $filter List of assets identifier
	 */
	function clean(KalturaAssetHistoryFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("assethistory", "clean", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Get recently watched media for user, ordered by recently watched first.
	 * 
	 * @param KalturaAssetHistoryFilter $filter Filter parameters for filtering out the result
	 * @param KalturaFilterPager $pager Page size and index. Number of assets to return per page. Possible range 5 ≤ size ≥ 50. If omitted - will be set to 25. If a value > 50 provided – will set to 50
	 * @return KalturaAssetHistoryListResponse
	 */
	function listAction(KalturaAssetHistoryFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("assethistory", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetHistoryListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetRuleService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add asset rule
	 * 
	 * @param KalturaAssetRule $assetRule Asset rule
	 * @return KalturaAssetRule
	 */
	function add(KalturaAssetRule $assetRule)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetRule", $assetRule->toParams());
		$this->client->queueServiceActionCall("assetrule", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetRule");
		return $resultObject;
	}

	/**
	 * Delete asset rule
	 * 
	 * @param bigint $id Asset rule ID
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("assetrule", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get the list of asset rules for the partner
	 * 
	 * @return KalturaAssetRuleListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("assetrule", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetRuleListResponse");
		return $resultObject;
	}

	/**
	 * Update asset rule
	 * 
	 * @param bigint $id Asset rule ID to update
	 * @param KalturaAssetRule $assetRule Asset rule
	 * @return KalturaAssetRule
	 */
	function update($id, KalturaAssetRule $assetRule)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "assetRule", $assetRule->toParams());
		$this->client->queueServiceActionCall("assetrule", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetRule");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetStatisticsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns statistics for given list of assets by type and / or time period
	 * 
	 * @param KalturaAssetStatisticsQuery $query Query for assets statistics
	 * @return KalturaAssetStatisticsListResponse
	 */
	function query(KalturaAssetStatisticsQuery $query)
	{
		$kparams = array();
		$this->client->addParam($kparams, "query", $query->toParams());
		$this->client->queueServiceActionCall("assetstatistics", "query", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetStatisticsListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaAssetUserRuleService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add asset user rule
	 * 
	 * @param KalturaAssetUserRule $assetUserRule Asset user rule
	 * @return KalturaAssetUserRule
	 */
	function add(KalturaAssetUserRule $assetUserRule)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetUserRule", $assetUserRule->toParams());
		$this->client->queueServiceActionCall("assetuserrule", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetUserRule");
		return $resultObject;
	}

	/**
	 * Attach AssetUserRule To User
	 * 
	 * @param bigint $ruleId AssetUserRule id to add
	 */
	function attachUser ($ruleId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ruleId", $ruleId);
		$this->client->queueServiceActionCall("assetuserrule", "attachUser ", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Delete asset user rule
	 * 
	 * @param bigint $id Asset user rule ID
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("assetuserrule", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Detach AssetUserRule from user
	 * 
	 * @param bigint $ruleId AssetUserRule id to remove
	 */
	function detachUser($ruleId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ruleId", $ruleId);
		$this->client->queueServiceActionCall("assetuserrule", "detachUser", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Get the list of asset user rules for the partner
	 * 
	 * @param KalturaAssetUserRuleFilter $filter AssetUserRule Filter
	 * @return KalturaAssetUserRuleListResponse
	 */
	function listAction(KalturaAssetUserRuleFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("assetuserrule", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetUserRuleListResponse");
		return $resultObject;
	}

	/**
	 * Update asset user rule
	 * 
	 * @param bigint $id Asset user rule ID to update
	 * @param KalturaAssetUserRule $assetUserRule Asset user rule
	 * @return KalturaAssetUserRule
	 */
	function update($id, KalturaAssetUserRule $assetUserRule)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "assetUserRule", $assetUserRule->toParams());
		$this->client->queueServiceActionCall("assetuserrule", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaAssetUserRule");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaBookmarkService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Report player position and action for the user on the watched asset. Player position is used to later allow resume watching.
	 * 
	 * @param KalturaBookmark $bookmark Bookmark details
	 * @return bool
	 */
	function add(KalturaBookmark $bookmark)
	{
		$kparams = array();
		$this->client->addParam($kparams, "bookmark", $bookmark->toParams());
		$this->client->queueServiceActionCall("bookmark", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns player position record/s for the requested asset and the requesting user. 
            If default user makes the request – player position records are provided for all of the users in the household.
            If non-default user makes the request - player position records are provided for the requesting user and the default user of the household.
	 * 
	 * @param KalturaBookmarkFilter $filter Filter option for the last position
	 * @return KalturaBookmarkListResponse
	 */
	function listAction(KalturaBookmarkFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("bookmark", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBookmarkListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCdnAdapterProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new CDN adapter for partner
	 * 
	 * @param KalturaCDNAdapterProfile $adapter CDN adapter object
	 * @return KalturaCDNAdapterProfile
	 */
	function add(KalturaCDNAdapterProfile $adapter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "adapter", $adapter->toParams());
		$this->client->queueServiceActionCall("cdnadapterprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDNAdapterProfile");
		return $resultObject;
	}

	/**
	 * Delete CDN adapter by CDN adapter id
	 * 
	 * @param int $adapterId CDN adapter identifier
	 * @return bool
	 */
	function delete($adapterId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "adapterId", $adapterId);
		$this->client->queueServiceActionCall("cdnadapterprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Generate CDN adapter shared secret
	 * 
	 * @param int $adapterId CDN adapter identifier
	 * @return KalturaCDNAdapterProfile
	 */
	function generateSharedSecret($adapterId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "adapterId", $adapterId);
		$this->client->queueServiceActionCall("cdnadapterprofile", "generateSharedSecret", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDNAdapterProfile");
		return $resultObject;
	}

	/**
	 * Returns all CDN adapters for partner
	 * 
	 * @return KalturaCDNAdapterProfileListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("cdnadapterprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDNAdapterProfileListResponse");
		return $resultObject;
	}

	/**
	 * Update CDN adapter details
	 * 
	 * @param int $adapterId CDN adapter id to update
	 * @param KalturaCDNAdapterProfile $adapter CDN adapter Object
	 * @return KalturaCDNAdapterProfile
	 */
	function update($adapterId, KalturaCDNAdapterProfile $adapter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "adapterId", $adapterId);
		$this->client->addParam($kparams, "adapter", $adapter->toParams());
		$this->client->queueServiceActionCall("cdnadapterprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDNAdapterProfile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCdnPartnerSettingsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve the partner’s CDN settings (default adapters)
	 * 
	 * @return KalturaCDNPartnerSettings
	 */
	function get()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("cdnpartnersettings", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDNPartnerSettings");
		return $resultObject;
	}

	/**
	 * Configure the partner’s CDN settings (default adapters)
	 * 
	 * @param KalturaCDNPartnerSettings $settings CDN partner settings
	 * @return KalturaCDNPartnerSettings
	 */
	function update(KalturaCDNPartnerSettings $settings)
	{
		$kparams = array();
		$this->client->addParam($kparams, "settings", $settings->toParams());
		$this->client->queueServiceActionCall("cdnpartnersettings", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDNPartnerSettings");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCDVRAdapterProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new C-DVR adapter for partner
	 * 
	 * @param KalturaCDVRAdapterProfile $adapter C-DVR adapter object
	 * @return KalturaCDVRAdapterProfile
	 */
	function add(KalturaCDVRAdapterProfile $adapter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "adapter", $adapter->toParams());
		$this->client->queueServiceActionCall("cdvradapterprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDVRAdapterProfile");
		return $resultObject;
	}

	/**
	 * Delete C-DVR adapter by C-DVR adapter id
	 * 
	 * @param int $adapterId C-DVR adapter identifier
	 * @return bool
	 */
	function delete($adapterId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "adapterId", $adapterId);
		$this->client->queueServiceActionCall("cdvradapterprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Generate C-DVR adapter shared secret
	 * 
	 * @param int $adapterId C-DVR adapter identifier
	 * @return KalturaCDVRAdapterProfile
	 */
	function generateSharedSecret($adapterId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "adapterId", $adapterId);
		$this->client->queueServiceActionCall("cdvradapterprofile", "generateSharedSecret", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDVRAdapterProfile");
		return $resultObject;
	}

	/**
	 * Returns all C-DVR adapters for partner
	 * 
	 * @return KalturaCDVRAdapterProfileListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("cdvradapterprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDVRAdapterProfileListResponse");
		return $resultObject;
	}

	/**
	 * Update C-DVR adapter details
	 * 
	 * @param int $adapterId C-DVR adapter identifier
	 * @param KalturaCDVRAdapterProfile $adapter C-DVR adapter Object
	 * @return KalturaCDVRAdapterProfile
	 */
	function update($adapterId, KalturaCDVRAdapterProfile $adapter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "adapterId", $adapterId);
		$this->client->addParam($kparams, "adapter", $adapter->toParams());
		$this->client->queueServiceActionCall("cdvradapterprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCDVRAdapterProfile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaChannelService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new channel for partner. Currently supports only KSQL channel
	 * 
	 * @param KalturaChannel $channel KSQL channel Object
	 * @return KalturaChannel
	 */
	function add(KalturaChannel $channel)
	{
		$kparams = array();
		$this->client->addParam($kparams, "channel", $channel->toParams());
		$this->client->queueServiceActionCall("channel", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaChannel");
		return $resultObject;
	}

	/**
	 * Delete channel by its channel id
	 * 
	 * @param int $channelId Channel identifier
	 * @return bool
	 */
	function delete($channelId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "channelId", $channelId);
		$this->client->queueServiceActionCall("channel", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns channel info
	 * 
	 * @param int $id Channel Identifier
	 * @return KalturaChannel
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("channel", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaChannel");
		return $resultObject;
	}

	/**
	 * Update channel details. Currently supports only KSQL channel
	 * 
	 * @param int $channelId Channel identifier
	 * @param KalturaChannel $channel KSQL channel Object
	 * @return KalturaChannel
	 */
	function update($channelId, KalturaChannel $channel)
	{
		$kparams = array();
		$this->client->addParam($kparams, "channelId", $channelId);
		$this->client->addParam($kparams, "channel", $channel->toParams());
		$this->client->queueServiceActionCall("channel", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaChannel");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCollectionService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns a list of subscriptions requested by Subscription ID or file ID
	 * 
	 * @param KalturaCollectionFilter $filter Filter request
	 * @return KalturaCollectionListResponse
	 */
	function listAction(KalturaCollectionFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("collection", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCollectionListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCompensationService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a new compensation for a household for a given number of iterations of a subscription renewal for a fixed amount / percentage of the renewal price.
	 * 
	 * @param KalturaCompensation $compensation Compensation parameters
	 * @return KalturaCompensation
	 */
	function add(KalturaCompensation $compensation)
	{
		$kparams = array();
		$this->client->addParam($kparams, "compensation", $compensation->toParams());
		$this->client->queueServiceActionCall("compensation", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCompensation");
		return $resultObject;
	}

	/**
	 * Delete a compensation by identifier
	 * 
	 * @param bigint $id Compensation identifier
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("compensation", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Get a compensation by identifier
	 * 
	 * @param bigint $id Compensation identifier
	 * @return KalturaCompensation
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("compensation", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCompensation");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationGroupService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new configuration group
	 * 
	 * @param KalturaConfigurationGroup $configurationGroup Configuration group
	 * @return KalturaConfigurationGroup
	 */
	function add(KalturaConfigurationGroup $configurationGroup)
	{
		$kparams = array();
		$this->client->addParam($kparams, "configurationGroup", $configurationGroup->toParams());
		$this->client->queueServiceActionCall("configurationgroup", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationGroup");
		return $resultObject;
	}

	/**
	 * Remove a configuration group, including its tags, device configurations and devices associations
	 * 
	 * @param string $id Configuration group identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("configurationgroup", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Return the configuration group details, including group identifiers, tags, and number of associated devices, and list of device configuration
	 * 
	 * @param string $id Configuration group identifier
	 * @return KalturaConfigurationGroup
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("configurationgroup", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationGroup");
		return $resultObject;
	}

	/**
	 * Return the list of configuration groups
	 * 
	 * @return KalturaConfigurationGroupListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("configurationgroup", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationGroupListResponse");
		return $resultObject;
	}

	/**
	 * Update configuration group name
	 * 
	 * @param string $id Configuration group identifier
	 * @param KalturaConfigurationGroup $configurationGroup Configuration group
	 * @return KalturaConfigurationGroup
	 */
	function update($id, KalturaConfigurationGroup $configurationGroup)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "configurationGroup", $configurationGroup->toParams());
		$this->client->queueServiceActionCall("configurationgroup", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationGroup");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationGroupDeviceService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Associate a collection of devices to a configuration group. If a device is already associated to another group – old association is replaced
	 * 
	 * @param KalturaConfigurationGroupDevice $configurationGroupDevice Configuration group device
	 * @return bool
	 */
	function add(KalturaConfigurationGroupDevice $configurationGroupDevice)
	{
		$kparams = array();
		$this->client->addParam($kparams, "configurationGroupDevice", $configurationGroupDevice->toParams());
		$this->client->queueServiceActionCall("configurationgroupdevice", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Remove a device association
	 * 
	 * @param string $udid Device UDID
	 * @return bool
	 */
	function delete($udid)
	{
		$kparams = array();
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->queueServiceActionCall("configurationgroupdevice", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Return the configuration group to which a specific device is associated to
	 * 
	 * @param string $udid Device UDID
	 * @return KalturaConfigurationGroupDevice
	 */
	function get($udid)
	{
		$kparams = array();
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->queueServiceActionCall("configurationgroupdevice", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationGroupDevice");
		return $resultObject;
	}

	/**
	 * Return the list of associated devices for a given configuration group
	 * 
	 * @param KalturaConfigurationGroupDeviceFilter $filter Filter option for configuration group identifier
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaConfigurationGroupDeviceListResponse
	 */
	function listAction(KalturaConfigurationGroupDeviceFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("configurationgroupdevice", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationGroupDeviceListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationGroupTagService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new tag to a configuration group. If this tag is already associated to another group, request fails
	 * 
	 * @param KalturaConfigurationGroupTag $configurationGroupTag Configuration group tag
	 * @return KalturaConfigurationGroupTag
	 */
	function add(KalturaConfigurationGroupTag $configurationGroupTag)
	{
		$kparams = array();
		$this->client->addParam($kparams, "configurationGroupTag", $configurationGroupTag->toParams());
		$this->client->queueServiceActionCall("configurationgrouptag", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationGroupTag");
		return $resultObject;
	}

	/**
	 * Remove a tag association from configuration group
	 * 
	 * @param string $tag Tag
	 * @return bool
	 */
	function delete($tag)
	{
		$kparams = array();
		$this->client->addParam($kparams, "tag", $tag);
		$this->client->queueServiceActionCall("configurationgrouptag", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Return the configuration group the tag is associated to
	 * 
	 * @param string $tag Tag
	 * @return KalturaConfigurationGroupTag
	 */
	function get($tag)
	{
		$kparams = array();
		$this->client->addParam($kparams, "tag", $tag);
		$this->client->queueServiceActionCall("configurationgrouptag", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationGroupTag");
		return $resultObject;
	}

	/**
	 * Return list of tags for a configuration group
	 * 
	 * @param KalturaConfigurationGroupTagFilter $filter Filter option for configuration group identifier
	 * @return KalturaConfigurationGroupTagListResponse
	 */
	function listAction(KalturaConfigurationGroupTagFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("configurationgrouptag", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationGroupTagListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaConfigurationsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new device configuration to a configuration group
	 * 
	 * @param KalturaConfigurations $configurations Device configuration
	 * @return KalturaConfigurations
	 */
	function add(KalturaConfigurations $configurations)
	{
		$kparams = array();
		$this->client->addParam($kparams, "configurations", $configurations->toParams());
		$this->client->queueServiceActionCall("configurations", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurations");
		return $resultObject;
	}

	/**
	 * Delete a device configuration
	 * 
	 * @param string $id Configuration identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("configurations", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Return the device configuration
	 * 
	 * @param string $id Configuration identifier
	 * @return KalturaConfigurations
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("configurations", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurations");
		return $resultObject;
	}

	/**
	 * Return a list of device configurations of a configuration group
	 * 
	 * @param KalturaConfigurationsFilter $filter Filter option for configuration group id.
	 * @return KalturaConfigurationsListResponse
	 */
	function listAction(KalturaConfigurationsFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("configurations", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurationsListResponse");
		return $resultObject;
	}

	/**
	 * Return a device configuration applicable for a specific device (UDID), app name, software version, platform and optionally a configuration group’s tag
	 * 
	 * @param string $applicationName Application name
	 * @param string $clientVersion Client version
	 * @param string $platform Platform
	 * @param string $udid Device UDID
	 * @param string $tag Tag
	 * @param int $partnerId Partner Id
	 * @return file
	 */
	function serveByDevice($applicationName, $clientVersion, $platform, $udid, $tag, $partnerId = 0)
	{
		$kparams = array();
		$this->client->addParam($kparams, "applicationName", $applicationName);
		$this->client->addParam($kparams, "clientVersion", $clientVersion);
		$this->client->addParam($kparams, "platform", $platform);
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->addParam($kparams, "tag", $tag);
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->queueServiceActionCall("configurations", "serveByDevice", $kparams);
		if(!$this->client->getDestinationPath() && !$this->client->getReturnServedResult())
			return $this->client->getServeUrl();
		return $this->client->doQueue();
	}

	/**
	 * Update device configuration
	 * 
	 * @param string $id Configuration identifier
	 * @param KalturaConfigurations $configurations Configuration to update
	 * @return KalturaConfigurations
	 */
	function update($id, KalturaConfigurations $configurations)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "configurations", $configurations->toParams());
		$this->client->queueServiceActionCall("configurations", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaConfigurations");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCountryService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get the list of countries for the partner with option to filter by countries identifiers
	 * 
	 * @param KalturaCountryFilter $filter Country filter
	 * @return KalturaCountryListResponse
	 */
	function listAction(KalturaCountryFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("country", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCountryListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCouponService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns information about a coupon
	 * 
	 * @param string $code Coupon code
	 * @return KalturaCoupon
	 */
	function get($code)
	{
		$kparams = array();
		$this->client->addParam($kparams, "code", $code);
		$this->client->queueServiceActionCall("coupon", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCoupon");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCouponsGroupService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add coupons group
	 * 
	 * @param KalturaCouponsGroup $couponsGroup Coupons group
	 * @return KalturaCouponsGroup
	 */
	function add(KalturaCouponsGroup $couponsGroup)
	{
		$kparams = array();
		$this->client->addParam($kparams, "couponsGroup", $couponsGroup->toParams());
		$this->client->queueServiceActionCall("couponsgroup", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCouponsGroup");
		return $resultObject;
	}

	/**
	 * Delete a coupons group
	 * 
	 * @param bigint $id Coupons group identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("couponsgroup", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Generate a coupon
	 * 
	 * @param bigint $id Coupon group identifier
	 * @param KalturaCouponGenerationOptions $couponGenerationOptions Coupon generation options
	 * @return KalturaStringValueArray
	 */
	function generate($id, KalturaCouponGenerationOptions $couponGenerationOptions)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "couponGenerationOptions", $couponGenerationOptions->toParams());
		$this->client->queueServiceActionCall("couponsgroup", "generate", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaStringValueArray");
		return $resultObject;
	}

	/**
	 * Returns information about coupons group
	 * 
	 * @param bigint $id Coupons group ID
	 * @return KalturaCouponsGroup
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("couponsgroup", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCouponsGroup");
		return $resultObject;
	}

	/**
	 * Returns information about partner coupons groups
	 * 
	 * @return KalturaCouponsGroupListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("couponsgroup", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCouponsGroupListResponse");
		return $resultObject;
	}

	/**
	 * Update coupons group
	 * 
	 * @param bigint $id Coupons group identifier
	 * @param KalturaCouponsGroup $couponsGroup Coupons group
	 * @return KalturaCouponsGroup
	 */
	function update($id, KalturaCouponsGroup $couponsGroup)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "couponsGroup", $couponsGroup->toParams());
		$this->client->queueServiceActionCall("couponsgroup", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCouponsGroup");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaCurrencyService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get the list of currencies for the partner with option to filter by currency codes
	 * 
	 * @param KalturaCurrencyFilter $filter Currency filter
	 * @return KalturaCurrencyListResponse
	 */
	function listAction(KalturaCurrencyFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("currency", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCurrencyListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceBrandService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Return a list of the available device brands.
	 * 
	 * @return KalturaDeviceBrandListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("devicebrand", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDeviceBrandListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaDeviceFamilyService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Return a list of the available device families.
	 * 
	 * @return KalturaDeviceFamilyListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("devicefamily", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDeviceFamilyListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEmailService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Sends email notification
	 * 
	 * @param KalturaEmailMessage $emailMessage Email details
	 * @return bool
	 */
	function send(KalturaEmailMessage $emailMessage)
	{
		$kparams = array();
		$this->client->addParam($kparams, "emailMessage", $emailMessage->toParams());
		$this->client->queueServiceActionCall("email", "send", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEngagementAdapterService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new Engagement adapter for partner
	 * 
	 * @param KalturaEngagementAdapter $engagementAdapter Engagement adapter Object
	 * @return KalturaEngagementAdapter
	 */
	function add(KalturaEngagementAdapter $engagementAdapter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "engagementAdapter", $engagementAdapter->toParams());
		$this->client->queueServiceActionCall("engagementadapter", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEngagementAdapter");
		return $resultObject;
	}

	/**
	 * Delete Engagement adapter by Engagement adapter id
	 * 
	 * @param int $id Engagement adapter identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("engagementadapter", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Generate engagement adapter shared secret
	 * 
	 * @param int $id Engagement adapter identifier
	 * @return KalturaEngagementAdapter
	 */
	function generateSharedSecret($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("engagementadapter", "generateSharedSecret", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEngagementAdapter");
		return $resultObject;
	}

	/**
	 * Returns all Engagement adapters for partner : id + name
	 * 
	 * @param int $id Engagement adapter identifier
	 * @return KalturaEngagementAdapter
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("engagementadapter", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEngagementAdapter");
		return $resultObject;
	}

	/**
	 * Returns all Engagement adapters for partner : id + name
	 * 
	 * @return KalturaEngagementAdapterListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("engagementadapter", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEngagementAdapterListResponse");
		return $resultObject;
	}

	/**
	 * Update Engagement adapter details
	 * 
	 * @param int $id Engagement adapter identifier
	 * @param KalturaEngagementAdapter $engagementAdapter Engagement adapter Object
	 * @return KalturaEngagementAdapter
	 */
	function update($id, KalturaEngagementAdapter $engagementAdapter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "engagementAdapter", $engagementAdapter->toParams());
		$this->client->queueServiceActionCall("engagementadapter", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEngagementAdapter");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEngagementService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new Engagement for partner
	 * 
	 * @param KalturaEngagement $engagement Engagement adapter Object
	 * @return KalturaEngagement
	 */
	function add(KalturaEngagement $engagement)
	{
		$kparams = array();
		$this->client->addParam($kparams, "engagement", $engagement->toParams());
		$this->client->queueServiceActionCall("engagement", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEngagement");
		return $resultObject;
	}

	/**
	 * Delete engagement by engagement adapter id
	 * 
	 * @param int $id Engagement identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("engagement", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Return engagement
	 * 
	 * @param int $id Engagement identifier
	 * @return KalturaEngagement
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("engagement", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEngagement");
		return $resultObject;
	}

	/**
	 * Returns all Engagement for partner
	 * 
	 * @param KalturaEngagementFilter $filter Filter
	 * @return KalturaEngagementListResponse
	 */
	function listAction(KalturaEngagementFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("engagement", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEngagementListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaEntitlementService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Immediately cancel a subscription, PPV or collection. Cancel is possible only if within cancellation window and content not already consumed
	 * 
	 * @param int $assetId The mediaFileID to cancel
	 * @param string $productType The product type for the cancelation
	 * @return bool
	 */
	function cancel($assetId, $productType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "productType", $productType);
		$this->client->queueServiceActionCall("entitlement", "cancel", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Cancel a household service subscription at the next renewal. The subscription stays valid till the next renewal.
	 * 
	 * @param string $subscriptionId Subscription Code
	 */
	function cancelRenewal($subscriptionId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "subscriptionId", $subscriptionId);
		$this->client->queueServiceActionCall("entitlement", "cancelRenewal", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Cancel Scheduled Subscription
	 * 
	 * @param bigint $scheduledSubscriptionId Scheduled Subscription Identifier
	 * @return bool
	 */
	function cancelScheduledSubscription($scheduledSubscriptionId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "scheduledSubscriptionId", $scheduledSubscriptionId);
		$this->client->queueServiceActionCall("entitlement", "cancelScheduledSubscription", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Reconcile the user household&#39;s entitlements with an external entitlements source. This request is frequency protected to avoid too frequent calls per household.
	 * 
	 * @return bool
	 */
	function externalReconcile()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("entitlement", "externalReconcile", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Immediately cancel a subscription, PPV or collection. Cancel applies regardless of cancellation window and content consumption status
	 * 
	 * @param int $assetId The mediaFileID to cancel
	 * @param string $productType The product type for the cancelation
	 * @return bool
	 */
	function forceCancel($assetId, $productType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "productType", $productType);
		$this->client->queueServiceActionCall("entitlement", "forceCancel", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns the data about the next renewal
	 * 
	 * @param int $id Purchase Id
	 * @return KalturaEntitlementRenewal
	 */
	function getNextRenewal($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("entitlement", "getNextRenewal", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntitlementRenewal");
		return $resultObject;
	}

	/**
	 * Grant household for an entitlement for a PPV or Subscription.
	 * 
	 * @param int $productId Identifier for the product package from which this content is offered
	 * @param string $productType Product package type. Possible values: PPV, Subscription, Collection
	 * @param bool $history Controls if the new entitlements grant will appear in the user’s history. True – will add a history entry. False (or if ommited) – no history entry will be added
	 * @param int $contentId Identifier for the content. Relevant only if Product type = PPV
	 * @return bool
	 */
	function grant($productId, $productType, $history, $contentId = 0)
	{
		$kparams = array();
		$this->client->addParam($kparams, "productId", $productId);
		$this->client->addParam($kparams, "productType", $productType);
		$this->client->addParam($kparams, "history", $history);
		$this->client->addParam($kparams, "contentId", $contentId);
		$this->client->queueServiceActionCall("entitlement", "grant", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Gets all the entitled media items for a household
	 * 
	 * @param KalturaEntitlementFilter $filter Request filter
	 * @param KalturaFilterPager $pager Request pager
	 * @return KalturaEntitlementListResponse
	 */
	function listAction(KalturaEntitlementFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("entitlement", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntitlementListResponse");
		return $resultObject;
	}

	/**
	 * Swap current entitlement (subscription) with new entitlement (subscription) - only Grant
	 * 
	 * @param int $currentProductId Identifier for the current product package
	 * @param int $newProductId Identifier for the new product package
	 * @param bool $history Controls if the new entitlements swap will appear in the user’s history. True – will add a history entry. False (or if ommited) – no history entry will be added
	 * @return bool
	 */
	function swap($currentProductId, $newProductId, $history)
	{
		$kparams = array();
		$this->client->addParam($kparams, "currentProductId", $currentProductId);
		$this->client->addParam($kparams, "newProductId", $newProductId);
		$this->client->addParam($kparams, "history", $history);
		$this->client->queueServiceActionCall("entitlement", "swap", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Update Kaltura Entitelment by Purchase id
	 * 
	 * @param int $id Purchase Id
	 * @param KalturaEntitlement $entitlement KalturaEntitlement object
	 * @return KalturaEntitlement
	 */
	function update($id, KalturaEntitlement $entitlement)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "entitlement", $entitlement->toParams());
		$this->client->queueServiceActionCall("entitlement", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaEntitlement");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaExportTaskService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a new bulk export task
	 * 
	 * @param KalturaExportTask $task The task model to add
	 * @return KalturaExportTask
	 */
	function add(KalturaExportTask $task)
	{
		$kparams = array();
		$this->client->addParam($kparams, "task", $task->toParams());
		$this->client->queueServiceActionCall("exporttask", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaExportTask");
		return $resultObject;
	}

	/**
	 * Deletes an existing bulk export task by task identifier
	 * 
	 * @param bigint $id The identifier of the task to delete
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("exporttask", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Gets an existing bulk export task by task identifier
	 * 
	 * @param bigint $id The identifier of the task to get
	 * @return KalturaExportTask
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("exporttask", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaExportTask");
		return $resultObject;
	}

	/**
	 * Returns bulk export tasks by tasks identifiers
	 * 
	 * @param KalturaExportTaskFilter $filter Bulk export tasks filter
	 * @return KalturaExportTaskListResponse
	 */
	function listAction(KalturaExportTaskFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("exporttask", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaExportTaskListResponse");
		return $resultObject;
	}

	/**
	 * Updates an existing bulk export task by task identifier
	 * 
	 * @param bigint $id The task id to update
	 * @param KalturaExportTask $task The task model to update
	 * @return KalturaExportTask
	 */
	function update($id, KalturaExportTask $task)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "task", $task->toParams());
		$this->client->queueServiceActionCall("exporttask", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaExportTask");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaExternalChannelProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new External channel for partner
	 * 
	 * @param KalturaExternalChannelProfile $externalChannel External channel Object
	 * @return KalturaExternalChannelProfile
	 */
	function add(KalturaExternalChannelProfile $externalChannel)
	{
		$kparams = array();
		$this->client->addParam($kparams, "externalChannel", $externalChannel->toParams());
		$this->client->queueServiceActionCall("externalchannelprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaExternalChannelProfile");
		return $resultObject;
	}

	/**
	 * Delete External channel by External channel id
	 * 
	 * @param int $externalChannelId External channel identifier
	 * @return bool
	 */
	function delete($externalChannelId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "externalChannelId", $externalChannelId);
		$this->client->queueServiceActionCall("externalchannelprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns all External channels for partner
	 * 
	 * @return KalturaExternalChannelProfileListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("externalchannelprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaExternalChannelProfileListResponse");
		return $resultObject;
	}

	/**
	 * Update External channel details
	 * 
	 * @param int $externalChannelId External channel identifier
	 * @param KalturaExternalChannelProfile $externalChannel External channel Object
	 * @return KalturaExternalChannelProfile
	 */
	function update($externalChannelId, KalturaExternalChannelProfile $externalChannel)
	{
		$kparams = array();
		$this->client->addParam($kparams, "externalChannelId", $externalChannelId);
		$this->client->addParam($kparams, "externalChannel", $externalChannel->toParams());
		$this->client->queueServiceActionCall("externalchannelprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaExternalChannelProfile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFavoriteService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add media to user&#39;s favorite list
	 * 
	 * @param KalturaFavorite $favorite Favorite details.
	 * @return KalturaFavorite
	 */
	function add(KalturaFavorite $favorite)
	{
		$kparams = array();
		$this->client->addParam($kparams, "favorite", $favorite->toParams());
		$this->client->queueServiceActionCall("favorite", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaFavorite");
		return $resultObject;
	}

	/**
	 * Remove media from user&#39;s favorite list
	 * 
	 * @param int $id Media identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("favorite", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Retrieving users&#39; favorites
	 * 
	 * @param KalturaFavoriteFilter $filter Request filter
	 * @return KalturaFavoriteListResponse
	 */
	function listAction(KalturaFavoriteFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("favorite", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaFavoriteListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaFollowTvSeriesService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a user&#39;s tv series follow.
            Possible status codes: UserAlreadyFollowing = 8013, NotFound = 500007, InvalidAssetId = 4024
	 * 
	 * @param KalturaFollowTvSeries $followTvSeries Follow series request parameters
	 * @return KalturaFollowTvSeries
	 */
	function add(KalturaFollowTvSeries $followTvSeries)
	{
		$kparams = array();
		$this->client->addParam($kparams, "followTvSeries", $followTvSeries->toParams());
		$this->client->queueServiceActionCall("followtvseries", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaFollowTvSeries");
		return $resultObject;
	}

	/**
	 * Delete a user&#39;s tv series follow.
            Possible status codes: UserNotFollowing = 8012, NotFound = 500007, InvalidAssetId = 4024, AnnouncementNotFound = 8006
	 * 
	 * @param int $assetId Asset identifier
	 * @return bool
	 */
	function delete($assetId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->queueServiceActionCall("followtvseries", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Delete a user&#39;s tv series follow.
	 * 
	 * @param int $assetId Asset identifier
	 * @param string $token User's token identifier
	 * @param int $partnerId Partner identifier
	 */
	function deleteWithToken($assetId, $token, $partnerId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "token", $token);
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->queueServiceActionCall("followtvseries", "deleteWithToken", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * List user&#39;s tv series follows.
            Possible status codes:
	 * 
	 * @param KalturaFollowTvSeriesFilter $filter Follow TV series filter
	 * @param KalturaFilterPager $pager Pager
	 * @return KalturaFollowTvSeriesListResponse
	 */
	function listAction(KalturaFollowTvSeriesFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("followtvseries", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaFollowTvSeriesListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHomeNetworkService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new home network to a household
	 * 
	 * @param KalturaHomeNetwork $homeNetwork Home network to add
	 * @return KalturaHomeNetwork
	 */
	function add(KalturaHomeNetwork $homeNetwork)
	{
		$kparams = array();
		$this->client->addParam($kparams, "homeNetwork", $homeNetwork->toParams());
		$this->client->queueServiceActionCall("homenetwork", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHomeNetwork");
		return $resultObject;
	}

	/**
	 * Delete household’s existing home network
	 * 
	 * @param string $externalId The network to update
	 * @return bool
	 */
	function delete($externalId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "externalId", $externalId);
		$this->client->queueServiceActionCall("homenetwork", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Retrieve the household’s home networks
	 * 
	 * @return KalturaHomeNetworkListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("homenetwork", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHomeNetworkListResponse");
		return $resultObject;
	}

	/**
	 * Update and existing home network for a household
	 * 
	 * @param string $externalId Home network identifier
	 * @param KalturaHomeNetwork $homeNetwork Home network to update
	 * @return KalturaHomeNetwork
	 */
	function update($externalId, KalturaHomeNetwork $homeNetwork)
	{
		$kparams = array();
		$this->client->addParam($kparams, "externalId", $externalId);
		$this->client->addParam($kparams, "homeNetwork", $homeNetwork->toParams());
		$this->client->queueServiceActionCall("homenetwork", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHomeNetwork");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Creates a household for the user
	 * 
	 * @param KalturaHousehold $household Household object
	 * @return KalturaHousehold
	 */
	function add(KalturaHousehold $household)
	{
		$kparams = array();
		$this->client->addParam($kparams, "household", $household->toParams());
		$this->client->queueServiceActionCall("household", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHousehold");
		return $resultObject;
	}

	/**
	 * Fully delete a household. Delete all of the household information, including users, devices, entitlements, payment methods and notification date.
	 * 
	 * @param int $id Household identifier
	 * @return bool
	 */
	function delete($id = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("household", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns the household model
	 * 
	 * @param int $id Household identifier
	 * @return KalturaHousehold
	 */
	function get($id = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("household", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHousehold");
		return $resultObject;
	}

	/**
	 * Purge a household. Delete all of the household information, including users, devices, entitlements, payment methods and notification date.
	 * 
	 * @param int $id Household identifier
	 * @return bool
	 */
	function purge($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("household", "purge", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Reset a household’s time limitation for removing user or device
	 * 
	 * @param string $frequencyType Possible values: devices – reset the device change frequency. 
            users – reset the user add/remove frequency
	 * @return KalturaHousehold
	 */
	function resetFrequency($frequencyType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "frequencyType", $frequencyType);
		$this->client->queueServiceActionCall("household", "resetFrequency", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHousehold");
		return $resultObject;
	}

	/**
	 * Resumed a given household service to its previous service settings
	 * 
	 * @return bool
	 */
	function resume()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("household", "resume", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Suspend a given household service. Sets the household status to “suspended&quot;.The household service settings are maintained for later resume
	 * 
	 * @param int $roleId RoleId
	 * @return bool
	 */
	function suspend($roleId = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "roleId", $roleId);
		$this->client->queueServiceActionCall("household", "suspend", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Update the household name and description
	 * 
	 * @param KalturaHousehold $household Household object
	 * @return KalturaHousehold
	 */
	function update(KalturaHousehold $household)
	{
		$kparams = array();
		$this->client->addParam($kparams, "household", $household->toParams());
		$this->client->queueServiceActionCall("household", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHousehold");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdDeviceService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add device to household
	 * 
	 * @param KalturaHouseholdDevice $device Device
	 * @return KalturaHouseholdDevice
	 */
	function add(KalturaHouseholdDevice $device)
	{
		$kparams = array();
		$this->client->addParam($kparams, "device", $device->toParams());
		$this->client->queueServiceActionCall("householddevice", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdDevice");
		return $resultObject;
	}

	/**
	 * Registers a device to a household using pin code
	 * 
	 * @param string $deviceName Device name
	 * @param string $pin Pin code
	 * @return KalturaHouseholdDevice
	 */
	function addByPin($deviceName, $pin)
	{
		$kparams = array();
		$this->client->addParam($kparams, "deviceName", $deviceName);
		$this->client->addParam($kparams, "pin", $pin);
		$this->client->queueServiceActionCall("householddevice", "addByPin", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdDevice");
		return $resultObject;
	}

	/**
	 * Removes a device from household
	 * 
	 * @param string $udid Device UDID
	 * @return bool
	 */
	function delete($udid)
	{
		$kparams = array();
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->queueServiceActionCall("householddevice", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Generates device pin to use when adding a device to household by pin
	 * 
	 * @param string $udid Device UDID
	 * @param int $brandId Device brand identifier
	 * @return KalturaDevicePin
	 */
	function generatePin($udid, $brandId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->addParam($kparams, "brandId", $brandId);
		$this->client->queueServiceActionCall("householddevice", "generatePin", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaDevicePin");
		return $resultObject;
	}

	/**
	 * Returns device registration status to the supplied household
	 * 
	 * @return KalturaHouseholdDevice
	 */
	function get()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("householddevice", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdDevice");
		return $resultObject;
	}

	/**
	 * Returns the devices within the household
	 * 
	 * @param KalturaHouseholdDeviceFilter $filter Household devices filter
	 * @return KalturaHouseholdDeviceListResponse
	 */
	function listAction(KalturaHouseholdDeviceFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("householddevice", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdDeviceListResponse");
		return $resultObject;
	}

	/**
	 * User sign-in via a time-expired sign-in PIN.
	 * 
	 * @param int $partnerId Partner Identifier
	 * @param string $pin Pin code
	 * @param string $udid Device UDID
	 * @return KalturaLoginResponse
	 */
	function loginWithPin($partnerId, $pin, $udid = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "pin", $pin);
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->queueServiceActionCall("householddevice", "loginWithPin", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLoginResponse");
		return $resultObject;
	}

	/**
	 * Update the name of the device by UDID
	 * 
	 * @param string $udid Device UDID
	 * @param KalturaHouseholdDevice $device Device object
	 * @return KalturaHouseholdDevice
	 */
	function update($udid, KalturaHouseholdDevice $device)
	{
		$kparams = array();
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->addParam($kparams, "device", $device->toParams());
		$this->client->queueServiceActionCall("householddevice", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdDevice");
		return $resultObject;
	}

	/**
	 * Update the name of the device by UDID
	 * 
	 * @param string $udid Device UDID
	 * @param string $status Device status
	 * @return bool
	 */
	function updateStatus($udid, $status)
	{
		$kparams = array();
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->addParam($kparams, "status", $status);
		$this->client->queueServiceActionCall("householddevice", "updateStatus", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdLimitationsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get the limitation module by id
	 * 
	 * @param int $id Household limitations module identifier
	 * @return KalturaHouseholdLimitations
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("householdlimitations", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdLimitations");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdPaymentGatewayService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Disable payment-gateway on the household
	 * 
	 * @param int $paymentGatewayId Payment Gateway Identifier
	 * @return bool
	 */
	function disable($paymentGatewayId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->queueServiceActionCall("householdpaymentgateway", "disable", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Enable a payment-gateway provider for the household.
	 * 
	 * @param int $paymentGatewayId Payment Gateway Identifier
	 * @return bool
	 */
	function enable($paymentGatewayId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->queueServiceActionCall("householdpaymentgateway", "enable", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get a household’s billing account identifier (charge ID) for a given payment gateway
	 * 
	 * @param string $paymentGatewayExternalId External identifier for the payment gateway
	 * @return string
	 */
	function getChargeID($paymentGatewayExternalId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayExternalId", $paymentGatewayExternalId);
		$this->client->queueServiceActionCall("householdpaymentgateway", "getChargeID", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * Gets the Payment Gateway Configuration for the payment gateway identifier given
	 * 
	 * @param int $paymentGatewayId The payemnt gateway for which to return the registration URL/s for the household. If omitted – return the regisration URL for the household for the default payment gateway
	 * @param string $intent Represent the client’s intent for working with the payment gateway. Intent options to be coordinated with the applicable payment gateway adapter.
	 * @param array $extraParameters Additional parameters to send to the payment gateway adapter.
	 * @return KalturaPaymentGatewayConfiguration
	 */
	function invoke($paymentGatewayId, $intent, array $extraParameters)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->addParam($kparams, "intent", $intent);
		foreach($extraParameters as $index => $obj)
		{
			$this->client->addParam($kparams, "extraParameters:$index", $obj->toParams());
		}
		$this->client->queueServiceActionCall("householdpaymentgateway", "invoke", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPaymentGatewayConfiguration");
		return $resultObject;
	}

	/**
	 * Get a list of all configured Payment Gateways providers available for the account. For each payment is provided with the household associated payment methods.
	 * 
	 * @return KalturaHouseholdPaymentGatewayListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("householdpaymentgateway", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdPaymentGatewayListResponse");
		return $resultObject;
	}

	/**
	 * Resumes all the entitlements of the given payment gateway
	 * 
	 * @param int $paymentGatewayId Payment gateway ID
	 */
	function resume($paymentGatewayId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->queueServiceActionCall("householdpaymentgateway", "resume", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Set user billing account identifier (charge ID), for a specific household and a specific payment gateway
	 * 
	 * @param string $paymentGatewayExternalId External identifier for the payment gateway
	 * @param string $chargeId The billing user account identifier for this household at the given payment gateway
	 * @return bool
	 */
	function setChargeID($paymentGatewayExternalId, $chargeId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayExternalId", $paymentGatewayExternalId);
		$this->client->addParam($kparams, "chargeId", $chargeId);
		$this->client->queueServiceActionCall("householdpaymentgateway", "setChargeID", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Suspends all the entitlements of the given payment gateway
	 * 
	 * @param int $paymentGatewayId Payment gateway ID
	 */
	function suspend($paymentGatewayId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->queueServiceActionCall("householdpaymentgateway", "suspend", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdPaymentMethodService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new payment method for household
	 * 
	 * @param KalturaHouseholdPaymentMethod $householdPaymentMethod Household payment method
	 * @return KalturaHouseholdPaymentMethod
	 */
	function add(KalturaHouseholdPaymentMethod $householdPaymentMethod)
	{
		$kparams = array();
		$this->client->addParam($kparams, "householdPaymentMethod", $householdPaymentMethod->toParams());
		$this->client->queueServiceActionCall("householdpaymentmethod", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdPaymentMethod");
		return $resultObject;
	}

	/**
	 * Force remove of a payment method of the household.
	 * 
	 * @param int $paymentGatewayId Payment Gateway Identifier
	 * @param int $paymentMethodId Payment method Identifier
	 * @return bool
	 */
	function forceRemove($paymentGatewayId, $paymentMethodId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->addParam($kparams, "paymentMethodId", $paymentMethodId);
		$this->client->queueServiceActionCall("householdpaymentmethod", "forceRemove", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get a list of all payment methods of the household.
	 * 
	 * @return KalturaHouseholdPaymentMethodListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("householdpaymentmethod", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdPaymentMethodListResponse");
		return $resultObject;
	}

	/**
	 * Removes a payment method of the household.
	 * 
	 * @param int $paymentGatewayId Payment Gateway Identifier
	 * @param int $paymentMethodId Payment method Identifier
	 * @return bool
	 */
	function remove($paymentGatewayId, $paymentMethodId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->addParam($kparams, "paymentMethodId", $paymentMethodId);
		$this->client->queueServiceActionCall("householdpaymentmethod", "remove", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Set a payment method as default for the household.
	 * 
	 * @param int $paymentGatewayId Payment Gateway Identifier
	 * @param int $paymentMethodId Payment method Identifier
	 * @return bool
	 */
	function setAsDefault($paymentGatewayId, $paymentMethodId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->addParam($kparams, "paymentMethodId", $paymentMethodId);
		$this->client->queueServiceActionCall("householdpaymentmethod", "setAsDefault", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdPremiumServiceService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns all the premium services allowed for the household
	 * 
	 * @return KalturaHouseholdPremiumServiceListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("householdpremiumservice", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdPremiumServiceListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdQuotaService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns the household&#39;s quota data
	 * 
	 * @return KalturaHouseholdQuota
	 */
	function get()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("householdquota", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdQuota");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaHouseholdUserService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a user to household
	 * 
	 * @param KalturaHouseholdUser $householdUser User details to add
	 * @return KalturaHouseholdUser
	 */
	function add(KalturaHouseholdUser $householdUser)
	{
		$kparams = array();
		$this->client->addParam($kparams, "householdUser", $householdUser->toParams());
		$this->client->queueServiceActionCall("householduser", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdUser");
		return $resultObject;
	}

	/**
	 * Removes a user from household
	 * 
	 * @param string $id The identifier of the user to delete
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("householduser", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns the users within the household
	 * 
	 * @param KalturaHouseholdUserFilter $filter Household user filter
	 * @return KalturaHouseholdUserListResponse
	 */
	function listAction(KalturaHouseholdUserFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("householduser", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaHouseholdUserListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaInboxMessageService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * TBD
	 * 
	 * @param string $id Message id
	 * @return KalturaInboxMessage
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("inboxmessage", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaInboxMessage");
		return $resultObject;
	}

	/**
	 * List inbox messages
	 * 
	 * @param KalturaInboxMessageFilter $filter Filter
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaInboxMessageListResponse
	 */
	function listAction(KalturaInboxMessageFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("inboxmessage", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaInboxMessageListResponse");
		return $resultObject;
	}

	/**
	 * Updates the message status.
	 * 
	 * @param string $id Message identifier
	 * @param string $status Message status
	 * @return bool
	 */
	function updateStatus($id, $status)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "status", $status);
		$this->client->queueServiceActionCall("inboxmessage", "updateStatus", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLanguageService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get the list of languages for the partner with option to filter by language codes
	 * 
	 * @param KalturaLanguageFilter $filter Language filter
	 * @return KalturaLanguageListResponse
	 */
	function listAction(KalturaLanguageFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("language", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLanguageListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaLicensedUrlService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get the URL for playing an asset - program, media or recording
	 * 
	 * @param KalturaLicensedUrlBaseRequest $request Licensed URL request parameters
	 * @return KalturaLicensedUrl
	 */
	function get(KalturaLicensedUrlBaseRequest $request)
	{
		$kparams = array();
		$this->client->addParam($kparams, "request", $request->toParams());
		$this->client->queueServiceActionCall("licensedurl", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLicensedUrl");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMessageTemplateService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve a message template used in push notifications and inbox
	 * 
	 * @param string $messageType Possible values: Asset type – Series, Reminder,Churn
	 * @return KalturaMessageTemplate
	 */
	function get($messageType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "messageType", $messageType);
		$this->client->queueServiceActionCall("messagetemplate", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMessageTemplate");
		return $resultObject;
	}

	/**
	 * Set the account’s push notifications and inbox messages templates
	 * 
	 * @param string $messageType The asset type to update its template
	 * @param KalturaMessageTemplate $template The actual message with placeholders to be presented to the user
	 * @return KalturaMessageTemplate
	 */
	function update($messageType, KalturaMessageTemplate $template)
	{
		$kparams = array();
		$this->client->addParam($kparams, "messageType", $messageType);
		$this->client->addParam($kparams, "template", $template->toParams());
		$this->client->queueServiceActionCall("messagetemplate", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMessageTemplate");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaMetaService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get the list of meta mappings for the partner
	 * 
	 * @param KalturaMetaFilter $filter Meta filter
	 * @return KalturaMetaListResponse
	 */
	function listAction(KalturaMetaFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("meta", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMetaListResponse");
		return $resultObject;
	}

	/**
	 * Update meta&#39;s user interest
	 * 
	 * @param string $id Meta identifier
	 * @param KalturaMeta $meta Meta
	 * @return KalturaMeta
	 */
	function update($id, KalturaMeta $meta)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "meta", $meta->toParams());
		$this->client->queueServiceActionCall("meta", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaMeta");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaNotificationService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * TBD
	 * 
	 * @param string $identifier In case type is "announcement", identifier should be the announcement ID. In case type is "system", identifier should be "login" (the login topic)
	 * @param string $type "announcement" - TV-Series topic, "system" - login topic
	 * @return KalturaRegistryResponse
	 */
	function register($identifier, $type)
	{
		$kparams = array();
		$this->client->addParam($kparams, "identifier", $identifier);
		$this->client->addParam($kparams, "type", $type);
		$this->client->queueServiceActionCall("notification", "register", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRegistryResponse");
		return $resultObject;
	}

	/**
	 * Sends push notification to user devices
	 * 
	 * @param int $userId User identifications
	 * @param KalturaPushMessage $pushMessage Message push data
	 * @return bool
	 */
	function sendPush($userId, KalturaPushMessage $pushMessage)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userId", $userId);
		$this->client->addParam($kparams, "pushMessage", $pushMessage->toParams());
		$this->client->queueServiceActionCall("notification", "sendPush", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Sends SMS notification to user
	 * 
	 * @param string $message Message to send
	 * @return bool
	 */
	function sendSms($message)
	{
		$kparams = array();
		$this->client->addParam($kparams, "message", $message);
		$this->client->queueServiceActionCall("notification", "sendSms", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Registers the device push token to the push service
	 * 
	 * @param string $pushToken The device-application pair authentication for push delivery
	 * @return bool
	 */
	function setDevicePushToken($pushToken)
	{
		$kparams = array();
		$this->client->addParam($kparams, "pushToken", $pushToken);
		$this->client->queueServiceActionCall("notification", "setDevicePushToken", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaNotificationsPartnerSettingsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve the partner notification settings.
	 * 
	 * @return KalturaNotificationsPartnerSettings
	 */
	function get()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("notificationspartnersettings", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaNotificationsPartnerSettings");
		return $resultObject;
	}

	/**
	 * Update the account notification settings
	 * 
	 * @param KalturaNotificationsPartnerSettings $settings Account notification settings model
	 * @return bool
	 */
	function update(KalturaNotificationsPartnerSettings $settings)
	{
		$kparams = array();
		$this->client->addParam($kparams, "settings", $settings->toParams());
		$this->client->queueServiceActionCall("notificationspartnersettings", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaNotificationsSettingsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve the user’s notification settings.
	 * 
	 * @return KalturaNotificationsSettings
	 */
	function get()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("notificationssettings", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaNotificationsSettings");
		return $resultObject;
	}

	/**
	 * Update the user’s notification settings.
	 * 
	 * @param KalturaNotificationsSettings $settings Notifications settings
	 * @return bool
	 */
	function update(KalturaNotificationsSettings $settings)
	{
		$kparams = array();
		$this->client->addParam($kparams, "settings", $settings->toParams());
		$this->client->queueServiceActionCall("notificationssettings", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Update the user’s notification settings.
	 * 
	 * @param KalturaNotificationsSettings $settings Notifications settings
	 * @param string $token User's token identifier
	 * @param int $partnerId Partner identifier
	 * @return bool
	 */
	function updateWithToken(KalturaNotificationsSettings $settings, $token, $partnerId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "settings", $settings->toParams());
		$this->client->addParam($kparams, "token", $token);
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->queueServiceActionCall("notificationssettings", "updateWithToken", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOssAdapterProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new OSS adapter for partner
	 * 
	 * @param KalturaOSSAdapterProfile $ossAdapter OSS adapter Object
	 * @return KalturaOSSAdapterProfile
	 */
	function add(KalturaOSSAdapterProfile $ossAdapter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ossAdapter", $ossAdapter->toParams());
		$this->client->queueServiceActionCall("ossadapterprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOSSAdapterProfile");
		return $resultObject;
	}

	/**
	 * Delete OSS adapter by OSS adapter id
	 * 
	 * @param int $ossAdapterId OSS adapter identifier
	 * @return bool
	 */
	function delete($ossAdapterId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ossAdapterId", $ossAdapterId);
		$this->client->queueServiceActionCall("ossadapterprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Generate oss adapter shared secret
	 * 
	 * @param int $ossAdapterId OSS adapter identifier
	 * @return KalturaOSSAdapterProfile
	 */
	function generateSharedSecret($ossAdapterId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ossAdapterId", $ossAdapterId);
		$this->client->queueServiceActionCall("ossadapterprofile", "generateSharedSecret", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOSSAdapterProfile");
		return $resultObject;
	}

	/**
	 * Returns all OSS adapters for partner : id + name
	 * 
	 * @param int $id OSS adapter identifier
	 * @return KalturaOSSAdapterProfile
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("ossadapterprofile", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOSSAdapterProfile");
		return $resultObject;
	}

	/**
	 * Returns all OSS adapters for partner : id + name
	 * 
	 * @return KalturaOSSAdapterProfileListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("ossadapterprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOSSAdapterProfileListResponse");
		return $resultObject;
	}

	/**
	 * Update OSS adapter details
	 * 
	 * @param int $ossAdapterId OSS adapter identifier
	 * @param KalturaOSSAdapterProfile $ossAdapter OSS adapter Object
	 * @return KalturaOSSAdapterProfile
	 */
	function update($ossAdapterId, KalturaOSSAdapterProfile $ossAdapter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ossAdapterId", $ossAdapterId);
		$this->client->addParam($kparams, "ossAdapter", $ossAdapter->toParams());
		$this->client->queueServiceActionCall("ossadapterprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOSSAdapterProfile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOttCategoryService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve the list of categories (hierarchical) and their associated channels
	 * 
	 * @param int $id Category Identifier
	 * @return KalturaOTTCategory
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("ottcategory", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOTTCategory");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaOttUserService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Activate the account by activation token
	 * 
	 * @param int $partnerId The partner ID
	 * @param string $username Username of the user to activate
	 * @param string $activationToken Activation token of the user
	 * @return KalturaOTTUser
	 */
	function activate($partnerId, $username, $activationToken)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "username", $username);
		$this->client->addParam($kparams, "activationToken", $activationToken);
		$this->client->queueServiceActionCall("ottuser", "activate", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOTTUser");
		return $resultObject;
	}

	/**
	 * Edit user details.
	 * 
	 * @param bigint $roleId The role identifier to add
	 * @return bool
	 */
	function addRole($roleId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "roleId", $roleId);
		$this->client->queueServiceActionCall("ottuser", "addRole", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Returns tokens (KS and refresh token) for anonymous access
	 * 
	 * @param int $partnerId The partner ID
	 * @param string $udid The caller device's UDID
	 * @return KalturaLoginSession
	 */
	function anonymousLogin($partnerId, $udid = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->queueServiceActionCall("ottuser", "anonymousLogin", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLoginSession");
		return $resultObject;
	}

	/**
	 * Permanently delete a user. User to delete cannot be an exclusive household master, and cannot be default user.
	 * 
	 * @return bool
	 */
	function delete()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("ottuser", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Retrieving users&#39; data
	 * 
	 * @return KalturaOTTUser
	 */
	function get()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("ottuser", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOTTUser");
		return $resultObject;
	}

	/**
	 * Returns the identifier of the user encrypted with SHA1 using configured key
	 * 
	 * @return KalturaStringValue
	 */
	function getEncryptedUserId()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("ottuser", "getEncryptedUserId", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaStringValue");
		return $resultObject;
	}

	/**
	 * Retrieve user by external identifier or username or if filter is null all user in the master or the user itself
	 * 
	 * @param KalturaOTTUserFilter $filter Filter request
	 * @return KalturaOTTUserListResponse
	 */
	function listAction(KalturaOTTUserFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("ottuser", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOTTUserListResponse");
		return $resultObject;
	}

	/**
	 * Login with user name and password.
	 * 
	 * @param int $partnerId Partner Identifier
	 * @param string $username User name
	 * @param string $password Password
	 * @param map $extraParams Extra params
	 * @param string $udid Device UDID
	 * @return KalturaLoginResponse
	 */
	function login($partnerId, $username = null, $password = null, array $extraParams = null, $udid = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "username", $username);
		$this->client->addParam($kparams, "password", $password);
		if ($extraParams !== null)
			$this->client->addParam($kparams, "extraParams", $extraParams->toParams());
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->queueServiceActionCall("ottuser", "login", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLoginResponse");
		return $resultObject;
	}

	/**
	 * User sign-in via a time-expired sign-in PIN.
	 * 
	 * @param int $partnerId Partner Identifier
	 * @param string $pin Pin code
	 * @param string $udid Device UDID
	 * @param string $secret Additional security parameter to validate the login
	 * @return KalturaLoginResponse
	 */
	function loginWithPin($partnerId, $pin, $udid = null, $secret = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "pin", $pin);
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->addParam($kparams, "secret", $secret);
		$this->client->queueServiceActionCall("ottuser", "loginWithPin", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLoginResponse");
		return $resultObject;
	}

	/**
	 * Logout the calling user.
	 * 
	 * @return bool
	 */
	function logout()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("ottuser", "logout", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Sign up a new user.
	 * 
	 * @param int $partnerId Partner identifier
	 * @param KalturaOTTUser $user The user model to add
	 * @param string $password Password
	 * @return KalturaOTTUser
	 */
	function register($partnerId, KalturaOTTUser $user, $password)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "user", $user->toParams());
		$this->client->addParam($kparams, "password", $password);
		$this->client->queueServiceActionCall("ottuser", "register", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOTTUser");
		return $resultObject;
	}

	/**
	 * Resend the activation token to a user
	 * 
	 * @param int $partnerId The partner ID
	 * @param string $username Username of the user to activate
	 * @return bool
	 */
	function resendActivationToken($partnerId, $username)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "username", $username);
		$this->client->queueServiceActionCall("ottuser", "resendActivationToken", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Send an e-mail with URL to enable the user to set new password.
	 * 
	 * @param int $partnerId Partner Identifier
	 * @param string $username User name
	 * @return bool
	 */
	function resetPassword($partnerId, $username)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "username", $username);
		$this->client->queueServiceActionCall("ottuser", "resetPassword", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Renew the user&#39;s password after validating the token that sent as part of URL in e-mail.
	 * 
	 * @param int $partnerId Partner Identifier
	 * @param string $token Token that sent by e-mail
	 * @param string $password New password
	 * @return KalturaOTTUser
	 */
	function setInitialPassword($partnerId, $token, $password)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "token", $token);
		$this->client->addParam($kparams, "password", $password);
		$this->client->queueServiceActionCall("ottuser", "setInitialPassword", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOTTUser");
		return $resultObject;
	}

	/**
	 * Update user information
	 * 
	 * @param KalturaOTTUser $user User data (includes basic and dynamic data)
	 * @param string $id User ID
	 * @return KalturaOTTUser
	 */
	function update(KalturaOTTUser $user, $id = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "user", $user->toParams());
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("ottuser", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOTTUser");
		return $resultObject;
	}

	/**
	 * Update user dynamic data
	 * 
	 * @param string $key Type of dynamicData
	 * @param KalturaStringValue $value Value of dynamicData
	 * @return KalturaOTTUserDynamicData
	 */
	function updateDynamicData($key, KalturaStringValue $value)
	{
		$kparams = array();
		$this->client->addParam($kparams, "key", $key);
		$this->client->addParam($kparams, "value", $value->toParams());
		$this->client->queueServiceActionCall("ottuser", "updateDynamicData", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaOTTUserDynamicData");
		return $resultObject;
	}

	/**
	 * Given a user name and existing password, change to a new password.
	 * 
	 * @param string $username User name
	 * @param string $oldPassword Old password
	 * @param string $newPassword New password
	 * @return bool
	 */
	function updateLoginData($username, $oldPassword, $newPassword)
	{
		$kparams = array();
		$this->client->addParam($kparams, "username", $username);
		$this->client->addParam($kparams, "oldPassword", $oldPassword);
		$this->client->addParam($kparams, "newPassword", $newPassword);
		$this->client->queueServiceActionCall("ottuser", "updateLoginData", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Update the user&#39;s existing password.
	 * 
	 * @param int $userId User Identifier
	 * @param string $password New password
	 */
	function updatePassword($userId, $password)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userId", $userId);
		$this->client->addParam($kparams, "password", $password);
		$this->client->queueServiceActionCall("ottuser", "updatePassword", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaParentalRuleService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Disables a parental rule that was previously defined by the household master. Disable can be at specific user or household level.
	 * 
	 * @param bigint $ruleId Rule Identifier
	 * @param string $entityReference Reference type to filter by
	 * @return bool
	 */
	function disable($ruleId, $entityReference)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ruleId", $ruleId);
		$this->client->addParam($kparams, "entityReference", $entityReference);
		$this->client->queueServiceActionCall("parentalrule", "disable", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Disables a parental rule that was defined at account level. Disable can be at specific user or household level.
	 * 
	 * @param string $entityReference Reference type to filter by
	 * @return bool
	 */
	function disableDefault($entityReference)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entityReference", $entityReference);
		$this->client->queueServiceActionCall("parentalrule", "disableDefault", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Enable a parental rules for a user
	 * 
	 * @param bigint $ruleId Rule Identifier
	 * @param string $entityReference Reference type to filter by
	 * @return bool
	 */
	function enable($ruleId, $entityReference)
	{
		$kparams = array();
		$this->client->addParam($kparams, "ruleId", $ruleId);
		$this->client->addParam($kparams, "entityReference", $entityReference);
		$this->client->queueServiceActionCall("parentalrule", "enable", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Return the parental rules that applies for the user or household. Can include rules that have been associated in account, household, or user level.
            Association level is also specified in the response.
	 * 
	 * @param KalturaParentalRuleFilter $filter Filter
	 * @return KalturaParentalRuleListResponse
	 */
	function listAction(KalturaParentalRuleFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("parentalrule", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaParentalRuleListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPartnerConfigurationService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Update Partner Configuration
	 * 
	 * @param KalturaPartnerConfiguration $configuration Partner Configuration
            possible configuration type: 
            "configuration": { "value": 0, "partner_configuration_type": { "type": "OSSAdapter", "objectType": "KalturaPartnerConfigurationHolder" },
            "objectType": "KalturaBillingPartnerConfig"}
	 * @return bool
	 */
	function update(KalturaPartnerConfiguration $configuration)
	{
		$kparams = array();
		$this->client->addParam($kparams, "configuration", $configuration->toParams());
		$this->client->queueServiceActionCall("partnerconfiguration", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPaymentGatewayProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new payment gateway for partner
	 * 
	 * @param KalturaPaymentGatewayProfile $paymentGateway Payment Gateway Object
	 * @return KalturaPaymentGatewayProfile
	 */
	function add(KalturaPaymentGatewayProfile $paymentGateway)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGateway", $paymentGateway->toParams());
		$this->client->queueServiceActionCall("paymentgatewayprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPaymentGatewayProfile");
		return $resultObject;
	}

	/**
	 * Delete payment gateway by payment gateway id
	 * 
	 * @param int $paymentGatewayId Payment Gateway Identifier
	 * @return bool
	 */
	function delete($paymentGatewayId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->queueServiceActionCall("paymentgatewayprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Generate payment gateway shared secret
	 * 
	 * @param int $paymentGatewayId Payment gateway identifier
	 * @return KalturaPaymentGatewayProfile
	 */
	function generateSharedSecret($paymentGatewayId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->queueServiceActionCall("paymentgatewayprofile", "generateSharedSecret", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPaymentGatewayProfile");
		return $resultObject;
	}

	/**
	 * Gets the Payment Gateway Configuration for the payment gateway identifier given
	 * 
	 * @param string $alias The payemnt gateway for which to return the registration URL/s for the household. If omitted – return the regisration URL for the household for the default payment gateway
	 * @param string $intent Represent the client’s intent for working with the payment gateway. Intent options to be coordinated with the applicable payment gateway adapter.
	 * @param array $extraParameters Additional parameters to send to the payment gateway adapter.
	 * @return KalturaPaymentGatewayConfiguration
	 */
	function getConfiguration($alias, $intent, array $extraParameters)
	{
		$kparams = array();
		$this->client->addParam($kparams, "alias", $alias);
		$this->client->addParam($kparams, "intent", $intent);
		foreach($extraParameters as $index => $obj)
		{
			$this->client->addParam($kparams, "extraParameters:$index", $obj->toParams());
		}
		$this->client->queueServiceActionCall("paymentgatewayprofile", "getConfiguration", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPaymentGatewayConfiguration");
		return $resultObject;
	}

	/**
	 * Returns all payment gateways for partner : id + name
	 * 
	 * @return KalturaPaymentGatewayProfileListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("paymentgatewayprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPaymentGatewayProfileListResponse");
		return $resultObject;
	}

	/**
	 * Update payment gateway details
	 * 
	 * @param int $paymentGatewayId Payment Gateway Identifier
	 * @param KalturaPaymentGatewayProfile $paymentGateway Payment Gateway Object
	 * @return KalturaPaymentGatewayProfile
	 */
	function update($paymentGatewayId, KalturaPaymentGatewayProfile $paymentGateway)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->addParam($kparams, "paymentGateway", $paymentGateway->toParams());
		$this->client->queueServiceActionCall("paymentgatewayprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPaymentGatewayProfile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPaymentMethodProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * TBD
	 * 
	 * @param KalturaPaymentMethodProfile $paymentMethod Payment method to add
	 * @return KalturaPaymentMethodProfile
	 */
	function add(KalturaPaymentMethodProfile $paymentMethod)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentMethod", $paymentMethod->toParams());
		$this->client->queueServiceActionCall("paymentmethodprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPaymentMethodProfile");
		return $resultObject;
	}

	/**
	 * Delete payment method profile
	 * 
	 * @param int $paymentMethodId Payment method identifier to delete
	 * @return bool
	 */
	function delete($paymentMethodId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentMethodId", $paymentMethodId);
		$this->client->queueServiceActionCall("paymentmethodprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * TBD
	 * 
	 * @param KalturaPaymentMethodProfileFilter $filter Payment gateway method profile filter
	 * @return KalturaPaymentMethodProfileListResponse
	 */
	function listAction(KalturaPaymentMethodProfileFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("paymentmethodprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPaymentMethodProfileListResponse");
		return $resultObject;
	}

	/**
	 * Update payment method
	 * 
	 * @param int $paymentMethodId Payment method identifier to update
	 * @param KalturaPaymentMethodProfile $paymentMethod Payment method to update
	 * @return KalturaPaymentMethodProfile
	 */
	function update($paymentMethodId, KalturaPaymentMethodProfile $paymentMethod)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentMethodId", $paymentMethodId);
		$this->client->addParam($kparams, "paymentMethod", $paymentMethod->toParams());
		$this->client->queueServiceActionCall("paymentmethodprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPaymentMethodProfile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPersonalFeedService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * List user&#39;s feeds.
            Possible status codes:
	 * 
	 * @param KalturaPersonalFeedFilter $filter Required sort option to apply for the identified assets. If omitted – will use relevancy.
            Possible values: relevancy, a_to_z, z_to_a, views, ratings, votes, newest.
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaPersonalFeedListResponse
	 */
	function listAction(KalturaPersonalFeedFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("personalfeed", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPersonalFeedListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPinService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve the parental or purchase PIN that applies for the household or user. Includes specification of where the PIN was defined at – account, household or user  level
	 * 
	 * @param string $by Reference type to filter by
	 * @param string $type The PIN type to retrieve
	 * @param int $ruleId Rule ID - for PIN per rule (MediaCorp): BEO-1923
	 * @return KalturaPin
	 */
	function get($by, $type, $ruleId = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "by", $by);
		$this->client->addParam($kparams, "type", $type);
		$this->client->addParam($kparams, "ruleId", $ruleId);
		$this->client->queueServiceActionCall("pin", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPin");
		return $resultObject;
	}

	/**
	 * Set the parental or purchase PIN that applies for the user or the household.
	 * 
	 * @param string $by Reference type to filter by
	 * @param string $type The PIN type to retrieve
	 * @param KalturaPin $pin PIN to set
	 * @param int $ruleId Rule ID - for PIN per rule (MediaCorp): BEO-1923
	 * @return KalturaPin
	 */
	function update($by, $type, KalturaPin $pin, $ruleId = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "by", $by);
		$this->client->addParam($kparams, "type", $type);
		$this->client->addParam($kparams, "pin", $pin->toParams());
		$this->client->addParam($kparams, "ruleId", $ruleId);
		$this->client->queueServiceActionCall("pin", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPin");
		return $resultObject;
	}

	/**
	 * Validate a purchase or parental PIN for a user.
	 * 
	 * @param string $pin PIN to validate
	 * @param string $type The PIN type to retrieve
	 * @param int $ruleId Rule ID - for PIN per rule (MediaCorp): BEO-1923
	 * @return bool
	 */
	function validate($pin, $type, $ruleId = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "pin", $pin);
		$this->client->addParam($kparams, "type", $type);
		$this->client->addParam($kparams, "ruleId", $ruleId);
		$this->client->queueServiceActionCall("pin", "validate", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPpvService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns ppv object by internal identifier
	 * 
	 * @param bigint $id Ppv identifier
	 * @return KalturaPpv
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("ppv", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPpv");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPriceDetailsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns the list of available prices, can be filtered by price IDs
	 * 
	 * @param KalturaPriceDetailsFilter $filter Filter
	 * @return KalturaPriceDetailsListResponse
	 */
	function listAction(KalturaPriceDetailsFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("pricedetails", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPriceDetailsListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPricePlanService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns a list of price plans by IDs
	 * 
	 * @param KalturaPricePlanFilter $filter Filter request
	 * @return KalturaPricePlanListResponse
	 */
	function listAction(KalturaPricePlanFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("priceplan", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPricePlanListResponse");
		return $resultObject;
	}

	/**
	 * Updates a price plan
	 * 
	 * @param bigint $id Price plan ID
	 * @param KalturaPricePlan $pricePlan Price plan to update
	 * @return KalturaPricePlan
	 */
	function update($id, KalturaPricePlan $pricePlan)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "pricePlan", $pricePlan->toParams());
		$this->client->queueServiceActionCall("priceplan", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPricePlan");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaProductPriceService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns a price and a purchase status for each subscription or/and media file, for a given user (if passed) and with the consideration of a coupon code (if passed).
	 * 
	 * @param KalturaProductPriceFilter $filter Request filter
	 * @return KalturaProductPriceListResponse
	 */
	function listAction(KalturaProductPriceFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("productprice", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaProductPriceListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaPurchaseSettingsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve the purchase settings.
            Includes specification of where these settings were defined – account, household or user
	 * 
	 * @param string $by Reference type to filter by
	 * @return KalturaPurchaseSettings
	 */
	function get($by)
	{
		$kparams = array();
		$this->client->addParam($kparams, "by", $by);
		$this->client->queueServiceActionCall("purchasesettings", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPurchaseSettings");
		return $resultObject;
	}

	/**
	 * Set a purchase PIN for the household or user
	 * 
	 * @param string $entityReference Reference type to filter by
	 * @param KalturaPurchaseSettings $settings New settings to apply
	 * @return KalturaPurchaseSettings
	 */
	function update($entityReference, KalturaPurchaseSettings $settings)
	{
		$kparams = array();
		$this->client->addParam($kparams, "entityReference", $entityReference);
		$this->client->addParam($kparams, "settings", $settings->toParams());
		$this->client->queueServiceActionCall("purchasesettings", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaPurchaseSettings");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRecommendationProfileService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new recommendation engine for partner
	 * 
	 * @param KalturaRecommendationProfile $recommendationEngine Recommendation engine Object
	 * @return KalturaRecommendationProfile
	 */
	function add(KalturaRecommendationProfile $recommendationEngine)
	{
		$kparams = array();
		$this->client->addParam($kparams, "recommendationEngine", $recommendationEngine->toParams());
		$this->client->queueServiceActionCall("recommendationprofile", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecommendationProfile");
		return $resultObject;
	}

	/**
	 * Delete recommendation engine by recommendation engine id
	 * 
	 * @param int $id Recommendation engine Identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("recommendationprofile", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Generate recommendation engine  shared secret
	 * 
	 * @param int $recommendationEngineId Recommendation engine Identifier
	 * @return KalturaRecommendationProfile
	 */
	function generateSharedSecret($recommendationEngineId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "recommendationEngineId", $recommendationEngineId);
		$this->client->queueServiceActionCall("recommendationprofile", "generateSharedSecret", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecommendationProfile");
		return $resultObject;
	}

	/**
	 * Returns all recommendation engines for partner
	 * 
	 * @return KalturaRecommendationProfileListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("recommendationprofile", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecommendationProfileListResponse");
		return $resultObject;
	}

	/**
	 * Update recommendation engine details
	 * 
	 * @param int $recommendationEngineId Recommendation engine identifier
	 * @param KalturaRecommendationProfile $recommendationEngine Recommendation engine Object
	 * @return KalturaRecommendationProfile
	 */
	function update($recommendationEngineId, KalturaRecommendationProfile $recommendationEngine)
	{
		$kparams = array();
		$this->client->addParam($kparams, "recommendationEngineId", $recommendationEngineId);
		$this->client->addParam($kparams, "recommendationEngine", $recommendationEngine->toParams());
		$this->client->queueServiceActionCall("recommendationprofile", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecommendationProfile");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRecordingService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Issue a record request for a program
	 * 
	 * @param KalturaRecording $recording Recording Object
	 * @return KalturaRecording
	 */
	function add(KalturaRecording $recording)
	{
		$kparams = array();
		$this->client->addParam($kparams, "recording", $recording->toParams());
		$this->client->queueServiceActionCall("recording", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecording");
		return $resultObject;
	}

	/**
	 * Cancel a previously requested recording. Cancel recording can be called for recording in status Scheduled or Recording Only
	 * 
	 * @param bigint $id Recording identifier
	 * @return KalturaRecording
	 */
	function cancel($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("recording", "cancel", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecording");
		return $resultObject;
	}

	/**
	 * Delete one or more user recording(s). Delete recording can be called only for recordings in status Recorded
	 * 
	 * @param bigint $id Recording identifier
	 * @return KalturaRecording
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("recording", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecording");
		return $resultObject;
	}

	/**
	 * Returns recording object by internal identifier
	 * 
	 * @param bigint $id Recording identifier
	 * @return KalturaRecording
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("recording", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecording");
		return $resultObject;
	}

	/**
	 * Return a list of recordings for the household with optional filter by status and KSQL.
	 * 
	 * @param KalturaRecordingFilter $filter Filter parameters for filtering out the result
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaRecordingListResponse
	 */
	function listAction(KalturaRecordingFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("recording", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecordingListResponse");
		return $resultObject;
	}

	/**
	 * Protects an existing recording from the cleanup process for the defined protection period
	 * 
	 * @param bigint $id Recording identifier
	 * @return KalturaRecording
	 */
	function protect($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("recording", "protect", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRecording");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRegionService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns all regions for the partner
	 * 
	 * @param KalturaRegionFilter $filter Regions filter
	 * @return KalturaRegionListResponse
	 */
	function listAction(KalturaRegionFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("region", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRegionListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaRegistrySettingsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve the registry settings.
	 * 
	 * @return KalturaRegistrySettingsListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("registrysettings", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaRegistrySettingsListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaReminderService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new future reminder
	 * 
	 * @param KalturaReminder $reminder The reminder to be added.
	 * @return KalturaReminder
	 */
	function add(KalturaReminder $reminder)
	{
		$kparams = array();
		$this->client->addParam($kparams, "reminder", $reminder->toParams());
		$this->client->queueServiceActionCall("reminder", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaReminder");
		return $resultObject;
	}

	/**
	 * Delete a reminder. Reminder cannot be delete while being sent.
	 * 
	 * @param bigint $id Id of the reminder.
	 * @param string $type Reminder type.
	 * @return bool
	 */
	function delete($id, $type)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "type", $type);
		$this->client->queueServiceActionCall("reminder", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Delete a reminder. Reminder cannot be delete while being sent.
	 * 
	 * @param bigint $id Id of the reminder.
	 * @param string $type Reminder type.
	 * @param string $token User's token identifier
	 * @param int $partnerId Partner identifier
	 */
	function deleteWithToken($id, $type, $token, $partnerId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "type", $type);
		$this->client->addParam($kparams, "token", $token);
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->queueServiceActionCall("reminder", "deleteWithToken", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Return a list of reminders with optional filter by KSQL.
	 * 
	 * @param KalturaReminderFilter $filter Filter object
	 * @param KalturaFilterPager $pager Paging the request
	 * @return KalturaReminderListResponse
	 */
	function listAction(KalturaReminderFilter $filter, KalturaFilterPager $pager = null)
	{
		if ($this->client->isMultiRequest())
			throw new KalturaClientException("Action is not supported as part of multi-request.", KalturaClientException::ERROR_ACTION_IN_MULTIREQUEST);
		
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("reminder", "list", $kparams);
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaReminderListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaReportService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Return a device configuration retrieval log request for a specific device.
	 * 
	 * @param string $udid Device UDID
	 * @return KalturaReport
	 */
	function get($udid)
	{
		$kparams = array();
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->queueServiceActionCall("report", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaReport");
		return $resultObject;
	}

	/**
	 * Return device configurations retrieval log. Supports paging and can be filtered with the parameter &quot;FromData&quot;.
	 * 
	 * @param KalturaReportFilter $filter Filter option for from date (sec)
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaReportListResponse
	 */
	function listAction(KalturaReportFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("report", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaReportListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSearchHistoryService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Clean the user’s search history
	 * 
	 * @param KalturaSearchHistoryFilter $filter Filter of search history
	 * @return bool
	 */
	function clean(KalturaSearchHistoryFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("searchhistory", "clean", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Delete a specific search history.
            Possible error code: 2032 - ItemNotFound
	 * 
	 * @param string $id ID of the search history reference as shown in the list action
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("searchhistory", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get user&#39;s last search requests
	 * 
	 * @param KalturaSearchHistoryFilter $filter Filter parameters for filtering out the result
	 * @param KalturaFilterPager $pager Page size and index. Number of assets to return per page. Possible range 5 ≤ size ≥ 50. If omitted - will be set to 25. If a value > 50 provided – will set to 50>
	 * @return KalturaSearchHistoryListResponse
	 */
	function listAction(KalturaSearchHistoryFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("searchhistory", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSearchHistoryListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSeriesRecordingService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Issue a record request for a complete season or series
	 * 
	 * @param KalturaSeriesRecording $recording SeriesRecording Object
	 * @return KalturaSeriesRecording
	 */
	function add(KalturaSeriesRecording $recording)
	{
		$kparams = array();
		$this->client->addParam($kparams, "recording", $recording->toParams());
		$this->client->queueServiceActionCall("seriesrecording", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSeriesRecording");
		return $resultObject;
	}

	/**
	 * Cancel a previously requested series recording. Cancel series recording can be called for recording in status Scheduled or Recording Only
	 * 
	 * @param bigint $id Series Recording identifier
	 * @return KalturaSeriesRecording
	 */
	function cancel($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("seriesrecording", "cancel", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSeriesRecording");
		return $resultObject;
	}

	/**
	 * Cancel EPG recording that was recorded as part of series
	 * 
	 * @param bigint $id Series Recording identifier
	 * @param bigint $epgId Epg program identifier
	 * @return KalturaSeriesRecording
	 */
	function cancelByEpgId($id, $epgId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "epgId", $epgId);
		$this->client->queueServiceActionCall("seriesrecording", "cancelByEpgId", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSeriesRecording");
		return $resultObject;
	}

	/**
	 * Cancel Season recording epgs that was recorded as part of series
	 * 
	 * @param bigint $id Series Recording identifier
	 * @param bigint $seasonNumber Season Number
	 * @return KalturaSeriesRecording
	 */
	function cancelBySeasonNumber($id, $seasonNumber)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "seasonNumber", $seasonNumber);
		$this->client->queueServiceActionCall("seriesrecording", "cancelBySeasonNumber", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSeriesRecording");
		return $resultObject;
	}

	/**
	 * Delete series recording(s). Delete series recording can be called recordings in any status
	 * 
	 * @param bigint $id Series Recording identifier
	 * @return KalturaSeriesRecording
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("seriesrecording", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSeriesRecording");
		return $resultObject;
	}

	/**
	 * Delete Season recording epgs that was recorded as part of series
	 * 
	 * @param bigint $id Series Recording identifier
	 * @param int $seasonNumber Season Number
	 * @return KalturaSeriesRecording
	 */
	function deleteBySeasonNumber($id, $seasonNumber)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "seasonNumber", $seasonNumber);
		$this->client->queueServiceActionCall("seriesrecording", "deleteBySeasonNumber", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSeriesRecording");
		return $resultObject;
	}

	/**
	 * Return a list of series recordings for the household with optional filter by status and KSQL.
	 * 
	 * @param KalturaSeriesRecordingFilter $filter Filter parameters for filtering out the result - support order by only - START_DATE_ASC, START_DATE_DESC, ID_ASC,ID_DESC,SERIES_ID_ASC, SERIES_ID_DESC
	 * @return KalturaSeriesRecordingListResponse
	 */
	function listAction(KalturaSeriesRecordingFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("seriesrecording", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSeriesRecordingListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSessionService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Parses KS
	 * 
	 * @param string $session Additional KS to parse, if not passed the user's KS will be parsed
	 * @return KalturaSession
	 */
	function get($session = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "session", $session);
		$this->client->queueServiceActionCall("session", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSession");
		return $resultObject;
	}

	/**
	 * Revokes all the sessions (KS) of a given user
	 * 
	 * @return bool
	 */
	function revoke()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("session", "revoke", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Switching the user in the session by generating a new session for a new user within the same household
	 * 
	 * @param string $userIdToSwitch The identifier of the user to change
	 * @return KalturaLoginSession
	 */
	function switchUser($userIdToSwitch)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userIdToSwitch", $userIdToSwitch);
		$this->client->queueServiceActionCall("session", "switchUser", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLoginSession");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialActionService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new user social action
	 * 
	 * @param KalturaSocialAction $socialAction Social Action Object
	 * @return KalturaUserSocialActionResponse
	 */
	function add(KalturaSocialAction $socialAction)
	{
		$kparams = array();
		$this->client->addParam($kparams, "socialAction", $socialAction->toParams());
		$this->client->queueServiceActionCall("socialaction", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserSocialActionResponse");
		return $resultObject;
	}

	/**
	 * Delete user social action
	 * 
	 * @param string $id Social Action Id
	 * @return array
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("socialaction", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "array");
		return $resultObject;
	}

	/**
	 * Get list of user social actions
	 * 
	 * @param KalturaSocialActionFilter $filter Social action filter
	 * @param KalturaFilterPager $pager Pager
	 * @return KalturaSocialActionListResponse
	 */
	function listAction(KalturaSocialActionFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("socialaction", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocialActionListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialCommentService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get a list of all social comments filtered by asset ID and social platform
	 * 
	 * @param KalturaSocialCommentFilter $filter Country filter
	 * @param KalturaFilterPager $pager Pager
	 * @return KalturaSocialCommentListResponse
	 */
	function listAction(KalturaSocialCommentFilter $filter, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("socialcomment", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocialCommentListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * List social accounts
	 * 
	 * @param string $type Social network type
	 * @return KalturaSocial
	 */
	function get($type)
	{
		$kparams = array();
		$this->client->addParam($kparams, "type", $type);
		$this->client->queueServiceActionCall("social", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocial");
		return $resultObject;
	}

	/**
	 * Return the user object with social information according to a provided external social token
	 * 
	 * @param int $partnerId Partner identifier
	 * @param string $token Social token
	 * @param string $type Social network type
	 * @return KalturaSocial
	 */
	function getByToken($partnerId, $token, $type)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "token", $token);
		$this->client->addParam($kparams, "type", $type);
		$this->client->queueServiceActionCall("social", "getByToken", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocial");
		return $resultObject;
	}

	/**
	 * Retrieve the social network’s configuration information
	 * 
	 * @param string $type Social network type
	 * @param int $partnerId Partner identifier
	 * @return KalturaSocialConfig
	 */
	function getConfiguration($type, $partnerId = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "type", $type);
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->queueServiceActionCall("social", "getConfiguration", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocialConfig");
		return $resultObject;
	}

	/**
	 * Login using social token
	 * 
	 * @param int $partnerId Partner identifier
	 * @param string $token Social token
	 * @param string $type Social network
	 * @param string $udid Device UDID
	 * @return KalturaLoginResponse
	 */
	function login($partnerId, $token, $type, $udid = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "token", $token);
		$this->client->addParam($kparams, "type", $type);
		$this->client->addParam($kparams, "udid", $udid);
		$this->client->queueServiceActionCall("social", "login", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaLoginResponse");
		return $resultObject;
	}

	/**
	 * Connect an existing user in the system to an external social network user
	 * 
	 * @param string $token Social token
	 * @param string $type Social network type
	 * @return KalturaSocial
	 */
	function merge($token, $type)
	{
		$kparams = array();
		$this->client->addParam($kparams, "token", $token);
		$this->client->addParam($kparams, "type", $type);
		$this->client->queueServiceActionCall("social", "merge", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocial");
		return $resultObject;
	}

	/**
	 * Create a new user in the system using a provided external social token
	 * 
	 * @param int $partnerId Partner identifier
	 * @param string $token Social token
	 * @param string $type Social network type
	 * @param string $email User email
	 * @return KalturaSocial
	 */
	function register($partnerId, $token, $type, $email = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->addParam($kparams, "token", $token);
		$this->client->addParam($kparams, "type", $type);
		$this->client->addParam($kparams, "email", $email);
		$this->client->queueServiceActionCall("social", "register", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocial");
		return $resultObject;
	}

	/**
	 * Disconnect an existing user in the system from its external social network user
	 * 
	 * @param string $type Social network type
	 * @return KalturaSocial
	 */
	function unmerge($type)
	{
		$kparams = array();
		$this->client->addParam($kparams, "type", $type);
		$this->client->queueServiceActionCall("social", "unmerge", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocial");
		return $resultObject;
	}

	/**
	 * Set the user social network’s configuration information
	 * 
	 * @param KalturaSocialConfig $configuration The social action settings
	 * @return KalturaSocialConfig
	 */
	function UpdateConfiguration(KalturaSocialConfig $configuration)
	{
		$kparams = array();
		$this->client->addParam($kparams, "configuration", $configuration->toParams());
		$this->client->queueServiceActionCall("social", "UpdateConfiguration", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocialConfig");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSocialFriendActivityService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Get a list of the social friends activity for a user
	 * 
	 * @param KalturaSocialFriendActivityFilter $filter Social friend activity filter
	 * @param KalturaFilterPager $pager Pager
	 * @return KalturaSocialFriendActivityListResponse
	 */
	function listAction(KalturaSocialFriendActivityFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("socialfriendactivity", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSocialFriendActivityListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscriptionService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns a list of subscriptions requested by Subscription ID or file ID
	 * 
	 * @param KalturaSubscriptionFilter $filter Filter request
	 * @return KalturaSubscriptionListResponse
	 */
	function listAction(KalturaSubscriptionFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("subscription", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSubscriptionListResponse");
		return $resultObject;
	}

	/**
	 * Returns information about a coupon for subscription
	 * 
	 * @param int $id Subscription id
	 * @param string $code Coupon code
	 * @return KalturaCoupon
	 */
	function validateCoupon($id, $code)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "code", $code);
		$this->client->queueServiceActionCall("subscription", "validateCoupon", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaCoupon");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSubscriptionSetService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Add a new subscriptionSet
	 * 
	 * @param KalturaSubscriptionSet $subscriptionSet SubscriptionSet Object
	 * @return KalturaSubscriptionSet
	 */
	function add(KalturaSubscriptionSet $subscriptionSet)
	{
		$kparams = array();
		$this->client->addParam($kparams, "subscriptionSet", $subscriptionSet->toParams());
		$this->client->queueServiceActionCall("subscriptionset", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSubscriptionSet");
		return $resultObject;
	}

	/**
	 * Delete a subscriptionSet
	 * 
	 * @param bigint $id SubscriptionSet Identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("subscriptionset", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get the subscriptionSet according to the Identifier
	 * 
	 * @param bigint $id SubscriptionSet Identifier
	 * @return KalturaSubscriptionSet
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("subscriptionset", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSubscriptionSet");
		return $resultObject;
	}

	/**
	 * Returns a list of subscriptionSets requested by ids or subscription ids
	 * 
	 * @param KalturaSubscriptionSetFilter $filter SubscriptionSet filter
	 * @return KalturaSubscriptionSetListResponse
	 */
	function listAction(KalturaSubscriptionSetFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("subscriptionset", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSubscriptionSetListResponse");
		return $resultObject;
	}

	/**
	 * Update the subscriptionSet
	 * 
	 * @param bigint $id SubscriptionSet Identifier
	 * @param KalturaSubscriptionSet $subscriptionSet SubscriptionSet Object
	 * @return KalturaSubscriptionSet
	 */
	function update($id, KalturaSubscriptionSet $subscriptionSet)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "subscriptionSet", $subscriptionSet->toParams());
		$this->client->queueServiceActionCall("subscriptionset", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaSubscriptionSet");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaSystemService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns current server timestamp
	 * 
	 * @return bigint
	 */
	function getTime()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("system", "getTime", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "double");
		return $resultObject;
	}

	/**
	 * Returns current server version
	 * 
	 * @return string
	 */
	function getVersion()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("system", "getVersion", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "string");
		return $resultObject;
	}

	/**
	 * Returns true
	 * 
	 * @return bool
	 */
	function ping()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("system", "ping", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTimeShiftedTvPartnerSettingsService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve the account’s time-shifted TV settings (catch-up and C-DVR, Trick-play, Start-over)
	 * 
	 * @return KalturaTimeShiftedTvPartnerSettings
	 */
	function get()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("timeshiftedtvpartnersettings", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTimeShiftedTvPartnerSettings");
		return $resultObject;
	}

	/**
	 * Configure the account’s time-shifted TV settings (catch-up and C-DVR, Trick-play, Start-over)
	 * 
	 * @param KalturaTimeShiftedTvPartnerSettings $settings Time shifted TV settings
	 * @return bool
	 */
	function update(KalturaTimeShiftedTvPartnerSettings $settings)
	{
		$kparams = array();
		$this->client->addParam($kparams, "settings", $settings->toParams());
		$this->client->queueServiceActionCall("timeshiftedtvpartnersettings", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTopicService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Deleted a topic
	 * 
	 * @param int $id Topic identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("topic", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Gets a topic
	 * 
	 * @param int $id Topic identifier
	 * @return KalturaTopic
	 */
	function get($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("topic", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTopic");
		return $resultObject;
	}

	/**
	 * Get list of topics
	 * 
	 * @param KalturaTopicFilter $filter Topics filter
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaTopicListResponse
	 */
	function listAction(KalturaTopicFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("topic", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTopicListResponse");
		return $resultObject;
	}

	/**
	 * Updates a topic &quot;automatic issue notification&quot; behavior.
	 * 
	 * @param int $id Topic identifier
	 * @param string $automaticIssueNotification Behavior options:
             Inherit = 0: Take value from partner notification settings
             Yes = 1: Issue a notification massage when a new episode is available on the catalog
             No = 2: Do send a notification message when a new episode is available on the catalog
	 * @return bool
	 */
	function updateStatus($id, $automaticIssueNotification)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "automaticIssueNotification", $automaticIssueNotification);
		$this->client->queueServiceActionCall("topic", "updateStatus", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTransactionService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Downgrade specific subscription for a household. entitlements will be updated on the existing subscription end date.
	 * 
	 * @param KalturaPurchase $purchase Purchase properties
	 */
	function downgrade(KalturaPurchase $purchase)
	{
		$kparams = array();
		$this->client->addParam($kparams, "purchase", $purchase->toParams());
		$this->client->queueServiceActionCall("transaction", "downgrade", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Retrieve the purchase session identifier
	 * 
	 * @param KalturaPurchaseSession $purchaseSession Purchase properties
	 * @return bigint
	 */
	function getPurchaseSessionId(KalturaPurchaseSession $purchaseSession)
	{
		$kparams = array();
		$this->client->addParam($kparams, "purchaseSession", $purchaseSession->toParams());
		$this->client->queueServiceActionCall("transaction", "getPurchaseSessionId", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "double");
		return $resultObject;
	}

	/**
	 * Purchase specific product or subscription for a household. Upon successful charge entitlements to use the requested product or subscription are granted.
	 * 
	 * @param KalturaPurchase $purchase Purchase properties
	 * @return KalturaTransaction
	 */
	function purchase(KalturaPurchase $purchase)
	{
		$kparams = array();
		$this->client->addParam($kparams, "purchase", $purchase->toParams());
		$this->client->queueServiceActionCall("transaction", "purchase", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTransaction");
		return $resultObject;
	}

	/**
	 * This method shall set the waiver flag on the user entitlement table and the waiver date field to the current date.
	 * 
	 * @param int $assetId Asset identifier
	 * @param string $transactionType The transaction type
	 * @return bool
	 */
	function setWaiver($assetId, $transactionType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "transactionType", $transactionType);
		$this->client->queueServiceActionCall("transaction", "setWaiver", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Updates a pending purchase transaction state.
	 * 
	 * @param string $paymentGatewayId Payment gateway identifier
	 * @param string $externalTransactionId External transaction identifier
	 * @param string $signature Security signature to validate the caller is a payment gateway adapter application
	 * @param KalturaTransactionStatus $status Status properties
	 */
	function updateStatus($paymentGatewayId, $externalTransactionId, $signature, KalturaTransactionStatus $status)
	{
		$kparams = array();
		$this->client->addParam($kparams, "paymentGatewayId", $paymentGatewayId);
		$this->client->addParam($kparams, "externalTransactionId", $externalTransactionId);
		$this->client->addParam($kparams, "signature", $signature);
		$this->client->addParam($kparams, "status", $status->toParams());
		$this->client->queueServiceActionCall("transaction", "updateStatus", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Upgrade specific subscription for a household. Upon successful charge entitlements to use the requested product or subscription are granted.
	 * 
	 * @param KalturaPurchase $purchase Purchase properties
	 * @return KalturaTransaction
	 */
	function upgrade(KalturaPurchase $purchase)
	{
		$kparams = array();
		$this->client->addParam($kparams, "purchase", $purchase->toParams());
		$this->client->queueServiceActionCall("transaction", "upgrade", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTransaction");
		return $resultObject;
	}

	/**
	 * Verifies PPV/Subscription/Collection client purchase (such as InApp) and entitles the user.
	 * 
	 * @param KalturaExternalReceipt $externalReceipt Receipt properties
	 * @return KalturaTransaction
	 */
	function validateReceipt(KalturaExternalReceipt $externalReceipt)
	{
		$kparams = array();
		$this->client->addParam($kparams, "externalReceipt", $externalReceipt->toParams());
		$this->client->queueServiceActionCall("transaction", "validateReceipt", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaTransaction");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaTransactionHistoryService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Gets user or household transaction history.
	 * 
	 * @param KalturaTransactionHistoryFilter $filter Filter by household or user
	 * @param KalturaFilterPager $pager Page size and index
	 * @return KalturaBillingTransactionListResponse
	 */
	function listAction(KalturaTransactionHistoryFilter $filter = null, KalturaFilterPager $pager = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		if ($pager !== null)
			$this->client->addParam($kparams, "pager", $pager->toParams());
		$this->client->queueServiceActionCall("transactionhistory", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaBillingTransactionListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUnifiedPaymentService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Returns the data about the next renewal
	 * 
	 * @param int $id Unified payment ID
	 * @return KalturaUnifiedPaymentRenewal
	 */
	function getNextRenewal($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("unifiedpayment", "getNextRenewal", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUnifiedPaymentRenewal");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserAssetRuleService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Retrieve all the rules (parental, geo, device or user-type) that applies for this user and asset.
	 * 
	 * @param KalturaUserAssetRuleFilter $filter Filter
	 * @return KalturaUserAssetRuleListResponse
	 */
	function listAction(KalturaUserAssetRuleFilter $filter)
	{
		$kparams = array();
		$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("userassetrule", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserAssetRuleListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserAssetsListItemService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Adds a new item to user’s private asset list
	 * 
	 * @param KalturaUserAssetsListItem $userAssetsListItem A list item to add
	 * @return KalturaUserAssetsListItem
	 */
	function add(KalturaUserAssetsListItem $userAssetsListItem)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userAssetsListItem", $userAssetsListItem->toParams());
		$this->client->queueServiceActionCall("userassetslistitem", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserAssetsListItem");
		return $resultObject;
	}

	/**
	 * Deletes an item from user’s private asset list
	 * 
	 * @param string $assetId Asset id to delete
	 * @param string $listType Asset list type to delete from
	 * @return bool
	 */
	function delete($assetId, $listType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "listType", $listType);
		$this->client->queueServiceActionCall("userassetslistitem", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Get an item from user’s private asset list
	 * 
	 * @param string $assetId Asset id to get
	 * @param string $listType Asset list type to get from
	 * @param string $itemType Item type to get
	 * @return KalturaUserAssetsListItem
	 */
	function get($assetId, $listType, $itemType)
	{
		$kparams = array();
		$this->client->addParam($kparams, "assetId", $assetId);
		$this->client->addParam($kparams, "listType", $listType);
		$this->client->addParam($kparams, "itemType", $itemType);
		$this->client->queueServiceActionCall("userassetslistitem", "get", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserAssetsListItem");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserInterestService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Insert new user interest for partner user
	 * 
	 * @param KalturaUserInterest $userInterest User interest Object
	 * @return KalturaUserInterest
	 */
	function add(KalturaUserInterest $userInterest)
	{
		$kparams = array();
		$this->client->addParam($kparams, "userInterest", $userInterest->toParams());
		$this->client->queueServiceActionCall("userinterest", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserInterest");
		return $resultObject;
	}

	/**
	 * Delete new user interest for partner user
	 * 
	 * @param string $id User interest identifier
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("userinterest", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Delete new user interest for partner user
	 * 
	 * @param string $id User interest identifier
	 * @param string $token User's token identifier
	 * @param int $partnerId Partner identifier
	 */
	function deleteWithToken($id, $token, $partnerId)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "token", $token);
		$this->client->addParam($kparams, "partnerId", $partnerId);
		$this->client->queueServiceActionCall("userinterest", "deleteWithToken", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "null");
	}

	/**
	 * Returns all Engagement for partner
	 * 
	 * @return KalturaUserInterestListResponse
	 */
	function listAction()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("userinterest", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserInterestListResponse");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserLoginPinService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Generate a time and usage expiry login-PIN that can allow a single login per PIN. If an active login-PIN already exists. Calling this API again for same user will add another login-PIN
	 * 
	 * @param string $secret Additional security parameter for optional enhanced security
	 * @return KalturaUserLoginPin
	 */
	function add($secret = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "secret", $secret);
		$this->client->queueServiceActionCall("userloginpin", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserLoginPin");
		return $resultObject;
	}

	/**
	 * Immediately deletes a given pre set login pin code for the user.
	 * 
	 * @param string $pinCode Login pin code to expire
	 * @return bool
	 */
	function delete($pinCode)
	{
		$kparams = array();
		$this->client->addParam($kparams, "pinCode", $pinCode);
		$this->client->queueServiceActionCall("userloginpin", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Immediately expire all active login-PINs for a user
	 * 
	 * @return bool
	 */
	function deleteAll()
	{
		$kparams = array();
		$this->client->queueServiceActionCall("userloginpin", "deleteAll", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Set a time and usage expiry login-PIN that can allow a single login per PIN. If an active login-PIN already exists. Calling this API again for same user will add another login-PIN
	 * 
	 * @param string $pinCode Device Identifier
	 * @param string $secret Additional security parameter to validate the login
	 * @return KalturaUserLoginPin
	 */
	function update($pinCode, $secret = null)
	{
		$kparams = array();
		$this->client->addParam($kparams, "pinCode", $pinCode);
		$this->client->addParam($kparams, "secret", $secret);
		$this->client->queueServiceActionCall("userloginpin", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserLoginPin");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaUserRoleService extends KalturaServiceBase
{
	function __construct(KalturaClient $client = null)
	{
		parent::__construct($client);
	}

	/**
	 * Creates a new role
	 * 
	 * @param KalturaUserRole $role Role to add
	 * @return KalturaUserRole
	 */
	function add(KalturaUserRole $role)
	{
		$kparams = array();
		$this->client->addParam($kparams, "role", $role->toParams());
		$this->client->queueServiceActionCall("userrole", "add", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserRole");
		return $resultObject;
	}

	/**
	 * Delete role
	 * 
	 * @param bigint $id Role id to delete
	 * @return bool
	 */
	function delete($id)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->queueServiceActionCall("userrole", "delete", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$resultObject = (bool) $resultObject;
		return $resultObject;
	}

	/**
	 * Retrieving user roles by identifiers, if filter is empty, returns all partner roles
	 * 
	 * @param KalturaUserRoleFilter $filter User roles filter
	 * @return KalturaUserRoleListResponse
	 */
	function listAction(KalturaUserRoleFilter $filter = null)
	{
		$kparams = array();
		if ($filter !== null)
			$this->client->addParam($kparams, "filter", $filter->toParams());
		$this->client->queueServiceActionCall("userrole", "list", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserRoleListResponse");
		return $resultObject;
	}

	/**
	 * Update role
	 * 
	 * @param bigint $id Role Id
	 * @param KalturaUserRole $role Role to Update
	 * @return KalturaUserRole
	 */
	function update($id, KalturaUserRole $role)
	{
		$kparams = array();
		$this->client->addParam($kparams, "id", $id);
		$this->client->addParam($kparams, "role", $role->toParams());
		$this->client->queueServiceActionCall("userrole", "update", $kparams);
		if ($this->client->isMultiRequest())
			return $this->client->getMultiRequestResult();
		$resultObject = $this->client->doQueue();
		$this->client->throwExceptionIfError($resultObject);
		$this->client->validateObjectType($resultObject, "KalturaUserRole");
		return $resultObject;
	}
}

/**
 * @package Kaltura
 * @subpackage Client
 */
class KalturaClient extends KalturaClientBase
{
	/**
	 * 
	 * @var KalturaAnnouncementService
	 */
	public $announcement = null;

	/**
	 * 
	 * @var KalturaAppTokenService
	 */
	public $appToken = null;

	/**
	 * 
	 * @var KalturaAssetCommentService
	 */
	public $assetComment = null;

	/**
	 * 
	 * @var KalturaAssetService
	 */
	public $asset = null;

	/**
	 * 
	 * @var KalturaAssetFileService
	 */
	public $assetFile = null;

	/**
	 * 
	 * @var KalturaAssetHistoryService
	 */
	public $assetHistory = null;

	/**
	 * 
	 * @var KalturaAssetRuleService
	 */
	public $assetRule = null;

	/**
	 * 
	 * @var KalturaAssetStatisticsService
	 */
	public $assetStatistics = null;

	/**
	 * 
	 * @var KalturaAssetUserRuleService
	 */
	public $assetUserRule = null;

	/**
	 * 
	 * @var KalturaBookmarkService
	 */
	public $bookmark = null;

	/**
	 * 
	 * @var KalturaCdnAdapterProfileService
	 */
	public $cdnAdapterProfile = null;

	/**
	 * 
	 * @var KalturaCdnPartnerSettingsService
	 */
	public $cdnPartnerSettings = null;

	/**
	 * 
	 * @var KalturaCDVRAdapterProfileService
	 */
	public $cDVRAdapterProfile = null;

	/**
	 * 
	 * @var KalturaChannelService
	 */
	public $channel = null;

	/**
	 * 
	 * @var KalturaCollectionService
	 */
	public $collection = null;

	/**
	 * 
	 * @var KalturaCompensationService
	 */
	public $compensation = null;

	/**
	 * 
	 * @var KalturaConfigurationGroupService
	 */
	public $configurationGroup = null;

	/**
	 * 
	 * @var KalturaConfigurationGroupDeviceService
	 */
	public $configurationGroupDevice = null;

	/**
	 * 
	 * @var KalturaConfigurationGroupTagService
	 */
	public $configurationGroupTag = null;

	/**
	 * 
	 * @var KalturaConfigurationsService
	 */
	public $configurations = null;

	/**
	 * 
	 * @var KalturaCountryService
	 */
	public $country = null;

	/**
	 * 
	 * @var KalturaCouponService
	 */
	public $coupon = null;

	/**
	 * 
	 * @var KalturaCouponsGroupService
	 */
	public $couponsGroup = null;

	/**
	 * 
	 * @var KalturaCurrencyService
	 */
	public $currency = null;

	/**
	 * 
	 * @var KalturaDeviceBrandService
	 */
	public $deviceBrand = null;

	/**
	 * 
	 * @var KalturaDeviceFamilyService
	 */
	public $deviceFamily = null;

	/**
	 * 
	 * @var KalturaEmailService
	 */
	public $email = null;

	/**
	 * 
	 * @var KalturaEngagementAdapterService
	 */
	public $engagementAdapter = null;

	/**
	 * 
	 * @var KalturaEngagementService
	 */
	public $engagement = null;

	/**
	 * 
	 * @var KalturaEntitlementService
	 */
	public $entitlement = null;

	/**
	 * 
	 * @var KalturaExportTaskService
	 */
	public $exportTask = null;

	/**
	 * 
	 * @var KalturaExternalChannelProfileService
	 */
	public $externalChannelProfile = null;

	/**
	 * 
	 * @var KalturaFavoriteService
	 */
	public $favorite = null;

	/**
	 * 
	 * @var KalturaFollowTvSeriesService
	 */
	public $followTvSeries = null;

	/**
	 * 
	 * @var KalturaHomeNetworkService
	 */
	public $homeNetwork = null;

	/**
	 * 
	 * @var KalturaHouseholdService
	 */
	public $household = null;

	/**
	 * 
	 * @var KalturaHouseholdDeviceService
	 */
	public $householdDevice = null;

	/**
	 * 
	 * @var KalturaHouseholdLimitationsService
	 */
	public $householdLimitations = null;

	/**
	 * 
	 * @var KalturaHouseholdPaymentGatewayService
	 */
	public $householdPaymentGateway = null;

	/**
	 * 
	 * @var KalturaHouseholdPaymentMethodService
	 */
	public $householdPaymentMethod = null;

	/**
	 * 
	 * @var KalturaHouseholdPremiumServiceService
	 */
	public $householdPremiumService = null;

	/**
	 * 
	 * @var KalturaHouseholdQuotaService
	 */
	public $householdQuota = null;

	/**
	 * 
	 * @var KalturaHouseholdUserService
	 */
	public $householdUser = null;

	/**
	 * 
	 * @var KalturaInboxMessageService
	 */
	public $inboxMessage = null;

	/**
	 * 
	 * @var KalturaLanguageService
	 */
	public $language = null;

	/**
	 * 
	 * @var KalturaLicensedUrlService
	 */
	public $licensedUrl = null;

	/**
	 * 
	 * @var KalturaMessageTemplateService
	 */
	public $messageTemplate = null;

	/**
	 * 
	 * @var KalturaMetaService
	 */
	public $meta = null;

	/**
	 * 
	 * @var KalturaNotificationService
	 */
	public $notification = null;

	/**
	 * 
	 * @var KalturaNotificationsPartnerSettingsService
	 */
	public $notificationsPartnerSettings = null;

	/**
	 * 
	 * @var KalturaNotificationsSettingsService
	 */
	public $notificationsSettings = null;

	/**
	 * 
	 * @var KalturaOssAdapterProfileService
	 */
	public $ossAdapterProfile = null;

	/**
	 * 
	 * @var KalturaOttCategoryService
	 */
	public $ottCategory = null;

	/**
	 * 
	 * @var KalturaOttUserService
	 */
	public $ottUser = null;

	/**
	 * 
	 * @var KalturaParentalRuleService
	 */
	public $parentalRule = null;

	/**
	 * 
	 * @var KalturaPartnerConfigurationService
	 */
	public $partnerConfiguration = null;

	/**
	 * 
	 * @var KalturaPaymentGatewayProfileService
	 */
	public $paymentGatewayProfile = null;

	/**
	 * 
	 * @var KalturaPaymentMethodProfileService
	 */
	public $paymentMethodProfile = null;

	/**
	 * 
	 * @var KalturaPersonalFeedService
	 */
	public $personalFeed = null;

	/**
	 * 
	 * @var KalturaPinService
	 */
	public $pin = null;

	/**
	 * 
	 * @var KalturaPpvService
	 */
	public $ppv = null;

	/**
	 * 
	 * @var KalturaPriceDetailsService
	 */
	public $priceDetails = null;

	/**
	 * 
	 * @var KalturaPricePlanService
	 */
	public $pricePlan = null;

	/**
	 * 
	 * @var KalturaProductPriceService
	 */
	public $productPrice = null;

	/**
	 * 
	 * @var KalturaPurchaseSettingsService
	 */
	public $purchaseSettings = null;

	/**
	 * 
	 * @var KalturaRecommendationProfileService
	 */
	public $recommendationProfile = null;

	/**
	 * 
	 * @var KalturaRecordingService
	 */
	public $recording = null;

	/**
	 * 
	 * @var KalturaRegionService
	 */
	public $region = null;

	/**
	 * 
	 * @var KalturaRegistrySettingsService
	 */
	public $registrySettings = null;

	/**
	 * 
	 * @var KalturaReminderService
	 */
	public $reminder = null;

	/**
	 * 
	 * @var KalturaReportService
	 */
	public $report = null;

	/**
	 * 
	 * @var KalturaSearchHistoryService
	 */
	public $searchHistory = null;

	/**
	 * 
	 * @var KalturaSeriesRecordingService
	 */
	public $seriesRecording = null;

	/**
	 * 
	 * @var KalturaSessionService
	 */
	public $session = null;

	/**
	 * 
	 * @var KalturaSocialActionService
	 */
	public $socialAction = null;

	/**
	 * 
	 * @var KalturaSocialCommentService
	 */
	public $socialComment = null;

	/**
	 * 
	 * @var KalturaSocialService
	 */
	public $social = null;

	/**
	 * 
	 * @var KalturaSocialFriendActivityService
	 */
	public $socialFriendActivity = null;

	/**
	 * 
	 * @var KalturaSubscriptionService
	 */
	public $subscription = null;

	/**
	 * 
	 * @var KalturaSubscriptionSetService
	 */
	public $subscriptionSet = null;

	/**
	 * 
	 * @var KalturaSystemService
	 */
	public $system = null;

	/**
	 * 
	 * @var KalturaTimeShiftedTvPartnerSettingsService
	 */
	public $timeShiftedTvPartnerSettings = null;

	/**
	 * 
	 * @var KalturaTopicService
	 */
	public $topic = null;

	/**
	 * 
	 * @var KalturaTransactionService
	 */
	public $transaction = null;

	/**
	 * 
	 * @var KalturaTransactionHistoryService
	 */
	public $transactionHistory = null;

	/**
	 * 
	 * @var KalturaUnifiedPaymentService
	 */
	public $unifiedPayment = null;

	/**
	 * 
	 * @var KalturaUserAssetRuleService
	 */
	public $userAssetRule = null;

	/**
	 * 
	 * @var KalturaUserAssetsListItemService
	 */
	public $userAssetsListItem = null;

	/**
	 * 
	 * @var KalturaUserInterestService
	 */
	public $userInterest = null;

	/**
	 * 
	 * @var KalturaUserLoginPinService
	 */
	public $userLoginPin = null;

	/**
	 * 
	 * @var KalturaUserRoleService
	 */
	public $userRole = null;

	/**
	 * Kaltura client constructor
	 *
	 * @param KalturaConfiguration $config
	 */
	public function __construct(KalturaConfiguration $config)
	{
		parent::__construct($config);
		
		$this->setClientTag('php5:18-05-22');
		$this->setApiVersion('4.81.70.43125');
		
		$this->announcement = new KalturaAnnouncementService($this);
		$this->appToken = new KalturaAppTokenService($this);
		$this->assetComment = new KalturaAssetCommentService($this);
		$this->asset = new KalturaAssetService($this);
		$this->assetFile = new KalturaAssetFileService($this);
		$this->assetHistory = new KalturaAssetHistoryService($this);
		$this->assetRule = new KalturaAssetRuleService($this);
		$this->assetStatistics = new KalturaAssetStatisticsService($this);
		$this->assetUserRule = new KalturaAssetUserRuleService($this);
		$this->bookmark = new KalturaBookmarkService($this);
		$this->cdnAdapterProfile = new KalturaCdnAdapterProfileService($this);
		$this->cdnPartnerSettings = new KalturaCdnPartnerSettingsService($this);
		$this->cDVRAdapterProfile = new KalturaCDVRAdapterProfileService($this);
		$this->channel = new KalturaChannelService($this);
		$this->collection = new KalturaCollectionService($this);
		$this->compensation = new KalturaCompensationService($this);
		$this->configurationGroup = new KalturaConfigurationGroupService($this);
		$this->configurationGroupDevice = new KalturaConfigurationGroupDeviceService($this);
		$this->configurationGroupTag = new KalturaConfigurationGroupTagService($this);
		$this->configurations = new KalturaConfigurationsService($this);
		$this->country = new KalturaCountryService($this);
		$this->coupon = new KalturaCouponService($this);
		$this->couponsGroup = new KalturaCouponsGroupService($this);
		$this->currency = new KalturaCurrencyService($this);
		$this->deviceBrand = new KalturaDeviceBrandService($this);
		$this->deviceFamily = new KalturaDeviceFamilyService($this);
		$this->email = new KalturaEmailService($this);
		$this->engagementAdapter = new KalturaEngagementAdapterService($this);
		$this->engagement = new KalturaEngagementService($this);
		$this->entitlement = new KalturaEntitlementService($this);
		$this->exportTask = new KalturaExportTaskService($this);
		$this->externalChannelProfile = new KalturaExternalChannelProfileService($this);
		$this->favorite = new KalturaFavoriteService($this);
		$this->followTvSeries = new KalturaFollowTvSeriesService($this);
		$this->homeNetwork = new KalturaHomeNetworkService($this);
		$this->household = new KalturaHouseholdService($this);
		$this->householdDevice = new KalturaHouseholdDeviceService($this);
		$this->householdLimitations = new KalturaHouseholdLimitationsService($this);
		$this->householdPaymentGateway = new KalturaHouseholdPaymentGatewayService($this);
		$this->householdPaymentMethod = new KalturaHouseholdPaymentMethodService($this);
		$this->householdPremiumService = new KalturaHouseholdPremiumServiceService($this);
		$this->householdQuota = new KalturaHouseholdQuotaService($this);
		$this->householdUser = new KalturaHouseholdUserService($this);
		$this->inboxMessage = new KalturaInboxMessageService($this);
		$this->language = new KalturaLanguageService($this);
		$this->licensedUrl = new KalturaLicensedUrlService($this);
		$this->messageTemplate = new KalturaMessageTemplateService($this);
		$this->meta = new KalturaMetaService($this);
		$this->notification = new KalturaNotificationService($this);
		$this->notificationsPartnerSettings = new KalturaNotificationsPartnerSettingsService($this);
		$this->notificationsSettings = new KalturaNotificationsSettingsService($this);
		$this->ossAdapterProfile = new KalturaOssAdapterProfileService($this);
		$this->ottCategory = new KalturaOttCategoryService($this);
		$this->ottUser = new KalturaOttUserService($this);
		$this->parentalRule = new KalturaParentalRuleService($this);
		$this->partnerConfiguration = new KalturaPartnerConfigurationService($this);
		$this->paymentGatewayProfile = new KalturaPaymentGatewayProfileService($this);
		$this->paymentMethodProfile = new KalturaPaymentMethodProfileService($this);
		$this->personalFeed = new KalturaPersonalFeedService($this);
		$this->pin = new KalturaPinService($this);
		$this->ppv = new KalturaPpvService($this);
		$this->priceDetails = new KalturaPriceDetailsService($this);
		$this->pricePlan = new KalturaPricePlanService($this);
		$this->productPrice = new KalturaProductPriceService($this);
		$this->purchaseSettings = new KalturaPurchaseSettingsService($this);
		$this->recommendationProfile = new KalturaRecommendationProfileService($this);
		$this->recording = new KalturaRecordingService($this);
		$this->region = new KalturaRegionService($this);
		$this->registrySettings = new KalturaRegistrySettingsService($this);
		$this->reminder = new KalturaReminderService($this);
		$this->report = new KalturaReportService($this);
		$this->searchHistory = new KalturaSearchHistoryService($this);
		$this->seriesRecording = new KalturaSeriesRecordingService($this);
		$this->session = new KalturaSessionService($this);
		$this->socialAction = new KalturaSocialActionService($this);
		$this->socialComment = new KalturaSocialCommentService($this);
		$this->social = new KalturaSocialService($this);
		$this->socialFriendActivity = new KalturaSocialFriendActivityService($this);
		$this->subscription = new KalturaSubscriptionService($this);
		$this->subscriptionSet = new KalturaSubscriptionSetService($this);
		$this->system = new KalturaSystemService($this);
		$this->timeShiftedTvPartnerSettings = new KalturaTimeShiftedTvPartnerSettingsService($this);
		$this->topic = new KalturaTopicService($this);
		$this->transaction = new KalturaTransactionService($this);
		$this->transactionHistory = new KalturaTransactionHistoryService($this);
		$this->unifiedPayment = new KalturaUnifiedPaymentService($this);
		$this->userAssetRule = new KalturaUserAssetRuleService($this);
		$this->userAssetsListItem = new KalturaUserAssetsListItemService($this);
		$this->userInterest = new KalturaUserInterestService($this);
		$this->userLoginPin = new KalturaUserLoginPinService($this);
		$this->userRole = new KalturaUserRoleService($this);
	}
	
	/**
	 * Client tag
	 * 
	 * @param string $clientTag
	 */
	public function setClientTag($clientTag)
	{
		$this->clientConfiguration['clientTag'] = $clientTag;
	}
	
	/**
	 * Client tag
	 * 
	 * @return string
	 */
	public function getClientTag()
	{
		if(isset($this->clientConfiguration['clientTag']))
		{
			return $this->clientConfiguration['clientTag'];
		}
		
		return null;
	}
	
	/**
	 * API Version
	 * 
	 * @param string $apiVersion
	 */
	public function setApiVersion($apiVersion)
	{
		$this->clientConfiguration['apiVersion'] = $apiVersion;
	}
	
	/**
	 * API Version
	 * 
	 * @return string
	 */
	public function getApiVersion()
	{
		if(isset($this->clientConfiguration['apiVersion']))
		{
			return $this->clientConfiguration['apiVersion'];
		}
		
		return null;
	}
	
	/**
	 * Impersonated partner id
	 * 
	 * @param int $partnerId
	 */
	public function setPartnerId($partnerId)
	{
		$this->requestConfiguration['partnerId'] = $partnerId;
	}
	
	/**
	 * Impersonated partner id
	 * 
	 * @return int
	 */
	public function getPartnerId()
	{
		if(isset($this->requestConfiguration['partnerId']))
		{
			return $this->requestConfiguration['partnerId'];
		}
		
		return null;
	}
	
	/**
	 * Impersonated user id
	 * 
	 * @param int $userId
	 */
	public function setUserId($userId)
	{
		$this->requestConfiguration['userId'] = $userId;
	}
	
	/**
	 * Impersonated user id
	 * 
	 * @return int
	 */
	public function getUserId()
	{
		if(isset($this->requestConfiguration['userId']))
		{
			return $this->requestConfiguration['userId'];
		}
		
		return null;
	}
	
	/**
	 * Content language
	 * 
	 * @param string $language
	 */
	public function setLanguage($language)
	{
		$this->requestConfiguration['language'] = $language;
	}
	
	/**
	 * Content language
	 * 
	 * @return string
	 */
	public function getLanguage()
	{
		if(isset($this->requestConfiguration['language']))
		{
			return $this->requestConfiguration['language'];
		}
		
		return null;
	}
	
	/**
	 * Content currency
	 * 
	 * @param string $currency
	 */
	public function setCurrency($currency)
	{
		$this->requestConfiguration['currency'] = $currency;
	}
	
	/**
	 * Content currency
	 * 
	 * @return string
	 */
	public function getCurrency()
	{
		if(isset($this->requestConfiguration['currency']))
		{
			return $this->requestConfiguration['currency'];
		}
		
		return null;
	}
	
	/**
	 * Kaltura API session
	 * 
	 * @param string $ks
	 */
	public function setKs($ks)
	{
		$this->requestConfiguration['ks'] = $ks;
	}
	
	/**
	 * Kaltura API session
	 * 
	 * @return string
	 */
	public function getKs()
	{
		if(isset($this->requestConfiguration['ks']))
		{
			return $this->requestConfiguration['ks'];
		}
		
		return null;
	}
	
	/**
	 * Kaltura API session
	 * 
	 * @param string $sessionId
	 */
	public function setSessionId($sessionId)
	{
		$this->requestConfiguration['ks'] = $sessionId;
	}
	
	/**
	 * Kaltura API session
	 * 
	 * @return string
	 */
	public function getSessionId()
	{
		if(isset($this->requestConfiguration['ks']))
		{
			return $this->requestConfiguration['ks'];
		}
		
		return null;
	}
	
	/**
	 * Response profile - this attribute will be automatically unset after every API call
	 * 
	 * @param KalturaBaseResponseProfile $responseProfile
	 */
	public function setResponseProfile(KalturaBaseResponseProfile $responseProfile)
	{
		$this->requestConfiguration['responseProfile'] = $responseProfile;
	}
	
	/**
	 * Response profile - this attribute will be automatically unset after every API call
	 * 
	 * @return KalturaBaseResponseProfile
	 */
	public function getResponseProfile()
	{
		if(isset($this->requestConfiguration['responseProfile']))
		{
			return $this->requestConfiguration['responseProfile'];
		}
		
		return null;
	}
	
	/**
	 * Clear all volatile configuration parameters
	 */
	protected function resetRequest()
	{
		parent::resetRequest();
		unset($this->requestConfiguration['responseProfile']);
	}
}

