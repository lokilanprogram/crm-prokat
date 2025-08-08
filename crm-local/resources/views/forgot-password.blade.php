<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Восстановление пароля</title>
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
        .forgot-container {
            background: #fff;
            box-shadow: 0 6px 24px 0 #3c46594d;
            border-radius: 18px;
            padding: 40px 32px 32px 32px;
            width: 100%;
            max-width: 360px;
            text-align: center;
        }
        .forgot-container h2 {
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
        .form-fields input[type="email"],
        .form-fields button,
        .form-fields .btn-secondary {
            width: 100%;
            box-sizing: border-box;
        }
        .form-fields input[type="email"] {
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
        }
        .form-fields .btn-secondary:hover {
            background: #e3e6ef;
            border-color: #a6b3cc;
            color: #242a33;
            transform: translateY(-2px) scale(1.01);
        }
        #forgot-status {
            min-height: 24px;
            color: #28a745;
            margin-top: 6px;
            font-size: 15px;
        }
        #forgot-error {
            min-height: 24px;
            color: #e74c3c;
            margin-top: 6px;
            font-size: 15px;
        }
        @media (max-width: 500px) {
            .forgot-container {
                padding: 24px 8px 18px 8px;
                max-width: 96vw;
            }
            .form-fields {
                max-width: 96vw;
            }
            .forgot-container h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <div class="forgot-container">
        <h2>Восстановление пароля</h2>
        <form id="forgot-form" autocomplete="off">
            <div class="form-fields">
                <input type="email" name="email" placeholder="Email" required autofocus>
                <button type="submit">Отправить ссылку для сброса</button>
                <button type="button" class="btn-secondary" onclick="window.location.href='/login'">Войти</button>
            </div>
            <div id="forgot-status"></div>
            <div id="forgot-error"></div>
        </form>
    </div>
    <script>
    document.getElementById('forgot-form').onsubmit = async function(e) {
        e.preventDefault();
        document.getElementById('forgot-status').textContent = '';
        document.getElementById('forgot-error').textContent = '';
        const email = this.email.value;
        const res = await fetch('/api/forgot-password', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
            body: JSON.stringify({ email })
        });
        const data = await res.json();
        if (res.ok) {
            document.getElementById('forgot-status').textContent = data.message || 'Письмо отправлено';
        } else {
            document.getElementById('forgot-error').textContent = data.error || 'Ошибка (Неверный email)';
        }
    };
    </script>
</body>
</html>
