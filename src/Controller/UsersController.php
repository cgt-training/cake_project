<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

    public $helpers =["Form", "Html"];
    public $components = ["Csrf"];
    public $paginate = ['Users'=>[
                'fields'=>['Users.id', 'Users.username', 'Users.email', 'Users.role','Users.modified', 'Users.created'],
                'limit'=>10,
             /*   'maxLimit'=>155,*/
                'order'=>['Users.id'=>'Asc'],
                'sortWhitelist'=>['Users.id', 'Users.email','Users.modified', 'Users.created']
                ],
                'Bookmarks'=>['fields'=>['Bookmarks.id','Bookmarks.users_id']]
    ];

    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Bookmarks']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            // To store normal password    
                $this->request->data['password_normal'] = $this->request->data['password'];             

             $user = $this->Users->patchEntity($user, $this->request->data);

            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

       if ($this->request->is(['patch', 'post', 'put'])) {

            $old_password = (new DefaultPasswordHasher)->check($this->request->data['old_password'],$user['password']);
            
            if(empty($old_password)){
                $this->Flash->customError(__('Old password is not correct'));
                
            }

            else{
        
                $user = $this->Users->patchEntity($user, $this->request->data);
            
                if ($this->Users->save($user)) {
                    
                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }

                else{
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }
            }
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function login(){

        if(!empty($this->request->session()->read('Auth.User'))) {

            return $this->redirect($this->referer());
        }
        if($this->request->is('post')){
            $user= $this->Auth->identify();
             
            if ($user) {
            $this->Auth->setUser($user);
            return $this->redirect($this->Auth->redirectUrl());
        } else {
            $this->Flash->customError(__('Username or password is incorrect'), ['escape' => true]);
        }
    }
}


public function logout(){

    return $this->redirect($this->Auth->logout());
}


}
