<?php
namespace Learn3\Film\Model;

use Learn3\Film\Model\FilmFactory;

/**
 * Class Film
 * @package Learn3\Film\Model
 */

class Film extends \Magento\Framework\Model\AbstractModel{

    protected $filmFactory;

    /**
     * Film constructor.
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param ResourceModel\Film $resource
     * @param ResourceModel\Film\Collection $collection
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Learn3\Film\Model\ResourceModel\Film $resource,
        \Learn3\Film\Model\ResourceModel\Film\Collection $collection,
        FilmFactory $filmFactory
    )
    {
        parent::__construct(
            $context,
            $registry,
            $resource,
            $collection
        );
        $this->filmFactory = $filmFactory;
    }
    public function getNameCategory(){
        $data=$this->filmFactory->create()->getCollection();
        $data->addFieldToSelect('film_id');
        $data->getSelect()->join(
            ['zero_training_four_film' => $data->getTable('zero_training_four_film_category')], //2nd table name by which you want to join mail table
            'main_table.film_id =zero_training_four_film.film_id',
            []
        )->join(
            [$data->getTable('zero_training_four_category')],
            'zero_training_four_film.category_id =zero_training_four_category.category_id',
            ['zero_training_four_category.name']
        );
        return $data->getData();
    }
    public function getNumActor(){
        $data=$this->filmFactory->create()->getCollection();
        $data->getSelect()->join(
            ['zero_training_four_film' => $data->getTable('zero_training_four_film_actor')], //2nd table name by which you want to join mail table
            'main_table.film_id =zero_training_four_film.film_id',
            []
        )->join(
            [$data->getTable('zero_training_four_actor')],
            'zero_training_four_film.actor_id =zero_training_four_actor.actor_id',
            ['name_actor'=>new \Zend_Db_Expr("CONCAT(zero_training_four_actor.first_name,' ',zero_training_four_actor.last_name)"),'num_actor'=>new \Zend_Db_Expr("COUNT(zero_training_four_film.actor_id)")]
        )->group('zero_training_four_film.film_id');
        return $data->getData();
    }
}

?>