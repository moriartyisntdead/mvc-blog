{include file='views/layouts/header.tpl'}

<section id="menu">

    <!-- Search -->
    <section>
        <form class="search" method="get" action="#">
            <input type="text" name="query" placeholder="Пошук"/>
        </form>
    </section>

    <!-- Links -->
    <section>
        <h3>Вхід</h3>
        <form method="post" action="#">
            <div class="row uniform">
                <div class="12u$">
                    <input type="text" name="login" id="login" value="" placeholder="Логін"/>
                </div>
                <div class="12u$">
                    <input type="email" name="password" id="password" value="" placeholder="Пароль"/>
                </div>
                <div class="12u$">
                    <ul class="actions vertical">
                        <li><a href="#" class="button big fit">Увійти</a></li>
                    </ul>
                </div>
            </div>
        </form>
    </section>

</section>

<!-- Main -->
<div id="main">

    <!-- Posts -->
    {foreach from=$articles item=a}
        {assign var=article value=Model_Articles::getById($a['id'])}
        {assign var=user value=Model_Users::getById($a['author_id'])}
    <article class="post">
        <header>
            <div class="title">
                <h2><a href="/article/{$article->getCategoryAnchor()}/{$article->url}">{$article->title}</a></h2>
            </div>
            <div class="meta">
                <time class="published" datetime="{$article->getDate()}">{$article->getDate()}</time>
                <a href="#" class="author"><span class="name">{$user->name}</span><img src="img/users/{$user->img}" alt=""/></a>
            </div>
        </header>
        <a href="/article/{$article->getCategoryAnchor()}/{$article->url}" class="image featured"><img src="img/articles/{$article->img}" alt=""/></a>
        <p>{$article->description}</p>
        <footer>
            <ul class="actions">
                <li><a href="/article/{$article->getCategoryAnchor()}/{$article->url}" class="button big">Продовжити </a></li>
            </ul>
            <ul class="stats">
                {foreach from=$article->getTags() item=t}
                    {assign var=tag value=Model_Tags::getById($t->id)}
                    <li><a href="#">{$tag->tag}</a></li>
                {forelse}

                {/foreach}
                <li><a href="#" class="icon fa-heart">{$article->getLikesCount()}</a></li>
                <li><a href="/article/{$article->getCategoryAnchor()}/{$article->url}#comments" class="icon fa-comment">{$article->getCommentsCount()}</a></li>
            </ul>
        </footer>
    </article>
    {/foreach}

    <!-- Pagination -->
    <ul class="actions pagination">
        <li><a href="" class="disabled button big previous">Попередня сторінка</a></li>
        <li><a href="#" class="button big next">Наступна сторінка</a></li>
    </ul>

</div>

<!-- Sidebar -->
<section id="sidebar">

    <!-- Intro -->
    <section id="intro">
        <a href="#" class="logo"><img src="images/logo.jpg" alt=""/></a>
        <header>
            <h2>Future Imperfect</h2>
        </header>
    </section>

    <!-- Mini Posts -->
    <section>
        <div class="mini-posts">

            <!-- Mini Post -->
            <article class="mini-post">
                <header>
                    <h3><a href="#">Vitae sed condimentum</a></h3>
                    <time class="published" datetime="2015-10-20">October 20, 2015</time>
                    <a href="#" class="author"><img src="images/avatar.jpg" alt=""/></a>
                </header>
                <a href="#" class="image"><img src="images/pic04.jpg" alt=""/></a>
            </article>

            <!-- Mini Post -->
            <article class="mini-post">
                <header>
                    <h3><a href="#">Rutrum neque accumsan</a></h3>
                    <time class="published" datetime="2015-10-19">October 19, 2015</time>
                    <a href="#" class="author"><img src="images/avatar.jpg" alt=""/></a>
                </header>
                <a href="#" class="image"><img src="images/pic05.jpg" alt=""/></a>
            </article>

            <!-- Mini Post -->
            <article class="mini-post">
                <header>
                    <h3><a href="#">Odio congue mattis</a></h3>
                    <time class="published" datetime="2015-10-18">October 18, 2015</time>
                    <a href="#" class="author"><img src="images/avatar.jpg" alt=""/></a>
                </header>
                <a href="#" class="image"><img src="images/pic06.jpg" alt=""/></a>
            </article>

            <!-- Mini Post -->
            <article class="mini-post">
                <header>
                    <h3><a href="#">Enim nisl veroeros</a></h3>
                    <time class="published" datetime="2015-10-17">October 17, 2015</time>
                    <a href="#" class="author"><img src="images/avatar.jpg" alt=""/></a>
                </header>
                <a href="#" class="image"><img src="images/pic07.jpg" alt=""/></a>
            </article>

        </div>
    </section>

    <!-- Posts List -->
    <section>
        <ul class="posts">
            <li>
                <article>
                    <header>
                        <h3><a href="#">Lorem ipsum fermentum ut nisl vitae</a></h3>
                        <time class="published" datetime="2015-10-20">October 20, 2015</time>
                    </header>
                    <a href="#" class="image"><img src="images/pic08.jpg" alt=""/></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="#">Convallis maximus nisl mattis nunc id lorem</a></h3>
                        <time class="published" datetime="2015-10-15">October 15, 2015</time>
                    </header>
                    <a href="#" class="image"><img src="images/pic09.jpg" alt=""/></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="#">Euismod amet placerat vivamus porttitor</a></h3>
                        <time class="published" datetime="2015-10-10">October 10, 2015</time>
                    </header>
                    <a href="#" class="image"><img src="images/pic10.jpg" alt=""/></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="#">Magna enim accumsan tortor cursus ultricies</a></h3>
                        <time class="published" datetime="2015-10-08">October 8, 2015</time>
                    </header>
                    <a href="#" class="image"><img src="images/pic11.jpg" alt=""/></a>
                </article>
            </li>
            <li>
                <article>
                    <header>
                        <h3><a href="#">Congue ullam corper lorem ipsum dolor</a></h3>
                        <time class="published" datetime="2015-10-06">October 7, 2015</time>
                    </header>
                    <a href="#" class="image"><img src="images/pic12.jpg" alt=""/></a>
                </article>
            </li>
        </ul>
    </section>

    <!-- About -->
    <section class="blurb">
        <h2>About</h2>
        <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet
            placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
        <ul class="actions">
            <li><a href="#" class="button">Читати більше</a></li>
        </ul>
    </section>

    <!-- Footer -->
    <section id="footer">
        <ul class="icons">
            <li><a href="#" class="fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="fa-rss"><span class="label">RSS</span></a></li>
            <li><a href="#" class="fa-envelope"><span class="label">Email</span></a></li>
        </ul>
    </section>

</section>

{include file='views/layouts/footer.tpl'}