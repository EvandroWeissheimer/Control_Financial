<?php include 'session_token.php'; ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Control_Financial</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: #121212;
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

        .btn-register {
            background: linear-gradient(90deg, #6C63FF, #FF6584); /* Cor de fundo do botão de login */
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            width: 100%;
            font-size: 16px;
            margin-top: 20px;
            transition: all 0.3s ease;
        }
        .btn-register:hover {
            background: linear-gradient(90deg, #FF6584, #6C63FF); /* Cor de fundo do botão de login ao passar o mouse */
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Cadastro de Usuário</h2>
                <div id="alert" class="alert"></div>
                <form id="registerForm">
                    <input type="hidden" name="token" value="<?php echo htmlspecialchars($sessionToken); ?>">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="name" placeholder="Digite seu nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
                    </div>
                    <label for="senha" class="form-label">Senha</label>
                    <div class="mb-3 password-container">
                        <input type="password" class="form-control" id="senha" name="password" placeholder="Digite sua senha" required>
                        <span class="toggle-password" onclick="togglePassword('senha')"><i class="fas fa-eye-slash"></i></span>
                    </div>
                    <label for="confirmPassword" class="form-label">Confirme sua Senha</label>
                    <div class="mb-3 password-container">
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirme sua senha" required>
                        <span class="toggle-password" onclick="togglePassword('confirmPassword')"><i class="fas fa-eye-slash"></i></span>
                    </div>
                    <button type="button" id="submit" class="btn-register">Cadastrar</button>
                </form>
                <div class="mt-3 text-center">
                    <p>Já possui uma conta? <a href="login.php">Faça login</a></p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const passwordToggle = passwordField.nextElementSibling.querySelector('i');
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
            $('#submit').click(function () {
                const nome = $('#nome').val();
                const email = $('#email').val();
                const senha = $('#senha').val();
                const confirmPassword = $('#confirmPassword').val();
                const alertBox = $('#alert');

                // Validações
                alertBox.removeClass().hide();

                // Validação de email
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(email)) {
                    alertBox.addClass('alert alert-danger').html('Por favor, insira um email válido.').fadeIn();
                    return;
                }

                // Validação de senha forte
                const senhaPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                if (!senhaPattern.test(senha)) {
                    alertBox.addClass('alert alert-danger').html('A senha deve ter pelo menos 8 caracteres, incluindo uma letra maiúscula, uma letra minúscula, um número e um caractere especial.').fadeIn();
                    return;
                }

                // Verificação de senhas iguais
                if (senha !== confirmPassword) {
                    alertBox.addClass('alert alert-danger').html('As senhas não conferem.').fadeIn();
                    return;
                }

                // Envio AJAX
                $.ajax({
                    url: 'api_gateway.php',
                    method: 'POST',
                    data: { action: 'register', nome: nome, email: email, senha: senha, token: $('input[name="token"]').val() },
                    success: function (result) {
                        if (result === 'Registro salvo com sucesso!') {
                            window.location.href = 'dashboard.html'; // Redireciona para o dashboard
                        } else {
                            alertBox.addClass('alert alert-success').html(result).fadeIn();
                            $('#registerForm').trigger('reset');
                            setTimeout(() => alertBox.fadeOut(), 3000);
                        }
                    },
                    error: function () {
                        alertBox.addClass('alert alert-danger').html('Erro ao processar o cadastro.').fadeIn();
                    }
                });
            });
        });
    </script>
</body>
</html>