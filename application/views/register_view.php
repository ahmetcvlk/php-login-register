<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: x-large;
        }

        body {
            display: flex;
            flex-direction: column;  /* Başlık ve form dikey olarak dizilir */
            justify-content: center; /* Dikey ortala */
            align-items: center;     /* Yatay ortala */
            height: 100vh;           /* Sayfanın tamamını kaplar */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        label {
            display: block;
            color: #555;
        }

        input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        
    </style>


</head>
<body>

    <h2>Kayıt Ol</h2>

    <?php if (isset($message)): ?>
        <p style="color: green;"><?php echo $message; ?></p>
    <?php endif; ?>


    <form action="<?php echo base_url('index.php/login/register_submit'); ?>" method="post">
        <label for="name">İsim:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">E-posta:</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">Şifre:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Kayıt Ol</button>
    </form>

    <p>Zaten hesabınız var mı? <a href="<?php echo base_url('index.php/login'); ?>">Giriş Yap</a></p>

    
</body>
</html>