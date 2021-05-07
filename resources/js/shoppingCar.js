// Script para Carrito de compras

/* VISIBILIDAD DEL CARRITO DE COMPRAS */

// Modal de carrito de compras
const modalShoppingCar = document.querySelector('#modalShoppingCar');
// Boton para cerrar carrito de compras
const shoppingCarButtonModalClose = document.querySelector('#shoppingCarButtonModalClose');

// Seleccion los elementos que abren el modal de carrito, y les agrego el evento 'click'
document.querySelectorAll('.shoppingCarButtonOpenModal').forEach(item => {
    item.addEventListener('click', event => {
        // Hago visible el modal
        modalShoppingCar.style.display = 'block';
        // Obtengo los productos del local storage
        ProductsLocalStorage = localStorage.getItem('productsShoppingCar');

        // Hay elementos en el carrito de compras?
        if(ProductsLocalStorage !== null) {
            // Llevo el string al formato JSON
            arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);
            // oculto y muestro los textos dependiendo de si hay o no productos en el localsotorage
            localStorageProducts(arrayProductsLocalStorage);


            //  obtengo el contenedor donde se mostraran todos los productos del carrito
            const containerProductsShoppingCar = document.getElementById('containerProductsShoppingCar');
            containerProductsShoppingCar.innerHTML = '';
            // Obtengo el componente card de ejemplo
            const cardProductShoppingCar = document.getElementById('cardProductShoppingCar');

            arrayProductsLocalStorage.forEach(product => {
                // creo un clon del card de ejemplo
                newCardProductShoppingCar = cardProductShoppingCar.firstElementChild.cloneNode(true);
                // Obtengo los campos del card  clonado
                let newIdProductCardModalShoppingCar = newCardProductShoppingCar.querySelector('.idProductCardModalShoppingCar');
                let newTitle = newCardProductShoppingCar.querySelector('.titleCardProductShoppingCar');
                let newQuantity = newCardProductShoppingCar.querySelector('.quantityCardProductShoppingCar');
                let newImage = newCardProductShoppingCar.querySelector('.imgCardProductShoppingCar');
                // Asigno los valores del local storage a los campos html
                newIdProductCardModalShoppingCar.textContent = product.id;
                newTitle.textContent = product.title;
                newQuantity.textContent = product.quantity;
                newImage.src = product.image;
                // Inserto el card en el modal
                containerProductsShoppingCar.appendChild(newCardProductShoppingCar);
            });


        }
    });
});

// Ocultar el modal de carrito de compras
shoppingCarButtonModalClose.addEventListener('click', function(){
    modalShoppingCar.style.display = 'none';
});


/* Agregar Productos al carrito desde la vista de detalles del producto */

// Boton para agregar elementos al local Storage
const addProduct = document.querySelector('#addProduct');
const subtractProduct = document.querySelector('#subtractProduct');
// Cantidad de productos en carrito, en vista de detalles de producto
const quantityProductDetail = document.querySelector('#quantityProductDetail');

if ( addProduct !== null ) {
    // Agregar producto
    addProduct.addEventListener('click', function(){
        // Obtengo los productos del local storage
        ProductsLocalStorage = localStorage.getItem('productsShoppingCar');

        // Obtengo los datos del producto
        let quantity = parseInt(quantityProductDetail.textContent);
        // Tomo los valores del producto para agregarlo al carrito
        const idProduct = document.querySelector('#idproduct').textContent;
        const titleProduct = document.querySelector('#titleProduct').textContent;
        const srcImageProduct = document.querySelector('#srcImageProduct').src;

        // El carrito tiene productos?
        if( ProductsLocalStorage === null ){
            quantity++;
            quantityProductDetail.textContent = quantity;

            let newProduct = {
                id: idProduct,
                title: titleProduct,
                quantity: quantity,
                image: srcImageProduct
            }

            let ProductsLocalStorage = '['+JSON.stringify(newProduct)+']';

            // Muestro el span que indica que hay producots en el carrito
            updateTotalProductsShoppingCar(JSON.parse(ProductsLocalStorage));
            shownHideCompareFloatButton(arrayProductsLocalStorage);
            // Almaceno el producot en el localStorage
            localStorage.setItem('productsShoppingCar',ProductsLocalStorage);

        // El carrito tiene productos
        }else{
            arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

            let productInShppingCar = false;
            // Recorro el array de prodcutos a ver si el producto ya se encuentra en el carrito
            arrayProductsLocalStorage.forEach(product => {
                if (idProduct == product.id ){
                    productInShppingCar = true;
                    quantity++;
                    quantityProductDetail.textContent = quantity;
                    product.quantity = quantity;
                }
            });

            // El producto estaba en el carrito de compras?
            if (productInShppingCar){

                // Muestro el span que indica que hay producots en el carrito
                updateTotalProductsShoppingCar(arrayProductsLocalStorage);
                shownHideCompareFloatButton(arrayProductsLocalStorage);
                // Almaceno en local storage
                localStorage.setItem('productsShoppingCar', JSON.stringify(arrayProductsLocalStorage));

                // El producto no estaba en el carrito de compras, es nuevo!
            }else{

                quantity++;
                quantityProductDetail.textContent = quantity;

                let newProduct = {
                    id: idProduct,
                    title: titleProduct,
                    quantity: quantity,
                    image: srcImageProduct
                }

                arrayProductsLocalStorage.push(newProduct);
                // Muestro el span que indica que hay producots en el carrito
                updateTotalProductsShoppingCar(arrayProductsLocalStorage);
                shownHideCompareFloatButton(arrayProductsLocalStorage);
                // Almaceno el producot en el localStorage
                localStorage.setItem('productsShoppingCar',JSON.stringify(arrayProductsLocalStorage));

            }

        }

    });
}

if (subtractProduct !== null ){
    // Substraer producto
    subtractProduct.addEventListener('click', function(){

            // Obtengo los productos del local storage
            ProductsLocalStorage = localStorage.getItem('productsShoppingCar');

            // Obtengo los datos del producto
            let quantity = parseInt(quantityProductDetail.textContent);
            // Tomo los valores del producto para agregarlo al carrito
            const idProduct = document.querySelector('#idproduct').textContent;

            // La cantidad es mayor que cero?
            if( quantity > 0 ){

                // El carrito tiene productos?
                if( ProductsLocalStorage !== null ){
                    arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

                    let productInShppingCar = false;
                    let keyArray = 0;
                    // Recorro el array de prodcutos a ver si el producto ya se encuentra en el carrito
                    arrayProductsLocalStorage.forEach(product => {
                        if (idProduct == product.id ){
                            productInShppingCar = true;
                            quantity--;
                            quantityProductDetail.textContent = quantity;
                            product.quantity = quantity;
                        }
                        if (!productInShppingCar){
                            keyArray++;
                        }
                    });

                    // La cantidad del producto es cero? -
                    if (quantity == 0) {
                        // Se elimina el producto del carrito de compras
                        arrayProductsLocalStorage.splice(keyArray, 1);
                    }

                    // Muestro el span que indica que hay producots en el carrito
                    updateTotalProductsShoppingCar(arrayProductsLocalStorage);
                    shownHideCompareFloatButton(arrayProductsLocalStorage);

                    // Guardo en localstorage
                    localStorage.setItem('productsShoppingCar', JSON.stringify(arrayProductsLocalStorage));

                }
            }

    });
}



/* Manejar los productos del Modal de Carrito de Compras*/

// Incrementar la cantidad de productos en el modal de carrito de comrpas, desde el modal del carrito
document.querySelectorAll('.shoppingCarButtonOpenModal').forEach(item => {
    item.addEventListener('click', event => {
        document.querySelectorAll('.addProductModalShoppingCard').forEach(item => {
            item.addEventListener('click', event => {
                // Obtengo los productos del local storage
                ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
                arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

                // En que elemento se dio click? en el spna, en el svg o en el path?
                if ( event.target.nodeName == 'SPAN' ){
                    var rootContainer = event.target.parentNode.parentNode.parentNode.parentNode.parentNode;
                }else if( event.target.nodeName == 'svg' ){
                    var rootContainer = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
                }else {
                    var rootContainer = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
                }

                const idProduct = rootContainer.querySelector('.idProductCardModalShoppingCar').textContent;

                let quantity = parseInt( rootContainer.querySelector('.quantityCardProductShoppingCar').textContent.trim() );

                let productInShppingCar = false;

                arrayProductsLocalStorage.forEach(product => {
                    if (idProduct == product.id ){
                        productInShppingCar = true;
                        quantity++;
                        product.quantity = quantity;
                    }
                });
                // Cantidad de productos en carrito, en vista de detalles de producto
                const quantityProductDetail = document.querySelector('#quantityProductDetail');
                if ( quantityProductDetail !== null ){
                    quantityProductDetail.textContent = quantity;
                }

                rootContainer.querySelector('.quantityCardProductShoppingCar').textContent = quantity;

                // actualizo el span de carrito de compras
                updateTotalProductsShoppingCar(arrayProductsLocalStorage);
                shownHideCompareFloatButton(arrayProductsLocalStorage);
                // Almaceno el producot en el localStorage
                localStorage.setItem('productsShoppingCar',JSON.stringify(arrayProductsLocalStorage));

            });
        });

    });
});


// Reducir la cantidad de productos en el modal de carrito de comrpas, desde el modal del carrito
document.querySelectorAll('.shoppingCarButtonOpenModal').forEach(item => {
    item.addEventListener('click', event => {
        document.querySelectorAll('.substractProductModalShoppingCard').forEach(item => {
            item.addEventListener('click', event => {

                // Obtengo los productos del local storage
                ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
                arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

                // En que elemento se dio click? en el spna, en el svg o en el path?
                if ( event.target.nodeName == 'SPAN' ){
                    var rootContainer = event.target.parentNode.parentNode.parentNode.parentNode.parentNode;
                }else if( event.target.nodeName == 'svg' ){
                    var rootContainer = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
                }else {
                    var rootContainer = event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode;
                }

                const idProduct = rootContainer.querySelector('.idProductCardModalShoppingCar').textContent;

                let quantity = parseInt( rootContainer.querySelector('.quantityCardProductShoppingCar').textContent.trim() );

                if (quantity > 0){

                    let productInShppingCar = false;
                    let keyArray = 0;

                    arrayProductsLocalStorage.forEach(product => {
                        if (idProduct == product.id ){
                            productInShppingCar = true;
                            quantity--;
                            product.quantity = quantity;
                        }
                        if (!productInShppingCar){
                            keyArray++;
                        }
                    });

                    rootContainer.querySelector('.quantityCardProductShoppingCar').textContent = quantity;
                    // Cantidad de productos en carrito, en vista de detalles de producto
                    const quantityProductDetail = document.querySelector('#quantityProductDetail');
                    if ( quantityProductDetail !== null ){
                        quantityProductDetail.textContent = quantity;
                    }

                    // El producto llego a cero? se debe eliminar del local storage
                    if ( quantity == 0 ){
                        // Se elimina el producto del carrito de compras
                        arrayProductsLocalStorage.splice(keyArray, 1);

                        // Elimino el card del carrito
                        removeCardProductShoppingCar(idProduct);
                    }
                    // oculto y muestro los textos dependiendo de si hay o no productos en el localsotorage
                    localStorageProducts(arrayProductsLocalStorage);
                    // actualizo el span de carrito de compras
                    updateTotalProductsShoppingCar(arrayProductsLocalStorage);
                    shownHideCompareFloatButton(arrayProductsLocalStorage);
                    // Almaceno el producot en el localStorage
                    localStorage.setItem('productsShoppingCar',JSON.stringify(arrayProductsLocalStorage));
                }

            });
        });

    });
});

// Eliminar prodcuto del modal de carrito de compras, con boton de elminar que esta en el modal del carrito
document.querySelectorAll('.shoppingCarButtonOpenModal').forEach(item => {
    item.addEventListener('click', event => {
        document.querySelectorAll('.removeProductModalShoppingCar').forEach(item => {
            item.addEventListener('click', event => {

                // Obtengo los productos del local storage
                ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
                arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

                // En que elemento se dio click? en el spna, en el svg o en el path?
                const rootContainer = event.target.parentNode;

                const idProduct = rootContainer.querySelector('.idProductCardModalShoppingCar').textContent;

                let productInShppingCar = false;
                let keyArray = 0;

                arrayProductsLocalStorage.forEach(product => {
                    if (idProduct == product.id ){
                        productInShppingCar = true;
                    }
                    if (!productInShppingCar){
                        keyArray++;
                    }
                });

                if (productInShppingCar) {
                    // Se elimina el producto del carrito de compras
                    arrayProductsLocalStorage.splice(keyArray, 1);
                    // Elminar el card del carrito
                    removeCardProductShoppingCar(idProduct);
                    // Cantidad de productos en carrito, en vista de detalles de producto
                    const quantityProductDetail = document.querySelector('#quantityProductDetail');
                    if ( quantityProductDetail !== null ){
                        quantityProductDetail.textContent = 0;
                    }
                }
                // oculto y muestro los textos dependiendo de si hay o no productos en el localsotorage
                localStorageProducts(arrayProductsLocalStorage);
                // actualizo el span de carrito de compras
                updateTotalProductsShoppingCar(arrayProductsLocalStorage);
                shownHideCompareFloatButton(arrayProductsLocalStorage);
                // Almaceno el producot en el localStorage
                localStorage.setItem('productsShoppingCar',JSON.stringify(arrayProductsLocalStorage));


            });
        });

    });
});

// Funcion para eliminar el card element del producto en el carrito de compras
function removeCardProductShoppingCar ( idProduct ){

    // Contenedor de todos los card de productos
    let containerProductsShoppingCar = document.getElementById('containerProductsShoppingCar');

    let cardItems = containerProductsShoppingCar.querySelectorAll('.idProductCardModalShoppingCar');
    cardItems.forEach(cardItem => {

        let idCardProduct = cardItem.textContent;

        if( idCardProduct == idProduct){
            cardItem.parentNode.remove();
        }

    });

}

// funcion para ocultar o mostrar botones y textos dependiendo de si hay o no productos en el localstorage
function localStorageProducts(arrayProductsLocalStorage){
    if (arrayProductsLocalStorage.length > 0 ){
        document.getElementById('conProdcutos').style.display = 'block';
        document.getElementById('sinProdcutos').style.display = 'none';
        document.getElementById('compararButton').style.display = 'block';
    }else{
        document.getElementById('sinProdcutos').style.display = 'block';
        document.getElementById('conProdcutos').style.display = 'none';
        document.getElementById('compararButton').style.display = 'none';
    }
}


// Funcion para actualizar productos el el boton flotante
function updateTotalProductsShoppingCar(arrayProductsLocalStorage){
    const spanQuantityFloatButtonShoppingCard = document.getElementById('spanQuantityFloatButtonShoppingCard');
    const badgeIconShoppingCarNavbar = document.getElementById('badgeIconShoppingCarNavbar');
    let quantityTotal = 0;

    if(arrayProductsLocalStorage.length == 0 ){
        spanQuantityFloatButtonShoppingCard.style.display = 'none';
        badgeIconShoppingCarNavbar.style.display = 'none';

    }else{
        arrayProductsLocalStorage.forEach(product => {
            quantityTotal += product.quantity;
        });

        spanQuantityFloatButtonShoppingCard.style.display = 'flex';
        spanQuantityFloatButtonShoppingCard.lastElementChild.textContent = quantityTotal;
        badgeIconShoppingCarNavbar.style.display = 'block';
    }

}


// Al cargar el sitio web

$(window).on('load', function () {
    // Obtengo los productos del local storage
    ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
    // Transformo el string a array
    arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

    let compareFloatButton = document.getElementById('compareFloatButton');

    // Hay elementos en el carrito de compras?
    if(arrayProductsLocalStorage.length > 0) {
        compareFloatButton.classList.add("shownButton");
    }

    // Muestro el span de carrito de compras
    updateTotalProductsShoppingCar(arrayProductsLocalStorage);

    // Busco las cards de productos y verifico si se encuentran en el carrito de compras
    document.querySelectorAll('.idProductCard').forEach(product => {
        idProduct = product.textContent;
        arrayProductsLocalStorage.forEach(item => {
            if ( item.id == idProduct ){
                product.parentNode.querySelector('.svgProdcutInShoppingCar').style.display = 'block';
            }

        });
    });


    // Obtengo loa ubicacion del local storage
    ubicationLocalStorage = localStorage.getItem('ubication');
    if (ubicationLocalStorage == null) {

        objectUbicationLocalStorage = {
            state_id: 7,
            state: 'Carabobo',
            city_id: 7,
            city: 'Valencia'
         };

        // Almaceno el producot en el localStorage
        localStorage.setItem('ubication',JSON.stringify(objectUbicationLocalStorage));
    }
});


function shownHideCompareFloatButton(arrayProductsLocalStorage){
    let compareFloatButton = document.getElementById('compareFloatButton');

    // Hay elementos en el carrito de compras?
    if(arrayProductsLocalStorage == 0) {
        compareFloatButton.classList.add("hiddeButton");
        compareFloatButton.classList.remove("shownButton");
        // compareFloatButton.classList.replace("shownButton", "hiddeButton");
    }else{
        compareFloatButton.classList.remove("hiddeButton");
        compareFloatButton.classList.add("shownButton");

        // compareFloatButton.classList.replace("hiddeButton", "shownButton");
    }
}


