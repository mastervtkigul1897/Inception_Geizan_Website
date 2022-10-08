<div class="modal fade show" id="SendRPS" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <form method="POST" action="controller/tool_function.php">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Send RPS</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Username</label>
                        <input class="form-control" type="text" required="" name="username" >
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Points</label>
                        <input class="form-control" required="" type="number" value="0" name="points" >
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Amount in PHP</label>
                        <input class="form-control" required="" type="number" name="amount" >
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Comments</label>
                        <input class="form-control" type="text" value="None" name="comments">
                    </div>
                </div>
                <div class="modal-footer">
                <button class="btn btn-primary" type="submit" onclick="return confirm('Are you sure?')" name="sendrps">Send</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade show" id="SendRPSReseller" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <form method="POST" action="controller/tool_function.php">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Send RPS</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Username</label>
                        <input class="form-control" type="text" required="" name="username" >
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Points</label>
                        <input class="form-control" required="" type="number" value="0" name="points" >
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Amount in PHP</label>
                        <input class="form-control" required="" type="number"  name="amountusd" >
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Comments</label>
                        <input class="form-control" type="text" value="None" name="comments">
                    </div>
                </div>
                <div class="modal-footer">
                <button class="btn btn-primary" type="submit" onclick="return confirm('Are you sure?')" name="sendrpsreseller">Send</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade show" id="SendGPS" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <form method="POST" action="controller/tool_function.php">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Send GPS</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Character Name</label>
                        <input class="form-control" type="text" required="" name="charname" >
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Points</label>
                        <input class="form-control" required="" type="number" value="0" name="points" >
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Comments</label>
                        <input class="form-control" type="text" value="None" name="comments">
                    </div>
                </div>
                <div class="modal-footer">
                <button class="btn btn-primary" type="submit" onclick="return confirm('Are you sure?')" name="sendgps">Send</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade show" id="SendFreebies" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <form method="POST" action="controller/tool_function.php">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Send Freebies</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Item Code</label>
                        <input class="form-control" type="text" required="" name="itemcode" >
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Stack</label>
                        <input class="form-control" type="text" required="" value="1" name="stack" >
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Attribute</label>
                        <input class="form-control" required="" type="text" value="0x00" name="attr" >
                    </div>
                </div>
                <div class="modal-footer">
                <button class="btn btn-primary" type="submit" onclick="return confirm('Are you sure?')" name="allfreebies">Send To All</button>
                <button class="btn btn-primary" type="submit" onclick="return confirm('Are you sure?')" name="onlinefreebies">Send To All Online</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade show" id="SendItemAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <form method="POST" action="controller/tool_function.php">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Send Item</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Character Name</label>
                        <input class="form-control" type="text" required="" name="charname" >
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Item Code</label>
                        <input class="form-control" type="text" required="" name="itemcode" >
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Stack</label>
                        <input class="form-control" type="text" required="" value="1" name="stack" >
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Attribute</label>
                        <input class="form-control" required="" type="text" value="0x00" name="attr" >
                    </div>
                </div>
                <div class="modal-footer">
                <button class="btn btn-primary" type="submit" onclick="return confirm('Are you sure?')" name="senditem">Send</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade show" id="SendItemEM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <form method="POST" action="controller/tool_function.php">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Send Item</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Character Name</label>
                        <input class="form-control" type="text" required="" name="charname" >
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Item Code</label>
                        <input class="form-control" type="text" required="" name="itemcode" >
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label" for="recipient-name">Stack</label>
                        <input class="form-control" type="text" required="" value="1" name="stack" >
                    </div>
                </div>
                <div class="modal-footer">
                <button class="btn btn-primary" type="submit" onclick="return confirm('Are you sure?')" name="senditemem">Send</button>
                </div>
            </div>
        </div>
    </form>
</div>