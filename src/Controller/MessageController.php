<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Pheanstalk\Pheanstalk;
use App\Controller\AppController;
use Cake\Network\Exception;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class MessageController extends AppController
{

    public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function beforeFilter(Event $event){
        parent::initialize($event);
    }

    public function send(){
      if($this->request->is('ajax')){
        if($this->request->is('post'))
        {
          try{
            $data = $this->request->data;
            $pheanstalk = new Pheanstalk('127.0.0.1');
            $payload = ['content'=>$data];
            $pheanstalk
            ->useTube('MessageSendTubeVne')
            ->put(json_encode($payload));

            $response = ['message'=>'ok'];

            $this->RequestHandler->renderAs($this, 'json');
            $this->set(compact('response'));
            $this->set('_serialize',['response']);
          }catch(Exception $e){
              throw new Exception\BadRequestException(__('Bad Request'));
          }
        }else
              throw new Exception\BadRequestException(__('Bad Request'));

      }else
              throw new Exception\BadRequestException(__('Bad Request'));
      
    }

}
