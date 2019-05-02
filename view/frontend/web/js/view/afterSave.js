window.ppclient.on('project-saved', storeToLocal);

// Get Product Id
const productSel = document.querySelector('#product_addtocart_form input[name=product]');
const productId = productSel ? productSel.value : 0;

// Save project ID against product ID in localStorage.
function storeToLocal(e) {
    if (!localStorage.hasOwnProperty('pp_w2p_projects')) 
        localStorage.pp_w2p_projects = JSON.stringify({});
    if (!productId) 
        return console.log('Can not find product ID!');
        
    let currentLocalStorage = JSON.parse(localStorage.pp_w2p_projects);
    currentLocalStorage[productId] = e.data.projectId;
    localStorage.pp_w2p_projects = JSON.stringify(currentLocalStorage);
}