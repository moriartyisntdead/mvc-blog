{include file='views/layouts/header.tpl'}

<div id="main">

    <!-- Post -->
    <article class="post">
        <header>
            <div class="title">
                <h2><a href="#">{$article->title}</a></h2>
            </div>
            <div class="meta">
                <time class="published" datetime="{$article->getDate()}">{$article->getDate()}</time>
                <a href="#" class="author"><span class="name">{$user->name}</span><img src="/img/users/{$user->img}" alt=""/></a>
            </div>
        </header>
        <span class="image featured"><img src="/img/articles/{$article->img}" alt=""/></span>
        {$article->content}
        <footer>
            <ul class="stats">
                <li><a href="#">General</a></li>
                <li><a href="#" class="icon fa-heart">28</a></li>
                <li><a href="javascript:void();" class="icon fa-comment">{$comments->getCommentsCount()}</a></li>
            </ul>
        </footer>
        <section style="border-top: solid 1px rgba(160, 160, 160, 0.3);padding: 3em 1.5em 1em;">
            <blockquote>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci aliquid
                aspernatur at beatae esse est explicabo fugit laborum maxime modi perferendis
                placeat quae repellat reprehenderit soluta tempore, veritatis voluptas.
            </blockquote>

{*            {foreach from=$articles item=a}
                <blockquote>

                </blockquote>
            {/foreach}*}
        </section>
        <section id="comments" style="border-top: solid 1px rgba(160, 160, 160, 0.3);padding: 3em 1.5em 1em;">
            <h3>Новий коментар</h3>
            <form method="post" action="#">
                <div class="row uniform">
                    <div class="6u 12u$(xsmall)">
                        <input type="text" name="demo-name" id="demo-name" value="" placeholder="Ім'я"/>
                    </div>
                    <div class="6u$ 12u$(xsmall)">
                        <input type="email" name="demo-email" id="demo-email" value="" placeholder="Email"/>
                    </div>
                    <div class="12u$">
                            <textarea name="demo-message" id="demo-message" placeholder="Введіть ваше повідомлення"
                                      rows="6"></textarea>
                    </div>
                    <div class="12u$">
                        <ul class="actions">
                            <li><input type="submit" value="Відправити"/></li>
                        </ul>
                    </div>
                </div>
            </form>
        </section>
    </article>

</div>

{include file='views/layouts/footer.tpl'}