$(document).ready(function () {

    // VARIAVEIS DA TELA DE PAGAMENTO
    var paymentMethod = $('input[name="payment_method"]');

    const holderName = $("#holder_name");
    const cardNumber = $("#card_number");
    const expirationDateMonth = $("#month");
    const expirationDateYear = $("#year");
    const securityCode = $("#security_code");

    // Pegando os campos no cartão
    const name = $(".name");
    const number = $(".number");
    const validMonth = $("#month_card");
    const validYear = $("#year_card");
    const code = $(".code");

    holderName.on("keyup", () => {
        name.text(holderName.val());
    });

    cardNumber.on("keyup", () => {
        number.text(cardNumber.val());
    });

    expirationDateMonth.on("change", () => {
        validMonth.text(expirationDateMonth.val());
    });

    expirationDateYear.on("change", () => {
        validYear.text(expirationDateYear.val());
    });

    // securityCode.on("keyup", () => {
    //     valid.text(cardNumber.val());
    // });

    // IDENTIFICANDO O TIPO DE PAGAMENTO
    paymentMethod.on("change", () => {
        if ($('input[name="payment_method"]:checked').val() == "credit_card") {
            $(".payment_method_card").show();
            $(".payment_method_boleto").hide();
            $(".payment_method_pix").hide();
        }
        if ($('input[name="payment_method"]:checked').val() == "boleto") {
            $(".payment_method_card").hide();
            $(".payment_method_boleto").show();
            $(".payment_method_pix").hide();
        }

        if ($('input[name="payment_method"]:checked').val() == "pix") {
            $(".payment_method_card").hide();
            $(".payment_method_boleto").hide();
            $(".payment_method_pix").show();
        }
    });

    $(".payment_method_card").show();
    $(".payment_method_boleto").hide();
    $(".payment_method_pix").hide();
});