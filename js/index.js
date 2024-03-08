'use strict'
let title = document.querySelector('#title');
let content = document.querySelector('#content');
let fbutton = document.querySelector('.fbutton');
fbutton.addEventListener('click', ()=>{
    addNote(title.value, content.value);
});
function addNote(title, content){
    fetch('/app/View/addNote.php', {
        method:'post',
        body: JSON.stringify({title, content}),
    });
    getNoteLast();
}
function getNote(){
    fetch('/app/View/getNote.php').then(
        response => response.json()
    ).then(
        data =>{
            for (let datum of data) {
                renderNote(datum.id,datum.title, datum.content);
            }
        }
    );
}
function getNoteLast(){
    fetch('/app/View/getNoteLast.php').then(
        response => response.json()
    ).then(
        data =>{
            for (let datum of data) {
                renderNote(datum.id,datum.title, datum.content);
            }
        }
    );
}
function deleteNote(id){
    fetch('/app/View/deleteNote.php', {
        method:'post',
        body: JSON.stringify({id}),
    });
    removeNote();
}
function renderNote(id, title, content){
    let wrapper__output = document.querySelector('.wrapper__output');
    wrapper__output.innerHTML += `
            <div class="note__blank">
                <div class="note__title">${title}</div>
                <div class="note__content">${content}</div>
                <button class="note__delete">Удалить</button>
            </div>
    `
    let deleteNoteBtn = document.querySelectorAll('.note__delete');
    deleteNoteBtn.forEach(deleteBtn =>{
        deleteBtn.addEventListener('click', ()=>{
            deleteNote(id);
            getNote()
        });
    })
}

function removeNote() {
    let wrapperOutput = document.querySelector('.wrapper__output');
    let noteBlanks = document.querySelectorAll(".note__blank");
    for (const iterator of noteBlanks) {
        wrapperOutput.removeChild(iterator);
    }
}
getNote();