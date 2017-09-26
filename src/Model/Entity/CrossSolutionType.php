<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CrossSolutionType Entity
 *
 * @property int $id
 * @property int $it_solution_id
 * @property int $it_solution_type_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $deleted
 *
 * @property \App\Model\Entity\ItSolution $it_solution
 * @property \App\Model\Entity\ItSolutionType $it_solution_type
 */
class CrossSolutionType extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
