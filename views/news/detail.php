<section class="center localnews">
    <nav class="backtracking">
        <a href="/">Главная</a> / <a href="#" class="backtracking-active"><?= $newsItem['title'] ?></a>
    </nav>

    <h1 class="localnews__title"><?= $newsItem['title'] ?></h1>

    <div class="localnews__left">
        <div class="news--item__local">
            <p class="news-item-time"><?= $newsItem['dateformated'] ?></p>
            <p class="news--item-title news--item-title__local"><?= strip_tags($newsItem['announce']) ?></p>
            <p class="localnews__left-text"><?= strip_tags($newsItem['content']) ?></p>
            <a href="/" class="news--item-btn news--item-btn--back">
                <svg width="26" height="16" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.293015 8.70711C-0.0975094 8.31658 -0.0975094 7.68342 0.293014 7.2929L6.65698 0.928934C7.0475 0.538409 7.68067 0.538409 8.07119 0.928934C8.46171 1.31946 8.46171 1.95262 8.07119 2.34315L2.41434 8L8.07119 13.6569C8.46171 14.0474 8.46171 14.6805 8.07119 15.0711C7.68067 15.4616 7.0475 15.4616 6.65698 15.0711L0.293015 8.70711ZM26 9L1.00012 9L1.00012 7L26 7L26 9Z" fill="#841844" />
                </svg>
                <span>назад к новостям</span>
            </a>
        </div>
        <img src="/../public/img/<?= $newsItem['image'] ?>" height="571" width="740" alt="Картинка">
    </div>
</section>


<div class="modal">
    <div class="modal-content">
        <img id="modal-img" src="public/img/<?= $newsItem['image'] ?>" alt="Модалка">
    </div>
</div>