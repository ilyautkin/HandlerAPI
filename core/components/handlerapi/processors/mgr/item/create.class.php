<?php

class HandlerAPIItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'HandlerAPIItem';
    public $classKey = 'HandlerAPIItem';
    public $languageTopics = ['handlerapi'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('handlerapi_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('handlerapi_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'HandlerAPIItemCreateProcessor';