<?php

namespace App\Controllers;

use App\Models\NewsModel;

class NewsController
{
    /**
     * @description Вывод списка на страницу
     *  @param int $page Номер страницы, на котором будут выводиться новости
     */
    public function actionList($page)
    {
        $newsPerPage = 4;
        $newsModel = new NewsModel();
        $offset = ($page - 1) * $newsPerPage;

        $news = $newsModel->getRows($offset, $newsPerPage);

        if (!$news) return $this->actionError();

        $pageTitle = 'Галактический вестник';
        $totalNews = $newsModel->getCount();
        $totalPages = ceil($totalNews / $newsPerPage);
        $leftNav = $newsModel->getLast();

        $data = [
            'news' => $news,
            'totalPages' => $totalPages,
            'currentPage' => $page,
            'leftNav' => $leftNav,
            'pageTitle' => $pageTitle,
        ];
        $this->render('/news/list', $data);
    }

    /**
     * @description Вывод 1 элемента
     * @param int $id id записи в БД
     */
    public function actionDetail($id)
    {
        $newsModel = new NewsModel();
        $newsItem = $newsModel->getItem($id);

        if (!$newsItem) return $this->actionError();

        $pageTitle = $newsItem['title'];
        $data = [
            'newsItem' => $newsItem,
            'pageTitle' => $pageTitle,
        ];

        $this->render('/news/detail', $data,);
    }

    public function actionError()
    {
        header('HTTP/1.1 404 Not Found');
        $this->render('/errors/404');
    }

    public function render($tpl, $data = [])
    {
        $content = $this->loadView($tpl, $data);
        extract($data);
        $data['content'] = $content;
        include 'views/layouts/main.php';
    }

    /**
     * @description Загрузка и обработка шаблона
     * @param string $view Путь к шаблону
     * @param array $data Данные для использования в шаблоне
     * @return string Контент шаблона
     */
    public function loadView($view, $data = [])
    {
        ob_start();
        extract($data);
        include "views/{$view}.php";
        return ob_get_clean();
    }
}
