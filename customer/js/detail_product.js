
function cal_amountProduct_plus(){
    var temp=parseInt(document.getElementById("amount_product").value);
    temp+=1;
    document.getElementById("amount_product").value=temp;
}
function cal_amountProduct_minus(){
    var temp=parseInt(document.getElementById("amount_product").value);
    if(temp>=2){
        temp-=1;
    }
    document.getElementById("amount_product").value=temp;
}