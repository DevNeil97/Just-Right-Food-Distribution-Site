updateRowTotal()
updateTotal();
updatefinalTotal();

//Remove item
function deleteRow(btn) {
    //console.log('Removed');
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
    updateTotal();
    updatefinalTotal();
}

//update row-sub tot when clicked
function updateRowTotal(input) {
    var quantity = input.value
    var price = parseFloat(input.parentNode.parentNode.getElementsByClassName
        ("ind-price")[0].innerText.replace("Price: £",""))
    console.log(price*quantity)
    input.parentNode.parentNode.getElementsByClassName("row-sub-tot")[0]
    .innerText = "£"+(price*quantity).toFixed(2)
    updateTotal();
    updatefinalTotal();
}

// quantity error 
var quantityInputs = document.getElementsByClassName('quantity-input');
for (var i = 0; i< quantityInputs.length; i++){
    var input =quantityInputs[i];
    input.addEventListener('change',quantitychange);
}

function quantitychange(event){
    var input =event.target;
    if(isNaN(input.value) || input.value <=0){
        input.value =1;
    }
    updateTotal();
    updatefinalTotal();
}


//update total
function updateTotal(){
    var rowPrices = document.getElementsByClassName('row-sub-tot');
    var subtotal = 0;
    for (var i = 0; i < rowPrices.length; i++) {
        var price =parseFloat(rowPrices[i].innerText.replace('£',''));
        subtotal=subtotal+price;
    }  
    //Write to subtotal
    document.getElementById("final-sub-tot").innerText= "£"+subtotal.toFixed(2);
}


//update final total
function updatefinalTotal() {
    var subtotal =  document.getElementById('final-sub-tot');
    var deliFee = document.getElementById("delivary-fee");
    var subtotal =parseFloat(subtotal.innerText.replace('£',''));
    var deliFee =parseFloat(deliFee.innerText.replace('£',''));

    //user cant place an oder without subtotal being less than 0 
    if(subtotal == 0){
        document.getElementById("final-tot").innerText= "£"+0.00.toFixed(2);
    }else{
        //Write to final total
        document.getElementById("final-tot").innerText= "£"+(subtotal+deliFee).toFixed(2);
    }
}


//update sub-tot at startup
function updateRowTotal(){
    var quantityInputs = document.getElementsByClassName('quantity-input');
    for (var i = 0; i< quantityInputs.length; i++){
        //get values
        quantity = quantityInputs[i].value
        price = quantityInputs[i].parentNode.parentNode
        .getElementsByClassName("ind-price")[0].innerText.replace("Price: £","")
        //update values
        quantityInputs[i].parentNode.parentNode.getElementsByClassName("row-sub-tot")[0]
        .innerText = "£"+(price*quantity).toFixed(2)
        updateTotal();
        updatefinalTotal();
    }
}