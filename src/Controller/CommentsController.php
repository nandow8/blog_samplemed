<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Comments Controller
 *
 * @property \App\Model\Table\CommentsTable $Comments
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CommentsController extends AppController
{
    public function add()
    {
        $comment = $this->Comments->newEmptyEntity();
        if ($this->request->is('post')) {
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));

                return $this->redirect($this->referer());
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
        return $this->redirect($this->referer());
        // $comment = $this->Comments->Users->find('list', ['limit' => 200]);
        $this->set(compact('comment'));
    }
}
