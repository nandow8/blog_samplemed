<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CommentsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('Comments');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Posts', [
            'foreignKey' => 'post_id',
            'joinType' => 'INNER',
        ]);
    }

   
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('body')
            ->requirePresence('body', 'create')
            ->notEmptyString('body');

        return $validator;
    }

    public function commentsByPostId($id)
    {
        $query = $this->find()
            ->select(['id', 'body', 'users.name'])
            ->where(['post_id' => $id])
            ->order('comments.modified')
            ->join([
                'posts' => [
                    'table' => 'posts',
                    'type' => 'LEFT',
                    'conditions' => 'posts.id = comments.post_id',
                ],
                'users' => [
                    'table' => 'users',
                    'type' => 'INNER',
                    'conditions' => 'users.id = comments.user_id',
                ]
            ]);

        return $query;
    }
}
