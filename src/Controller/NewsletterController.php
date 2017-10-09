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
class NewsletterController extends AppController
{

    public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function beforeFilter(Event $event){
        parent::initialize($event);
    }

    public function subscribe(){
        if($this->request->is('ajax')){
            if($this->request->is('post')){
                try{
                    $data = $this->request->data;
                    $this->loadModel('ItNewsletters');
                    $newsletter_exist = $this->ItNewsletters->find()->where(['newsletter_email'=>$data['newsletter_email']])->first();

                    if($newsletter_exist)
                    {
                        if($newsletter_exist->deleted==null)
                            throw new Exception\UnauthorizedException(__('Unauthorized'));
                        else
                        {
                          $newsletter_exist->deleted = null;
                          if($this->ItNewsletters->save($newsletter_exist))
                          {       
                                 $message = 'ok';
                                 $this->RequestHandler->renderAs($this, 'json');
                                 $this->set(compact('message'));
                                 $this->set('_serialize',['message']);  
                          }
                          else
                            throw new Exception\BadRequestException(__('Bad Request'));
                        }

                    }
                    else
                    {
                        $newsletter = $this->ItNewsletters->newEntity($data);
     
                        if(!$newsletter->errors())
                        {
                            if($this->ItNewsletters->save($newsletter))
                            {
                               //send newsleter in a pipe
                               $pheanstalk = new Pheanstalk('127.0.0.1');
                               $payload = ['newsletter'=>$newsletter];
                               $pheanstalk
                               ->useTube('NewsletterSubscribeTubeVne')
                               ->put(json_encode($payload));
                               $this->RequestHandler->renderAs($this, 'json');
                               $this->set(compact('newsletter'));
                               $this->set('_serialize',['newsletter']);  
                            }else
                            {

                                if($newsletter->errors()['newsletter_email']['_isUnique'])
                                    throw new Exception\UnauthorizedException(__('Unauthorized'));
                                else
                                    throw new Exception\BadRequestException(__('Bad Request'));

                            }
                        }
                        else
                        {
                            throw new Exception\BadRequestException(__('Bad Request'));
                        }
                    }

                }catch(Exception $e){
                      throw new Exception\BadRequestException(__('Bad Request'));
                }        
            }
        }
    }

    public function unsubscribe(){
        if($this->request->is('get')){
            $token = $this->request->params['token'];
            if($token)
            {
                try{
                   $this->loadModel('ItNewsletters');
                   $newsletter = $this->ItNewsletters->find()->where(['newsletter_token'=>$token])->first();

                   if(count($newsletter)>0)
                   {
                     if($newsletter->deleted)
                     {
                            $this->Flash->error(__('Action non autorisée'));
                            return $this->redirect($this->referer());
                     }else
                     {
                         $newsletter->deleted = new \DateTime('NOW');
                         if($this->ItNewsletters->save($newsletter))
                         {
                            $this->Flash->success(__('Vous avez été retiré de l\'abonnement newsletter-vne'));
                            return $this->redirect($this->referer());
                         }
                         else
                           throw new Exception\BadRequestException(__('Unauthorized'));
                     }


                   }else
                   {
                    throw new Exception\UnauthorizedException(__('Unauthorized'));
                   }

                }catch(Exception $e){
                    throw new Exception\UnauthorizedException(__('Unauthorized'));
                }


            }
            // debug($params);
            // die();

        }
    }

}
