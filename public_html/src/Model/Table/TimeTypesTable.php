<?php

namespace App\Model\Table;

use Cake\ORM\Table;
// Used for Validating Data.
use Cake\Validation\Validator;
// Used for having consistent Validation Messages.
use App\Model\Components\ValidationMessages;
use Cake\Routing\Router;

/**
 * TimeTypes Table Model
 *
 * @package Cake\ORM\Table
 * @package Cake\Validation\Validator
 *
 * @extends Cake\ORM\Table
 *
 * @since   0.1 Since the beginning of this Application.
 * @version 0.1
 *
 * @author Sander Tuinstra <sandert2001@hotmail.com>
 */
class TimeTypesTable extends Table
{
    private $userId = null;

    /**
     * Public Function validationDefault
     *
     * Validates the data to save.
     *
     * @access public
     *
     * @param Cake\Validation\Validator $validator => Stores all the validation rules.
     *
     * @return Cake\Validation\Validator $validator => Returns the Validator Object with all the Validation Rules in it now.
     */
    public function validationDefault(Validator $validator)
    {
        // @TODO Validation Rules
        return $validator;
    }

    /**
     * Public Function initialize
     *
     * Initializes the Model with the parents' configuration and its own.
     *
     * @access public
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->userId = Router::getRequest()->getSession()->read('Auth.User.ID');
    }

    /**
     * Public Function beforeFind
     *
     * Function which is fired before a query is executed.
     *
     * @access public
     *
     * @param Event       $event
     * @param Query       $query
     * @param ArrayObject $options
     * @param bool        $primary => Tells whether or not this query is the root query.
     *
     * @return Query $query => Containing the altered query.
     */
    public function beforeFind(
        $event,
        $query,
        $options,
        $primary
    ) {
        $query->where([
            'TimeTypes.user_id' => $this->userId
        ]);

        return $query;
    }

    /**
     * Public Function getAll
     *
     * Gets all the Records by the Logged In User.
     *
     * @return Cake\ORM\ResultSet => Containing the found Records.
     */
    public function getAll()
    {
        return $this->find('all')->all();
    }
}
