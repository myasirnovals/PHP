<?php

require_once __DIR__ . '/GetConnection.php';
require_once __DIR__ . '/Model/Comment.php';
require_once __DIR__ . '/Repository/CommentRepository.php';

use Repository\CommentRepositoryImpl;
use Model\Comment;

$connection = getConnection();

$repository = new CommentRepositoryImpl($connection);

// insert data
//$comment = new Comment(email: "repository@test.com", comment: "hai");
//$newComment = $repository->insert($comment);
//
//var_dump($newComment->getId());

// select data
//$comment = $repository->findById(1);
//var_dump($comment);

$comments = $repository->findAll();
var_dump($comments);

$connection = null;
