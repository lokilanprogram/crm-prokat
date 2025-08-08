<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Вход в CRM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background: #f4f6fb;
            min-height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: #fff;
            box-shadow: 0 6px 24px 0 #3c46594d;
            border-radius: 18px;
            padding: 40px 32px 32px 32px;
            width: 100%;
            max-width: 360px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 32px;
            font-weight: 600;
            color: #343a40;
            letter-spacing: .02em;
        }
        .form-fields {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 340px;
            margin: 0 auto 18px auto;
        }
        .form-fields input[type="text"],
        .form-fields input[type="password"],
        .form-fields button,
        .form-fields .btn-secondary {
            width: 100%;
            box-sizing: border-box;
        }
        .form-fields input[type="text"],
        .form-fields input[type="password"] {
            padding: 14px 12px;
            margin-bottom: 16px;
            border: 1.5px solid #d5dae1;
            border-radius: 9px;
            background: #f7f8fa;
            font-size: 16px;
            transition: border 0.2s;
            text-align: center;
        }
        .form-fields input:focus {
            border-color: #4963e6;
            outline: none;
            background: #f1f5ff;
        }
        .form-fields button {
            padding: 14px;
            background: linear-gradient(90deg, #4963e6 0%, #5764e3 100%);
            color: #fff;
            border: none;
            border-radius: 9px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: .04em;
            box-shadow: 0 4px 12px #4963e610;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background 0.2s, transform 0.1s;
        }
        .form-fields button:hover {
            background: linear-gradient(90deg, #324dc6 0%, #5069fa 100%);
            transform: translateY(-2px) scale(1.01);
        }
        .form-fields .btn-secondary {
            padding: 14px;
            background: #f7f8fa;
            color: #343a40;
            border: 1.5px solid #d5dae1;
            border-radius: 9px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: .04em;
            cursor: pointer;
            margin-bottom: 2px;
            transition: background 0.2s, border 0.2s, color 0.2s, transform 0.1s;
            text-decoration: none;
            display: block;
            text-align: center;
        }
        .form-fields .btn-secondary:hover {
            background: #e3e6ef;
            border-color: #a6b3cc;
            color: #242a33;
            transform: translateY(-2px) scale(1.01);
        }
        #login-error {
            min-height: 24px;
            color: #e74c3c;
            margin-top: 8px;
            font-size: 14px;
        }
        @media (max-width: 500px) {
            .login-container {
                padding: 24px 8px 18px 8px;
                max-width: 96vw;
            }
            .form-fields {
                max-width: 96vw;
            }
            .login-container h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Вход в CRM</h2>
        <form id="login-form" autocomplete="off">
            <div class="form-fields">
                <input type="text" name="login" placeholder="Логин" required autofocus>
                <input type="password" name="password" placeholder="Пароль" required>
                <button type="submit">Войти</button>
                <a href="/forgot-password" class="btn-secondary">Забыли пароль?</a>
            </div>
            <div id="login-error"></div>
        </form>
    </div>
    <script>
    document.getElementById('login-form').onsubmit = async function(e) {
        e.preventDefault();
        const login = this.login.value;
        const password = this.password.value;
        const res = await fetch('/api/login', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            body: JSON.stringify({ login, password })
        });
        const data = await res.json();
        if (res.ok) {
            localStorage.setItem('token', data.access_token);
            // Узнаём роль пользователя
            const meRes = await fetch('/api/me', {
                headers: { 'Authorization': 'Bearer ' + data.access_token }
            });
            const user = await meRes.json();
            // Редирект по роли:
            if (user.role === 'superadmin') location.href = '/dashboard-superadmin';
            else if (user.role === 'manager') location.href = '/dashboard-manager';
            else location.href = '/dashboard';
        } else {
            document.getElementById('login-error').textContent = data.error || 'Ошибка входа';
        }
    };
    </script>
</body>
</html>
