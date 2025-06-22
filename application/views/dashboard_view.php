<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

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
            flex-direction: column;  /* Başlık ve içerik dikey olarak dizilir */
            justify-content: center; /* Dikey ortala */
            align-items: center;     /* Yatay ortala */
            height: 100vh;           /* Sayfanın tamamını kaplar */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        button {
            width: 200px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049; /* Hover efekti */
        }
    </style>
</head>
<body>

    <h2>Hoşgeldin, <?php echo $user_name; ?>!</h2>
    <p>Bu sayfa sadece giriş yapmış kullanıcılar içindir.</p>

    <!-- # Logout butonu -->
    <button onclick="window.location.href='<?php echo base_url('index.php/login/logout'); ?>'">Çıkış Yap</button>
    

</body>
</html>
