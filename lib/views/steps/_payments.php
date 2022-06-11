<?php if ($booking->can_pay_deposit_and_pay_full()) { ?>
    <div class="lp-payment-portions-w">
        <div class="latepoint-step-content-text-centered">
            <h4><?php _e('How much do you want to pay now?', 'latepoint'); ?></h4>
            <div><?php _e('You can either make a full payment now or just leave a deposit and pay the rest after.', 'latepoint'); ?></div>
        </div>
        <div class="lp-options lp-options-grid lp-options-grid-three">
            <div class="lp-option lp-payment-trigger-payment-portion-selector" data-portion="<?php echo LATEPOINT_PAYMENT_PORTION_FULL; ?>">
                <div class="lp-option-amount-w">
                    <div class="lp-option-amount lp-amount-full">
                        <div class="lp-amount-value"><?php echo $booking->formatted_full_price() ?></div>
                    </div>
                </div>
                <div class="lp-option-label"><?php _e('Full Amount', 'latepoint'); ?></div>
            </div>
            <div class="lp-option lp-payment-trigger-payment-portion-selector" data-portion="<?php echo LATEPOINT_PAYMENT_PORTION_DEPOSIT; ?>">
                <div class="lp-option-amount-w">
                    <div class="lp-option-amount lp-amount-deposit">
                        <div class="lp-slice"></div>
                        <div class="lp-amount-value"><?php echo $booking->formatted_deposit_price() ?></div>
                    </div>
                </div>
                <div class="lp-option-label"><?php _e('', 'latepoint'); ?></div>
            </div>
        </div>
    </div>
<?php } ?>
<?php echo OsBookingHelper::get_payment_total_info_html($booking); ?>
<?php
if (!OsPaymentsHelper::get_default_payment_method()) echo OsFormHelper::hidden_field('booking[payment_method]', $booking->payment_method, ['class' => 'latepoint_payment_method', 'skip_id' => true]);
echo OsFormHelper::hidden_field('booking[payment_portion]', $booking->payment_portion ? $booking->payment_portion : OsBookingHelper::get_default_payment_portion_type($booking), ['class' => 'latepoint_payment_portion', 'skip_id' => true]);
?>