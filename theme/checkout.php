<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= url("theme/css/cache1.css") ?>">
    <link rel="stylesheet" href="<?= url("vendor/fortawesome/font-awesome/css/all.css") ?>">
    <title><?= $title ?></title>
</head>
<body>

    <form action="<?= url("orders/payment") ?>" name="payment" id="payment">
        <div class="tabs">
            <button type="button" data-id="shipping" data-open>
                <i class="fa-solid fa-house"></i>
                Entrega
            </button>
            <button type="button" data-id="checkout">
                <i class="fa-solid fa-money-bill"></i>
                Pagamento
            </button>
        </div>
        <div class="screens">
            <div class="screen shipping" id="shipping">
                <h3>Endereço de entrega</h3>
                <div class="data_shipping">
                    <label for="street">Rua</label>
                    <input type="text" name="street" class="street" id="street">

                    <label for="number">Numero</label>
                    <input type="text" name="number" class="number" id="number">

                    <label for="complement">Complemento</label>
                    <input type="text" name="complement" class="complement" id="complement">

                    <label for="locality">Localidade</label>
                    <input type="text" name="locality" class="locality" id="locality">

                    <label for="city">Cidade</label>
                    <input type="text" name="city" class="city" id="city">

                    <label for="region_code">UF</label>
                    <input type="text" name="region_code" class="region_code" id="region_code">

                    <label for="country">País</label>
                    <input type="text" name="country" class="country" id="country">

                    <label for="postal_code">CEP</label>
                    <input type="text" name="postal_code" class="postal_code" id="postal_code">
                </div>
            </div>
            <div class="screen checkout" id="checkout">

                <h3>Forma de Pagamento</h3>

                <div class="payment_method">
                    <div>
                        <input type="radio" name="payment_method" id="credit_card" value="credit_card" checked>
                        <label for="credit_card">Cartão de Credito</label>
                    </div>
                    <div class="payment_method_card">
                        <div class="data">
                            <div class="credit_card">
                                <div class="card_number">
                                    <label for="holder_name">Titular</label>
                                    <input type="text" name="holder_name" id="holder_name" placeholder="Como escrito no cartão" maxlength="28">

                                    <label for="card_number">Numero do cartão</label>
                                    <input type="text" name="card_number" id="card_number" placeholder="0000 0000 0000 0000" maxlength="19" oninput="this.value = this.value.replace(/\D/g,'')">
                                </div>

                                <div class="data_credit_card">
                                    <div class="expiration_date">
                                        <label for="expiration_date">Data de Vencimento</label>
                                        <div class="month-year">
                                            <select name="month" id="month"></select>
                                            <select name="year" id="year"></select>
                                        </div>
                                    </div>

                                    <div class="security_code">
                                        <label for="security_code">CVV</label>
                                        <input type="text" name="security_code" id="security_code" placeholder="CVV" maxlength="3">
                                    </div>
                                </div>

                                <div class="checkbox-wrapper">
                                    <input type="checkbox" name="personal_data" id="personal_data">
                                    <label for="personal_data">Dados do cartão iguais aos dados pessoais</label>
                                </div>
                                <div class="checkbox-wrapper">
                                    <input type="checkbox" name="billing_data" id="billing_data">
                                    <label for="billing_data">Dados da cobrança iguais aos dados de entrega</label>
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="header">
                                <span class="logo">
                                  <img src="<?= url("theme/images/logo.png") ?>" alt="" />
                                  <h5>Master Card</h5>
                                </span>
                                <img src="<?= url("theme/images/chip.png") ?>" alt="" class="chip" />
                            </div>

                            <div class="card-details">
                                <div class="name-number">
                                    <h6>Número do cartão</h6>
                                    <h5 class="number">0000 0000 0000 0000</h5>
                                    <h5 class="name">Tutilar do cartão</h5>
                                </div>
                                <div class="valid-date">
                                    <h6>Valido até</h6>
                                    <h5 class="valid">
                                        <span id="month_card">00</span> / <span id="year_card">0000</span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="payment_method">
                    <div>
                        <input type="radio" name="payment_method" id="boleto" value="boleto">
                        <label for="boleto">Boleto</label>
                    </div>
                    <div class="payment_method_boleto">
                        <p>boleto</p>
                    </div>

                </div>
                <div class="payment_method">
                    <div>
                        <input type="radio" name="payment_method" id="pix" value="pix">
                        <label for="pix">Pix</label>
                    </div>
                    <div class="payment_method_pix">
                        <p>pix</p>
                    </div>

                </div>

                <button type="button">Voltar</button>
                <button>Confirmar Dados</button>
            </div>
            <div class="cart">

            </div>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="<?= url("theme/js/cache5.js") ?>"></script>
    <script src="<?= url("theme/js/funcs.js") ?>"></script>
    <script src="<?= url("theme/js/Payments.js") ?>"></script>

</body>
</html>
