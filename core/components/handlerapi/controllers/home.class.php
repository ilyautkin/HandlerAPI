<?php

/**
 * The home manager controller for HandlerAPI.
 *
 */
class HandlerAPIHomeManagerController extends modExtraManagerController
{
    /** @var HandlerAPI $HandlerAPI */
    public $HandlerAPI;


    /**
     *
     */
    public function initialize()
    {
        $this->HandlerAPI = $this->modx->getService('HandlerAPI', 'HandlerAPI', MODX_CORE_PATH . 'components/handlerapi/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['handlerapi:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('handlerapi');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->HandlerAPI->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->HandlerAPI->config['jsUrl'] . 'mgr/handlerapi.js');
        $this->addJavascript($this->HandlerAPI->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->HandlerAPI->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->HandlerAPI->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->HandlerAPI->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->HandlerAPI->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->HandlerAPI->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        HandlerAPI.config = ' . json_encode($this->HandlerAPI->config) . ';
        HandlerAPI.config.connector_url = "' . $this->HandlerAPI->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "handlerapi-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .= '<div id="handlerapi-panel-home-div"></div>';

        return '';
    }
}