$(document).ready(function(){
    updateCount();
});


const btnCanjear = document.getElementById('btnCanjear');
const inputCupon = document.getElementById('nombreCupon');

btnCanjear.addEventListener('click', () => {

    valueCupon = inputCupon.value;
    
    if(!valueCupon){
        alert("Inserta el nombre del cupón");
        return;
    }

    const URLactual = window.location.pathname;
    window.location.href = URLactual+"?cupon="+valueCupon;

})


function canejarCupon(percent){

    let cart = window.localStorage.getItem('carrito');
    if(cart == null) return;
    let totalPrice = 0;

    cart = JSON.parse(cart);
    cart.map((index) => {

        totalPrice += parseInt((index.precio*percent)/100);

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
    let cart = window.localStorage.getItem('carrito');
    const boxCart = document.getElementById('Cart_list');
    const form = document.querySelector('.Cart_form');
    const cupon = document.querySelector('.Cart_cupon');
    let totalPrice = 0;

    if(cart == null){
        cupon.style = "display: none";
        form.style = "display: none";
        const empty = document.createElement('div');
        empty.innerHTML = "<h3>El carrito está vacio</h3>";
        boxCart.innerHTML = "";
        boxCart.appendChild(empty);
    }else{
        cart = JSON.parse(cart);
        cart.map((index) => {
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

function addCart(nombre,id,stock,precio){

    const countStock = document.getElementById(stock).value;
    const totalPrice = (countStock*precio).toFixed(2);
    let list = window.localStorage.getItem('carrito');
    let newList;

    if(list == null){
        newList = [{
            "id": id,
            "nombre": nombre,
            "stock": countStock,
            "precio": totalPrice
        }];
    }else{

        list = JSON.parse(list);
        
        if(list.length >= 10){
            alert('Máximo de 10 productos en el carrito');
            return true;
        }

        let isRepeat = list.filter(index => index.id != id);
        
        if(isRepeat) newList = [...isRepeat,{"id": id,"nombre":nombre,"stock": countStock, "precio": totalPrice}];
        else newList = [...list,{"id": id,"nombre":nombre,"stock": countStock, "precio": totalPrice}];
    }

    window.localStorage.setItem('carrito', JSON.stringify(newList));
    updateCount();
}