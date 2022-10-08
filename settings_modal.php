<div class="modal fade" id="ItemmallModal<?php echo $rows[0]; ?>" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Are you sure you want to buy this item?</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
            <div class="modal-body">
                <p><div class="alert alert-warning alert-dismissable col col-lg-12"><p class="block"><i class="fa fa-warning"></i> Additional 25% will be applied upon payment using GPS.</p></div></p>
            </div>
            <div class="modal-body">
            <p>Purchase Message:</p>
            <p id="msg<?php echo $rows[0]; ?>"></p>
            </div>
            <div class="modal-footer">
            <p id="labelpayment<?php echo $rows[0]; ?>">Payment Method: </p>
            <form id="BuyItemmallRPS<?php echo $rows[0]; ?>">
                <input type="hidden" value="<?php echo $rows[0]; ?>" name="itemid">
                <button class="btn btn-primary" id="rpsbutton<?php echo $rows[0]; ?>" type="submit"><i class="fa fa-rub"></i> RPS (<?php echo number_format($rows['price'], 2); ?>)</button>
            </form>
            <form id="BuyItemmallEMS<?php echo $rows[0]; ?>">
                <input type="hidden" value="<?php echo $rows[0]; ?>" name="itemid">
                <button class="btn btn-secondary" id="emsbutton<?php echo $rows[0]; ?>"  type="submit"><i class="fa fa-dollar"></i> EMS (<?php echo number_format($rows['price'], 2); ?>)</button>
            </form>
            <form id="BuyItemmallGPS<?php echo $rows[0]; ?>">
                <input type="hidden" value="<?php echo $rows[0]; ?>" name="itemid">
                <button class="btn btn-danger" id="gpsbutton<?php echo $rows[0]; ?>"  type="submit"><i class="fa fa-euro"></i> GPS (<?php $tax = $rows['price'] * 0.25; echo number_format($rows['price'] + $tax, 2); ?>)</button>
            </form>
            </div>
        </div>
    </div>
</div>
<script>
    function rpsbutton(){

        var timer = 1000;

        document.getElementById("rpsbutton<?php echo $rows[0]; ?>").hidden = true;
        setTimeout(function() {
            document.getElementById("rpsbutton<?php echo $rows[0]; ?>").hidden = false;
        }, timer);

        document.getElementById("emsbutton<?php echo $rows[0]; ?>").hidden = true;
        setTimeout(function() {
            document.getElementById("emsbutton<?php echo $rows[0]; ?>").hidden = false;
        }, timer);

        document.getElementById("gpsbutton<?php echo $rows[0]; ?>").hidden = true;
        setTimeout(function() {
            document.getElementById("gpsbutton<?php echo $rows[0]; ?>").hidden = false;
        }, timer);

        document.getElementById("labelpayment<?php echo $rows[0]; ?>").hidden = true;
        setTimeout(function() {
            document.getElementById("labelpayment<?php echo $rows[0]; ?>").hidden = false;
        }, timer);
    }
    document.getElementById("rpsbutton<?php echo $rows[0]; ?>").addEventListener("click", rpsbutton);
    document.getElementById("emsbutton<?php echo $rows[0]; ?>").addEventListener("click", rpsbutton);
    document.getElementById("gpsbutton<?php echo $rows[0]; ?>").addEventListener("click", rpsbutton);
</script>


<div class="modal fade" id="ExModal<?php echo $rows[0]; ?>" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Are you sure you want to buy this item?</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
            <div class="modal-body">
                <p><div class="alert alert-warning alert-dismissable col col-lg-12"><p class="block"><i class="fa fa-warning"></i> 10% deduction will be applied to the seller upon payment.</p></div></p>
            </div>
            <div class="modal-body">
            <p>Purchase Message:</p>
            <p id="msgs<?php echo $rows[0]; ?>"></p>
            </div>
            <div class="modal-footer">
            <p id="labelpayment_em<?php echo $rows[0]; ?>">Payment Method: </p>
            <form id="BuyExMall<?php echo $rows[0]; ?>">
                <input type="hidden" value="<?php echo $rows[0]; ?>" name="id">
                <button class="btn btn-primary" id="rpsbutton_em<?php echo $rows[0]; ?>" type="submit"><i class="fa fa-rub"></i> RPS (<?php echo number_format($rows['price'], 2); ?>)</button>
            </form>
            </div>
        </div>
    </div>
</div>
<script>
    function rpsbutton(){

        var timer = 1000;

        document.getElementById("rpsbutton_em<?php echo $rows[0]; ?>").hidden = true;
        setTimeout(function() {
            document.getElementById("rpsbutton_em<?php echo $rows[0]; ?>").hidden = false;
        }, timer);

        document.getElementById("labelpayment_em<?php echo $rows[0]; ?>").hidden = true;
        setTimeout(function() {
            document.getElementById("labelpayment_em<?php echo $rows[0]; ?>").hidden = false;
        }, timer);
    }
    document.getElementById("rpsbutton_em<?php echo $rows[0]; ?>").addEventListener("click", rpsbutton);
</script>


<div class="modal fade" id="BuyRaffleShuffle" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Are you sure you want to buy Raffle Shuffle Ticket?</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
            <div class="modal-body">
                <p><div class="alert alert-secondary alert-dismissable col col-lg-12"><p class="block"><i class="fa fa-warning"></i> More Entries More Chance Of Winning..</p></div></p>
            </div>
            <div class="modal-body">
            <p>Purchase Message:</p>
            <p id="msgss"></p>
            </div>
            <div class="modal-footer">
            <p id="labelpayment_rs">Payment Method: </p>
            <form id="BuyRSRPS">
                <input type="hidden" name="trigger">
                <button class="btn btn-primary" id="rpsbutton_rs" type="submit"><i class="fa fa-rub"></i> RPS (149.00)</button>
            </form>
            <form id="BuyRSEMS">
                <input type="hidden" name="trigger">
                <button class="btn btn-secondary" id="emsbutton_rs"  type="submit"><i class="fa fa-dollar"></i> EMS (199.00)</button>
            </form>
            </div>
        </div>
    </div>
</div>
<script>
    function rpsbutton(){

        var timer = 1000;

        document.getElementById("rpsbutton_rs").hidden = true;
        setTimeout(function() {
            document.getElementById("rpsbutton_rs").hidden = false;
        }, timer);

        document.getElementById("emsbutton_rs").hidden = true;
        setTimeout(function() {
            document.getElementById("emsbutton_rs").hidden = false;
        }, timer);

        document.getElementById("gpsbutton_rs").hidden = true;
        setTimeout(function() {
            document.getElementById("gpsbutton_rs").hidden = false;
        }, timer);

        document.getElementById("labelpayment_rs").hidden = true;
        setTimeout(function() {
            document.getElementById("labelpayment_rs").hidden = false;
        }, timer);
    }
    document.getElementById("rpsbutton_rs").addEventListener("click", rpsbutton);
    document.getElementById("emsbutton_rs").addEventListener("click", rpsbutton);
    document.getElementById("gpsbutton_rs").addEventListener("click", rpsbutton);
</script>


<div class="modal fade" id="HolidayGiftBox" tabindex="-1" aria-labelledby="exampleModalCenter" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Are you sure you want to buy Holiday GiftBox?</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>
            <div class="modal-body">
                <p><div class="alert alert-secondary alert-dismissable col col-lg-12"><p class="block"><i class="fa fa-warning"></i> Randomized Roulette! Goodluck!</p></div></p>
            </div>
            <div class="modal-body">
            <p>Purchase Message:</p>
            <p id="msghg"></p>
            </div>
            <div class="modal-footer">
            <p id="labelpayment_hg">Payment Method: </p>
            <form id="HGRPS">
                <input type="hidden" name="trigger">
                <button class="btn btn-primary" id="rpsbutton_hg" type="submit"><i class="fa fa-rub"></i> RPS (149.00)</button>
            </form>
            <form id="HGEMS">
                <input type="hidden" name="trigger">
                <button class="btn btn-secondary" id="emsbutton_hg"  type="submit"><i class="fa fa-dollar"></i> EMS (199.00)</button>
            </form>
            </div>
        </div>
    </div>
</div>
<script>
    function rpsbutton(){

        var timer = 1000;

        document.getElementById("rpsbutton_hg").hidden = true;
        setTimeout(function() {
            document.getElementById("rpsbutton_hg").hidden = false;
        }, timer);

        document.getElementById("emsbutton_hg").hidden = true;
        setTimeout(function() {
            document.getElementById("emsbutton_hg").hidden = false;
        }, timer);

        document.getElementById("gpsbutton_hg").hidden = true;
        setTimeout(function() {
            document.getElementById("gpsbutton_hg").hidden = false;
        }, timer);

        document.getElementById("labelpayment_hg").hidden = true;
        setTimeout(function() {
            document.getElementById("labelpayment_hg").hidden = false;
        }, timer);
    }
    document.getElementById("rpsbutton_hg").addEventListener("click", rpsbutton);
    document.getElementById("emsbutton_hg").addEventListener("click", rpsbutton);
    document.getElementById("gpsbutton_hg").addEventListener("click", rpsbutton);
</script>