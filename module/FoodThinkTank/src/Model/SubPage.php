<?php
namespace FoodThinkTank\Model;

use Doctrine;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use FoodThinkTank\Interfaces\ISubPageInterface;

class SubPage implements ISubPageInterface {

    public function _getAuthor($postId)
    {
        // TODO: Implement _getAuthor() method.
    }
    public function _getCategory($categoryId)
    {
        // TODO: Implement _getCategory() method.
    }
    public function _getPostList()
    {
        // TODO: Implement _getPostList() method.
    }
    public function _getSinglePost($postId)
    {
        // TODO: Implement _getSinglePost() method.
    }
    public function _setCategory($categoryId)
    {
        // TODO: Implement _setCategory() method.
    }
    public function _setSinglePost($postId)
    {
        // TODO: Implement _setSinglePost() method.
    }
}
