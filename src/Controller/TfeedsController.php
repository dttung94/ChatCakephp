<?php
namespace App\Controller;

use Cake\Datasource\ConnectionManager;

use Cake\ORM\Table;
use Cake\ORM\Locator\LocatorAwareTrait;

class TfeedsController extends AppController{
    public function feed() {
        $tfeed = $this->Tfeeds->newEmptyEntity();
        
        if ($this->request->is('post')){
            $image_file = $this->request->getData('image_file');

            $this->log(json_encode($this->request->getData(), JSON_PRETTY_PRINT));
            if ($image_file) {
                $name = $image_file->getClientFileName();
                $type = $image_file->getClientMediaType();
                

                if($type != 'video/mp4'){
                    $targetPath = WWW_ROOT.'img'.DS.$name;
                } else {
                    $targetPath = WWW_ROOT.'files'.DS.$name;
                }

                if($name){  
                    $image_file->moveTo($targetPath);
                    // $tfeed->image_file = $name;
                }
            }

            $data = $this->request->getData();
            $data['image_file'] = $name;

            $tfeed = $this->Tfeeds->patchEntity($tfeed, $data);
            
            $session = $this->request->getSession();
            $user_id = $session->read('User.user_id');
            $tfeed['user_id']= $user_id;
            $tfeed['type']=$type;
            
            $tfeedsTable = $this->getTableLocator()->get('Tfeeds');
            
            
            if($tfeedsTable->save($tfeed)){
                $this->Flash->success(__('saved'));
            }
            
        }

        $tfeeds = $this->Tfeeds->find('all');
        
        $this->set(compact('tfeeds'));
        $this->set('tfeed',$tfeed);
    }   

    
    public function delete($id) {
        
        $this->request->allowMethod(['get', 'delete']);
       
        $tfeed = $this->Tfeeds->findById($id)->firstOrFail();
        if ($this->Tfeeds->delete($tfeed)) {
            $this->Flash->success(__('Message has been deleted.'));
            return $this->redirect(['action' => 'feed']);
            }
        }
    public function edit($id){
           
        $tfeedsTable = $this->getTableLocator()->get('Tfeeds');
        $tfeed = $tfeedsTable -> get($id);
        if ($this->request->is(['patch','post', 'put'])) {
            $this->Tfeeds->patchEntity($tfeed, $this->request->getData());
            if ($this->Tfeeds->save($tfeed)) {
                $this->Flash->success(__('Your Message has been updated.'));
                return $this->redirect(['action' => 'feed']);
            }
            $this->Flash->error(__('Unable to update your article.'));                
        }
      
        $this->set('tfeed', $tfeed);
    }   
}
