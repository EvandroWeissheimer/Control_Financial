<?php include 'session_token.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Controle Financeiro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #121212 50%, rgba(18, 18, 18, 0.6) 60%), url('../imagens/carousel/image1.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        .form-control {
            background-color: #303536; /* Cor de fundo cinza */
            border: none;
            border-radius: 5px;
            color: #fff;
            padding: 10px;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #6C63FF;
        }

        .btn-login {
            background: linear-gradient(90deg, #6C63FF, #FF6584);
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            width: 100%;
            font-size: 16px;
            margin-top: 20px;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background: linear-gradient(90deg, #FF6584, #6C63FF);
        }
        .login-footer a {
            color: #6C63FF;
            text-decoration: none;
        }
        .login-footer a:hover {
            text-decoration: underline;
        }
        .password-container {
            position: relative;
            display: flex;
            align-items: center;
        }
        .toggle-password {
            margin-left: -30px;
            cursor: pointer;
            color: #000; /* Cor preta para o ícone */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-5">
                <div class="login-container">
                    <h1 class="text-center">Faça o seu login</h1>
                    <div id="alert" class="alert" style="display: none;"></div>
                    <form id="loginForm">
                        <input type="hidden" name="token" value="<?php echo htmlspecialchars($sessionToken); ?>">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Digite seu email" required>
                        </div>
                        <label for="senha">Senha</label>
                        <div class="form-group password-container">
                            <input type="password" class="form-control" id="senha" placeholder="Digite sua senha" required>
                            <span class="toggle-password" onclick="togglePassword()"><i class="fas fa-eye-slash"></i></span>
                        </div>
                        <button type="button" id="loginButton" class="btn-login">Entrar</button>
                    </form>
                    <div class="login-footer mt-3 text-center">
                        <a href="register.php">Ainda não tenho uma conta</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('senha');
            const passwordToggle = document.querySelector('.toggle-password i');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                passwordToggle.classList.remove('fa-eye-slash');
                passwordToggle.classList.add('fa-eye');
            } else {
                passwordField.type = 'password';
                passwordToggle.classList.remove('fa-eye');
                passwordToggle.classList.add('fa-eye-slash');
            }
        }

        $(document).ready(function () {
            $('#loginButton').click(function () {
                const email = $('#email').val();
                const senha = $('#senha').val();
                const alertBox = $('#alert');

                // Envio AJAX
                $.ajax({
                    url: 'api_gateway.php',
                    method: 'POST',
                    data: { action: 'login', email: email, senha: senha, token: $('input[name="token"]').val() },
                    success: function (result) {
                        if (result === 'success') {
                            window.location.href = 'dashboard.html'; // Redireciona para o dashboard
                        } else {
                            alertBox.addClass('alert alert-danger').html(result).fadeIn();
                        }
                    },
                    error: function () {
                        alertBox.addClass('alert alert-danger').html('Erro ao processar o login.').fadeIn();
                    }
                });
            });
        });
    </script>
</body>
</html>