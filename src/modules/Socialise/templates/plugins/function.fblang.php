<?php
/**
 * Copyright Socialise Team 2011
 *
 * @license GNU/GPLv3 (or at your option, any later version).
 * @package Socialise
 * @link https://github.com/phaidon/Socialise
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Smarty plugin to display a sexybookmarks buttons.
 *
 *  Available parameters
 *
 *   url: The URL of the item to submit to the social bookmarking site(s)
 *   title: The title of the item to submit to the social bookmarking site(s)
 *
 * Examples
 *   For the News module: {sexybookmarks url=$links.permalink title=$info.title}
 *   For a Clip publication: {sexybookmarks url=$returnurl title=$pubdata.core_title}
 *
 * @param array  $params All attributes passed to this function from the template.
 * @param object &$view  Reference to the Smarty object.
 *
 * @link  https://www.facebook.com/translations/FacebookLocales.xml
 *
 * @return string
 */
function smarty_function_fblang($params, &$view)
{
    // TODO browser check to allow omited variants
    $supported = array(
        'af' => 'af_ZA',
        'sq' => 'sq_AL',
        'ar' => 'ar_AR',
        'hy' => 'hy_AM',
        'ay' => 'ay_BO',
        'az' => 'az_AZ',
        'eu' => 'eu_ES',
        'be' => 'be_BY',
        'bn' => 'bn_IN',
        'bs' => 'bs_BA',
        'bg' => 'bg_BG',
        'ca' => 'ca_ES',
        'cs' => 'cs_CZ',
        'zh' => 'zh_CH',
        'cy' => 'cy_GB',
        'da' => 'da_DK',
        'de' => 'de_DE',
        'el' => 'el_GR',
        'en' => 'en_US',
        'eo' => 'eo_EO',
        'et' => 'et_EE',
        'eu' => 'eu_ES',
        'fo' => 'fo_FO',
        'fi' => 'fi_FI',
        'fr' => 'fr_FR',
        'ka' => 'ka_GE',
        'ga' => 'ga_IE',
        'gl' => 'gl_ES',
        'gn' => 'gn_PY',
        'gu' => 'gu_IN',
        'he' => 'he_IL',
        'hi' => 'hi_IN',
        'hr' => 'hr_HR',
        'hu' => 'hu_HU',
        'is' => 'is_IS',
        'id' => 'id_ID',
        'it' => 'it_IT',
        'jv' => 'jv_ID',
        'ja' => 'ja_JP',
        'kn' => 'kn_IN',
        'kk' => 'kk_KZ',
        'km' => 'km_KH',
        'ko' => 'ko_KR',
        'ku' => 'ku_TR',
        'la' => 'la_VA',
        'lv' => 'lv_LV',
        'li' => 'li_NL',
        'lt' => 'lt_LT',
        'mk' => 'mk_MK',
        'ml' => 'ml_IN',
        'mr' => 'mr_IN',
        'mg' => 'mg_MG',
        'mt' => 'mt_MT',
        'mn' => 'mn_MN',
        'ms' => 'ms_MY',
        'ne' => 'ne_NP',
        'nl' => 'nl_NL',
        'nn' => 'nn_NO',
        'nb' => 'nb_NO',
        'pa' => 'pa_IN',
        'fa' => 'fa_IR',
        'pl' => 'pl_PL',
        'pt' => 'pt_PT',
        'ps' => 'ps_AF',
        'qu' => 'qu_PE',
        'rm' => 'rm_CH',
        'ro' => 'ro_RO',
        'ru' => 'ru_RU',
        'sa' => 'sa_IN',
        'sr' => 'sr_RS',
        'sk' => 'sk_SK',
        'sl' => 'sl_SI',
        'se' => 'se_NO',
        'so' => 'so_SO',
        'es' => 'es_LA',
        'sw' => 'sw_KE',
        'sv' => 'sv_SE',
        'ta' => 'ta_IN',
        'tt' => 'tt_RU',
        'te' => 'te_IN',
        'tg' => 'tg_TJ',
        'tl' => 'tl_PH',
        'th' => 'th_TH',
        'tr' => 'tr_TR',
        'uk' => 'uk_UA',
        'ur' => 'ur_PK',
        'uz' => 'uz_UZ',
        'vi' => 'vi_VN',
        'xh' => 'xh_ZA',
        'yi' => 'yi_DE',
        'zh' => 'zh_CN',
        'zu' => 'zu_ZA'
    );

    $locale = substr(ZLanguage::getLanguageCode(), 0, 2);
    $locale = isset($supported[$locale]) ? $supported[$locale] : 'en_US';

    if (isset($params['assign'])) {
        $view->assign($params['assign'], $locale);
    } else {
        return $locale;
    }
}
