upperCaseF(a)
{
    setTimeout(function(){
    a.value = a.value.toUpperCase();
    if(a.value < 0){
        a.value = 0;
    }
    });
}

