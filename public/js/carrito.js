$(document).ready(function(){
    updateCount();
});


function canejarCupon(percent){

    const inputNombres = document.getElementById('inputNombres');
    const inputPrecios = document.getElementById('inputPrecio');
    const inputStock = document.getElementById('inputStock');


    let cart = window.localStorage.getItem('carrito');
    if(cart == null) return;
    let totalPrice = 0;
    inputNombres.value = "";
    inputPrecios.value = "";
    inputStock.value = "";

    cart = JSON.parse(cart);
    const urlTienda = window.location.href.split("/")[5];

    cart.map((index) => {

        if(urlTienda !== index.tienda) return;

        let oferta = (index.precio*percent)/100;

        inputNombres.value = index.nombre+";"+inputNombres.value;
        inputPrecios.value = oferta+";"+inputPrecios.value;
        inputStock.value = index.stock+";"+inputStock.value;
        totalPrice += oferta;

        const product = document.createElement("div");
        product.innerHTML = 
        `<h3>${index.nombre}</h3>
        <h3>x ${index.stock} - ${percent+"%"}</h3>
        <span class="oferta">S/${((index.precio*percent)/100).toFixed(2)} <h4>S/${index.precio}<h4></span>
        `;
        $('#Cart_list').append(product);
    });

    const totalP = document.createElement("div");
    totalP.innerHTML = `
        <h3>PRECIO TOTAL:</h3>
        <span>S/${totalPrice.toFixed(2)}</span>`;
    $('#totalPrice').append(totalP);
}

function updateCount(){
    let numberCart = document.getElementById('number_cart');
    let count = window.localStorage.getItem("carrito");
    if(count == null) return true;
    else numberCart.textContent = JSON.parse(count).length;
}

function mapCart(){

    const inputNombres = document.getElementById('inputNombres');
    const inputPrecios = document.getElementById('inputPrecio');
    const inputStock = document.getElementById('inputStock');

    const urlTienda = window.location.href.split("/")[5];
    let cart = window.localStorage.getItem('carrito');
    const boxCart = document.getElementById('Cart_list');
    const form = document.querySelector('.Cart_form');
    const cupon = document.querySelector('.Cart_cupon');
    let totalPrice = 0;
    inputNombres.value = "";
    inputPrecios.value = "";
    inputStock.value = "";

    if(cart == null){
        cupon.style = "display: none";
        form.style = "display: none";
        const empty = document.createElement('div');
        empty.innerHTML = "<h3>El carrito est?? vacio</h3>";
        boxCart.innerHTML = "";
        boxCart.appendChild(empty);
    }else{

        cart = JSON.parse(cart);
        cart.map((index) => {

            if(urlTienda !== index.tienda) return;

            inputNombres.value = index.nombre+";"+inputNombres.value;
            inputPrecios.value = index.precio+";"+inputPrecios.value;
            inputStock.value = index.stock+";"+inputStock.value;

            const product = document.createElement("div");
            
            product.innerHTML = 
            `<h3>${index.nombre}</h3>
            <h3>x ${index.stock}</h3>
            <span>S/${index.precio}</span>
            `;
            totalPrice += parseInt(index.precio)
            boxCart.appendChild(product);
        });

        const totalP = document.createElement("div");
        totalP.innerHTML = `
        <h3>PRECIO TOTAL:</h3>
        <span>S/${totalPrice.toFixed(2)}</span>`;
        $('#totalPrice').append(totalP);

    }

}

function addCart(nombre,id,stock,precio,urlTienda){

    const countStock = document.getElementById(stock).value;
    const totalPrice = (countStock*precio).toFixed(2);
    let list = window.localStorage.getItem('carrito');
    let newList;

    if(list == null){
        newList = [{
            "id": id,
            "tienda": urlTienda,
            "nombre": nombre,
            "stock": countStock,
            "precio": totalPrice
        }];
    }else{

        list = JSON.parse(list);
        
        if(list.length >= 10){
            alert('M??ximo de 10 productos en el carrito');
            return true;
        }

        let isRepeat = list.filter(index => index.id != id);
        
        if(isRepeat) newList = [...isRepeat,{"id": id,"nombre":nombre,"stock": countStock, "precio": totalPrice,"tienda": urlTienda}];
        else newList = [...list,{"id": id,"nombre":nombre,"stock": countStock, "precio": totalPrice,"tienda": urlTienda}];
    }

    window.localStorage.setItem('carrito', JSON.stringify(newList));
    updateCount();
}