<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItDomains Model
 *
 * @property \App\Model\Table\CrossDomainSolutionsTable|\Cake\ORM\Association\HasMany $CrossDomainSolutions
 *
 * @method \App\Model\Entity\ItDomain get($primaryKey, $options = [])
 * @method \App\Model\Entity\ItDomain newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ItDomain[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ItDomain|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ItDomain patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ItDomain[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ItDomain findOrCreate($search, callable $callback = null, $options = [])
 */
class ItDomainsTable extends Table
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

        $this->setTable('it_domains');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('CrossDomainSolutions', [
            'foreignKey' => 'it_domain_id'
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
            ->scalar('domain_label')
            ->requirePresence('domain_label', 'create')
            ->notEmpty('domain_label');

        return $validator;
    }
}
