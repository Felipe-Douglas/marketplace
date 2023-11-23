<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <link rel="stylesheet" href="<?= url("vendor/fortawesome/font-awesome/css/all.css") ?>">
    <link rel="stylesheet" href="<?= url("theme/css/dash2.css") ?>">
</head>
<body>
    <div class="sidebar">
        <div class="logo"></div>
        <div class="menu">
            <a href="#" class="active">
                <i class="fa fa-tachometer-alt"></i>
                Dashboard
            </a>
            <a href="#">
                <i class="fa fa-cog"></i>
                Configurações
            </a>
            <a href="#" class="logout">
                <i class="fa fa-sign-out-alt"></i>
                Sair
            </a>
        </div>
    </div>
    <div class="main-content">
        <div class="header-wrapper">
            <div class="header-title">
                <h2>Dashboard</h2>
            </div>
            <div class="user-info">
                <div class="search">
                    <i class="fa-solid fa-search"></i>
                    <input type="text" name="" id="" placeholder="Procurar">
                </div>
                <img src="<?= url("theme/images/chip.png") ?>" alt="">
            </div>
        </div>
        <div class="cards-container">
            <div class="card-wrapper">
                <div class="card">
                    <div class="card-header">
                        <div class="card-details">
                            <span class="title">Lucro Diario</span>
                            <span class="details">R$ 2.600,00</span>
                        </div>
                        <i class="fa-solid fa-dollar-sign icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
