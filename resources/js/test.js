    function setQuantiyFromShoppingCar( editButton, typeSet ){

        // Reducir la cantidad de productos en el modal de carrito de comrpas, desde el modal del carrito
        document.querySelectorAll('.'+editButton).forEach(item => {
            item.addEventListener('click', event => {

                // Obtengo los productos del local storage
                let ProductsLocalStorage = localStorage.getItem('productsShoppingCar');
                let arrayProductsLocalStorage = JSON.parse(ProductsLocalStorage);

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

                if ( ( quantity > 0 && typeSet == 'substract' ) || typeSet == 'add'){

                    let productInShppingCar = false;
                    let keyArray = 0;

                    // Substract

                    arrayProductsLocalStorage.forEach(product => {
                        if (idProduct == product.id ){
                            productInShppingCar = true;
                            if( typeSet == 'add' ){
                                product.quantity = ++quantity;
                            }else{
                                product.quantity = --quantity;
                            }
                        }
                        if (!productInShppingCar){
                            keyArray++;
                        }
                    });

                    // SOLO PARA SUBSTRACT
                    // El producto llego a cero? se debe eliminar del local storage
                    if ( quantity == 0 && typeSet == 'substract' ){
                        // Se elimina el producto del carrito de compras
                        arrayProductsLocalStorage.splice(keyArray, 1);

                        // Elimino el card del carrito
                        removeCardProductShoppingCar(idProduct);
                    }

                    // preguntar si el id del producto que estoy incrementando es el mismo de la vista de detalles
                    const id_product_DOM = document.getElementById('idproduct').textContent;
                    if( id_product_DOM == idProduct ){
                        // actualizo la cantidad del producto en la vista de detalles
                        // Cantidad de productos en carrito, en vista de detalles de producto
                        const quantityProductDetail = document.querySelector('#quantityProductDetail');
                        if ( quantityProductDetail !== null ){
                            quantityProductDetail.textContent = quantity;
                        }

                    }
                    rootContainer.querySelector('.quantityCardProductShoppingCar').textContent = quantity;
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
                    // actualizo la cantidad en el DOM de la vista de tienda, en caso se estar en la vista de detalles de la tienda seleccionada
                    updateQuantityProductsInBrandView(idProduct, quantity);
                    // Almaceno el producot en el localStorage
                    localStorage.setItem('productsShoppingCar',JSON.stringify(arrayProductsLocalStorage));
                    updateAmount();

                }

            } ,{passive: true});
        });

    }
