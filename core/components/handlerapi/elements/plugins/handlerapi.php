<?php
/** @var modX $modx */
switch ($modx->event->name) {
    case 'OnHandleRequest':
        $alias = $modx->context->getOption('request_param_alias', 'q');
        if (!isset($_REQUEST[$alias])) return;
        
        $request = trim($_REQUEST[$alias], '/');
        $pieces = explode('/', $request);
        if (array_shift($pieces) !== 'api') return;
        if (count($pieces) > 1) return;
        
        $section = array_shift($pieces);
        $ext = pathinfo($section, PATHINFO_EXTENSION);
        if ($ext != 'json') return;
        
        if ($name = basename($section, '.' . $ext)) {
            $modelPath = $modx->getOption('handlerapi_core_path',null,$modx->getOption('core_path').'components/handlerapi/').'model/';
            $modx->addPackage('handlerapi', $modelPath);
            if ($handler = $modx->getObject('HandlerAPIItem', ['name' => $name])) {
                $output = ['result' => ''];
                $result = $handler->get('content');
                $maxIterations= (integer) $modx->getOption('parser_max_iterations', null, 10);
                $modx->getParser()->processElementTags('', $result, false, false, '[[', ']]', [], $maxIterations);
                $modx->getParser()->processElementTags('', $result, true, true, '[[', ']]', [], $maxIterations);
                $output['result'] = $result;
                header('Content-Type: application/json');
                echo $modx->toJSON($output);
                exit;
            }
        }
        break;
}