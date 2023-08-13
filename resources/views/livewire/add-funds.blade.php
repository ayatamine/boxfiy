<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
    <form action="" method="" wire:submit.prevent="submitAddFund">
        <div class="funds-content">
            <div class="incrementer">
                <button type="button" class="plus-btn"><img class="mx-auto" src="{{asset('BoxfiyV6/images/icons/14.png')}}"></button>
                <div class="price">
                    <input type="number" step="0.00" min="10" value="10" wire:model.lazy="amount"  >
                </div>

                <button type="button" class="minus-btn"><img class="mx-auto"  src="{{asset('BoxfiyV6/images/icons/15.png')}}"> </button>
            </div>

            <div class="pay-ways" wire:ignore>
                <ul>
                    <label id="pay1" for="paypal">
                <img src="{{asset('BoxfiyV6/images/paypal.png')}}">
            </label>

                    <label id="pay2" for="payeer">
                <img src="{{asset('BoxfiyV6/images/payeer.png')}}">
                <img class="special" src="{{asset('BoxfiyV6/images/package.png')}}">
            </label>

                    <label id="pay3" for="visa">
                <img src="{{asset('BoxfiyV6/images/visa.png')}}">
            </label>

                    <label id="pay4" for="space_remit">
                <img src="{{asset('BoxfiyV6/images/space.png')}}">
                <img class="special" src="{{asset('BoxfiyV6/images/package.png')}}">
            </label>

                    <label id="pay5" for="pay_radio_5"></label>

                    <label id="pay6" for="pay_radio_6"></label>


                </ul>

                <!-- hidden inputs for previous ul -->
                <ul class="hidden">
                    <input id="paypal" value="paypal" type="radio" wire:model="payment_method">
                    <input id="payeer" type="radio" wire:model="payment_method">
                    <input id="visa" type="radio" wire:model="payment_method">
                    <input id="space_remit" type="radio" wire:model="payment_method">
                    <input id="pay_radio_5" type="radio" wire:model="payment_method">
                    <input id="pay_radio_6" type="radio" wire:model="payment_method">

                </ul>
            </div>

            <button type="submit">CONTINUE</button>
        </div>
    </form>
</div>