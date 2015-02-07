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
     * {@inheritdoc}
     */
    protected $class = 'Cruddy.Fields.CKEditor';

    /**
     * {@inheritdoc}
     */
    protected $type = 'ckeditor';

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