<?php
/**
 *
 * Template name: Prontocash
 *
 * @package storefront
 */

get_header(); ?>

<style>
	h1.entry-title {
		display: none !important;
	}

	.woocommerce-MyAccount-navigation {
		display:none;
	}

	.page-template-template-fullwidth-php .woocommerce-MyAccount-content {
    width: 100%;
    float: left;
    margin-right: 0;
		padding-right: 0;
	}

	.prontocash {
		margin-bottom: 48px;
	}

	.prontocash header {
		width: 100%;
		height: 100px;
		background: #ff5f01;
		position: relative;

    display: flex;
    justify-content: flex-end;
    align-items: center;
    padding: 0 24px;
	}

	.prontocash header > img {
		width: 480px;
    position: absolute;
    left: 15%;
    top: 0;
	}

	.prontocash-title {
		width: 100%;
		color: #174063;
		padding: 48px 20%;
	}

	.prontocash-title span {
		font-size: 1.5rem;
	}

	.prontocash-content {
		width: 100%;
		background: #174063;
		color: white;
		padding: 48px 20%;
		text-transform: initial;
		overflow: hidden;

		position: relative;
	}

	.prontocash-content p {
		margin: 0 0 1em;
		padding-right: 10%;
		font-size: 1.1rem;

		z-index: 9;
    position: relative;
	}

	.prontocash-content p span.orange {
		color: #ff5f01;
		font-weight: bold;
	}

	.prontocash-content img {
		width: 220px;
		position: absolute;
		bottom: -72px;
		right: 10%;
	}

	.prontocash-how-it-works {
		width: 100%;
		background: #ff5f01;
	}

	.prontocash-how-it-works h3 {
		display: block;
		color: #174063;
		text-transform: uppercase;
		font-weight: bold;
		margin: 0;
    padding: 0;
		font-size: 1.6rem;
		padding: 20px 12px;
		text-align: center;
	}

	.prontocash-how-it-works > div {
		width: 100%;
		background-color: #f8f8f8;
		padding: 24px 12px;
		display: flex;
	}

	.prontocash-how-it-works article.card {
		width: 300px;
		margin: 0 12px;
	}

  .button-wrapper {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f8f8f8;
    padding-bottom: 24px;
  }

  .button-wrapper a {
    display: block
  }

	@media(max-width: 768px) {
		.prontocash header > img {
			width: 320px;
			left: 8%;
		}

		.prontocash header {
			width: 100%;
			height: 70px;
		}

		.prontocash-content {
    	padding: 24px 10%;
		}

		.prontocash-title span {
    	font-size: 1.2rem;
		}

		.prontocash-title {
			padding: 24px 10%;
		}

		.prontocash-content p {
			margin: 0 0 0.8em;
			padding-right: 0;
			font-size: 1rem;
		}

		.prontocash-content img {
				width: 170px;
				bottom: -52px;
				right: 10%;
			}

		.prontocash-how-it-works > div {
			flex-direction: column;
			align-items: center;
    	justify-content: center;
		}

		.prontocash-how-it-works article.card {
			margin-bottom: 24px;
		}

		.prontocash-how-it-works article.card:last-child {
			margin-bottom: 0;
		}

    body.page-template-template-prontocash {
      margin-top: 100px !important;
    }
	}

  @media(max-width: 540px) {
		.prontocash header > img {
			width: 240px;
			left: 8%;
      top: 7px;
		}

		.prontocash header {
			width: 100%;
			height: 60px;
      padding: 0 12px;
		}

		.prontocash-content {
    	padding: 24px 7%;
		}
	}

</style>

<section class="prontocash">
  <header>
    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/site_prontocash.png' ?>" alt="Pronto Cash logo">

    <a class="button" href="<?php echo get_site_url(); ?>/minha-conta/points-and-rewards/">Meus créditos 💰</a>
  </header>

  <div class="prontocash-title">
    <span>
      ProntoCash. É dinheiro de volta em todas </br>
      as suas compras e … <strong>pronto!</strong>
    </span>
  </div>

  <div class="prontocash-content">
    <p>
      <span class="orange">
        O melhor caschback que você já viu.
      </span>
      Sabe por quê? Porque é de comida, claro! hehehe.
    </p>

    <p>
      Além disso, é parte do seu dinheiro de volta em TODAS as compras dentro do nosso site. Isso mesmo, T-O-D-A-S! E você já pode usar o seu ProntoCash a partir do segundo pedido e tem até 90 dias pra usar.
    </p>

    <p>
      O ProntoCash da Pronto Light veio pra dar aquela forcinha no seu orçamento. Aproveite!
      <strong>
        Quanto mais prontolover você é, mais ganha!
      </strong>
    </p>

    <p>
      Porque aqui é assim, quanto mais amor, mais comida e benefícios a gente quer te dar!
    </p>

    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/prancheta_prontocash.png' ?>" alt="Pronto Cash prancheta">
  </div>

  <div class="prontocash-how-it-works">
    <h3>
      Como funciona?
    </h3>

    <div>
      <article class="card">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/card1_prontocash.png' ?>" alt="Card Pronto Cash">
      </article>

      <article class="card">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/card2_prontocash.png' ?>" alt="Card Pronto Cash">
      </article>

      <article class="card">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/card3_prontocash.png' ?>" alt="Card Pronto Cash">
      </article>

      <article class="card">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/card4_prontocash.png' ?>" alt="Card Pronto Cash">
      </article>
    </div>

    <section class="button-wrapper">
      <a class="button" href="https://site.prontolight.com/prontocash-termos-de-uso/">Termos e Condições</a>
    </section>
  </div>
</section>

<?php
get_footer();
