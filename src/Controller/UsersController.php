<?php

namespace App\Controller;

use Cake\Database\Connection;
use Cake\Datasource\ConnectionManager;

class UsersController extends AppController {
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function beforeFilter(\Cake\Event\EventInterface $event){
        parent::beforeFilter($event);

        $this->Authentication->addUnauthenticatedActions(['register','login']);
    }

    public function register() {
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('New User Created!'));
                return $this->redirect(['action' => 'login']);
            }
            else $this->Flash->error(__('Unable to sign up'));
        }
        $this->set('user',$user);
    }

    public function login()
    {   
    $this->request->allowMethod(['get', 'post']);
    
    
    
    $result = $this->Authentication->getResult();
   
    // regardless of POST or GET, redirect if user is logged in
    if ($result->isValid()) {
        $user = $this -> request ->getData();

        $connection = ConnectionManager::get('default');
        $results = $connection
            ->newQuery()
            ->select('*')
            ->from('users')
            ->where(['users.username = '=> $user['username']])
            
            ->execute()
            ->fetchAll('assoc');
            $session = $this->request->getSession();
            $session->write('User.name', $results[0]['name']);
            $session->write('User.user_id',$results[0]['user_id']);
        // redirect to /articles after login success
        $redirect = $this->request->getQuery('redirect', [
            'controller' => 'Tfeeds',
            'action' => 'feed',
        ]);

        return $this->redirect($redirect);
    }
    // display error if user submitted and authentication failed
    if ($this->request->is('post') && !$result->isValid()) {
        $this->Flash->error(__('Invalid username or password'));
    }
       
        /* $result = $this->Authentication->getResult();
        // If the user is logged in send them away.
        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/chat';
            return $this->redirect($target);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Invalid username or password');
        }
 */
    }

    public function logout() {
        $this->Authentication->logout();
        $session = $this->request->getSession();
       
        $session ->delete('User.name');
        $this->redirect(['controller'=>'Users','action'=>'login']);
    }
}