<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    $dev = MODX_BASE_PATH . 'Extras/HandlerAPI/';
    /** @var xPDOCacheManager $cache */
    $cache = $modx->getCacheManager();
    if (file_exists($dev) && $cache) {
        if (!is_link($dev . 'assets/components/handlerapi')) {
            $cache->deleteTree(
                $dev . 'assets/components/handlerapi/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_ASSETS_PATH . 'components/handlerapi/', $dev . 'assets/components/handlerapi');
        }
        if (!is_link($dev . 'core/components/handlerapi')) {
            $cache->deleteTree(
                $dev . 'core/components/handlerapi/',
                ['deleteTop' => true, 'skipDirs' => false, 'extensions' => []]
            );
            symlink(MODX_CORE_PATH . 'components/handlerapi/', $dev . 'core/components/handlerapi');
        }
    }
}

return true;