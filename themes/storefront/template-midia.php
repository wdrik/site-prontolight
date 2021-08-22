<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Na Mídia
 *
 * @package storefront
 */

get_header(); ?>

  <h1 class="content-featured-product__main-title text-orange">Na mídia</h1>

  <div class="wrapper-midia">

    <!-- Row one -->
    <ul class="wrapper-midia__row">

      <li class="wrapper-midia__item">
        <a href="javascript:void(0)" class="wrapper-img show" aria-haspopup="true" id="item-01">
          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/24566abd7cbcbfd.jpg" alt="INSTAGRAM LIVING TODAY">
          <div class="wrapper-overlay">ver +</div>
        </a>

        <h3>INSTAGRAM LIVING TODAY</h3>
      </li>

      <li class="wrapper-midia__item">
        <a href="javascript:void(0)" class="wrapper-img show" aria-haspopup="true" id="item-02">
          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/19566abd24c9ca1.jpg" alt="INSTAGRAM THAIS SCHREINER @ELLEBRASIL">
          <div class="wrapper-overlay">ver +</div>
        </a>

        <h3>INSTAGRAM THAIS SCHREINER @ELLEBRASIL</h3>
      </li>

      <li class="wrapper-midia__item">
        <a href="javascript:void(0)" class="wrapper-img show" aria-haspopup="true" id="item-03">
          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/18566abc504f62b.jpg" alt="INSTAGRAM REVISTA ABSOLUTA">
          <div class="wrapper-overlay">ver +</div>
        </a>

        <h3>INSTAGRAM REVISTA ABSOLUTA</h3>
      </li>

      <li class="wrapper-midia__item">
        <a href="javascript:void(0)" class="wrapper-img show" aria-haspopup="true" id="item-04">
          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/12566abb8239677.jpg" alt="INSTAGRAM ANDRÉIA MENEGUETE">
          <div class="wrapper-overlay">ver +</div>
        </a>

        <h3>MATÉRIA BLUE CHIP - COMIDA CONGELADA SAUDÁVEL</h3>
      </li>

    </ul>

    <div class="mask" data-id="item-01" role="dialog"></div>
    <div class="modal" role="alert">
        <div class="conteudo__modal">
          <button class="close" role="button"><i class="fas fa-times"></i></button>

          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/24566abd7c9dd7b.jpg" alt="INSTAGRAM LIVING TODAY">
        </div>
    </div>

    <div class="mask" data-id="item-02" role="dialog"></div>
    <div class="modal" role="alert">
        <div class="conteudo__modal">
          <button class="close" role="button"><i class="fas fa-times"></i></button>

          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/19566abd24a9b92.jpg" alt="INSTAGRAM THAIS SCHREINER @ELLEBRASIL">
        </div>
    </div>

    <div class="mask" data-id="item-03" role="dialog"></div>
    <div class="modal" role="alert">
        <div class="conteudo__modal">
          <button class="close" role="button"><i class="fas fa-times"></i></button>

          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/18566abc504b916.jpg" alt="INSTAGRAM THAIS SCHREINER @ELLEBRASIL">
        </div>
    </div>

    <div class="mask" data-id="item-04" role="dialog"></div>
    <div class="modal" role="alert">
        <div class="conteudo__modal">
          <button class="close" role="button"><i class="fas fa-times"></i></button>

          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/12566abb821c2c4.jpg" alt="INSTAGRAM ANDRÉIA MENEGUETE">
        </div>
    </div>
    <!-- Row one -->

    <!-- Row Two -->
    <ul class="wrapper-midia__row">
      <li class="wrapper-midia__item">
        <a href="javascript:void(0)" class="wrapper-img show" aria-haspopup="true" id="item-05">
          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/115654a0e9433ed.jpg" alt="MATÉRIA BLUE CHIP - COMIDA CONGELADA SAUDÁVEL">
          <div class="wrapper-overlay">ver +</div>
        </a>

        <h3>MATÉRIA BLUE CHIP - COMIDA CONGELADA SAUDÁVEL</h3>
      </li>

      <li class="wrapper-midia__item">
        <a href="javascript:void(0)" class="wrapper-img show" aria-haspopup="true" id="item-06">
          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/105654a0772707d.jpg" alt="INSTAGRAM CORPO A CORPO - PICOLÉ PRONTO LIGHT">
          <div class="wrapper-overlay">ver +</div>
        </a>

        <h3>INSTAGRAM CORPO A CORPO - PICOLÉ PRONTO LIGHT</h3>
      </li>

      <li class="wrapper-midia__item">
        <a href="javascript:void(0)" class="wrapper-img show" aria-haspopup="true" id="item-07">
          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/95654a02c23a9b.jpg" alt="BOLSA TÉRMICA VITRINE FOLHA DE SÃO PAULO">
          <div class="wrapper-overlay">ver +</div>
        </a>

        <h3>BOLSA TÉRMICA VITRINE FOLHA DE SÃO PAULO</h3>
      </li>

      <li class="wrapper-midia__item">
        <a href="javascript:void(0)" class="wrapper-img show" aria-haspopup="true" id="item-08">
          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/756549f9f69edd.jpg" alt="INSTAGRAM REVISTA CORPO A CORPO">
          <div class="wrapper-overlay">ver +</div>
        </a>

        <h3>INSTAGRAM REVISTA CORPO A CORPO</h3>
      </li>
    </ul>

    <div class="mask" data-id="item-05" role="dialog"></div>
    <div class="modal" role="alert">
      <div class="conteudo__modal">
        <button class="close" role="button"><i class="fas fa-times"></i></button>

        <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/115654a0e8db111.jpg" alt="MATÉRIA BLUE CHIP - COMIDA CONGELADA SAUDÁVEL">
      </div>
    </div>

    <div class="mask" data-id="item-06" role="dialog"></div>
    <div class="modal" role="alert">
      <div class="conteudo__modal">
        <button class="close" role="button"><i class="fas fa-times"></i></button>

        <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/105654a0770d435.jpg" alt="INSTAGRAM CORPO A CORPO - PICOLÉ PRONTO LIGHT">
      </div>
    </div>

    <div class="mask" data-id="item-07" role="dialog"></div>
    <div class="modal" role="alert">
      <div class="conteudo__modal">
        <button class="close" role="button"><i class="fas fa-times"></i></button>

        <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/95654a02bb7a5a.jpg" alt="BOLSA TÉRMICA VITRINE FOLHA DE SÃO PAULO">
      </div>
    </div>

    <div class="mask" data-id="item-08" role="dialog"></div>
    <div class="modal" role="alert">
      <div class="conteudo__modal">
        <button class="close" role="button"><i class="fas fa-times"></i></button>

        <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/756549f9f6783d.jpg" alt="INSTAGRAM REVISTA CORPO A CORPO">
      </div>
    </div>
    <!-- Row Two -->





    
    <!-- Row Three -->
    <ul class="wrapper-midia__row">
      <li class="wrapper-midia__item">
        <a href="javascript:void(0)" class="wrapper-img show" aria-haspopup="true" id="item-09">
          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/656549f6d2a99d.jpg" alt="INSTAGRAM ELLE BRASIL">
          <div class="wrapper-overlay">ver +</div>
        </a>

        <h3>INSTAGRAM ELLE BRASIL</h3>
      </li>

      <li class="wrapper-midia__item">
        <a href="javascript:void(0)" class="wrapper-img show" aria-haspopup="true" id="item-10">
          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/556549f15337bc.jpg" alt="INSTAGRAM REVISTA L’OFFICIEL">
          <div class="wrapper-overlay">ver +</div>
        </a>

        <h3>INSTAGRAM REVISTA L’OFFICIEL</h3>
      </li>

      <li class="wrapper-midia__item">
        <a href="javascript:void(0)" class="wrapper-img show" aria-haspopup="true" id="item-11">
          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/256549e266a907.jpg" alt="PORTAL LILIAN PACCE">
          <div class="wrapper-overlay">ver +</div>
        </a>

        <h3>PORTAL LILIAN PACCE</h3>
      </li>

      <li class="wrapper-midia__item">
        <a href="javascript:void(0)" class="wrapper-img show" aria-haspopup="true" id="item-12">
          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/156549de7254e0.jpg" alt="INSTAGRAM BOA FORMA">
          <div class="wrapper-overlay">ver +</div>
        </a>

        <h3>INSTAGRAM BOA FORMA</h3>
      </li>
    </ul>

    <div class="mask" data-id="item-09" role="dialog"></div>
    <div class="modal" role="alert">
      <div class="conteudo__modal">
        <button class="close" role="button"><i class="fas fa-times"></i></button>

        <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/656549f6d1155e.jpg" alt="INSTAGRAM ELLE BRASIL">
      </div>
    </div>

    <div class="mask" data-id="item-10" role="dialog"></div>
    <div class="modal" role="alert">
      <div class="conteudo__modal">
        <button class="close" role="button"><i class="fas fa-times"></i></button>

        <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/556549f151aa21.jpg" alt="INSTAGRAM REVISTA L’OFFICIEL">
      </div>
    </div>

    <div class="mask" data-id="item-11" role="dialog"></div>
    <div class="modal" role="alert">
      <div class="conteudo__modal">
        <button class="close" role="button"><i class="fas fa-times"></i></button>

        <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/256549e260c04d.jpg" alt="PORTAL LILIAN PACCE">
      </div>
    </div>

    <div class="mask" data-id="item-12" role="dialog"></div>
    <div class="modal" role="alert">
      <div class="conteudo__modal">
        <button class="close" role="button"><i class="fas fa-times"></i></button>

        <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/156549de70be35.jpg" alt="INSTAGRAM BOA FORMA">
      </div>
    </div>
    <!-- Row Three -->






    <!-- Row Four -->
    <ul class="wrapper-midia__row">
      <li class="wrapper-midia__item">
        <a href="javascript:void(0)" class="wrapper-img show" aria-haspopup="true" id="item-13">
          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/materia09big53cedbf03d88e.jpg" alt="COM NOVA FORMA DE ABOCANHAR CLIENTES, PRONTO LIGHT É REFERÊNCIA PARA PEQUENAS E MÉDIAS EMPRESAS">
          <div class="wrapper-overlay">ver +</div>
        </a>

        <h3>COM NOVA FORMA DE ABOCANHAR CLIENTES, PRONTO LIGHT É REFERÊNCIA PARA PEQUENAS E MÉDIAS EMPRESAS</h3>
      </li>

      <li class="wrapper-midia__item">
        <a href="javascript:void(0)" class="wrapper-img show" aria-haspopup="true" id="item-14">
          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/materia08big53cedba773b00.jpg" alt="INOVADORA, PRONTO LIGHT É DESTAQUE EM REVISTA DE EMPREENDEDORISMO">
          <div class="wrapper-overlay">ver +</div>
        </a>

        <h3>INOVADORA, PRONTO LIGHT É DESTAQUE EM REVISTA DE EMPREENDEDORISMO</h3>
      </li>

      <li class="wrapper-midia__item">
        <a href="javascript:void(0)" class="wrapper-img show" aria-haspopup="true" id="item-15">
          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/materia07big53cedb7888814.jpg" alt="PRONTO LIGHT É FONTE PARA PEQUENOS EMPRESÁRIOS">
          <div class="wrapper-overlay">ver +</div>
        </a>

        <h3>PRONTO LIGHT É FONTE PARA PEQUENOS EMPRESÁRIOS</h3>
      </li>

      <li class="wrapper-midia__item">
        <a href="javascript:void(0)" class="wrapper-img show" aria-haspopup="true" id="item-16">
          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/materia06big53cedb485a422.jpg" alt="LUCILIA DINIZ FALA DA PRONTO LIGHT NA COLUNA BEM-ESTAR DA CONTIGO">
          <div class="wrapper-overlay">ver +</div>
        </a>

        <h3>LUCILIA DINIZ FALA DA PRONTO LIGHT NA COLUNA BEM-ESTAR DA CONTIGO</h3>
      </li>
    </ul>

    <div class="mask" data-id="item-13" role="dialog"></div>
    <div class="modal" role="alert">
      <div class="conteudo__modal">
        <button class="close" role="button"><i class="fas fa-times"></i></button>

        <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/materia09big53cedbf01bde0.jpg" alt="COM NOVA FORMA DE ABOCANHAR CLIENTES, PRONTO LIGHT É REFERÊNCIA PARA PEQUENAS E MÉDIAS EMPRESAS">
      </div>
    </div>

    <div class="mask" data-id="item-14" role="dialog"></div>
    <div class="modal" role="alert">
      <div class="conteudo__modal">
        <button class="close" role="button"><i class="fas fa-times"></i></button>

        <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/materia07big53cedb785b73f.jpg" alt="INOVADORA, PRONTO LIGHT É DESTAQUE EM REVISTA DE EMPREENDEDORISMO">
      </div>
    </div>

    <div class="mask" data-id="item-15" role="dialog"></div>
    <div class="modal" role="alert">
      <div class="conteudo__modal">
        <button class="close" role="button"><i class="fas fa-times"></i></button>

        <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/materia08big53cedba752b1c.jpg" alt="PRONTO LIGHT É FONTE PARA PEQUENOS EMPRESÁRIOS">
      </div>
    </div>

    <div class="mask" data-id="item-16" role="dialog"></div>
    <div class="modal" role="alert">
      <div class="conteudo__modal">
        <button class="close" role="button"><i class="fas fa-times"></i></button>

        <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/materia06big53cedb4837643.jpg" alt="LUCILIA DINIZ FALA DA PRONTO LIGHT NA COLUNA BEM-ESTAR DA CONTIGO">
      </div>
    </div>
    <!-- Row Four -->





    
    <!-- Row Five -->
    <ul class="wrapper-midia__row">
      <li class="wrapper-midia__item">
        <a href="javascript:void(0)" class="wrapper-img show" aria-haspopup="true" id="item-17">
          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/materia05big53cedadda53f6.jpg" alt="REVISTA BOA FORMA RECOMENDA A RECEITA DA PRONTO LIGHT">
          <div class="wrapper-overlay">ver +</div>
        </a>

        <h3>REVISTA BOA FORMA RECOMENDA A RECEITA DA PRONTO LIGHT</h3>
      </li>

      <li class="wrapper-midia__item">
        <a href="javascript:void(0)" class="wrapper-img show" aria-haspopup="true" id="item-18">
          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/materia04big53cedabe06ede.jpg" alt="NUTRICIONISTA DA PRONTO LIGHT É ENTREVISTADA PELA REVISTA ZERO">
          <div class="wrapper-overlay">ver +</div>
        </a>

        <h3>NUTRICIONISTA DA PRONTO LIGHT É ENTREVISTADA PELA REVISTA ZERO</h3>
      </li>

      <li class="wrapper-midia__item">
        <a href="javascript:void(0)" class="wrapper-img show" aria-haspopup="true" id="item-19">
          <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/materia02big53ceda8075ebe.jpg" alt="DICA DE ALIMENTAÇÃO PARA AS MAMÃES LEITORAS DA REVISTA BABY & CIA">
          <div class="wrapper-overlay">ver +</div>
        </a>

        <h3>DICA DE ALIMENTAÇÃO PARA AS MAMÃES LEITORAS DA REVISTA BABY & CIA</h3>
      </li>
    </ul>

    <div class="mask" data-id="item-17" role="dialog"></div>
    <div class="modal" role="alert">
      <div class="conteudo__modal">
        <button class="close" role="button"><i class="fas fa-times"></i></button>

        <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/materia05big53cedadd80e22.jpg" alt="REVISTA BOA FORMA RECOMENDA A RECEITA DA PRONTO LIGHT">
      </div>
    </div>

    <div class="mask" data-id="item-18" role="dialog"></div>
    <div class="modal" role="alert">
      <div class="conteudo__modal">
        <button class="close" role="button"><i class="fas fa-times"></i></button>

        <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/materia04big53cedabdc972c.jpg" alt="NUTRICIONISTA DA PRONTO LIGHT É ENTREVISTADA PELA REVISTA ZERO">
      </div>
    </div>

    <div class="mask" data-id="item-19" role="dialog"></div>
    <div class="modal" role="alert">
      <div class="conteudo__modal">
        <button class="close" role="button"><i class="fas fa-times"></i></button>

        <img src="<?= wp_upload_dir()["baseurl"] ?>/2018/09/materia02big53ceda8052b83.jpg" alt="DICA DE ALIMENTAÇÃO PARA AS MAMÃES LEITORAS DA REVISTA BABY & CIA">
      </div>
    </div>
    <!-- Row Five -->

  </div>


<?php
get_footer();
