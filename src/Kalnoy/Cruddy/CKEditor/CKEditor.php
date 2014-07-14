<?php

namespace Kalnoy\Cruddy\CKEditor;

use Kalnoy\Cruddy\Schema\Fields\BaseTextField;

/**
 * A CKEditor field.
 */
class CKEditor extends BaseTextField {

    /**
     * {@inheritdoc}
     */
    protected $class = 'CKEditor';

    /**
     * {@inheritdoc}
     */
    protected $type = 'ckeditor';

}