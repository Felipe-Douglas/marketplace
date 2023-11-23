<?php

namespace App\Support;

/**
 *
 */
class Payment
{
    /**
     * @var string
     */
    private $apiUrl;
    /**
     * @var
     */
    private $endpoint;
    /**
     * @var
     */
    private $build;
    /**
     * @var
     */
    private $callback;

    /**
     *
     */
    public function __construct()
    {
        $this->apiUrl = "https://sandbox.api.pagseguro.com";
    }

    public function card(array $data) : Payment
    {
        $this->endpoint = "/charges";
        $this->build = [
            "reference_id" => "ex-00001",
            "description" => "Motivo do pagamento",
            "amount" => [
                "value" => 1000,
                "currency" => "BRL"
            ],
            "payment_method" => [
                "type" => "CREDIT_CARD",
                "installments" => 1,
                "capture" => false,
                "card" => [
                    "number" => $data['card_number'],
                    "exp_month" => $data['month'],
                    "exp_year" => $data['year'],
                    "security_code" => $data['security_code'],
                    "holder" => [
                        "name" => $data['holder_name']
                    ]
                ]
            ],
            "shipping" => [
                "address" => [
                    "street" => $data['street'],
                    "number" => $data['number'],
                    "complement" => $data['complement'],
                    "locality" => $data['locality'],
                    "city" => $data['city'],
                    "region_code" => $data['region_code'],
                    "country" => $data['country'],
                    "postal_code" => $data['postal_code']
                ]
            ],
        ];

        $this->post();
        return $this;
    }

    public function boleto($cpf) : Payment
    {
        $this->endpoint = "/orders";
        $this->build = [
            "reference_id" => "1",
            "customer" => [
                "name" => "Filipe",
                "email" => "snoop.sk98@gmail.com",
                "tax_id" => $cpf
            ],
            "charges" => [
                [
                    "reference_id" => "1",
                    "amount" => [
                        "currency" => "BRL",
                        "value" => 20000
                    ],
                    "payment_method" => [
                        "type" => "BOLETO",
                        "boleto" => [
                            "holder" => [
                                "name" => "Filipe",
                                "tax_id" => "07605243359",
                                "email" => "felipe.douglas.inf1@gmail.com",
                                "address" => [
                                    "street" => "aer",
                                    "number" => "er",
                                    "city" => "er",
                                    "locality" => "er",
                                    "region" => "er",
                                    "country" => "BRA",
                                    "region_code" => "CE",
                                    "postal_code" => "62540000"
                                ],
                            ],
                            "due_date" => date("Y-m-d", strtotime("+3 days"))
                        ],
                    ],
                ]
            ],
        ];

        $this->post();
        return $this;
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $cpf
     * @param int $amount
     * @return $this
     */
    public function qrCode(string $name, string $email, string $cpf, int $amount) : Payment
    {
        $expiration_date = date('c', mktime(date('H'), date("i", strtotime("+5 minutes")), date('s'), date('m'), date('d'), date('Y')));
        $this->endpoint = "/orders";

        $this->build = [
            "customer" => [
                "name" => $name,
                "email" => $email,
                "tax_id" => $cpf,
            ],
            "reference_id" => "1",
            "qr_codes" => [
                [
                    "amount" => [
                        "value" => $amount
                    ],
                    "expiration_date" => $expiration_date,
                ]
            ],
            "items" => [
                [
                    "name" => "nome do item",
                    "quantity" => 1,
                    "unit_amount" => 200
                ]
            ],
            "shipping" => [
                "address" => [
                    "street" => "Avenida Brigadeiro Faria Lima",
                    "number" => "1384",
                    "complement" => "apto 12",
                    "locality" => "Pinheiros",
                    "city" => "São Paulo",
                    "region_code" => "SP",
                    "country" => "BRA",
                    "postal_code" => "01452002"
                ]
            ],
            "notification_urls" => [
                "https://meusite.com/notificacoes"
            ]
        ];

        $this->post();
        return $this;
    }

    /**
     * @return array|null
     */
    public function callback()
    {
        return $this->callback;
    }

    /**
     * @return void
     */
    public function post()
    {
        $url = $this->apiUrl . $this->endpoint;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: ' . API_KEY,
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->build));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $this->callback = json_decode(curl_exec($ch));
        curl_close($ch);

    }
}