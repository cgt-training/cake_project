<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Security;


/**
* @author Hitesh Jangid
* This is a test Controller named Site this have Four basic function's Add Edit View and Delete
*
*
*
*
**/

class SitesController extends AppController{



    public $paginate = [
                'fields'=>['Sites.id', 'Sites.title','Sites.site_url'],
                'limit'=>1,
                'order'=>['Sites.title'=>'Asc']
                ];
    


    public function initialize(){
        parent::initialize();
        $this->viewBuilder()->layout('testlayout');
        $this->loadModel('Users');
        

    }

	public function index(){
        //$sites = TableRegistry::get('Sites');
		//$records = $sites->find('list')->select(['title','site_url']);

        



        //-----------Concat fucntion of mysql-------------------
        /*$query = $this->Users->find();
        $user = $this->Users->find()->select(['con_username'=> $query->func()->concat(['username'=>'identifier','password' => 'identifier'])])->select(['username'])->all();*/


        //-----------First record Limit 1----------------------
/*        $user = $this->Users
                    ->findByUsername('hitesh')
                    ->first();
*/                    
        $user = $this->Users->find()->extract('username')->toArray();

        /*$user =        $this->Users->find()->orWhere(['username'=>'hitesh'])->orWhere(['username' => 'xyz'])->all();*/
        $user = $this->Users->find('list')->first();;
        /*debug($users);*/
        /*$this->Users->find()->where(['username'=>'hitesh'])->order(['id'=>'Asc','username'=>'Desc'])->limit(100)->page(2.25)->all();*/
		$key="JOPJdlsjrKJHioudsklhUIoJopsefOPUio";
        $string ='Hitesh Jangid Hitesh Jangid Hitesh Jangid Hitesh Jangid Hitesh Jangid Hitesh Jangid Hitesh Jangid Hitesh Jangid Hitesh Jangid';

        $this->set('md5',Security::hash('hiteshjangid', 'md5','IHOIEHKLhfwsefiohKLHiohwklhfoIohnferoioHOI'));

        $this->set('sha1',Security::hash('hiteshjangid', 'sha1','IHOIEHKLhfwsefiohKLHiohwklhfoIohnferoioHOI'));

        $this->set('sha256',Security::hash('hiteshjangid', 'sha256','IHOIEHKLhfwsefiohKLHiohwklhfoIohnferoioHOI'));

        
        $this->set('encrpt',Security::encrypt($string, $key));   
        $this->set('decrpt',Security::decrypt(Security::encrypt($string, $key),$key));
		$this->set('user',$user);


	}


    public function add(){

        //$site = new $this->Sites(); or 
        $site = $this->Sites->newEntity();

        if($this->request->is('Post')){

            $site = $this->Sites->patchEntity($site,$this->request->data);

                if($this->Sites->save($site)){
                
                    $this->Flash->success('Data Has been saved !!');
                    return $this->redirect(['action'=>'index']);
                }
                else{
                    $this->Flash->error("Your data didn't saved pls try again");

                }

        }

        $this->set(compact('site'));
        $this->set('_serialize',['site']);
    }

    public function edit($id=null){


        
        $site = $this->Sites->get($id,[
            'contain'=>[]
            ]);

        if($this->request->is(['psot', 'put', 'patch'])){

            $site = $this->Sites->patchEntity($site, $this->request->data);
            if($this->Sites->save($site)){
                $this->Flash->success(__('Data has been saved'));
                return $this->redirect(['action'=>'index']);
            }
            else{

                $this->Flash->error(__("Data couldn't saved"));
            }
        }
        $this->set(compact('site'));
        $this->set('_serialize',['site']);
    }

    public function view($id=null){

                $sites= TableRegistry::get('Sites');
        pr($sites->find()->execute());

    }
}
?>