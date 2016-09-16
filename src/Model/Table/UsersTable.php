<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Bookmarks
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Bookmarks', [
            'foreignKey' => 'user_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->notEmpty('id', 'create');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email','Email ID must be enter');

        $validator
            ->requirePresence('username',true)
            ->notEmpty('username');        

        $validator
            ->requirePresence('password', 'create')
            ->add('password',[
                'size'=> [
                    'rule'  => ['lengthBetween',6,8],
                    'message'=>'Password length must be between 8 to 15'    ]
                    ])
            ->notEmpty('password');

        $validator
            ->requirePresence('role','create')
            ->notEmpty('role');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }


    /**
     * CustomFinder Method :
     * @return dataObject;
     * @param $query , $options
     * userName() this is a custom findr method will use to get search result
    **/

    public function findUserSearch(Query $query, array $options){

        $userName = $options['username'];
        return $query->findByUsername($userName);
    }


    public function findAuth(Query $query, Array $options){

    /**
    * This is custom finder manthod. this will query addiotional OR condition who checks 
    * the Email as well to allow login through it. 
    * @param query : it is prequery object sent via Auth Component having all selected fiedls 
    * @param $option : In this we are receiving all fields value,
    *
    **/


        return $query
                ->orWhere(['Users.Email' => $options['username']]);
        
    }
}
