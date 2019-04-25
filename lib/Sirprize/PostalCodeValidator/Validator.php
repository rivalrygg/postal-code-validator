<?php

/*
 * This file is part of the postal-code-validator package
 *
 * (c) Christian Hoegl <chrigu@sirprize.me>
 */
 
namespace Sirprize\PostalCodeValidator;

/**
 * Validator.
 *
 * @author Christian Hoegl <chrigu@sirprize.me>
 */
 
class Validator
{
    /*
     * country code: ISO 3166 2-letter code
     * format:
     *     # - numberic 0-9
     *     @ - alpha a-zA-Z
     */
    protected $formats = [
        'AC' => 'ASCN 1ZZ',                             # Ascension
        'AD' => 'AD[1-7]0\d',                           # ANDORRA
        'AE' => '',                                     # UNITED ARAB EMIRATES
        'AF' => '\d{4}',                                # AFGHANISTAN
        'AG' => '',                                     # ANTIGUA AND BARBUDA
        'AI' => '(?:AI-)?2640',                         # ANGUILLA
        'AL' => '\d{4}',                                # ALBANIA
        'AM' => '(?:37)?\d{4}',                         # ARMENIA
        'AN' => '',                                     # NETHERLANDS ANTILLES
        'AO' => '',                                     # ANGOLA
        'AQ' => 'BIQQ 1ZZ',                             # ANTARCTICA
        'AR' => '((?:[A-HJ-NP-Z])?\d{4})([A-Z]{3})?',   # ARGENTINA
        'AS' => '(96799)(?:[ \-](\d{4}))?',             # AMERICAN SAMOA
        'AT' => '\d{4}',                                # AUSTRIA
        'AU' => '\d{4}',                                # AUSTRALIA
        'AW' => '',                                     # ARUBA
        'AX' => '22\d{3}',                              # Åland
        'AZ' => '\d{4}',                                # AZERBAIJAN

        'BA' => '\d{5}',                                # BOSNIA AND HERZEGOWINA
        'BB' => 'BB\d{5}',                              # BARBADOS
        'BD' => '\d{4}',                                # BANGLADESH
        'BE' => '\d{4}',                                # BELGIUM
        'BF' => '',                                     # BURKINA FASO
        'BG' => '\d{4}',                                # BULGARIA
        'BH' => '(?:\d|1[0-2])\d{2}',                   # BAHRAIN
        'BI' => '',                                     # BURUNDI
        'BJ' => '',                                     # BENIN
        'BL' => '9[78][01]\d{2}',                       # Sankt Bartholomäus
        'BM' => '[A-Z]{2} ?[A-Z0-9]{2}',                # BERMUDA
        'BN' => '[A-Z]{2} ?\d{4}',                      # BRUNEI DARUSSALAM
        'BO' => '',                                     # BOLIVIA
        'BQ' => '',                                     # Karibische Niederlande
        'BR' => '\d{5}-?\d{3}',                         # BRAZIL
        'BS' => '',                                     # BAHAMAS
        'BT' => '\d{5}',                                # BHUTAN
        'BV' => '',                                     # BOUVET ISLAND
        'BW' => '',                                     # BOTSWANA
        'BY' => '\d{6}',                                # BELARUS
        'BZ' => '',                                     # BELIZE

        'CA' => '[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJ-NPRSTV-Z] ?\d[ABCEGHJ-NPRSTV-Z]\d', # CANADA
        'CC' => '6799',                                 # COCOS (KEELING) ISLANDS
        'CD' => '',                                     # CONGO, Democratic Republic of (was Zaire)
        'CF' => '',                                     # CENTRAL AFRICAN REPUBLIC
        'CG' => '',                                     # CONGO, People's Republic of
        'CH' => '\d{4}',                                # SWITZERLAND
        'CI' => '',                                     # COTE D'IVOIRE
        'CK' => '',                                     # COOK ISLANDS
        'CL' => '\d{7}',                                # CHILE
        'CM' => '',                                     # CAMEROON
        'CN' => '\d{6}',                                # CHINA
        'CO' => '\d{6}',                                # COLOMBIA
        'CR' => '\d{4,5}|\d{3}-\d{4}',                  # COSTA RICA
        'CU' => '\d{5}',                                # CUBA
        'CV' => '\d{4}',                                # CAPE VERDE
        'CW' => '',                                     # Curaçao
        'CX' => '6798',                                 # CHRISTMAS ISLAND
        'CY' => '\d{4}',                                # Cyprus
        'CZ' => '\d{3} ?\d{2}',                         # Czech Republic

        'DE' => '\d{5}',                                # GERMANY
        'DJ' => '',                                     # DJIBOUTI
        'DK' => '\d{4}',                                # DENMARK
        'DM' => '',                                     # DOMINICA
        'DO' => '\d{5}',                                # DOMINICAN REPUBLIC
        'DZ' => '\d{5}',                                # ALGERIA

        'EC' => '\d{6}',                                # ECUADOR
        'EE' => '\d{5}',                                # ESTONIA
        'EG' => '\d{5}',                                # EGYPT
        'EH' => '\d{5}',                                # WESTERN SAHARA
        'ER' => '',                                     # ERITREA
        'ES' => '\d{5}',                                # SPAIN
        'ET' => '\d{4}',                                # ETHIOPIA

        'FI' => '\d{5}',                                # FINLAND
        'FJ' => '',                                     # FIJI
        'FK' => 'FIQQ 1ZZ',                             # FALKLAND ISLANDS (MALVINAS)
        'FM' => '(9694[1-4])(?:[ \-](\d{4}))?',         # MICRONESIA
        'FO' => '\d{3}',                                # FAROE ISLANDS
        'FR' => '\d{2} ?\d{3}',                         # FRANCE
        'FX' => '',                                     # FRANCE, METROPOLITAN

        'GA' => '',                                     # GABON
        'GB' => 'GIR ?0AA|(?:(?:AB|AL|B|BA|BB|BD|BF|BH|BL|BN|BR|BS|BT|BX|CA|CB|CF|CH|CM|CO|CR|CT|CV|CW|DA|DD|DE|DG|DH|DL|DN|DT|DY|E|EC|EH|EN|EX|FK|FY|G|GL|GY|GU|HA|HD|HG|HP|HR|HS|HU|HX|IG|IM|IP|IV|JE|KA|KT|KW|KY|L|LA|LD|LE|LL|LN|LS|LU|M|ME|MK|ML|N|NE|NG|NN|NP|NR|NW|OL|OX|PA|PE|PH|PL|PO|PR|RG|RH|RM|S|SA|SE|SG|SK|SL|SM|SN|SO|SP|SR|SS|ST|SW|SY|TA|TD|TF|TN|TQ|TR|TS|TW|UB|W|WA|WC|WD|WF|WN|WR|WS|WV|YO|ZE)(?:\d[\dA-Z]? ?\d[ABD-HJLN-UW-Z]{2}))|BFPO ?\d{1,4}', # UK
        'GD' => '',                                     # GRENADA
        'GE' => '\d{4}',                                # GEORGIA
        'GF' => '9[78]3\d{2}',                          # FRENCH GUIANA
        'GG' => 'GY\d[\dA-Z]? ?\d[ABD-HJLN-UW-Z]{2}',   # Guernsey
        'GH' => '',                                     # GHANA
        'GI' => 'GX11 1AA',                             # GIBRALTAR
        'GL' => '39\d{2}',                              # GREENLAND
        'GM' => '',                                     # GAMBIA
        'GN' => '\d{3}',                                # GUINEA
        'GP' => '9[78][01]\d{2}',                       # GUADELOUPE
        'GQ' => '',                                     # EQUATORIAL GUINEA
        'GR' => '\d{3} ?\d{2}',                         # GREECE
        'GS' => 'SIQQ 1ZZ',                             # SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS
        'GT' => '\d{5}',                                # GUATEMALA
        'GU' => '(969(?:[12]\d|3[12]))(?:[ \-](\d{4}))?',                   # GUAM
        'GW' => '\d{4}',                                # GUINEA-BISSAU
        'GY' => '',                                     # GUYANA

        'HK' => '',                                     # HONG KONG
        'HM' => '',                                     # HEARD AND MC DONALD ISLANDS
        'HN' => '([A-Z])?\d{5}',                        # HONDURAS
        'HR' => '\d{5}',                                # CROATIA
        'HT' => '\d{4}',                                # HAITI
        'HU' => '\d{4}',                                # HUNGARY

        'IC' => '\d{5}',                                # THE CANARY ISLANDS
        'ID' => '\d{5}',                                # INDONESIA
        'IE' => '[\dA-Z]{3} ?[\dA-Z]{4}',               # IRELAND
        'IL' => '\d{5}(?:\d{2})?',                      # ISRAEL
        'IM' => 'IM\d[\dA-Z]? ?\d[ABD-HJLN-UW-Z]{2}',   # Isle of Man
        'IN' => '\d{6}',                                # INDIA
        'IO' => 'BBND 1ZZ',                             # BRITISH INDIAN OCEAN TERRITORY
        'IQ' => '\d{5}',                                # IRAQ
        'IR' => '\d{5}-?\d{5}',                         # IRAN
        'IS' => '\d{3}',                                # ICELAND
        'IT' => '\d{5}',                                # ITALY

        'JE' => 'JE\d[\dA-Z]? ?\d[ABD-HJLN-UW-Z]{2}',   # Jersey
        'JM' => '\d{2}',                                # JAMAICA
        'JO' => '\d{5}',                                # JORDAN
        'JP' => '\d{3}-?\d{4}',                         # JAPAN

        'KE' => '\d{5}',                                # KENYA
        'KG' => '\d{6}',                                # KYRGYZSTAN
        'KH' => '\d{5}',                                # CAMBODIA
        'KI' => '',                                     # KIRIBATI
        'KM' => '',                                     # COMOROS
        'KN' => '',                                     # SAINT KITTS AND NEVIS
        'KO' => '',                                     # Kosovo
        'KP' => '',                                     # NORTH KOREA
        'KR' => '\d{5}',                                # SOUTH KOREA
        'KW' => '\d{5}',                                # KUWAIT
        'KY' => 'KY\d-\d{4}',                           # CAYMAN ISLANDS
        'KZ' => '\d{6}',                                # KAZAKHSTAN

        'LA' => '\d{5}',                                # LAO PEOPLE'S DEMOCRATIC REPUBLIC
        'LB' => '(?:\d{4})(?: ?(?:\d{4}))?',            # LEBANON
        'LC' => 'LC\d{2} \d{3}',                        # SAINT LUCIA
        'LI' => '948[5-9]|949[0-8]',                    # LIECHTENSTEIN
        'LK' => '\d{5}',                                # SRI LANKA
        'LR' => '\d{4}',                                # LIBERIA
        'LS' => '\d{3}',                                # LESOTHO
        'LT' => 'LV-\d{5}',                             # LITHUANIA
        'LU' => '\d{4}',                                # LUXEMBOURG
        'LV' => 'LV-\d{4}',                             # LATVIA
        'LY' => '',                                     # LIBYAN ARAB JAMAHIRIYA

        'MA' => '\d{5}',                                # MOROCCO
        'MC' => '980\d{2}',                             # MONACO
        'MD' => 'MD-?\d{4}',                            # MOLDOVA
        'ME' => '8\d{4}',                               # MONTENEGRO
        'MF' => '9[78][01]\d{2}',                       # Saint-Martin
        'MG' => '\d{3}',                                # MADAGASCAR
        'MH' => '(969[67]\d)(?:[ \-](\d{4}))?',         # MARSHALL ISLANDS
        'MK' => '\d{4}',                                # MACEDONIA
        'ML' => '',                                     # MALI
        'MM' => '\d{5}',                                # MYANMAR
        'MN' => '\d{5}',                                # MONGOLIA
        'MO' => '',                                     # MACAU
        'MP' => '(9695[012])(?:[ \-](\d{4}))?',         # SAIPAN, NORTHERN MARIANA ISLANDS
        'MQ' => '9[78]2\d{2}',                          # MARTINIQUE
        'MR' => '',                                     # MAURITANIA
        'MS' => '',                                     # MONTSERRAT
        'MT' => '[A-Z]{3} ?\d{2,4}',                    # MALTA
        'MU' => '\d{3}(?:\d{2}|[A-Z]{2}\d{3})',         # MAURITIUS
        'MV' => '\d{5}',                                # MALDIVES
        'MW' => '',                                     # MALAWI
        'MX' => '\d{5}',                                # MEXICO
        'MY' => '\d{5}',                                # MALAYSIA
        'MZ' => '\d{4}',                                # MOZAMBIQUE

        'NA' => '\d{5}',                                # NAMIBIA
        'NC' => '988\d{2}',                             # NEW CALEDONIA
        'NE' => '\d{4}',                                # NIGER
        'NF' => '\d{4}',                                # NORFOLK ISLAND
        'NG' => '\d{6}',                                # NIGERIA
        'NI' => '\d{5}',                                # NICARAGUA
        'NL' => '\d{4} ?[A-Z]{2}',                      # NETHERLANDS
        'NO' => '\d{4}',                                # NORWAY
        'NP' => '\d{5}',                                # NEPAL
        'NR' => '',                                     # NAURU
        'NU' => '',                                     # NIUE
        'NZ' => '\d{4}',                                # NEW ZEALAND

        'OM' => '(?:PC )?\d{3}',                        # OMAN

        'PA' => '\d{4}',                                # PANAMA
        'PE' => '(?:LIMA \d{1,2}|CALLAO 0?\d)|[0-2]\d{4}', # PERU
        'PF' => '987\d{2}',                             # FRENCH POLYNESIA
        'PG' => '\d{3}',                                # PAPUA NEW GUINEA
        'PH' => '\d{4}',                                # PHILIPPINES
        'PK' => '\d{5}',                                # PAKISTAN
        'PL' => '\d{2}-\d{3}',                          # POLAND
        'PM' => '9[78]5\d{2}',                          # ST. PIERRE AND MIQUELON
        'PN' => 'PCRN 1ZZ',                             # PITCAIRN
        'PR' => '(00[679]\d{2})(?:[ \-](\d{4}))?',      # PUERTO RICO
        'PS' => '',                                     # PALESTINIAN TERRITORY
        'PT' => '\d{4}-\d{3}',                          # PORTUGAL
        'PW' => '(969(?:39|40))(?:[ \-](\d{4}))?',      # PALAU
        'PY' => '\d{4}',                                # PARAGUAY

        'QA' => '',                                     # QATAR

        'RE' => '9[78]4\d{2}',                          # REUNION
        'RO' => '\d{6}',                                # ROMANIA
        'RS' => '\d{5,6}',                              # SERBIA
        'RU' => '\d{6}',                                # RUSSIA
        'RW' => '',                                     # RWANDA

        'SA' => '\d{5}|\d{5}-\d{4}',                    # SAUDI ARABIA
        'SB' => '',                                     # SOLOMON ISLANDS
        'SC' => '',                                     # SEYCHELLES
        'SD' => '\d{5}',                                # SUDAN
        'SE' => '\d{3} ?\d{2}',                         # SWEDEN
        'SG' => '\d{6}',                                # SINGAPORE
        'SH' => '(?:ASCN|STHL) 1ZZ',                    # ST. HELENA
        'SI' => '(SI-)?\d{4}',                          # SLOVENIA
        'SJ' => '\d{4}',                                # SVALBARD AND JAN MAYEN ISLANDS
        'SK' => '\d{3} ?\d{2}',                         # SLOVAKIA
        'SL' => '',                                     # SIERRA LEONE
        'SM' => '4789\d',                               # SAN MARINO
        'SN' => '\d{5}',                                # SENEGAL
        'SO' => '[A-Z]{2} ?\d{5}',                      # SOMALIA
        'SR' => '',                                     # SURINAME
        'SS' => '\d{5}',                                # SOUTH SUDAN
        'ST' => '',                                     # SAO TOME AND PRINCIPE
        'SV' => '\d{4}',                                # EL SALVADOR
        'SX' => '',                                     # Sint Maarten
        'SY' => '',                                     # SYRIAN ARAB REPUBLIC
        'SZ' => '[HLMS]\d{3}',                          # SWAZILAND

        'TA' => 'TDCU 1ZZ',                             # Tristan da Cunha
        'TC' => 'TKCA 1ZZ',                             # TURKS AND CAICOS ISLANDS
        'TD' => '',                                     # CHAD
        'TF' => '',                                     # FRENCH SOUTHERN TERRITORIES
        'TG' => '',                                     # TOGO
        'TH' => '\d{5}',                                # THAILAND
        'TJ' => '\d{6}',                                # TAJIKISTAN
        'TK' => '',                                     # TOKELAU
        'TL' => '',                                     # EAST TIMOR
        'TM' => '\d{6}',                                # TURKMENISTAN
        'TN' => '\d{4}',                                # TUNISIA
        'TO' => '',                                     # TONGA
        'TR' => '\d{5}',                                # TURKEY
        'TT' => '\d{6}',                                # TRINIDAD AND TOBAGO
        'TV' => '',                                     # TUVALU
        'TW' => '\d{3}(?:\d{2})?',                      # TAIWAN
        'TZ' => '\d{4,5}',                              # TANZANIA

        'UA' => '\d{5}',                                # UKRAINE
        'UG' => '',                                     # UGANDA
        'UM' => '96898',                                # UNITED STATES MINOR OUTLYING ISLANDS
        'US' => '(\d{5})(?:[ \-](\d{4}))?',             # USA
        'UY' => '\d{5}',                                # URUGUAY
        'UZ' => '\d{6}',                                # USBEKISTAN

        'VA' => '00120',                                # VATICAN CITY STATE
        'VC' => 'VC\d{4}',                              # SAINT VINCENT AND THE GRENADINES
        'VE' => '\d{4}',                                # VENEZUELA
        'VG' => 'VG\d{4}',                              # VIRGIN ISLANDS (BRITISH)
        'VI' => '(008(?:(?:[0-4]\d)|(?:5[01])))(?:[ \-](\d{4}))?',                  # VIRGIN ISLANDS (U.S.)
        'VN' => '\d{6}',                                # VIETNAM
        'VU' => '',                                     # VANUATU

        'WF' => '986\d{2}',                             # WALLIS AND FUTUNA ISLANDS
        'WS' => 'WS\d{4}',                              # SAMOA

        'YE' => '',                                     # YEMEN
        'YT' => '976\d{2}',                             # MAYOTTE

        'ZA' => '\d{4}',                                # SOUTH AFRICA
        'ZM' => '\d{5}',                                # ZAMBIA
        'ZW' => '',                                     # ZIMBABWE
    );

    public function isValid($countryCode, $postalCode, $caseSensitive = false)
    {
        if (!isset($this->formats[$countryCode])) {
            throw new ValidationException(sprintf('Invalid country code: "%s"', $countryCode));
        }
        
        if ($this->formats[$countryCode] == '') {
            return true;
        }

        if (preg_match($this->getFormatPattern($this->formats[$countryCode], $caseSensitive), $postalCode)) {
            return true;
        }
        
        return false;
    }
    
    public function getFormats($countryCode)
    {
        if(!isset($this->formats[$countryCode]))
        {
            throw new ValidationException(sprintf('Invalid country code: "%s"', $countryCode));
        }
        
        return $this->formats[$countryCode];
    }
    
    public function hasCountry($countryCode)
    {
        return (isset($this->formats[$countryCode]));
    }
    
    protected function getFormatPattern($format, $caseSensitive)
    {
        if ($caseSensitive) {
            return '/^' . $format . '$/';
        } else {
            return '/^' . $format . '$/i';
        }
    }
}
