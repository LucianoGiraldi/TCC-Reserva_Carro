<?php
include_once("../sessao/includes.php");

if (isset($_POST["excluir_funcionario"])) {
    $conn = $_SESSION["conexao"];
    $idfuncionario = $_POST["idfuncionario"];

    // Excluir registro da tabela de login
    $sqlLogin = "DELETE FROM login WHERE funcionario_idfuncionario = $idfuncionario";

    if (mysqli_query($conn, $sqlLogin)) {
        // Excluir registro da tabela de funcionário
        $sqlFuncionario = "DELETE FROM funcionario WHERE idfuncionario = $idfuncionario";

        if (mysqli_query($conn, $sqlFuncionario)) {
            ?>
            <script>
                window.location.href = "lista_funcionario.php";
                alert("Funcionário excluído com sucesso!");
            </script>
            <?php
        } else {
            ?>
            <script>
                window.location.href = "lista_funcionario.php";
                alert("Erro ao excluir o funcionário.");
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            window.location.href = "lista_funcionario.php";
            alert("Erro ao excluir o login do funcionário.");
        </script>
        <?php
    }
}
?>
