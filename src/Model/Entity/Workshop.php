<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Workshop Entity
 *
 * @property int $id
 * @property string $workshop_theme
 * @property string $workshop_short_description
 * @property string $workshop_long_description
 * @property string $workshop_long_description_2
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $deleted
 * @property \Cake\I18n\FrozenTime $workshop_begin
 * @property string $workshop_visual_path
 * @property int $it_domain_id
 * @property int $it_editor_solution_id
 *
 * @property \App\Model\Entity\ItDomain $it_domain
 * @property \App\Model\Entity\ItEditorSolution $it_editor_solution
 */
class Workshop extends Entity
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
