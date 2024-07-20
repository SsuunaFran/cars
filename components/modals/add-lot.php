<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Parking Lot</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="controllers/form-submission/submit_parking_lot.php">
                    <div class="mb-3">
                        <label for="parking-lot-name" class="col-form-label">Parking Lot Name:</label>
                        <input type="text" class="form-control" id="parking-lot-name" name="parking_lot_name" placeholder="Basement parking" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="parking-rows" class="col-form-label">Parking Lot Rows:</label>
                            <input type="number" class="form-control" id="parking-rows" name="parking_rows" min="1" required>
                        </div>
                        <div class="col-6">
                            <label for="parking-columns" class="col-form-label">Parking Lot Columns:</label>
                            <input type="number" class="form-control" id="parking-columns" name="parking_columns" min="1" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="parking-lot-desc" class="col-form-label">Parking Lot Description:</label>
                        <textarea id="parking-lot-desc" class="form-control" name="parking_lot_desc" aria-label="With textarea"></textarea>
                    </div>
                    <div class="mb-0">
                        <label for="parking-lot-fee" class="col-form-label">Parking Lot Charge:</label>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Shs.</span>
                        <input type="number" class="form-control" id="parking-lot-fee" name="parking_lot_fee" placeholder="Fee for each parking space" required> <span class="input-group-text">.00</span>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>