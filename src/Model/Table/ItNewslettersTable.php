<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItNewsletters Model
 *
 * @method \App\Model\Entity\ItNewsletter get($primaryKey, $options = [])
 * @method \App\Model\Entity\ItNewsletter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ItNewsletter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ItNewsletter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ItNewsletter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ItNewsletter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ItNewsletter findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ItNewslettersTable extends Table
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

        $this->setTable('it_newsletters');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('newsletter_email')
            ->requirePresence('newsletter_email', 'create')
            ->notEmpty('newsletter_email')
            ->add('newsletter_email',[
                'email' => [
                    'rule' => ['email',true,'/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-z]{2,8}$/'],
                    'message' => 'email is invalid'
                ]
            ]);

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->scalar('newsletter_token')
            ->requirePresence('newsletter_token', 'create')
            ->notEmpty('newsletter_token');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['newsletter_email']));
        $rules->add($rules->isUnique(['newsletter_token']));
        return $rules;
    }

    
}
