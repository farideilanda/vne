<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * WorkshopSubscriber Entity
 *
 * @property int $id
 * @property int $subscriber_email
 * @property int $subscriber_fullname
 * @property int $subscriber_company
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $deleted
 * @property int $worshop_id
 *
 * @property \App\Model\Entity\Worshop $worshop
 */
class WorkshopSubscriber extends Entity
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
