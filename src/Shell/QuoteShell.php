<?php 
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Mailer\MailerAwareTrait;
use Cake\Mailer\Email;
use Pheanstalk\Pheanstalk;

class QuoteShell extends Shell
{
  use MailerAwareTrait;

  public function main()
  {
    $this->listen();
  }

  public function listen()
  {
    $client = new Pheanstalk('127.0.0.1');
    $client->watch('quoteTubeVne');

    while($job = $client->reserve()){
      $message =json_decode($job->getData(),true);
      
          $status = $this->send($message['quote']);
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

  public function send($quote){    
     try
         {
            $email = new Email('vne_main_profile');
            $email->to($quote['quote_subscriber_email'])
            ->bcc(['quote@vne-ci.com'])
            ->subject('⏳ Demande de cotation 💼')
            ->template('quote_notification','blank') 
            ->emailFormat('html')
            ->viewVars(['quote'=>$quote])
            ->send();
              return true;
          }catch(Exception $e){
            return false;
          }
  }
}