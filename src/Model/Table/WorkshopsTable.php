<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Workshops Model
 *
 * @property \App\Model\Table\ItDomainsTable|\Cake\ORM\Association\BelongsTo $ItDomains
 * @property \App\Model\Table\ItEditorSolutionsTable|\Cake\ORM\Association\BelongsTo $ItEditorSolutions
 *
 * @method \App\Model\Entity\Workshop get($primaryKey, $options = [])
 * @method \App\Model\Entity\Workshop newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Workshop[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Workshop|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Workshop patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Workshop[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Workshop findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WorkshopsTable extends Table
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

        $this->setTable('workshops');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ItDomains', [
            'foreignKey' => 'it_domain_id',
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
            ->scalar('workshop_theme')
            ->requirePresence('workshop_theme', 'create')
            ->notEmpty('workshop_theme');

        $validator
            ->scalar('workshop_short_description')
            ->requirePresence('workshop_short_description', 'create')
            ->notEmpty('workshop_short_description');

        $validator
            ->scalar('workshop_long_description')
            ->requirePresence('workshop_long_description', 'create')
            ->notEmpty('workshop_long_description');

        $validator
            ->scalar('workshop_long_description_2')
            ->requirePresence('workshop_long_description_2', 'create')
            ->notEmpty('workshop_long_description_2');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->dateTime('workshop_begin')
            ->requirePresence('workshop_begin', 'create')
            ->notEmpty('workshop_begin');

        $validator
            ->scalar('workshop_visual_path')
            ->requirePresence('workshop_visual_path', 'create')
            ->notEmpty('workshop_visual_path');

        return $validator;
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
        $rules->add($rules->existsIn(['it_domain_id'], 'ItDomains'));
        $rules->add($rules->existsIn(['it_editor_solution_id'], 'ItEditorSolutions'));
        return $rules;
    }
}
