<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookmarks Controller
 *
 * @property \App\Model\Table\BookmarksTable $Bookmarks
 */
class BookmarksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    
    public function index()
    {
      $bookmarks = $this->Bookmarks
                            ->find()
                            ->select(['Bookmarks__id' => 'Bookmarks.id', 
                                      'Bookmarks__user_id' => 'Bookmarks.user_id', 
                                      'Bookmarks__title' => 'Bookmarks.title', 
                                      'Bookmarks__description' => 'Bookmarks.description', 
                                      'Bookmarks__url' => 'Bookmarks.url', 
                                      'Bookmarks__created' => 'Bookmarks.created', 
                                      'Bookmarks__modified' => 'Bookmarks.modified', 
                                      'Users__id' =>  'Users.id', 
                                      'Users__email' =>  'Users.email', 
                                      'Users__password' =>  'Users.password', 
                                      'Users__created' =>  'Users.created', 
                                      'Users__modified' =>  'Users.modified', 
                                      'Users__role' =>  'Users.role', 
                                      'Users__username' =>  'Users.username'])
                            ->join([
                                    'table' =>'users',
                                    'alias' => 'Users',
                                    'type' => 'INNER',
                                    'conditions' => 'Users.id = Bookmarks.user_id'
                                ]) ;   
                            /*->limit(20);
                            ->page(1);*/
        $this->paginate = [
        /*    'contain' => ['Users']*/
        ];
        $bookmarks = $this->paginate($bookmarks);

        $this->set(compact('bookmarks'));
        $this->set('_serialize', ['bookmarks']);
    }

    /**
     * View method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookmark = $this->Bookmarks->get($id, [
            'contain' => ['Users', 'Tags']
        ]);

        $this->set('bookmark', $bookmark);
        $this->set('_serialize', ['bookmark']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookmark = $this->Bookmarks->newEntity();
        if ($this->request->is('post')) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->data);
            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success(__('The bookmark has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bookmark could not be saved. Please, try again.'));
            }
        }
        $users = $this->Bookmarks->Users->find('list', ['limit' => 200]);
        $tags = $this->Bookmarks->Tags->find('list', ['limit' => 200]);
        $this->set(compact('bookmark', 'users', 'tags'));
        $this->set('_serialize', ['bookmark']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookmark = $this->Bookmarks->get($id, [
            'contain' => ['Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->data);
            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success(__('The bookmark has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bookmark could not be saved. Please, try again.'));
            }
        }
        $users = $this->Bookmarks->Users->find('list', ['limit' => 200]);
        $tags = $this->Bookmarks->Tags->find('list', ['limit' => 200]);
        $this->set(compact('bookmark', 'users', 'tags'));
        $this->set('_serialize', ['bookmark']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookmark = $this->Bookmarks->get($id);
        if ($this->Bookmarks->delete($bookmark)) {
            $this->Flash->success(__('The bookmark has been deleted.'));
        } else {
            $this->Flash->error(__('The bookmark could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function test(){

        // $bookmarks = $this->Bookmarks->find('all', [
                    // 'conditions' => ['OR' => ['user_id' => 2, 'twit LIKE' => '%seed%'], 'user_id' => 2],
                    // 'contain' => ['Tags']
                    // 'join' => ['table' => 'users', 'type' => 'left', 'conditions' => ['Bookmarks.user_id = users.id']]
                    // 'group' => 'user_id'
            // ])->toArray();


        // $bookmarks = $this->Bookmarks->find('list', [
        //             'keyField' => 'twit',
        //             'valueField' => 'twit',
        //             'groupField' => 'user_id'
        //         ])->toArray();

        /** custom finder **/
        // $query = $this->Bookmarks->find('customFinder', ['user' => 2])->toArray();
        // $query = $this->Bookmarks->find('customFinder', ['user' => 2])->find('getUser', ['user' => 1])->toArray();

        /* Dynamic finder **/
        // $query = $this->Bookmarks->findByUserId(3)->toArray();
        // $query = $this->Bookmarks->findByUserIdOrTwitOrDescription(2,'b2','sd')->toArray();
        // $query = $this->Bookmarks->findGetUserByUserId(2)->toArray();

        //contain
        $bookmarks = $this->Bookmarks->find('all', [
                'contain' => ['Tags']
            ])->toArray();

pr($bookmarks);exit();
        $this->set('color', 'pink');
        $this->set(compact('bookmarks'));
        $this->set('_serialize', ['bookmarks']);


    }
}
