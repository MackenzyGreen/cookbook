
var ingredientCount = 2;
var directionCount = 2;

function deleteSlot(){
    var id=(this.id).substring(20);
    $("#ingred-slot-"+id).remove();

    var container = document.querySelector(".ingredient-list");
    var button = container.querySelectorAll(" div > input[type='button']");
    var textField = container.querySelectorAll(" div > input[type='text']");
    var slots = container.querySelectorAll("div");

    //adjusting count
    ingredientCount=button.length+1;

    //changing buttons end number to still be in order after delete
    for(var i = 0; i<button.length; i++){
        
        if(i<(button.length)-1){
            $("#"+button[i].id).attr("id", "deleteIngredientSlot"+(i+1));
        } else{
            $("#"+button[i].id).attr("id", "addIngredientSlot"+(i+1));
        }
    }

    //changing input fields name
    for(var i=0; i<textField.length; i++){
        $("#"+textField[i].id).attr("id", "ingred"+(i+1));
        $("#"+textField[i].id).attr("name", "ingred"+(i+1));
    }

    //changing slot number to match after delete
    for(var i=0; i<slots.length; i++){
        $("#"+slots[i].id).attr("id", "ingred-slot-"+(i+1));
    }

    //redoing onclick
    var deleteBtns = container.querySelectorAll(" div > input[id ^='deleteIngredientSlot']");
    var addBtn = container.querySelectorAll("div > input[id ^='addIngredientSlot']");

    deleteBtns.forEach(element => {
        $("#"+element.id).onclick=deleteSlot;
    });

    $("#"+addBtn[0].id).onclick=addSlot;

}

function addSlot(){
    var prevId = "addIngredientSlot"+(ingredientCount-1);
    var deleteId = "deleteIngredientSlot"+(ingredientCount-1);
    var textid="ingred"+ingredientCount;
    var buttonId = "addIngredientSlot"+ingredientCount;
    var slotId = "ingred-slot-"+ingredientCount;
    ingredientCount++;

    document.getElementById(prevId).id=deleteId;
    document.getElementById(deleteId).value="-";

    $('.ingredient-list').append(`
    <div id="${slotId}">
        <input type="text" name="${textid}" id="${textid}">
        <input type="button" id="${buttonId}" value="+">
    </div>
    `);
    document.getElementById(buttonId).onclick=addSlot;
    
    document.getElementById(deleteId).onclick=deleteSlot;


}

function directionAddSlot(){
    var prevId = "directionAdd"+(directionCount-1);
    var deleteId = "directionDelete"+(directionCount-1);
    var textid="step"+directionCount;
    var buttonId = "directionAdd"+directionCount;
    var slotId = "direction-slot-"+directionCount;
    directionCount++;

    document.getElementById(prevId).id=deleteId;
    document.getElementById(deleteId).value="-";

    $('.direction-list').append(`
    <div id="${slotId}">
        <input type="text" name="${textid}" id="${textid}">
        <input type="button" id="${buttonId}" value="+">
    </div>
    `);
    document.getElementById(buttonId).onclick=directionAddSlot;
    
    document.getElementById(deleteId).onclick=directionDeleteSlot;
}

function directionDeleteSlot(){
    var id=(this.id).substring(15);
    $("#direction-slot-"+id).remove();

    var container = document.querySelector(".direction-list");
    var button = container.querySelectorAll(" div > input[type='button']");
    var textField = container.querySelectorAll(" div > input[type='text']");
    var slots = container.querySelectorAll("div");

    //adjusting count
    directionCount=button.length+1;

    //changing buttons end number to still be in order after delete
    for(var i = 0; i<button.length; i++){
        
        if(i<(button.length)-1){
            $("#"+button[i].id).attr("id", "directionDelete"+(i+1));
        } else{
            $("#"+button[i].id).attr("id", "directionAdd"+(i+1));
        }
    }

    //changing input fields name
    for(var i=0; i<textField.length; i++){
        $("#"+textField[i].id).attr("id", "step"+(i+1));
        $("#"+textField[i].id).attr("name", "step"+(i+1));
    }

    //changing slot number to match after delete
    for(var i=0; i<slots.length; i++){
        $("#"+slots[i].id).attr("id", "direction-slot-"+(i+1));
    }

    //redoing onclick
    var deleteBtns = container.querySelectorAll(" div > input[id ^='directionDelete']");
    var addBtn = container.querySelectorAll("div > input[id ^='directionAdd']");

    deleteBtns.forEach(element => {
        $("#"+element.id).onclick=directionDeleteSlot;
    });

    $("#"+addBtn[0].id).onclick=directionAddSlot;
}


document.getElementById("addIngredientSlot1").onclick=addSlot;

document.getElementById("directionAdd1").onclick=directionAddSlot;