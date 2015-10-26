<?php

namespace OpenCage {
	require_once('OpenCage.AbstractGeocoder.php');

	class Geocoder extends AbstractGeocoder {
		public function geocode($query) {
			$url = self::URL . 'q=' . urlencode($query);
			if (empty($this->key)) {
				throw new \Exception('Missing API key');
			}
			$url .= '&key=' . $this->key;
			if (isset( $this->additionalOptions ) && !empty( $this->additionalOptions )) {
				$url .= "&" . $this->additionalOptions;
			}
			
			$ret = json_decode($this->getJSON($url), true);
			return $ret;
		}
	}
}
