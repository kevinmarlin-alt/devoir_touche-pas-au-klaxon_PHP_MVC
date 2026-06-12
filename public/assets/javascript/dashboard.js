const deleteAgencyBtn = document.querySelectorAll('.delete_agency_btn')

deleteAgencyBtn.forEach((btn) => {
    btn.addEventListener('click', handleDeleteClick)
})

async function handleDeleteClick(event) {
    event.preventDefault()
    const id = event.target.closest('tr').getAttribute('data-id')
    const response = await fetch(`/agencies/${id}`,{
        method: 'DELETE'
    })
    if(response.ok) {
        location.reload()
    }
}