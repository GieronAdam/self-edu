<?php
namespace FoodThinkTank\Interfaces;

Interface ISubPageInterface
{
    public function _getCategory($categoryId);
    public function _setCategory($categoryId);
    public function _getPostList();
    public function _getSinglePost($postId);
    public function _setSinglePost($postId);
    public function _getAuthor($postId);

}