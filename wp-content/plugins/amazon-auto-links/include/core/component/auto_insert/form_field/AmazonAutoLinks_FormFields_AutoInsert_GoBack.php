<?php
/**
 * Amazon Auto Links
 *
 * Generates links of Amazon products just coming out today. You just pick categories and they appear even in JavaScript disabled browsers.
 *
 * http://en.michaeluno.jp/amazon-auto-links/
 * Copyright (c) 2013-2021 Michael Uno
 */

/**
 * Provides the definitions of form fields.
 * 
 * @since           3  
 */
class AmazonAutoLinks_FormFields_AutoInsert_GoBack extends AmazonAutoLinks_FormFields_Base {

    /**
     * Returns field definition arrays.
     * 
     * Pass an empty string to the parameter for meta box options. 
     * 
     * @return      array
     */    
    public function get( $sFieldIDPrefix='' ) {
        return array(
            array(
                'field_id'      => $sFieldIDPrefix . 'submit_go_back',
                'type'          => 'submit',
                'value'             => __( 'Go Back', 'amazon-auto-links' ),
                'label_min_width'   => 0,
                'show_title_column' => false,
                'attributes'        => array(
                    'class' => 'button-secondary',
                    'field' => array(
                        'style' => 'float:right; clear:none; display: inline;',
                    ),
                ),         
                'href'          => add_query_arg(
                    array(
                        'post_type' => AmazonAutoLinks_Registry::$aPostTypes[ 'auto_insert' ],
                    ),
                    admin_url( 'edit.php' )
                ),
                'save'          => false,
            )
        );
    }
  
}