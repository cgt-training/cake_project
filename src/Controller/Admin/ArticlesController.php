<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

    public $user = null;

    public  function initialize(){
        parent::initialize();

         $this->user= $this->request->session()->read('Auth.User');
         
    }

    public function index()
    {
        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
        $this->set('_serialize', ['articles']);
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);

        $this->set('article', $article);
        $this->set('_serialize', ['article']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $article = $this->Articles->newEntity();


 
        if ($this->request->is('post')) {
            
            $article->user_id= $this->user;

            $article = $this->Articles->patchEntity($article, $this->request->data);
            
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));

            }
        }
        $this->set(compact('article'));
        $this->set('_serialize', ['article']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

      if($this->isAuthorized($this->user))
        {

                $article = $this->Articles->get($id, [
                    'contain' => []
                ]);
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $article = $this->Articles->patchEntity($article, $this->request->data);
                    if ($this->Articles->save($article)) {
                        $this->Flash->success(__('The article has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->errorC(__('The article could not be saved. Please, try again.'));
                    }
                }
                $this->set(compact('article'));
                $this->set('_serialize', ['article']);
         }
              else{
            $this->Flash->warning(__('You are not authorized to this article'));
            return $this->redirect(['action'=>'index']);
        }   
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        if($this->isAuthorized($this->$user)){

        
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
        }
        else{
            $this->Flash->error(__('You are not authorized to this article'));
            return $this->redirect(['action'=>'index']);
        }

    }


        public function isAuthorized($user = NULL){

        /*        if($this->request->params['action']=='add'){
                    return true;
                }

                if(in_array($this->request->params['action'], ['edit','delete'])){

                    $articleId= $this->request->params['pass'][0];

                        if($this->Articles->isOwnedBy($articleId,$user['id'])){
                         return true;
                        }
                }*/
                            
                  return parent::isAuthorized($user);  

        }


}
