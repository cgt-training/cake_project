<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BookmarksTags Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Bookmarks
 * @property \Cake\ORM\Association\BelongsTo $Tags
 *
 * @method \App\Model\Entity\BookmarksTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\BookmarksTag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BookmarksTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BookmarksTag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BookmarksTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BookmarksTag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BookmarksTag findOrCreate($search, callable $callback = null)
 */
class BookmarksTagsTable extends Table
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

        $this->table('bookmarks_tags');
        $this->displayField('bookmark_id');
        $this->primaryKey(['bookmark_id', 'tag_id']);

        $this->belongsTo('Bookmarks', [
            'foreignKey' => 'bookmark_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['bookmark_id'], 'Bookmarks'));
        $rules->add($rules->existsIn(['tag_id'], 'Tags'));

        return $rules;
    }
}
