<?php
return array(
    'name' => 'featured',
    'elements' => array(
        'name' => array(
            'type' => 'text',
            'label' => t('Title'),
            'validators' => array('Required'),
        ),
        'body' => array(
            'type' => 'editor',
            'validators' => array('Required'),
        ),
        'save' => array(
            'type' => 'submit',
            'label' => t('Save')
        ),
    )
);