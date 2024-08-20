<section class="main-news" style="background: url(public/img/'<?= strip_tags($leftNav['image']) ?>') no-repeat center;">
    <div class="main-news-wrapper center">
        <h1 class="main-news--h1"><?= $leftNav['title'] ?></h1>
        <h2 class="main-news--h2"><?= strip_tags($leftNav['announce']) ?></h2>
    </div>
</section>

<main class="center news">
    <h3 class="news-title" id="news-title-scroll">Новости</h3>

    <div class="news--item-wrapper">
        <?php foreach ($news as $newsItem): ?>
            <a href="/news/<?= $newsItem['id'] ?>/" class="news--item">
                <p class="news-item-time"><?= $newsItem['dateformated'] ?></p>
                <p class="news--item-title"><?= strip_tags($newsItem['title']) ?></p>
                <p class="news--item-text"><?= strip_tags($newsItem['announce']) ?></p>
                <div class="news--item-btn">Подробнее
                    <svg width="26" height="16" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25.707 8.70711C26.0975 8.31658 26.0975 7.68342 25.707 7.2929L19.343 0.928934C18.9525 0.538409 18.3193 0.538409 17.9288 0.928934C17.5383 1.31946 17.5383 1.95262 17.9288 2.34315L23.5857 8L17.9288 13.6569C17.5383 14.0474 17.5383 14.6805 17.9288 15.0711C18.3193 15.4616 18.9525 15.4616 19.343 15.0711L25.707 8.70711ZM-8.74228e-08 9L24.9999 9L24.9999 7L8.74228e-08 7L-8.74228e-08 9Z" fill="#841844" />
                    </svg>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- Пагинация -->
    <nav class="prefooter-nav center">
        <ul class="prefooter-nav-list">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="prefooter-nav-list__element">
                    <a href="/news/page-<?= $i ?>/" class="prefooter-nav-list__element-link <?= ($i == $data['currentPage']) ? 'prefooter-nav-list__element-link-active' : '' ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>
            <li class="prefooter-nav-list__element">
                <a href="/news/page-<?= min($data['currentPage'] + 1, $totalPages) ?>/" class="prefooter-nav-list__element-link next-arrow">
                    <svg width="26" height="16" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25.707 8.70711C26.0975 8.31658 26.0975 7.68342 25.707 7.2929L19.343 0.928934C18.9525 0.538409 18.3193 0.538409 17.9288 0.928934C17.5383 1.31946 17.5383 1.95262 17.9288 2.34315L23.5857 8L17.9288 13.6569C17.5383 14.0474 17.5383 14.6805 17.9288 15.0711C18.3193 15.4616 18.9525 15.4616 19.343 15.0711L25.707 8.70711ZM-8.74228e-08 9L24.9999 9L24.9999 7L8.74228e-08 7L-8.74228e-08 9Z" fill="#841844" />
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
</main>