{include file='views/layouts/header.tpl'}

<div id="main">

    <!-- Post -->
    <article class="post">
        <header>
            <div class="title">
                <h2><a href="#">Назва статті</a></h2>
            </div>
            <div class="meta">
                <time class="published" datetime="2015-11-01">Листопад 1, 2015</time>
                <a href="#" class="author"><span class="name">Автор</span><img src="/images/avatar.jpg" alt=""/></a>
            </div>
        </header>
        <span class="image featured"><img src="/images/pic01.jpg" alt=""/></span>
        <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod
            placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non
            congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus
            vitae, ultricies congue gravida diam non fringilla.</p>
        <p>Nunc quis dui scelerisque, scelerisque urna ut, dapibus orci. Sed vitae condimentum lectus, ut imperdiet
            quam. Maecenas in justo ut nulla aliquam sodales vel at ligula. Sed blandit diam odio, sed fringilla
            lectus molestie sit amet. Praesent eu tortor viverra lorem mattis pulvinar feugiat in turpis. Class
            aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce ullamcorper
            tellus sit amet mattis dignissim. Phasellus ut metus ligula. Curabitur nec leo turpis. Ut gravida purus
            quis erat pretium, sed pellentesque massa elementum. Fusce vestibulum porta augue, at mattis justo.
            Integer sed sapien fringilla, dapibus risus id, faucibus ante. Pellentesque mattis nunc sit amet tortor
            pellentesque, non placerat neque viverra. </p>
        <footer>
            <ul class="stats">
                <li><a href="#">General</a></li>
                <li><a href="#" class="icon fa-heart">28</a></li>
                <li><a href="#" class="icon fa-comment">128</a></li>
            </ul>
        </footer>
        <section style="border-top: solid 1px rgba(160, 160, 160, 0.3);padding: 3em 1.5em 1em;">
            <blockquote>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci aliquid
                aspernatur at beatae esse est explicabo fugit laborum maxime modi perferendis
                placeat quae repellat reprehenderit soluta tempore, veritatis voluptas.
            </blockquote>
        </section>
        <section style="border-top: solid 1px rgba(160, 160, 160, 0.3);padding: 3em 1.5em 1em;">
            <blockquote>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci aliquid
                aspernatur at beatae esse est explicabo fugit laborum maxime modi perferendis
                placeat quae repellat reprehenderit soluta tempore, veritatis voluptas.
            </blockquote>
        </section>
        <section style="border-top: solid 1px rgba(160, 160, 160, 0.3);padding: 3em 1.5em 1em;">
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