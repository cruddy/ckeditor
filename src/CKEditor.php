<?php

namespace Kalnoy\Cruddy\CKEditor;

use Kalnoy\Cruddy\Schema\Fields\BaseTextField;

/**
 * A CKEditor field.
 *
 * @method $this config(array $options)
 */
class CKEditor extends BaseTextField {

    /**
     * @return string
     */
    protected function modelClass()
    {
        return 'Cruddy.Fields.CKEditor';
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'editor_options' => $this->get('config', []),

        ] + parent::toArray();
    }
}