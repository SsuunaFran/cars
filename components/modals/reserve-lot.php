<?php
// session_start();
?>
<div class="modal fade" id="reserve" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div id="insertSpaceErr"></div>
        <div class="modal-content" id="spaceModal">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Reserve Parking Space</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row modal-body">
                <div class="col-2" id="displayspace">
                </div>
                <div class="col-10 float-start">
                    <h6 id="modal-content">Loading...<?php echo $label ?></h6>
                </div>
                <form method="post" action="controllers/form-submission/submit_parking_lot.php">
                    <div class="mb-3">
                        <label for="parking-lot-name" class="col-form-label">Parking Lot Name:</label>
                        <input type="text" class="form-control" id="parking-lot-name" name="parking_lot_name" placeholder="Basement parking" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="parking-rows" class="col-form-label">Car Numberplate:</label>
                            <select class="form-control form-select" aria-label="Default select example">
                                <option selected>Choose a numberplate</option>
                                <option value="1">UBH 7639L</option>
                                <option value="2">UJM 4823N</option>
                                <option value="3">ULB 6543F</option>
                                <option value="4">UXW 9182P</option>
                                <option value="5">UHY 3071T</option>
                                <option value="46">UPK 7462Z</option>
                                <option value="47">UWC 1850F</option>
                             </select>
                        </div>
                        <div class="col-6">
                            <label for="parking-columns" class="col-form-label">Client contact:</label>
                            <select class="form-control form-select" aria-label="Default select example">
                                <option selected>Choose a contact</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
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
                    <!-- <button type="submit" class="btn btn-primary w-100">Submit</button> -->
                    <button type="submit" data-bs-dismiss="modal" data-role="<?php echo $_SESSION['role'] ?>" class="btn btn-primary" id="save-changes">Confirm</button>
                </form>
                <form hidden>
                    <input class="form-control" id="modal-parking-lot-id" name="modal-parking-lot-id" disabled>
                    <input class="form-control" id="modal-row" name="modal-row" disabled>
                    <input class="form-control" id="modal-column" name="modal-column" disabled>
                    <input class="form-control" id="modal-space" name="modal-space" disabled>
                </form>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" data-role="<?php echo $_SESSION['role'] ?>" class="btn btn-primary" id="save-changes">Confirm</button>
            </div> -->
        </div>
    </div>
</div>