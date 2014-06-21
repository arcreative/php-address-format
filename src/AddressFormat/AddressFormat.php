<?php

namespace AddressFormat;

class AddressFormat {

    /**
     * Returns an array of pertinent address lines, and omits any that are not populated with data
     *
     * @param array $a Array with address elements
     * @return string
     */
    public function format(array $a = array()) {
        $formats = new Formats();
        $countryCode = $this->normalizeCountryCode($a['countryCode']);
        if (method_exists($formats, 'country' . $countryCode)) {
            return call_user_func(array($formats, 'country' . $countryCode), $a);
        }
        return call_user_func(array($formats, 'international'), $a);
    }


    /**
     * Normalizes country code to two letter ISO 3166 Alpha-2 style
     *
     * @param string $countryCode
     * @return string
     */
    private function normalizeCountryCode($countryCode = '') {
        return ucfirst(strtolower($countryCode));
    }
}
