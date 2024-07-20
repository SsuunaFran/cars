<div class="modal fade" id="payment" tabindex="-1" aria-labelledby="payment" aria-hidden="true">
<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Approve Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="paymentForm" method="post" action="controllers/form-submission/approve-payment.php">
                    <input type="hidden" id="parking-space-id" name="id">
                    
                    <div class="mb-3">
                        <label for="parking-space-label" class="form-label">Parking Space Label:</label>
                        <input type="text" class="form-control" id="parking-space-label" name="label" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="parking-space-charge" class="form-label">Parking Space Charge:</label>
                        <div class="input-group">
                            <span class="input-group-text">Shs.</span>
                            <input type="number" class="form-control" id="parking-space-charge" name="charge" readonly>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="account-pin" class="form-label">Enter Account PIN:</label>
                        <input type="password" class="form-control" id="account-pin" name="pin" placeholder="Enter PIN" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Approve Payment</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<button type="button" id="payment-btn" class="btn btn-primary">Save changes</button>