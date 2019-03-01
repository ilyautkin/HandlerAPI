<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
} else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var HandlerAPI $HandlerAPI */
$HandlerAPI = $modx->getService('HandlerAPI', 'HandlerAPI', MODX_CORE_PATH . 'components/handlerapi/model/');
$modx->lexicon->load('handlerapi:default');

// handle request
$corePath = $modx->getOption('handlerapi_core_path', null, $modx->getOption('core_path') . 'components/handlerapi/');
$path = $modx->getOption('processorsPath', $HandlerAPI->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest([
    'processors_path' => $path,
    'location' => '',
]);