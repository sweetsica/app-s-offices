handleEdit()
handleDelete()
// Open Modal Edit
const modalEdit = document.getElementById('modalEdit');
const modaDelete = document.getElementById('modalDelete')

function handleEdit() {
    const btnEdit = document.querySelectorAll('.btn-edit');
    btnEdit.forEach((btn) => {
        btn.addEventListener('click', handleOpenModalEdit);
    });
}

async function handleOpenModalEdit(e) {
    try {
        e.preventDefault();
        const url = e.currentTarget.dataset.attr;
        const response = await fetch(url);
        const html = await response.text();
        modalEdit.querySelector('.modal-body-wrapper').innerHTML = html;
    } catch (e) {
        console.log("handleOpenModalEdit", e);
    }
}

function handleDelete() {
    const btnDelete = document.querySelectorAll('.btn-delete');
    btnDelete.forEach((btn) => {
        btn.addEventListener('click', handleOpenModalDelete);
    });
}

async function handleOpenModalDelete(e) {
    try {
        e.preventDefault();
        const url = e.currentTarget.dataset.attr;
        const response = await fetch(url);
        const html = await response.text();
        modaDelete.querySelector('.modal-body-wrapper').innerHTML = html;
    } catch (e) {
        console.log("handleOpenModalDelete", e);
    }
}