function calcular(){
    try {
        var precio=parseFloat(document.getElementById("precio").value)|| 0;
        document.getElementById("puntog").value=precio*(1/100);
    } catch (e) {
        
    }
}
function calculaAct(){
    try {
        var precio=parseFloat(document.getElementById("precioU").value)|| 0;
        document.getElementById("puntogU").value=precio*(1/100);
    } catch (e) {
        
    }
}
function calculoRadiografia(){
    try {
        var precio=parseFloat(document.getElementById("precio").value)|| 0;
        document.getElementById("puntog").value=precio*(0.05);
    } catch (e) {
        
    }
}
function calculoRadiografiaA(){
    try {
        var precio=parseFloat(document.getElementById("precioU").value)|| 0;
        document.getElementById("puntogU").value=precio*(0.05);
    } catch (e) {
        
    }
}