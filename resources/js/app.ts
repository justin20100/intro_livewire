import './bootstrap';

// Define state
let perPage: string = '10'
let searchTerm = ''
let sortField = 'name'
let sortOrder = 'ASC'
let nextPage = '1'

window.addEventListener('load', init)

function makeRequest() {
    let url = `http://projet_web2.test/ajax?perPage=${perPage}&searchTerm=${searchTerm}&sortField=${sortField}&sortOrder=${sortOrder}&page=${nextPage}`
    fetch(url)
        .then((response) => response.text())
        .then((data) => updateTable(data))
}
function updateTable(data) {
    document.querySelector('#contacts-table-container > table').remove()
    document.querySelector('#contacts-table-container').insertAdjacentHTML('beforeend', data)
    handleFieldOrder();
}


function deleteButtons(){
    document.querySelectorAll('button[type=submit]').forEach(node => node.remove());
}
function handlePerPage(){
    document.querySelector('#per-page').value = String(perPage)
    document.querySelector('#per-page').addEventListener('change', function (e) {
        perPage = (e.target as HTMLSelectElement).value;
        makeRequest();
    })
}
function  handleSortOrder(){
    document.getElementById('sort-order').value = String(sortOrder)
    document.getElementById('sort-order').addEventListener('change', function (e) {
        sortOrder = (e.target as HTMLSelectElement).value;
        makeRequest();
    })
}
function handleNavigation(){
    document.querySelectorAll('.pageNavigation * a').forEach((value :HTMLLinkElement )=>{
        value.addEventListener('click', function (e){
            e.preventDefault();
            nextPage = value.innerText;
            console.log('en direct de la page '+nextPage);
            makeRequest();
        })
    })
}
function handleSearch(){
    document.querySelector('#search-term').addEventListener('keyup', function (e) {
        searchTerm = (e.target as HTMLSelectElement).value;
        console.log(searchTerm);
        makeRequest();
    })
}
function handleFieldOrder(){
    document.querySelectorAll('th a').forEach((value :HTMLLinkElement)=>{
        value.href = 'javascript: void(0)';
        value.addEventListener('click',()=>{
            sortField = value.dataset.key;
            makeRequest();
        })
    })
}

function init() {
    // @ts-ignore
    Array.from(document.forms).forEach(form => form.addEventListener("submit", e => e.preventDefault()))

    deleteButtons();
    handlePerPage();
    handleSortOrder();
    handleNavigation();
    handleSearch();
    handleFieldOrder();
}
