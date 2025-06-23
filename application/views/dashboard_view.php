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
            margin-bottom: 5rem;
            /* Başlık ile form arasında boşluk */
        }

        h3 {
            text-align: center;
            color: #555;
            font-size: medium;
        }

        body {
            font-family: Arial, sans-serif;
            /* Yatay ortala */
            /* Sayfanın tamamını kaplar */
            margin: 0;
            padding: 0;
        }

        form {
            display: flex;
            flex-direction: column;
            /* Başlık ve form dikey olarak dizilir */
            justify-content: center;
            /* Dikey ortala */
            align-items: center;
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 10px;
            /* Giriş alanları arasında boşluk */
        }

        button {
            width: 200px;
            padding: 10px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
            /* Hover efekti */
        }

        #responseArea {
            text-align: center;
            margin-top: 20px;
            color: #333;

            /* Mesaj alanı ile form arasında boşluk */
        }

        .bottom-bar {
            position: fixed;
            bottom: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 20px 0;
            background-color: transparent;
        }

        #logout {
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 20px;
        }
    </style>
</head>

<body>

    <h2>Hoşgeldin, <?php echo $user_name; ?>!</h2>


    <h3>Mesaj Gönderme Paneli</h3>
    <form id="messageForm">
        <input type="text" id="messageInput" placeholder="Mesajınızı yazın..." required>
        <button type="submit">Gönder</button>
    </form>

    <div id="responseArea"></div>





    <!-- # Logout butonu -->
    <div class="bottom-bar">
        <button id="logout" onclick=" window.location.href='<?php echo base_url('index.php/login/logout'); ?>'">Çıkış
            Yap</button>
    </div>


    <!-- jQuery CDN -->
    <script src=" https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#messageForm').on('submit', function (e) {
            e.preventDefault();
            var msg = $('#messageInput').val();

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("index.php/dashboard/send_message"); ?>',
                data: { message: msg },
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        $('#responseArea').text(response.msg);
                        $('#messageInput').val('');
                    } else {
                        $('#responseArea').css('color', 'red').text(response.msg);
                    }
                }
            });
        });
    </script>

</body>

</html>