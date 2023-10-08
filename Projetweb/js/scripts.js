    document.addEventListener('DOMContentLoaded', function () {
    const addButton = document.getElementById('add-product-btn');
    const modal = document.getElementById('add-product-modal');
    const closeModal = modal.querySelector('.close');

    addButton.addEventListener('click', function () {
        modal.style.display = 'block';
    });

    closeModal.addEventListener('click', function () {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function (event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {
    // ... Autres codes ...

    const productForm = document.getElementById('product-form');
    const productList = document.getElementById('product-list');

    productForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const name = document.getElementById('name').value;
        const color = document.getElementById('color').value;
        const size = document.getElementById('size').value;
        const price = document.getElementById('price').value; 

        // Récupérez le fichier d'image téléchargé
        const imageInput = document.getElementById('image');
        const imageFile = imageInput.files[0]; // Prenez le premier fichier, vous pouvez ajouter une logique de validation ici

        // Créez un élément HTML pour le nouveau produit
        const productItem = document.createElement('div');
        productItem.classList.add('product-item');
        productItem.innerHTML = `
            <h3>${name}</h3>
            <p>Couleur : ${color}</p>
            <p>Taille : ${size}</p>
            <P>Prix : ${price} €</p>
        `;

        // Créez un élément d'image pour afficher l'image
        if (imageFile) {
            const imageElement = document.createElement('img');
            imageElement.src = URL.createObjectURL(imageFile);
            imageElement.alt = name; // Utilisez le nom du produit comme texte alternatif
            productItem.appendChild(imageElement);
        }

        // Ajoutez le produit à la liste des produits
        productList.appendChild(productItem);

        // Effacez les champs du formulaire
        productForm.reset();
    });
});

/* ajouter panier */

function addToCart(productName) {
    // Récupérez les produits déjà présents dans le panier (s'il y en a)
    const existingCart = JSON.parse(localStorage.getItem('cart')) || [];
  
    // Ajoutez le nouveau produit au panier
    existingCart.push({ name: productName });
  
    // Mettez à jour le panier dans le stockage local
    localStorage.setItem('cart', JSON.stringify(existingCart));
  }
