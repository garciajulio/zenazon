$(document).ready(function(){
    console.log("Go");

    $('#buttonClose').click(() => $('#menuLeft').css("left", "-700px"));
    $('#buttonOpen').click(()=> $('#menuLeft').css("left","0"));

});