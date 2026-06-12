const deleteTravelBtn = document.querySelectorAll('.delete_travel_btn')

deleteTravelBtn.forEach(btn => btn.addEventListener('click', handleClick))

async function handleClick(event) {
    event.preventDefault()
    id = event.target.closest('tr').getAttribute('data-id')
    console.log(id)
    const response = await fetch(`/travels/${id}`, {
        method: 'DELETE'
    })

    if(response.ok) {
        location.reload()
    }
}