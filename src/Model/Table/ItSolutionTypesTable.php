<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ItSolutionTypes Model
 *
 * @property \App\Model\Table\CrossSolutionTypesTable|\Cake\ORM\Association\HasMany $CrossSolutionTypes
 *
 * @method \App\Model\Entity\ItSolutionType get($primaryKey, $options = [])
 * @method \App\Model\Entity\ItSolutionType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ItSolutionType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ItSolutionType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ItSolutionType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ItSolutionType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ItSolutionType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ItSolutionTypesTable extends Table
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

        $this->setTable('it_solution_types');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CrossSolutionTypes', [
            'foreignKey' => 'it_solution_type_id'
        ]);

        $this->belongsToMany('ItEditorSolutions', [
            'foreignKey' => 'it_solution_type_id',
            'targetForeignKey'=>'it_editor_solution_id',
            'joinTable' => 'cross_solution_types'
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
            ->scalar('type_label')
            ->requirePresence('type_label', 'create')
            ->notEmpty('type_label');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        return $validator;
    }
}
