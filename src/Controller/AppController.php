<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */

    public    $defaultLocale = "en";
    public    $localeOptions = ['en'=>'en_Us',
                                'hi' => 'hi_In',
                                'fr' => 'fr_Fr'
                                ];

    public function initialize(){

        parent::initialize();
        
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Cookie',[
                                        'path' => '/',
                                        'expires' => '+180 minutes',
                                        'httpOnly' => true,
                                        'encryption' =>'aes',
                                        'key' => null,
                                        'domain' => null,
                                        'secure' => false,
                                        ]);

        $this->viewBuilder()->layout("testlayout");
     
        $this->loadComponent('Auth', [ 
                            'loginRedirect' => [
                                'controller' => 'Bookmarks',
                                'action' => 'index',
                                'prefix' => false,
                                    ],
                            'logoutRedirect' => [
                                'controller' => 'Users',
                                'action' => 'index',
                                'prefix' => false,
                                    ],
                            'authenticate' => [
                                'Form' => [
                                    'fields' => ['username' => 'Username',  'password' => 'password'],
                                    'finder'=>'auth'
                                    ],
                               
                            ],
                        ]);

   /*     if(empty($this->request->params['lang'])){
            $this->request->params['lang'] = $this->defaultLocale;
            $url = [$this->request->params['lang'], $this->request->params['controller'], $this->request->params['action']];

            pr($this->request);
            // /return $this->redirect($url);
        }
        else{
            $language = $this->request->params['lang'];
            if(array_key_exists($language, $this->localeOptions)){
                 Configure::write('App.defaultLocale', $this->  localeOptions[$language]);
                }
            else{
                   // return $this->redirect(['lang' => $this->defaultLocale]);       
            }
        }*/


      $this->getCookie();



    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */


    public function beforeFilter(Event $event){

            if($this->request->params['action']=='edit')
                '';

        parent::beforeFilter($event);
        $this->Auth->allow(['index','view']);
        /*Configure::write('App.defaultLocale','In-hi');  */
      

        
    }


    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        $this->set('loginRedirect',['controller'=>'Users','action'=>'login']);
        $this->set('logoutRedirect',['controller'=>'Users','action'=>'logout']);
    }


    public function isAuthorized($user){


        if(!empty($user['role']) && $user['role'] == 'Admin'){
            return true;
        }

        return false;


    }

    public function getCookie(){



        $session = $this->request->session()->read('Auth');
        
        if(empty($session) && $this->Cookie->check('userLogin.username')){
            $userName = $this->Cookie->read('userLogin.username');
            $Users = TableRegistry::get('users');
            $userData = $Users->findByUsername($userName)->first()->toArray() ;
            
            if(count($userData)){
               $this->Auth->setUser($userData);
            }

        }

    }

}
