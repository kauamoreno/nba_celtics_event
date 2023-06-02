<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBA - Celtics</title>

    <link rel="shortcut icon" href="assets/img/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>

    <?php
    //Conectar com o banco de dados
    $conn = mysqli_connect("localhost", "root", "", "banco");

    //Verificar se o formulário foi enviado pelo método POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $rg = $_POST['rg'];

        //Cria os valores SQL para inserir um registro na tabela
        $sql = "INSERT INTO pessoas (nome, email, rg) VALUES ('$nome', '$email', '$rg')";

        //Verifica se o formulário foi enviado com sucesso
        if (mysqli_query($conn, $sql)) {
            echo "Registro inserido com sucesso";
        } else {
            echo "Registro não efetivado";
        }

        // Redirecionar o usuário para a mesma página
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }
    ?>

    <header>
        <div class="inicio_header">
            <img width="60px" src="assets/img/favicon.svg" alt="Logo" class="logo">
        </div>
        <div class="direita_header">
            <a href="#">TIME</a>
            <a href="#">INGRESSOS</a>
            <a href="#">CRONOGRAMA</a>
            <a href="#">NOTICIAS</a>
            <a href="#">COMUNIDADE</a>
            <a href="#">LOJA</a>
        </div>
    </header>

    <main>
        <div class="banner">
            <img width="100%" src="./assets/img/celtics.jpeg" alt="Banner">
        </div>

        <div class="informacoes_iniciais">
            <div class="texto">
                <h1>INTERESSADO EM COMPARECER AO PRÓXIMO JOGO DO CELTICS?</h1>
                <p>JUNTE-SE A BOSTON NESTA OPORTUNIDADE E VEJA TAMBÉM QUEM IRÁ SERÃO OS PRESENTES</p>
            </div>
        </div>

        <div class="acoes">

            <div class="form-box">
                <div class="header_form">Cadastro</div>
                <form class="form" method="POST" action="">
                    <span class="subtitle">Coloque suas informações para se cadastrar</span>
                    <div class="form-container">
                        <input type="text" class="input" placeholder="Nome completo" name="nome" required> <br>
                        <input type="email" class="input" placeholder="E-mail" name="email" required> <br>
                        <input type="text" class="input" placeholder="R.G" name="rg" id="rg" maxlength="12" required>
                    </div>
                    <center>
                        <button class="btn_cadastrar">Cadastrar</button>
                    </center>
                </form>
            </div>

            <div class="pessoas_lista">
                <div class="header_pessoas">Pessoas</div>
                <div>
                    <table class="tabela">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Idade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php //Acrescentando linha na table*********************************************

                            //Conectar com o banco de dados
                            $conn = mysqli_connect("localhost", "root", "", "banco");

                            // Definir a consulta SQL para selecionar os registros da tabela
                            $tabela = "SELECT * FROM pessoas";

                            // Executar a consulta SQL e armazenar o resultado em uma variável
                            $resultado_tabela = mysqli_query($conn, $tabela);

                            while ($row_usuario = mysqli_fetch_assoc($resultado_tabela)) {

                                // Imprimindo os dados
                                echo "<tr>";
                                echo "<td>" . $row_usuario['id'] . "</td>";
                                echo "<td>" . $row_usuario['nome'] . "</td>";
                                echo "<td>" . $row_usuario['email'] . "</td>";
                                echo "<td>" . $row_usuario['rg'] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>

    <footer>
        <div class="custom-shape-divider-top-1685707474">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M649.97 0L550.03 0 599.91 54.12 649.97 0z" class="shape-fill"></path>
            </svg>
        </div>
        <div class="container_footer">
            <div class="footer-conteudo">
                <h3>Contato</h3>
                <p>Telefone: (123) 456-7890</p>
                <p>Email: kaua.moreno2005@gmail.com</p>
            </div>
            <div class="footer-conteudo">
                <h3>Links Úteis</h3>
                <ul>
                    <li><a href="#">Página Inicial</a></li>
                    <li><a href="#">Sobre Nós</a></li>
                    <li><a href="#">Serviços</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-copy">
            <p>&copy; 2023 Kauã Amaral Moreno. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let pessoas = document.querySelector('.pessoas_lista');

            // Rolar automaticamente para o final
            pessoas.scrollTop = pessoas.scrollHeight;
        });
    </script>

    <script src="./assets/js/rg.js"></script>
</body>

</html>