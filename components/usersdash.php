<?php
function getParkingLotDetails()
{
    require_once './database/database.php';
   
   $sql = "SELECT
                parking_lots.id,
                parking_lots.parking_lot_name, 
                parking_lots.parking_lot_fee, 
                parking_lots.description,
                parking_lots_map.grid 
            FROM 
                parking_lots 
            JOIN 
                parking_lots_map 
            ON 
                parking_lots.id = parking_lots_map.parking_lot_id";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result();
    $parking_lot_details = [];
    while ($row = $result->fetch_assoc()) {
        $parking_lot_details[] = $row;
    }

    return $parking_lot_details;
}

function calculateSpaces($grid)
{
    $total_spaces = 0;
    $available_spaces = 0;

    $grid_array = json_decode($grid, true);
    foreach ($grid_array as $row) {
        foreach ($row as $space) {
            $total_spaces++;
            if ($space == 0) {
                $available_spaces++;
            }
        }
    }

    return ['total_spaces' => $total_spaces, 'available_spaces' => $available_spaces];
}

$parking_lot_details = getParkingLotDetails();

echo '<div class="page-inner">
    <div class="row align-items-end mb-1 pb-1">
        <div class="col-md-8">
            <div class="section-title text-center text-md-start">
                <h4 class="title mb-4">Available Parking Lots</h4>
                <p class="text-muted mb-0 para-desc">Select a preffered Parking lot to reserve or book a parking space.</p>
            </div>
        </div>
    </div>

    <div class="row">';

foreach ($parking_lot_details as $detail) {
    $spaces = calculateSpaces($detail['grid']);
    echo "<div class='col-lg-4 col-md-6 col-12 mt-4 pt-2'>
            <div class='card border-0 bg-light rounded shadow-sm'>
                <div class='card-body p-4'>
                    <h5 class='card-title text-primary'>{$detail['parking_lot_name']}</h5>
                    <span class='badge rounded-pill bg-success float-end'>Open</span>
                    <div class='mt-4'>
                        <div class='d-flex justify-content-between align-items-center mt-2'>
                            <span class='text-muted'><i class='fa fa-car me-2 text-info' aria-hidden='true'></i>Available Spaces:</span>
                            <span class='fw-bold' id='available-spaces'>{$spaces['available_spaces']}</span>
                        </div>
                        <div class='d-flex justify-content-between align-items-center mt-2'>
                            <span class='text-muted'><i class='fa fa-car me-2 text-info' aria-hidden='true'></i>Total Spaces:</span>
                            <span class='fw-bold' id='total-spaces'>{$spaces['total_spaces']}</span>
                        </div>
                        <div class='d-flex justify-content-between align-items-center mt-2'>
                            <span class='text-muted'><i class='fa fa-money-bill me-2 text-success' aria-hidden='true'></i>Parking Space price:</span>
                            <span class='fw-bold text-success'>Shs.<span id='price'>" . number_format($detail['parking_lot_fee'], 2) . "</span></span>
                        </div>
                        <div class='mt-3'>
                            <span class='text-muted'><i class='fa fa-info-circle me-2 text-warning' aria-hidden='true'></i>Description:</span>
                            <p id='description' class='text-muted'>{$detail['description']}</p>
                        </div>
                    </div>
                    <div class='mt-4 d-grid'>
                        <a href='/parking-lots?id=".$detail['id']."' class='btn btn-primary'>Book Now</a>
                    </div>
                </div>
            </div>
          </div>";
}

echo '    </div>
</div>';

// $conn->close();