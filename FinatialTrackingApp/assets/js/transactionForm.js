import '../css/transactionForm.css'

document.getElementById('transaction_operation').addEventListener('change', function () {

    console.log(this.value);
    if(this.value == 0){
        document.getElementById('incomeForm').style.display = 'block';
        document.getElementById('expensesForm').style.display = 'none';
        document.getElementById('movementForm').style.display = 'none';
    }
    if(this.value == 1){
        document.getElementById('incomeForm').style.display = 'none';
        document.getElementById('expensesForm').style.display = 'block';
        document.getElementById('movementForm').style.display = 'none';
    }
    if(this.value == 2){
        document.getElementById('incomeForm').style.display = 'none';
        document.getElementById('expensesForm').style.display = 'none';
        document.getElementById('movementForm').style.display = 'block';
    }
});