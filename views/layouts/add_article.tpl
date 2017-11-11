{include file='views/layouts/header.tpl'}
<link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
<div id="main" style="padding: 0 180px 0;">
    <div class="post" style="padding: 55px 150px 30px;">
        <h1>Створити тему</h1>
        <form id="article-form">
            <div class="title-block">
                <input value="Заголовок"type="text" placeholder="Заголовок теми" id="article-title" name="article-title">
            </div>
            <textarea  id="article-description" name="article-description" placeholder="Короткий опис"></textarea>

            <div id="toolbar">
                <span class="ql-formats">
                    <select class="ql-font">
                        <option selected=""></option>
                        <option value="serif"></option>
                        <option value="monospace"></option>
                    </select>
                    <select class="ql-size">
                        <option value="small"></option>
                        <option selected=""></option>
                        <option value="large"></option>
                        <option value="huge"></option>
                    </select>
                </span>
                <span class="ql-formats">
                    <button class="ql-bold"></button>
                    <button class="ql-italic"></button>
                    <button class="ql-underline" type="button"></button>
                    <button class="ql-strike" type="button"></button>
                </span>
                <span class="ql-formats">
                    <select class="ql-color"></select>
                    <select class="ql-background"></select>
                </span>
                <span class="ql-formats">
                    <button class="ql-list" value="ordered"></button>
                    <button class="ql-list" value="bullet"></button>
                    <select class="ql-align">
                        <option selected=""></option>
                        <option value="center"></option>
                        <option value="right"></option>
                        <option value="justify"></option>
                    </select>
                </span>
                <span class="ql-formats">
                    <button class="ql-link"></button>
                    <button class="ql-image"></button>
                </span>
            </div>
            <div id="editor"></div>
            <div class="form-group">
                <select name="category" id="category">
                    <option value="" disabled selected>Оберіть категорію</option>
                    {foreach from=$categories item=c}
                        <option value="{$c->id}">{$c->name}</option>
                    {/foreach}
                </select>
            </div>
            <div class="form-group">
                <input type="file" name="article-image" id="article-image" style="display:none;">
                <label for="article-image"><i class="fa fa-upload"></i> Картинка статті</label>
            </div>
            <div>
                <input type="text" name="url" id="url" placeholder="URL статті">
            </div>
            <br>
            <button type="submit" id="add-article" class="button big">Продовжити </button>
        </form>
    </div>
</div>
<script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>

{include file='views/layouts/footer.tpl'}