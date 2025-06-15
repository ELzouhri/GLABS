let total = document.getElementById('total');
function getTotal()
{
    if(price.value != ''){
        let result = (+price.value + +taxes.value + +ads.value) - +discount.value;
        total.innerHTML = result;
        total.style.background = '#040' ;
    }else{
        total.innerHTML = '';
        total.style.background = '#dc3545' ;
    }
}

