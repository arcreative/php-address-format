<?php

namespace AddressFormat;

class Formats {

    /**
     * Basic Danish address format
     *
     * @param array $a
     * @return array
     */
    static public function countryDk(array $a) {
        $lines = array();
        if (isset($a['address']) && $a['address']) $lines[] = $a['address'];
        if (isset($a['address2']) && $a['address2']) $lines[] = $a['address2'];
        if (isset($a['address3']) && $a['address3']) $lines[] = $a['address3'];
        if ((isset($a['city']) && $a['city']) || (isset($a['postalCode']) && $a['postalCode'])) {
            $line = array();
            if (isset($a['postalCode']) && $a['postalCode']) $line[] = $a['postalCode'];
            if (isset($a['city']) && $a['city']) $line[] = $a['city'];
            $lines[] = implode(' ', $line);
        }
        return $lines;
    }

    /**
     * Basic US address format
     *
     * @param array $a
     * @return array
     */
    static public function countryUs(array $a) {
        $lines = array();
        if (isset($a['address']) && $a['address']) $lines[] = $a['address'];
        if (isset($a['address2']) && $a['address2']) $lines[] = $a['address2'];
        if (isset($a['address3']) && $a['address3']) $lines[] = $a['address3'];
        if ((isset($a['city']) && $a['city']) || (isset($a['subdivision']) && $a['subdivision']) || (isset($a['postalCode']) && $a['postalCode'])) {
            $line = array();
            if (isset($a['city']) && $a['city']) $line[] = $a['city'];
            if (isset($a['subdivision']) && $a['subdivision']) $line[] = $a['subdivision'];
            if (count($line))
                $line = array(implode(', ', $line));
            if (isset($a['postalCode']) && $a['postalCode']) $line[] = $a['postalCode'];
            $lines[] = implode(' ', $line);
        }
        return $lines;
    }

    /**
     * Basic international address format
     *
     * @param array $a
     * @return array
     */
    static public function international(array $a) {
        $lines = array();
        if (isset($a['address']) && $a['address']) $lines[] = $a['address'];
        if (isset($a['address2']) && $a['address2']) $lines[] = $a['address2'];
        if (isset($a['address3']) && $a['address3']) $lines[] = $a['address3'];
        if ((isset($a['city']) && $a['city']) || (isset($a['subdivision']) && $a['subdivision']) || (isset($a['postalCode']) && $a['postalCode'])) {
            $line = array();
            if (isset($a['city']) && $a['city']) $line[] = $a['city'];
            if (isset($a['subdivision']) && $a['subdivision']) $line[] = $a['subdivision'];
            if (isset($a['postalCode']) && $a['postalCode']) $line[] = $a['postalCode'];
            $lines[] = implode(' ', $line);
        }
        return $lines;
    }
}
