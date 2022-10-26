import './bootstrap';

// Define state
let perPage: string = '10'
let searchTerm = ''
let sortField = 'name'
let sortOrder = 'ASC'
let nextPage = '0'

window.addEventListener('load', init)

function init() {
    // @ts-ignore
    Array.from(document.forms).forEach(form =>
        form.addEventListener("submit", e => e.preventDefault()))
    document.querySelectorAll('button[type=submit]').forEach(node =>
        node.remove())
    document.querySelector('select').value = String(perPage)
    document.querySelector('select').addEventListener('change', function (e) {
        perPage = (e.target as HTMLSelectElement).value
        makeRequest()
    })
    document.querySelector('input').addEventListener('keyup', function (e) {
        searchTerm = (e.target as HTMLInputElement).value
        console.log(searchTerm)
        makeRequest()
    })
    document.querySelectorAll('.pageNavigation * a').forEach((value :HTMLLinkElement )=>{
        value.href = 'javascript: void(0)';
        value.addEventListener('click', function (){
            nextPage = value.innerText;
            console.log('en direct de la page '+nextPage);
            makeRequest();
        })
    })
}

function makeRequest() {
    let url = `http://projet_web2.test/ajax?perPage=${perPage}&searchTerm=${searchTerm}&sortField=${sortField}&sortOrder=${sortOrder}&page=${nextPage}`
    fetch(url)
        .then((response) => response.text())
        .then((data) => updateTable(data))
}

function updateTable(data) {
    document.querySelector('#contacts-table-container > table').remove()
    document.querySelector('#contacts-table-container').insertAdjacentHTML('beforeend', data)
}
