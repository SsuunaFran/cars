<div class="modal fade" id="addclient" tabindex="-1" aria-labelledby="addclient" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Client Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="controllers/form-submission/submit_client_info.php">
                    <div class="mb-3">
                        <label for="client-name" class="col-form-label">Client Name:</label>
                        <input type="text" class="form-control" id="client-name" name="client_name" placeholder="Enter client name" required>
                    </div>
                    <div class="mb-3">
                        <label for="client-phone" class="col-form-label">Phone Contact:</label>
                        <input type="tel" class="form-control" id="client-phone" name="client_phone" placeholder="+256 700000001" required>
                    </div>
                    <div class="mb-3">
                        <label for="client-email" class="col-form-label">Email:</label>
                        <input type="email" class="form-control" id="client-email" name="client_email" placeholder="sample@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="client-numberplates" class="col-form-label">Car Number Plate(s):</label>
                        <input type="text" class="form-control" id="client-numberplates" name="client_numberplates" placeholder="UZZ 117A, URB 777Z" required>
                        <small class="form-text text-muted">Separate multiple number plates with a comma.</small>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>