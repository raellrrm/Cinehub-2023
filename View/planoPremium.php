<div class="principal-container-pagamento">
     <!-- start: Payment -->
     <section class="payment-section">
        <div class="container-pagamento">
            <div class="payment-wrapper">
                <div class="payment-left">
                    <div class="payment-header">
                        <div class="payment-header-icon"><i class="ri-flashlight-fill"></i></div>
                        <div class="payment-header-title">Pagamento</div>
                        <p class="payment-header-description">Defina o seu plano</p>
                    </div>
                    <div class="payment-content">
                        <div class="payment-body">
                            <div class="payment-plan">
                                <div class="payment-plan-type">Premium</div>
                                <div class="payment-plan-info">
                                    <div class="payment-plan-info-name">Plano Premium</div>
                                    <div class="payment-plan-info-price">R$59 por mês</div>
                                </div>
                                <a href="<?php echo BASE_URL; ?>perfil/minhasPublicacoes" class="payment-plan-change">Mudar</a>
                            </div>
                            <div class="payment-summary">
                                <div class="payment-summary-item">
                                    <div class="payment-summary-name">Additional fee</div>
                                    <div class="payment-summary-price">$10</div>
                                </div>
                                <div class="payment-summary-item">
                                    <div class="payment-summary-name">Discount 20%</div>
                                    <div class="payment-summary-price">-$10</div>
                                </div>
                                <div class="payment-summary-divider"></div>
                                <div class="payment-summary-item payment-summary-total">
                                    <div class="payment-summary-name">Total</div>
                                    <div class="payment-summary-price">-$10</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="payment-right">
                    <form action="" method="POST" class="payment-form">
                        <h1 class="payment-title">Detalhes do pagamento</h1>
                        <div class="payment-method">
                            <input type="radio" name="metodo" value="visa" id="method-1" checked>
                            <label for="method-1" class="payment-method-item">
                                <img src="<?php echo BASE_URL;?>assets/images/visa.png" alt="">
                            </label>
                            <input type="radio" name="metodo" value="masterCard" id="method-2">
                            <label for="method-2" class="payment-method-item">
                                <img src="<?php echo BASE_URL;?>assets/images/mastercard.png" alt="">
                            </label>
                            <input type="radio" name="metodo" value="PayPal" id="method-3">
                            <label for="method-3" class="payment-method-item">
                                <img src="<?php echo BASE_URL;?>assets/images/paypal.png" alt="">
                            </label>
                            <input type="radio" name="metodo" value="stripe" id="method-4">
                            <label for="method-4" class="payment-method-item">
                                <img src="<?php echo BASE_URL;?>assets/images/stripe.png" alt="">
                            </label>
                        </div>
                        <div class="payment-form-group">
                            <input type="email" name="email" placeholder=" " class="payment-form-control" id="email">
                            <label for="email" class="payment-form-label payment-form-label-required">Endereço Email</label>
                        </div>
                        <div class="payment-form-group">
                            <input type="number" placeholder=" " class="payment-form-control" id="card-number">
                            <label for="card-number" class="payment-form-label payment-form-label-required">Numero do cartao</label>
                        </div>
                        <div class="payment-form-group-flex">
                            <div class="payment-form-group">
                                <input type="date" placeholder=" " class="payment-form-control" id="expiry-date">
                                <label for="expiry-date" class="payment-form-label payment-form-label-required">Data de expiração</label>
                            </div>
                            <div class="payment-form-group">
                                <input type="text" placeholder=" " class="payment-form-control" id="cvv">
                                <label for="cvv" class="payment-form-label payment-form-label-required">CVV</label>
                            </div>
                        </div>
                        <button type="submit" class="payment-form-submit-button"><i class="ri-wallet-line"></i> Pay</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end: Payment -->

   </div>