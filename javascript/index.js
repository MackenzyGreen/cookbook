var selected = "";

window.onload=function(){
    var btns = document.querySelectorAll(".button");

    for(var i=0; i<btns.length; i++){
        console.log(btns[i].id);
        document.getElementById(btns[i].id).onclick=toggleSelect;
    }
}

function myFunc(id){
    window.open("./view-recipe.php?r="+id, '_self');
}

function toggleSelect(){
    var id = this.id;
    if(selected==""){
        selected=id;
        document.getElementById(id).classList.toggle("button-toggle");
    }else if(selected==id){
        document.getElementById(id).classList.toggle("button-toggle");
        selected="";
    }else{
        document.getElementById(selected).classList.toggle("button-toggle");
        document.getElementById(id).classList.toggle("button-toggle");
        selected=id;
    }
}