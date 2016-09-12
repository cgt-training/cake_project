<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


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
        

    }

	public function index(){
        //$sites = TableRegistry::get('Sites');
		//$records = $sites->find('list')->select(['title','site_url']);

        $sites= $this->paginate($this->Sites);

		
		$this->set('sites',$sites);
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