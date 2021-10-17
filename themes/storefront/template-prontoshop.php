<?php
/**
 *
 * Template name: Prontoshop
 *
 * @package storefront
 */

get_header(); ?>

<style>
  .prontoshop header {
    background: #ff5f00;
    width: 100%;
    height: 100%;
    padding: 32px 0;

    display: flex;
    justify-content: center;
    text-align: center;
  }

  .prontoshop header img {
    width: 280px;
  }

  .section-1 {
    position: relative;
    width: 100%;

    display: flex;
    justify-content: flex-end;
  }

  .section-1 p {
    font-size: 1.4rem;
    font-weight: bold;
    color: #003a5d;

    display: flex;

    position: absolute;
    left: 5%;
    top: 50%;

    transform: translateY(-50%);
    margin-bottom: 0;
  }

  .section-1 img {
    display: block;
    max-width: 720px;
  }

  .section-2 p {
    background-color: #003a5d;
    position: relative;
    color: #fff;
    font-size: 1.2rem;
    font-weight: bold;
    line-height: 1.2;
    width: 100%;
    height: auto;
    margin: 0;
    padding: 48px 5%;
  }

  .text-orange {
    color:  #ff5f00;
    display: block;
    margin-bottom: 28px;
  }

  .section-3 {
    width: 100%;
    display: flex;
    align-items: center;
  }

  .section-3 img {
    width: 40%;
    margin: 0;
  }

  .section-3 div {
    width: 60%;
    height: 100%;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  .section-3 p {
    color: #003a5d;
    font-size: 1.4rem;
    font-weight: bold;
    line-height: 1.2;
    margin-bottom: 0;
  }

  .section-4  {
    padding: 48px 5%;
    background-color: #67c18d;
  }

  .section-4 p {
    font-size: 1.2rem;
    color:#003a5d;
    font-weight: bold;
    margin-bottom: 0;
  }

  .section-4 p span{
    font-weight: normal;
  }

  .brands {
    padding: 48px 5%;
  }

  .brands-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }

  .brand {
    width: 49%;
    position: relative;
    margin-bottom: 100px;
  }

  .brands p{
    font-size: 1.2rem;
    color: #003a5d;
    font-weight: bold;
    margin-bottom: 40px;
  }

  .brands button {
    background: #3abd51;
    color: #fff;
    font-size: 1rem;
    font-weight: bold;
    border: none;
    border-radius: 6px;
    padding: 6px 16px;
    cursor: pointer;
    position: absolute;
    bottom: 0;
    left: 10%;
    transform: translateY(50%);
  }

  .brands img {
    width:100%;
  }

  @media(max-width: 768px) {
    .prontoshop header img {
      width: 200px;
    }

    .section-1 p {
      font-size: 1.2rem;
      position: initial;
      transform: translateY(0);
      width: 100%;
      padding: 36px 5%;
    }

    .section-1 img {
      display: none;
    }

    .section-2 p {
      font-size: 1.2rem;
      padding: 36px 5%;
    }

    .section-3 {
      display: flex;
      flex-direction: column;
    }

    .section-3 div {
      width: 100%;
      display: block;
    }

    .section-3 p {
      font-size: 1.2rem;
      padding: 36px  5%;
    }

    .section-3 img {
      width: 100%;
    }

    .section-4 {
      padding: 36px 5%;
    }

    .section-4 p {
      font-size: 1.2rem;
    }

    .brands {
      padding: 36px 5%;
    }

    .brands p {
      font-size: 1.2rem;
      margin-bottom: 28px;
    }

    .brands p br {
      display: none;
    }

    .brand {
      width: 100%;
      margin-bottom: 48px;
    }

    body.page-template-template-prontoshop {
      margin-top: 100px !important;
    }
  }

  @media(max-width: 540px) {
    .prontoshop header {
      padding: 26px 0;
    }

    .prontoshop header img {
      width: 180px;
    }

    .section-1 p {
      font-size: 1rem;
    }

    .section-2 p {
      font-size: 1rem;
      line-height: 1.1;
    }

    .section-3 p {
      font-size: 1rem;
    }

    .section-4 p {
      font-size: 1rem;
    }

    .brands p {
      font-size: 1rem;
    }
  }
</style>

<section class="prontoshop">
  <header>

    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/logo.png' ?>" alt="logo" />
  </header>

  <section class="section-1">
    <p>
      O shopping da comida congelada. </br>
      Um só lugar. Um só carrinho. </br>
      Uma variedade incrível de comida </br>
      boa e pra todos os momentos!
    </p>

    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/salgados.jpg' ?>" alt="imagem de salgados">
  </section>

  <section class="section-2">
    <p>
      Gostamos de comer um pouco de tudo …
      </br>
      </br>

      Durante a semana, gostamos de comida saudável e nos finais de
      semana adoramos doces, tortas, massas e salgados.
      </br>
      </br>

      Também somos adeptos da “segunda sem carne” e nos dias
      corridos recorremos ao nosso famoso PF.
      </br>
      </br>

      Somos plurais, múltiplos e democráticos na hora de comer!
    </p>
  </section>

  <section class="section-3">
    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/doce.jpg' ?>" alt="imagem de doce">

    <div>
      <p>Você também? </br>
        <span class="text-orange"> O PRONTOSHOP foi criado </br>
        para pessoas assim. </span>

        Um shopping online de </br>
        comida boa que traz </br>
        variedade e praticidade na </br>
        sua alimentação.
      </p>
    </div>
  </section>

  <section class="section-4">
    <p>Um só lugar. Um só carrinho. </br>
      <span>Uma variedade incrível de comida para todos os gostos!</span>
    </p>
  </section>

  <div class="brands">
    <p>Acesse as marcas que fazem parte do PRONTOSHOP e compre em </br>
      um só lugar tudo o que você precisa para ser feliz quando o </br>
      assunto é comida. E pronto!
    </p>

    <div class="brands-container">
      <div class="brand">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/eu-quero1.jpg' ?>" alt="logo das marcas 1">
        <button>EU QUERO!</button>
      </div>

      <div class="brand">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/eu-quero2.jpg' ?>" alt="logo das marcas 2">
        <button>EU QUERO!</button>
      </div>

      <div class="brand">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/eu-quero3.jpg' ?>" alt="logo das marcas 3">
        <button>EU QUERO!</button>
      </div>

      <div class="brand">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/eu-quero1.jpg' ?>" alt="logo das marcas 1">
        <button>EU QUERO!</button>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
