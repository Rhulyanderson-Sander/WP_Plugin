<?php
    /*
        **Plugin Name: Erriaga Codes Ultimate
        **Description: Este é um plugin para estilizar nossas páginas!
        **Version: 1.0
        **Author: Rhulys
    */

    function MyShortCode(){
        $shortCode = "<h2>Aqui vai o conteudo do plugin</h2>";
        return $shortCode;
    }

    add_shortcode('Erriaga1','MyShortCode');

    function MyMenu(){
        add_menu_page('Erriaga Ultimate Plugin','Erriaga Ultimate','manage_options','Erriaga-codes-plugin','erriaga_page',"dashicons-html",200);
    }

    add_action('admin_menu','MyMenu');

    function erriaga_page(){
        if(array_key_exists('acao',$_POST)){
            update_option('conteudo_html',$_POST['conteudo_html']);
            echo '
            <div class="notice notice-success is-dismissible"> 
                <p><strong>As alteracões foram salvas com sucesso!</strong></p>
                <button type="button" class="notice-dismiss">
                    <span class="screen-reader-text">Fechar</span>
                </button>
            </div>
        ';
        }
        $conteudo_html = get_option('conteudo_html');
        echo '
        <div class="wrap">
            <h1>Bem vindo(a) ao Erriaga Ultimate!</h1>
            <p>Plugin em fase de testes...</p>
            <form method="post">
                <label for="nome">Conteúdo HTML:</label>
                <textarea name="conteudo_html" class="large-text" placheholder="Conteúdo HTML">'.$conteudo_html.'</textarea>
                <input type="submit" name="acao" value="Salvar" class="button button-primary" />
            </form>
        </div>
        ';
    }

    function getConteudoHead(){
        $conteudo_html = get_option('conteudo_html');
        echo $conteudo_html;
    }

    function getConteudoFooter(){
        $conteudo_html = get_option('conteudo_html');
        echo $conteudo_html;
    }

    add_action('wp_head','getConteudoHead');
    //add_action('wp_footer','getConteudoFooter');
?>