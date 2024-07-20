
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script> -->
<?php
require "database/database.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$countslots = 1;

function getColumnLabel($index) {
    $alpha = [];
    for ($i = 0; $i < 26; $i++) {
        $alpha[] = chr(65 + $i); // A to Z
    }
    $result = '';
    $index++;
    while ($index > 0) {
        $mod = ($index - 1) % 26;
        $result = $alpha[$mod] . $result;
        $index = intdiv($index - $mod, 26);
    }
    return $result;
}

$stmt = $conn->prepare(" SELECT pl.parking_lot_name, pl.parking_lot_fee, plm.grid 
    FROM parking_lots_map plm
    JOIN parking_lots pl ON plm.parking_lot_id = pl.id
    WHERE plm.parking_lot_id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $parking_lot_name = $row['parking_lot_name'];
        $parking_lot_fee = $row['parking_lot_fee'];
        $grid = json_decode($row['grid'], true);

?>
        <div class="page-inner">
            <div>
                <h6><?php echo "Parking Lot : " . htmlspecialchars($parking_lot_name, ENT_QUOTES, 'UTF-8') ?></h6>
            </div>
            <div class="row d-flex justify-content-evenly">
                <?php
                foreach ($grid as $row_index => $row) {
                    echo '<div class="col-2 mt-3">';
                    foreach ($row as $column_index=> $cell) {
                        $label = getColumnLabel($columnIndex) . $countslots;
                        if ($cell == 0) {
                            echo '<div class="box nocarparked" data-bs-toggle="modal" data-bs-target="#reserve" data-charge="'.$parking_lot_fee.'" data-row="' . $row_index . '" data-space="'.$cell.'" data-role="'.$_SESSION['role'].'" data-id="' . $id . '" data-label="' . $label . '" data-column="' . $column_index . '">' . $label . '</div>';
                        } else if ($cell == 1) {
                            echo '<div class="box" data-bs-toggle="modal" data-bs-target="#reserve" data-row="' . $row_index . '" data-space="'.$cell.'" data-role="'.$_SESSION['role'].'" data-id="' . $id . '" data-label="' . $label . '" data-column="' . $column_index . '"><img class="parkedcar" src="assets/img/parkedcar.png"/></div>';
                        } else if ($cell == 2){
                            echo '<div class="box nocarparked bg-success" data-bs-toggle="modal" data-bs-target="#reserve" data-row="' . $row_index . '" data-space="'.$cell.'" data-role="'.$_SESSION['role'].'" data-id="' . $id . '" data-label="' . $label . '" data-column="' . $column_index . '">' . $label . '</div>';
                        }
                        $countslots++;
                        // require "components/modals/reserve-lot.php";
                    }
                    echo '</div>';
                    $columnIndex++;
                }
                echo '</div>';
            } else {
                ?>
                <div class="alert alert-info d-flex align-items-center" role="alert">

                    <div>
                        No data found for the specified parking lot.
                    </div>
                    <i class="bi bi-info-circle ms-1"></i>
                </div>
        <?php
            }
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
