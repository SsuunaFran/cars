<?php
require_once "./database/database.php";
// $host = 'localhost';
// $db   = 'parking_db';
// $user = 'root';
// $pass = 'Ancis@2001';

// $conn = mysqli_connect($host, $user, $pass, $db);

// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

$sql = "SELECT id, parking_lot_name, parking_lot_fee FROM parking_lots";
$result = $conn->query($sql);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Fetch the existing data
    $stmt = $conn->prepare("SELECT parking_lot_name, parking_rows, parking_columns FROM parking_lots WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($parking_lot_name, $parking_rows, $parking_columns);
    $stmt->fetch();
    $stmt->close();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $new_parking_lot_name = $_POST['parking_lot_name'];
        $new_parking_rows = $_POST['parking_rows'];
        $new_parking_columns = $_POST['parking_columns'];

        // Update the data
        $stmt = $conn->prepare("UPDATE parking_lots SET parking_lot_name = ?, parking_rows = ?, parking_columns = ? WHERE id = ?");
        $stmt->bind_param("siii", $new_parking_lot_name, $new_parking_rows, $new_parking_columns, $id);

        if ($stmt->execute()) {
            header("Location: /view-lots");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

?>

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Parking Lots Charges</h4>
                        </div>
                        <div class="col-6"><button type="button" class="btn btn-success btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="bi bi-plus me-1"></i>ADD PARKING LOT</button></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Parking Lot Name</th>
                                    <th>Parking Charge (Shs.)</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Parking Lot Name</th>
                                    <th>Parking Charge (Shs.)</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["id"] . "</td>";
                                        echo "<td>" . $row["parking_lot_name"] . "</td>";
                                        echo "<td>" . $row["parking_lot_fee"] . "</td>";
                                        echo "<td>
                                        <button class='btn btn-primary py-1 btn-sm' data-bs-toggle='modal' data-bs-target='#editModal" . $row["id"] . "'>
                                            <i class='bi bi-pencil-fill me-1'></i>Edit
                                        </button>
                                        <a href='/parking-lots?id=" . $row["id"] . "' class='btn btn-info py-1 px-2 btn-sm'>
                                            <i class='bi bi-eye-fill me-1'></i>View
                                        </a>
                                      </td>";
                                        echo "</tr>";
                                        echo "
                                            <div class='modal fade' id='editModal" . $row["id"] . "' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Edit Parking Lot Charge</h1>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <form method='post' action='controllers/form-submission/edit-lot-charge.php'>
                                                                <input type='hidden' name='id' value='" . $row["id"] . "'>
                                                                <div class='mb-3'>
                                                                    <label for='parking-lot-name' class='col-form-label'>Parking Lot Name:</label>
                                                                    <input type='text' class='form-control' name='parking_lot_name' value='" . $row["parking_lot_name"] . "' disabled>
                                                                </div>
                                                                 <div class='mb-0'>
                                                                    <label for='parking-lot-name' class='col-form-label'>Parking Lot Charge:</label>
                                                                </div>
                                                                <div class='input-group mb-3'>
                                                                    <span class='input-group-text'>Shs.</span>
                                                                    <input type='number' class='form-control' id='parking-lot-fee' name='parking_lot_fee'  value='". $row["parking_lot_fee"]."' placeholder='Fee for each parking space' required>                        
                                                                    <span class='input-group-text'>.00</span>
                                                                </div>
                                                                <button type='submit' class='btn btn-primary float-end'>Change</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        ";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No parking lots found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$conn->close();
?>