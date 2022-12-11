var lbl,rtaxe,taxable,tva1,tva2,taxe,totaltaxable,totaltaxe,totalht,totalttc,rslt;

function calcul(){
    var tarif,qti,rslt,tx,select,tax1=0;

    lbl=document.getElementById("lbl").value;
    tarif=Number(document.getElementById("tarif").value);
    qti=Number(document.getElementById("qti").value);
    rslt=tarif*qti;
    select = document.getElementById("taxe");
    tx=select.options[select.selectedIndex].value;
    if(tx=="tx1"){
        rslt=rslt+(rslt*0.14);
        tax1=rslt;
    }else if(tx=="tx2"){
        rslt=rslt+(rslt*0.2);
        tax1=rslt;
    }
    console.log(rslt);
    console.log(tax1);

}

 function calcul2(){
    var q1,q2;

    q1=Number(document.getElementById("q1").value);
    q2=Number(document.getElementById("q2").value);
    rslt2=q1*q2;
    document.getElementById("rslt2").value=rslt2;

}


function calcul3(){
var rs=rslt+rslt2,rr="non taxable",rr2="taxable 14%",rr3="taxable 20%";
document.getElementById("r1").value=rs;
var select = document.getElementById('test');
vl= select.options[select.selectedIndex].value;
if(vl=="nt"){
    document.getElementById("d").value=rr;
}else if(vl=="tx1"){
    document.getElementById("d").value=rr2;
}else{
    document.getElementById("d").value=rr3;
}

}
