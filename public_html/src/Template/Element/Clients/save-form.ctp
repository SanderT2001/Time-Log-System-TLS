<?
/**
 * Client Entity Save Form.
 */
?>
<?
    echo $this->Form->create('client', [
        'url' => [
            'plugin'     => false,
            'controller' => 'Clients',
            'action'     => 'add'
        ]
    ]);
        echo $this->Form->control(__('first_name'), [
            'type'     => 'text',
            'required' => true
        ]);

        echo $this->Form->control(__('middle_name'), [
            'type'     => 'text',
            'required' => true
        ]);

        echo $this->Form->control(__('last_name'), [
            'type'     => 'text',
            'required' => true
        ]);

        echo $this->Form->control(__('description'), [
            'type'     => 'text',
            'required' => true
        ]);
    echo $this->Form->end();
?>
