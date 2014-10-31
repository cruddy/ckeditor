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
    protected $class = 'Cruddy.Fields.CKEditor';

    /**
     * {@inheritdoc}
     */
    protected $type = 'ckeditor';

}