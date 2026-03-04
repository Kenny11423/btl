<?php

require_once __DIR__ . "/../models/News.php";
class NewsController {

    public function index() {

        $newsModel = new News();
        $newsList = $newsModel->getAllNews();

        require_once "app/views/news/index.php";
    }

    public function detail() {

        if (!isset($_GET['id'])) {
            header("Location: index.php?controller=news");
            exit();
        }

        $id = intval($_GET['id']);

        $newsModel = new News();
        $news = $newsModel->getNewsById($id);

        require_once "app/views/news/detail.php";
    }
}