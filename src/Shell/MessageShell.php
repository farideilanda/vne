<?php 
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Mailer\MailerAwareTrait;
use Cake\Mailer\Email;
use Pheanstalk\Pheanstalk;

class MessageShell extends Shell
{
  use MailerAwareTrait;

  public function main()
  {
    $this->listen();
  }

  public function listen()
  {
    $client = new Pheanstalk('127.0.0.1');
    $client->watch('MessageSendTubeVne');

    while($job = $client->reserve()){
      $message =json_decode($job->getData(),true);
      
          $status = $this->send($message['content']);
          if($status)
          {
            $client->delete($job);
            $this->out('Job Delete');
          }
          else
          {
            $client->bury($job);
            $this->out('Job Burried');
          }
    }
  }

  public function send($content){    
     try
         {
            $email = new Email('vne_main_profile');
            $email->to('info@vne-ci.com')
            ->subject('⏳ Message Visiteur')
            ->template('message','blank') 
            ->emailFormat('html')
            ->viewVars(['content'=>$content])
            ->send();
              return true;
          }catch(Exception $e){
            return false;
          }
  }
}