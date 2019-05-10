<?php

/*
	Returns json with license acquisition data. 
	Required parameters:
		wid, uiconf_id, entry_id, vs
	Optional parameter:
		flavor_ids  (comma-separated list)
		
	Return value:
	{
		"flavorData": {
			"flavor1": {"custom_data": "...", "signature": "..."},
			"flavor2": {"custom_data": "...", "signature": "..."}
		},
		"licenseServerBaseURL": "https://drm.example.com/license"
	}
	
	OR, if there's an error:
	{
		"error": {
			"message": "something is wrong"
		}
	}
*/


$wgMwEmbedApiServices['getLicenseData'] = 'mweApiGetLicenseData';

require_once( dirname( __FILE__ ) . '/../VidiunCommon.php' );	// For EntryResult

class mweApiGetLicenseData {

	function __construct() {
		global $container;
	}
	
	function filterByRequestedFlavors($fullFlavorData) {
		$flavorIds = $_REQUEST["flavor_ids"];
		if ($flavorIds) {
			$responseFlavorData = array();
			$flavorList = explode(',', $flavorIds);
			foreach ($flavorList as $flavorId) {
				$responseFlavorData[$flavorId] = $fullFlavorData[$flavorId];
			}
		} else {
			$responseFlavorData = $fullFlavorData;
		}
		return $responseFlavorData;
	}
	
	function getMissingParams() {
		// Check mandatory parameters (wid, uiconf_id, entry_id, vs)
		$mandatory = array(wid, uiconf_id, entry_id, vs);
		$missing = array();
		foreach ($mandatory as $param) {
			if (!isset($_REQUEST[$param])) {
				$missing[] = $param;
			}
		}
		return $missing;
	}

	function run() {
		global $wgVidiunUdrmLicenseServerUrl;

		// Always send 200, errors are signalled in json.		
		$this->sendHeaders();
		
		$response = array();
		
		$missingParams = $this->getMissingParams();
		
		if (!$missingParams) {
			try {
				$flavorData = $this->getRawFlavorData();				
				$response = array(
					"config" 		=> array("licenseServerBaseURL" => $wgVidiunUdrmLicenseServerUrl),
					"flavorData"	=> $this->filterByRequestedFlavors($flavorData)
				);
		
			} catch (Exception $e) {
				// EntryResult throws an exception when something's wrong
				$response = array(
					"error" => array(
						"message" => $e->getMessage()
					)
				);
			}
		} else {
			$response = array(
				"error" => array(
					"message" => "Missing mandatory parameter(s): " . implode(", ", $missingParams)
				)
			);
		}

		echo json_encode($response);
	}

	function sendHeaders() {
		// Set content type
		header("Content-type: application/json");
		
		// Set no cache
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache"); // 	for HTTP/1.0
	}
	
	function getRawFlavorData() {
		global $container;
		$drmPluginData = null;
		$resultObject = $container['entry_result']->getResult();
		$drmPluginData = (array)$resultObject["contextData"]->pluginData["VidiunDrmEntryContextPluginData"];
		return $drmPluginData["flavorData"];
	}
}
