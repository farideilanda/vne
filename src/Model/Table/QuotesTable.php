<?php
namespace App\Model\Table;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;

/**
 * Quotes Model
 *
 * @property \App\Model\Table\ItSolutionTypesTable|\Cake\ORM\Association\BelongsTo $ItSolutionTypes
 * @property |\Cake\ORM\Association\BelongsTo $ItEditorSolutions
 *
 * @method \App\Model\Entity\Quote get($primaryKey, $options = [])
 * @method \App\Model\Entity\Quote newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Quote[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Quote|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quote patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Quote[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Quote findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuotesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('quotes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ItSolutionTypes', [
            'foreignKey' => 'it_solution_type_id',
            'joinType' => 'INNER'
        ]);


        $this->belongsTo('ItEditorSolutions', [
            'foreignKey' => 'it_editor_solution_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('quote_subscriber_fullname')
            ->requirePresence('quote_subscriber_fullname', 'create')
            ->notEmpty('quote_subscriber_fullname')
            ->add('quote_subscriber_fullname',[
                'maxLength-fullname' => [
                    'rule' => ['maxLength',100]
                ]
            ]);
        $validator
            ->scalar('quote_subscriber_email')
            ->requirePresence('quote_subscriber_email', 'create')
            ->notEmpty('quote_subscriber_email')
             ->add('quote_subscriber_email',[
                  'pattern-email' => [ 'rule' => ['email',true,'/^[a-zA-Z0-9._-]+@[a-zA-Z0-9_-]+\.[a-zA-Z0-9]{2,6}$/'],
                        'message' => 'email is not valid'
                  ],
                'maxLength-email' => [
                    'rule' => ['maxLength',100]
                ],

             ]);

        //additional validator email
        $validator
            ->scalar('quote_subscriber_tel')
            ->requirePresence('quote_subscriber_tel', 'create')
            ->notEmpty('quote_subscriber_tel')
            ->add('quote_subscriber_tel',[
                'pattern-phone' => [
                    'rule' => ['custom','/^[0-9]{8}$/']
                ]
            ]);

        $validator
            ->boolean('quote_is_enterprise')
            ->requirePresence('quote_is_enterprise', 'create')
            ->notEmpty('quote_is_enterprise');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        return $validator;
    }

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options){
        $data['it_solution_type_id'] = $data['type']['id'];
        $data['it_editor_solution_id'] = $data['solution']['id'];
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['it_solution_type_id'], 'ItSolutionTypes'));
        $rules->add($rules->existsIn(['it_editor_solution_id'], 'ItEditorSolutions'));

        return $rules;
    }
}
