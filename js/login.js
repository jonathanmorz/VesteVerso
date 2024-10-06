var xhr = new XMLHttpRequest()

xhr.onreadystatechange = function(){
    if(xhr.readyState == 4){
        xhr.open("GET","../php/login.php")   
    } else {
        window.alert("Erro")
    }
}