<?php 
/**
	Admin Page Framework v3.8.26b01 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/amazon-auto-links>
	Copyright (c) 2013-2020, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
class AmazonAutoLinks_AdminPageFramework_AdminNotice extends AmazonAutoLinks_AdminPageFramework_FrameworkUtility {
    static private $_aNotices = array();
    public $sNotice = '';
    public $aAttributes = array();
    public $aCallbacks = array('should_show' => null,);
    public function __construct($sNotice, array $aAttributes = array('class' => 'error'), array $aCallbacks = array()) {
        $this->aAttributes = $aAttributes + array('class' => 'error',);
        $this->aAttributes['class'] = $this->getClassAttribute($this->aAttributes['class'], 'amazon-auto-links-settings-notice-message', 'amazon-auto-links-settings-notice-container', 'notice', 'is-dismissible');
        $this->aCallbacks = $aCallbacks + $this->aCallbacks;
        new AmazonAutoLinks_AdminPageFramework_AdminNotice___Script;
        if (!$sNotice) {
            return;
        }
        $this->sNotice = $sNotice;
        self::$_aNotices[$sNotice] = $sNotice;
        $this->registerAction('admin_notices', array($this, '_replyToDisplayAdminNotice'));
        $this->registerAction('network_admin_notices', array($this, '_replyToDisplayAdminNotice'));
    }
    public function _replyToDisplayAdminNotice() {
        if (!$this->_shouldProceed()) {
            return;
        }
        $_aAttributes = $this->aAttributes + array('style' => '');
        $_aAttributes['style'] = $this->getStyleAttribute($_aAttributes['style'], 'display: none');
        echo "<div " . $this->getAttributes($_aAttributes) . ">" . "<p>" . self::$_aNotices[$this->sNotice] . "</p>" . "</div>" . "<noscript>" . "<div " . $this->getAttributes($this->aAttributes) . ">" . "<p>" . self::$_aNotices[$this->sNotice] . "</p>" . "</div>" . "</noscript>";
        unset(self::$_aNotices[$this->sNotice]);
    }
    private function _shouldProceed() {
        if (!is_callable($this->aCallbacks['should_show'])) {
            return true;
        }
        return call_user_func_array($this->aCallbacks['should_show'], array(true,));
    }
    }
    