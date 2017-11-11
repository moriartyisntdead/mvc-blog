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
                <a href="#" class="author"><span class="name">{$author->name}</span><img src="/img/users/{$author->img}" alt=""/></a>
            </div>
        </header>
        <span class="image featured"><img src="/img/articles/{$article->img}" alt=""/></span>
        {$article->content}
        <footer>
            <ul class="stats">
                {foreach from=$tags item=t}
                    {assign var=tag value=Model_Tags::getById($t->id)}
                    <li><a href="/&tag={$tag->tag}">{$tag->tag}</a></li>
                {/foreach}
                <li><a href="#!" class="like icon fa-heart {if !$user}disabled{elseif $article->hasUserLike($user->id)}active{/if} " data-id="{$article->id}">{$article->getLikesCount()}</a></li>
                <li><a href="#comments" class="icon fa-comment">{$article->getCommentsCount()}</a></li>
            </ul>
        </footer>
        <section id="comments" style="border-top: solid 1px rgba(160, 160, 160, 0.3);padding: 1.5em 1.5em 1em;">
            {foreach from=$comments item=c}
                {assign var=comment value=Model_Comments::getById($c->id)}
                <blockquote style="font-style: normal">
                    <span class="comment-username">{$comment->name}</span>
                    <br>
                    {$comment->comment}
                    <br>
                    <div class="comment-date">{$comment->date|date_format:"%d.%m.%y, %H:%M"}</div>
                </blockquote>
                {foreachelse}
                Цю статтю ще не коментували.
            {/foreach}
        </section>
        <section style="border-top: solid 1px rgba(160, 160, 160, 0.3);padding: 3em 1.5em 1em;">
            <h3>Новий коментар</h3>
            <form id="new-comment" method="post">
                <div class="row uniform">
                    <div class="6u 12u$(xsmall)">
                        <input type="hidden" name="article-id" id="article-id" value="{$article->id}"/>
                        <input type="text" name="name" id="name" placeholder="Ім'я"/>
                    </div>
                    <div class="6u$ 12u$(xsmall)">
                        <input type="email" name="email" id="email"  placeholder="Email"/>
                    </div>
                    <div class="12u$">
                        <textarea name="message" id="message" placeholder="Введіть ваше повідомлення" rows="6"></textarea>
                    </div>
                    <div class="6u$ 12u$(small)">
                        <input type="checkbox" id="subscribe" name="subscribe">
                        <label for="subscribe">Підписатись на розсилку</label>
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