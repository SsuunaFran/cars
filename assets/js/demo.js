document.addEventListener('DOMContentLoaded', function () {
    var reserveModal = document.getElementById('reserve');
    reserveModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var row = button.getAttribute('data-row');
        var column = button.getAttribute('data-column');
        var parkingLotId = button.getAttribute('data-id');
        var label = button.getAttribute('data-label');
        var space = button.getAttribute('data-space');
        var role = button.getAttribute('data-role');
        var displaySpace = document.getElementById('displayspace');
        var Err = document.getElementById('insertSpaceErr');
        var spaceModal= document.getElementById('spaceModal')
        var charge = button.getAttribute('data-charge');
        document.getElementById('parking-space-label').value=label;
        document.getElementById('parking-space-charge').value=charge;

        clearErrors();

        var modalContent = reserveModal.querySelector('#modal-content');
        if (role == 'admin') {
            if (space == 0) {
                modalContent.textContent = 'Confirm reservation of parking Space ' + label;
                document.getElementById('modal-space').value = 2;
                displaySpace.innerHTML ='<div class="box nocarparked w-100" id="modallabel">'+label+'</div>';
            } else if (space == 2) {
                modalContent.textContent = 'Confirm release of reservation ' + label;
                document.getElementById('modal-space').value = 0;
                displaySpace.innerHTML ='<div class="box nocarparked w-100 bg-success" id="modallabel">'+label+'</div>';
                
            } else {
                Err.innerHTML = '<div class="alert alert-danger" role="alert"><i class="bi me-3 bi-exclamation-triangle"></i>Sorry you cannot reserve a booked space!</div>';
                Err.style.display="block";
                spaceModal.style.display="none";
            }
        } else if (role == 'user') {
            if (space == 0) {
                modalContent.textContent = 'Confirm booking of parking Space ' + label;
                document.getElementById('modal-space').value = 1;
                displaySpace.innerHTML ='<div class="box nocarparked w-100" id="modallabel">'+label+'</div>';
            } else if (space == 1) {
                Err.innerHTML = '<div class="alert alert-danger" role="alert"><i class="bi me-3 bi-exclamation-triangle"></i>Sorry, parking space '+label+' is already booked !</div>';
                Err.style.display="block";
                spaceModal.style.display="none";
            } else {
                Err.innerHTML = '<div class="alert alert-danger" role="alert"><i class="bi me-3 bi-exclamation-triangle"></i>Sorry you cannot book a reserved space!</div>';
                Err.style.display="block"; 
                spaceModal.style.display="none";
            }
        }


        function clearErrors() {
            spaceModal.style.display="block"; 
            Err.style.display="none";
        }
    

        document.getElementById('modal-row').value = row;
        document.getElementById('modal-column').value = column;
        document.getElementById('modal-parking-lot-id').value = parkingLotId;
    });
   
    var ConfirmSpace = document.getElementById('save-changes');
    var paymentBtn = document.getElementById('payment-btn');
    

    ConfirmSpace.addEventListener('click', function () {
        var space = document.getElementById('modal-space').value;
        var role = ConfirmSpace.getAttribute('data-role');

        function doAction(){
            var row = document.getElementById('modal-row').value;
            // var space = document.getElementById('modal-space').value;
            var column = document.getElementById('modal-column').value;
            var parkingLotId = document.getElementById('modal-parking-lot-id').value;

            $.ajax({
                url: 'controllers/form-submission/reserve-parking-lot.php',
                type: 'POST',
                data: {
                    row: row,
                    column: column,
                    parking_lot_id: parkingLotId,
                    new_value: space
                },
    
                success: function (response) {
                    $('#reserve').modal('hide');
                    location.reload();
                },
                error: function (xhr, status, error) {
                    $('#reserve').modal('hide');
                    alert('Error: Could not update the grid.');
                }
            });
        }
       

        if(role=="user" && space==1){
            var paymentmodal = document.getElementById('payment');
            
            var payment = new bootstrap.Modal(paymentmodal);
            payment.show();
            // paymentBtn.addEventListener('click',()=>{
            //     doAction();
            // })
            space = role = null;
            return;
        }

        doAction();
    });
});