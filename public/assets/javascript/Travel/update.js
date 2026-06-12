const updateForm = document.querySelector('form')

updateForm.addEventListener('submit', handleSubmit)

async function handleSubmit(event) {
    event.preventDefault()
    id = updateForm.getAttribute('data-id')

    const data = Object.fromEntries(new FormData(event.target));
    const response = await fetch(`/travels/${id}`,{
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    console.log(data)

    window.location.href = '/';
}