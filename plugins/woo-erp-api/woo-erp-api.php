<?php
/*
  Plugin Name: Woo ERP API
  Author: Feliphe Felix
*/

error_reporting(1);
ini_set("display_errors", true);
ini_set('max_execution_time', 300);

add_action( "admin_menu", "woo_generate_api_key_menu" );
function woo_generate_api_key_menu() {
  add_menu_page( "Woo ERP API - Chave", "Woo ERP API", "manage_options", "woo-generate-api-key", "woo_generate_api_key", "" );
}

function woo_generate_api_key() {
  if ($_POST['update']) {
    $key = base64_encode(password_hash(rand(1, 999), PASSWORD_DEFAULT));
    if (update_option( "woo_erp_key", $key )) {
      wp_redirect( admin_url("?page=woo-generate-api-key") ); exit();
    }
  }

    $key = get_option( "woo_erp_key", "Nenhum chave gerada." );
?>
  <form method="POST">
    <p>
      <label>Chave da API</label>
    </p>
    <p>
      <input type="text" value="<?php echo $key ?>">
    </p>
    <p>
      <input type="submit" name="update" value="Gerar Nova Chave">
    </p>
  </form>
<?php
}

add_action( "init", "woo_erp_customer" );
function woo_erp_customer() {
  if ($_GET['action_usuario']) {
    header("Content-Type: application/json");

    $key = get_option( "woo_erp_key"  );

    if ($key != $_GET['chave_api'] && $key != $_POST['chave_api']) {
      echo json_encode(array("erro" => "Chave da API não encontrada."));
      exit();
    }

    global $wpdb;

    // $nome       = $_POST['nome'];
    // $sobrenome  = $_POST['sobrenome'];
    // $email      = $_POST['email'];
    // $senha      = $_POST['senha'];
    // $sexo       = $_POST['sexo'];
    // $cnpj       = $_POST['cnpj'];
    // $cpf        = $_POST['cpf'];
    // $inscricao_estadual = $_POST['inscricao_estadual'];
    // $enderecos = $_POST['enderecos'];
    // $endereco = $_POST['endereco'];
    // $numero = $_POST['numero'];
    // $complemento = $_POST['complemento'];
    // $bairro = $_POST['bairro'];
    // $cidade = $_POST['cidade'];
    // $estado = $_POST['estado'];
    // $cep = $_POST['cep'];
    // $telefone = $_POST['telefone'];
    // $celular = $_POST['celular'];
    // $data_registro = $_POST['data_registro'];
    // $data_nascimento = $_POST['data_nascimento'];
    // $status = strtolower($_POST['status']);
    $importado = (int) $_POST['importado'];

    if (empty($cnpj)) {
      $tipopessoa = 1;
    } else {
      $tipopessoa = 2;
    }

    $action = "update";

    $user_id = (int) $_POST['cod_cliente'];

    $loginame = strtolower($nome."_".$sobrenome).rand(1,9);

    // if ($user_id == 0) {
    //     if (!empty($nome) || !empty($sobrenome)) {
    //         $userdata = array(
    //             'first_name'  => $nome,
    //             'last_name'   => $sobrenome,
    //             'user_login'  =>  $loginame,
    //             'user_pass'   =>  $senha
    //         );
    //     }

    //     $user_id = wp_insert_user( $userdata ) ;

    //     if ( is_wp_error( $user_id ) ) {
    //         echo json_encode($user_id);
    //         exit();
    //     }

    //     $user_role = new WP_User($user_id);
    //     $user_role->set_role("customer");

    //     $action = "insert";
    // } else {
    // 	$userdata = array(
    // 		"ID"          => $user_id,
    // 		'first_name'  => $nome,
    // 		'last_name'   => $sobrenome,
    // 		'user_login'  => $loginame
    // 	);

    // 	if (!empty($senha)) {
    // 		$userdata['user_pass'] = $senha;
    // 	}

    // 	wp_update_user( $userdata );
    // }

    if ($user_id != 0 && $status == "deletar") {
      if ($wpdb->delete($wpdb->users, array("ID" => $user_id))) {
        if ($wpdb->delete($wpdb->usermeta, array("user_id" => $user_id))) {
          echo json_encode(array("sucesso" => "Usuário deletado com sucesso."));
          exit();
        }
      } else {
        echo json_encode(array("error" => "Usuário não encotrado."));
        exit();
      }

      echo json_encode(array("sucesso" => "Usuário deletado com sucesso."));
      exit();
    }

    // update_user_meta( $user_id, "billing_sex", $sexo );
    // update_user_meta( $user_id, "billing_cnpj", $cnpj );
    // update_user_meta( $user_id, "billing_cpf", $cpf );
    // update_user_meta( $user_id, "billing_ie", $inscricao_estadual );
    // update_user_meta( $user_id, "billing_address_1", $endereco );
    // update_user_meta( $user_id, "billing_address_2", $complemento );
    // update_user_meta( $user_id, "billing_number", $numero );
    // update_user_meta( $user_id, "billing_neighborhood", $bairro );
    // update_user_meta( $user_id, "billing_city", $cidade );
    // update_user_meta( $user_id, "billing_state", $estado );
    // update_user_meta( $user_id, "billing_postcode", $cep );
    // update_user_meta( $user_id, "billing_phone", $telefone );
    // update_user_meta( $user_id, "billing_cellphone", $celular );
    // update_user_meta( $user_id, "billing_persontype", $tipopessoa );
    // update_user_meta( $user_id, "data_registro", date("Y-m-d H:i:s") );
    // update_user_meta( $user_id, "billing_birthdate", $data_nascimento );
    update_user_meta( $user_id, "importado", $importado );

    if ($action == "update") {
      echo json_encode(array("sucesso" => "Usuário atualizado com sucesso."));
      exit();
    }

    echo json_encode(array("sucesso" => "Usuário inserido com sucesso.", "usuario" => $user_id));
    exit();
  }
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'woo-erp-api/v1', '/usuarios/', array(
    'methods' => 'GET',
    'callback' => 'woo_json_api_get_usuarios',
  ) );
} );
function woo_json_api_get_usuarios() {
  header("Content-Type: application/json");

  $key = get_option( "woo_erp_key"  );

  if ($key != $_GET['chave_api'] && $key != $_POST['chave_api']) {
    echo json_encode(array("erro" => "Chave da API não encontrada.")); exit();
  }

  global $wpdb;

  $page = (int) $_GET['pagina'] - 1;
  $perpage = (empty($_GET['total'])) ? 10000 : (int) $_GET['total'];
  $load_reg = ($page == 0) ? 0 : $page * $perpage;

  $isImportado = $_GET['importado'];

  if ((string) $isImportado === "") {
    $usuarios_dados = $wpdb->get_results(
      "SELECT ID as cod_cliente, user_registered
      FROM $wpdb->users
      ORDER BY user_registered ASC
      LIMIT {$load_reg},{$perpage}",
      ARRAY_A
    );
  }

  if ((string) $isImportado !== "") {
    $usuarios_dados = $wpdb->get_results(
      "SELECT wp_users.ID as cod_cliente, wp_usermeta.meta_key , wp_usermeta.meta_value
      FROM wp_users
      INNER JOIN wp_usermeta on wp_users.ID = wp_usermeta.user_id
      WHERE wp_usermeta.meta_key='importado' and wp_usermeta.meta_value = {$isImportado}
      ORDER BY user_registered ASC
      LIMIT {$load_reg},{$perpage}",
      ARRAY_A
    );
  }

  $x = 0;

  foreach ($usuarios_dados as $usuario_dados) {
    $id_usuario = $usuario_dados['cod_cliente'];
    $user_data = get_userdata( $id_usuario );

    $importado          = get_user_meta( $id_usuario, "importado" );
    $sexo               = get_user_meta( $id_usuario, "billing_sex" );
    $cnpj               = get_user_meta( $id_usuario, "billing_cnpj" );
    $cpf                = get_user_meta( $id_usuario, "billing_cpf" );
    $inscricao_estadual = get_user_meta( $id_usuario, "inscricao_estadual" );
    $endereco           = get_user_meta( $id_usuario, "billing_address_1" );
    $numero             = get_user_meta( $id_usuario, "billing_number" );
    $complemento        = get_user_meta( $id_usuario, "billing_address_2" );
    $endereco_entrega_1 = get_user_meta( $id_usuario, "shipping_address_1" );
    $endereco_entrega_2 = get_user_meta( $id_usuario, "shipping_address_2" );

    $bairro = get_user_meta( $id_usuario, "billing_neighborhood" );
    $cidade = get_user_meta( $id_usuario, "billing_city" );
    $estado = get_user_meta( $id_usuario, "billing_state" );
    $cep    = get_user_meta( $id_usuario, "billing_postcode" );

    $telefone           = get_user_meta( $id_usuario, "billing_phone" );
    $celular            = get_user_meta( $id_usuario, "billing_cellphone" );
    $data_registro      = get_user_meta( $id_usuario, "data_registro" );
    $data_nascimento    = get_user_meta( $id_usuario, "billing_birthdate" );
    $tipo_pessoa        = get_user_meta( $id_usuario, "billing_persontype" );

    $numero_entrega = get_user_meta( $id_usuario, "shipping_number" );
    $bairro_entrega = get_user_meta( $id_usuario, "shipping_neighborhood" );
    $cidade_entrega = get_user_meta( $id_usuario, "shipping_city" );
    $estado_entrega = get_user_meta( $id_usuario, "shipping_state" );
    $cep_entrega    = get_user_meta( $id_usuario, "shipping_postcode" );


    $endereco_entrega = array([
      "endereco_entrega" => $endereco_entrega_1[0],
      "complemento" => $endereco_entrega_2[0],
      "estado" => $estado_entrega[0],
      "bairro" => $bairro_entrega[0],
      "cidade" => $cidade_entrega[0],
      "cep" => $cep_entrega[0],
      "numero" => $numero_entrega[0]
    ]);

    $endereco_cobranca = array([
      "endereco_cobranca" => $endereco[0],
      "complemento" => $complemento[0],
      "estado" => $estado[0],
      "bairro" => $bairro[0],
      "cidade" => $cidade[0],
      "cep" => $cep[0],
      "numero" => $numero[0]
    ]);

    $usuarios_dados[$x]['nome']       = $user_data->first_name !== "" ? $user_data->first_name : $user_data->billing_first_name;
    $usuarios_dados[$x]['sobrenome']  = $user_data->last_name !== "" ? $user_data->last_name : $user_data->billing_last_name;
    $usuarios_dados[$x]['email']      = $user_data->user_email;

    $usuarios_dados[$x]['sexo']                 = $sexo[0];
    $usuarios_dados[$x]['cnpj']                 = $cnpj[0];
    $usuarios_dados[$x]['cpf']                  = $cpf[0];
    $usuarios_dados[$x]['inscricao_estadual']   = $inscricao_estadual[0];
    $usuarios_dados[$x]['endereco_entrega']     = $endereco_entrega;
    $usuarios_dados[$x]['endereco_cobranca']    = $endereco_cobranca;
    $usuarios_dados[$x]['telefone']             = $telefone[0];
    $usuarios_dados[$x]['celular']              = $celular[0];
    $usuarios_dados[$x]['data_registro']        = date("d-m-Y H:i:s", strtotime($usuario_dados['user_registered']));
    $usuarios_dados[$x]['data_nascimento']      = str_replace('/', '-', $data_nascimento[0]);
    $usuarios_dados[$x]['tipo_pessoa']          = ($tipo_pessoa[0] == 1) ? "Pessoa Física" : "Pessoa Jurídica";
    $usuarios_dados[$x]['importado']            = (int) $importado[0];

    unset($usuarios_dados[$x]['user_registered']);

    // if ( $isImportado !== null && (int) $isImportado !== (int) $importado[0] ) {
    //   unset($usuarios_dados[$x]);
    // }

    unset($usuarios_dados[$x]['meta_key']);
    unset($usuarios_dados[$x]['meta_value']);

    $x++;
  }

  echo json_encode(array_values($usuarios_dados)); exit();
}



add_action( 'rest_api_init', function () {
  register_rest_route( 'woo-erp-api/v1', '/usuario/', array(
    'methods' => 'GET',
    'callback' => 'woo_json_api_get_usuario',
  ) );
} );
function woo_json_api_get_usuario() {
  header("Content-Type: application/json");

  $key = get_option( "woo_erp_key"  );

  if ($key != $_GET['chave_api'] && $key != $_POST['chave_api']) {
    echo json_encode(array("erro" => "Chave da API não encontrada."));
    exit();
  }


  global $wpdb;
  $id_usuario = (int) $_GET['cod_cliente'];

  $usuarios_dados = $wpdb->get_results("SELECT ID as cod_cliente, user_registered FROM $wpdb->users WHERE ID = '{$id_usuario}'", ARRAY_A);
  $usuario_dados = $usuarios_dados[0];
  $x = 0;

  $id_usuario = $usuario_dados['cod_cliente'];
  $user_data = get_userdata( $id_usuario );


  $sexo = get_user_meta( $id_usuario, "billing_sex" );
  $cnpj = get_user_meta( $id_usuario, "billing_cnpj" );
  $cpf = get_user_meta( $id_usuario, "billing_cpf" );
  $inscricao_estadual = get_user_meta( $id_usuario, "inscricao_estadual" );
  $endereco = get_user_meta( $id_usuario, "billing_address_1" );
  $numero = get_user_meta( $id_usuario, "billing_number" );
  $complemento = get_user_meta( $id_usuario, "billing_address_2" );
  $endereco_entrega_1 = get_user_meta( $id_usuario, "shipping_address_1" );
  $endereco_entrega_2 = get_user_meta( $id_usuario, "shipping_address_2" );


  $bairro = get_user_meta( $id_usuario, "billing_neighborhood" );
  $cidade = get_user_meta( $id_usuario, "billing_city" );
  $estado = get_user_meta( $id_usuario, "billing_state" );
  $cep = get_user_meta( $id_usuario, "billing_postcode" );

  $telefone = get_user_meta( $id_usuario, "billing_phone" );
  $celular = get_user_meta( $id_usuario, "billing_cellphone" );
  $data_registro = get_user_meta( $id_usuario, "data_registro" );
  $data_nascimento = get_user_meta( $id_usuario, "billing_birthdate" );
  $tipo_pessoa = get_user_meta( $id_usuario, "billing_persontype" );


  $numero_entrega = get_user_meta( $id_usuario, "shipping_number" );
  $bairro_entrega = get_user_meta( $id_usuario, "shipping_neighborhood" );
  $cidade_entrega = get_user_meta( $id_usuario, "shipping_city" );
  $estado_entrega = get_user_meta( $id_usuario, "shipping_state" );
  $cep_entrega    = get_user_meta( $id_usuario, "shipping_postcode" );
  $importado      = get_user_meta( (int)$id_usuario, "importado" );

  $endereco_entrega = array([
    "endereco_entrega" => $endereco_entrega_1[0],
    "complemento" => $endereco_entrega_2[0],
    "estado" => $estado_entrega[0],
    "bairro" => $bairro_entrega[0],
    "cidade" => $cidade_entrega[0],
    "cep" => $cep_entrega[0],
    "numero" => $numero_entrega[0]
  ]);

  $endereco_cobranca = array([
    "endereco_cobranca" => $endereco[0],
    "complemento" => $complemento[0],
    "estado" => $estado[0],
    "bairro" => $bairro[0],
    "cidade" => $cidade[0],
    "cep" => $cep[0],
    "numero" => $numero[0]
  ]);

  $usuarios_dados[$x]['cod_cliente'] = (int)$id_usuario;
  $usuarios_dados[$x]['nome'] = $user_data->first_name !== "" ? $user_data->first_name : $user_data->billing_first_name;
  $usuarios_dados[$x]['sobrenome'] = $user_data->last_name !== "" ? $user_data->last_name : $user_data->billing_last_name;
  $usuarios_dados[$x]['email'] = $user_data->user_email;

  $usuarios_dados[$x]['sexo'] = $sexo[0];
  $usuarios_dados[$x]['cnpj'] = $cnpj[0];
  $usuarios_dados[$x]['cpf'] = $cpf[0];
  $usuarios_dados[$x]['inscricao_estadual'] = $inscricao_estadual[0];
  $usuarios_dados[$x]['endereco_entrega'] = $endereco_entrega;
  $usuarios_dados[$x]['endereco_cobranca'] = $endereco_cobranca;
  $usuarios_dados[$x]['telefone']         = $telefone[0];
  $usuarios_dados[$x]['celular']          = $celular[0];
  $usuarios_dados[$x]['data_registro']    = date("d-m-Y H:i:s", strtotime($usuario_dados['user_registered']));
  $usuarios_dados[$x]['data_nascimento']  = $data_nascimento[0];
  $usuarios_dados[$x]['tipo_pessoa']      = ($tipo_pessoa[0] === 1) ? "Pessoa Física" : "Pessoa Jurídica";
  $usuarios_dados[$x]['importado']        = (int) $importado[0];
  unset($usuarios_dados[$x]['user_registered']);
  $x++;

  echo json_encode($usuarios_dados); exit();
}



add_action( 'rest_api_init', function () {
  register_rest_route( 'woo-erp-api/v1', '/produto/', array(
    'methods' => 'GET',
    'callback' => 'woo_api_json_get_produto',
  ) );
} );
function woo_api_json_get_produto() {
  header("Content-Type: application/json");

  $key = get_option( "woo_erp_key"  );

  if ($key != $_GET['chave_api'] && $key != $_POST['chave_api']) {
    echo json_encode(array("erro" => "Chave da API não encontrada."));
    exit();
  }

  global $wpdb;

  $post_id = (int) $_GET['cod_produto'];
  $produtos_dados = $wpdb->get_results("SELECT ID as cod_produto FROM $wpdb->posts WHERE ID = '{$post_id}'", ARRAY_A);
  $produto_dados = $produtos_dados[0];

  $x = 0;
  $id_produto = (int) $produto_dados['cod_produto'];
  $produto = wc_get_product($id_produto);

  $bundles = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}woocommerce_bundled_items WHERE bundle_id = '{$post_id}'", ARRAY_A);

  if ($produto->get_type() == "simple") {
    $produtos_dados[$x]['tipo'] = "Produto";
  } elseif ($produto->get_type() == "menu_product") {
    $produtos_dados[$x]['tipo'] = "Kit";
  } elseif ($produtos_dados[$x]['tipo'] == "bundle") {
    $produtos_dados[$x]['tipo'] = "Prato";
  } else {
    $produtos_dados[$x]['tipo'] = $produto->get_type();
  }

  $produtos_dados[$x]['sku'] = $produto->get_sku();

  $terms = get_the_terms( $id_produto, 'product_cat' );
  foreach ($terms as $term) {
    if ($term->parent === 0) {
      $categoria = $term;
    }
  }

  foreach ($terms as $term) {
    if ($term->parent !== 0 && $term->parent === $categoria->term_id) {
      $sub_categoria = $term;
    }
  }

  foreach ($terms as $term) {
    if ($term->parent !== 0 && $term->parent === $sub_categoria->term_id) {
      $sub_categoria_complementar = $term;
    }
  }

  $calorias                                   = get_post_meta($id_produto, "meal_info_kcal", true);
  $produtos_dados[$x]['cod_produto']          = $id_produto;
  $produtos_dados[$x]['nome']                 = $produto->get_name();
  $produtos_dados[$x]['categoria']            = $categoria->name;
  $produtos_dados[$x]['sub_categoria']        = $sub_categoria->name;
  $produtos_dados[$x]['sub_categoria_complementar']        = $sub_categoria_complementar->name;
  $produtos_dados[$x]['calorias']             = ((int) $calorias !== 0) ? (string) $calorias."g" : (int) $calorias;
  $produtos_dados[$x]['peso']                 = ((int) $produto->get_weight() !== 0) ? (string) $produto->get_weight()."g" : (int) $produto->get_weight();
  $produtos_dados[$x]['tabela_nutricional']   = get_post_meta($id_produto, "tabela_nutricional", true);
  $produtos_dados[$x]['preco']                = (float) $produto->get_price();

  $produtos_dados[$x]['importado']           = (int) get_post_meta( $id_produto, "importado", true );

  $produtos_dados[$x]['id_sistema']           = (int) get_post_meta( $id_produto, 'id_sistema',  true );
  $produtos_dados[$x]['ncm']                  = (float) get_post_meta( $id_produto, 'ncm',  true );
  $produtos_dados[$x]['cfop']                 = (float) get_post_meta( $id_produto, 'cfop',  true );
  $produtos_dados[$x]['cst']                  = (float) get_post_meta( $id_produto, 'cst', true );
  $produtos_dados[$x]['icms']                 = (float) get_post_meta( $id_produto, 'icms', true );
  $produtos_dados[$x]['reducao_bc_icms']      = (float) get_post_meta( $id_produto, 'reducao_bc_icms', true );
  $produtos_dados[$x]['seco']                 = (float) get_post_meta( $id_produto, 'seco', true );
  $produtos_dados[$x]['atributos']            = $produto->get_attribute( 'filtros' );

  $fields = array(
    'field_5b10f204525d1' => "Café da Manhã",
    'field_5b10f21f525d2' => "Lanche da Manhã",
    'field_5b10f22e525d3' => "Almoço",
    'field_5b10f29b525d4' => "Lanche da Tarde",
    'field_5b10f2be525d5' => "Jantar",
    'field_5b10f2e0525d6' => "Ceia"
  );

  $itens = $wpdb->get_results("SELECT * FROM $wpdb->postmeta WHERE post_id = '{$id_produto}' AND meta_key LIKE '%menu_days_%'", ARRAY_A);
  $produtos_dados[$x]['produtos'] = array();
  //$produtos_dados[$x]['kit'] = true;
  $i = 0;
  foreach ($itens as $item) {
    $menu_refeicoes = maybe_unserialize($item['meta_value']);
    $dia = explode("_", $item['meta_key']);
    $dia = $dia[2];

    $periodo = $fields[get_post_meta($id_produto, "_".$item['meta_key'], true)];

    foreach ($menu_refeicoes as $menu_refeicao) {
      $menu_produto = wc_get_product($menu_refeicao);
      $menu_array = array(
        "cod_produto"   => (int) $menu_refeicao,
        "dia"           => $dia + 1,
        "periodo"       => $periodo,
        "produto"       => get_the_title( (int)$menu_refeicao ),
        "peso"          => ((int) $menu_produto->get_weight() !== 0) ? (string) $menu_produto->get_weight()."g" : (int) $menu_produto->get_weight(),
      );

      $produtos_dados[$x]['produtos'][] = $menu_array;
      $i++;
    }
  }

  foreach ($bundles as $bundle) {
    $product_bundle = wc_get_product($bundle['product_id']);
    $produtos_dados[$x]['produtos'][] = array(
      "cod_produto"   => (int) $bundle['product_id'],
      "produto"       => $product_bundle->get_name(),
      "peso"          => ((int) $product_bundle->get_weight() !== 0) ? (string) $product_bundle->get_weight()."g" : (int) $product_bundle->get_weight(),
    );
  }

  $x++;

  echo json_encode($produtos_dados); exit();
}



add_action( 'rest_api_init', function () {
  register_rest_route( 'woo-erp-api/v1', '/produtos/', array(
    'methods' => 'GET',
    'callback' => 'woo_api_json_get_produtos',
  ) );
} );
function woo_api_json_get_produtos() {
  header("Content-Type: application/json");

  $key = get_option( "woo_erp_key"  );

  if ($key != $_GET['chave_api'] && $key != $_POST['chave_api']) {
    echo json_encode(array("erro" => "Chave da API não encontrada."));
    exit();
  }

  global $wpdb;

  $page     = (int) $_GET['pagina'] - 1;
  $perpage  = (empty($_GET['total'])) ? 10000 : (int) $_GET['total'];
  $load_reg = ($page == 0) ? 0 : $page * $perpage;

  $isImportado = $_GET['importado'];

  if ((string) $isImportado === "") {
    $produtos_dados = $wpdb->get_results(
      "SELECT ID as cod_produto FROM $wpdb->posts WHERE post_type = 'product' ORDER BY post_date ASC LIMIT {$load_reg},{$perpage}",
      ARRAY_A
    );
  }

  if ((string) $isImportado !== "") {
    $produtos_dados = $wpdb->get_results(
      "SELECT wp_posts.ID as cod_produto, wp_postmeta.meta_key , wp_postmeta.meta_value
      FROM wp_posts
      INNER JOIN wp_postmeta on wp_posts.ID = wp_postmeta.post_id
      WHERE wp_posts.post_type = 'product' AND wp_postmeta.meta_key = 'importado' AND wp_postmeta.meta_value = {$isImportado}
      ORDER BY post_date DESC
      LIMIT {$load_reg}, {$perpage}",
      ARRAY_A
    );
  }

  $x = 0;
  foreach ($produtos_dados as $produto_dados) {
    $id_produto = (int) $produto_dados['cod_produto'];
    $produto = wc_get_product($id_produto);

    if ($produto->get_type() == "simple") {
      $produtos_dados[$x]['tipo'] = "Produto";
    } elseif ($produto->get_type() == "menu_product") {
      $produtos_dados[$x]['tipo'] = "Kit";
    } elseif ($produtos_dados[$x]['tipo'] == "bundle") {
      $produtos_dados[$x]['tipo'] = "Prato";
    } else {
      $produtos_dados[$x]['tipo'] = $produto->get_type();
    }

    $produtos_dados[$x]['sku'] = $produto->get_sku();

    $terms = get_the_terms( $id_produto, 'product_cat' );


    foreach ($terms as $term) {
      if ($term->parent === 0) {
        $categoria = $term;
      }
    }

    foreach ($terms as $term) {
      if ($term->parent !== 0 && $term->parent === $categoria->term_id) {
        $sub_categoria = $term;
      }
    }

    foreach ($terms as $term) {
      if ($term->parent !== 0 && $term->parent === $sub_categoria->term_id) {
        $sub_categoria_complementar = $term;
      }
    }

    if (count($terms) === 1 && $terms[0]->parent === 0) {
      $sub_categoria = null;
    }

    $calorias                                   = get_post_meta($id_produto, "meal_info_kcal", true);
    $produtos_dados[$x]['cod_produto']          = $id_produto;
    $produtos_dados[$x]['nome']                 = $produto->get_name();
    $produtos_dados[$x]['categoria']            = $categoria->name;
    $produtos_dados[$x]['sub_categoria']        = $sub_categoria->name;
    $produtos_dados[$x]['sub_categoria_complementar']        = $sub_categoria_complementar->name;
    $produtos_dados[$x]['calorias']             = ((int) $calorias !== 0) ? (string) $calorias."g" : (int) $calorias;
    $produtos_dados[$x]['peso']                 = ((int) $produto->get_weight() !== 0) ? (string) $produto->get_weight()."g" : (int) $produto->get_weight();
    $produtos_dados[$x]['tabela_nutricional']   = get_post_meta($id_produto, "tabela_nutricional", true);
    $produtos_dados[$x]['preco']                = (float) $produto->get_price();

    $produtos_dados[$x]['importado']           = (int) get_post_meta( $id_produto, "importado", true );

    $produtos_dados[$x]['id_sistema']           = (int) get_post_meta( $id_produto, 'id_sistema',  true );
    $produtos_dados[$x]['ncm']                  = (float) get_post_meta( $id_produto, 'ncm',  true );
    $produtos_dados[$x]['cfop']                 = (float) get_post_meta( $id_produto, 'cfop',  true );
    $produtos_dados[$x]['cst']                  = (float) get_post_meta( $id_produto, 'cst', true );
    $produtos_dados[$x]['icms']                 = (float) get_post_meta( $id_produto, 'icms', true );
    $produtos_dados[$x]['reducao_bc_icms']      = (float) get_post_meta( $id_produto, 'reducao_bc_icms', true );
    $produtos_dados[$x]['seco']                 = (float) get_post_meta( $id_produto, 'seco', true );
    $produtos_dados[$x]['atributos']            = $produto->get_attribute( 'filtros' );

    $fields = array(
      'field_5b10f204525d1' => "Café da Manhã",
      'field_5b10f21f525d2' => "Lanche da Manhã",
      'field_5b10f22e525d3' => "Almoço",
      'field_5b10f29b525d4' => "Lanche da Tarde",
      'field_5b10f2be525d5' => "Jantar",
      'field_5b10f2e0525d6' => "Ceia"
    );

    $itens = $wpdb->get_results("SELECT * FROM $wpdb->postmeta WHERE post_id = '{$id_produto}' AND meta_key LIKE '%menu_days_%'", ARRAY_A);
    $produtos_dados[$x]['produtos'] = array();
    //$produtos_dados[$x]['kit'] = true;
    $i = 0;

    foreach ($itens as $item) {
      $menu_refeicoes = maybe_unserialize($item['meta_value']);
      $dia = explode("_", $item['meta_key']);
      $dia = $dia[2];

      $periodo = $fields[get_post_meta($id_produto, "_".$item['meta_key'], true)];

      foreach ($menu_refeicoes as $menu_refeicao) {
        $menu_produto = wc_get_product((int)$menu_refeicao);
        $menu_array = array(
          "cod_produto"   => (int) $menu_refeicao,
          "dia"           => $dia + 1,
          "periodo"       => $periodo,
          "produto"       => get_the_title( (int)$menu_refeicao ),
          // "peso"          => ((int) $menu_produto->get_weight() !== 0) ? (string) $menu_produto->get_weight()."g" : (int) $menu_produto->get_weight(),
        );

        $produtos_dados[$x]['produtos'][] = $menu_array;
        $i++;
      }
    }

    $bundles = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}woocommerce_bundled_items WHERE bundle_id = '{$id_produto}'", ARRAY_A);

    foreach ($bundles as $bundle) {
      $product_bundle = wc_get_product($bundle['product_id']);

      if($product_bundle = wc_get_product($bundle['product_id'])) {
        $produtos_dados[$x]['produtos'][] = array(
          "cod_produto"   => (int) $bundle['product_id'],
          "produto"       => $product_bundle->get_name(),
          "peso"          => ((int) $product_bundle->get_weight() !== 0) ? (string) $product_bundle->get_weight()."g" : (int) $product_bundle->get_weight(),
        );
      }
    }
    $x++;
  }

  echo json_encode($produtos_dados);
  exit();
}



add_action( "init", "woo_erp_product" );
function woo_erp_product() {
  if ($_GET['action_produto']) {
    header("Content-Type: application/json");

    $key = get_option( "woo_erp_key"  );

    if ($key != $_GET['chave_api'] && $key != $_POST['chave_api']) {
      echo json_encode(array("erro" => "Chave da API não encontrada.")); exit();
    }

    global $wpdb;

    $post_id = (int) $_POST['cod_produto'];
    $tipo = $_POST['tipo'];
    $nome = $_POST['nome'];
    $sku = $_POST['sku'];
    $categoria = $_POST['categoria'];
    $desconto = $_POST['desconto'];
    $preco = $_POST['preco'];
    $calorias = $_POST['calorias'];
    $tabela_nutricional = $_POST['tabela_nutricional'];
    $image_url = $_POST['imagem_url'];
    $importado = $_POST['importado'];

    $ncm = $_POST['ncm'];
    $cfop = $_POST['cfop'];
    $cst = $_POST['cst'];
    $icms = $_POST['icms'];
    $reducao_bcicms = $_POST['reducao_bcicms'];
    $seco = ($_POST['seco'] == true) ? 1 : 0;

    // if ($post_id == 0) {
    //   $post_id = wp_insert_post( array(
    //     'post_title'    => $nome,
    //     'post_content'  => '',
    //     'post_status'   => 'publish',
    //     'post_type'     => "product",
    //   ) );

    //   if ( is_wp_error( $post_id ) ) {
    //     echo json_encode($post_id); exit();
    //   }

    //   $tipo_action = "insert";
    // } else {
    //   wp_update_post( array(
    //     'ID'            => $post_id,
    //     'post_title'    => $nome,
    //     'post_content'  => '',
    //     'post_status'   => 'publish',
    //     'post_type'     => "product",
    //   ) );
    //   $tipo_action = "update";
    // }


    // if ($tipo == "kit") {
    //   $fields = array(
    //     "cmanha" => array('field_5b10f204525d1', 'breakfast'),
    //     "lmanha" => array('field_5b10f21f525d2', 'brunch'),
    //     "almoco" => array('field_5b10f22e525d3', 'lunch'),
    //     "ltarde" => array('field_5b10f29b525d4', 'snack_dinner'),
    //     "jantar" => array('field_5b10f2be525d5', 'dinner'),
    //     "ceia"   => array('field_5b10f2e0525d6', 'supper')
    //   );

    //   $kits = $_POST['produtos'];
    //   wp_set_object_terms( $post_id, 'menu_product', 'product_type' );

    //   $i = 0;

    //   $days = 0;

    //   foreach ($kits as $kit_days) {
    //     if ((int) $kit_days['dia'] != $yesterday) { $days++; }

    //     $yesterday = (int) $kit_days['dia'];
    //   }

    //   for ($c=0;$c<=$days;$c++){
    //     foreach ($fields as $field) {
    //       $skus = array();

    //       update_post_meta($post_id, "menu_days_".$c."_".$field[1], $skus);
    //       update_post_meta($post_id, "_menu_days_".$c."_".$field[1], $field[0]);
    //     }
    //   }

    //   foreach ($kits as $kit) {
    //     foreach ($fields as $field) {
    //       $cfield = $fields[$kit['periodo']];
    //       $skus = array();

    //       if ($field[0] == $cfield[0]) {
    //         //$skus = array();
    //         $product_id = $kit['cod_produto'];
    //         $sku = $kit['sku'];

    //         if (!empty($product_id)) {
    //           $skus[] = $product_id;
    //         } else {
    //           $get_sku_kit = $wpdb->get_results("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = '{$sku}'", ARRAY_A);
    //           $skus[] = $get_sku_kit[0]['post_id'];
    //         }

    //         update_post_meta($post_id, "menu_days_".$kit['dia']."_".$field[1], $skus);
    //         update_post_meta($post_id, "_menu_days_".$kit['dia']."_".$field[1], $field[0]);
    //       }
    //     }

    //     $i++;
    //   }

    //   $real_days = $days + 1;
    //   update_post_meta($post_id, "menu_days", $real_days);
    //   update_post_meta($post_id, "_menu_days", "field_5b10f1a3525cf");

    //   update_post_meta($post_id, "_menu_can_modify", 1);
    //   update_post_meta($post_id, "_menu_can_modify", "field_5b116acd5de79");

    //   update_post_meta($post_id, "menu", "");
    //   update_post_meta($post_id, "_menu", "field_5b10f177525ce");


    // } else {
    //   wp_set_object_terms( $post_id, $tipo, 'product_type' );
    // }

    // wp_set_object_terms( $post_id, $categoria, 'product_cat' );
    // update_post_meta( $post_id, "tabela_nutricional", $tabela_nutricional );
    // update_post_meta( $post_id, '_visibility', 'visible' );
    // update_post_meta( $post_id, '_stock_status', 'instock');
    // update_post_meta( $post_id, 'total_sales', '0' );
    // update_post_meta( $post_id, '_downloadable', 'no' );
    // update_post_meta( $post_id, '_virtual', 'yes' );
    // update_post_meta( $post_id, '_regular_price', '' );
    // update_post_meta( $post_id, '_sale_price', '' );
    // update_post_meta( $post_id, '_purchase_note', '' );
    // update_post_meta( $post_id, '_featured', 'no' );
    // update_post_meta( $post_id, '_weight', '' );
    // update_post_meta( $post_id, '_length', '' );
    // update_post_meta( $post_id, '_width', '' );
    // update_post_meta( $post_id, '_height', '' );
    // update_post_meta( $post_id, '_sku', $sku );
    // update_post_meta( $post_id, '_product_attributes', array() );
    // update_post_meta( $post_id, '_sale_price_dates_from', '' );
    // update_post_meta( $post_id, '_sale_price_dates_to', '' );
    // update_post_meta( $post_id, '_price', $preco );
    // update_post_meta( $post_id, '_sold_individually', '' );
    // update_post_meta( $post_id, '_manage_stock', 'no' );
    // update_post_meta( $post_id, '_backorders', 'no' );
    // update_post_meta( $post_id, '_stock', '' );
    // update_post_meta( $post_id, 'meal_info_kcal', $calorias );
    // update_post_meta( $post_id, '_meal_info_kcal', "field_5b17f114b8c36" );

    // update_post_meta( $post_id, 'ncm', $ncm );
    // update_post_meta( $post_id, '_ncm', "field_5bae2de934e95" );

    // update_post_meta( $post_id, 'cfop', $cfop );
    // update_post_meta( $post_id, '_cfop', 'field_5bae2f3d0d856' );

    // update_post_meta( $post_id, 'cst', $cst );
    // update_post_meta( $post_id, '_cst', 'field_5bae2f8b0d857' );

    update_post_meta( $post_id, 'importado', $importado );
    update_post_meta( $post_id, '_importado', 'field_5ca6ae6846444' );

    // update_post_meta( $post_id, 'icms', $icms );
    // update_post_meta( $post_id, '_icms', 'field_5bae3024d72d7' );

    // update_post_meta( $post_id, 'reducao_bc_icms', $reducao_bcicms );
    // update_post_meta( $post_id, '_reducao_bc_icms', 'field_5bae303cd72d8' );

    // update_post_meta( $post_id, 'seco', $seco );
    // update_post_meta( $post_id, '_seco', 'field_5bae3074d72d9' );


    // if ($image_url) {
    //   $image_name       = pathinfo($image_url);
    //   $image_name       = $image_name['basename'];
    //   $upload_dir       = wp_upload_dir();
    //   $image_data       = file_get_contents($image_url);
    //   $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name );
    //   $filename         = basename( $unique_file_name );

    //   if( wp_mkdir_p( $upload_dir['path'] ) ) {
    //     $file = $upload_dir['path'] . '/' . $filename;
    //   } else {
    //     $file = $upload_dir['basedir'] . '/' . $filename;
    //   }

    //   file_put_contents( $file, $image_data );

    //   $wp_filetype = wp_check_filetype( $filename, null );

    //   $attachment = array(
    //     'post_mime_type' => $wp_filetype['type'],
    //     'post_title'     => sanitize_file_name( $filename ),
    //     'post_content'   => '',
    //     'post_status'    => 'inherit'
    //   );

    //   $attach_id = wp_insert_attachment( $attachment, $file, $post_id );

    //   require_once(ABSPATH . 'wp-admin/includes/image.php');

    //   $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

    //   wp_update_attachment_metadata( $attach_id, $attach_data );

    //   set_post_thumbnail( $post_id, $attach_id );
    // }

    if ($tipo_action == "insert") {
      echo json_encode(array("sucesso" => "Produto Inserido com sucesso.", "ID" => $post_id));
    } else {
      echo json_encode(array("sucesso" => "Produto Atualizado com sucesso.", "ID" => $post_id));
    }

    exit();
  } elseif ($_GET['delete_produto']) {
    header("Content-Type: application/json");

    $key = get_option( "woo_erp_key"  );

    if ($key != $_GET['chave_api'] && $key != $_POST['chave_api']) {
      echo json_encode(array("erro" => "Chave da API não encotrada.")); exit();
    }

    global $wpdb;

    $post_id = (int) $_POST['cod_produto'];

    if ($wpdb->delete($wpdb->posts, array("ID" => $post_id, "post_type" => "product"))) {
      $wpdb->delete($wpdb->postmeta, array("post_id" => $post_id));
      echo json_encode(array("sucesso" => "Produto deletado com sucesso.")); exit();
    }

    echo json_encode(array("erro" => "Nao foi possivel apagar o produto (Nao existe ou ID errado)")); exit();
  }
}



add_action( 'rest_api_init', function () {
  register_rest_route( 'woo-erp-api/v1', '/pedidos/', array(
    'methods'     => 'GET',
    'callback'    => 'woo_json_api_get_pedidos',
  ) );
} );
function woo_json_api_get_pedidos() {
  header("Content-Type: application/json");

  $key = get_option( "woo_erp_key"  );

  if ($key != $_GET['chave_api'] && $key != $_POST['chave_api']) {
    echo json_encode(array("erro" => "Chave da API não encontrada."));
    exit();
  }

  global $wpdb;

  $page       = (int) $_GET['pagina'] - 1;
  $perpage    = empty($_GET['total']) ? 5000 : (int) $_GET['total'];
  $load_reg   = $page === 0 ? 0 : $page * $perpage;
  // pagina=1&total=5&importado=1&

  $isImportado = $_GET['importado'];

  if ((string) $isImportado === "") {
    $pedidos = $wpdb->get_results(
      "SELECT ID as cod_pedido FROM $wpdb->posts WHERE post_type = 'shop_order' ORDER BY post_date ASC LIMIT {$load_reg},{$perpage}",
      ARRAY_A
    );
  }

  if ((string) $isImportado !== "") {
    $pedidos = $wpdb->get_results(
      "SELECT wp_posts.ID as cod_pedido, wp_postmeta.meta_key , wp_postmeta.meta_value
      FROM wp_posts
      INNER JOIN wp_postmeta on wp_posts.ID = wp_postmeta.post_id
      WHERE wp_posts.post_type = 'shop_order' AND wp_postmeta.meta_key = 'importado' AND wp_postmeta.meta_value = {$isImportado}
      ORDER BY post_date ASC
      LIMIT {$load_reg},{$perpage}",
      ARRAY_A
    );
  }

  $i = 0;

  foreach ($pedidos as $pedido) {
    $id_pedido      = (int) $pedido['cod_pedido'];
    $user_id        = get_post_meta($id_pedido, '_customer_user', true);
    $pedido         = wc_get_order($id_pedido);
    $status         = $pedido->get_status();
    $status_pedido  = wc_get_order_statuses();

    (int)$coupons_amount = 0;

    foreach( $pedido->get_used_coupons() as $coupon_name ){
      $coupon_post_obj = get_page_by_title($coupon_name, OBJECT, 'shop_coupon');
      $coupon_id = $coupon_post_obj->ID;

      $coupons_obj = new WC_Coupon($coupon_id);
      $coupons_amount += (int)$coupons_obj->get_amount();
      $coupons_type    = $coupons_obj->get_discount_type();
    }

    $payment_method = wc_get_payment_gateway_by_order($id_pedido);

    $cliente_dados = $pedido->get_address();

    $data_de_entrega = get_post_meta( $id_pedido, "Data de entrega", true );

    $pt = [',', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
    $en = ['','January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    $data_new = str_replace($pt, $en, $data_de_entrega);

    $pedidos[$i]['cod_pedido']          = (int) $id_pedido;
    $pedidos[$i]['cod_cliente']         = (int) $user_id;
    $pedidos[$i]['status']              = $status;
    $pedidos[$i]['status_descricao']    = $status_pedido["wc-".$status];
    $pedidos[$i]['pagamento']           = $payment_method->title !== null ? $payment_method->title : $pedido->get_payment_method();

    if ( $coupons_type === 'percent' ) {
      $pedidos[$i]['desconto']            = (string) $coupons_amount .'%';
      $pedidos[$i]['valor_desconto']      = ((int) $coupons_amount !== 0) ? (float) number_format((float) $pedido->get_subtotal() * ((float) $coupons_amount / 100), 2, '.', '')  : 0;
    } else if ( $coupons_type === 'fixed_cart' ) {
      $pedidos[$i]['desconto']            = (string) "R$ ". (float)$coupons_amount;
      $pedidos[$i]['valor_desconto']      = (float) $coupons_amount;
    } else {
      $pedidos[$i]['desconto']            = 0;
      $pedidos[$i]['valor_desconto']      = 0;
    }

    $pedidos[$i]['frete']               = (float) $pedido->get_shipping_total();
    $pedidos[$i]['total']               = (float) $pedido->get_total();
    $pedidos[$i]['subtotal']            = (float) $pedido->get_subtotal();
    $pedidos[$i]['parcelas']            = (int) get_post_meta( $id_pedido, "_wc_pagseguro_payment_data", true )['installments'];
    $pedidos[$i]['cert_desconto']       = (string) $pedido->get_used_coupons()[0];
    $pedidos[$i]['importado']           = (int) get_post_meta( $id_pedido, "importado", true );

    (string)$card_type = get_post_meta( $id_pedido, "_card_type", true );

    (string)$get_payment_type = "";

    if ($card_type === "") $get_payment_type = "iPag - Boleto";
    if ($card_type === "1") $get_payment_type = "Diners";
    if ($card_type === "2") $get_payment_type = "Mastercard";
    if ($card_type === "3") $get_payment_type = "Visa";
    if ($card_type === "4") $get_payment_type = "Elo";
    if ($card_type === "5") $get_payment_type = "Amex";
    if ($card_type === "6") $get_payment_type = "Hipercard";

    $tipo_pagamento =  (string) $pedido->tipo_pagamento;

    if ($tipo_pagamento === "207") $get_payment_type = "VR Alimentação";
    if ($tipo_pagamento === "209") $get_payment_type = "VR Refeição";
    if ($tipo_pagamento === "224") $get_payment_type = "Alelo Refeição";
    if ($tipo_pagamento === "225") $get_payment_type = "Alelo Alimentação";
    if ($tipo_pagamento === "279") $get_payment_type = "Sodexo Vale Cultura";
    if ($tipo_pagamento === "280") $get_payment_type = "Sodexo Vale Alimentação";
    if ($tipo_pagamento === "281") $get_payment_type = "Sodexo Vale Refeição";
    if ($tipo_pagamento === "283") $get_payment_type = "Sodexo Premiumo";
    if ($tipo_pagamento === "284") $get_payment_type = "Sodexo Combustível";

    if($pedido->payment_method === 'picpay')  $get_payment_type = "PicPay";
    if($pedido->payment_method === 'ipag-gateway_pix')  $get_payment_type = "PIX";

    $pedidos[$i]['pagamento']           = $payment_method->title !== null ? $payment_method->title : $pedido->get_payment_method();
    $pedidos[$i]['metodo_pagamento']    = $pedidos[$i]['pagamento'] === 'Pagamento na entrega' ? $pedidos[$i]['pagamento'] : $get_payment_type;

    if ($pedidos[$i]['pagamento'] === 'Ticket') {
      $pedidos[$i]['metodo_pagamento'] = "Pagamento na entrega";
    }

    if ($pedidos[$i]['pagamento'] === 'Vale Alimentação' || $pedidos[$i]['pagamento'] === 'Vale Refeição') {
      $pedidos[$i]['metodo_pagamento'] = $pedidos[$i]['metodo_pagamento'] = str_replace(">", "", get_post_meta( $id_pedido, 'tipo_pagamento', true ));
    }

    if ($pedidos[$i]['pagamento'] == "Cartão de crédito" && $card_type == "" && $tipo_pagamento == null) {
      $pedidos[$i]['metodo_pagamento'] = "Cartão de crédito";
    }

    if ($pedidos[$i]['pagamento'] === 'woo_payment_on_delivery') {
      $pedidos[$i]['pagamento'] = "Pagamento na entrega";

      $order_notes = wc_get_order_notes([
        'order_id' => $id_pedido,
        'type' => 'customer',
      ]);

      $pedidos[$i]['metodo_pagamento'] = $order_notes[0]->content;
    }

    if ($pedidos[$i]['pagamento'] === "Voucher Refeição / Alimentação") {
      $pedidos[$i]['metodo_pagamento'] = "Pagamento na entrega";
    }

    $pedidos[$i]['data_pedido'] = $pedido->order_date;

    if ($data_de_entrega === "Não selecionado") {
      $pedidos[$i]['data_de_entrega'] = null;
    } else {
      $pedidos[$i]['data_de_entrega'] = ($status === 'on-hold') ? null : ((string)$data_de_entrega !== "" && (string)$data_de_entrega !== "Not selected") ? date('Y-m-d', strtotime($data_new)) : "Não selecionado";
    }

    $pedidos[$i]['periodo_entrega']     = $pedidos[$i]['data_de_entrega'] !== null ? get_post_meta( $id_pedido, "Horário", true ) : null;
    $pedidos[$i]['cod_transacao']       = $pedido->get_transaction_id();
    $pedidos[$i]['comentarios']         = (string) $pedido->customer_message;


    $validade_cep = (int) str_replace('-', '', $pedido->shipping_postcode);

    $cod_regiao = 0;

    if ( $validade_cep >= 1000000 && $validade_cep <= 9999999 ) { $cod_regiao = 1; }

    if ( $validade_cep >= 13200001 && $validade_cep <= 13219999 ||
      $validade_cep >= 13330001 && $validade_cep <= 13349999) { $cod_regiao = 2; }

    if ( $validade_cep >= 13000001 && $validade_cep <= 13139999 ||
      $validade_cep >= 13270001 && $validade_cep <= 13279999 ||
      $validade_cep >= 13280000 && $validade_cep <= 13283999) { $cod_regiao = 3; }

    if ( $validade_cep >= 11000001 && $validade_cep <= 11729999 ) { $cod_regiao = 4; }

    if ( $validade_cep >= 30000001 && $validade_cep <= 34019999 ) { $cod_regiao = 5; }

    if ( $validade_cep >= 80000001 && $validade_cep <= 83839999 ) { $cod_regiao = 6; }

    if ( $validade_cep >= 20000000 && $validade_cep <= 23799999 ) { $cod_regiao = 7; }

    // Client data
    $pedidos[$i]['ent_responsavel']     = $cliente_dados['first_name']." ".$cliente_dados['last_name'];
    $pedidos[$i]['cod_regiao']          = $cod_regiao;

    $pedidos[$i]['ent_cep']         = $pedido->billing_postcode;
    $pedidos[$i]['ent_rua']         = $pedido->billing_address_1;
    $pedidos[$i]['ent_numero']      = $pedido->billing_number;
    $pedidos[$i]['ent_complemento'] = $pedido->billing_address_2;
    $pedidos[$i]['ent_bairro']      = $pedido->billing_neighborhood;
    $pedidos[$i]['ent_cidade']      = $pedido->billing_city;
    $pedidos[$i]['ent_estado']      = $pedido->billing_state;

    $pedidos[$i]['ent_cep_entrega']         = $pedido->shipping_postcode;
    $pedidos[$i]['ent_rua_entrega']         = $pedido->shipping_address_1;
    $pedidos[$i]['ent_numero_entrega']      = $pedido->shipping_number;
    $pedidos[$i]['ent_complemento_entrega'] = $pedido->shipping_address_2;
    $pedidos[$i]['ent_bairro_entrega']      = $pedido->shipping_neighborhood;
    $pedidos[$i]['ent_cidade_entrega']      = $pedido->shipping_city;
    $pedidos[$i]['ent_estado_entrega']      = $pedido->shipping_state;
    $pedidos[$i]['celular_para_contato']   = get_post_meta( $id_pedido, 'shipping_phone', true );

    $pedidos[$i]['cliente_empresa']     = $pedido->billing_company;
    $pedidos[$i]['cliente_email']       = $pedido->billing_email;
    $pedidos[$i]['cliente_telefone']    = $pedido->billing_phone;
    $pedidos[$i]['cliente_celular']     = $pedido->billing_cellphone;
    $pedidos[$i]['cliente_cpf']         = $pedido->billing_cpf;
    $pedidos[$i]['cliente_cnpj']        = $pedido->billing_cnpj;

    $pedidos[$i]['aceita_retirar_na_portaria'] = get_post_meta($id_pedido, 'accept_privacy', true) ? true: false;


    $periodo_traducao = array(
      'breakfast'     => "Café da Manhã",
      'brunch'        => "Lanche da Manhã",
      'lunch'         => "Almoço",
      'snack_dinner'  => "Lanche da Tarde",
      'dinner'        => "Jantar",
      'supper'        => "Ceia"
    );

    foreach ($pedido->get_items() as $item_id => $item_data) {
      $produto = wc_get_product( $item_data->get_product_id() );

      // echo (string)$item_data->get_product_id() . ' ';

      if ($produto->get_type() === 'menu_product') {

        $menu_get = get_field('menu', $produto->get_id());

        $menu_prato = array();

        $dias_total = 0;

        $produto_info = $wpdb->get_results("SELECT im2.meta_value as post_title, im3.meta_value as total, im4.meta_value as quantity, im5.meta_value as dias  FROM
        {$wpdb->prefix}woocommerce_order_items i

        LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta im1
        ON im1.meta_key = '_product_id' AND im1.meta_value = '{$produto->get_id()}'

        INNER JOIN {$wpdb->prefix}woocommerce_order_items i2
        ON i2.order_item_id = im1.order_item_id AND i2.order_id = '{$id_pedido}'

        LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta im2
        ON im2.order_item_id = i2.order_item_id AND im2.meta_key = concat('custom-menu-title-', im1.meta_value)

        LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta im5
        ON im5.order_item_id = i2.order_item_id AND im5.meta_key = concat('custom-menu-', im1.meta_value)

        LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta im3
        ON im3.order_item_id = i2.order_item_id AND im3.meta_key = '_line_total'

        LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta im4
        ON im4.order_item_id = i2.order_item_id AND im4.meta_key = '_qty'

        GROUP BY i2.order_item_id", ARRAY_A);

        $dias_sql = maybe_unserialize($produto_info[0]['dias']);

        if (!empty($dias_sql)) {
          $menu_get['days'] = $dias_sql;
        }

        $custom_kit_price = 0;

        foreach ($menu_get['days'] as $item_key => $items_menu) {
          $dias_total++;
          foreach ($items_menu as $item_periodo => $item_menu) {
            foreach ($item_menu as $item_id) {
              $produto_prato = wc_get_product($item_id);

              if($produto_prato = wc_get_product($item_id)) {

                $custom_kit_price += (float) $produto_prato->get_price();

                // $custom_kit_price = get_post_meta( $item_id, '_regular_price', true);

                $menu_prato[] = array(
                  "dia"           => $item_key + 1,
                  "periodo"       => $periodo_traducao[$item_periodo],
                  "produto"       => $produto_prato->get_name(),
                  "cod_produto"   => $item_id,
                  "id_sistema"    => (int) get_post_meta( $item_id, 'id_sistema',  true ),
                  "preco"         => ((bool) $produto_prato->sale_price !== false) ? (float) $produto_prato->sale_price : (float) $produto_prato->get_price(),
                  "peso"          => ((int) $produto_prato->get_weight() !== 0) ?
                                      (string) $produto_prato->get_weight()."g" :
                                      (int) $produto_prato->get_weight(),
                );
              }
            }
          }
        }


        if (empty($produto_info[0]['post_title'])) {
          $post_title = $produto->get_name();
          $kit_customized = false;
        } else {
          $post_title = $produto_info[0]['post_title'];
          $kit_customized = true;
        }

        $produtos = array(
          "cod_produto"       => $produto->get_id(),
          "id_sistema"        => (int) get_post_meta( $produto->get_id(), 'id_sistema',  true ),
          "nome"              => $post_title,
          "preco"             => $custom_kit_price,
          "quantidade"        => (int) $produto_info[0]['quantity'],
          "quantidade_dias"   => $dias_total,
          "kit_customizado"   => $kit_customized,
          "produtos"          => $menu_prato,
        );

        $pedidos[$i]['itens'][] = $produtos;

      } else {
        if ($produto->get_type() == "bundle") {
          $p_id = $item_data->get_product_id();

          $bundles = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}woocommerce_bundled_items WHERE bundle_id = '{$p_id}'", ARRAY_A);

          $pedido_bundles = array();

          foreach ($bundles as $bundle) {
            $product_bundle = wc_get_product($bundle['product_id']);

            $pedido_bundles[] = array(
              "cod_produto"   => (int) $bundle['product_id'],
              "id_sistema"    => (int) get_post_meta( (int) $bundle['product_id'], 'id_sistema',  true ),
              "produto"       => $product_bundle->get_name(),
              "preco"         => ((bool) $product_bundle->sale_price !== false) ? (float) $product_bundle->sale_price : (float) $product_bundle->get_regular_price(),
              "peso"          => ((int) $product_bundle->get_weight() !== 0) ? (string) $product_bundle->get_weight()."g" : (int) $product_bundle->get_weight(),
            );
          }

          $produto_it = wc_get_product($item_data->get_product_id());

          $pedido_array = array(
            "cod_produto"   => $item_data->get_product_id(),
            "id_sistema"    => (int) get_post_meta( $item_data->get_product_id(), 'id_sistema',  true ),
            "nome"          => $item_data->get_name(),
            "quantidade"    => (int) $item_data->get_quantity(),
            "preco"         => ((bool) $produto_it->sale_price !== false) ? (float) $produto_it->sale_price : (float) $produto_it->get_regular_price(),
            "peso"          => ((int) $produto_it->get_weight() !== 0) ? (string) $produto_it->get_weight()."g" : (int) $produto_it->get_weight(),
            "produtos"      => $pedido_bundles,
          );
        } else {
          $produto_it = wc_get_product($item_data->get_product_id());

          if((bool)$item_data->get_total() !== false) {
            if(((string)$item_data->get_name() === 'Hambúrguer de frango' || (string)$item_data->get_name() === 'Frango xadrez') && (string) $pedido->get_used_coupons()[0] === "querofrango") {
              $pedido_array = array(
                "cod_produto"   => $item_data->get_product_id(),
                "id_sistema"    => (int) get_post_meta( $item_data->get_product_id(), 'id_sistema',  true ),
                "nome"          => $item_data->get_name(),
                "quantidade"    => (int) $item_data->get_quantity(),
                "preco"         =>  (float) $product_bundle->sale_price,
                "peso"          => ((int) $produto_it->get_weight() !== 0) ? (string) $produto_it->get_weight()."g" : (int) $produto_it->get_weight(),
              );
            } else {
              $pedido_array = array(
                "cod_produto"   => $item_data->get_product_id(),
                "id_sistema"    => (int) get_post_meta( $item_data->get_product_id(), 'id_sistema',  true ),
                "nome"          => $item_data->get_name(),
                "quantidade"    => (int) $item_data->get_quantity(),
                "preco"         => ((bool) $product_bundle->sale_price !== false) ? (float) $product_bundle->sale_price : (float) $produto_it->get_regular_price(),
                "peso"          => ((int) $produto_it->get_weight() !== 0) ? (string) $produto_it->get_weight()."g" : (int) $produto_it->get_weight(),
              );
            }
          } else { continue; }
        }

        $pedidos[$i]['itens'][] = $pedido_array;
      }
    }

    // if ( $isImportado !== null && (int) $isImportado !== (int) $pedidos[$i]['importado'] ) {
    //   unset($pedidos[$i]);
    // }

    if($pedidos[$i]['metodo_pagamento'] === null) {
      unset($pedidos[$i]);
    }

    unset($pedidos[$i]['meta_key']);
    unset($pedidos[$i]['meta_value']);

    $i++;
  }

  echo json_encode( array_values( $pedidos ) ); exit();
}

add_action( 'rest_api_init', function () {
  register_rest_route( 'woo-erp-api/v1', '/pedido/', array(
    'methods' => 'GET',
    'callback' => 'woo_json_api_get_pedido',
  ) );
} );
function woo_json_api_get_pedido() {
  header("Content-Type: application/json");

  $key = get_option( "woo_erp_key"  );

  if ($key != $_GET['chave_api'] && $key != $_POST['chave_api']) {

    echo json_encode(array("erro" => "Chave da API não encontrada."));
    exit();
  }

  global $wpdb;

  $post_id = (int) $_GET['cod_pedido'];

  $pedidos = $wpdb->get_results("SELECT ID as cod_pedido FROM $wpdb->posts WHERE post_type = 'shop_order' AND ID = '{$post_id}'", ARRAY_A);
  $pedido = $pedidos[0];

  $i = 0;

  $id_pedido      = $pedido['cod_pedido'];
  $user_id        = get_post_meta($id_pedido, '_customer_user', true);
  $pedido         = wc_get_order($id_pedido);
  $status         = $pedido->get_status();
  $status_pedido  = wc_get_order_statuses();
  $coupons_amount = 0;
  $coupons_type;

  foreach( $pedido->get_used_coupons() as $coupon_name ){
    $coupon_post_obj    = get_page_by_title($coupon_name, OBJECT, 'shop_coupon');
    $coupon_id          = $coupon_post_obj->ID;

    $coupons_obj = new WC_Coupon($coupon_id);
    $coupons_amount += (int)$coupons_obj->get_amount();
    $coupons_type    = $coupons_obj->get_discount_type();
  }

  $payment_method = wc_get_payment_gateway_by_order($id_pedido);
  $cliente_dados  = $pedido->get_address();

  $data_de_entrega = get_post_meta( $id_pedido, "Data de entrega", true );
  $pt = [',', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
  $en = ['','January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  $data_new = str_replace($pt, $en, $data_de_entrega);

  $pedidos[$i]['cod_pedido']          = (int) $id_pedido;
  $pedidos[$i]['cod_cliente']         = (int) $user_id;
  $pedidos[$i]['status']              = $status;
  $pedidos[$i]['status_descricao']    = $status_pedido["wc-".$status];


  if ( $coupons_type === 'percent' ) {
    $pedidos[$i]['desconto']            = (string) $coupons_amount .'%';
    $pedidos[$i]['valor_desconto']      = ((int) $coupons_amount !== 0) ? (float) number_format((float) $pedido->get_subtotal() * ((float) $coupons_amount / 100), 2, '.', '')  : 0;
  } else if ( $coupons_type === 'fixed_cart' ) {
    $pedidos[$i]['desconto']            = (string) "R$ ". (float)$coupons_amount;
    $pedidos[$i]['valor_desconto']      = (float) $coupons_amount;
  } else {
    $pedidos[$i]['desconto']            = 0;
    $pedidos[$i]['valor_desconto']      = 0;
  }

  $pedidos[$i]['frete']               = (float) $pedido->get_shipping_total();
  $pedidos[$i]['total']               = (float) $pedido->get_total();
  $pedidos[$i]['subtotal']            = (float) $pedido->get_subtotal();

  $pedidos[$i]['parcelas']            = (int) get_post_meta( $id_pedido, "_wc_pagseguro_payment_data", true )['installments'];
  $pedidos[$i]['cert_desconto']       = (string) $pedido->get_used_coupons()[0];
  $pedidos[$i]['importado']           = (int) get_post_meta( $id_pedido, "importado", true );

  (string)$card_type = get_post_meta( $id_pedido, "_card_type", true );

  (string)$get_payment_type = "";

  if ($card_type === "") $get_payment_type = "iPag - Boleto";
  if ($card_type === "1") $get_payment_type = "Diners";
  if ($card_type === "2") $get_payment_type = "Mastercard";
  if ($card_type === "3") $get_payment_type = "Visa";
  if ($card_type === "4") $get_payment_type = "Elo";
  if ($card_type === "5") $get_payment_type = "Amex";
  if ($card_type === "6") $get_payment_type = "Hipercard";

  $tipo_pagamento =  (string) $pedido->tipo_pagamento;

  if ($tipo_pagamento === "207") $get_payment_type = "VR Alimentação";
  if ($tipo_pagamento === "209") $get_payment_type = "VR Refeição";
  if ($tipo_pagamento === "224") $get_payment_type = "Alelo Refeição";
  if ($tipo_pagamento === "225") $get_payment_type = "Alelo Alimentação";
  if ($tipo_pagamento === "279") $get_payment_type = "Sodexo Vale Cultura";
  if ($tipo_pagamento === "280") $get_payment_type = "Sodexo Vale Alimentação";
  if ($tipo_pagamento === "281") $get_payment_type = "Sodexo Vale Refeição";
  if ($tipo_pagamento === "283") $get_payment_type = "Sodexo Premiumo";
  if ($tipo_pagamento === "284") $get_payment_type = "Sodexo Combustível";

  if($pedido->payment_method === 'picpay')  $get_payment_type = "PicPay";
  if($pedido->payment_method === 'ipag-gateway_pix')  $get_payment_type = "PIX";

  // $pedidos[$i]['__bandeira_do_cartao']  = get_post_meta( $id_pedido, "bandeira_do_cartao", true );

  $pedidos[$i]['pagamento']           = $payment_method->title !== null ? $payment_method->title : $pedido->get_payment_method();
  $pedidos[$i]['metodo_pagamento']    = $pedidos[$i]['pagamento'] === 'Pagamento na entrega' ? $pedidos[$i]['pagamento'] : $get_payment_type;

  if ($pedidos[$i]['pagamento'] === 'Ticket') {
    $pedidos[$i]['metodo_pagamento'] = "Pagamento na entrega";
  }

  if ($pedidos[$i]['pagamento'] === 'Vale Alimentação' || $pedidos[$i]['pagamento'] === 'Vale Refeição') {
    $pedidos[$i]['metodo_pagamento'] = $pedidos[$i]['metodo_pagamento'] = str_replace(">", "", get_post_meta( $id_pedido, 'tipo_pagamento', true ));
  }

  if ($pedidos[$i]['pagamento'] == "Cartão de crédito" && $card_type == "" && $tipo_pagamento == null) {
    $pedidos[$i]['metodo_pagamento'] = "Cartão de crédito";
  }

  if ($pedidos[$i]['pagamento'] === 'woo_payment_on_delivery') {
    $pedidos[$i]['pagamento'] = "Pagamento na entrega";

    $order_notes = wc_get_order_notes([
      'order_id' => $id_pedido,
      'type' => 'customer',
    ]);

    $pedidos[$i]['metodo_pagamento'] = $order_notes[0]->content;
  }

  if ($pedidos[$i]['pagamento'] === "Voucher Refeição / Alimentação") {
    $pedidos[$i]['metodo_pagamento'] = "Pagamento na entrega";
  }

  $pedidos[$i]['data_pedido'] = $pedido->order_date;

  if ($data_de_entrega === "Não selecionado") {
    $pedidos[$i]['data_de_entrega'] = null;
  } else {
    $pedidos[$i]['data_de_entrega'] = ($status === 'on-hold') ? null : ((string)$data_de_entrega !== "" && (string)$data_de_entrega !== "Not selected") ? date('Y-m-d', strtotime($data_new)) : "Não selecionado";
  }

  $pedidos[$i]['periodo_entrega']     = $pedidos[$i]['data_de_entrega'] !== null ? get_post_meta( $id_pedido, "Horário", true ) : null;
  $pedidos[$i]['cod_transacao']       = $pedido->get_transaction_id();
  $pedidos[$i]['comentarios']         = (string) $pedido->customer_message;

  $validade_cep = (int) str_replace('-', '', $pedido->shipping_postcode);

  $cod_regiao = 0;

  if ( $validade_cep >= 1000000 && $validade_cep <= 9999999 ) { $cod_regiao = 1; }

  if ( $validade_cep >= 13200001 && $validade_cep <= 13219999 ||
    $validade_cep >= 13330001 && $validade_cep <= 13349999) { $cod_regiao = 2; }

  if ( $validade_cep >= 13000001 && $validade_cep <= 13139999 ||
    $validade_cep >= 13270001 && $validade_cep <= 13279999 ||
    $validade_cep >= 13280000 && $validade_cep <= 13283999) { $cod_regiao = 3; }

  if ( $validade_cep >= 11000001 && $validade_cep <= 11729999 ) { $cod_regiao = 4; }

  if ( $validade_cep >= 30000001 && $validade_cep <= 34019999 ) { $cod_regiao = 5; }

  if ( $validade_cep >= 80000001 && $validade_cep <= 83839999 ) { $cod_regiao = 6; }

  if ( $validade_cep >= 20000000 && $validade_cep <= 23799999 ) { $cod_regiao = 7; }

  // Client data
  $pedidos[$i]['ent_responsavel']     = $cliente_dados['first_name']." ".$cliente_dados['last_name'];
  $pedidos[$i]['cod_regiao']          = $cod_regiao;

  $pedidos[$i]['ent_cep']         = $pedido->billing_postcode;
  $pedidos[$i]['ent_rua']         = $pedido->billing_address_1;
  $pedidos[$i]['ent_numero']      = $pedido->billing_number;
  $pedidos[$i]['ent_complemento'] = $pedido->billing_address_2;
  $pedidos[$i]['ent_bairro']      = $pedido->billing_neighborhood;
  $pedidos[$i]['ent_cidade']      = $pedido->billing_city;
  $pedidos[$i]['ent_estado']      = $pedido->billing_state;

  $pedidos[$i]['ent_cep_entrega']         = $pedido->shipping_postcode;
  $pedidos[$i]['ent_rua_entrega']         = $pedido->shipping_address_1;
  $pedidos[$i]['ent_numero_entrega']      = $pedido->shipping_number;
  $pedidos[$i]['ent_complemento_entrega'] = $pedido->shipping_address_2;
  $pedidos[$i]['ent_bairro_entrega']      = $pedido->shipping_neighborhood;
  $pedidos[$i]['ent_cidade_entrega']      = $pedido->shipping_city;
  $pedidos[$i]['ent_estado_entrega']      = $pedido->shipping_state;
  $pedidos[$i]['celular_para_contato']    = get_post_meta( $id_pedido, 'shipping_phone', true );

  $pedidos[$i]['cliente_empresa']     = $pedido->billing_company;
  $pedidos[$i]['cliente_email']       = $pedido->billing_email;
  $pedidos[$i]['cliente_telefone']    = $pedido->billing_phone;
  $pedidos[$i]['cliente_celular']     = $pedido->billing_cellphone;
  $pedidos[$i]['cliente_cpf']         = $pedido->billing_cpf;
  $pedidos[$i]['cliente_cnpj']        = $pedido->billing_cnpj;

  $pedidos[$i]['aceita_retirar_na_portaria'] = get_post_meta($id_pedido, 'accept_privacy', true) ? true: false;

  $periodo_traducao = array(
    'breakfast'     => "Café da Manhã",
    'brunch'        => "Lanche da Manhã",
    'lunch'         => "Almoço",
    'snack_dinner'  => "Lanche da Tarde",
    'dinner'        => "Jantar",
    'supper'        => "Ceia"
  );


  foreach ($pedido->get_items() as $item_id => $item_data) {
    $produto = wc_get_product( $item_data->get_product_id() );

    $produto->get_type();

    if ($produto->get_type() === 'menu_product') {
      $menu_get = get_field('menu', $produto->get_id());

      $menu_prato = array();

      $dias_total = 0;

      $produto_info = $wpdb->get_results("SELECT im2.meta_value as post_title, im3.meta_value as total, im4.meta_value as quantity, im5.meta_value as dias  FROM
      {$wpdb->prefix}woocommerce_order_items i

      LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta im1
      ON im1.meta_key = '_product_id' AND im1.meta_value = '{$produto->get_id()}'

      INNER JOIN {$wpdb->prefix}woocommerce_order_items i2
      ON i2.order_item_id = im1.order_item_id AND i2.order_id = '{$id_pedido}'

      LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta im2
      ON im2.order_item_id = i2.order_item_id AND im2.meta_key = concat('custom-menu-title-', im1.meta_value)

      LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta im5
      ON im5.order_item_id = i2.order_item_id AND im5.meta_key = concat('custom-menu-', im1.meta_value)

      LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta im3
      ON im3.order_item_id = i2.order_item_id AND im3.meta_key = '_line_total'

      LEFT JOIN {$wpdb->prefix}woocommerce_order_itemmeta im4
      ON im4.order_item_id = i2.order_item_id AND im4.meta_key = '_qty'

      GROUP BY i2.order_item_id", ARRAY_A);

      //$produto_info = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}woocommerce_order_itemmeta", ARRAY_A);

      $dias_sql = maybe_unserialize($produto_info[0]['dias']);

      if (!empty($dias_sql)) {
        $menu_get['days'] = $dias_sql;
      }

      $custom_kit_price = 0;

      foreach ($menu_get['days'] as $item_key => $items_menu) {
        $dias_total++;
        foreach ($items_menu as $item_periodo => $item_menu) {
          foreach ($item_menu as $item_id) {
            $produto_prato = wc_get_product($item_id);

            $custom_kit_price += (float) $produto_prato->get_price();

            $menu_prato[] = array(
              "dia"           => $item_key + 1,
              "periodo"       => $periodo_traducao[$item_periodo],
              "produto"       => $produto_prato->get_name(),
              "cod_produto"   => $item_id,
              "id_sistema"    => (int) get_post_meta( $item_id, 'id_sistema',  true ),
              "preco"         => ((bool) $produto_prato->sale_price !== false) ? (float) $produto_prato->sale_price : (float) $produto_prato->get_price(),
              "peso"          => ((int) $produto_prato->get_weight() !== 0) ? (string) $produto_prato->get_weight()."g" : (int) $produto_prato->get_weight(),
            );
          }
        }
      }

      if (empty($produto_info[0]['post_title'])) {
        $post_title = $produto->get_name();
        $kit_customized = false;
      } else {
        $post_title = $produto_info[0]['post_title'];
        $kit_customized = true;
      }

      $produtos = array(
        "cod_produto"       => (int) $produto->get_id(),
        "id_sistema"        => (int) get_post_meta( (int) $produto->get_id(), 'id_sistema',  true ),
        // "product_type"      => $produto->get_type(),
        "nome"              => $post_title,
        // "preco"             => (float) $produto_info[0]['total'],
        // "preco"             => (float) $produto->get_regular_price(),
        "preco"             => $custom_kit_price,
        "quantidade"        => (int) $produto_info[0]['quantity'],
        "quantidade_dias"   => $dias_total,
        "kit_customizado"   => $kit_customized,
        "produtos"          => $menu_prato,
      );

      $pedidos[$i]['itens'][] = $produtos;

    } else {

      if ($produto->get_type() === "bundle") {
        $p_id = $item_data->get_product_id();

        $bundles = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}woocommerce_bundled_items WHERE bundle_id = '{$p_id}'", ARRAY_A);

        $pedido_bundles = array();

        foreach ($bundles as $bundle) {
          $product_bundle = wc_get_product($bundle['product_id']);

          $pedido_bundles[] = array(
            "cod_produto"   => (int) $bundle['product_id'],
            "id_sistema"    => (int) get_post_meta( (int) $bundle['product_id'], 'id_sistema',  true ),
            "produto"       => $product_bundle->get_name(),
            "preco"         =>  ((bool) $product_bundle->sale_price !== false) ? (float) $product_bundle->sale_price : (float) $product_bundle->get_regular_price(),
            "peso"          => ((int) $product_bundle->get_weight() !== 0) ? (string) $product_bundle->get_weight()."g" : (int) $product_bundle->get_weight(),
          );
        }

        $produto_it = wc_get_product($item_data->get_product_id());

        $pedido_array = array(
          "cod_produto"   => $item_data->get_product_id(),
          "id_sistema"    => (int) get_post_meta( $item_data->get_product_id(), 'id_sistema',  true ),
          "nome"          => $item_data->get_name(),
          "quantidade"    => (int) $item_data->get_quantity(),
          "preco"         => ((bool) $produto_it->sale_price !== false) ? (float) $produto_it->sale_price : (float) $produto_it->get_regular_price(),
          "peso"          => ((int) $produto_it->get_weight() !== 0) ? (string) $produto_it->get_weight()."g" : (int) $produto_it->get_weight(),
          "produtos"      => $pedido_bundles,
        );

      } else {
        $produto_it = wc_get_product($item_data->get_product_id());

        if((bool)$item_data->get_total() !== false) {
          if(((string)$item_data->get_name() === 'Hambúrguer de frango' || (string)$item_data->get_name() === 'Frango xadrez') && (string) $pedido->get_used_coupons()[0] === "querofrango") {
            $pedido_array = array(
              "cod_produto"   => $item_data->get_product_id(),
              "id_sistema"    => (int) get_post_meta( $item_data->get_product_id(), 'id_sistema',  true ),
              "nome"          => $item_data->get_name(),
              "quantidade"    => (int) $item_data->get_quantity(),
              "preco"         =>  (float) $product_bundle->sale_price,
              "peso"          => ((int) $produto_it->get_weight() !== 0) ? (string) $produto_it->get_weight()."g" : (int) $produto_it->get_weight(),
            );
          } else {
            $pedido_array = array(
              "cod_produto"   => $item_data->get_product_id(),
              "id_sistema"    => (int) get_post_meta( $item_data->get_product_id(), 'id_sistema',  true ),
              "nome"          => $item_data->get_name(),
              "quantidade"    => (int) $item_data->get_quantity(),
              "preco"         => ((bool) $product_bundle->sale_price !== false) ? (float) $product_bundle->sale_price : (float) $produto_it->get_regular_price(),
              "peso"          => ((int) $produto_it->get_weight() !== 0) ? (string) $produto_it->get_weight()."g" : (int) $produto_it->get_weight(),
            );
          }

        } else { continue; }
      }

      $pedidos[$i]['itens'][] = $pedido_array;
    }
  }

  if($pedidos[$i]['metodo_pagamento'] === null) {
    echo json_encode(array("erro" => "Pedido não encontrado!"));
    exit();
  }

  $i++;

  echo json_encode(array_values( $pedidos ) ); exit();
}

add_action( "init", "woo_erp_orders" );
function woo_erp_orders() {
  if ($_GET['update_pedido']) {
    header("Content-Type: application/json");

    $key = get_option( "woo_erp_key" );

    if ($key != $_GET['chave_api'] && $key != $_POST['chave_api']) {
      echo json_encode(array("erro" => "Chave da API não encontrada."));
      exit();
    }

    global $wpdb;

    $post_id    = (int) $_POST['cod_pedido'];
    $status     = (string) $_POST['status'];
    $importado  = $_POST['importado'];

    if ( !$post_id ) {
      echo json_encode(
        array(
          "erro" => "Nao foi possivel atualizar o Pedido (Não existe ou ID errado)",
        )
      ); exit();
    }

    if ( $status !== '' ) {
      $status = str_replace('wc-', '', $status);

      $order = new WC_Order($post_id);
      $order->update_status( $status, 'order_note' );
    }

    if ( $importado !== null ) {
      update_field('field_5bbb526514927', $importado, $post_id);
    }

    echo json_encode(
      array(
        "sucesso" => "Pedido atualizado com sucesso."
      )
    ); exit();


    // if ($wpdb->update($wpdb->posts, array("post_status" => $status), array("ID" => $post_id))) {
    //     update_field('field_5bbb526514927', $importado, $post_id);
    //     echo json_encode(array("sucesso" => "Pedido atualizado com sucesso.")); exit();
    // }

    // echo json_encode(array("erro" => "Nao foi possivel atualizar o Pedido (Nao existe ou ID errado)")); exit();
  }
}
