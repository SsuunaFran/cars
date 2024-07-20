<?php
require_once "./database/database.php";

$sql = "SELECT client_id, client_name, client_phone, client_email, client_numberplates FROM clients";
$result = $conn->query($sql);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Fetch the existing data
    $stmt = $conn->prepare("SELECT client_name, client_phone, client_email, client_numberplates FROM clients WHERE client_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($client_name, $client_phone, $client_email, $client_numberplates);
    $stmt->fetch();
    $stmt->close();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $new_client_name = $_POST['client_name'];
        $new_client_phone = $_POST['client_phone'];
        $new_client_email = $_POST['client_email'];
        $new_client_numberplates = $_POST['client_numberplates'];

        // Update the data
        $stmt = $conn->prepare("UPDATE clients SET client_name = ?, client_phone = ?, client_email = ?, client_numberplates = ? WHERE client_id = ?");
        $stmt->bind_param("ssssi", $new_client_name, $new_client_phone, $new_client_email, $new_client_numberplates, $id);

        if ($stmt->execute()) {
            header("Location: /view-clients");
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
                            <h4 class="card-title">Client Information</h4>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-success btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addclient" data-bs-whatever="@mdo">
                                <i class="bi bi-plus me-1"></i> ADD CLIENT
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Client Name</th>
                                    <th>Phone Contact</th>
                                    <th>Email</th>
                                    <th>Numberplate(s)</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Client Name</th>
                                    <th>Phone Contact</th>
                                    <th>Email</th>
                                    <th>Numberplate(s)</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["client_id"] . "</td>";
                                        echo "<td>" . $row["client_name"] . "</td>";
                                        echo "<td>" . $row["client_phone"] . "</td>";
                                        echo "<td>" . ($row["client_email"] ? $row["client_email"] : 'N/A') . "</td>";
                                        echo "<td>" . $row["client_numberplates"] . "</td>";
                                        echo "<td>
                                            <button class='btn btn-primary py-1 btn-sm' data-bs-toggle='modal' data-bs-target='#editModal" . $row["client_id"] . "'>
                                                <i class='bi bi-pencil-fill me-1'></i>Edit
                                            </button>
                                            <a href='controllers/form-submission/delete-client.php?id=" . $row["client_id"] . "' class='btn btn-danger py-1 px-2 btn-sm' onclick='return confirm(\"Are you sure you want to delete " . $row['client_name'] . "?\")'>
                                                <i class='bi bi-trash3 me-1'></i>Delete
                                            </a>
                                        </td>";
                                        echo "</tr>";

                                        echo "
                                            <div class='modal fade' id='editModal" . $row["client_id"] . "' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Edit Client</h1>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <form method='post' action='controllers/form-submission/edit-client.php'>
                                                                <input type='hidden' name='id' value='" . $row["client_id"] . "'>
                                                                <div class='mb-3'>
                                                                    <label for='client-name' class='col-form-label'>Client Name:</label>
                                                                    <input type='text' class='form-control' name='client_name' value='" . htmlspecialchars($row["client_name"]) . "' required>
                                                                </div>
                                                                <div class='mb-3'>
                                                                    <label for='client-phone' class='col-form-label'>Phone Contact:</label>
                                                                    <input type='text' class='form-control' name='client_phone' value='" . htmlspecialchars($row["client_phone"]) . "' required>
                                                                </div>
                                                                <div class='mb-3'>
                                                                    <label for='client-email' class='col-form-label'>Email:</label>
                                                                    <input type='email' class='form-control' name='client_email' value='" . htmlspecialchars($row["client_email"]) . "'>
                                                                </div>
                                                                <div class='mb-3'>
                                                                    <label for='client-numberplates' class='col-form-label'>Car Numberplate(s):</label>
                                                                    <input type='text' class='form-control' name='client_numberplates' value='" . htmlspecialchars($row["client_numberplates"]) . "' required>
                                                                </div>
                                                                <button type='submit' class='btn btn-primary float-end'>Submit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        ";
                                    }
                                } else {
                                    echo "<tr><td colspan='6'>No clients found</td></tr>";
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
