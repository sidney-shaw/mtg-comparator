<?php

namespace MTG_Comparator\Fetch_and_parse\Rytir;

class Downloader extends \MTG_Comparator\Fetch_and_parse\Downloader {

    public function get_url_by_page($page_nr) {
        $limit_placeholder = '__LIMIT__';
        $core_url = 'http://www.cernyrytir.cz/index.php3?akce=3&limit=' . $limit_placeholder .
            '&edice_magic=libovolna&poczob=1000&foil=A&magicvykup=1&triditpodle=ceny&hledej_pouze_magic=1&submit=Vyhledej';

        $limit = ($page_nr - 1) * 30; // specific page identifier used on cernyrytir.cz

        return str_replace($limit_placeholder, strval($limit), $core_url);
    }

    protected function get_parser($page_content) {
        return new Parser($page_content);
    }

    protected function get_client() {
        return new Client();
    }

    protected function get_shop_name() {
        return Enum::$SHOP_NAME;
    }

}